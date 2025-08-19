<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InvestmentPlan;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    // Display a listing of the plans
    public function index()
    {
        $plans = InvestmentPlan::all();
        return view('admin.investment-plans', compact('plans'));
    }

    // Show the form for creating a new plan
    public function create()
    {
        return view('admin.create-plan');
    }

    // Store a newly created plan in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_deposit' => 'required|numeric',
            'max_deposit' => 'required|numeric',
            'percentage' => 'required|numeric',
            'duration' => 'required|string',
        ]);

        InvestmentPlan::create($request->all());

        return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
    }

    // Show the form for editing the specified plan
    public function edit($id)
    {
        $plan = InvestmentPlan::findOrFail($id);
        return view('admin.edit-plan', compact('plan'));
    }

    // Update the specified plan in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_deposit' => 'required|numeric',
            'max_deposit' => 'required|numeric',
            'percentage' => 'required|numeric',
            'duration' => 'required|string',
        ]);

        $plan = InvestmentPlan::findOrFail($id);
        $plan->update($request->all());

        return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
    }

    // Remove the specified plan from storage
    public function destroy($id)
    {
        $plan = InvestmentPlan::findOrFail($id);
        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'Plan deleted successfully.');
    }
}
