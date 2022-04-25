<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class GetAuthorController extends Controller
{
    public function getAuthors()
    {
        return Author::where('is_block', false)->orderBy('name')->limit(5)->get();
    }
}
