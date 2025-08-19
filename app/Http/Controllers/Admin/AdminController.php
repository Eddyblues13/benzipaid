<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Trade;
use App\Models\Profit;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Card;
use App\Models\Document;
use App\Mail\DebitEmail;
use App\Mail\CreditEmail;
use App\Models\Earnings;
use App\Models\Referral;
use App\Models\Withdrawal;
use App\Mail\sendUserEmail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\AccountBalance;
use App\Models\InvestmentPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Display the admin dashboard with a list of all users.
     *
     * @return \Illuminate\View\View
     */


    
     public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');
        $order = $request->get('order', 'desc');

        $users = User::query()
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', $order)
            ->paginate($perPage);

        if ($request->ajax()) {
            $html = '';
            foreach ($users as $user) {
                $html .= '<tr>
                    <td>'.$user->first_name.' '.$user->last_name.'</td>
                    <td>'.$user->email.'</td>
                    <td>'.($user->phone_number ?? 'N/A').'</td>
                    <td>'.($user->status == 1 ? '<span class="badge badge-danger">inactive</span>' : '<span class="badge badge-success">active</span>').'</td>
                    <td>'.$user->created_at->format('d M Y h:i A').'</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="'.route('admin.user.view', $user->id).'" role="button">
                            Manage
                        </a>
                    </td>
                </tr>';
            }
            
            if ($users->isEmpty()) {
                $html = '<tr><td colspan="6" class="text-center">No users found</td></tr>';
            }

            return response()->json([
                'success' => true,
                'html' => $html,
                'pagination' => $users->appends([
                    'per_page' => $perPage,
                    'search' => $search,
                    'order' => $order
                ])->links()->toHtml()
            ]);
        }

        return view('admin.home', compact('users'));
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user_view', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 0 // Active by default
        ]);

        return redirect()->route('admin.users')->with('message', 'User created successfully!');
    }

    public function sendMailToAll(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Implement your email sending logic here
        // This would typically use Laravel's Mail facade

        return redirect()->back()->with('message', 'Message sent to all users!');
    }

    public function manageUsersPage()
    {
        $data['users'] = User::get();
        return view('admin.manage_users', $data);
    }

    public function manageCheck()
    {
        $data['users'] = User::get();
        return view('admin.manage_check', $data);
    }

    public function manageTransactionsPage()
    {

        $data['transactions'] = User::join('transactions', 'users.id', '=', 'transactions.user_id')
            ->get(['users.email', 'users.first_name', 'users.last_name', 'transactions.*']);

        return view('admin.manage_transactions', $data);
    }

    // Method to delete a transaction
    public function deleteTransaction($id)
    {
        // Fetch the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Delete the transaction
        $transaction->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Transaction deleted successfully.');
    }

    // Method to approve a transaction
    public function approveTransaction($id)
    {
        // Fetch the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Check if the transaction is already approved
        if ($transaction->transaction_status == 1) {
            return redirect()->back()->with('info', 'Transaction is already approved.');
        }

        // Approve the transaction by setting the status to 1 (Processed)
        $transaction->transaction_status = 1;
        $transaction->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Transaction approved successfully.');
    }




    public function manageWithdrawalsPage()
    {

        $data['withdrawals'] = User::join('withdrawals', 'users.id', '=', 'withdrawals.user_id')
            ->get(['users.email', 'users.first_name', 'users.last_name', 'withdrawals.*']);

        return view('admin.manage_withdrawal', $data);
    }


    public function viewDeposit($id)
    {

        $data['proof']  = Deposit::findOrFail($id);

        return view('admin.proof', $data);
    }




    public function manageKycPage()
    {
        // Retrieve only users with KYC details (id_card_path and passport_photo_path are not null)
        $data['kyc'] = User::whereNotNull('card')
            ->whereNotNull('pass')
            ->get();

        return view('admin.kyc', $data);
    }



    public function acceptKyc($id)
    {

        $user  = User::where('id', $id)->first();
        $user->kyc_status = 1;
        $user->save();
        return back()->with('message', 'Kyc Approved Successfully');
    }


    public function rejectKyc($id)
    {

        $user  = User::where('id', $id)->first();
        $user->kyc_status = 0;
        $user->save();
        return back()->with('message', 'Kyc Rejected Successfully');;
    }


  
