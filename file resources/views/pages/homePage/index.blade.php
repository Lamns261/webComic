@extends('layouts.app')

@section('content')

<!-- RecommendComic -->
<div class="row py-3 mt-3">
    <div class="col-9">
        <rec-comic></rec-comic>
    </div>
    <div class="col-3">
        <div class="viewed-comic">
            <h5>Truyện đang đọc</h5>
        </div>

        <div class="wishlish_comic">
            <h5>Truyện yêu thích</h5>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="d-flex align-items-center mb-3">
            <h3>MỚI CẬP NHẬT</h3>
        </div>
        @include('pages.homePage.newUpdateComic')
    </div>
</div>

<!-- readRankingComic -->
<div class="row p-3 justify-content-between">
    <div class="col-4 px-4 ranking-block">
        <div class="pt-3 d-flex align-items-center py-1">
            <h3>Truyện đọc nhiều</h3>
        </div>
        @include('pages.homePage.readRankingComic')
    </div>

    <div class="col-4 px-4 ranking-block">
        <div class="pt-3 d-flex align-items-center py-1">
            <h3>Truyện đề cử</h3>
        </div>
        @include('pages.homePage.favoriteComic')
    </div>

    <div class="col-4 px-4 ranking-block">
        <div class="pt-3 d-flex align-items-center py-1">
            <h3>Truyện thịnh hành</h3>
        </div>
        @include('pages.homePage.readRankingComic')
    </div>
</div>

<!-- newCompleteComics & newComic -->
<div class="row py-3">
    <div class="col-4">
        <new-comic></new-comic>
    </div>
    <div class="col-8">
        <div class="row">
            <div class="pt-3">
                <h3>TRUYỆN ĐÃ HOÀN THÀNH</h3>
            </div>
            @foreach ($newCompleteComics as $comic)
            @include('pages.homePage.recommendComic')
            @endforeach
        </div>
    </div>
</div>


@endsection
