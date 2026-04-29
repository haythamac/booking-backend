<?php
namespace App\Traits;

trait ApiResponse
{
    protected function success($data, $message = 'success', $code = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function erro($message, $code)
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }
}