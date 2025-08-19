<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithdrawalController extends Controller
{


    public function manageWithdrawalsPage()
    {

        $data['withdrawals'] = User::join('withdrawals', 'users.id', '=', 'Withdrawals.user_id')
            ->get(['users.email', 'users.name', 'withdrawals.*']);

        return view('admin.manage_Withdrawal', $data);
    }

    // Process (approve) a pending Withdrawal
    public function processWithdrawal($id)
    {
        $Withdrawal = Withdrawal::findOrFail($id);
        if ($Withdrawal->status == 0) {
            $Withdrawal->status = 1; // Mark as processed
            $Withdrawal->save();

            // You can also implement any additional logic such as updating user's account balance here
        }

        return redirect()->back()->with('success', 'Withdrawal successfully processed.');
    }

    // Delete a Withdrawal
    public function deleteWithdrawal($id)
    {
        $Withdrawal = Withdrawal::findOrFail($id);
        $Withdrawal->delete();

        return redirect()->back()->with('success', 'Withdrawal deleted successfully.');
    }

    public function viewWithdrawal($user_id, $withdrawal_id)
    {

        $data['withdrawal_details']  = Withdrawal::findOrFail($withdrawal_id);
        $data['user_details']  = User::findOrFail($user_id);


        return view('admin.user_withdrawal', $data);
    }
}
