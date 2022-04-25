$('.menu-chapter').on('change', function(){
    let url = $(this).val();

    if (url){
        window.location = url;
    }
    return false
});

current_chapter();

function current_chapter() {
    let url = window.location.href;

    $('.menu-chapter').find('option[value="'+url+'"]').attr("selected",true);
}


