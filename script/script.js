
$(document).ready(function () {
    $('.slider_slick').slick({
        initialSlide: 3,
        autoplay: true,
        arrows: false,
        fade: true,
    });
    $('select').niceSelect();
    $('#select_house').on('change', function () {
        let house_name = $(this).val();
        if (house_name !== "") {
            $('.slider_slick').slick('unslick');
            $('.slider_slick').slick({
                autoplay: false,
                arrows: false,
                fade: true,
            });
        }
        ;
        switch (house_name) {
            case 'Stark':
                $('.slider_slick').slick('slickGoTo', 0);
                break;
            case 'Baratheon':
                $('.slider_slick').slick('slickGoTo', 1);
                break;
            case 'Lannister':
                $('.slider_slick').slick('slickGoTo', 2);
                break;
            case 'Targaryen':
                $('.slider_slick').slick('slickGoTo', 3);
                break;
        }
        ;
    })
});








