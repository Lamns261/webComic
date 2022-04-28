<div class="tabs py-4 px-3">

    <input type="radio" name="tabs" id="tabone" checked="checked">
    <label for="tabone">Giới thiệu</label>
    <div class="tab">
        <div class="row">
            <div class="col-8">
                <p>
                    {!! $comic->summary !!}
                </p>
                <div>
                    <h5 class="fw-bold">
                        Chương mới cập nhật:
                    </h5>
                    <ul class="newUpdate-chapter">
                        @foreach($newUpdateChapters as $chapter)
                        <li>
                            <a href="{{ route('showChapter', ['comic_slug'=>$chapter->comic->comic_slug, 'chapter_slug'=>$chapter->name_slug]) }}" class="text-decoration-none text-reset">
                                {{ $chapter->name }} <span class="text-secondary fst-italic">({{ $chapter->created_at->diffForHumans() }})</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-4">
                @include('pages.comic.comicAuthor')
            </div>
        </div>
    </div>

    <input type="radio" name="tabs" id="tabtwo">
    <label for="tabtwo">Đánh giá <span>({{ $comic->ratings->count() }})</span></label>
    <div class="tab">
        <div class="row">
            @include('pages.comic.ratingComic')
            @include('pages.comic.ratingTable')
        </div>
    </div>

    <input type="radio" name="tabs" id="tabthree">
    <label for="tabthree">Danh sách chương <span>({{ $comic->chapters->count() }})</span></label>
    <div class="tab">
        @include('pages.comic.listChapter')
    </div>

    <input type="radio" name="tabs" id="tabfour">
    <label for="tabfour">Bình luận</label>
    <div class="tab">
        <div class="mt-5 d-flex">
            <div class="mx-auto comments">
                <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="10"></div>
            </div>
        </div>
    </div>

</div>
