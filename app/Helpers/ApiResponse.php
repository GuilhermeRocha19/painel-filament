<?php
 
namespace App\Helpers;
  
class ApiResponse
{
    public static function formatJson($status, $message, $data = null){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
