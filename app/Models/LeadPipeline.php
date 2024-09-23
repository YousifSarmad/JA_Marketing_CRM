<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadPipeline extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship with Leads
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
