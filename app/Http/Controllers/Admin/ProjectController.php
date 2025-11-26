<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\ProjectService;

class ProjectController extends AdminController
{
    protected ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        parent::__construct();
        $this->projectService = $projectService;
    }
    public function index(): View
    {
        $projects = $this->projectService->getAll();
        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.create');
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        return $this->handleCreate(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $validated['image'] = $this->projectService->uploadImage($request->file('image'));
            }

            $this->projectService->create($validated);
        }, 'project', 'admin.projects.index');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        return $this->handleUpdate(function () use ($request, $project) {
            $validated = $request->validated();
            $oldImage = $project->image;

            if ($request->hasFile('image')) {
                $validated['image'] = $this->projectService->uploadImage($request->file('image'));
            }

            $this->projectService->update($project, $validated);

            if ($request->hasFile('image') && $oldImage) {
                $this->projectService->deleteImage($oldImage);
            }
        }, 'project', 'admin.projects.index', ['project_id' => $project->id]);
    }

    public function destroy(Project $project): RedirectResponse
    {
        return $this->handleDelete(function () use ($project) {
            $imagePath = $project->image;
            $this->projectService->delete($project);
            
            if ($imagePath) {
                $this->projectService->deleteImage($imagePath);
            }
        }, 'project', 'admin.projects.index', ['project_id' => $project->id]);
    }
}
