<?php

namespace SmartCode\TurboKit\Addons;

use Illuminate\Support\Facades\Queue;

class QueueHelper
{
    /**
     * Dispatch job with delay and optional queue name
     */
    public static function dispatch($job, $delaySeconds = 0, $queue = null)
    {
        if ($queue) {
            return Queue::connection()->pushOn($queue, $job, [], now()->addSeconds($delaySeconds));
        }
        return dispatch($job)->delay(now()->addSeconds($delaySeconds));
    }

    /**
     * Bulk dispatch multiple jobs
     */
    public static function bulkDispatch(array $jobs, $queue = null)
    {
        foreach ($jobs as $job) {
            self::dispatch($job, 0, $queue);
        }
    }
}
