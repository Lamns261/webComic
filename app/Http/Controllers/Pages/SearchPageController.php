<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class SearchPageController extends Controller
{
    public function index(Request  $request)
    {
        $keyword = $request->keyword;
        $comicQuery = Comic::query();

        if ($keyword){
            $comicQuery->with('category', 'author')->where('name', 'like', '%'.$request->keyword.'%')
                        ->orWhere('summary', 'like', '%'.$request->keyword.'%')
                        ->orWhereHas('author', function ($query) use ($keyword){
                            $query->where('name', 'like', '%'.$keyword.'%');
                        });
        }
        $comics = $comicQuery->paginate(18);

        return view('pages.search.index')->with(compact('comics', 'keyword'));
    }
}
