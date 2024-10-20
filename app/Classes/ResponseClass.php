<?php
namespace App\Classes;

class ResponseClass {
    public static function sendResponse($data, $message = 'Success')
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    public static function sendError($message = 'Error', $statusCode = 500)
    {
        return response()->json([
            'status' => false,
            'message' => $message
        ], $statusCode);
    }
}