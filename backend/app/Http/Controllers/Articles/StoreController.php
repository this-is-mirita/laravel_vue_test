<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class StoreController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();

        return response()->json($data);
    }
}
