@extends('layouts.app')

@section('content')
    <h3>Add New Contact</h3>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        @include('admin.contacts._form', ['contact' => new \App\Models\Contact])
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
