<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{
    public function listNews(): JsonResponse
    {
        Cache::get('req');

        $articlesFiltered = $this->newsFiltered()->map(function ($article) {
            return [
                'title'       =>  $article->title,
                'description' =>  $article->description,
                'urlToImage'  =>  $article->urlToImage,
                'publishedAt' =>  date('d-m-Y', strtotime($article->publishedAt)),
            ];
        })->forPage(3, 5);

        Cache::put('req', $articlesFiltered, 300);
        return response()->json($articlesFiltered);
    }

    public function getArticle(int $articleId): JsonResponse
    {
        Cache::get('req');
        $articlesFiltered = $this->newsFiltered();
        if (!isset($articlesFiltered[$articleId])) {
            return response()->json(['error' => 'Article not found'], 404);
        };

        $article = $articlesFiltered[$articleId];
        $articleCompleted = [
                'title'       =>  $article->title,
                'description' =>  $article->description,
                'content'     =>  $article->content,
                'urlToImage'  =>  $article->urlToImage,
                'publishedAt' =>  date('d-m-Y', strtotime($article->publishedAt)),
        ];
        Cache::put('req', $articleCompleted, 300);
        return response()->json($articleCompleted);
    }

    public function newsFiltered(): mixed
    {
        $newsapi = new NewsApi(env('API_KEY'));
        $top_headlines = (array) $newsapi->getTopHeadlines(null, null, 'us', null);

        $dataArticles = collect($top_headlines['articles']);
        $articlesFiltered = $dataArticles->filter(function ($article) {
            return $article->title !== null && $article->title !== '' &&
                   $article->description !== null && $article->description !== '' &&
                   $article->content !== null && $article->content !== '' && 
                   $article->urlToImage !== null && $article->urlToImage !== '' &&
                   $article->publishedAt !== null && $article->publishedAt !== '';
        });
        return $articlesFiltered;
    }
}