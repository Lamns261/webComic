<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $recommendComics = Comic::with('category', 'author', 'chapters')->inRandomOrder()->paginate(8);
        $newCompleteComics = Comic::with('category', 'author', 'chapters')->where('is_complete', true)->inRandomOrder()->paginate(8);
        $readRankingComics = Comic::with('category', 'author', 'chapters')->orderBy('view_count', 'desc')->paginate(10);

        $newUpdateChapters = Chapter::orderBy('id', 'desc')->paginate(10);

        return view('pages.homePage.index')
                ->with(compact(
                    'recommendComics',
                    'newUpdateChapters',
                    'readRankingComics',
                    'newCompleteComics',
                ));
    }
}
