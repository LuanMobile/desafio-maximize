<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use jcobhams\NewsApi\NewsApi;

class ApiNewsController extends Controller
{
/**
 * @OA\Get(
 *      path="/api/news?page={id}",
 *      tags={"/news"},
 *      summary="View a list of news",
 *      description="returns a list of news",
 *      security={ {"bearer": {} }},
 *  @OA\Parameter(
 *    description="ID of news",
 *    in="path",
 *    name="id",
 *    required=false,
 *    example="2",
 *    @OA\Schema(
 *       type="integer",
 *       format="int64"
 *    )
 * ),
 *      @OA\Response(
 *          response=200,
 *          description="Success"
 *      )
 * )
 */

    public function listNews(): object
    {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $cacheName = "page_" . $page;
        $cacheNews = Cache::get($cacheName);
        if ($cacheNews) { return $cacheNews; }
        
        $articlesFiltered = $this->newsFiltered()->map(function ($article) {
            return [
                'title'       =>  $article->title,
                'description' =>  $article->description,
                'urlToImage'  =>  $article->urlToImage,
                'publishedAt' =>  date('d-m-Y', strtotime($article->publishedAt)),
            ];
        });

        $qtdItems = 5;
        if ($page != 1) {
            $newsPerPage = $articlesFiltered->forPage($page, $qtdItems);
            if ($newsPerPage->isEmpty()) { 
                return response()->json(["error" => "Page not found"], 404);
            }
            Cache::put($cacheName, $newsPerPage, 300);
            return $newsPerPage;
        }

        Cache::put($cacheName, $articlesFiltered, 300);
        return $articlesFiltered;
    }

    /**
 * @OA\Get(
 *      path="/api/news/article/{articleId}",
 *      tags={"/news"},
 *      summary="View a list of news",
 *      operationId="getArticle",
 *      security={ {"bearer": {} }}, 
 * @OA\Parameter(
 *    description="ID of article",
 *    in="path",
 *    name="articleId",
 *    required=true,
 *    example="2",
 *    @OA\Schema(
 *       type="integer",
 *       format="int64"
 *    )
 * ),
 *      @OA\Response(
 *          response=200,
 *          description="Success"
 *      )
 * )
 */

    public function getArticle(int $articleId): array|JsonResponse
    {
        $cacheName = "req_" . $articleId;
        $articleCache = Cache::get($cacheName);
        if ($articleCache) {
            return $articleCache;
        }

        $articlesFiltered = $this->newsFiltered();
        if (!isset($articlesFiltered[$articleId])) {
            return response()->json(["error" => "Article not found"], 404);
        };

        $article = $articlesFiltered[$articleId];
        $articleCompleted = [
                'title'       =>  $article->title,
                'description' =>  $article->description,
                'content'     =>  $article->content,
                'urlToImage'  =>  $article->urlToImage,
                'publishedAt' =>  date('d-m-Y', strtotime($article->publishedAt)),
        ];
        Cache::put($cacheName, $articleCompleted, 300);
        return $articleCompleted;
    }

    public function newsFiltered(): object
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