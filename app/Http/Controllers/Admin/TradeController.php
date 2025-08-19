<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Display a listing of the trades
    public function index()
    {
        $trades = Trade::with('user')->get();
        return view('admin.investments.index', compact('trades'));
    }

    // Show the form for editing the specified trade
    public function edit($id)
    {
        $trade = Trade::findOrFail($id);
        return view('admin.investments.edit', compact('trade'));
    }

    // Update the specified trade in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'plan' => 'required|string',
            'amount' => 'required|numeric',
            'coin' => 'required|string',
            'method' => 'required|string',
        ]);

        $trade = Trade::findOrFail($id);
        $trade->update($request->all());

        return redirect()->route('trades.index')->with('success', 'Trade updated successfully.');
    }

    // Approve a trade
    public function approve($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->update(['status' => 'approved']);

        return redirect()->route('trades.index')->with('success', 'Trade approved successfully.');
    }

    // Delete the specified trade
    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->delete();

        return redirect()->route('trades.index')->with('success', 'Trade deleted successfully.');
    }
}
