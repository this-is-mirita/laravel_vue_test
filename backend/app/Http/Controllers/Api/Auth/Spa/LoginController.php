<?php

namespace App\Http\Controllers\Api\Auth\Spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();
        dd($data);
        // Для дебага
        info('User:', ['user' => auth()->user()]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            //dd($request->session()->regenerate());
            return response()->json(['message' => 'Logged in']);
        } else {
            return response()->json(['message' => 'Invalid'], 404);
        }
    }
}
