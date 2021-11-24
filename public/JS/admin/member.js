$(document).ready(function(){

    $('#btn-add').click(function () { 
        let name = $('#inp-add-notification-name').val();
        let msv = $('#inp-add-notification-msv').val();
        let sdt = $('#inp-add-notification-sdt').val();
        let email = $('#inp-add-notification-email').val();
        let dob = $('#inp-add-notification-dob').val();
        let addr = $('#inp-add-notification-addr').val();
        let group = $('#inp-add-notification-group').val();
        let sex = 1;

        if (content === "")
        {
            system_Notification("Chưa nhập nội dung !", 1);
            return;
        }

        $.post('admin/member/add', {
            // 'Name' : name,
            // 'StudentID' : msv,
            // 'PhoneNumber' : sdt,
            // 'Email' : email,
            // 'DOB' : dob,
            // 'Sex' : sex,
            // 'Addres' : addr,
            // 'ChiDoan' : group,
            // 'Grade' : 0
            'Name' : 'name',
            'StudentID' : 'msv',
            'PhoneNumber' : 'sdt',
            'Email' : 'email',
            'DOB' : 12/2/2000,
            'Sex' : 2,
            'Addres' : 'addr',
            'ChiDoan' : 2,
            'Grade' : 0
        })
        .done(function (responses) {
            let json = JSON.parse(responses);
            if (!json["Error"])
            {
                system_Notification(json["Done"]);
                $.get('admin/member')
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

        // $('#inp-add-notification').val('');
    });

});