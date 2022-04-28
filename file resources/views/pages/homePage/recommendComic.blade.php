<div class="col-6 mt-3">
    <div class="d-flex">
        <a href="{{'/comic/'.$comic->comic_slug}}">
            <img class="me-3" style="max-width: 72px" src="{{ asset('storage/imgUploads/'.$comic->image) }}" alt="Ảnh truyện" />
        </a>
        <div>
            <h5>
                <a href="{{'/comic/'.$comic->comic_slug}}" class="d-block text-decoration-none fw-bold text-info">
                    {{ $comic->name }}
                </a>
            </h5>
            <p>
                {{ Str::limit($comic->summary, 60) }}
            </p>
            <div class="d-flex align-items-center">
                <div class="me-auto text-secondary">
                    <a class="text-decoration-none text-reset"
                        href="{{ route('showAuthor', ['author_slug'=>$comic->author->author_slug]) }}">
                        <i class="fas fa-user-edit me-1"></i>
                        {{ Str::limit($comic->author->name, 20) }}
                    </a>
                </div>
                <a href="{{ route('showCategory', ['category_slug'=>$comic->category->cat_slug]) }}">
                    <span class="d-inline-block border border-success text-success text-center" style="min-width: 105px;">
                        {{ $comic->category->name }}
                    </span>
                </a>
            </div>
        </div>
    </div>
    <hr />
</div>
