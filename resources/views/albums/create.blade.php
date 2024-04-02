<!-- albums/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New Album</h1>

    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Album Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
