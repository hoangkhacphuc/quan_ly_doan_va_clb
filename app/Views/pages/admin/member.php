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
                    <input type="radio" id="" name="gender" value="male">Nam  </br>
                    <input type="radio" id="" name="gender" value="female">Nữ  
                </td>
            </tr>
            <tr>
                <td><label for="addr">Địa chỉ:</label></td>
                <td><input type="text" id="inp-add-notification-addr" placeholder="Nhập địa chỉ . . ."></td>
            </tr>
            <tr>
                <td><label for="group">Chi đoàn:</label></td>
                <td><input type="text" id="inp-add-notification-group" placeholder="Nhập chi đoàn . . ."></td>
            </tr>
        </table>
        <button id="btn-add" >Thêm thành viên</button>
    </div>
    
        
</div>