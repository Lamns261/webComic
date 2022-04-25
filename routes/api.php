<?php

use App\Http\Controllers\Api\ComicRatingController;
use App\Http\Controllers\Api\GetAuthorController;
use App\Http\Controllers\Api\GetComicController;
use App\Http\Controllers\Api\GetComicRatingController;
use App\Http\Controllers\Api\GetUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'/comics'], function (){
    Route::get('comicReadRanking', [GetComicController::class, 'comicReadRanking'])->name('comicReadRanking');
    Route::get('newComic', [GetComicController::class, 'newComic'])->name('newComic');
    Route::get('randomComic', [GetComicController::class, 'randomComic'])->name('randomComic');
    Route::get('newUpdateComic', [GetComicController::class, 'newUpdateComic'])->name('newUpdateComic');
});

Route::get('/categories', [GetComicController::class, 'getCategories'])->name('getCategories');

Route::get('/comics', [GetComicController::class, 'getComics'])->name('getComics');
Route::get('/searchComics', [GetComicController::class, 'getSearchComics'])->name('getSearchComics');
Route::get('/categories/{category}/comics', [GetComicController::class, 'recommendComics'])->name('recommendComics');

Route::resource('/rating', ComicRatingController::class)->names('getRatings')->only('destroy');
Route::get('/comic/{comic_slug}/ratingOfComics', [ComicRatingController::class, 'getRatingOfComics'])->name('getRatingOfComics');

Route::get('/authors', [GetAuthorController::class, 'getAuthors'])->name('getAuthors');


