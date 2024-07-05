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
    public function index(){
        $user = User::all();

        if (!$user) {
            return formatJson(status: 404, message:'erro');
            
        } else {
            return formatJson(status: 200, message: 'Sucesso', data: $user);
        }
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return formatJson(status: 404, message: 'erro');
            
        } else {
            return formatJson(status: 200, message: 'Sucesso', data: $user);
        }
    }

    public function store(CreateUserRequest $request)
    {
        Log::info('Dados recebidos para criação de usuário', $request->all());

        $data = $request->validated();
        $user = User::create($data);

        return formatJson(status: 201, message: 'Sucesso', data: $user);
    }
}
