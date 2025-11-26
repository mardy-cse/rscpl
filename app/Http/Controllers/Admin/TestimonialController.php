<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\TestimonialService;

class TestimonialController extends AdminController
{
    protected TestimonialService $testimonialService;

    public function __construct(TestimonialService $testimonialService)
    {
        parent::__construct();
        $this->testimonialService = $testimonialService;
    }

    public function index(): View
    {
        $testimonials = $this->testimonialService->getAll();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(StoreTestimonialRequest $request): RedirectResponse
    {
        return $this->handleCreate(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('avatar')) {
                $validated['avatar'] = $this->testimonialService->uploadAvatar($request->file('avatar'));
            }

            $this->testimonialService->create($validated);
        }, 'testimonial', 'admin.testimonials.index');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial): RedirectResponse
    {
        return $this->handleUpdate(function () use ($request, $testimonial) {
            $validated = $request->validated();
            $oldAvatar = $testimonial->avatar;

            if ($request->hasFile('avatar')) {
                $validated['avatar'] = $this->testimonialService->uploadAvatar($request->file('avatar'));
            }

            $this->testimonialService->update($testimonial, $validated);

            if ($request->hasFile('avatar') && $oldAvatar) {
                $this->testimonialService->deleteAvatar($oldAvatar);
            }
        }, 'testimonial', 'admin.testimonials.index', ['testimonial_id' => $testimonial->id]);
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        return $this->handleDelete(function () use ($testimonial) {
            $avatarPath = $testimonial->avatar;
            $this->testimonialService->delete($testimonial);
            
            if ($avatarPath) {
                $this->testimonialService->deleteAvatar($avatarPath);
            }
        }, 'testimonial', 'admin.testimonials.index', ['testimonial_id' => $testimonial->id]);
    }
}