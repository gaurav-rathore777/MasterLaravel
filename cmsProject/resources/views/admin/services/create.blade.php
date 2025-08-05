@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Service</h1>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input.</strong><br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Create form --}}
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="icon" class="form-label">Service Icon (Image)</label>
            <input type="file" name="icon" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Service Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="key_services" class="form-label">Key Services (Comma Separated)</label>
            <input type="text" name="key_services" class="form-control" placeholder="e.g., Consulting, Analysis, Support" value="{{ old('key_services') }}">
        </div>

        <div class="mb-3">
            <label for="why_it_matters" class="form-label">Why It Matters</label>
            <textarea name="why_it_matters" class="form-control" rows="3" required>{{ old('why_it_matters') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="lead_by" class="form-label">Lead By</label>
            <input type="text" name="lead_by" class="form-control" value="{{ old('lead_by') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Save Service</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
