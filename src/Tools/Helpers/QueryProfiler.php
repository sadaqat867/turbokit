<?php

namespace SmartCode\TurboKit\Tools\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QueryProfiler
{
    /**
     * Profile all queries in a closure
     */
    public static function profile(\Closure $callback)
    {
        DB::enableQueryLog();
        $callback();
        $queries = DB::getQueryLog();
        DB::disableQueryLog();

        foreach ($queries as $query) {
            $sql = $query['query'];
            $bindings = json_encode($query['bindings']);
            $time = $query['time'];
            Log::info("[TurboKit QueryProfiler] {$sql} | bindings: {$bindings} | time: {$time}ms");
        }

        return $queries;
    }
}

