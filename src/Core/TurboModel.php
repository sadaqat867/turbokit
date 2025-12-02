<?php

namespace Smartcode\turboKit\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TurboModel extends Model
{
    protected $perPage = 1000; // Default pagination size

    /**
     * Fast find with cache
     */
    public static function turboFind($id, $ttl = null)
    {
        $key = static::class . "_{$id}";
        return Cache::remember($key, $ttl ?? config('turbokit.cache_ttl'), function () use ($id) {
            return static::find($id);
        });
    }

    /**
     * Chunk through massive data without memory issues
     */
    public static function turboChunk($size = null, callable $callback)
    {
        $size = $size ?? config('turbokit.chunk_size');
        return static::query()->orderBy('id')->chunk($size, $callback);
    }

    /**
     * Get all records with smart caching
     */
    public static function turboAll($ttl = null)
    {
        $key = static::class . "_all";
        return Cache::remember($key, $ttl ?? config('turbokit.cache_ttl'), function () {
            return static::all();
        });
    }
}
