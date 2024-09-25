<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BudgetController extends Controller
{
    // Show budget calculator
    public function create()
    {
        return Inertia::render('Budget/Create');
    }

    // Store calculated budget
    public function store(Request $request)
    {
        $request->validate([
            'total_budget' => 'required|numeric',
            'daily_budget' => 'required|numeric',
            'leads_purchased' => 'required|integer',
        ]);

        $user = auth()->user();

        Budget::create([
            'user_id' => $user->id,
            'total_budget' => $request->total_budget,
            'daily_budget' => $request->daily_budget,
            'leads_purchased' => $request->leads_purchased,
            'remaining_leads' => $request->leads_purchased,
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ]);

        return redirect()->route('payment');
    }
}
