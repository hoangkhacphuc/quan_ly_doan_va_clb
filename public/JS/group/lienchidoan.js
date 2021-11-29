$(document).ready(function () {
    
    function system_Notification(param1, param2 = 0) {
        $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
    }

    var table_info = 0;

    var popup_status = 0;
    var data_popup = null;

    $('#btn-create-lcd').click(function () { 
        createLienChiDoan();
    });

    $('#btn-create-cd').click(function () { 
        createChiDoan();
    });

    $('#ds-lcd').change(function (e) { 
        e.preventDefault();
        danhsach();
    });

    $('#btn-find').click(function (e) { 
        e.preventDefault();
        $('#edit-info').css('display', 'none');
        let lcd = $('#ds-lcd').val();
        let cd = $('#ds-cd').val();
        if (lcd == 'Liên chi Đoàn')
        {
            table_info = 0;
            changeTable();
            return;
        }
        if (cd == 'Chi Đoàn')
        {
            table_info = 1;
            changeTable();
            $('#table-cd').css('display', 'table-row-group');
            $('#table-lcd').css('display', 'none');
            $('#table-info').css('display', 'none');
            getTableChiDoan(lcd);
            return;
        }
        table_info = 2;
        changeTable(true);
        $('#table-info').css('display', 'table-row-group');
        getStudent();
    });

    $('#table-lcd>tr>td>i').click(function (e) { 
        let select = $(this).attr('id').search('edit') != -1 ? 1 : 0;
        if (select == 1)
        {
            let id = $(this).attr('id').slice(9, $(this).attr('id').length);
            let name = $('#name-lcd-'+id).html();
            $('#inp-edit-id').val(id);
            $('#inp-name-lcd').val(name);
            $('#table-info-cd').css('display', 'none');
            $('#table-info-student').css('display', 'none');
            $('#edit-info').css('display', 'block');
        }else {
            let id = $(this).attr('id').slice(10, $(this).attr('id').length);
            data_popup = {
                'ID' : id
            }
            popup_status = 5;
            createPopup('Bạn có chắc chắn xóa Liên chi Đoàn này không ?');
        }
    });

    function createLienChiDoan() {
        let value = $('#inp-create-lcd').val();
        if (value == undefined || value == "")
        {
            system_Notification('Chưa nhập tên Liên chi Đoàn !', 1);
            return;
        }
        let data = {
            "Name" : value
        };
        
        $.ajax({
            type: "POST",
            url: "group/lienchidoan/add",
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                $('#inp-create-lcd').val('');
                if (json["status"])
                {
                    system_Notification(json["message"]);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    }

    function createChiDoan() {
        let value = $('#inp-create-cd').val();
        let lienchidoan = $('#sl-lcd').val();
        if (value == undefined || value == "")
        {
            system_Notification('Chưa nhập tên chi Đoàn !', 1);
            return;
        }
        if (lienchidoan == 'Liên chi Đoàn')
        {
            system_Notification('Chưa chọn Liên chi Đoàn !', 1);
            return;
        }
        let data = {
            "Name" : value,
            'LienChiDoan' : lienchidoan,
        };

        $.ajax({
            type: "POST",
            url: "group/chidoan/add",
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (response) {
                let json = JSON.parse(response);
                $('#inp-create-cd').val('');
                if (json["status"])
                {
                    system_Notification(json["message"]);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    }

    
    function danhsach() {
        let lcd = $('#ds-lcd').val();
        if (lcd == 'Liên chi Đoàn')
        {
            table_info = 0;
            $('#ds-cd').html('<option value="Chi Đoàn">Chi Đoàn</option>');
            $('#table-lcd').css('display', 'table-row-group');
            $('#table-cd').css('display', 'none');
            changeTable();
            return;
        }
        table_info = 1;
        changeTable(true);
        getChiDoan(lcd);
    }

    function changeTable(param = false) {
        $('#table-lcd').css('display', param == true ? 'none' : 'table-row-group');
        $('#table-cd').css('display', param == true ? 'none' : 'table-row-group');
        $('#table-info').css('display', param == false ? 'none' : 'table-row-group');
        $('#table-info').html('<tr><td>Mã sinh viên</td><td>Họ tên</td><td>Chức vụ</td><td>Lựa chọn</td></tr>');
        if (table_info == 0)
        {
            $('#table-info-lcd').css('display', 'table-row-group');
            $('#table-info-cd').css('display', 'none');
            $('#table-info-student').css('display', 'none');
        }
        else if (table_info == 1)
        {
            $('#table-info-lcd').css('display', 'none');
            $('#table-info-cd').css('display', 'table-row-group');
            $('#table-info-student').css('display', 'none');
        }
        else if (table_info == 2)
        {
            $('#table-info-lcd').css('display', 'none');
            $('#table-info-cd').css('display', 'none');
            $('#table-info-student').css('display', 'table-row-group');
        }
    }

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
                    let html = '<option value="Chi Đoàn">Chi Đoàn</option>';
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

    $('#table-cd').on('click', 'tr>td>i', function () {
        let select = $(this).attr('id').search('edit') != -1 ? 1 : 0;
        if (select == 1)
        {
            let id = $(this).attr('id').slice(12, $(this).attr('id').length);
            let name = $('#name-cd-'+id).html();
            $('#inp-edit-id').val(id);
            $('#inp-name-cd').val(name);
            $('#edit-info').css('display', 'block');
        }else {
            let id = $(this).attr('id').slice(13, $(this).attr('id').length);
            data_popup = {
                'ID' : id
            }
            popup_status = 3;
            createPopup('Bạn có chắc chắn xóa Chi Đoàn này không ?');
        }
    });

    $('#inp-edit-LCD').on('change', function () {
        let lcd = $(this).val();
        if (lcd == 'Liên chi Đoàn')
        {
            system_Notification('Chưa chọn Liên chi Đoàn !', 1);
            return;
        }
        getChiDoanEdit(lcd);
    });

    $('#table-info').on('click', 'tr>td>i', function () {
        let id = $(this).attr('id').slice(9, $(this).attr('id').length);
        editInfo(id);
    });

    function getTableChiDoan(lcd) {
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
                
                $('#table-cd').val('');
                if (json["status"])
                {
                    json = JSON.parse(json["message"]);
                    $('#table-cd').html('');
                    let html = '<tr><td>Chi Đoàn</td><td>Lựa chọn</td></tr>';
                    if (json.length == 0)
                    {
                        $('#table-cd').html(html);
                        return;
                    }
                        
                    json.forEach(value => {
                        html += '<tr id="col-'+value['ID']+'"><td id="name-cd-'+value['ID']+'">'+value['Name']+'</td><td><i class="fa fa-edit" id="btn-edit-cd-'+value['ID']+'"></i><i class="fa fa-trash-o" id="btn-trash-cd-'+value['ID']+'"></i></td></tr>';
                    });
                    $('#table-cd').html(html);
                }
                else system_Notification(json["message"],1);
            },
            error: function (e) {
                system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
            }
        });
    }

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
                        html += '<tr><td>'+value["StudentID"]+'</td><td id="name-student-'+value["ID"]+'">'+value["Name"]+'</td><td>'+value["Position"]+'</td><td><i class="fa fa-edit" id="btn-edit-'+value["ID"]+'"></i></td></tr>';
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

    $('#btn-edit-cancel').click(function (e) { 
        $('#edit-info').css('display', 'none');
    });

    $('#btn-edit-save').click(function (e) { 
        e.preventDefault();
        if (table_info == 0)
        {
            popup_status = 4;
            data_popup = {
                'ID' : $('#inp-edit-id').val(),
                'Name' : $('#inp-name-lcd').val()
            }
            createPopup('Bạn có chắc chắn thay đổi tên Liên chi Đoàn này không ?');
        }
        if (table_info == 1)
        {
            popup_status = 2;
            data_popup = {
                'Name' : $('#inp-name-cd').val(),
                'ID' : $('#inp-edit-id').val()
            }
            createPopup('Bạn có chắc chắn thay đổi tên Chi Đoàn này không ?');
        }
        if (table_info == 2)
        {
            popup_status = 1;
            data_popup = getInfo();
            createPopup('Bạn có chắc chắn thay đổi thông tin tài khoản này không ?');
        }
    });

    function getInfo() {
        return {
            ID : $('#inp-edit-id').val(),
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
        }
    }


    $('#popup-ok').click(function () { 
        if (popup_status == 1)
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
                        
                        $('#edit-info').css('display', 'none');
                    }
                    else system_Notification(json["message"],1);
                },
                error: function (e) {
                    system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
                }
            });
        }

        if (popup_status == 2)
        {
            $.ajax({
                type: "POST",
                url: "group/chidoan/update",
                data: data_popup,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#name-cd-'+data_popup['ID']).html($('#inp-name-cd').val());
                        $('#edit-info').css('display', 'none');
                    }
                    else system_Notification(json["message"],1);
                },
                error: function (e) {
                    system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
                }
            });
        }

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

        if (popup_status == 4)
        {
            $.ajax({
                type: "POST",
                url: "group/lienchidoan/update",
                data: data_popup,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#name-lcd-'+data_popup['ID']).html($('#inp-name-lcd').val());
                        $('#edit-info').css('display', 'none');
                    }
                    else system_Notification(json["message"],1);
                },
                error: function (e) {
                    system_Notification("Xảy ra lỗi trong quá trình truyền tin. Vui lòng thử lại !", 1);
                }
            });
        }

        if (popup_status == 5)
        {
            $.ajax({
                type: "POST",
                url: "group/lienchidoan/delete",
                data: data_popup,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: true,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json["status"])
                    {
                        system_Notification(json["message"]);
                        $('#lcd-'+data_popup['ID']).remove();
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

    function getChiDoanEdit(lcd) {
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
                $('#inp-edit-CD').val('');
                if (json["status"])
                {
                    json = JSON.parse(json["message"]);
                    $('#inp-edit-CD').html('');
                    let html = '';
                    if (json.length == 0)
                    {
                        $('#inp-edit-CD').html('<option value="Chi Đoàn">Chi Đoàn</option>');
                        return;
                    }
                        
                    json.forEach(value => {
                        html += '<option value="'+value['Name']+'">'+value['Name']+'</option>';
                    });
                    $('#inp-edit-CD').html(html);
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
        getChiDoanEdit(data['LCD']);
        $('#inp-edit-CD').val(data['ChiDoan']);
        $('#inp-edit-award').val(data['Award']);
        $('#inp-edit-punish').val(data['Punishment']);
    }
});