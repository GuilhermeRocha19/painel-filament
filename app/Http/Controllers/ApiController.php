<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return ApiResponse::formatJson(404, 'erro');
            
        } else {
            return ApiResponse::formatJson(200, 'Sucesso', $user);
        }
    }

    public function store(CreateUserRequest $request)
    {
        Log::info('Dados recebidos para criação de usuário', $request->all());

        $data = $request->validated();
        $user = User::create($data);

        return ApiResponse::formatJson(201, 'Sucesso', $user);
    }
}
