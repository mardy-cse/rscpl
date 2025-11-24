<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle checkbox - if not checked, set to false
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        // Convert features from newline-separated string to array
        if ($request->filled('features')) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $request->features)));
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle checkbox - if not checked, set to false
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                \Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        // Convert features from newline-separated string to array
        if ($request->filled('features')) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $request->features)));
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image) {
            \Storage::disk('public')->delete($service->image);
        }
        
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
