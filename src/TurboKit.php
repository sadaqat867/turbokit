<?php

namespace Smartcode\Turbokit;   // ← small-c folder, so namespace lowercase 'c'

use Smartcode\Turbokit\Core\TurboModel;
use Smartcode\Turbokit\Core\TurboQuery;
use Smartcode\Turbokit\Core\CacheLayer;

class TurboKit
{
    protected static bool $htmlMode = false;

    // Force HTML mode for Blade pages
    public static function forceHtml()
    {
        self::$htmlMode = true;
    }

    // TurboModel wrapper
    public function turboModel($model)
    {
        return new TurboModel($model);
    }

    // TurboQuery wrapper
    public function turboQuery($query)
    {
        return new TurboQuery($query);
    }

    // Bulk insert
    public function insertBulk(array $data, $modelClass)
    {
        $modelClass::insert($data);
    }

    // Cache tools
    public function forgetCache($key)
    {
        return CacheLayer::forget($key);
    }

    public function flushCache()
    {
        return CacheLayer::flushAll();
    }

    // Auto JSON or HTML response
    public function message($msg, $data = null)
    {
        // If HTML requested (web UI)
        if (self::$htmlMode === true) {
            return redirect()->back()->with('success', $msg);
        }

        // Otherwise JSON (API mode)
        return response()->json([
            'status' => true,
            'message' => $msg,
            'data' => $data
        ]);
    }
}
