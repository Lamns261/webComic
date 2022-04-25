<?php

namespace App\Http\Controllers\Pages;

use App\Events\ChapterView;
use App\Events\ComicView;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicPageController extends Controller
{
    public function showComic($comic_slug)
    {
        $comic = Comic::where('comic_slug', $comic_slug)->with('category', 'author')->first();

        $chapters = $comic->chapters()->orderBy('id')->get();
        $chapterFirst = $chapters->first();
        $newUpdateChapters = $comic->chapters()->orderBy('id', 'desc')->limit(5)->get();

        $comicOfAuthors = $comic->author->comics()->inRandomOrder()->limit(5)->get();

        $ratings = $comic->ratings()->get();

        $avgCharacter = $ratings->avg('chacrater_rating');
        $avgCharacter = round($avgCharacter, 2);

        $avgContent = $ratings->avg('content_rating');
        $avgContent = round($avgContent, 2);

        $avgStyle = $ratings->avg('style_rating');
        $avgStyle = round($avgStyle, 2);

        ComicView::dispatch($comic);

        return view('pages.comic.index')->with(compact(
            'comic',
            'chapters', 'chapterFirst', 'newUpdateChapters',
            'comicOfAuthors',
            'ratings', 'avgCharacter', 'avgContent', 'avgStyle'
        ));
    }

    public function showChapter($comic_slug, $chapter_slug)
    {
        $comic = Comic::where('comic_slug', $comic_slug)->with('category', 'author')->first();

        $chapter = $comic->chapters()->where('name_slug', $chapter_slug)->first();
        $allChapters = $comic->chapters()->orderBy('id')->get();

        $nextChapter = $allChapters->where('id', '>', $chapter->id)->first();
        $prevChapter = $allChapters->where('id', '<', $chapter->id)->last();

        $minChapterId = $allChapters->first();
        $maxChapterId = $allChapters->last();

        ChapterView::dispatch($chapter);

        return view('pages.chapterOfComic.index')
            ->with(compact('chapter', 'comic', 'allChapters', 'nextChapter', 'prevChapter', 'minChapterId', 'maxChapterId'));
    }
}
