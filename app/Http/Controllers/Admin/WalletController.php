<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    // Display a listing of the wallets
    public function index()
    {
        $wallets = Wallet::all();
        return view('admin.wallets.index', compact('wallets')); // Adjust to the actual Blade template location
    }

    // Show the form for creating a new wallet
    public function create()
    {
        return view('admin.wallets.create'); // Adjust to the actual Blade template location
    }

    // Store a newly created wallet
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'wallet_name' => 'required|string|max:255',
            'wallet_address' => 'required|string|max:255',
            'barcode' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle file upload
        $barcodeFilename = null;
        if ($request->hasFile('barcode')) {
            $file = $request->file('barcode');
            $ext = $file->getClientOriginalExtension();
            $barcodeFilename = time() . '.' . $ext;
            $file->move(public_path('admin/uploads/barcodes'), $barcodeFilename);
        }

        // Create a new wallet
        Wallet::create([
            'wallet_name' => $request->wallet_name,
            'wallet_address' => $request->wallet_address,
            'barcode' => $barcodeFilename,
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet created successfully.');
    }


    // Show the form for editing the specified wallet
    public function edit($id)
    {
        $wallet = Wallet::findOrFail($id);
        return view('admin.wallets.edit', compact('wallet')); // Adjust to the actual Blade template location
    }

    // Update the specified wallet in storage
    // Update the specified wallet
    public function update(Request $request, Wallet $wallet)
    {
        // Validate the request
        $request->validate([
            'wallet_name' => 'required|string|max:255',
            'wallet_address' => 'required|string|max:255',
            'barcode' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('barcode')) {
            $file = $request->file('barcode');
            $ext = $file->getClientOriginalExtension();
            $barcodeFilename = time() . '.' . $ext;
            $file->move(public_path('admin/uploads/barcodes'), $barcodeFilename);

            // Delete old barcode if exists
            if ($wallet->barcode && file_exists(public_path('admin/uploads/barcodes/' . $wallet->barcode))) {
                unlink(public_path('admin/uploads/barcodes/' . $wallet->barcode));
            }

            $wallet->barcode = $barcodeFilename;
        }

        // Update the wallet
        $wallet->update([
            'wallet_name' => $request->wallet_name,
            'wallet_address' => $request->wallet_address,
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet updated successfully.');
    }
    // Remove the specified wallet from storage
    public function destroy($id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();

        return redirect()->route('wallets.index')->with('success', 'Wallet Type Deleted Successfully!');
    }
}
