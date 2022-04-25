<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Requests\AuthorValidRequest;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(20);

        return view('admin.author.index')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorValidRequest $request)
    {
        $author = new Author;
        $author->fill($request->all());

        $author->author_slug = Str::slug($request->name, "-");

        $author->save();

        return redirect('admin/author')->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit')->with(compact('author'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $author->fill($request->all());
        $author->author_slug = Str::slug($request->name,'-');

        $author->save();

        return redirect('admin/author')->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->back()->with('status', 'Xóa thành công');
    }

    public function authorBlock(Author $author)
    {
        $author->is_block = true;
        $author->save();

        return redirect('admin/author')->with('status', 'Khóa thành công');
    }

    public function authorUnblock(Author $author)
    {
        $author->is_block = false;
        $author->save();

        return redirect('admin/author')->with('status', 'Mở khóa thành công');
    }
}
