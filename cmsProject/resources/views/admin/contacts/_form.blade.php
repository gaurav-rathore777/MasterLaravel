<form action="{{ isset($contact->id) ? route('contacts.update', $contact->id) : route('contacts.store') }}" method="POST">
    @csrf
    @if(isset($contact->id))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input 
            type="text" 
            class="form-control" 
            id="name" 
            name="name" 
            value="{{ old('name', $contact->name ?? '') }}" 
            required>
    </div>

    <div class="mb-3">
        <label for="designation" class="form-label">Designation</label>
        <input 
            type="text" 
            class="form-control" 
            id="designation" 
            name="designation" 
            value="{{ old('designation', $contact->designation ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input 
            type="text" 
            class="form-control" 
            id="phone" 
            name="phone" 
            value="{{ old('phone', $contact->phone ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            value="{{ old('email', $contact->email ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="icon_class" class="form-label">Icon Class (FontAwesome)</label>
        <input 
            type="text" 
            class="form-control" 
            id="icon_class" 
            name="icon_class" 
            value="{{ old('icon_class', $contact->icon_class ?? 'fas fa-user-tie') }}">
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($contact->id) ? 'Update' : 'Create' }} Contact
    </button>
</form>
