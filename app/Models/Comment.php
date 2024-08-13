<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Các cột có thể được gán hàng loạt
    protected $fillable = [
        'user_id',
        'song_id',
        'content',
    ];

    /**
     * Lấy người dùng liên kết với bình luận.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Lấy bài hát liên kết với bình luận.
     */
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
