<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = ['file_name', 'file_path', 'file_type', 'fileable_id', 'fileable_type'];

    // Polymorphic relationship
    public function fileable()
    {
        return $this->morphTo();  // This allows the File model to belong to multiple models (Task, Lead, etc.)
    }
}
