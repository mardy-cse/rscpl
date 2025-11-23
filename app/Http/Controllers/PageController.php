<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use App\Models\Project;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReceived;

class PageController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the services page.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        // Fetch services from database
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('services', compact('services'));
    }

    /**
     * Display the gallery page.
     *
     * @return \Illuminate\View\View
     */
    public function gallery()
    {
        // Fetch all projects from database
        $projects = Project::orderBy('order')
            ->get()
            ->map(function($project) {
                return [
                    'title' => $project->title,
                    'category' => $project->location ?? 'General',
                    'image' => $project->image,
                    'description' => $project->description,
                    'year' => $project->year
                ];
            })
            ->toArray();
        
        // Always show all three categories
        $categories = ['All', 'Commercial', 'Industrial', 'Residential'];

        return view('gallery', compact('projects', 'categories'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function submitContact(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Save to database
        $contact = Contact::create($validated);

        // Send email notification
        try {
            Mail::to(config('mail.from.address'))->send(new ContactReceived($contact));
        } catch (\Exception $e) {
            // Log the error but don't fail the request
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.'
            ]);
        }

        // Redirect with success message for regular form submissions
        return redirect()->route('contact')
            ->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
