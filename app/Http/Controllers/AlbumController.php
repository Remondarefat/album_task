<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Picture;

class AlbumController extends Controller
{
    // Display a listing of the albums.
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    // Show the form for creating a new album.
    public function create()
    {
        return view('albums.create');
    }

    // Store a newly created album in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Album::create($request->all());

        return redirect()->route('albums.index')
            ->with('success', 'Album created successfully.');
    }

    // Display the specified album.
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    // Show the form for editing the specified album.
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    // Update the specified album in storage.
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $album->update($request->all());

        return redirect()->route('albums.index')
            ->with('success', 'Album updated successfully.');
    }


    public function movePictures(Request $request, Album $album)
    {
        $request->validate([
            'destination_album_id' => 'required|exists:albums,id',
            'picture_ids' => 'required|array',
            'picture_ids.*' => 'exists:pictures,id',
        ]);

        $destinationAlbum = Album::findOrFail($request->destination_album_id);
        $pictureIds = $request->picture_ids;

        // Move selected pictures to the destination album
        Picture::whereIn('id', $pictureIds)->update(['album_id' => $destinationAlbum->id]);

        return redirect()->route('albums.index')->with('success', 'Pictures moved successfully.');
    }

    // Remove the specified album from storage.
    public function destroy(Album $album)
    {
        // dd($album);
        $album->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Album deleted successfully.');
    }


}
