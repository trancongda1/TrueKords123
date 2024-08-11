<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'artist', 'album'];

    // Quan hệ 1-n với Chord
    public function chords()
    {
        return $this->hasMany(Chord::class);
    }

 
    // Quan hệ 1-n với Like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Quan hệ 1-n với Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Quan hệ n-n với Playlist qua PlaylistSong
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_songs');
    }
}

