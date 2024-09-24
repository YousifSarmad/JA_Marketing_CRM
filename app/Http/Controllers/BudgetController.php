<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;

class BudgetController extends Controller
{
    public function create()
    {
        return inertia('BudgetCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $user = auth()->user();
        $user->budget()->create([
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Budget set successfully!');
    }
}
