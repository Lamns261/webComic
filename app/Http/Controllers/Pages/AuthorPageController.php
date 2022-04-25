<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorPageController extends Controller
{
    public function index($author_slug)
    {
        $author = Author::where('author_slug', $author_slug)->first();
        $comics = $author->comics()->orderBy('id', 'desc')->paginate(18);


        return view('pages.author.index')->with(compact('comics', 'author', 'author_slug'));
    }

    public function showAllAuthors()
    {
        $authors = Author::where('is_block', false)->orderBy('name')->paginate(40);

        return view('pages.author.showAllAuthors')->with(compact('authors'));
    }
}
