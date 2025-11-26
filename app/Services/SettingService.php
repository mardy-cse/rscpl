<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    /**
     * Cache duration in seconds (1 day).
     */
    protected const CACHE_DURATION = 86400;

    /**
     * Get all settings as key-value pairs.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAll(): Collection
    {
        return Cache::remember('settings.all', self::CACHE_DURATION, function () {
            return Setting::all()->pluck('value', 'key');
        });
    }

    /**
     * Get a specific setting by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return Cache::remember("setting.{$key}", self::CACHE_DURATION, function () use ($key, $default) {
            return Setting::where('key', $key)->first()?->value ?? $default;
        });
    }

    /**
     * Set a setting value.
     *
     * @param string $key
     * @param mixed $value
     * @return \App\Models\Setting
     */
    public function set(string $key, $value): Setting
    {
        $this->clearCache($key);
        
        return Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /**
     * Update multiple settings.
     *
     * @param array $settings
     * @return void
     */
    public function updateMany(array $settings): void
    {
        foreach ($settings as $key => $value) {
            $this->set($key, $value);
        }
        
        $this->clearAllCache();
    }

    /**
     * Clear cache for a specific setting.
     *
     * @param string $key
     * @return void
     */
    protected function clearCache(string $key): void
    {
        Cache::forget("setting.{$key}");
        Cache::forget('settings.all');
    }

    /**
     * Clear all settings cache.
     *
     * @return void
     */
    public function clearAllCache(): void
    {
        Cache::forget('settings.all');
        // You might want to implement a more sophisticated cache clearing strategy
    }
}
