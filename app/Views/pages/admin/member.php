<div class="page-member">
    <script src="Lib/ckeditor/ckeditor.js"></script>
    <script src="JS/admin/member.js"></script>
    <div class="head-member">
        <div class="search">
                <input type="text" id="inp-search-post" placeholder="Tìm kiếm thành viên ...">
                <label for=""><i class="fa fa-search"></i></label>
                <div class="line"></div>
        </div>
        <div class="head-choice setting-post">
            <div class="item">
                <!-- <label for="select-type-post">Thể loại</label> -->
                <select name="" id="select-type-post">
                    <option value="Bài viết">Liên chi đoàn</option>
                </select>
                &emsp;
                <select name="" id="select-type-post">
                    <option value="Bài viết">Chi đoàn</option>
                </select>        
            </div>
            <div class="find">Lọc</div>
        </div>

    </div>

    <div class="body-member">
        <div class="item">
            <div class="author">
                <div class="container">
                   <p>Hoàng Khắc Phúc</p> 
                   <p>Khoa Công Nghệ Thông Tin - K13 CNTT VJ</p> 
                </div>
                <div class="container setting-post">
                    <div class="grade">
                        <p>Điểm: 0</p>
                    </div>
                    <div class="member-edit">
                        <i class="fa fa-pencil-square-o"></i>
                        <!-- <i class="fa fa-trash-o"></i> -->
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="author">
                <div class="container">
                   <p>Hoàng Khắc Phúc</p> 
                   <p>Khoa Công Nghệ Thông Tin - K13 CNTT VJ</p> 
                </div>
                <div class="container setting-post">
                    <div class="grade">
                        <p>Điểm: 0</p>
                    </div>
                    <div class="member-edit">
                        <i class="fa fa-pencil-square-o"></i>
                        <!-- <i class="fa fa-trash-o"></i> -->
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="author">
                <div class="container">
                   <p>Hoàng Khắc Phúc</p> 
                   <p>Khoa Công Nghệ Thông Tin - K13 CNTT VJ</p> 
                </div>
                <div class="container setting-post">
                    <div class="grade">
                        <p>Điểm: 0</p>
                    </div>
                    <div class="member-edit">
                        <i class="fa fa-pencil-square-o"></i>
                        <!-- <i class="fa fa-trash-o"></i> -->
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="member-add">
        <h3>Thêm thành viên</h3>
        <table class="inp">
            <tr>
                <td><label for="name">Họ và tên:</label></td>
                <td><input type="text" id="inp-add-notification-name" placeholder="Nhập họ và tên . . ."></td>
            </tr>
            <tr>
                <td><label for="msv">Mã Sinh Viên:</label></td>
                <td><input type="text" id="inp-add-notification-msv" placeholder="Nhập mã sinh viên . . ."></td>
            </tr>
            <!-- <tr>
                <td><label for="msv">Liên chi đoàn:</label></td>
                <td>
                    <select name="" id="inp-add-notification-party">
                        <option value="">CNTT-VJ</option>
                        <option value="">CNTT-VJ</option>
                    </select>
                </td>
            </tr> -->
            <tr>
                <td><label for="msv">Chi đoàn:</label></td>
                <td>
                    <select name="" id="inp-add-notification-group">
                        <option value="">CNTT</option>
                        <option value="">CNTT</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="sdt">Số Điện Thoại:</label></td>
                <td><input type="text" id="inp-add-notification-sdt" placeholder="Nhập số điện thoại . . ."></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" id="inp-add-notification-email" placeholder="Nhập email . . ."></td>
            </tr>
            <tr>
                <td><label for="dob">Ngày Sinh:</label></td>
                <td><input type="date" id="inp-add-notification-dob" placeholder=""></td>
            </tr>
            <tr>
                <td><label for="sex">Giới Tính:</label></td>
                <td class="gender-radio">
                    <select name="" id="gender">
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td><label for="addr">Địa chỉ:</label></td>
                <td><textarea name="" id="inp-add-notification-addr" cols="45" rows="7"></textarea></td>
            </tr>
            <tr>
                <td><label for="dob">Ngày vào đoàn:</label></td>
                <td><input type="date" id="inp-add-notification-union" placeholder=""></td>
            </tr>
            <tr>
                <td><label for="msv">Nơi vào đoàn:</label></td>
                <td><input type="text" id="inp-add-notification-addr-union" placeholder="Nơi kết nạp đoàn . . ."></td>
            </tr>

            <tr>
                <td><label for="dob">Ngày vào đảng:</label></td>
                <td><input type="date" id="inp-add-notification-party" placeholder=""></td>
            </tr>
            <tr>
                <td><label for="">Nơi kết nạp đảng:</label></td>
                <td><input type="text" id="inp-add-notification-addr-party" placeholder="Nơi kết nạp đảng . . ."></td>
            </tr>

            <tr>
                <td><label for="award">Khen thưởng:</label></td>
                <td><textarea name="" id="inp-add-notification-award" cols="45" rows="7"></textarea></td>
            </tr>
            <tr>
                <td><label for="punishment">Kỷ luật:</label></td>
                <td><textarea name="" id="inp-add-notification-punishment" cols="45" rows="7"></textarea></td>
            </tr>
        </table>
        <div class="btn">
            <button id="btn-add" >Thêm thành viên</button>
            <button id="btn-add-more" >Thêm tiếp thành viên</button>
        </div>
    </div>
    
        
</div>