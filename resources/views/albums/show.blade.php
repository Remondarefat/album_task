@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Album Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $album->name }}</h5>
            <p class="card-text">Created at: {{ $album->created_at }}</p>
            <p class="card-text">Updated at: {{ $album->updated_at }}</p>
        </div>
    </div>

    <h2 class="mt-4">Pictures in this Album</h2>
    
    <div class="row mt-3">
        @foreach($album->pictures as $picture)
        <div class="col-md-4 mb-3">
            <div class="card">
                <!-- Display Picture Name -->
                <div class="card-header">{{ $picture->name }}</div>
                <!-- Display Picture -->
                <img src="{{"file://". $picture->file_path}}" class="card-img-top" alt="{{ $picture->name }}">
                <div class="card-body">
                    <p class="card-text">Created at: {{ $picture->created_at }}</p>
                    <p class="card-text">Updated at: {{ $picture->updated_at }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Add a button to create a new picture in this album -->
    <a href="{{ route('pictures.create', ['album_id' => $album->id]) }}" class="btn btn-primary">Upload Picture</a>




</div>
@endsection
