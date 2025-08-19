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










    public function personalDetails(Request $request)
    {


        $update = Auth::user();
        $update->first_name = $request['first_name'];
        $update->last_name = $request['last_name'];
        $update->phone_number = $request['user_phone'];
        $update->address = $request['user_address'];
        $update->country = $request['country'];



        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/display', $filename);
            $update->display_picture =  $filename;
        }
        $update->update();

        return back()->with('status', 'Personal Details Updated Successfully');
    }


    public function personalDp(Request $request)
    {


        $update = Auth::user();



        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/display', $filename);
            $update->display_picture =  $filename;
        }
        $update->update();

        return back()->with('status', 'Personal Details Updated Successfully');
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
