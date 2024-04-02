<!-- albums/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Album</h1>

    <form action="{{ route('albums.update', $album) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Album Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $album->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
