<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ProjectService
{
    private const CACHE_TTL = 3600; // 1 hour

    /**
     * Get all projects ordered by order field.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return Project::orderBy('order')->get();
    }

    /**
     * Get all projects formatted for gallery.
     *
     * @return array
     */
    public function getAllForGallery(): array
    {
        return Project::orderBy('order')
            ->get()
            ->map(function($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'category' => $project->location ?? 'General',
                    'image' => $project->image,
                    'description' => $project->description,
                    'year' => $project->year
                ];
            })
            ->toArray();
    }

    /**
     * Get featured projects.
     *
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFeatured(?int $limit = null): Collection
    {
        $cacheKey = 'projects.featured' . ($limit ? ".{$limit}" : '');
        
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($limit) {
            $query = Project::where('is_featured', true)->orderBy('order');
            
            if ($limit) {
                $query->limit($limit);
            }
            
            return $query->get();
        });
    }

    /**
     * Get featured projects formatted for home page.
     *
     * @param int $limit
     * @return array
     */
    public function getFeaturedForHome(int $limit = 3): array
    {
        return $this->getFeatured($limit)
            ->map(function($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'category' => $project->location ?? 'Project',
                    'image' => $project->image,
                    'description' => $project->description
                ];
            })
            ->toArray();
    }

    /**
     * Get projects by location.
     *
     * @param string $location
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByLocation(string $location, ?int $limit = null): Collection
    {
        $query = Project::where('location', $location)->orderBy('order');
        
        if ($limit) {
            $query->limit($limit);
        }
        
        return $query->get();
    }

    /**
     * Get related projects excluding specific ID.
     *
     * @param string $location
     * @param int $excludeId
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRelated(string $location, int $excludeId, int $limit = 3): Collection
    {
        return Project::where('location', $location)
            ->where('id', '!=', $excludeId)
            ->orderBy('order')
            ->limit($limit)
            ->get();
    }

    /**
     * Find project by ID.
     *
     * @param int $id
     * @return \App\Models\Project
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById(int $id): Project
    {
        return Project::findOrFail($id);
    }

    /**
     * Create a new project.
     *
     * @param array $data
     * @return \App\Models\Project
     */
    public function create(array $data): Project
    {
        $project = Project::create($data);
        $this->clearCache();
        return $project;
    }

    /**
     * Update an existing project.
     *
     * @param \App\Models\Project $project
     * @param array $data
     * @return \App\Models\Project
     */
    public function update(Project $project, array $data): Project
    {
        $project->update($data);
        $this->clearCache();
        
        return $project->fresh();
    }

    /**
     * Delete a project.
     *
     * @param \App\Models\Project $project
     * @return bool
     */
    public function delete(Project $project): bool
    {
        $deleted = $project->delete();
        $this->clearCache();
        return $deleted;
    }

    /**
     * Handle image upload for project.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    public function uploadImage($file): string
    {
        return $file->store('projects', 'public');
    }

    /**
     * Delete project image.
     *
     * @param string $path
     * @return bool
     */
    public function deleteImage(string $path): bool
    {
        return Storage::disk('public')->delete($path);
    }

    /**
     * Get total count of projects.
     *
     * @return int
     */
    public function count(): int
    {
        return Project::count();
    }

    /**
     * Clear all project caches.
     *
     * @return void
     */
    private function clearCache(): void
    {
        Cache::forget('projects.featured');
        // Clear cached variants with limits
        foreach ([3, 6, 10, 20] as $limit) {
            Cache::forget("projects.featured.{$limit}");
        }
    }
}
