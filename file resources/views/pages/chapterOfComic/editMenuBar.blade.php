<div class="edit-bar">
    <div>
        <a href="{{ route('showComic', ['comic_slug'=>$comic->comic_slug]) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <div class="btn-group dropstart dropdown-chapters">
        <button type="button" class="dropdown-chapters-btn btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
        <div class="dropdown-menu dropdown-chapters-menu row">
            <p>Danh sách chương</p>
            @foreach($allChapters as $chap)

            <input type="hidden" value="{{ $chap->comic->name }}" class="viewed-name-comic{{ $chap->id }}">
            <input type="hidden" value="{{ $chap->name }}" class="viewed-name-chapter{{ $chap->id }}">
            <input type="hidden" value="{{ asset('storage/imgUploads/'.$chap->comic->image) }}" class="viewed-img{{ $chap->id }}">

            <div class="dropdown-chapters-item col-6">
                <a class="{{ $chapter->id == $chap->id ? 'text-dark fw-bold' : '' }} viewed-btn{{ $chap->id }}" href="{{ route('showChapter', ['comic_slug'=>$comic->comic_slug, 'chapter_slug'=>$chap->name_slug]) }}" onclick="viewedChapter(this.id)" id="{{ $chap->id }}">
                    {{ Str::limit($chap->name, 40 ) }}
                </a>
            </div>
            @endforeach
        </div>
        <span class="dropdown-chapters-tooltip">
            Danh sách chương
        </span>
    </div>

    <div class="btn-group dropstart theme-color">
        <button type="button" class="dropdown-chapters-btn btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-palette"></i>
        </button>
        <div class="dropdown-menu theme-color-menu">
            <p>Màu nền</p>
            <div>
                <button class="btn-white btn-changeColor" data-color="theme-white"></button>
                <button class="btn-pink btn-changeColor" data-color="theme-pink"></button>
                <button class="btn-yellow btn-changeColor" data-color="theme-yellow"></button>
                <button class="btn-black btn-changeColor" data-color="theme-black"></button>
                <button class="btn-green btn-changeColor" data-color="theme-green"></button>
                <button class="btn-gray btn-changeColor" data-color="theme-gray"></button>
            </div>
        </div>
    </div>
</div>
