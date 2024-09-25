<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_budget',
        'daily_budget',
        'leads_purchased',
        'remaining_leads',
        'start_date',
        'end_date'
    ];

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
