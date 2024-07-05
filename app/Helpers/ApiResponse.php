<?php
use Illuminate\Http\Response;

if (!function_exists('formatJson')) {

    function formatJson(mixed $data = null, ?string $message = null, int $status = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
