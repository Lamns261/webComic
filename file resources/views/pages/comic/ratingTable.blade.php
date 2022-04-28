<div class="col-4">
    <div class="rating-table">
        <p class="rating-table-total">Đã có {{ $ratings->count() }} đánh giá</p>

        <div class="d-inline-block">
            <span class="rating-table-title">Tổng thể</span>
            @for ($i=1; $i<=5; $i++)
            <span class="star"
                style="{{ $i-0.5 < ($avgCharacter + $avgContent + $avgStyle)/3 ? 'color:#ffc000;' : 'color:#ccc;' }}">
                &#9733
            </span>
            @endfor
            <span class="rating-table-point">{{ round(($avgCharacter + $avgContent + $avgStyle)/3, 2) }}</span>
        </div>
        <hr>

        <div class="d-inline-block">
            <span class="rating-table-title">Nội dung</span>
            @for ($i=1; $i<=5; $i++) <span class="star {{ $i-0.5 < $avgContent ? 'star-yellow' : 'star-gray' }}">
            &#9733
            </span>
            @endfor
            <span class="rating-table-point">{{ $avgContent }}</span>
        </div>

        <div class="d-inline-block">
            <span class="rating-table-title">Nhân vật</span>
            @for ($i=1; $i<=5; $i++) <span class="star {{ $i-0.5 < $avgContent ? 'star-yellow' : 'star-gray' }}">
            &#9733
            </span>
            @endfor
            <span class="rating-table-point">{{ $avgCharacter }}</span>
        </div>

        <div class="d-inline-block">
            <span class="rating-table-title">Văn phong</span>
            @for ($i=1; $i<=5; $i++) <span class="star" style="{{ $i-0.5 < $avgStyle ? 'color:#ffc000;' : 'color:#ccc;' }}">
            &#9733
            </span>
            @endfor
            <span class="rating-table-point">{{ $avgStyle }}</span>
        </div>
    </div>

    <div class="rating-table">
        <p class="rating-table-warning">Lưu ý khi đánh giá</p>
        <ol>
            <li>Không được dẫn link hoặc nhắc đến website khác</li>
            <li>Không được có những từ ngữ gay gắt, đả kích, xúc phạm người khác</li>
            <li>Đánh giá hoặc bình luận không liên quan tới truyện sẽ bị xóa</li>
            <li>Đánh giá có điểm số sai lệch với nội dung sẽ bị xóa</li>
        </ol>
    </div>
</div>
