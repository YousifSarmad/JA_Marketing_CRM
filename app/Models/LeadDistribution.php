<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDistribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'user_id',
        'budget', // Budget assigned to the user for this lead
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Lead
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}

