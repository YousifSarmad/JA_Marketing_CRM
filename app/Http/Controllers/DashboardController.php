<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $budget = $user->budget->amount ?? 0;

        return view('dashboard', compact('budget'));
        // You can pass user information, budget, leads data, etc.
        return inertia('Dashboard', [
            'user' => auth()->user(),
            'budget' => auth()->user()->budget, // assuming each user has a budget attribute
            'leads' => Lead::where('user_id', auth()->id())->get(),
        ]);
    }
}
