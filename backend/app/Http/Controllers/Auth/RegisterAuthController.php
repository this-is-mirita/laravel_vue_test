<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterAuthController extends BaseAuthController
{
    public function index(RegisterRequest $request){
        // по реквесту с правилами и меседж
        $data = $request->validated();
        // baseContr для сервиса
        $token = $this->service->register($data);
        return response()->json([
            'token' => $token,
            'user' => User::where('email', $data['email'])->first()->toArray()
        ], 201);
    }
}
