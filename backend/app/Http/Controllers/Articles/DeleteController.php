<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function index(Request $request, $id)
    {

        $article = Article::find($id);

        $article->delete();

        return response()->json([
            'mess' => true,
            'Удалена запиьс'=> intval($id),
        ], 200);

    }
}
