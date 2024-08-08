<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{

    public function index()
    {
        $artists = Artist::all();
        return view('users.top-artists', compact('artists'));
    }

    // Show a specific artist for users
    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('users.show', compact('artist'));
    }

    // Show all artists for admin

    public function indexAdmin()
    {

        $artists = Artist::all();

        return view('admin.top-artists', compact('artists'));
    }

    // Show form to create a new artist for admin
    public function create()
    {
        return view('admin.create-artist');
    }

    // Store a new artist for admin
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_featured' => 'required|boolean',
            'country' => 'required',
            'birth_year' => 'required|integer',
            // Add more validation rules for other fields as needed
        ]);

        Artist::create($request->all());

        return redirect()->route('admin.artists.index');
    }


    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('admin.edit-artist', compact('artist'));
    }

    // Update an artist for admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'is_featured' => 'required|boolean',
            'country' => 'required',
            'birth_year' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        $artist = Artist::findOrFail($id);
        $artist->update($request->all());

        return redirect()->route('admin.artists.index')->with('success', 'Artist updated successfully!');
    }



    // Delete an artist for admin
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->route('admin.artists.index');
    }
}
