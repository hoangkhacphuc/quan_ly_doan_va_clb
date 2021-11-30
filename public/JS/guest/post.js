$(document).ready(function () {
    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }

    $('.register-event>table>tbody>tr>td>button').click(function () { 
        console.log(123);
        let id = $(this).attr('id');
        let btn = parseInt(id.slice(id.length-1, id.lenght));
        let type = $(this).html() == "Tham gia" ? 1 : 0;
        let posts_id =$('#inp-ID').val();

        if (type == 1)
        {
            let data = {
                'Posts' : posts_id,
                'Position' : btn
            }
    
            $.ajax({
                type: "POST",
                url: "post/join",
                data: data,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#btn-event-1').html('Tham gia');
                        $('#btn-event-2').html('Tham gia');
                        $('#btn-event-3').html('Tham gia');
                        $('#btn-event-1').removeClass('red');
                        $('#btn-event-2').removeClass('red');
                        $('#btn-event-3').removeClass('red');
                        $('#btn-event-'+btn).html('Hủy tham gia');
                        $('#btn-event-'+btn).addClass('red');
                    }
                    else system_Notification(json["message"],1);
                },
                error: function (e) {
                    system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
                }
            });
        }
        else if (type == 0)
        {
            let data = {
                'Posts' : posts_id,
                'Position' : btn
            }
    
            $.ajax({
                type: "POST",
                url: "post/cancel",
                data: data,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#btn-event-1').html('Tham gia');
                        $('#btn-event-2').html('Tham gia');
                        $('#btn-event-3').html('Tham gia');
                        $('#btn-event-1').removeClass('red');
                        $('#btn-event-2').removeClass('red');
                        $('#btn-event-3').removeClass('red');
                    }
                    else system_Notification(json["message"],1);
                },
                error: function (e) {
                    system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
                }
            });
        }
    });
});