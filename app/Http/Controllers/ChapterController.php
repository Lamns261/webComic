<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterUpdateRequest;
use App\Http\Requests\ChapterValidRequest;
use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(20);

        return view('admin.chapter.index')->with(compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comic $comic)
    {
        dd($comic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterValidRequest $request)
    {
        $chapter = new Chapter;

        $chapter->fill($request->all());
        $chapter->name_slug = Str::slug($request->name, "-");
        $chapter->save();

        return redirect('admin/comic/'.$chapter->comic_id.'/chapter')->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        return view('admin.chapter.edit')->with('chapter', $chapter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterUpdateRequest $request, Chapter $chapter)
    {
        $chapter->fill($request->all());
        $chapter->name_slug = Str::slug($request->name, "-");
        $chapter->save();

        return redirect('admin/comic/'.$chapter->comic_id.'/chapter')->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->back()->with('status', 'Xóa thành công');
    }

}
