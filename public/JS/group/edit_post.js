CKEDITOR.replace('editor',{
    height: '500px',
});

$(document).ready(function () {
    $('#inp-title').focus(function () { 
        $('.page>.new-post>.container>.line').css({
            'animation' : 'select_Input_Title 0.5s',
            'width' : '100%',
            'height' : '1px'
        });
    });
    $('#inp-title').blur(function () { 
        $('.page>.new-post>.container>.line').css({
            'animation' : 'unselect_Input_Title 0.5s',
            'width' : '0',
            'height' : '0'
        });
    });

    $('#show-post').click(function () {
        $(this).removeClass(show_Post ? 'fa-toggle-on' : 'fa-toggle-off');
        $(this).addClass(!show_Post ? 'fa-toggle-on' : 'fa-toggle-off');
        show_Post ? $(this).addClass('hide-post') : $(this).removeClass('hide-post');
        show_Post = !show_Post;
    });

    $('#position-post').click(function () {
        $(this).removeClass(position_Post ? 'fa-toggle-on' : 'fa-toggle-off');
        $(this).addClass(!position_Post ? 'fa-toggle-on' : 'fa-toggle-off');
        position_Post ? $(this).addClass('hide-post') : $(this).removeClass('hide-post');
        position_Post ? $('.list-position').css('display', 'none') : $('.list-position').css('display', 'block');
        position_Post = !position_Post;
    });

    var url_Avatar = false;
    $('#image-post').change(function (e) { 
        if (e.target.files[0] == undefined || e.target.files[0] == null)
        {
            $('#name-image-post').html('Chọn ảnh');
            url_Avatar = false;
            return;
        }
        
        var fileName = e.target.files[0].name;
        if (fileName.length > 15)
            fileName = fileName.slice(0, 14)+"...";
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if(!allowedExtensions.exec(e.target.files[0].name)){
            alert('Vui lòng chọn file ảnh !');
            url_Avatar = false;
            return;
        }
        if (e.target.files[0].size > 10485760)
            fileName = "<i style='color: #df3e3e;'>" + fileName + "</i>";
        else fileName = "<i style='color: #45d440;'>" + fileName + "</i>";

        $('#name-image-post').html(fileName);
        url_Avatar = true;
    });

    $('#btn-new-post').click(function () {
        var content_html = CKEDITOR.instances.editor.getData();
        var title = $('#inp-title').val();
        var select_Type = $('#select-type-post').val() === "Bài viết" ? 0 : 1;
        var sc1 = $('#inp-score-1').val();
        var sc2 = $('#inp-score-2').val();
        var sc3 = $('#inp-score-3').val();
        var mp1 = $('#inp-max-1').val();
        var mp2 = $('#inp-max-2').val();
        var mp3 = $('#inp-max-3').val();
        var cb1 = $('#inp-checkbox-1:checked').val() === "on" ? 1 : 0;
        var cb2 = $('#inp-checkbox-2:checked').val() === "on" ? 1 : 0;
        var cb3 = $('#inp-checkbox-3:checked').val() === "on" ? 1 : 0;
        var show = $('#show-post').attr('class').search('fa-toggle-on') != -1 ? 1 : 0;
        
        if (content_html === "")
        {
            system_Notification("Chưa có nội dung bài đăng !", 1);
            return;
        }
        if (title === "")
        {
            system_Notification("Chưa có tiêu đề !", 1);
            return;
        }

        var fd = new FormData();
        if (url_Avatar)
        {
            var files = $('#image-post')[0].files;
            fd.append('file',files[0]);
        }
        
        fd.append('title', title);
        fd.append('content', content_html);
        fd.append('type', select_Type);
        fd.append('cv1', sc1);
        fd.append('cv2', sc2);
        fd.append('cv3', sc3);
        fd.append('gh1', mp1);
        fd.append('gh2', mp2);
        fd.append('gh3', mp3);
        fd.append('cb1', cb1);
        fd.append('cb2', cb2);
        fd.append('cb2', cb3);
        fd.append('show', show);
        
        let ID = $('#inp-id').val();
        fd.append('ID', ID);

        $.ajax({
            url: 'group/save_edit',
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
                system_Notification(json["message"]);
                $.get('group/home')
                .done(function (data) {
                    $('.page').html(data);
                }).fail(function() {
                    $('.page').html("<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>");
                });
            }
            else system_Notification(json["message"],1);
        }).fail(function() {
            system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
        });
    });

    $('#select-type-post').change(function (e) { 
        if ($(this).val() == "Bài viết")
        {
            $('#on-position').css('display', 'none');
            $('.list-position').css('display', 'none');
        }
        else {
            $('#on-position').css('display', 'block');
        }
    });

    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }
});