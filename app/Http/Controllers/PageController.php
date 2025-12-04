<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use App\Models\Project;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReceived;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\ServiceService;
use App\Services\ProjectService;
use App\Services\ContactService;

class PageController extends Controller
{
    protected ServiceService $serviceService;
    protected ProjectService $projectService;
    protected ContactService $contactService;

    public function __construct(
        ServiceService $serviceService,
        ProjectService $projectService,
        ContactService $contactService
    ) {
        $this->serviceService = $serviceService;
        $this->projectService = $projectService;
        $this->contactService = $contactService;
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $hero = AboutContent::getBySection('who_we_are');
        $mission = AboutContent::getBySection('our_mission');
        $vision = AboutContent::getBySection('why_choose_us');

        return view('about', compact('hero', 'mission', 'vision'));
    }

    /**
     * Display the services page.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        $services = $this->serviceService->getActive();
        return view('services', compact('services'));
    }

    /**
     * Display service details page.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\View\View
     */
    public function serviceDetails(Service $service)
    {
        // Get related services (exclude current service)
        $relatedServices = $this->serviceService->getActive(3)
            ->where('id', '!=', $service->id)
            ->take(3);

        return view('service-details', compact('service', 'relatedServices'));
    }

    /**
     * Display the gallery page.
     *
     * @return \Illuminate\View\View
     */
    public function gallery()
    {
        $projects = $this->projectService->getAllForGallery();
        $categories = ['All', 'Commercial', 'Industrial', 'Residential'];

        return view('gallery', compact('projects', 'categories'));
    }

    /**
     * Display project details page.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function projectDetails(int $id)
    {
        $project = $this->projectService->findById($id);
        $relatedProjects = $this->projectService->getRelated($project->location, $project->id, 3);

        return view('project-details', compact('project', 'relatedProjects'));
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
     * @param \App\Http\Requests\StoreContactRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function submitContact(StoreContactRequest $request)
    {
        try {
            $validated = $request->validated();

            // Additional spam check: prevent duplicate submissions within 1 minute
            if ($this->contactService->hasRecentSubmission($validated['email'], 1)) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You have already submitted a message recently. Please wait before submitting again.',
                    ], 429);
                }

                return redirect()->back()
                    ->with('error', 'You have already submitted a message recently. Please wait before submitting again.');
            }

            // Use transaction for database save and email
            $contact = DB::transaction(function () use ($validated) {
                return $this->contactService->create($validated);
            });

            // Send email notification (outside transaction, async would be better)
            try {
                Mail::to(config('mail.from.address'))->send(new ContactReceived($contact));
            } catch (\Exception $e) {
                // Log the error but don't fail the request
                Log::error('Failed to send contact email', [
                    'contact_id' => $contact->id,
                    'error' => $e->getMessage()
                ]);
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
                
        } catch (\Exception $e) {
            Log::error('Contact form submission failed', ['error' => $e->getMessage()]);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred. Please try again later.'
                ], 500);
            }
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred. Please try again later.');
        }
    }
}
