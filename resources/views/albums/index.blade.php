<!-- albums/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Albums</h1>

    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Create New Album</a>

    <div class="row">
        @foreach ($albums as $album)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <p class="card-text">Number of Pictures: {{ $album->pictures->count() }}</p>
                        <a href="{{ route('albums.show', $album) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('albums.edit', $album) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('albums.destroy', $album) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this album?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
