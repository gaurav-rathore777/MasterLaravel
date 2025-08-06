@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Addon Benefit</h1>

    <form action="{{ route('addon.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Icon Class</label>
            <input type="text" name="icon_class" class="form-control" placeholder="e.g. fas fa-mobile-alt" required>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('addon.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
