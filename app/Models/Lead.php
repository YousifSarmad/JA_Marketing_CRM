<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'lead_value',
        'status',
        'lost_reason',
        'closed_at',
        'user_id', // reference to the user who owns this lead
        'lead_source_id', // reference to the source of the lead
        'lead_type_id',   // reference to the type of the lead
        'lead_pipeline_id', // optional, lead pipeline association
        'lead_stage_id', // reference to the stage of the lead
    ];

    // Define the relationships

    // Lead belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Lead belongs to a LeadSource
    public function leadSource()
    {
        return $this->belongsTo(LeadSource::class);
    }

    // Lead belongs to a LeadType
    public function leadType()
    {
        return $this->belongsTo(LeadType::class);
    }

    // Lead belongs to a LeadPipeline
    public function leadPipeline()
    {
        return $this->belongsTo(LeadPipeline::class);
    }

    // Lead belongs to a LeadStage
    public function leadStage()
    {
        return $this->belongsTo(LeadStage::class);
    }
}
