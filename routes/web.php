<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

// Home route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard route
Route::get('/dashboard', function () {
    $user = Auth::user();
    
    // Fetch budget for the user
    $budget = $user->budget->amount ?? 0; // Assuming user has a relationship with the budget
    
    // Fetch leads for the user
    $leads = Lead::where('assigned_user_id', $user->id)->get();
    
    return Inertia::render('Dashboard', [
        'user' => $user,
        'budget' => $budget,
        'leads' => $leads,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Login route (this will render the custom Login.vue page)
Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

// Add a logout route (optional)
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

require __DIR__.'/auth.php';
