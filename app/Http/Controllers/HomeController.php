<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Loan;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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


    public function checkPage()
    {
        return view('dashboard.check');
    }


    public function checkUpload(Request $request)
    {
        $request->validate([
            'amount' => 'required|string',
            'check_description' => 'required|string',
            'check_front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'check_back' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the files
        $frontPath = $request->file('check_front')->store('checks/front', 'public');
        $backPath = $request->file('check_back')->store('checks/back', 'public');


        Deposit::create([
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'deposit_type' => $request->check_description,
            'front_cheque' => $frontPath,
            'back_cheque' => $backPath,
            'status' => 0,
        ]);

        return redirect()->back()->with('status', 'Check uploaded successfully!');
    }


    public function kycPage()
    {
        return view('dashboard.kyc');
    }


    public function kycUpload(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'id_document' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'proof_address' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Store the files
        $idPath = $request->file('id_document')->store('kyc/id_documents', 'public');
        $addressPath = $request->file('proof_address')->store('kyc/proof_addresses', 'public');

        $kyc = Auth::user();
        $kyc->kyc_status = 0;
        $kyc->id_document = $idPath;
        $kyc->proof_address = $addressPath;
        $kyc->save();

        return redirect()->back()->with('status', 'KYC documents uploaded successfully!');
    }

    public function loan()
    {
        $data['outstanding_loan'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['pending_loan'] = Loan::where('user_id', Auth::user()->id)->where('status', '0')->sum('amount');
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->where('transaction', 'Loan')->get();
        return view('dashboard.loan', $data);
    }

    public function makeLoan(Request $request)
    {


        $ssn = $request->input('ssn');
        $amount = $request->input('amount');

        if ($ssn != Auth::user()->ssn) {
            return back()->with('error', ' Incorrect SSN number!');
        }
        if ($amount > Auth::user()->eligible_loan) {
            return back()->with('error', ' You are not eligible, please check your Eligibility or contact our administrator for more info!!');
        }

        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        $ref = rand(76503737, 12344994);



        $loan = new Loan;
        $loan->user_id = Auth::user()->id;
        $loan->amount = $request['amount'];
        $loan->status = 0;
        $loan->save();

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $loan->id;
        $transaction->transaction_ref = "LN" . $ref;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "Loan";
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "Requested for a loan of " . $request['amount'];
        $transaction->transaction_status = 0;
        $transaction->save();



        return back()->with('status', 'Loan detected, please wait for approval by the administrator');
    }

    public function interBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.inter_bank', $data);
    }

    public function localBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.local_bank', $data);
    }

    public function revolutBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.revolut', $data);
    }
    public function wiseBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.wise', $data);
    }

    public function skrill()
    {

        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('dashboard.skrill', $data);
    }

    public function crypto()
    {

        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('dashboard.crypto', $data);
    }

    public function bank()
    {

        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('dashboard.bank', $data);
    }

    public function paypal()
    {

        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.paypal', $data);
    }

    public function interTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }


        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'inter_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "TR" . $ref,
                'transaction_ref' => "TR" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Bank Transfer",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Bank Transfer transaction",
                'account_name' => $request['account_name'],
                'account_number' => $request['account_number'],
                'account_type' => $request['account_type'],
                'bank_name' => $request['bank_name'],
                'routing_number' => $request['routing_number'],
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.code', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function localTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }


        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'local_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "TR" . $ref,
                'transaction_ref' => "TR" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Bank Transfer",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Bank Transfer transaction",
                'account_name' => $request['account_name'],
                'account_number' => $request['account_number'],
                'account_type' => $request['account_type'],
                'bank_name' => $request['bank_name'],
                'routing_number' => $request['routing_number'],
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.code', $data)->with('status', 'Please Enter Your correct routing number');
    }

    public function revolutTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'revolut_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "REV" . $ref,
                'transaction_ref' => "REV" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Revolut Withdrawal",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Revolut transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.code', $data)->with('status', 'Please Enter Your correct routing number');
    }

    public function wiseTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }


        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'wise_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "WIS" . $ref,
                'transaction_ref' => "WIS" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Wise Withdrawal",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Wise transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.code', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function paypalTransfer(Request $request)
    {


        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'paypal_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "PAY" . $ref,
                'transaction_ref' => "PAY" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Paypal Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Paypal transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.code', $data)->with('status', 'Please Enter Your correct routing number');
    }



    public function skrillTransfer(Request $request)
    {


        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'skrill_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "SKR" . $ref,
                'transaction_ref' => "SKR" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Skrill Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Skrill transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.code', $data)->with('status', 'Please Enter Your correct routing number');
    }



    public function transferWesternUnion(Request $request)
    {

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Generate a unique transaction reference
        $ref = strtoupper(uniqid('WU'));

        // Store transaction details in the session
        session([
            'western_union_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => $ref,
                'transaction_ref' => $ref,
                'transaction_type' => 'Debit',
                'transaction' => 'Western Union Withdrawal',
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => 'Western Union transfer to ' . $request->input('recipient_name'),
                'transaction_status' => 0, // 0 for pending, 1 for completed
                'recipient_name' => $request->input('recipient_name'),
                'recipient_country' => $request->input('recipient_country'),
                'recipient_city' => $request->input('recipient_city'),
                // Include any additional details as needed
            ]
        ]);

        // Redirect to a confirmation or routing number view
        return view('dashboard.code', $data)
            ->with('status', 'Please enter your routing number to complete the Western Union withdrawal.');
    }





    // Method to handle the main crypto transfer process
    public function cryptoTransfer(Request $request)
    {


        // Calculate user balance (same as above)
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient (same as above)
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }
        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'crypto_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "CRP" . $ref,
                'transaction_ref' => "CRP" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Crypto Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'wallet_type' => $request->input('wallet_type'),
                'wallet_address' => $request->input('wallet_address'),
                'transaction_description' => "Crypto Withdrawal transaction",
                'transaction_status' => 0,
            ]
        ]);

        return view('dashboard.code', $data);
    }


    public function validateVatCode(Request $request)
    {
        // Retrieve the vat code input from the request
        $vat_code = $request->input('vatCode'); // Corrected from 'vatCode' to 'vatCode'

        // Check if the input vat code matches the authenticated user's stored vat code
        if ($vat_code == Auth::user()->first_code) {

            // Retrieve session data for each transfer method
            $transferTypes = [
                'paypal_transfer',
                'inter_transfer',
                'local_transfer',
                'revolut_transfer',
                'wise_transfer',
                'crypto_transfer',
                'skrill_transfer',
                'western_union_transfer',
                'gcash_transfer',
                'easypaisa_transfer',
                'upi_transfer',
                'bkash_transfer',
                'vodafone_transfer',
                'upasa_transfer',
                'stc_pay_transfer',
                'cash_app_transfer',
                'apple_pay_transfer',
                'pix_transfer',
                'nequi_transfer',
                'bancolombia_transfer',
                'maya_transfer',
                'line_pay_transfer',
                'ali_pay_transfer',
                'phonepe_transfer',
                'jazzcash_transfer',
                'm10_transfer',
                'yape_transfer',
                'wechat_transfer',
                'upaisa_transfer',
                'nagad_transfer',
                'google_pay_transfer',
                'esewa_transfer'
            ];

            // Array to store processed transactions
            $transactions = [];

            // Function to process transfer details
            $processTransfer = function ($transferData, $transferType) use (&$transactions) {
                if ($transferData) {
                    $transaction = new Transaction();
                    $transaction->user_id = $transferData['user_id'];
                    $transaction->transaction_id = $transferData['transaction_id'];
                    $transaction->transaction_ref = $transferData['transaction_ref'];
                    $transaction->transaction_type = $transferType;
                    $transaction->transaction = $transferData['transaction'];
                    $transaction->transaction_amount = $transferData['transaction_amount'];
                    $transaction->transaction_description = $transferData['transaction_description'];
                    $transaction->transaction_status = $transferData['transaction_status'];
                    $transaction->save();
                    $transactions[] = $transaction;

                    // Forget the session for this transfer method
                    session()->forget($transferType);
                }
            };

            // Process each transfer type
            foreach ($transferTypes as $transferType) {
                $transferData = session($transferType);
                $processTransfer($transferData, $transferType);
            }

            // Return success response if at least one transaction was saved
            if (!empty($transactions)) {
                return response()->json(['success' => true, 'message' => 'Transactions saved successfully!']);
            } else {
                return response()->json(['success' => false, 'message' => 'No transaction data in session!']);
            }
        } else {
            // CCIC code does not match
            return response()->json(['success' => false, 'message' => 'Incorrect VAT code!']);
        }
    }


    public function loading(Request $request)
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        $nextUrl = $request->get('nextUrl');
        return view('dashboard.loading', compact('nextUrl'), $data);
    }


    public function transactionSuccess()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')
            ->where('transaction_status', '1')
            ->sum('transaction_amount');

        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')
            ->where('transaction_status', '1')
            ->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')
            ->sum('amount');

        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')
            ->sum('amount');

        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

        // Calculate balance
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Fetch latest transaction data
        $data['transaction_data'] = Transaction::where('user_id', Auth::user()->id)->latest()->first();

        return view('dashboard.transaction_successful', $data);
    }
}
