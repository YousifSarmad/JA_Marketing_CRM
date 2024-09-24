<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use Inertia\Inertia;
use App\Http\Controllers\LeadController;

// Home route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Budget Routes
Route::get('/budget/create', [BudgetController::class, 'create'])->name('budget.create');
Route::post('/budget', [BudgetController::class, 'store'])->name('budget.store');

// Payment Routes
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession']);
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

// Route to display form for creating a new lead
Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');

// Route to store the new lead in the database
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

// Route to display all leads (this is what redirects to after storing a lead)
Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');

Route::get('/dashboard', [LeadController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


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

Route::get('/budget/create', [BudgetController::class, 'create'])->name('budget.create');
Route::post('/budget', [BudgetController::class, 'store'])->name('budget.store');


require __DIR__.'/auth.php';
