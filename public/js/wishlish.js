$('.favorite-btn').on('click', function() {
    $('.favorite-btn').css('color', 'red');
    const comic_id = $('.wishlish-id').val();
    const comic_name = $('.wishlish-name').val();
    const comic_chapters = $('.wishlish-chapters').val();
    const comic_url = $('.wishlish-url').val();
    const comic_img = $('.wishlish-img').attr('src');

    const comic = {
        'id': comic_id,
        'name': comic_name,
        'chapters': comic_chapters,
        'url': comic_url,
        'img': comic_img
    }

    if (localStorage.getItem('wishlish_comic') === null) {
        localStorage.setItem('wishlish_comic', '[]');
    }

    var data = JSON.parse(localStorage.getItem('wishlish_comic'));

    var matches = $.grep(data, function (obj) {
        return obj.id == comic.id;
    })

    if (matches.length) {
        alert('Truyện đã có trong danh sách yêu thích');
    }
    else {
        data.push(comic);
        localStorage.setItem('wishlish_comic', JSON.stringify(data));

        let name = truncate(comic.name, 25);

        $('.wishlish_comic').append(`
            <div class="row wishlish-item wishlish-item-`+comic.id+`">
                <div class="col-3 wishlish-img">
                    <a href="`+comic.url+`">
                        <img src="`+comic.img+`" alt="`+comic.name+`">
                    </a>
                </div>
                <div class="col-9 wishlish-content">
                    <a href="`+comic.url+`">
                        <span>`+name+`</span>
                    </a>
                    <div class="wishlish-chapter">
                        <span>Số chương: `+comic.chapters+`</span>
                        <button class="wishlish-delete" onclick="deleteWishlish(`+comic.id+`)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `);
    }

    localStorage.setItem('wishlish_comic', JSON.stringify(data));
})

// Show Wishlish
if ($('.wishlish_comic')[0]) {
    showWishlish();
}

function truncate(str, limit) {
    if (str.length < limit) {
        return str;
    }
    return str.slice(0, limit) + "...";
}

function showWishlish() {
    if (localStorage.getItem('wishlish_comic') != null) {
        var data = JSON.parse(localStorage.getItem('wishlish_comic'));

        $('.wishlish_comic')[0].style.overflow = 'scroll';
        $('.wishlish_comic')[0].style.height = '300px';

        for (var i = 0; i < data.length; i++) {
            var name = truncate(data[i].name, 25);
                chapters = data[i].chapters;
                url = data[i].url;
                img = data[i].img;
                id = data[i].id;

            $('.wishlish_comic').append(`
                <div class="row wishlish-item wishlish-item-`+id+`">
                    <div class="col-3 wishlish-img">
                        <a href="`+url+`">
                            <img src="`+img+`" alt="`+name+`">
                        </a>
                    </div>
                    <div class="col-9 wishlish-content">
                        <a href="`+url+`">
                            <span>`+name+`</span>
                        </a>
                        <div class="wishlish-chapter">
                            <span>Số chương: `+chapters+`</span>
                            <button class="wishlish-delete" onclick="deleteWishlish(`+id+`)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `);
        }
    }
    else {
        $('.wishlish_comic').append('<p class="wishlish-chapter">Bạn chưa có truyện yêu thích</p>');
    }

    if (localStorage.getItem('wishlish_comic') === '[]') {
        $('.wishlish_comic').append('<p class="wishlish-chapter">Bạn chưa có truyện yêu thích</p>');
    }
}

function deleteWishlish(id) {
    var data = JSON.parse(localStorage.getItem('wishlish_comic'));

    var matches = $.grep(data, function (obj) {
        return obj.id == id;
    })

    if (matches.length) {
        for (var i = 0; i < data.length; i++) {
            if (data[i].id == id) {
                data.splice(i, 1);
                localStorage.setItem('wishlish_comic', JSON.stringify(data));

                $('.wishlish-item-'+id).css("display","none");
            }
        }
    }
    localStorage.setItem('wishlish_comic', JSON.stringify(data));
}
