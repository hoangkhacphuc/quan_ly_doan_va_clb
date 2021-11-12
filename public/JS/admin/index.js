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

    let select_Page = 'page-1';
    $('.menu-dashboard>.container:last-child>#page-1').css('color', '#f86019');
    $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
    getPage(select_Page);
        
    $('.menu-dashboard>.container:last-child>.item').click(function () {
        $('.menu-dashboard>.container:last-child>#'+select_Page).css('color', '#555');
        select_Page = $(this).attr('id');
        $('.menu-dashboard>.container:last-child>#'+select_Page).css('color', '#f86019');

        $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/loading.gif' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
        
        getPage(select_Page);
    });

    function getPage(page) {
        if (page === "page-1")
            page = "home";

        $.get('admin/'+page)
        .done(function (data) {
            $('.page').html(data);
        }).fail(function() {
            $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
        });
    }

    // page Home
    let show = false;
    $('.btn-menu-dashboard').click(function () { 
        show = !show;
        if (show)
        {
            $('.menu-dashboard').css({
                'animation': 'menu_Move_To_Left 1s',
                'margin-left' : '0'
            });
        }
        else
        {
            $('.menu-dashboard').css({
                'animation': 'menu_Move_To_Right 1s',
                'margin-left' : '-300px'
            });
        }
    });
    

    // System Notification
    
    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }
});