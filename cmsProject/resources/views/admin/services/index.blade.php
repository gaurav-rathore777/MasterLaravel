@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Services</h1>

    <a href="{{ route('services.create') }}" class="btn btn-success mb-3">Add New Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($services->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>{{ Str::limit($service->description, 50) }}</td>
                <td>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this service?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @php
    $raw = $service->key_services;

    // Try to clean and decode if it's an invalid JSON string
    if (is_string($raw)) {
        $cleaned = str_replace(['[', ']', '"'], '', $raw); // remove brackets and quotes
        $keyServices = array_filter(explode(',', $cleaned));
    } else {
        $keyServices = [];
    }
@endphp

@if(count($keyServices))
    <ul>
        @foreach($keyServices as $key_service)
            <li>{{ trim($key_service) }}</li>
        @endforeach
    </ul>
@endif

    @else
    <p>No services found.</p>
    @endif
</div>
@endsection
