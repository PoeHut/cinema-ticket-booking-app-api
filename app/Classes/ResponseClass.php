<?php
namespace App\Classes;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResponseClass {
    public static function sendResponse($data, $message = 'Success')
    {
        if ($data instanceof AnonymousResourceCollection) {
            // Get the array structure with pagination data
            $response = $data->response()->getData(true);
        } else {
            // Get normal data
            $response = [
                'data' => $data,
            ];
        }

        // Merge pagination data or normal data into the response structure
        return response()->json(array_merge([
            'status' => true,
            'message' => $message,
        ], $response), 200);
    }

    public static function sendError($message = 'Error', $statusCode = 500)
    {
        return response()->json([
            'status' => false,
            'message' => $message
        ], $statusCode);
    }
}