<?php

namespace App\Service\Article;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleService
{
    public function store(array $data, Request $request)
    {
        if ($request->hasFile('preview_image')) {
            $path = $request->file('preview_image')->store('images', 'public');
            Article::create([
                'title' => $data['title'],
                'text' => $data['text'],
                'preview_image' => $path,
                'owner_id' => $data['user_id'],
            ]);
            return true;
        }
        return null;
    }
}
//message	OK
//result
//{1}
//POST
//http://localhost:8000/api/article/create
//йцу.webp
//200
//OK
//224 ms
//290 B
//message	OK
//preview_image	images/u7XWwM53JZYHcmJrjgIS3yZJ96B6NVPIuryggrtU.webp
