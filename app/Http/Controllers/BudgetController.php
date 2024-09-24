<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function create()
    {
        return inertia('Budget/Create');
    }

    public function store(Request $request)
    {
        // Calculate estimated leads and revenue
        $validated = $request->validate([
            'daily_ad_spend' => 'required|numeric|min:1',
        ]);

        $user = auth()->user();
        $budget = Budget::create([
            'user_id' => $user->id,
            'daily_ad_spend' => $validated['daily_ad_spend'],
            'remaining_budget' => $validated['daily_ad_spend'],
        ]);

        return redirect()->route('dashboard')->with('message', 'Budget set successfully');
    }

    public function show(Budget $budget)
    {
        return inertia('Budget/Show', ['budget' => $budget]);
    }
}
