<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;

class StoreUserController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        return response()->json($data, 201);

    }
}
