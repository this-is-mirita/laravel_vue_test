<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        //dd($user_id);
        $article = Article::where('owner_id', $user_id)
            ->orderBy('id')
            ->take(10)
            ->get();
        //dd($article);
        return response()->json([
            'article' => $article
        ], 201);
    }
}
