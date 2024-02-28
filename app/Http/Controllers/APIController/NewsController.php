<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use jcobhams\NewsApi\Helpers;
use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{
    // colocar na documentação sobre a API que estou consumindo estar misturando português com inglês
    public function listNews()
    {
        // configurar paginação para finalizar essa função
        $newsapi = new NewsApi(env('API_KEY'));
        # /v2/top-headlines
        $top_headlines = (array) $newsapi->getTopHeadlines(null, null, 'us', null);

        $dataArticles = collect($top_headlines['articles']);
        //dd(count($dataArticles)); //Total de artigos = 20
        $articlesFiltered = $dataArticles->filter(function ($article) {
            return $article->title !== null && $article->description !== null && $article->urlToImage !== null && $article->publishedAt !== null;
        })
        ->map(function ($article) {

            return [
                'title'       =>  $article->title,
                'description' =>  $article->description,
                'urlToImage'  =>  $article->urlToImage,
                'publishedAt' =>  date('d-m-Y', strtotime($article->publishedAt)),
            ];
        });
        //dd(count($articlesFiltered)); // s/ valores nulos = 17
        return response()->json([$articlesFiltered]);
    }

    public function getArticle($titulo)
    {
    }
}