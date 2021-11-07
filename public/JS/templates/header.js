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
        selectMenuPlayer = !selectMenuPlayer;
        $('.menu-box').css("display", (selectMenuPlayer ? "grid":"none"));
    });

    let selectBtnShowMenu = false;
    $('#btn-showMenu').click(function () {
        selectBtnShowMenu = !selectBtnShowMenu;
        $('.menu').children('ul').css("animation-name", (selectBtnShowMenu ? "showMenu":"hideMenu"));
        $('.menu').children('ul').css("left", (selectBtnShowMenu ? "0":"-100%"));
    });

    // Login

    $('#btn-login').click(function () {
        $.post('/login', 
        {
            User: $('#login-user').val(),
            Pass: $('#login-pass').val()
        },
        function (data, status) {
            console.log(data);
        }).done(function () {
            console.log(123);
        });
    });
});

function startModelLogin() {
    document.getElementById('model-login').style = 'animation: modelMoveStart 1s; margin-top: 0;';
}

function closeModelLogin() {
    document.getElementById('model-login').style = 'animation: modelMoveEnd 1s; margin-top: -200%;';
}