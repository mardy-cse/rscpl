<?php

namespace App\Services;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class TestimonialService
{
    private const CACHE_TTL = 3600; // 1 hour

    /**
     * Get all testimonials ordered by order field.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return Testimonial::orderBy('order')->get();
    }

    /**
     * Get active testimonials.
     *
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActive(?int $limit = null): Collection
    {
        $cacheKey = 'testimonials.active' . ($limit ? ".{$limit}" : '');
        
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($limit) {
            $query = Testimonial::where('is_active', true)->orderBy('order');
            
            if ($limit) {
                $query->limit($limit);
            }
            
            return $query->get();
        });
    }

    /**
     * Get active testimonials formatted for home page.
     *
     * @param int $limit
     * @return array
     */
    public function getActiveForHome(int $limit = 3): array
    {
        return $this->getActive($limit)
            ->map(function($testimonial) {
                return [
                    'name' => $testimonial->name,
                    'company' => $testimonial->company ?? 'Valued Client',
                    'message' => $testimonial->content,
                    'rating' => $testimonial->rating,
                    'avatar' => $testimonial->avatar
                ];
            })
            ->toArray();
    }

    /**
     * Find testimonial by ID.
     *
     * @param int $id
     * @return \App\Models\Testimonial
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById(int $id): Testimonial
    {
        return Testimonial::findOrFail($id);
    }

    /**
     * Create a new testimonial.
     *
     * @param array $data
     * @return \App\Models\Testimonial
     */
    public function create(array $data): Testimonial
    {
        $testimonial = Testimonial::create($data);
        $this->clearCache();
        return $testimonial;
    }

    /**
     * Update an existing testimonial.
     *
     * @param \App\Models\Testimonial $testimonial
     * @param array $data
     * @return \App\Models\Testimonial
     */
    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        $testimonial->update($data);
        $this->clearCache();
        
        return $testimonial->fresh();
    }

    /**
     * Delete a testimonial.
     *
     * @param \App\Models\Testimonial $testimonial
     * @return bool
     */
    public function delete(Testimonial $testimonial): bool
    {
        $deleted = $testimonial->delete();
        $this->clearCache();
        return $deleted;
    }

    /**
     * Handle avatar upload for testimonial.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    public function uploadAvatar($file): string
    {
        return $file->store('testimonials', 'public');
    }

    /**
     * Delete testimonial avatar.
     *
     * @param string $path
     * @return bool
     */
    public function deleteAvatar(string $path): bool
    {
        return Storage::disk('public')->delete($path);
    }

    /**
     * Get total count of testimonials.
     *
     * @return int
     */
    public function count(): int
    {
        return Testimonial::count();
    }

    /**
     * Clear all testimonial caches.
     *
     * @return void
     */
    private function clearCache(): void
    {
        Cache::forget('testimonials.active');
        // Clear cached variants with limits
        foreach ([3, 6, 10, 20] as $limit) {
            Cache::forget("testimonials.active.{$limit}");
        }
    }
}
