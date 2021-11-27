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
    var num_Check = $('#show-list-post>.item').length;
    var max_Check = $('#show-list-post>.item').length;
    var select_Check = 0;

    $('.type-current').click(function () { 
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'block');
    });

    function loadNumCheck() {
        max_Check = $('#show-list-post>.item').length;
        num_Check = max_Check;
        for (let index = 0; index < $('#show-list-post>.item').length; index++) {
            let item = $('#show-list-post>.item').eq(index);
            if (item.attr('style') != "" && item.attr('style') != undefined && item.attr('style').search('none') != - 1)
                num_Check--;
        }
    }

    $('.page-home>.head-home>.manager>.container>.dropdown>.item').click(function () { 
        $('.type-current').html($(this).html()+'<i class="fa fa-sort-down">');
        $('.page-home>.head-home>.manager>.container>.dropdown').css('display', 'none');

        if ($(this).attr('id') != select_Type)
        {
            select_Type = $(this).attr('id');
            page = "";
            if (select_Type == "select-posted")
            {
                page = 1;
            } 
            else if (select_Type == "select-draft")
            {
                page = 0;
            } 
            else 
            {
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

        loadNumCheck();
    });

    $('.check').click(function () { 
        var status = $(this).attr('class').search('uncheck') != -1  ? 0 : 1;

        if ($(this).attr('id') === 'check-all')
        {
            status ? $('.check').addClass('uncheck') : $('.check').removeClass('uncheck');
            select_Check = status ? 0 : num_Check;
            return;
        }
        var status_All = $('#check-all').attr('class').search('uncheck') != -1 ? 0 : 1;
        select_Check += status_All ? -1 : 1;
        status ? $(this).addClass('uncheck') : $(this).removeClass('uncheck');
        !status_All && select_Check == num_Check ? $('#check-all').removeClass('uncheck') : $('#check-all').addClass('uncheck');
    });

    $('#btn-search').click(function () { 
        let value = $('#inp-search-post').val();
        if (value == undefined || value == "")
        {
            num_Check = $('.check').length - 1;
            $('.check').addClass('uncheck');
            $('#show-list-post>.item').css('display', 'flex');
            return;
        }
        $('#show-list-post>.item').css('display', 'none');
        let list_item = $('#show-list-post>.item');
        for (let i = 1; i <= list_item.length; i++) {
            let title = $('#show-list-post>#post-'+i+'>.head>.container>.title').html();
            let author = $('#name-author').html();
            if (title != undefined && author != undefined && (title.toUpperCase().search(value.toUpperCase()) != -1 || author.toUpperCase().search(value.toUpperCase()) != -1))
            {
                $('#show-list-post>#post-'+i).css('display', 'flex');
            }
        }
        $('.check').addClass('uncheck');
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
                    let str = $('.type-current').html();
                    if (data_popup[0]['status'] == 1)
                    {
                        $('#'+data_popup[0]['id']).addClass('fa-unlock-alt');
                        $('#'+data_popup[0]['id']).removeClass('fa-unlock');
                        $('#post-'+data_popup[0]['id_num']+'>.head>.container>.info>span:first-child').css('color', '');
                        $('#post-'+data_popup[0]['id_num']+'>.head>.container>.info>span:first-child').html('Bản nháp');
                        if (str.search("Đã xuất bản") != -1)
                        {
                            $('#post-'+data_popup[0]['id_num']).css('display', 'none');
                        }
                    }
                    else {
                        $('#'+data_popup[0]['id']).addClass('fa-unlock');
                        $('#'+data_popup[0]['id']).removeClass('fa-unlock-alt');
                        $('#post-'+data_popup[0]['id_num']+'>.head>.container>.info').html("<span style='color: orange'>Đã xuất bản</span>");
                        if (str.search("Bài đăng nháp") != -1)
                        {
                            $('#post-'+data_popup[0]['id_num']).css('display', 'none');
                        }
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
                }
                else system_Notification(json["message"],1);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }

        if (popup_status == 3)
        {
            var fd = new FormData();
            fd.append('ID', -1);
            fd.append('Hide', JSON.stringify(data_popup[0]['Hide']));

            $.ajax({
                url: 'group/change_Hide',
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
                    let list_responses = JSON.parse(json["message"]);
                    let type_current = $('.type-current').html().search('Bài đăng nháp') != -1 ? 1 : 0;
                    $.each(list_responses, function (index, value) { 
                        if (value['status'])
                        {
                            system_Notification(value["message"]);
                            if (type_current == 1)
                            {
                                $('#'+data_popup[0]['List'][index]+'').css('display', 'none');
                            }
                            
                            $('#'+data_popup[0]['List'][index]+'>.head>.container>.info').html("<span style='color: orange'>Đã xuất bản</span>");
                            $('#'+data_popup[0]['List'][index]+'>.author>.container>i:first-child').removeClass('fa fa-unlock-alt');
                            $('#'+data_popup[0]['List'][index]+'>.author>.container>i:first-child').addClass('fa fa-unlock');
                        }
                        else system_Notification(value["message"], 1);
                    });

                    $('.check').addClass('uncheck');
                }
                else system_Notification(json["message"],1);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }

        if (popup_status == 4)
        {
            var fd = new FormData();
            fd.append('ID', -1);
            fd.append('Hide', JSON.stringify(data_popup[0]['Hide']));

            $.ajax({
                url: 'group/change_Hide',
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
                    let list_responses = JSON.parse(json["message"]);
                    let type_current = $('.type-current').html().search('Đã xuất bản') != -1 ? 1 : 0;
                    $.each(list_responses, function (index, value) { 
                        if (value['status'])
                        {
                            system_Notification(value["message"]);
                            if (type_current == 1)
                            {
                                $('#'+data_popup[0]['List'][index]+'').css('display', 'none');
                            }
                            
                            $('#'+data_popup[0]['List'][index]+'>.head>.container>.info').html("<span'>Bản nháp</span>");
                            $('#'+data_popup[0]['List'][index]+'>.author>.container>i:first-child').removeClass('fa fa-unlock');
                            $('#'+data_popup[0]['List'][index]+'>.author>.container>i:first-child').addClass('fa fa-unlock-alt');
                        }
                        else system_Notification(value["message"], 1);
                    });

                    $('.check').addClass('uncheck');
                }
                else system_Notification(json["message"],1);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }

        if (popup_status == 5)
        {
            var fd = new FormData();
            fd.append('ID', -1);
            fd.append('Delete', JSON.stringify(data_popup[0]['Delete']));
            console.log(data_popup[0]['List']);
            $.ajax({
                url: 'group/delete_Post',
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
                    let list_responses = JSON.parse(json["message"]);
                    $.each(list_responses, function (index, value) { 
                        if (value['status'])
                        {
                            system_Notification(value["message"]);
                            $('#'+data_popup[0]['List'][index]).remove();
                        }
                        else system_Notification(value["message"], 1);
                    });

                    $('.check').addClass('uncheck');
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

    $('#unlock-all').click(function () { 
        unlock_All();
    });

    $('#lock-all').click(function () { 
        lock_All();
    });

    function unlock_All() {
        let list_item = $('#show-list-post>.item');
        let data = [];
        let status_select = false;
        let list_select = [];
        $.each(list_item, function (index) { 
            let item = list_item.eq(index);
            let id_item = item.attr('id');
            let status = 1;
            if (item.attr('style') != "" && item.attr('style') != undefined)
            {
                status = item.attr('style').search('none') != - 1 ? 0 : 1;
            }
            let class_checkbox = $('#'+id_item+'>.head>.check').attr('class');
            let status_checkbox = class_checkbox.search('uncheck') != -1 ? 0 : 1;
            let hide_item = $('#'+id_item+'>.head>.container>.info').html();
            let status_hide = hide_item.search('Đã xuất bản') != -1 ? 1 : 0;
            let name_item = item.attr('name');
            let id_post = name_item.slice(5, name_item.length);

            if (status_hide == 0 && status_checkbox == 1 && status == 1)
            {
                data.push({
                    'ID' : id_post,
                    'Hide' : 1
                });
                list_select.push(id_item);
            }
            if (status_checkbox == 1)
                status_select = true;
        });
        if (status_select)
        {
            if (data != "" && data != undefined && data != [])
            {
                popup_status = 3;
                data_popup = [{
                    'Hide' : data,
                    'List' : list_select
                }];
                createPopup('Bạn chắc chắn công khai các bài viết này không ?');
            }
            else system_Notification('Không có bài đăng nháp nào !', 1);
        }
        else system_Notification('Chưa chọn bài viết nào !', 1);
    }

    function lock_All() {
        let list_item = $('#show-list-post>.item');
        let data = [];
        let status_select = false;
        let list_select = [];
        $.each(list_item, function (index) { 
            let item = list_item.eq(index);
            let id_item = item.attr('id');
            let status = 1;
            if (item.attr('style') != "" && item.attr('style') != undefined)
            {
                status = item.attr('style').search('none') != - 1 ? 0 : 1;
            }
            let class_checkbox = $('#'+id_item+'>.head>.check').attr('class');
            let status_checkbox = class_checkbox.search('uncheck') != -1 ? 0 : 1;
            let hide_item = $('#'+id_item+'>.head>.container>.info').html();
            let status_hide = hide_item.search('Đã xuất bản') != -1 ? 1 : 0;
            let name_item = item.attr('name');
            let id_post = name_item.slice(5, name_item.length);

            if (status_hide == 1 && status_checkbox == 1 && status == 1)
            {
                data.push({
                    'ID' : id_post,
                    'Hide' : 0
                });
                list_select.push(id_item);
            }
            if (status_checkbox == 1)
                status_select = true;
        });
        if (status_select)
        {
            if (data != "" && data != undefined && data != [])
            {
                popup_status = 4;
                data_popup = [{
                    'Hide' : data,
                    'List' : list_select
                }];
                createPopup('Bạn chắc chắn ẩn các bài viết này không ?');
            }
            else system_Notification('Không có bài đăng nháp nào !', 1);
        }
        else system_Notification('Chưa chọn bài viết nào !', 1);
    }

    $('#trash-all').click(function () { 
        trash_All();
    });

    function trash_All() {
        let list_item = $('#show-list-post>.item');
        let data = [];
        let status_select = false;
        let list_select = [];
        $.each(list_item, function (index) { 
            let item = list_item.eq(index);
            let id_item = item.attr('id');

            let class_checkbox = $('#'+id_item+'>.head>.check').attr('class');
            let status_checkbox = class_checkbox.search('uncheck') != -1 ? 0 : 1;
            
            let name_item = item.attr('name');
            let id_post = name_item.slice(5, name_item.length);

            if (status_checkbox == 1)
            {
                data.push({
                    'ID' : id_post
                });
                list_select.push(id_item);
            }
            if (status_checkbox == 1)
                status_select = true;
        });
        if (status_select)
        {
            popup_status = 5;
            data_popup = [{
                'Delete' : data,
                'List' : list_select
            }];
            createPopup('Bạn chắc chắn công khai các bài viết này không ?');
        }
        else system_Notification('Chưa chọn bài viết nào !', 1);
    }

});