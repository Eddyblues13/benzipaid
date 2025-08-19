<?php

namespace App\Http\Controllers\Admin;

use App\Models\TradingPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TradingPlanController extends Controller
{
    public function create()
    {
        return view('admin.create-trading-plan');
    }

    // Store a new trading plan
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'duration' => 'required|string|max:255'
        ]);

        TradingPlan::create([
            'name' => $request->name,
            'min_amount' => $request->min_amount,
            'max_amount' => $request->max_amount,
            'duration' => $request->duration
        ]);

        return redirect()->back()->with('message', 'Trading plan added successfully.');
    }

    // View all trading plans
    public function index()
    {
        $tradingPlans = TradingPlan::all();
        return view('admin.view-trading-plans', compact('tradingPlans'));
    }

    // Show the form for editing a trading plan
    public function edit($id)
    {
        $tradingPlan = TradingPlan::findOrFail($id);
        return view('admin.edit-trading-plan', compact('tradingPlan'));
    }

    // Update the trading plan
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'duration' => 'required|string|max:255'
        ]);

        $tradingPlan = TradingPlan::findOrFail($id);
        $tradingPlan->update([
            'name' => $request->name,
            'min_amount' => $request->min_amount,
            'max_amount' => $request->max_amount,
            'duration' => $request->duration
        ]);

        return redirect()->route('admin.view-trading-plans')->with('message', 'Trading plan updated successfully.');
    }

    // Delete the trading plan
    public function destroy($id)
    {
        $tradingPlan = TradingPlan::findOrFail($id);
        $tradingPlan->delete();

        return redirect()->route('admin.view-trading-plans')->with('message', 'Trading plan deleted successfully.');
    }
}
