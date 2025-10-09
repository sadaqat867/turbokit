<?php

namespace SmartCode\TurboKit\Addons;

class ResponseHelper
{
    /**
     * Success response
     */
    public static function success($data = [], $message = "Success", $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Error response
     */
    public static function error($message = "Error", $code = 400, $data = [])
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
