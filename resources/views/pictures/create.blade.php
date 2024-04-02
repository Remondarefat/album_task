<!-- pictures/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Upload Picture</h1>

    <form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Picture Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="file">Picture File</label>
            <input type="file" class="form-control-file" id="file" name="file_path" required>
        </div>
          <input type="hidden" name="album_id" value="{{ $album_id }}">
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
