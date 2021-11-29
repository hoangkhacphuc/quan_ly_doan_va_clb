$(document).ready(function () {
    $('#table-info>tr>td>i').click(function (e) { 
        
    });

    $('#table-cd>tr>td>i').click(function (e) { 
        
    });

    $('#inp-edit-LCD').change(function (e) { 
        
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

    $('#popup-ok').click(function () { 

        if (popup_status == 3)
        {
            $.ajax({
                type: "POST",
                url: "group/chidoan/delete",
                data: data_popup,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#col-'+data_popup['ID']).remove();
                    }
                    else system_Notification(json["message"],1);
                },
                error: function (e) {
                    system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
                }
            });
        }

        hidePopup();
    });

    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }
});