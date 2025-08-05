<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// app/Http/Controllers/Admin/ServiceController.php

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'key_services' => 'nullable|string',
            'why_it_matters' => 'required|string',
            'lead_by' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        // Handle file upload
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('uploads/icons', 'public');
        }
    
        // Create service
        Service::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'key_services' => $request->key_services,
            'why_it_matters' => $request->why_it_matters,
            'lead_by' => $request->lead_by,
            'icon' => $iconPath
        ]);
    
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }
    
    

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'key_services' => 'required|array',
            'why_it_matters' => 'required|string',
            'lead_by' => 'required|string',
        ]);

        $data['key_services'] = json_encode($data['key_services']);

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted!');
    }
   
}
