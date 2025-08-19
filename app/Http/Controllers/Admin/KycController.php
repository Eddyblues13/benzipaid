<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showKycRequests()
    {
        // Fetch all users with KYC uploaded
        $kyc = User::whereNotNull('id_document')
            ->whereNotNull('proof_address')
            ->where('kyc_status', 0) // Assuming 0 means 'pending'
            ->select('id', 'first_name', 'last_name', 'email', 'id_document', 'proof_address', 'kyc_status') // Select specific columns
            ->get();


        return view('admin.manage_kyc', compact('kyc'));
    }

    public function approveKyc($id)
    {
        $user = User::findOrFail($id);
        $user->kyc_status = 1; // Assuming 1 means 'approved'
        $user->save();

        return redirect()->route('admin.kyc.index')->with('status', 'KYC approved successfully!');
    }

    public function rejectKyc($id)
    {
        $user = User::findOrFail($id);
        $user->kyc_status = 2; // Assuming 2 means 'rejected'
        $user->save();

        return redirect()->route('admin.kyc.index')->with('status', 'KYC rejected successfully!');
    }
}
