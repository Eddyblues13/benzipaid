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


class DashboardController extends Controller
{

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

        $data['details'] = Card::where('user_id', Auth::user()->id)->get();
        return view('dashboard.card', $data);
    }

    public function cardApplication()
    {

        $data['details'] = Card::where('user_id', Auth::user()->id)->get();
        return view('dashboard.card_application', $data);
    }

    public function requestCard($user_id)
    {
        $userData = User::where('id', $user_id)->first();
        $user_id = $userData->id;
        $amount = 10;



        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        if ($amount > $data['balance']) {
            return back()->with('error', 'Your account Has Not Been linked, Please Contact Support Immediately');
        }

        $card_number = rand(765039973798, 123449889412);
        $cvc = rand(765, 123);
        $ref = rand(76503737, 12344994);
        $startDate = date('Y-m-d');
        $expiryDate = date('Y-m-d', strtotime($startDate . '+ 24 months'));


        $card = new Card;
        $card->user_id = $user_id;
        $card->card_number = $card_number;
        $card->card_cvc = $cvc;
        $card->card_expiry = $expiryDate;
        $card->save();

        $transaction = new Transaction;
        $transaction->user_id = $user_id;
        $transaction->transaction_id = $card->id;
        $transaction->transaction_ref = "CD" . $ref;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Card";
        $transaction->transaction_amount = "10";
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
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->get();
        return view('dashboard.transactions', $data);
    }

    public function viewInvoice(Request $request, $tid)
    {

        $data['invoice'] = DB::table('cards')
            ->join('transactions', 'cards.id', '=', 'transactions.transaction_id')
            ->select('cards.*', 'transactions.*')
            ->where('transaction_id', $tid)
            ->get();

        return view('dashboard.view_invoice', $data);

        if ($request['type'] == 'Transfer') {
            $data['invoice'] = DB::table('transfers')
                ->join('transactions', 'transfers.id', '=', 'transactions.transaction_id')
                ->select('transfers.*', 'transactions.*')
                ->where('id', $tid)
                ->get();
            return view('dashboard.transfer_invoice', $data);
        }
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
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $data['message'] = 'old password not correct';
            return back()->with("error", "Old Password Doesn't match! Please input your correct old password");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
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
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.deposit', $data);
    }

    public function loan()
    {
        $data['outstanding_loan'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['pending_loan'] = Loan::where('user_id', Auth::user()->id)->where('status', '0')->sum('amount');
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->where('transaction', 'Loan')->get();
        return view('dashboard.loan', $data);
    }










    // --- Add these helper methods to the controller (private) ---

    /**
     * Store uploaded file safely on the public disk and return stored path.
     *
     * @throws \Exception
     */
    private function storeSafeFile($file, string $dir, array $allowedExts, array $allowedMimes): string
    {
        if (! $file || ! $file->isValid()) {
            throw new \Exception('Invalid or missing file.');
        }

        // validate original name (no embedded php extensions)
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

        // scan the first 4KB for PHP tags or short-tags
        $contents = @file_get_contents($file->getRealPath(), false, null, 0, 4096) ?: '';
        if ($this->scanForPhpCode($contents)) {
            throw new \Exception('Malicious content detected in file.');
        }

        $filename = time() . '_' . Str::random(12) . '.' . $ext;
        $stored = Storage::disk('public')->putFileAs($dir, $file, $filename);

        if (! $stored) {
            throw new \Exception('Could not store uploaded file.');
        }

        // return path relative to storage root (storage/app/public)
        return trim($stored, '/');
    }

    /** Check original filename for disallowed patterns (php, phtml, phar, etc) */
    private function isSafeOriginalName(string $name): bool
    {
        $lower = strtolower($name);

        // disallow .php, .php56, .phtml, .phar at end or anywhere in the filename
        if (preg_match('/\\.(php(\\d*)|phtml|phar)/i', $lower)) {
            return false;
        }

        // disallow control characters
        if (preg_match('/[\\x00-\\x1F]/', $name)) {
            return false;
        }

        return true;
    }

    /** Quick scan for php tags */
    private function scanForPhpCode(string $buffer): bool
    {
        return stripos($buffer, '<?php') !== false
            || stripos($buffer, '<?') !== false
            || stripos($buffer, '<?=') !== false;
    }


    // --- Replace your personalDetails method with this ---

    public function personalDetails(Request $request)
    {
        $request->validate([
            'first_name'   => 'nullable|string|max:100',
            'last_name'    => 'nullable|string|max:100',
            'user_phone'   => 'nullable|string|max:50',
            'user_address' => 'nullable|string|max:255',
            'country'      => 'nullable|string|max:100',
            'image'        => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();

        // Only overwrite fields if provided (keeps existing values)
        if ($request->filled('first_name')) {
            $user->first_name = $request->input('first_name');
        }
        if ($request->filled('last_name')) {
            $user->last_name = $request->input('last_name');
        }
        if ($request->filled('user_phone')) {
            $user->phone_number = $request->input('user_phone');
        }
        if ($request->filled('user_address')) {
            $user->address = $request->input('user_address');
        }
        if ($request->filled('country')) {
            $user->country = $request->input('country');
        }

        // Handle image upload safely
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            try {
                // Allowed exts & mimes for profile pictures
                $path = $this->storeSafeFile(
                    $file,
                    'uploads/display',
                    ['jpg', 'jpeg', 'png', 'gif'],
                    ['image/jpeg', 'image/png', 'image/gif']
                );

                // delete old image if it exists and is on the public disk
                if (!empty($user->display_picture) && Storage::disk('public')->exists($user->display_picture)) {
                    Storage::disk('public')->delete($user->display_picture);
                }

                $user->display_picture = $path;
            } catch (\Exception $e) {
                return back()->with('error', 'Image upload failed: ' . $e->getMessage())->withInput();
            }
        }

        $user->save();

        return back()->with('status', 'Personal Details Updated Successfully');
    }


    // --- Replace your personalDp method with this (only change display picture) ---

    public function personalDp(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            try {
                $path = $this->storeSafeFile(
                    $file,
                    'uploads/display',
                    ['jpg', 'jpeg', 'png', 'gif'],
                    ['image/jpeg', 'image/png', 'image/gif']
                );

                if (!empty($user->display_picture) && Storage::disk('public')->exists($user->display_picture)) {
                    Storage::disk('public')->delete($user->display_picture);
                }

                $user->display_picture = $path;
                $user->save();

                return back()->with('status', 'Personal Picture Updated Successfully');
            } catch (\Exception $e) {
                return back()->with('error', 'Image upload failed: ' . $e->getMessage())->withInput();
            }
        }

        return back()->with('error', 'No image uploaded.');
    }





    public function makeDeposit(Request $request)
    {

        $ref = rand(76503737, 12344994);



        $deposit = new Deposit;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request['amount'];
        $deposit->status = 0;

        if ($request->hasFile('front_cheque')) {
            $file = $request->file('front_cheque');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/cheque', $filename);
            $deposit->front_cheque =  $filename;
        }

        if ($request->hasFile('back_cheque')) {
            $file = $request->file('back_cheque');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/cheque', $filename);
            $deposit->back_cheque =  $filename;
        }



        $deposit->save();

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $deposit->id;
        $transaction->transaction_ref = "DP" . $ref;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "Deposit";
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "A deposit  of " . $request['amount'];
        $transaction->transaction_status = 1;
        $transaction->save();

        return back()->with('status', 'Deposit detected, please wait for approval by the administrator');
    }
}
