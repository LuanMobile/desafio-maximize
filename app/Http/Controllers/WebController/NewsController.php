<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\APIController\ApiNewsController;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function indexNews()
    {
        $news = new ApiNewsController();
        $listNews = $news->listNews()->all();
        $page = collect($listNews)->forPage(3, 5);
        
        return view('news', ['listNews' => $listNews]);
    }

    public function getArticle(int $articleId)
    {
        $article = new ApiNewsController();
        $article = $article->getArticle($articleId);

        return view('article', ['article' => $article]);
    }
}
