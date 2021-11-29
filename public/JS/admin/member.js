$(document).ready(function(){
    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }

    $('#inp-search-post').focus(function () { 
        $('.page-member>.container>.quanly>.search>.line').css({
            'animation' : 'select_Input_Search 0.5s',
            'width' : '100%',
        });
    });
    $('#inp-search-post').blur(function () { 
        $('.page-member>.container>.quanly>.search>.line').css({
            'animation' : 'unselect_Input_Search 0.5s',
            'width' : '0',
        });
    });

    $('#btn-find').click(function (e) { 
        e.preventDefault();
        $('#edit-info').css('display', 'none');
        let lcd = $('#ds-lcd').val();
        let cd = $('#ds-cd').val();
        if (lcd == 'Liên chi Đoàn')
        {
            system_Notification('Chưa chọn Liên chi Đoàn !', 1);
            return;
        }
        if (cd == 'Chi Đoàn')
        {
            system_Notification('Chưa chọn Chi Đoàn !', 1);
            return;
        }
        getStudent();
    });

    $('#btn-edit-cancel').click(function (e) { 
        $('#edit-info').css('display', 'none');
    });

    $('#table-info').on('click', 'tr>td>i', function () {
        let select = $(this).attr('id').search('edit') != -1 ? 1 : 0;
        let id = $(this).attr('id').slice(9, $(this).attr('id').length);
        if (select == 1)
            editInfo(id);
        else {
            data_popup = {
                'ID' : id,
            }
            status_popup = 2;
            createPopup('Bạn có chắc chắn xóa tài khoản này không ?');
        }
    });

    $('#ds-lcd').change(function (e) { 
        e.preventDefault();
        danhsach();
    });

    $('#inp-add-LCD').change(function () { 
        let lcd = $(this).val();
        getChiDoanEdit(lcd, '#inp-add-CD');
    });

    $('#inp-edit-LCD').change(function () { 
        let lcd = $(this).val();
        getChiDoanEdit(lcd, '#inp-edit-CD');
    });

    function danhsach() {
        let lcd = $('#ds-lcd').val();
        if (lcd == 'Liên chi Đoàn')
            return;
        getChiDoan(lcd);
    }

    $('#btn-add-save').click(function (e) { 
        e.preventDefault();
        let data = getInfoCreate();

        
        $.ajax({
            type: "POST",
            url: "admin/member/create",
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                if (json["status"])
                {
                    system_Notification(json["message"]);
                    $('#inp-add-studentid').val('');
                    $('#inp-add-name').val('');
                    $('#inp-add-email').val('');
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    });

    function getChiDoan(lcd) {
        let data = {
            'LienChiDoan' : lcd
        }

        $.ajax({
            type: "POST",
            url: "group/chidoan/getCD",
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                $('#inp-create-cd').val('');
                if (json["status"])
                {
                    json = JSON.parse(json["message"]);
                    $('#ds-cd').html('');
                    let html = '';
                    if (json.length == 0)
                    {
                        $('#ds-cd').html(html);
                        return;
                    }
                        
                    json.forEach(value => {
                        html += '<option value="'+value['Name']+'">'+value['Name']+'</option>';
                    });
                    $('#ds-cd').html(html);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    }

    $('#btn-search').click(function (e) { 
        e.preventDefault();
        let inp = $('#inp-search-member').val();
        
        $.ajax({
            type: "POST",
            url: "admin/member/search",
            data: {inp:inp},
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                if (json["status"])
                {
                    json = JSON.parse(json["message"]);
                    $('#table-info').html('');
                    let html = '<tr><td>Mã sinh viên</td><td>Họ tên</td><td>Chức vụ</td><td>Lựa chọn</td></tr>';
                    $('#table-info').html(html);
                    if (json.length == 0)
                        return;
                        
                    json.forEach(value => {
                        html += '<tr id="member-'+value["ID"]+'"><td id="code-student-'+value["ID"]+'">'+value["StudentID"]+'</td><td id="name-student-'+value["ID"]+'">'+value["Name"]+'</td><td id="position-student-'+value["ID"]+'">'+value["Position"]+'</td><td><i class="fa fa-edit" id="btn-edit-'+value["ID"]+'"></i><i class="fa fa-trash-o" id="btn-trash-'+value["ID"]+'"></i></td></tr>';
                    });
                    $('#table-info').html(html);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    });

    function getStudent() {
        let lcd = $('#ds-lcd').val();
        let cd = $('#ds-cd').val();
        if (cd == 'Chi Đoàn')
        {
            $('#table-info').html('<tr><td>Mã sinh viên</td><td>Họ tên</td><td>Chức vụ</td><td>Lựa chọn</td></tr>');
            return;
        }

        let data = {
            'LienChiDoan' : lcd,
            'ChiDoan' : cd
        }

        $.ajax({
            type: "POST",
            url: "group/chidoan/getStudent",
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                $('#inp-create-cd').val('');
                if (json["status"])
                {
                    json = JSON.parse(json["message"]);
                    $('#table-info').html('');
                    let html = '<tr><td>Mã sinh viên</td><td>Họ tên</td><td>Chức vụ</td><td>Lựa chọn</td></tr>';
                    $('#table-info').html(html);
                    if (json.length == 0)
                        return;
                        
                    json.forEach(value => {
                        html += '<tr id="member-'+value["ID"]+'"><td id="code-student-'+value["ID"]+'">'+value["StudentID"]+'</td><td id="name-student-'+value["ID"]+'">'+value["Name"]+'</td><td id="position-student-'+value["ID"]+'">'+value["Position"]+'</td><td><i class="fa fa-edit" id="btn-edit-'+value["ID"]+'"></i><i class="fa fa-trash-o" id="btn-trash-'+value["ID"]+'"></i></td></tr>';
                    });
                    $('#table-info').html(html);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    }

    function editInfo(id) {
        $('#edit-info').css('display', 'block');
        $(document).scrollTop( $('#edit-info').offset().top);
        let data = {
            'ID' : id
        }

        $.ajax({
            type: "POST",
            url: "group/chidoan/getStudentData",
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                $('#inp-create-cd').val('');
                if (json["status"])
                {
                    json = JSON.parse(json["message"]);
                    setInfo(json);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    }

    function setInfo(data) {
        $('#inp-edit-id').val(data['ID']);
        $('#inp-edit-name').val(data['Name']);
        $('#inp-edit-studentid').val(data['StudentID']);
        $('#inp-edit-phone').val(data['PhoneNumber']);
        $('#inp-edit-email').val(data['Email']);
        $('#inp-edit-birth').val(data['DOB']);
        $('#inp-edit-sex').val(data['Sex'] == 0 ? 'Nam' : 'Nữ');
        $('#inp-edit-address').val(data['Address']);
        $('#inp-edit-language').val(data['Language']);
        $('#inp-edit-union').val(data['DateJoinUnion']);
        $('#inp-edit-address-union').val(data['AddressJoinUnion']);
        $('#inp-edit-party').val(data['DateJoinParty']);
        $('#inp-edit-address-party').val(data['AddressJoinParty']);
        $('#inp-edit-LCD').val(data['LCD']);
        getChiDoanEdit(data['LCD'], '#inp-edit-CD');
        $('#inp-edit-CD').val(data['ChiDoan']);
        $('#inp-edit-award').val(data['Award']);
        $('#inp-edit-punish').val(data['Punishment']);
        $('#inp-edit-cv').val(data['Position']);
    }

    function getChiDoanEdit(lcd, param) {
        let data = {
            'LienChiDoan' : lcd
        }

        $.ajax({
            type: "POST",
            url: "group/chidoan/getCD",
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                $(param).val('');
                if (json["status"])
                {
                    json = JSON.parse(json["message"]);
                    $(param).html('');
                    let html = '';
                    if (json.length == 0)
                    {
                        $(param).html('<option value="Chi Đoàn">Chi Đoàn</option>');
                        return;
                    }
                        
                    json.forEach(value => {
                        html += '<option value="'+value['Name']+'">'+value['Name']+'</option>';
                    });
                    $(param).html(html);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    }

    function getInfo() {
        return {
            ID : $('#inp-edit-id').val(),
            StudentID : $('#inp-edit-studentid').val(),
            Name : $('#inp-edit-name').val(),
            Email : $('#inp-edit-email').val(),
            DOB : $('#inp-edit-birth').val(),
            Sex : $('#inp-edit-sex').val() == 'Nam' ? '0' : '1',
            Address : $('#inp-edit-address').val(),
            Language : $('#inp-edit-language').val(),
            DateJoinUnion : $('#inp-edit-union').val(),
            AddressJoinUnion : $('#inp-edit-address-union').val(),
            DateJoinParty : $('#inp-edit-party').val(),
            AddressJoinParty : $('#inp-edit-address-party').val(),
            LCD : $('#inp-edit-LCD').val(),
            ChiDoan : $('#inp-edit-CD').val(),
            Award : $('#inp-edit-award').val(),
            Punishment : $('#inp-edit-punish').val(),
            Position : $('#inp-edit-cv').val(),
        }
    }

    function getInfoCreate() {
        return {
            StudentID : $('#inp-add-studentid').val(),
            Name : $('#inp-add-name').val(),
            Email : $('#inp-add-email').val(),
            LienChiDoan : $('#inp-add-LCD').val(),
            ChiDoan : $('#inp-add-CD').val(),
            Position : $('#inp-add-cv').val(),
        }
    }

    $('#btn-edit-save').click(function () { 
        data_popup = getInfo();
        status_popup = 1;
        createPopup('Bạn có chắc chắn thay đổi thông tin tài khoản này không ?');
    });

    $('#popup-ok').click(function () { 
        if (status_popup == 1)
        {
            $.ajax({
                type: "POST",
                url: "group/chidoan/updateStudent",
                data: data_popup,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#name-student-'+data_popup['ID']).html(data_popup['Name']);
                        $('#code-student-'+data_popup['ID']).html(data_popup['StudentID']);
                        $('#position-student-'+data_popup['ID']).html(data_popup['Position']);
                        $('#edit-info').css('display', 'none');
                    }
                    else system_Notification(json["message"],1);
                },
                error: function (e) {
                    system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
                }
            });
        }
        if (status_popup == 2)
        {
            $.ajax({
                type: "POST",
                url: "admin/member/delete",
                data: data_popup,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#member-'+data_popup['ID']).remove();
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