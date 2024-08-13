<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    // Quan hệ 1-n với PlaylistSong
    public function playlistSongs()
    {
        return $this->hasMany(PlaylistSong::class);
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'playlist_songs', 'playlist_id', 'song_id');
    }

    // Quan hệ ngược lại với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

