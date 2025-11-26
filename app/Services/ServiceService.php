<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ServiceService
{
    private const CACHE_TTL = 3600; // 1 hour

    /**
     * Get all services ordered by order field.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return Service::orderBy('order')->get();
    }

    /**
     * Get active services with optional limit.
     *
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActive(?int $limit = null): Collection
    {
        $cacheKey = 'services.active' . ($limit ? ".{$limit}" : '');
        
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($limit) {
            $query = Service::where('is_active', true)->orderBy('order');
            
            if ($limit) {
                $query->limit($limit);
            }
            
            return $query->get();
        });
    }

    /**
     * Get active services formatted for home page.
     *
     * @param int $limit
     * @return array
     */
    public function getActiveForHome(int $limit = 6): array
    {
        return $this->getActive($limit)
            ->map(function($service) {
                return [
                    'title' => $service->title,
                    'description' => $service->description,
                    'icon' => $service->icon ?? 'default'
                ];
            })
            ->toArray();
    }

    /**
     * Find service by ID.
     *
     * @param int $id
     * @return \App\Models\Service
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById(int $id): Service
    {
        return Service::findOrFail($id);
    }

    /**
     * Create a new service.
     *
     * @param array $data
     * @return \App\Models\Service
     */
    public function create(array $data): Service
    {
        // Process features if provided
        if (isset($data['features']) && is_string($data['features'])) {
            $data['features'] = array_filter(
                array_map('trim', explode("\n", $data['features']))
            );
        }

        $service = Service::create($data);
        $this->clearCache();
        return $service;
    }

    /**
     * Update an existing service.
     *
     * @param \App\Models\Service $service
     * @param array $data
     * @return \App\Models\Service
     */
    public function update(Service $service, array $data): Service
    {
        // Process features if provided
        if (isset($data['features']) && is_string($data['features'])) {
            $data['features'] = array_filter(
                array_map('trim', explode("\n", $data['features']))
            );
        }

        $service->update($data);
        $this->clearCache();
        
        return $service->fresh();
    }

    /**
     * Delete a service.
     *
     * @param \App\Models\Service $service
     * @return bool
     */
    public function delete(Service $service): bool
    {
        $deleted = $service->delete();
        $this->clearCache();
        return $deleted;
    }

    /**
     * Handle image upload for service.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    public function uploadImage($file): string
    {
        return $file->store('services', 'public');
    }

    /**
     * Delete service image.
     *
     * @param string $path
     * @return bool
     */
    public function deleteImage(string $path): bool
    {
        return Storage::disk('public')->delete($path);
    }

    /**
     * Get total count of services.
     *
     * @return int
     */
    public function count(): int
    {
        return Service::count();
    }

    /**
     * Clear all service caches.
     *
     * @return void
     */
    private function clearCache(): void
    {
        Cache::forget('services.active');
        // Clear cached variants with limits
        foreach ([3, 6, 10, 20] as $limit) {
            Cache::forget("services.active.{$limit}");
        }
    }
}
