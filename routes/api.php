<?php

use App\Http\Controllers\APIController\ApiNewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/news', [ApiNewsController::class, 'listNews']);
Route::get('/news/article/{articleId}', [ApiNewsController::class, 'getArticle']);