<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // TODO: Implement __invoke() method.
        $article = Article::paginate(3);
        return response()->json([
            'request' => $request,
            'article' => $article
        ], 201);
    }
}
