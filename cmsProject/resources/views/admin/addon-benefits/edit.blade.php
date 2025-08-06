@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Addon Benefit</h1>

    <form action="{{ route('addon.update', ['addon' => $addon_benefit->id]) }}" method="POST">

        @csrf @method('PUT')

        <div class="mb-3">
            <label>Icon Class</label>
            <input type="text" name="icon_class" class="form-control" value="{{ $addon_benefit->icon_class }}" required>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $addon_benefit->title }}" required>
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $addon_benefit->subtitle }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('addon.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
