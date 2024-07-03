<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{ 
    public function show($id){
        $user = User::find($id);

        if(!$user){
            return ApiResponse::formatJson(404,'erro');
        }else{
            return ApiResponse::formatJson(200,'Sucesso',$user);
        }
    }

    public function store(CreateUserRequest $request)
    {
        
        $data = $request->validated();
    
        
        $user = User::create($data);
    
        return ApiResponse::formatJson('success', 'User created successfully', $user);
    }


}
