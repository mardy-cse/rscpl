<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class AboutContentController extends AdminController
{
    public function index()
    {
        $contents = AboutContent::ordered()->get();
        return view('admin.about.index', compact('contents'));
    }

    public function edit(AboutContent $aboutContent)
    {
        return view('admin.about.edit', compact('aboutContent'));
    }

    public function update(Request $request, AboutContent $aboutContent)
    {
        $validated = $request->validate([
            'section_key' => 'required|string',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($aboutContent->image) {
                Storage::disk('public')->delete($aboutContent->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        // Handle checkbox
        $validated['is_active'] = $request->has('is_active');

        $aboutContent->update($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'About content updated successfully.');
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'sections' => 'required|array',
            'sections.*.id' => 'required|exists:about_contents,id',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.subtitle' => 'nullable|string|max:255',
            'sections.*.content' => 'required|string',
            'sections.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        foreach ($request->sections as $sectionId => $data) {
            $aboutContent = AboutContent::findOrFail($data['id']);
            
            $updateData = [
                'title' => $data['title'],
                'subtitle' => $data['subtitle'] ?? null,
                'content' => $data['content'],
                'is_active' => isset($data['is_active']) ? 1 : 0,
            ];

            // Handle image upload
            if ($request->hasFile("sections.{$sectionId}.image")) {
                // Delete old image
                if ($aboutContent->image) {
                    Storage::disk('public')->delete($aboutContent->image);
                }
                $updateData['image'] = $request->file("sections.{$sectionId}.image")->store('about', 'public');
            }

            $aboutContent->update($updateData);
        }

        return redirect()->route('admin.about.index')
            ->with('success', 'All about content updated successfully.');
    }

    public function seed()
    {
        Artisan::call('db:seed', ['--class' => 'AboutContentSeeder']);
        
        return redirect()->route('admin.about.index')
            ->with('success', 'About content initialized successfully.');
    }
}
