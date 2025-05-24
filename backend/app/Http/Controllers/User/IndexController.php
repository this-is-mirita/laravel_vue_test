<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        // TODO: Implement __invoke() method.
        return response()->json(['request' => $request], 201);
    }
}
