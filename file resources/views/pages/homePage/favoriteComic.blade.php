<div class="list-ranking">
    <div class="mb-3">
        <div class="d-flex align-items-center">
            @foreach ($readRankingComics->slice(0,1) as $comic)
            <div>
                <p>
                    <a href="{{ route('showComic', ['comic_slug'=>$comic->comic_slug]) }}" class="text-decoration-none text-reset fw-bold">
                        {{ Str::limit($comic->name, 35) }}
                    </a>
                </p>
                <div class="ms-2 text-secondary">
                    <!-- <p>{{ $comic->view_count }}</p> -->
                    <p>
                        {{ $comic->author->name }}
                    </p>
                    <p>
                        <a class="text-decoration-none text-reset"
                            href="{{'/categories/'.$comic->category->cat_slug}}">
                            {{ $comic->category->name }}
                        </a>
                    </p>
                </div>
            </div>
            <div class="ms-auto">
                <div class="book-cover">
                    <a href="{{ route('showComic', ['comic_slug'=>$comic->comic_slug]) }}" class="book-cover-link">
                        <img src="{{ asset('storage/imgUploads/'.$comic->image) }}" alt="Ảnh truyện" /></a>
                    <span class="book-cover-shadow"></span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @foreach ($readRankingComics->slice(1) as $comic)
    <div class="d-flex justify-content-between mb-3">
        <p>
            <a href="{{ route('showComic', ['comic_slug'=>$comic->comic_slug]) }}" class="text-decoration-none text-reset">
                {{ Str::limit($comic->name, 35) }}
            </a>
        </p>
        <!-- <span>{{ $comic->view_count }}</span> -->
    </div>
    @endforeach
</div>
