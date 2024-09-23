<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = ['name'];

    // Polymorphic relationship
    public function taggables()
    {
        return $this->morphToMany(Taggable::class, 'taggable');
    }
}