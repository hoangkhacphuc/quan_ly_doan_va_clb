$(document).ready(function () {
    var onFileJS = true;
    if (onFileJS == true)
    {
        function system_Notification(param1, param2 = 0) {
            $('.system-notification').append('<div class="item"'+(param2 == 0 ? '':'style="background-color: #f75454;"')+'>'+param1+'</div>');
        }

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
            getStudent();
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
                changeTable();
                return;
            }
            changeTable(true);
            getChiDoan(lcd);
        }

        function changeTable(param = false) {
            $('#table-lcd').css('display', param == true ? 'none' : 'table-row-group');
            $('#table-info').css('display', param == false ? 'none' : 'table-row-group');
            $('#table-info').html('<tr><td>Mã sinh viên</td><td>Họ tên</td><td>Chức vụ</td><td>Lựa chọn</td></tr>');
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
                        let html = '';
                        if (json.length == 0)
                        {
                            $('#ds-cd').html('<option value="Chi Đoàn">Chi Đoàn</option>');
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
                            html += '<tr><td>'+value["StudentID"]+'</td><td>'+value["Name"]+'</td><td>'+value["Position"]+'</td><td><i class="fa fa-edit" id="btn-edit-'+value["ID"]+'"></i><i class="fa fa-trash-o" id="btn-trash-'+value["ID"]+'"></i></td></tr>';
                        });
                        onFileJS = false;
                        html+='<script src="JS/group/lienchidoan.js"></script>';
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
            $('#edit-info').css('display', onEdit ? 'block' : 'none');
        });

        $('#inp-edit-LCD').change(function (e) { 
            let lcd = $(this).val();
            if (lcd == 'Liên chi Đoàn')
            {
                system_Notification('Chưa chọn Liên chi Đoàn !', 1);
                return;
            }
            getChiDoanEdit(lcd);
        });

        $('#table-info>tr>td>i').click(function (e) { 
            let select = $(this).attr('id').search('edit') != -1 ? 1 : 0;
            if (select == 1)
            {
                let id = $(this).attr('id').slice(9, $(this).attr('id').length);
                editInfo(id);
            }
        });

        $('#btn-edit-save').click(function (e) { 
            e.preventDefault();
            popup_status = 1;
            data_popup = getInfo();
            console.log(data_popup);
            createPopup('Bạn có chắc chắn thay đổi thông tin tài khoản này không ?');
        });

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
    }
});