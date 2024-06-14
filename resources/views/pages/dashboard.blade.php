@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@include('component.sidebar')
@include('component.content')

<div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="locationsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Status</th>
                            <th>Expired</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($locations ?? [] as $index => $location)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $location['lokasi'] }}</td>
                            <td>{{ $location['longitude'] }}</td>
                            <td>{{ $location['latitude'] }}</td>
                            <td>{{ $location['status'] }}</td>
                            <td>{{ $location['expiry_date'] }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('edit', $location['id']) }}" class="btn btn-primary">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('delete', $location['id']) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No locations available.</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('component.footer')

@endsection
