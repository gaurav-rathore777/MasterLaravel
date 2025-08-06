@extends('layouts.app')

@section('content')
    <h3>Edit Contact</h3>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.contacts._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
