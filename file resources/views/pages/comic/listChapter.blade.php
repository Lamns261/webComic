<div class="row">
    @foreach($chapters as $chapter)

    <input type="hidden" value="{{ $chapter->comic->name }}" class="viewed-name-comic{{ $chapter->id }}">
    <input type="hidden" value="{{ $chapter->name }}" class="viewed-name-chapter{{ $chapter->id }}">
    <input type="hidden" value="{{ asset('storage/imgUploads/'.$chapter->comic->image) }}" class="viewed-img{{ $chapter->id }}">

    <div class="col-4 py-3 border-bottom text-secondary">
        <a href="{{ route('showChapter', ['comic_slug'=>$chapter->comic->comic_slug, 'chapter_slug'=>$chapter->name_slug]) }}"
            class="text-decoration-none text-reset viewed-btn{{ $chapter->id }}"
            onclick="viewedChapter(this.id)" id="{{ $chapter->id }}">
            {{ Str::limit($chapter->name, 40) }}
        </a>
    </div>
    @endforeach
</div>
