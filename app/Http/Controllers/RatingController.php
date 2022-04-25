<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, $comic_slug)
    {
        $comic = Comic::where('comic_slug', $comic_slug)->first();
        $rating = new Rating();

        $rating->fill($request->all());
        $rating->comic_id = $comic->id;

        $rating->save();

        return redirect()->back();
    }

    public function index()
    {
        $ratings = Rating::where('is_valid', true)->paginate(20);

        return view('admin.rating.index')->with(compact('ratings'));
    }

    public function valid($rating)
    {
        $rating = Rating::where('id', $rating)->first();
        $rating->is_valid = true;

        $rating->save();
        return redirect()->back();
    }

    public function notValid($rating)
    {
        $rating = Rating::where('id', $rating)->first();
        $rating->is_valid = false;

        $rating->save();
        return redirect()->back();
    }

    public function destroy($rating)
    {
        $rating = Rating::where('id', $rating)->first();
        $rating->delete();

        return redirect()->back()->with('status', 'Xóa thành công');;
    }
}
