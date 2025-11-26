<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\ServiceService;
use App\Services\ProjectService;
use App\Services\ContactService;
use App\Services\TestimonialService;

class DashboardController extends AdminController
{
    protected ServiceService $serviceService;
    protected ProjectService $projectService;
    protected ContactService $contactService;
    protected TestimonialService $testimonialService;

    public function __construct(
        ServiceService $serviceService,
        ProjectService $projectService,
        ContactService $contactService,
        TestimonialService $testimonialService
    ) {
        parent::__construct();
        $this->serviceService = $serviceService;
        $this->projectService = $projectService;
        $this->contactService = $contactService;
        $this->testimonialService = $testimonialService;
    }

    /**
     * Show the admin dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request): View
    {
        // Authorize using policy
        $this->authorize('viewDashboard', $request->user());

        $stats = [
            'services' => $this->serviceService->count(),
            'projects' => $this->projectService->count(),
            'contacts' => $this->contactService->count(),
            'testimonials' => $this->testimonialService->count(),
        ];

        $recentContacts = $this->contactService->getRecent(5);

        return view('admin.dashboard', compact('stats', 'recentContacts'));
    }
}
