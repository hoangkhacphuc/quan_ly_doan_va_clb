

$(document).ready(function () {
    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }

    $('#inp-search-post').focus(function () { 
        $('.page-home>.head-home>.search>.line').css({
            'animation' : 'select_Input_Search 0.5s',
            'width' : '100%',
        });
    });
    $('#inp-search-post').blur(function () { 
        $('.page-home>.head-home>.search>.line').css({
            'animation' : 'unselect_Input_Search 0.5s',
            'width' : '0',
        });
    });

    var select_Type = "select-all";
    var current_tab = 0;

    $('.type-current').click(function () { 
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'block');
    });

    $('.page-home>.head-home>.manager>.container>.dropdown>.item').click(function () { 
        $('.type-current').html($(this).html()+'<i class="fa fa-sort-down">');
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'none');

        if ($(this).attr('id') != select_Type)
        {
            select_Type = $(this).attr('id');
            var fd = new FormData();
            fd.append('limit',current_tab);
            if (select_Type == "select-posted")
                fd.append('limit',0);
            else if (select_Type == "select-draft")
                fd.append('limit',1);

            $.ajax({
                url: 'group/get_post',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                   
                },
             })
             .done(function (responses) {
                let json = JSON.parse(responses);
                if (json["status"])
                {
                    var result = json["message"];
                    if (count(result) > 0)
                    {
                        $('.page-home>.body-home').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
                        return;
                    }
                    $('.page-home>.body-home').html();
                }
                else $('.page-home>.body-home').html(json["message"]);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }
        else select_Type = $(this).attr('id');
    });

    var num_Check = $('.check').length - 1;
    var on_Setting_More = false;
    $('#onSettingMore').click(function () { 
        on_Setting_More = !on_Setting_More;
        $(this).html(on_Setting_More ? 'HỦY' : 'TÙY CHỌN');
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'none');
        $('.page-home>.head-home>.manager>.container>.type-current').css('display', on_Setting_More ? 'none':'block');
        $('.page-home>.head-home>.manager>.container>.setting-more').css('display', on_Setting_More ? 'flex':'none');
        $('.check').css('display', on_Setting_More ? 'block':'none');
        $('.check').addClass('uncheck');
        $('.page-home>.head-home>.manager>.container>.setting-more>span').html('0/'+num_Check);
    });

    $('.check').click(function () { 
        var status = $(this).attr('class').search('uncheck') != -1 ? 0 : 1;
        if ($(this).attr('id') === 'check-all')
        {
            status ? $('.check').addClass('uncheck') : $('.check').removeClass('uncheck');
            $('.page-home>.head-home>.manager>.container>.setting-more>span').html((status ? '0':num_Check)+'/'+num_Check);
            return;
        }
        var status_All = $('#check-all').attr('class').search('uncheck') != -1 ? 0 : 1;
        status ? $(this).addClass('uncheck') : $(this).removeClass('uncheck');
        $('.page-home>.head-home>.manager>.container>.setting-more>span').html((num_Check - $('.uncheck').length+1)+'/'+num_Check);
        !status_All && num_Check - $('.uncheck').length + 1 === num_Check ? $('#check-all').removeClass('uncheck') : $('#check-all').addClass('uncheck');
    });

});