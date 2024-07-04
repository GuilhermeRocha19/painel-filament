<?php
 
namespace App\Helpers;

use Illuminate\Support\Facades\Redirect;

class ApiResponse
{
    public static function formatJson($status, $message, $data = null){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
        // $url = "https://http.cat/$status"; 
        //     return Redirect::away($url);
    }
}
