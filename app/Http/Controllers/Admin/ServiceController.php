<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\ServiceService;

class ServiceController extends AdminController
{
    protected ServiceService $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        parent::__construct();
        $this->serviceService = $serviceService;
    }
    public function index(): View
    {
        $services = $this->serviceService->getAll();
        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request): RedirectResponse
    {
        return $this->handleCreate(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $validated['image'] = $this->serviceService->uploadImage($request->file('image'));
            }

            $this->serviceService->create($validated);
        }, 'service', 'admin.services.index');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
    {
        return $this->handleUpdate(function () use ($request, $service) {
            $validated = $request->validated();
            $oldImage = $service->image;

            if ($request->hasFile('image')) {
                $validated['image'] = $this->serviceService->uploadImage($request->file('image'));
            }

            $this->serviceService->update($service, $validated);

            if ($request->hasFile('image') && $oldImage) {
                $this->serviceService->deleteImage($oldImage);
            }
        }, 'service', 'admin.services.index', ['service_id' => $service->id]);
    }

    public function destroy(Service $service): RedirectResponse
    {
        return $this->handleDelete(function () use ($service) {
            $imagePath = $service->image;
            $this->serviceService->delete($service);
            
            if ($imagePath) {
                $this->serviceService->deleteImage($imagePath);
            }
        }, 'service', 'admin.services.index', ['service_id' => $service->id]);
    }
}
