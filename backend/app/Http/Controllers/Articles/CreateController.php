<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        \Log::info('Request headers:', $request->headers->all());
        \Log::info('Session ID:', [$request->session()->getId()]);
        \Log::info('User:', [$request->user()]);
        \Log::info('Input data:', $request->all());
        return response()->json($data);
    }
}
