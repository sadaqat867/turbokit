<?php

namespace SmartCode\TurboKit\Facades;

use Illuminate\Support\Facades\Facade;
use SmartCode\TurboKit\Core\TurboModel as CoreTurboModel;
use SmartCode\TurboKit\Core\TurboQuery as CoreTurboQuery;
use SmartCode\TurboKit\Core\CacheLayer as CoreCacheLayer;

class TurboKit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'turbokit';
    }

    /**
     * Get a TurboModel instance for a model class or model object
     */
    public static function turboModel($model)
    {
        if ($model instanceof \Illuminate\Database\Eloquent\Model) {
            return new CoreTurboModel($model);
        }

        return new CoreTurboModel(new $model);
    }

    /**
     * Get a TurboQuery instance for a query builder
     */
    public static function turboQuery($query)
    {
        return new CoreTurboQuery($query);
    }

    /**
     * Clear cache by key
     */
    public static function forgetCache($key)
    {
        return CoreCacheLayer::forget($key);
    }

    /**
     * Insert bulk data via TurboModel
     */
    public static function insertBulk(array $data, $modelClass = null)
    {
        if ($modelClass) {
            return CoreTurboModel::insert($data, $modelClass);
        }
        return CoreTurboModel::insert($data);
    }

    /**
     * Return a simple success message
     */
    public static function message($msg, $data = [])
    {
        return response()->json([
            'status'  => true,
            'message' => $msg,
            'data'    => $data,
        ]);
    }
}
