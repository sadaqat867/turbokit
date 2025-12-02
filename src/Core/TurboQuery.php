<?php

namespace Smartcode\turboKit\Core;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class TurboQuery
{
    protected Builder $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * Enable smart caching for query
     */
    public function cache($key, $ttl = null)
    {
        return CacheLayer::rememberQuery($key, function () {
            return $this->query->get();
        }, $ttl);
    }

    /**
     * Process results in chunks (memory-safe)
     */
    public function chunk($size = null, callable $callback)
    {
        $size = $size ?? config('turbokit.chunk_size');
        return $this->query->orderBy('id')->chunk($size, $callback);
    }

    /**
     * Add fast pagination
     */
    public function paginate($perPage = 1000)
    {
        return $this->query->paginate($perPage);
    }

    /**
     * Run query directly
     */
    public function get()
    {
        return $this->query->get();
    }
}
