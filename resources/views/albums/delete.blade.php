@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Delete Album</h2>
    <p>Are you sure you want to delete this album?</p>
    <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Delete Album</button>
        </div>
    </form>
</div>
@endsection
