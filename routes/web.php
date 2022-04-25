<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\Pages\AuthorPageController;
use App\Http\Controllers\Pages\ComicPageController;
use App\Http\Controllers\Pages\CategoryPageController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\SearchPageController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('homePage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Roles
Route::group(['prefix'=>'/admin', 'middleware'=>'auth'], function (){
    Route::resource('/category', CategoryController::class)->names('admin.Category');
    Route::resource('/comic', ComicController::class)->names('admin.Comic');
    Route::resource('/chapter', ChapterController::class)->names('admin.Chapter');
    Route::resource('/author', AuthorController::class)->names('admin.Author');

    Route::get('/comic/block/{comic}', [ComicController::class, 'blockComic'])->name('admin.ComicBlock');
    Route::get('/comic/unblock/{comic}', [ComicController::class, 'unblockComic'])->name('admin.ComicUnblock');

    Route::get('/comic/completeComic/{comic}', [ComicController::class, 'completeComic'])->name('admin.ComicComplete');
    Route::get('/comic/uncompleteComic/{comic}', [ComicController::class, 'uncompleteComic'])->name('admin.ComicUncomplete');

    Route::get('/comic/{comic}/chapter', [ComicController::class, 'showChapterOfComic'])->name('showChapterOfComic');
    Route::get('/comic/{comic}/chapter/create', [ComicController::class, 'createChapterOfComic'])->name('createChapterOfComic');

    Route::get('/author/block/{author}', [AuthorController::class, 'authorBlock'])->name('admin.AuthorBlock');
    Route::get('/author/unblock/{author}', [AuthorController::class, 'authorUnblock'])->name('admin.AuthorUnblock');

    Route::get('/rating', [RatingController::class, 'index'])->name('admin.Rating');
    Route::get('/rating/{rating}/valid', [RatingController::class, 'valid'])->name('validRating');
    Route::get('/rating/{rating}/notValid', [RatingController::class, 'notValid'])->name('notValidRating');
    Route::delete('/rating/{rating}', [RatingController::class, 'destroy'])->name('deleteRating');

});


// Show Pages
Route::get('/comic/{comic_slug}', [ComicPageController::class, 'showComic'])->name('showComic')->middleware('comicViewCount');
Route::get('/comic/{comic_slug}/{chapter_slug}', [ComicPageController::class, 'showChapter'])->name('showChapter')->middleware('chapterViewCount');

Route::get('/categories/{category_slug}', [CategoryPageController::class, 'index'])->name('showCategory');

Route::get('/authors', [AuthorPageController::class, 'showAllAuthors'])->name('showAllAuthors');
Route::get('/authors/{author_slug}', [AuthorPageController::class, 'index'])->name('showAuthor');

Route::get('/search', [SearchPageController::class, 'index'])->name('searchComic');


// Rating Comic
Route::post('/comic/{comic_slug}/rating',[RatingController::class, 'store'])->name('storeRating');
