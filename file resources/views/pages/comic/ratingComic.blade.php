<div class="col-8">
    <div class="rating-form">
        <form action="{{ route('storeRating', ['comic_slug'=>$comic->comic_slug]) }}" method="post" class="p-3">
            @csrf
            <rating-form></rating-form>

            <input type="text" class="form-control mb-3" name="reader_name" placeholder="Tên bạn đọc">
            <textarea class="form-control mb-3" name="comment" rows="5" placeholder="Đánh giá của bạn"></textarea>

            <button type="submit" class="btn btn-primary"><i class="fas fa-share"></i></button>
        </form>
    </div>

    <rating-cmt></rating-cmt>
</div>
