<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Trong model Like
class Language extends Model
{
    protected $fillable = ['name'];

    public function songs()
    {
        return $this->hasMany(Song::class, 'language_id');
    }

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
