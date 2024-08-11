<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'song_id', 'rating'];

    // Casting để đảm bảo 'rating' là số nguyên
    protected $casts = [
        'rating' => 'integer',
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Quan hệ với Song
    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id');
    }
}
