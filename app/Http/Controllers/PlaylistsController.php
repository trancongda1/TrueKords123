<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistsController extends Controller
{
    public function index()
    {
        // Lấy tất cả các playlist từ cơ sở dữ liệu
        $playlists = Playlist::all();

        // Truyền biến playlists sang view
        return view('songs', compact('playlists'));
    }
}
