<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comic;
use App\Models\Rating;
use Illuminate\Http\Request;

class GetComicController extends Controller
{

    public function newComic()
    {
        return Comic::with('category', 'author')->orderBy('id', 'desc')->paginate(5);
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getSearchComics(Request  $request)
    {
        $comics = Comic::query();

        if ($request->keyword){
            $comics->with('category', 'author')->where('name', 'like', '%'.$request->keyword.'%')
                        ->orWhere('summary', 'like', '%'.$request->keyword.'%')
                        ->orWhereHas('author', function ($query) use ($request){
                            $query->where('name', 'like', '%'.$request->keyword.'%');
                        });
            return $comics->limit(5)->get();
        }

    }

    public function getComics()
    {
        return Comic::with('category', 'author')->inRandomOrder()->paginate(8);
    }

    public function recommendComics(Request $request, Category $category)
    {
        return $category->comics()->with('author', 'category')->inRandomOrder()->paginate(8);
    }
}
