<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Loan;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
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

    public function index()
    {
        return view('home');
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

    public function checkPage()
    {
        return view('dashboard.check');
    }

    /**
     * Upload cheque images safely to storage/app/public/checks/...
     */
    public function checkUpload(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'check_description' => 'required|string|max:255',
            'check_front' => 'required|file|max:' . self::MAX_KB,
            'check_back'  => 'required|file|max:' . self::MAX_KB,
        ]);

        try {
            $frontPath = $this->storeSafeFile($request->file('check_front'), 'checks/front', self::IMAGE_EXTS, self::IMAGE_MIMES);
            $backPath  = $this->storeSafeFile($request->file('check_back'), 'checks/back', self::IMAGE_EXTS, self::IMAGE_MIMES);

            Deposit::create([
                'user_id' => Auth::id(),
                'amount' => (float) $request->input('amount'),
                'deposit_type' => $request->input('check_description'),
                'front_cheque' => $frontPath,
                'back_cheque'  => $backPath,
                'status' => 0,
            ]);

            return redirect()->back()->with('status', 'Check uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Upload failed: ' . $e->getMessage())->withInput();
        }
    }

    public function kycPage()
    {
        return view('dashboard.kyc');
    }

    public function kycUpload(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'id_document' => 'required|file|max:' . self::MAX_KB,
            'proof_address' => 'required|file|max:' . self::MAX_KB,
        ]);

        try {
            $idPath = $this->storeSafeFile($request->file('id_document'), 'kyc/id_documents', self::DOC_EXTS, self::DOC_MIMES);
            $addressPath = $this->storeSafeFile($request->file('proof_address'), 'kyc/proof_addresses', self::DOC_EXTS, self::DOC_MIMES);

            $kyc = Auth::user();
            $kyc->kyc_status = 0; // pending
            $kyc->id_document = $idPath;
            $kyc->proof_address = $addressPath;
            $kyc->save();

            return redirect()->back()->with('status', 'KYC documents uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'KYC upload failed: ' . $e->getMessage())->withInput();
        }
    }

    public function loan()
    {
        $userId = Auth::id();
        $data['outstanding_loan'] = Loan::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['pending_loan'] = Loan::where('user_id', $userId)->where('status', '0')->sum('amount');
        $data['transaction'] = Transaction::where('user_id', $userId)->where('transaction', 'Loan')->get();
        return view('dashboard.loan', $data);
    }

    public function makeLoan(Request $request)
    {
        $request->validate([
            'ssn' => 'required|string|max:100',
            'amount' => 'required|numeric|min:1',
        ]);

        $ssn = $request->input('ssn');
        $amount = (float) $request->input('amount');

        if ($ssn !== Auth::user()->ssn) {
            return back()->with('error', 'Incorrect SSN number!');
        }

        if ($amount > (float) Auth::user()->eligible_loan) {
            return back()->with('error', 'You are not eligible, please check your eligibility or contact support.');
        }

        $balance = $this->computeBalance(Auth::id());

        // additional internal checks could be placed here

        $loan = new Loan();
        $loan->user_id = Auth::id();
        $loan->amount = $amount;
        $loan->status = 0; // pending
        $loan->save();

        $ref = strtoupper(uniqid('LN'));

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->transaction_id = $loan->id;
        $transaction->transaction_ref = $ref;
        $transaction->transaction_type = 'Credit';
        $transaction->transaction = 'Loan';
        $transaction->transaction_amount = $amount;
        $transaction->transaction_description = 'Requested a loan of ' . $amount;
        $transaction->transaction_status = 0; // pending
        $transaction->save();

        return back()->with('status', 'Loan detected, please wait for approval by the administrator');
    }

    // The various transfer methods are refactored to use a single helper which validates balance and stores a safe session payload.

    public function interBankTransfer(Request $request)
    {
        return $this->prepareTransferSession('inter_transfer', $request, 'Bank Transfer', 'TR');
    }

    public function localBankTransfer(Request $request)
    {
        return $this->prepareTransferSession('local_transfer', $request, 'Bank Transfer', 'TR');
    }

    public function revolutBankTransfer(Request $request)
    {
        return $this->prepareTransferSession('revolut_transfer', $request, 'Revolut Withdrawal', 'REV');
    }

    public function wiseBankTransfer(Request $request)
    {
        return $this->prepareTransferSession('wise_transfer', $request, 'Wise Withdrawal', 'WIS');
    }

    public function paypalTransfer(Request $request)
    {
        return $this->prepareTransferSession('paypal_transfer', $request, 'Paypal Withdrawal', 'PAY');
    }

    public function skrillTransfer(Request $request)
    {
        return $this->prepareTransferSession('skrill_transfer', $request, 'Skrill Withdrawal', 'SKR');
    }

    public function transferWesternUnion(Request $request)
    {
        return $this->prepareTransferSession('western_union_transfer', $request, 'Western Union Withdrawal', 'WU', [
            'recipient_name',
            'recipient_country',
            'recipient_city'
        ]);
    }

    public function cryptoTransfer(Request $request)
    {
        return $this->prepareTransferSession('crypto_transfer', $request, 'Crypto Withdrawal', 'CRP', [
            'wallet_type',
            'wallet_address'
        ]);
    }

    /**
     * Validates a VAT / routing code and persists any transfer sessions as transactions.
     */
    public function validateVatCode(Request $request)
    {
        $request->validate(['vatCode' => 'required|string']);
        $vat_code = $request->input('vatCode');

        if ($vat_code !== Auth::user()->first_code) {
            return response()->json(['success' => false, 'message' => 'Incorrect VAT code!'], 422);
        }

        $transferTypes = [
            'paypal_transfer',
            'inter_transfer',
            'local_transfer',
            'revolut_transfer',
            'wise_transfer',
            'crypto_transfer',
            'skrill_transfer',
            'western_union_transfer'
        ];

        $saved = 0;

        foreach ($transferTypes as $transferType) {
            $transferData = session($transferType);
            if (!is_array($transferData) || empty($transferData['transaction_amount'])) {
                session()->forget($transferType);
                continue;
            }

            $amount = (float) $transferData['transaction_amount'];
            if ($amount <= 0) {
                session()->forget($transferType);
                continue;
            }

            $txn = new Transaction();
            $txn->user_id = (int) $transferData['user_id'];
            $txn->transaction_id = $transferData['transaction_id'] ?? strtoupper(uniqid('TR'));
            $txn->transaction_ref = $transferData['transaction_ref'] ?? $txn->transaction_id;
            $txn->transaction_type = $transferData['transaction_type'] ?? 'Debit';
            $txn->transaction = $transferData['transaction'] ?? $transferType;
            $txn->transaction_amount = $amount;
            $txn->transaction_description = $transferData['transaction_description'] ?? ($transferType . ' executed');
            $txn->transaction_status = 0; // keep pending for admin approval
            $txn->save();

            session()->forget($transferType);
            $saved++;
        }

        if ($saved > 0) {
            return response()->json(['success' => true, 'message' => 'Transactions saved successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'No transaction data in session!'], 422);
    }

    public function loading(Request $request)
    {
        $data['balance'] = $this->computeBalance(Auth::id());
        $nextUrl = $request->get('nextUrl');
        return view('dashboard.loading', compact('nextUrl'), $data);
    }

    public function transactionSuccess()
    {
        $userId = Auth::id();
        $data['credit_transfers'] = Transaction::where('user_id', $userId)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', $userId)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', $userId)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', $userId)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        $data['transaction_data'] = Transaction::where('user_id', $userId)->latest()->first();

        return view('dashboard.transaction_successful', $data);
    }

    // -----------------------
    // Helper methods
    // -----------------------

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

        // Scan a small portion for PHP tags
        $contents = @file_get_contents($file->getRealPath(), false, null, 0, 4096) ?: '';
        if ($this->scanForPhpCode($contents)) {
            throw new \Exception('Malicious content detected in file.');
        }

        $filename = time() . '_' . Str::random(12) . '.' . $ext;
        $stored = Storage::disk('public')->putFileAs($dir, $file, $filename);
        if (! $stored) {
            throw new \Exception('Could not store uploaded file.');
        }

        // Return path relative to storage/app/public so it can be used with asset('storage/...')
        return trim($stored, '/');
    }

    private function isSafeOriginalName(string $name): bool
    {
        $lower = strtolower($name);

        // Disallow php extensions or php anywhere in extension like .php56
        if (preg_match('/\.(php(\d*)|phtml|phar)$/i', $lower)) {
            return false;
        }

        // Disallow filenames that contain suspicious patterns
        if (preg_match('/\.(php(\d*)|phtml|phar)\./i', $lower)) {
            return false;
        }

        if (preg_match('/[\x00-\x1F]/', $name)) {
            return false;
        }

        return true;
    }

    private function scanForPhpCode(string $buffer): bool
    {
        return stripos($buffer, '<?php') !== false || stripos($buffer, '<?') !== false || stripos($buffer, '<?=') !== false;
    }

    private function computeBalance(int $userId): float
    {
        $credit_transfers = Transaction::where('user_id', $userId)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $debit_transfers = Transaction::where('user_id', $userId)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $user_deposits = Deposit::where('user_id', $userId)->where('status', '1')->sum('amount');
        $user_loans = Loan::where('user_id', $userId)->where('status', '1')->sum('amount');
        $user_card = Card::where('user_id', $userId)->sum('amount');

        return (float) $user_deposits + (float) $credit_transfers + (float) $user_loans - (float) $debit_transfers - (float) $user_card;
    }

    private function prepareTransferSession(string $sessionKey, Request $request, string $transactionLabel, string $prefix, array $extraFields = [])
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $amount = (float) $request->input('amount');
        $balance = $this->computeBalance(Auth::id());

        if ($balance <= 0 || $balance < $amount) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')->withInput();
        }

        $ref = strtoupper(uniqid($prefix));

        $payload = [
            'user_id' => Auth::id(),
            'transaction_id' => $ref,
            'transaction_ref' => $ref,
            'transaction_type' => 'Debit',
            'transaction' => $transactionLabel,
            'transaction_amount' => $amount,
            'transaction_description' => $transactionLabel . ' transaction',
            'transaction_status' => 0,
        ];

        // Attach extra allowed fields safely
        foreach ($extraFields as $field) {
            if ($request->has($field)) {
                $payload[$field] = strip_tags($request->input($field));
            }
        }

        session([$sessionKey => $payload]);

        $data['balance'] = $balance;
        return view('dashboard.code', $data)->with('status', 'Please Enter Your correct routing number');
    }
}
