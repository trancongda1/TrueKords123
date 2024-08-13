<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    protected $table = 'playlist_songs';

   
    protected $fillable = ['playlist_id', 'song_id'];
    // Quan hệ ngược lại với Playlist
    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    // Quan hệ ngược lại với Song
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
    
}
