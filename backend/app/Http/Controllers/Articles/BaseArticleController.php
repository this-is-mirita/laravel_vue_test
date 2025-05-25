<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Service\Article\ArticleService;

class BaseArticleController extends Controller
{
    public $service;
    public function __construct(ArticleService $service){
        $this->service = $service;
    }
}
