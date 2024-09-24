<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;  // Make sure to import the Lead model

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_user_id' => 'nullable|exists:users,id',  // Check if assigned user exists
        ]);

        // Create a new lead
        $lead = new Lead;
        $lead->title = $request->input('title');
        $lead->description = $request->input('description');
        $lead->assigned_user_id = $request->input('assigned_user_id');  // Assign the user
        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Lead created successfully!');
    }
    public function dashboard()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Fetch leads assigned to this user
        $leads = Lead::where('assigned_user_id', $user->id)->get();

        return Inertia::render('Dashboard', [
            'user' => $user,
            'leads' => $leads,
        ]);
    }
}
