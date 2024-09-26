<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Budget;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Fetch budget for the user, assuming you have a budget relationship
        $budget = Budget::where('user_id', $user->id)->first()->amount ?? 0;

        // Fetch leads associated with the user
        $leads = Lead::where('assigned_user_id', $user->id)->get();

        return inertia('Dashboard', [
            'user' => $user,
            'budget' => $budget,
            'leads' => $leads,
        ]);
    }
}


