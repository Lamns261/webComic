<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function index($category_slug)
    {
        $allCategories = Category::all();
        $category = Category::where('cat_slug', $category_slug)->first();
        $comics = $category->comics()->orderBy('id', 'desc')->paginate(18);

        return view('pages.category.index')->with(compact('comics', 'category', 'allCategories', 'category_slug'));
    }

}
