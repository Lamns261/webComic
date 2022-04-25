function viewedChapter(id) {
    const chapter_name = $('.viewed-name-chapter'+id).val();
    const comic_name = $('.viewed-name-comic'+id).val();
    const chapter_url = $('.viewed-btn'+id).attr('href');
    const chapter_img = $('.viewed-img'+id).val();

    const chapter = {
        'id': id,
        'comicName': comic_name,
        'chapterName': chapter_name,
        'img': chapter_img,
        'url': chapter_url,
    }

    if (localStorage.getItem('viewed_chapter') === null) {
        localStorage.setItem('viewed_chapter', '[]');
    }

    var data = JSON.parse(localStorage.getItem('viewed_chapter'));

    var matches = $.grep(data, function (obj) {
        return obj.id == chapter.id;
    })

    if (matches.length) {

    }
    else {
        for (var i = 0; i < data.length; i++) {
            if (data[i].comicName === chapter.comicName) {
                data.splice(i, 1);
            }
        }
        data.push(chapter);
        localStorage.setItem('viewed_chapter', JSON.stringify(data));

        $('.viewed-comic').append(`
            <div class="row viewed-item viewed-item-`+chapter.id+`">
                <div class="col-3 viewed-img">
                    <a href="`+chapter.url+`">
                        <img src="`+chapter.img+`" alt="`+chapter.comicName+`">
                    </a>
                </div>
                <div class="col-9 viewed-content">
                    <p>`+chapter.comicName+`</p>
                    <div class="viewed-chapter">
                        <a href="`+chapter.url+`">
                            <span>`+chapter.chapterName+`</span>
                        </a>
                        <button class="viewed-delete" onclick="deleteViewedComic(`+id+`)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `);
    }

    localStorage.setItem('viewed_chapter', JSON.stringify(data));
}

// Show viewed_chapter

if ($('.viewed-comic')[0]) {
    showViewChapter();
}

function truncate(str, limit) {
    if (str.length < limit) {
        return str;
    }
    return str.slice(0, limit) + "...";
}

function showViewChapter() {
    if (localStorage.getItem('viewed_chapter') != null) {
        var data = JSON.parse(localStorage.getItem('viewed_chapter'));

        $('.viewed-comic')[0].style.overflow = 'scroll';
        $('.viewed-comic')[0].style.height = '330px';

        for (let i = 0; i < data.length; i++) {
            let comicName = truncate(data[i].comicName, 25);
                chapterName = truncate(data[i].chapterName, 15);
                url = data[i].url;
                img = data[i].img;
                id = data[i].id;

            $('.viewed-comic').append(`
                <div class="row viewed-item viewed-item-`+id+`">
                    <div class="col-3 viewed-img">
                        <a href="`+url+`">
                            <img src="`+img+`" alt="`+comicName+`">
                        </a>
                    </div>
                    <div class="col-9 viewed-content">
                        <p>`+comicName+`</p>
                        <div class="viewed-chapter">
                            <a href="`+url+`">
                                <span>`+chapterName+`</span>
                            </a>
                            <button class="viewed-delete" onclick="deleteViewedComic(`+id+`)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `);
        }
    }
    else {
        $('.viewed-comic').append('<p class="wishlish-chapter">Hãy tìm truyện đọc ngay nào bạn ơi</p>')
    }

    if (localStorage.getItem('viewed_chapter') === '[]') {
        $('.viewed-comic').append('<p class="wishlish-chapter">Hãy tìm truyện đọc ngay nào bạn ơi</p>')
    }
}

function deleteViewedComic(id) {
    var data = JSON.parse(localStorage.getItem('viewed_chapter'));

    var matches = $.grep(data, function (obj) {
        return obj.id == id;
    })

    if (matches.length) {
        for (var i = 0; i < data.length; i++) {
            if (data[i].id == id) {
                data.splice(i, 1);
                localStorage.setItem('viewed_chapter', JSON.stringify(data));

                $('.viewed-item-'+id).css("display","none");
            }
        }
    }
    localStorage.setItem('viewed_chapter', JSON.stringify(data));
}



var btnChangeColors = document.querySelectorAll('.btn-changeColor');
var listColor = [];

btnChangeColors.forEach( color => {
    listColor.push(color.getAttribute('data-color'));

    color.addEventListener('click', function () {
        let content = document.querySelector('.chapter-page');
        let footer = document.querySelector('.footer');

        if (this.getAttribute('data-color') == 'theme-black') {
            document.body.classList.remove(...listColor);
            document.body.classList.add(this.getAttribute('data-color'));
            content.style.color = '#ccc';
            footer.style.color = '#ccc';

            localStorage.setItem('theme-color', this.getAttribute('data-color'))
        }

        document.body.classList.remove(...listColor);
        document.body.classList.add(this.getAttribute('data-color'));
        localStorage.setItem('theme-color', this.getAttribute('data-color'))
    })
})

$(document).ready(function() {
    if ($('.btn-changeColor').length != 0) {
        if (localStorage.getItem('theme-color') !== null) {
            let color = localStorage.getItem('theme-color');

            document.body.classList.remove(...listColor);
            document.body.classList.add(color);
        }
    }
})
