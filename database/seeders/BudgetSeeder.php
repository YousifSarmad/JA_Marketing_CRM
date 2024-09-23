<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Budget;

class BudgetSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        
        foreach ($users as $user) {
            Budget::create([
                'user_id' => $user->id,
                'amount' => 100.00, // Initial budget amount for each user
            ]);
        }
    }
}

