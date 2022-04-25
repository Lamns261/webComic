<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\AppConst;
use App\Models\Cats;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(AppConst::CAT_PER_PAGE);

        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;
        $cats = new Cats;

        $category->fill($request->all());
        $cats->fill($request->all());

        $category->cat_slug = Str::slug($request->name, "-");
        $cats->cat_slug = Str::slug($request->name, "-");

        $category->save();
        $cats->save();

        return redirect('admin/category')->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $cats = Cats::where('name', $category->name)->first();
        $cats->fill($request->all());
        $cats->cat_slug = Str::slug($request->name,'-');

        $category->fill($request->all());
        $category->cat_slug = Str::slug($request->name,'-');

        $cats->save();
        $category->save();

        return redirect('admin/category')->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $cats = Cats::where('name', $category->name)->first();
        $cats->delete();

        $category->delete();

        return redirect()->back()->with('status', 'Xóa thành công');
    }
}
