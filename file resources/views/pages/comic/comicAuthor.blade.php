<div class="text-center author-card px-2">
    <h2 class="pt-3">
        TÁC GIẢ
    </h2>
    <h3 class="pt-3">
        <a href="{{ route('showAuthor', ['author_slug'=>$comic->author->author_slug]) }}"
            class="text-decoration-none text-reset">
            {{ $comic->author->name }}
        </a>
    </h3>
    <div class="d-flex justify-content-center">
        <i class="mt-2 p-2 fas fa-book fa-2x"></i>
        <p class="mt-2 p-2">Số truyện</p>
        <div class="mt-1 p-2 bold fs-3">{{ $comic->author->comics()->count() }}</div>
    </div>

    <ul class="mt-3 px-1 text-start">
        @foreach ($comicOfAuthors as $comic)
        <p>
            <a href="{{'/comic/'.$comic->comic_slug}}" class="d-block text-decoration-none text-secondary">
                {{ $comic->name }}
            </a>
        </p>
        <hr />
        @endforeach
        <a class="btn btn-primary mb-3" href="{{ route('showAuthor', ['author_slug'=>$comic->author->author_slug]) }}">
            Xem tất cả
        </a>
    </ul>
</div>
