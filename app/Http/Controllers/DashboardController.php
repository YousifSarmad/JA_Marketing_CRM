<?php

namespace App\Http\Controllers;

use App\Models\Lead; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Fetch the budget for the user and related leads
        $budget = $user->budget->amount ?? 0;
        $leads = Lead::where('user_id', $user->id)->get();

        return inertia('Dashboard', [
            'user' => $user,
            'budget' => $budget,
            'leads' => $leads,
        ]);
    }
}

