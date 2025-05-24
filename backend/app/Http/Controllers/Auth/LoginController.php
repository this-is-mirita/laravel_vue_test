<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class LoginController extends BaseController
{
    public function login(LoginRequest $request){
        // по реквесту с правилами и меседж

        $data = $request->validated();
        // baseContr для сервиса
        $token = $this->service->login($data);
        return response()->json([
            'token' => $token,
            'user' => User::where('email', $data['email'])->first()->toArray()
        ], 201);
    }
}
