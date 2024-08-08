<?php
// app/Models/Song.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'title', 'artist_id', 'search_count', 'is_hot', 'genre_id', 'release_year', 'audio_path' ,'language_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
