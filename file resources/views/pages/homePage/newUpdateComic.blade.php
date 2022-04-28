<table class="table table-striped table-hover">
    <tbody>
        @foreach ($newUpdateChapters as $chapter)
        <input type="hidden" value="{{ $chapter->comic->name }}" class="viewed-name-comic{{ $chapter->id }}">
        <input type="hidden" value="{{ $chapter->name }}" class="viewed-name-chapter{{ $chapter->id }}">
        <input type="hidden" value="{{ asset('storage/imgUploads/'.$chapter->comic->image) }}" class="viewed-img{{ $chapter->id }}">

        <tr>
            <td class="text-secondary">
                {{ $chapter->comic->category->name }}
            </td>
            <td>
                <a href="{{ route('showComic', ['comic_slug'=>$chapter->comic->comic_slug]) }}"
                    class="text-decoration-none text-reset fw-bold">
                    {{ Str::limit($chapter->comic->name, 30) }}
                </a>
            </td>
            <td>
                <a href="{{ route('showChapter', ['comic_slug'=>$chapter->comic->comic_slug, 'chapter_slug'=>$chapter->name_slug]) }}"
                    class="text-decoration-none text-reset viewed-btn{{ $chapter->id }}" onclick="viewedChapter(this.id)" id="{{ $chapter->id }}">
                    {{ Str::limit($chapter->name, 50) }}
                </a>
            </td>
            <td class="text-secondary">
                {{ Str::limit($chapter->comic->author->name, 30) }}
            </td>
            <td class="text-secondary">
                {{ $chapter->created_at->diffForHumans() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
