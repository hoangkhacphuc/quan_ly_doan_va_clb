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

    $('.type-current').click(function () { 
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'block');
    });

    var num_Check = $('.check').length - 1;

    $('.page-home>.head-home>.manager>.container>.dropdown>.item').click(function () { 
        $('.type-current').html($(this).html()+'<i class="fa fa-sort-down">');
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'none');

        if ($(this).attr('id') != select_Type)
        {
            select_Type = $(this).attr('id');
            page = "";
            if (select_Type == "select-posted")
            {
                num_Check = $(this).html().slice(13, $(this).html().length - 1);
                page = 1;
            } 
            else if (select_Type == "select-draft")
            {
                num_Check = $(this).html().slice(15, $(this).html().length - 1);
                page = 0;
            } 
            else 
            {
                $('.check').length - 1;
                page = 2;
            }

            let list_item = $('#show-list-post>.item');
            for (let i = 1; i <= list_item.length; i++) {
                let status = $('#show-list-post>#post-'+i+'>.head>.container>.info>span').html() == "Đã xuất bản" ? 1 : 0;
                if (page == 1)
                    $('#show-list-post>#post-'+i).css('display', status == 1 ? 'flex' : 'none');
                else if (page == 0)
                    $('#show-list-post>#post-'+i).css('display', status == 0 ? 'flex' : 'none');
                else $('#show-list-post>#post-'+i).css('display','flex');
            };
            
        }
        else select_Type = $(this).attr('id');
    });

    
    var on_Setting_More = false;
    $('#onSettingMore').click(function () { 
        on_Setting_More = !on_Setting_More;
        $(this).html(on_Setting_More ? 'HỦY' : 'TÙY CHỌN');
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'none');
        $('.page-home>.body-home>.item>.author>.container.setting-post').css('display', on_Setting_More ? 'none':'');
        $('.page-home>.head-home>.manager>.container>.type-current').css('display', on_Setting_More ? 'none':'block');
        $('.page-home>.head-home>.manager>.container>.setting-more').css('display', on_Setting_More ? 'flex':'none');
        $('.check').css('display', on_Setting_More ? 'block':'none');
        $('.check').addClass('uncheck');
        $('.page-home>.head-home>.manager>.container>.setting-more>span').html('0/'+num_Check);
    });

    $('.check').click(function () { 
        var status = $(this).attr('class').search('uncheck') != -1  ? 0 : 1;
        num_none = 0;
        for (i=0; i < $('#show-list-post>.item').length; i++)
            if ($('#show-list-post>.item').eq(i).attr('style') != undefined && $('#show-list-post>.item').eq(i).attr('style').search('none') != -1)
                num_none++;
        if ($(this).attr('id') === 'check-all')
        {
            status ? $('.check').addClass('uncheck') : $('.check').removeClass('uncheck');
            $('.page-home>.head-home>.manager>.container>.setting-more>span').html((status ? '0':num_Check)+'/'+num_Check);
            return;
        }
        var status_All = $('#check-all').attr('class').search('uncheck') != -1 ? 0 : 1;
        status ? $(this).addClass('uncheck') : $(this).removeClass('uncheck');
        $('.page-home>.head-home>.manager>.container>.setting-more>span').html((num_Check - $('.uncheck').length+1 + num_none)+'/'+num_Check);
        !status_All && num_Check - $('.uncheck').length+1 + num_none == num_Check ? $('#check-all').removeClass('uncheck') : $('#check-all').addClass('uncheck');
    });

    $('#btn-search').click(function () { 
        let value = $('#inp-search-post').val();
        if (value == undefined || value == "")
        {
            num_Check = $('.check').length - 1;
            $('.check').addClass('uncheck');
            $('#show-list-post>.item').css('display', 'flex');
            $('.page-home>.head-home>.manager>.container>.setting-more>span').html('0/'+num_Check);
            return;
        }
        $('#show-list-post>.item').css('display', 'none');
        let num = 0;
        let list_item = $('#show-list-post>.item');
        for (let i = 1; i <= list_item.length; i++) {
            let title = $('#show-list-post>#post-'+i+'>.head>.container>.title').html();
            let author = $('#name-author').html();
            if (title.search(value) != -1 || author.search(value) != -1)
            {
                $('#show-list-post>#post-'+i).css('display', 'flex');
                num++;
            }
        }
        num_Check = num;
        $('.check').addClass('uncheck');
        $('.page-home>.head-home>.manager>.container>.setting-more>span').html('0/'+num_Check);
    });

    var popup_status = 0;
    var data_popup = null;

    $('.container.setting-post>i').click(function () { 
        let id = $(this).attr('id');
        if (id.search('unlock') != -1)
        {
            let id_num = $(this).attr('id').slice(7, $(this).attr('id').length);
            let class_i = $(this).attr('class');
            let status = 1;
            if (class_i.search('unlock-alt') != -1)
                status = 0;
            
            let id_post = $(this).attr('name').slice(7, $(this).attr('name').length);

            var fd = new FormData();
            fd.append('ID', id_post);
            fd.append('Hide', status == 1 ? 0 : 1);

            popup_status = 1;
            data_popup = [{
                'fd' : fd,
                'status' : status,
                'id' : id,
                'id_num' : id_num
            }];
            createPopup('Bạn chắc chắn '+(status == 1 ? 'ẩn' : 'công khai')+' bài viết này không ?');
        }

        if (id.search('trash') != -1)
        {
            let id_num = $(this).attr('id').slice(6, $(this).attr('id').length);
            
            let id_post = $(this).attr('name').slice(6, $(this).attr('name').length);
            
            let class_i = $(this).attr('class');
            let status = 1;
            if (class_i.search('fa-trash-o') != -1)
                status = 0;
            
            var fd = new FormData();
            fd.append('ID', id_post);
            popup_status = 2;
            data_popup = [{
                'fd' : fd,
                'id' : id,
                'status' : status,
                'id_num' : id_num
            }];
            createPopup('Bạn chắc chắn xóa bài viết này không ?');
        }
    });

    $('#popup-ok').click(function () { 
        if (popup_status == 1)
        {
            $.ajax({
                url: 'group/change_Hide',
                type: 'post',
                data: data_popup[0]['fd'],
                contentType: false,
                processData: false,
                success: function(response){
                    
                },
                })
                .done(function (responses) {
                let json = JSON.parse(responses);
                if (json["status"])
                {
                    system_Notification(json["message"]);
                    if (data_popup[0]['status'] == 1)
                    {
                        $('#'+data_popup[0]['id']).addClass('fa-unlock-alt');
                        $('#'+data_popup[0]['id']).removeClass('fa-unlock');
                        $('#post-'+data_popup[0]['id_num']+'>.head>.container>.info').html('<span>Bản nháp</span>');
                    }
                    else {
                        $('#'+data_popup[0]['id']).addClass('fa-unlock');
                        $('#'+data_popup[0]['id']).removeClass('fa-unlock-alt');
                        $('#post-'+data_popup[0]['id_num']+'>.head>.container>.info').html("<span style='color: orange'>Đã xuất bản</span>");
                    }
                }
                else system_Notification(json["message"],1);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }

        if (popup_status == 2)
        {
            $.ajax({
                url: 'group/delete_Post',
                type: 'post',
                data: data_popup[0]['fd'],
                contentType: false,
                processData: false,
                success: function(response){
                    
                },
                })
                .done(function (responses) {
                let json = JSON.parse(responses);
                if (json["status"])
                {
                    system_Notification(json["message"]);
                    $('#post-'+data_popup[0]['id_num']).remove();
                    num_Check--;

                    let num = $('#select-all').html().slice(8, $('#select-all').html().length-1);
                    $('#select-all').html('Tất cả ('+(num - 1)+')');

                    let str = $('.type-current').html();
                    let str2 = "";
                    if (str.search("Tất cả") != -1)
                    {
                        let num4 = $('.type-current').html().slice(8, $('.type-current').html().length-32);
                        let str = $('.type-current').html().slice(0, 8);
                        $('.type-current').html(str+(num4 - 1)+')<i class="fa fa-sort-down"></i>');
                    }
                    else if (str.search("Đã xuất bản") != -1)
                    {
                        let num4 = $('.type-current').html().slice(13, $('.type-current').html().length-32);
                        let str = $('.type-current').html().slice(0, 13);
                        $('.type-current').html(str+(num4 - 1)+')<i class="fa fa-sort-down"></i>');
                    }
                    else if (str.search("Bài đăng nháp") != -1)
                    {
                        let num4 = $('.type-current').html().slice(15, $('.type-current').html().length-32);
                        let str = $('.type-current').html().slice(0, 15);
                        $('.type-current').html(str+(num4 - 1)+')<i class="fa fa-sort-down"></i>');
                    }
                    
                    if (data_popup[0]['status'] == 1)
                    {
                        let num2 = $('#select-posted').html().slice(13, $('#select-posted').html().length-1);
                        $('#select-posted').html('Đã xuất bản ('+(num2 - 1)+')');
                        console.log(num2, data_popup[0]['status']);
                    }
                    else {
                        let num3 = $('#select-draft').html().slice(15, $('#select-draft').html().length-1);
                        $('#select-draft').html('Bài đăng nháp ('+(num3 - 1)+')');
                        console.log(num3 , data_popup[0]['status']);
                    }
                }
                else system_Notification(json["message"],1);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }
        hidePopup();
    });

    $('#popup-cancel').click(function () { 
        hidePopup();
    });

    function createPopup(value) {
        $('#popup').css('display', 'flex');
        $('#popup>.container>.head').html(value);
    }

    function hidePopup() {
        $('#popup').css('display', 'none');
    }

});