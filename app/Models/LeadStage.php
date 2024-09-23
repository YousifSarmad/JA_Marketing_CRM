<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pipeline_id'];

    // Relationship with Pipeline
    public function pipeline()
    {
        return $this->belongsTo(LeadPipeline::class);
    }

    // Relationship with Leads
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
