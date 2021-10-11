$(document).ready(function(){
    $('#search').focus(function(){
        $('#btn-search').css("background-color" ,"white");
        $('#search').css("background-color" ,"white");
        $('#btn-search').css("color" ,"#ccc");
    });

    $('#search').blur(function(){
        $('#search').css("background-color" ,"#eee");
        $('#btn-search').css("background-color" ,"#eee");
        $('#btn-search').css("color" ,"white");
    });

    $('#btn-search').focus(function(){
        $('#search').css("background-color" ,"white");
        $('#btn-search').css("background-color" ,"white");
        $('#btn-search').css("color" ,"#ccc");
    });

    $('#btn-search').blur(function(){
        $('#search').css("background-color" ,"#eee");
        $('#btn-search').css("background-color" ,"#eee");
        $('#btn-search').css("color" ,"white");
    });

    $('#btn-search').click(function(){
        if ($('#search').val() == "")
            $('#search').focus();
    });

    const slide = $('.banner').children('img').length;
    let bannerFocus = 0;
    
    setInterval(function () {
        document.getElementById('Banner-'+bannerFocus).style = "display: none;";
        bannerFocus++;
        if (bannerFocus >= slide)
        bannerFocus = 0;
        document.getElementById('Banner-'+bannerFocus).style = "display: block;";
    }, 5000);

    let selectMenuPlayer = false;
    $('.player').click(function () {
        console.log(selectMenuPlayer);
        selectMenuPlayer = !selectMenuPlayer;
        $('.menu-box').css("display", (selectMenuPlayer ? "grid":"none"));
    });
});