$(document).ready(function(){

    var current_ID_Select = 0;

    $('.page>.page-home>.container>.content>.list-notification>.item>i').click(function () { 
        let id_Select = $(this).attr('id');

        if (id_Select.search("view") != -1)
        {
            let ID_item = id_Select.slice(5, id_Select.length);
            let Content = $('#content-'+ID_item).html();
            let Status = $(this).attr('class').search("-on") != -1;
            $.post('admin/notification/update', {
                'ID' : ID_item,
                'Content' : Content,
                'Status' : Status ? 1 : 0,
            })
            .done(function (responses) {
                let json = JSON.parse(responses);
                if (!json["Error"])
                {
                    system_Notification(json["Done"]);
                    $.get('admin/home')
                    .done(function (data) {
                        $('.page').html(data);
                    }).fail(function() {
                        $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
                    });
                }
                else system_Notification(json["Error"],1);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }

        if (id_Select.search("delete") != -1)
        {
            let ID_item = id_Select.slice(7, id_Select.length);

            $.post('admin/notification/delete', {
                'ID' : ID_item,
            })
            .done(function (responses) {
                let json = JSON.parse(responses);
                if (!json["Error"])
                {
                    system_Notification(json["Done"]);
                    $.get('admin/home')
                    .done(function (data) {
                        $('.page').html(data);
                    }).fail(function() {
                        $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
                    });
                }
                else system_Notification(json["Error"],1);
            }).fail(function() {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            });
        }

        if (id_Select.search("edit") != -1)
        {
            current_ID_Select = id_Select.slice(5, id_Select.length);
            let Content = $('#content-'+current_ID_Select).html();
            $('#old-content').html(Content);
            $('#inp-edit-notification').val(Content);
            $('.page>.page-home>.container>.content>.edit-notification').css('display', 'block');
        }
    });

    $('#btn-cancel-edit').click(function () { 
        $('.page>.page-home>.container>.content>.edit-notification').css('display', 'none');
    });

    $('#btn-save-edit').click(function () { 
        $('.page>.page-home>.container>.content>.edit-notification').css('display', 'none');

        let Content = $('#inp-edit-notification').val();
        let Status = $('#view-'+current_ID_Select).attr('class').search("-on") != -1;

        $.post('admin/notification/update', {
            'ID' : current_ID_Select,
            'Content' : Content,
            'Status' : Status ? 0 : 1,
        })
        .done(function (responses) {
            let json = JSON.parse(responses);
            if (!json["Error"])
            {
                system_Notification(json["Done"]);
                $.get('admin/home')
                .done(function (data) {
                    $('.page').html(data);
                }).fail(function() {
                    $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
                });
            }
            else system_Notification(json["Error"],1);
        }).fail(function() {
            system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
        });
    });

    $('#btn-add').click(function () { 
        let content = $('#inp-add-notification').val();
        if (content === "")
        {
            system_Notification("Chưa nhập nội dung !", 1);
            return;
        }

        $.post('admin/notification/add', {'Content' : content})
        .done(function (responses) {
            let json = JSON.parse(responses);
            if (!json["Error"])
            {
                system_Notification(json["Done"]);
                $.get('admin/home')
                .done(function (data) {
                    $('.page').html(data);
                }).fail(function() {
                    $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
                });
            }
            else system_Notification(json["Error"],1);
        }).fail(function() {
            system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
        });

        $('#inp-add-notification').val('');
    });


    // Cancel zoom image

    $('#btn-cancel-zoom-image').click(function () { 
        $('.page>.img-show').css({
            'display': 'none'
        });
    });

    // Zoom image

    $('.page>.page-home>.container>.content>.list-banner>.item>label').click(function (e) { 
        let id_Select = $(this).attr('id');

        if (id_Select.search("view-banner") != -1)
        {
            let ID_item = id_Select.slice(12, id_Select.length);
            let src_img = $('#banner-img-'+ID_item).attr('src');

            $('.page>.img-show>.content>img').attr('src', src_img);

            $('.page>.img-show').css({
                'display': 'flex'
            });
        }
        
    });


    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }
});