<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ]);

        Contact::create($request->only(['name', 'designation', 'phone', 'email', 'icon_class']));

        return redirect()->route('frontend.contacts.index')->with('success', 'Contact added successfully');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $contact->update($request->all());
        return redirect()->route('frontend.contacts.index')->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('frontend.contacts.index')->with('success', 'Contact deleted');
    }
}
