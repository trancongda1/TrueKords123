<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chord extends Model
{
    use HasFactory;

    protected $fillable = ['song_id', 'name', 'content'];

    // Quan hệ ngược lại với Song
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