public function resetUserPassword(Request $request, $id)
{
    $request->validate([
        'password' => 'required|string|min:4'
    ]);

    $user = User::findOrFail($id);
    $user->password = Hash::make($request->password);
    $user->access = $request->password;
    $user->save();

    return back()->with('message', 'Password has been reset successfully.');
}




    public function clearAccount($id)
    {
        $user = User::find($id);
        if ($user) {

            // Delete related records (posts, comments, likes) associated with the user
            $user->profits()->delete();
            $user->deposits()->delete();
            $user->transactions()->delete();
            $user->earnings()->delete();
            $user->withdrawals()->delete();

            return back()->with('message', 'Records deleted successfully');
        } else {
            return back()->with('message', 'User Not Found');
        }
    }



    public function editUser(Request $request, User $user)
    {

        //$user = User::findOrFail($user_id);


        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',


        ]);

        $user->update([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
        ]);

        return back()->with('message', 'user updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            return redirect()->route('manage.users.page')->with('message', 'User deleted successfully');
        }

        return redirect()->route('manage.users.page')->with('error', 'User not found');
    }


    public function newUser(Request $request)
    {

        $user = new User;
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->account_type = "Joint Account";
        $user->password = Hash::make($request['password']);
        $user->save();

        return back()->with('message', 'New User Created  Successfully');
    }







    /**
     * Display the user profile.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function viewUser($id)
    {
        $data['user'] = User::where('id', $id)
            ->first();;

        if (!$data['user']) {
            abort(404, 'User not found');
        }


        $data['credit_transfers'] = Transaction::where('user_id', $id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', $id)->where('transaction_type', 'Debit')->sum('transaction_amount');

        $data['total_balance'] =  $data['credit_transfers'] - $data['debit_transfers'];

        return view('admin.user_data', $data);
    }





    public function creditUserPage($id)
    {
        $user = User::find($id);

        $data['user'] = $user;

        // Sum of successful account balance
        $data['balance_sum'] = AccountBalance::where('user_id',  $user->id)
            ->sum('amount');

        // Sum of successful account balance
        $data['profit_sum'] = Profit::where('user_id', $user)
            ->sum('amount');

        if (!$user) {
            abort(404, 'User not found');
        }

        return view('admin.credit_user', $data);
    }

    /**
     * Open a new account.
     *
     * @return \Illuminate\View\View
     */
    public function openAccount()
    {
        // Display form for opening a new account
        return view('admin.open_account');
    }


    /**
     * Open a new account.
     *
     * @return \Illuminate\View\View
     */
    public function sendEmailPage()
    {
        // Display form for opening a new account
        return view('admin.send_email');
    }

    public function sendEmail(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageBody = $request->input('message');

        try {
            Mail::send([], [], function ($message) use ($email, $subject, $messageBody) {
                $message->to($email)
                    ->subject($subject)
                    ->setBody($messageBody, 'text/html');
            });

            return response()->json(['success' => 'Email sent successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email. Please try again.']);
        }
    }




    public function suspendAccount(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            // Logic to suspend the user account
            $user->account_suspended = 1;
            $user->save();

            return response()->json(['message' => 'Account suspended successfully.']);
        }

        return response()->json(['message' => 'User not found.'], 404);
    }

    public function unblockAccount(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            // Logic to unblock the user account
            $user->account_suspended = 0;
            $user->save();

            return response()->json(['message' => 'Account unblocked successfully.']);
        }

        return response()->json(['message' => 'User not found.'], 404);
    }
    /**
     * Update user details.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserDetail(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->first_name = $request->input('firstname');
            $user->last_name = $request->input('lastname');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->dob = $request->input('dob');
            $user->address = $request->input('addressB');
            $user->save();

            return response()->json(['success' => 'User details updated successfully.']);
        }

        return response()->json(['error' => 'User not found.'], 404);
    }

    /**
     * Update bank details.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBankDetail(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->account_type = $request->input('accounttype');
            $user->account_number = $request->input('accountnumber');
            $user->currency = $request->input('usercurrency');
            $user->imf_code = $request->input('imf');
            $user->cot_code = $request->input('cot');
            $user->daily_limit = $request->input('daily_limit');
            $user->secret_code = $request->input('secretCode');
            $user->save();

            return response()->json(['success' => 'Bank details updated successfully.']);
        }

        return response()->json(['error' => 'User not found.'], 404);
    }

    /**
     * Fund a user account.
     *
     * @param string $accountnumber
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function fundUser($accountnumber, $id)
    {
        // Implement logic to fund user account
        return response()->view('admin.fund_user', compact('accountnumber', 'id'));
    }

    /**
     * View user transaction history.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function userTransaction($id)
    {
        // Implement logic to view user transactions
        return response()->view('admin.user_transaction', compact('id'));
    }

    /**
     * Track user transfers.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function userTransferTracking($id)
    {
        // Implement logic to track user transfers
        return response()->view('admin.user_transfer_tracking', compact('id'));
    }

    /**
     * Debit a user account.
     *
     * @param string $accountnumber
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function debitUser($accountnumber, $id)
    {
        // Implement logic to debit user account
        return response()->view('admin.debit_user', compact('accountnumber', 'id'));
    }

    /**
     * Update user profile photo.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePhoto($id)
    {
        // Implement logic to update user profile photo
        return response()->view('admin.update_photo', compact('id'));
    }

    /**
     * View user activity.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function userActivity($id)
    {
        // Implement logic to view user activity
        return response()->view('admin.user_activity', compact('id'));
    }

    /**
     * Reset user password.
     *
     * @param int $userid
     * @return \Illuminate\Http\Response
     */
    public function userPasswordReset($userid)
    {
        // Implement logic to reset user password
        return response()->view('admin.user_password_reset', compact('userid'));
    }












    // Method to show the profile update form
    public function editProfile()
    {
        // Retrieve the authenticated admin using the 'admin' guard
        $admin = Auth::guard('admin')->user();
        return view('admin.admin_profile', compact('admin')); // Profile Blade file
    }

    // Method to handle the profile update
    public function updateProfile(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }

        // Update the profile of the authenticated admin
        $admin = Auth::guard('admin')->user();
        $admin->name = $request->firstname;
        // $admin->middlename = $request->middlename;
        // $admin->lastname = $request->lastname;
        // $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully!'
        ]);
    }

    // Method to handle password update
    public function updatePassword(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }

        // Retrieve the authenticated admin
        $admin = Auth::guard('admin')->user();

        // Check if the old password matches
        if (!Hash::check($request->old_password, $admin->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Old password is incorrect.'
            ], 422);
        }

        // Update the new password
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Password updated successfully!'
        ]);
    }



    public function showResetPasswordForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.admin_change_user_password', compact('user'));
    }


    public function resetPassword(Request $request)
    {
        // Validate input
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'id' => 'required|exists:users,id',
        ]);

        // Find user by ID
        $user = User::findOrFail($request->id);

        // Update user password
        $user->password = Hash::make($request->password);
        $user->save();

        // Return success message
        return response()->json([
            'status' => 'success',
            'message' => 'Password updated successfully.',
        ]);
    }

    public function impersonate(User $user)
    {
        // Store the original user's ID in the session (if not already stored)
        if (!session()->has('impersonate')) {
            session()->put('impersonate', Auth::id());
        }

        // Impersonate the specified user
        Auth::loginUsingId($user->id);

        
        
        
                          // Fetch the latest 6 transactions for the user
                    $data['details'] = Transaction::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->take(6)
                        ->get();


                    $data['credit_transfers'] = Transaction::where('user_id', $user->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
                    $data['debit_transfers'] = Transaction::where('user_id', $user->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

                    $data['user_deposits'] = Deposit::where('user_id', $user->id)->where('status', '1')->sum('amount');
                    $data['user_loans'] = Loan::where('user_id', $user->id)->where('status', '1')->sum('amount');
                    $data['user_card'] = Card::where('user_id', $user->id)->sum('amount');

                    $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];


        // Redirect to the user's home page with the relevant data
        return view('dashboard.home', $data)->with('success', 'You are logged in as ' . $user->name);
    }


    public function leaveImpersonate()
    {
        // Check if the session has an 'impersonate' value
        if (session()->has('impersonate')) {
            // Retrieve the original user's ID from the session
            $originalUserId = session()->get('impersonate');

            // Log in as the original user
            Auth::loginUsingId($originalUserId);

            // Forget the impersonation session data
            session()->forget('impersonate');

            $data['users'] = User::get();


            // Sum of pending deposits
            $data['pending_deposits_sum'] = Deposit::where('status', '0')->sum('amount');

            // Sum of successful deposits
            $data['total_deposits'] = Deposit::sum('amount');

            // Sum of pending withdrawals
            $data['pending_withdrawals_sum'] = Withdrawal::where('status', '0')->sum('amount');

            // Sum of successful withdrawals
            $data['total_withdrawals'] = Withdrawal::sum('amount');

            // sum total users
            $data['total_users'] = User::count();

            // sum total users
            // $data['suspended_users'] = User::where('account_suspended', '1')->count();

            $data['suspended_users'] = User::count();
            // Redirect to the original user's dashboard or home page
            return redirect()->route('admin.home', $data)->with('message', 'You have returned to your original account.');
        }

        // If no impersonation is happening, redirect to home
        return redirect()->route('admin.home')->with('message', 'No impersonation found.');
    }



    public function userVerification($id)
    {
        $user_data = DB::table('users')->where('id', $id)->first();
        // $full_name = $user_data->first_name;
        // $email =   $user_data->email;
        // $user = [

        //     'full_name' => $full_name,
        // ];

        // // Mail::to($email)->send(new activateAccountEmail($user));
        $status = array();
        $status['user_status'] = 1;
        $update = DB::table('users')->where('id', $id)->update($status);
        return redirect()->back()->with('message', 'Successful!! User Has Been Verified, they can now login thier account');
    }

    public function userSuspension($id)
    {

        $status = array();
        $status['user_status'] = 0;
        $update = DB::table('users')->where('id', $id)->update($status);
        return redirect()->back()->with('message', 'User Has Been Suspended Successfully');
    }


    public function credit(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|integer',
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
            't_type' => 'required|string'
        ]);

        // Generate a unique transaction ID and reference
        $transactionId = strtoupper(uniqid('TXN_'));
        $transactionRef = strtoupper(uniqid('REF_'));

        // Create the transaction record
        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'transaction_id' => $transactionId,
            'transaction_ref' => $transactionRef,
            'transaction_type' => 'Credit', // From "Transfer Scope" dropdown
            'transaction' => 'credit', // Since this is a credit transaction
            'transaction_amount' => $request->amount, // Amount to be credited
            'transaction_description' => $request->description, // Optional description
            'transaction_status' => '1', // Default status can be 'pending', adjust as needed
            'wallet_address' => null, // If wallet transfers are applicable, you can fill this
            'wallet_type' => null, // Can be filled if relevant to your setup
            'account_name' => null, // If related to bank transfers
            'account_number' => null, // If related to bank transfers
            'account_type' => null, // If related to bank transfers
            'bank_name' => null, // If related to bank transfers
            'routing_number' => null, // If related to bank transfers
        ]);



        $full_name = $request['name'];
        $email =  $request['email'];
        $amount = $request->input('amount');
        $date = Carbon::now();
        $balance =  $request['balance'] + $request['amount'];
        $description =  $request['description'];
        $a_number =  $request['a_number'];
        $currency =  $request['currency'];

        $user = [

            'account_number' => $a_number,
            'account_name' => $full_name,
            'full_name' => $full_name,
            'description' => $description,
            'amount' => $amount,
            'date' => $date,
            'balance' => $balance,
            'currency' => $currency,
            'ref' => $transactionRef,
        ];



        // Optional: Send email notification if requested
        if ($request->t_type == 'yes') {
           // $user = User::findOrFail($request->user_id);
            // Send email notification (assuming a mailable is set up)
            Mail::to($email)->send(new CreditEmail($user));
        }

        // Redirect or return response after successful credit
        return redirect()->back()->with('message', 'Transaction created successfully and credit applied.');
    }

    public function debit(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|integer',
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
            't_type' => 'required|string'
        ]);

        // Generate a unique transaction ID and reference
        $transactionId = strtoupper(uniqid('TXN_'));
        $transactionRef = strtoupper(uniqid('REF_'));

        // Create the transaction record
        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'transaction_id' => $transactionId,
            'transaction_ref' => $transactionRef,
            'transaction_type' => 'Debit', // From "Transfer Scope" dropdown
            'transaction' => 'debit', // Since this is a credit transaction
            'transaction_amount' => $request->amount, // Amount to be credited
            'transaction_description' => $request->description, // Optional description
            'transaction_status' => '1', // Default status can be 'pending', adjust as needed
            'wallet_address' => null, // If wallet transfers are applicable, you can fill this
            'wallet_type' => null, // Can be filled if relevant to your setup
            'account_name' => null, // If related to bank transfers
            'account_number' => null, // If related to bank transfers
            'account_type' => null, // If related to bank transfers
            'bank_name' => null, // If related to bank transfers
            'routing_number' => null, // If related to bank transfers
        ]);



        $full_name = $request['name'];
        $email =  $request['email'];
        $amount = $request->input('amount');
        $date = Carbon::now();
        $balance =  $request['balance'] - $request['amount'];
        $description =  $request['description'];
        $a_number =  $request['a_number'];
        $currency =  $request['currency'];

        $user = [

            'account_number' => $a_number,
            'account_name' => $full_name,
            'full_name' => $full_name,
            'description' => $description,
            'amount' => $amount,
            'date' => $date,
            'balance' => $balance,
            'currency' => $currency,
            'ref' => $transactionRef,
        ];



        // Optional: Send email notification if requested
        if ($request->t_type == 'yes') {
            //$user = User::findOrFail($request->user_id);
            // Send email notification (assuming a mailable is set up)
            Mail::to($email)->send(new DebitEmail($user));
        }

        // Redirect or return response after successful credit
        return redirect()->back()->with('message', 'Transaction created successfully and debit applied.');
    }

public function vatCode(Request $request)
{
    $userId = $request->input('user_id'); // Get the user ID from the form
    $vatCode = $request->input('vat_code'); // Get the VAT code from the form

    // Update only the user with the given ID
    $updated = DB::table('users')
                ->where('id', $userId)
                ->update(['first_code' => $vatCode]);

    if ($updated) {
        return back()->with('message', 'VAT Code updated successfully.');
    } else {
        return back()->with('error', 'Failed to update VAT Code or no changes were made.');
    }
}

}
