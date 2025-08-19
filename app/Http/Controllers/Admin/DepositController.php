<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{

    public function showDepositRequests()
    {

        $data['deposit'] = User::join('deposits', 'users.id', '=', 'deposits.user_id')
            ->get(['users.email', 'users.first_name', 'users.last_name', 'deposits.*']);

        return view('admin.manage_deposit', $data);
    }
    public function approveDeposit($id)
    {
        $user = Deposit::findOrFail($id);
        $user->status = 1; // Assuming 1 means 'approved'
        $user->save();

        return redirect()->route('admin.deposit.index')->with('status', 'Deposit approved successfully!');
    }

    public function rejectDeposit($id)
    {
        $user = Deposit::findOrFail($id);
        $user->status = 2; // Assuming 2 means 'rejected'
        $user->save();

        return redirect()->route('admin.deposit.index')->with('status', 'Deposit rejected successfully!');
    }
}
