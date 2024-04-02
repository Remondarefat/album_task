<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use App\Models\Album; // Don't forget to import the Album model
use Illuminate\Support\Facades\Storage;
class PictureController extends Controller
{ // Show the form for creating a new picture.
    public function create(Request $request)
    {
        $album_id = $request->query('album_id');
        return view('pictures.create', compact('album_id'));
    }

    // Store a newly created picture in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => 'required|exists:albums,id'
        ]);

        // Get the album associated with the picture
        $album = Album::findOrFail($request->album_id);

        // Upload the file using Laravel MediaLibrary and get the media instance
        $media = $album->addMedia($request->file('file_path'))->toMediaCollection('pictures');

        // Create a new picture instance and associate it with the album
        $picture = new Picture;
        $picture->name = $request->name;
        $picture->album_id = $album->id;
        $picture->file_path = $media->getPath(); // Get the file path from the media instance
        $picture->save();

        return redirect()->route('albums.show', $album->id)
        ->with('success', 'Picture uploaded successfully.');
    }


    // Remove the specified picture from storage.
    public function destroy(Picture $picture)
    {
        $picture->delete();

        // Redirect back to the album's show page
        return redirect()->route('albums.show', $picture->album_id)
            ->with('success', 'Picture deleted successfully.');
    }
}
