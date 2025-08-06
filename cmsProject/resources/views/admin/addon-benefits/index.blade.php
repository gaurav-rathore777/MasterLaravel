@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Addon Benefits</h1>

    <a href="{{ route('addon.create') }}" class="btn btn-primary mb-3">Add New Benefit</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Icon Class</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($addons as $addon)
            <tr>
                <td>{{ $addon->id }}</td>
                <td><i class="{{ $addon->icon_class }}"></i> <small>{{ $addon->icon_class }}</small></td>
                <td>{{ $addon->title }}</td>
                <td>{{ $addon->subtitle }}</td>
                <td>
                    <a href="{{ route('addon.edit', $addon->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('addon.destroy', $addon->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this benefit?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $addons->links() }}
</div>
@endsection
