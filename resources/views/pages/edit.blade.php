{{-- resources/views/pages/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Location')

@section('content')
<div class="container">
    <h2>Edit Location</h2>
    <form action="{{ route('update', $location->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Metode PUT untuk update --}}

        <div class="form-group mb-3">
            <label for="lokasi">Lokasi:</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $location->lokasi }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="longitude">Longitude:</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $location->longitude }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="latitude">Latitude:</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $location->latitude }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="potensial" {{ $location->status == 'potensial' ? 'selected' : '' }}>Potensial</option>
                <option value="tidak potensial" {{ $location->status == 'tidak potensial' ? 'selected' : '' }}>Tidak Potensial</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
