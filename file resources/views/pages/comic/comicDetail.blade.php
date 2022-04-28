<div class="py-4 px-3 row no-gutters comic-detail">
    <div class="col-12">
        <div class="d-flex">
            <div class="flex-shrink-0 me-4">
                <img src="{{ asset('storage/imgUploads/'.$comic->image) }}" alt="Ảnh truyện" style="width:210px" class="shadow-sm bg-body rounded wishlish-img">
            </div>
            <div class="flex-grow-1 ms-3">
                <div class="mb-2">
                    <h2>{{ $comic->name }}</h2>
                </div>

                <div class="d-flex mb-3 flex-wrap">
                    <a class="border border-secondary px-3 py-2 me-2 rounded-pill text-secondary text-decoration-none mt-2" href="{{ route('showAuthor', ['author_slug'=>$comic->author->author_slug]) }}">
                        {{ $comic->author->name }}
                    </a>
                    <a class="border border-success px-3 py-2 me-2 rounded-pill text-success text-decoration-none mt-2" href="{{ route('showCategory', ['category_slug'=>$comic->category->cat_slug]) }}">
                        {{ $comic->category->name }}
                    </a>

                    @foreach($comic->cats as $cat)
                    @if ($cat->name !== $comic->category->name)
                    <a class="border border-info px-3 py-2 me-2 rounded-pill text-info text-decoration-none mt-2" href="{{ route('showCategory', ['category_slug'=>$cat->cat_slug]) }}">
                        {{ $cat->name }}
                    </a>
                    @endif
                    @endforeach

                    @if ($comic->is_complete === 1)
                    <div class="border border-success px-3 py-2 rounded-pill text-success mt-2">Hoàn thành</div>
                    @else
                    <div class="border border-danger px-3 py-2 rounded-pill text-danger mt-2">Đang ra</div>
                    @endif
                </div>

                <div class="d-flex">
                    <p class="me-5">Số chương: <span class="bold">{{ $comic->chapters()->count() }}</span></p>
                    <p>Số lượt đọc: <span class="bold">{{ $comic->view_count }}</span></p>
                </div>

                <div class="d-flex mb-3">
                    <input type="hidden" value="{{ $chapterFirst->comic->name }}" class="viewed-name-comic{{ $chapterFirst->id }}">
                    <input type="hidden" value="{{ $chapterFirst->name }}" class="viewed-name-chapter{{ $chapterFirst->id }}">
                    <input type="hidden" value="{{ asset('storage/imgUploads/'.$chapterFirst->comic->image) }}" class="viewed-img{{ $chapterFirst->id }}">

                    <a href="{{ route('showChapter', ['comic_slug'=>$comic->comic_slug, 'chapter_slug'=>$chapterFirst->name_slug]) }}"
                        class="btn btn-danger text-decoration-none rounded-pill viewed-btn{{ $chapterFirst->id }}"
                        onclick="viewedChapter(this.id)" id="{{ $chapterFirst->id }}">
                        Đọc ngay
                    </a>

                    <input type="hidden" value="{{ $comic->name }}" class="wishlish-name">
                    <input type="hidden" value="{{ $comic->chapters()->count() }}" class="wishlish-chapters">
                    <input type="hidden" value="{{ $comic->id }}" class="wishlish-id">
                    <input type="hidden" value="{{ \URL::current() }}" class="wishlish-url">
                    <a href="#" class="favorite-btn">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
