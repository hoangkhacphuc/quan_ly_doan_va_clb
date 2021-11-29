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
        document.getElementById('errorLogin').innerHTML = "Đang đăng nhập . . .";
        document.getElementById('errorLogin').style = "display: inline-block; border: 1px solid #2bb157; background-color: #d6f7e1; color: #2bb157;";
        $.post('/login', 
        {
            User: $('#login-user').val(),
            Pass: $('#login-pass').val()
        },
        function () {

        }).done(function (data) {
            json = JSON.parse(data);
            if (json["Error"] !== "")
            {
                document.getElementById('errorLogin').innerHTML = json["Error"];
                document.getElementById('errorLogin').style = "display: inline-block";
            }
            else
            {
                document.getElementById('errorLogin').innerHTML = json["Done"];
                document.getElementById('errorLogin').style = "display: inline-block; border: 1px solid #2bb157; background-color: #d6f7e1; color: #2bb157;";
                setTimeout(() => {
                    window.location.replace("/");
                }, 1000);
            }
        }).fail(function() {
            document.getElementById('errorLogin').innerHTML = "Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !";
            document.getElementById('errorLogin').style = "display: inline-block";
        });
    });
});

function startModelLogin() {
    document.getElementById('model-login').style = 'animation: modelMoveStart 1s; margin-top: 0;';
}

function closeModelLogin() {
    document.getElementById('model-login').style = 'animation: modelMoveEnd 1s; margin-top: -200%;';
}