@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-10 chapter-page">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('homePage') }}" class="text-decoration-none">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('showComic', ['comic_slug'=>$comic->comic_slug]) }}" class="text-decoration-none">{{ $comic->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $chapter->name }}</li>
            </ol>
        </nav>

        <div class="my-5 d-flex justify-content-between">

            @if ($chapter->id == $minChapterId->id)
            <a href="#" class="btn btn-primary disabled">
                Chương trước
            </a>
            @else
            <input type="hidden" value="{{ $prevChapter->comic->name }}" class="viewed-name-comic{{ $prevChapter->id }}">
            <input type="hidden" value="{{ $prevChapter->name }}" class="viewed-name-chapter{{ $prevChapter->id }}">
            <input type="hidden" value="{{ asset('storage/imgUploads/'.$prevChapter->comic->image) }}" class="viewed-img{{ $prevChapter->id }}">

            <a href="{{ route('showChapter', ['comic_slug'=>$comic->comic_slug, 'chapter_slug'=>$prevChapter->name_slug]) }}" class="btn btn-primary viewed-btn{{ $prevChapter->id }}" onclick="viewedChapter(this.id)" id="{{ $prevChapter->id }}">
                Chương trước
            </a>
            @endif

            <!-- <select class="form-select menu-chapter">
                @foreach($allChapters as $chap)
                <option value="{{ route('showChapter', ['comic_slug'=>$comic->comic_slug, 'chapter_slug'=>$chap->name_slug]) }}">
                    {{ $chap->name }}
                </option>
                @endforeach
            </select> -->

            <!-- <div class="dropdown dropdown-chapters">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $chapter->name }}
                </a>

                <ul class="dropdown-menu dropdown-chapters-item" aria-labelledby="dropdownMenuLink">
                    @foreach($allChapters as $chap)

                    <input type="hidden" value="{{ $chap->comic->name }}" class="viewed-name-comic{{ $chap->id }}">
                    <input type="hidden" value="{{ $chap->name }}" class="viewed-name-chapter{{ $chap->id }}">
                    <input type="hidden" value="{{ asset('storage/imgUploads/'.$chap->comic->image) }}" class="viewed-img{{ $chap->id }}">

                    <li>
                        <a class="dropdown-item {{ $chapter->id == $chap->id ? 'text-dark fw-bold' : '' }} viewed-btn{{ $chap->id }}"
                            href="{{ route('showChapter', ['comic_slug'=>$comic->comic_slug, 'chapter_slug'=>$chap->name_slug]) }}"
                            onclick="viewedChapter(this.id)" id="{{ $chap->id }}">
                            {{ $chap->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div> -->

            @if ($chapter->id == $maxChapterId->id)
            <a href="#" class="btn btn-primary disabled">
                Chương sau
            </a>
            @else
            <input type="hidden" value="{{ $nextChapter->comic->name }}" class="viewed-name-comic{{ $nextChapter->id }}">
            <input type="hidden" value="{{ $nextChapter->name }}" class="viewed-name-chapter{{ $nextChapter->id }}">
            <input type="hidden" value="{{ asset('storage/imgUploads/'.$nextChapter->comic->image) }}" class="viewed-img{{ $nextChapter->id }}">

            <a href="{{ route('showChapter', ['comic_slug'=>$comic->comic_slug, 'chapter_slug'=>$nextChapter->name_slug]) }}"
                class="btn btn-primary viewed-btn{{ $nextChapter->id }}"
                onclick="viewedChapter(this.id)" id="{{ $nextChapter->id }}">
                Chương sau
            </a>
            @endif
        </div>

        <div>
            <h2>{{ $chapter->name }}</h2>
        </div>

        <div class="d-flex my-4">
            <div class="me-5">
                <a href="{{ route('showComic', ['comic_slug'=>$comic->comic_slug]) }}" class="text-decoration-none text-secondary">
                    <i class="pe-2 fas fa-book"></i>
                    {{ $comic->name }}
                </a>
            </div>
            <div>
                <a href="#" class="text-decoration-none text-secondary">
                    <i class="pe-2 fas fa-user-edit"></i>
                    {{ $comic->author->name }}
                </a>
            </div>
        </div>

        <div class="chapter-content">
            {!! $chapter->content !!}
            @include('pages.chapterOfComic.editMenuBar')
        </div>
        <div class="mt-5 d-flex">
            <div class="mx-auto comments">
                <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="10"></div>
            </div>
        </div>

    </div>
</div>

@endsection
