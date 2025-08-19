<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Nft;
use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Mail\nftEmail;
use App\Models\Credit;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Mail\nftUserEmail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    // Allowed file configuration
    private const IMAGE_EXTS = ['jpg', 'jpeg', 'png', 'gif'];
    private const DOC_EXTS   = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    private const IMAGE_MIMES = ['image/jpeg', 'image/png', 'image/gif'];
    private const DOC_MIMES   = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
    private const MAX_KB = 2048;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transferPage()
    {
        return view('dashboard.transfer');
    }

    public function userProfile()
    {
        return view('dashboard.profile');
    }

    public function card()
    {
        $data['details'] = Card::where('user_id', Auth::id())->get();
        return view('dashboard.card', $data);
    }

    public function cardApplication()
    {
        $data['details'] = Card::where('user_id', Auth::id())->get();
        return view('dashboard.card_application', $data);
    }

    /**
     * Request a virtual card for a user (keeps original behavior)
     */
    public function requestCard($user_id)
    {
        $userData = User::find($user_id);
        if (! $userData) {
            return back()->with('error', 'User not found');
        }

        // Minimum amount (original logic used $amount = 10)
        $amount = 10.0;

        // Compute balance for the target user
        $balance = $this->computeBalance($userData->id);

        if ($amount > $balance) {
            return back()->with('error', 'Your account Has Not Been linked, Please Contact Support Immediately');
        }

        // Generate secure-ish card values
        $card_number = $this->generateNumericString(16);
        $cvc = random_int(100, 999);
        $ref = strtoupper(uniqid('CD'));
        $startDate = date('Y-m-d');
        $expiryDate = date('Y-m-d', strtotime($startDate . '+ 24 months'));

        $card = new Card();
        $card->user_id = $userData->id;
        $card->card_number = $card_number;
        $card->card_cvc = $cvc;
        $card->card_expiry = $expiryDate;
        $card->save();

        $transaction = new Transaction();
        $transaction->user_id = $userData->id;
        $transaction->transaction_id = $card->id;
        $transaction->transaction_ref = $ref;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Card";
        $transaction->transaction_amount = $amount;
        $transaction->transaction_description = "Virtual Card Purchase";
        $transaction->transaction_status = 1;
        $transaction->save();

        return back()->with('status', 'Card Purchased Successfully');
    }

    public function notification()
    {
        return view('dashboard.notification');
    }

    public function transactions()
    {
        $data['transaction'] = Transaction::where('user_id', Auth::id())->get();
        return view('dashboard.transactions', $data);
    }

    /**
     * Show invoice depending on transaction type.
     * tid is expected to be transaction.transaction_id (as in original logic).
     */
    public function viewInvoice(Request $request, $tid)
    {
        // find the transaction by transaction_id
        $transaction = Transaction::where('transaction_id', $tid)->first();
        if (! $transaction) {
            return back()->with('error', 'Invoice not found');
        }

        // If it's a Card transaction, show the card invoice
        if (strtolower($transaction->transaction) === 'card') {
            $card = Card::find($transaction->transaction_id);
            return view('dashboard.view_invoice', ['transaction' => $transaction, 'card' => $card]);
        }

        // If it's a Transfer transaction, show transfer invoice (if transfer exists)
        if (strtolower($transaction->transaction) === 'transfer' || strtolower($transaction->transaction) === 'bank transfer') {
            $transfer = Transfer::find($transaction->transaction_id);
            return view('dashboard.transfer_invoice', ['transaction' => $transaction, 'transfer' => $transfer]);
        }

        // Fallback: generic invoice view
        return view('dashboard.view_invoice', ['transaction' => $transaction]);
    }

    public function pendingTransfer()
    {
        return view('dashboard.pending_transfer');
    }

    public function settings()
    {
        return view('dashboard.settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|confirmed|min:6',
        ]);

        if (! Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match! Please input your correct old password");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // Force re-login
        Session::flush();
        Auth::guard('web')->logout();
        return redirect('login')->with('status', 'Password Updated Successfully, Please login with your new password');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function userChangePassword()
    {
        return view('dashboard.change_password');
    }

    public function deposit()
    {
        $userId = Auth::id();
        $data['credit_transfers'] = Transaction::where('user_id', $userId)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', $userId)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', $userId)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['balance'] = $this->computeBalance($userId);
        return view('dashboard.deposit', $data);
    }

    public function loan()
    {
        $userId = Auth::id();
        $data['outstanding_loan'] = Loan::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['pending_loan'] = Loan::where('user_id', $userId)->where('status', '0')->sum('amount');
        $data['transaction'] = Transaction::where('user_id', $userId)->where('transaction', 'Loan')->get();
        return view('dashboard.loan', $data);
    }

    /**
     * Update personal details and optionally upload display picture.
     */
    public function personalDetails(Request $request)
    {
        $request->validate([
            'first_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'user_phone' => 'nullable|string|max:50',
            'user_address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'image' => 'nullable|file|max:' . self::MAX_KB,
        ]);

        $update = Auth::user();
        $update->first_name = $request->input('first_name');
        $update->last_name = $request->input('last_name');
        $update->phone_number = $request->input('user_phone');
        $update->address = $request->input('user_address');
        $update->country = $request->input('country');

        if ($request->hasFile('image')) {
            try {
                $filename = $this->storeSafeFile($request->file('image'), 'uploads/display', self::IMAGE_EXTS, self::IMAGE_MIMES);
                $update->display_picture = $filename;
            } catch (\Exception $e) {
                return back()->with('error', 'Image upload failed: ' . $e->getMessage())->withInput();
            }
        }

        $update->save();
        return back()->with('status', 'Personal Details Updated Successfully');
    }

    /**
     * Update only display picture
     */
    public function personalDp(Request $request)
    {
        $request->validate(['image' => 'required|file|max:' . self::MAX_KB]);

        $update = Auth::user();
        if ($request->hasFile('image')) {
            try {
                $filename = $this->storeSafeFile($request->file('image'), 'uploads/display', self::IMAGE_EXTS, self::IMAGE_MIMES);
                $update->display_picture = $filename;
            } catch (\Exception $e) {
                return back()->with('error', 'Image upload failed: ' . $e->getMessage())->withInput();
            }
        }
        $update->save();

        return back()->with('status', 'Personal Picture Updated Successfully');
    }

    /**
     * Make deposit by uploading cheque front/back (safe storage)
     */
    public function makeDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'front_cheque' => 'nullable|file|max:' . self::MAX_KB,
            'back_cheque' => 'nullable|file|max:' . self::MAX_KB,
        ]);

        $ref = strtoupper(uniqid('DP'));

        $deposit = new Deposit();
        $deposit->user_id = Auth::id();
        $deposit->amount = (float) $request->input('amount');
        $deposit->status = 0;

        try {
            if ($request->hasFile('front_cheque')) {
                $front = $this->storeSafeFile($request->file('front_cheque'), 'uploads/cheque', self::IMAGE_EXTS, self::IMAGE_MIMES);
                $deposit->front_cheque = $front;
            }
            if ($request->hasFile('back_cheque')) {
                $back = $this->storeSafeFile($request->file('back_cheque'), 'uploads/cheque', self::IMAGE_EXTS, self::IMAGE_MIMES);
                $deposit->back_cheque = $back;
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Cheque upload failed: ' . $e->getMessage())->withInput();
        }

        $deposit->save();

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->transaction_id = $deposit->id;
        $transaction->transaction_ref = $ref;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "Deposit";
        $transaction->transaction_amount = $deposit->amount;
        $transaction->transaction_description = "A deposit of " . $deposit->amount;
        $transaction->transaction_status = 1;
        $transaction->save();

        return back()->with('status', 'Deposit detected, please wait for approval by the administrator');
    }

    // -----------------------
    // Helpers
    // -----------------------

    /**
     * Store uploaded file safely on the public disk and return stored path.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $dir
     * @param array $allowedExts
     * @param array $allowedMimes
     * @return string stored path (relative to disk root)
     * @throws \Exception
     */
    private function storeSafeFile($file, string $dir, array $allowedExts, array $allowedMimes): string
    {
        if (! $file || ! $file->isValid()) {
            throw new \Exception('Invalid or missing file.');
        }

        $original = $file->getClientOriginalName();
        if (! $this->isSafeOriginalName($original)) {
            throw new \Exception('Invalid file name.');
        }

        $ext = strtolower($file->getClientOriginalExtension());
        if (! in_array($ext, $allowedExts, true)) {
            throw new \Exception('File extension not allowed.');
        }

        $mime = $file->getMimeType();
        if (! in_array($mime, $allowedMimes, true)) {
            throw new \Exception('Invalid MIME type.');
        }

        // Read the first chunk and scan for php tags
        $contents = @file_get_contents($file->getRealPath(), false, null, 0, 4096) ?: '';
        if ($this->scanForPhpCode($contents)) {
            throw new \Exception('Malicious content detected in file.');
        }

        $filename = time() . '_' . Str::random(12) . '.' . $ext;
        $path = Storage::disk('public')->putFileAs($dir, $file, $filename);
        if (! $path) {
            throw new \Exception('Could not store uploaded file.');
        }

        return trim($path, '/');
    }

    private function isSafeOriginalName(string $name): bool
    {
        $lower = strtolower($name);

        // disallow php extensions/patterns like .php, .php56, .phtml, .phar
        if (preg_match('/\\.(php(\\d*)|phtml|phar)$/i', $lower)) {
            return false;
        }

        // disallow names with .php anywhere in the name (e.g. file.php.jpg or evil.php56.png)
        if (preg_match('/\\.php(\\d*)/i', $lower)) {
            return false;
        }

        // disallow control characters
        if (preg_match('/[\\x00-\\x1F]/', $name)) {
            return false;
        }

        return true;
    }

    private function scanForPhpCode(string $buffer): bool
    {
        return stripos($buffer, '<?php') !== false || stripos($buffer, '<?') !== false || stripos($buffer, '<?=') !== false;
    }

    /**
     * Compute user's balance (same logic repeated in original, centralized here).
     */
    private function computeBalance(int $userId): float
    {
        $credit_transfers = Transaction::where('user_id', $userId)->where('transaction_type', 'Credit')->sum('transaction_amount') ?: 0;
        $debit_transfers = Transaction::where('user_id', $userId)->where('transaction_type', 'Debit')->sum('transaction_amount') ?: 0;
        $user_deposits = Deposit::where('user_id', $userId)->where('status', '1')->sum('amount') ?: 0;
        $user_loans = Loan::where('user_id', $userId)->where('status', '1')->sum('amount') ?: 0;
        $user_card = Card::where('user_id', $userId)->sum('amount') ?: 0;

        return (float) $user_deposits + (float) $credit_transfers + (float) $user_loans - (float) $debit_transfers - (float) $user_card;
    }

    /**
     * Generate a random numeric string with length characters.
     */
    private function generateNumericString(int $length = 16): string
    {
        $digits = '';
        while (strlen($digits) < $length) {
            $digits .= (string) random_int(0, 9);
        }
        return substr($digits, 0, $length);
    }
}
