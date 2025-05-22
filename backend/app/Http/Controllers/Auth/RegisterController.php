<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request){
        // по реквесту с правилами и меседж
        $data = $request->validated();
        // baseContr для сервиса
        $token = $this->service->register($data);
        return response()->json(['token' => $token], 201);
    }
}
