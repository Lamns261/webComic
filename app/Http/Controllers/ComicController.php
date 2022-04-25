<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterValidRequest;
use App\Http\Requests\ComicUpdateRequest;
use App\Http\Requests\ComicValidReuqest;
use App\Models\AppConst;
use App\Models\Author;
use App\Models\Category;
use App\Models\Cats;
use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::with('category')->orderBy('id')->paginate(AppConst::CAT_PER_PAGE);

        return view('admin.comic.index')->with(compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cats = Cats::all();
        $authors = Author::all();

        return view('admin.comic.create')->with(compact('categories', 'authors', 'cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComicValidReuqest $request)
    {
        $comic = new Comic;

        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/imgUploads', $imageName);

        $comic->fill($request->all());
        $comic->image = $imageName;
        $comic->comic_slug = Str::slug($request->name, "-");

        $comic->save();

        $comic->cats()->attach($request->cats);

        return redirect('admin/comic')->with('status', 'Thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comiccategory_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        $categories = Category::all();
        $cats = Cats::all();
        $authors = Author::all();

        return view('admin.comic.edit')->with(compact('categories', 'comic', 'authors', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(ComicUpdateRequest $request, Comic $comic)
    {
        if ($request->image) {
            if ($comic->image){
                unlink('storage/imgUploads/'.$comic->image);
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/imgUploads', $imageName);

            $comic->fill($request->all());
            $comic->image = $imageName;
            $comic->comic_slug = Str::slug($request->name, "-");
            $comic->save();
            $comic->cats()->sync($request->cats);
            return redirect('admin/comic')->with('status', 'Cập nhật thành công');
        }

        $comic->fill($request->all());
        $comic->save();
        $comic->cats()->sync($request->cats);
        return redirect('admin/comic')->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->back()->with('status', 'Xóa thành công');
    }

    public function blockComic(Comic $comic)
    {
        $comic->status = false;
        $comic->save();

        return redirect('admin/comic')->with('status', 'Khóa thành công');
    }

    public function unblockComic(Comic $comic)
    {
        $comic->status = true;
        $comic->save();

        return redirect('admin/comic')->with('status', 'Mở khóa thành công');
    }

    public function completeComic(Comic $comic)
    {
        $comic->is_complete = true;
        $comic->save();

        return redirect('admin/chapter');
    }

    public function uncompleteComic(Comic $comic)
    {
        $comic->is_complete = false;
        $comic->save();

        return redirect('admin/chapter');
    }

    /**
     * Chapter of Comic
     */

    public function showChapterOfComic(Chapter $chapter, Comic $comic)
    {
        $chapters = $comic->chapters()->orderBy('id', 'desc')->paginate(20);

        return view('admin.chapter.show')->with(compact('chapters', 'comic'));

    }

    public function createChapterOfComic(Comic $comic)
    {
        return view('admin.chapter.create')->with(compact('comic'));
    }

}
