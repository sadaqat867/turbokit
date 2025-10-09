<?php

namespace SmartCode\TurboKit\Traits;

use Illuminate\Support\Facades\Cache;

trait HasTurboCache
{
    /**
     * Get cached value or compute and cache it
     */
    public function turboCache(string $key, callable $callback, int $ttl = 3600)
    {
        return Cache::remember($key, $ttl, $callback);
    }

    /**
     * Clear a cache key
     */
    public function clearTurboCache(string $key)
    {
        Cache::forget($key);
    }
}
  
