<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // TODO: Implement __invoke() method.
        $article = Article::paginate(3);
        return response()->json([
            'article' => $article
        ], 200);

    }
}
