<?php

namespace SmartCode\TurboKit\Core;

use Illuminate\Support\Facades\Cache;

class CacheLayer
{
    /**
     * Cache any query result automatically
     */
    public static function rememberQuery(string $key, $query, $ttl = null)
    {
        return Cache::remember($key, $ttl ?? config('turbokit.cache_ttl'), function () use ($query) {
            return $query instanceof \Closure ? $query() : $query;
        });
    }

    /**
     * Flush all TurboKit cache
     */
    public static function flushAll()
    {
        Cache::flush();
    }

    /**
     * Check if a key exists in cache
     */
    public static function has($key)
    {
        return Cache::has($key);
    }

    /**
     * Delete a specific cache key
     */
    public static function forget($key)
    {
        return Cache::forget($key);
    }
}
