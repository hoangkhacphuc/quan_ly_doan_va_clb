$(document).ready(function(){
    // Slider
    $('.autoplay').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: true,
        infinite:true,
        Swipe: true,
        swipeToSlide: true,
        responsive : [
            {
                breakpoint: 1000,
                settings : {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 650,
                settings : {
                    slidesToShow: 2
                }
            }
        ]
    });
});
