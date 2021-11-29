<div class="page-member">
    <script src="JS/admin/member.js"></script>
    <div class="container">
        <div class="title">Thêm thành viên</div>
        <div class="quanly">
            <table id="table-add-student">
                <tbody>
                    <tr>
                        <td>Họ và tên</td>
                        <td><input type="text" id="inp-add-name"></td>
                    </tr>
                    <tr>
                        <td>Mã sinh viên</td>
                        <td><input type="text" id="inp-add-studentid"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" id="inp-add-email"></td>
                    </tr>
                    <tr>
                        <td>Liên chi Đoàn</td>
                        <td><select name="" id="inp-add-LCD">
                        <option value="Liên chi Đoàn">Liên chi Đoàn</option>
                            <?php
                            if (count($LienChiDoan) > 0)
                                foreach ($LienChiDoan as $key ) {
                                    
                                ?>
                                <option value="<?= $key['Name'] ?>"><?= $key['Name'] ?></option>
                            <?php } ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Chi Đoàn</td>
                        <td><select name="" id="inp-add-CD">
                            <option value="Chi Đoàn">Chi Đoàn</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Chức vụ</td>
                        <td><select name="" id="inp-add-cv">
                            <?php foreach ($Position as $key ) { ?>
                                <option value="<?= $key['Name'] ?>"><?= $key['Name'] ?></option>
                            <?php } ?>
                        </select></td>
                    </tr>
                </tbody>
            </table>
            <button id="btn-add-save">Thêm</button>
        </div>
    </div>
    <div class="container">
        <div class="title">Quản lý</div>
        <div class="quanly">
            <div class="search">
                <input type="text" id="inp-search-member" placeholder="Tìm kiếm bài đăng ..." autocomplete = "off">
                <label for="" id="btn-search"><i class="fa fa-search"></i></label>
                <div class="line"></div>
            </div>
            
            <div class="find">
                <select name="" id="ds-lcd">
                    <option value="Liên chi Đoàn">Liên chi Đoàn</option>
                    <?php
                    if (count($LienChiDoan) > 0)
                        foreach ($LienChiDoan as $key ) {
                            
                         ?>
                        <option value="<?= $key['Name'] ?>"><?= $key['Name'] ?></option>
                    <?php } ?>
                </select>
                <select name="" id="ds-cd">
                    <option value="Chi Đoàn">Chi Đoàn</option>
                </select>
                <button id="btn-find">Tìm</button>
            </div>
            <div class="edit" style="display: none" id="edit-info">
                <input type="hidden" id="inp-edit-id">
                <table id="table-info-student">
                    <tbody>
                        <tr>
                            <td>Họ và tên</td>
                            <td><input type="text" id="inp-edit-name"></td>
                        </tr>
                        <tr>
                            <td>Mã sinh viên</td>
                            <td><input type="text" id="inp-edit-studentid"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input type="text" id="inp-edit-phone" disabled></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" id="inp-edit-email"></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh</td>
                            <td><input type="date" id="inp-edit-birth"></td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td><select name="" id="inp-edit-sex">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" id="inp-edit-address"></td>
                        </tr>
                        <tr>
                            <td>Ngoại ngữ</td>
                            <td><input type="text" id="inp-edit-language"></td>
                        </tr>
                        <tr>
                            <td>Ngày vào Đoàn</td>
                            <td><input type="date" id="inp-edit-union"></td>
                        </tr>
                        <tr>
                            <td>Nơi kết nạp Đoàn</td>
                            <td><input type="text" id="inp-edit-address-union"></td>
                        </tr>
                        <tr>
                            <td>Ngày vào Đảng</td>
                            <td><input type="date" id="inp-edit-party"></td>
                        </tr>
                        <tr>
                            <td>Nơi kết nạp Đảng</td>
                            <td><input type="text" id="inp-edit-address-party"></td>
                        </tr>
                        <tr>
                            <td>Liên chi Đoàn</td>
                            <td><select name="" id="inp-edit-LCD">
                            <option value="Liên chi Đoàn">Liên chi Đoàn</option>
                                <?php
                                if (count($LienChiDoan) > 0)
                                    foreach ($LienChiDoan as $key ) {
                                        
                                    ?>
                                    <option value="<?= $key['Name'] ?>"><?= $key['Name'] ?></option>
                                <?php } ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Chi Đoàn</td>
                            <td><select name="" id="inp-edit-CD">
                                <option value="Chi Đoàn">Chi Đoàn</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Khen thưởng</td>
                            <td><input type="text" id="inp-edit-award"></td>
                        </tr>
                        <tr>
                            <td>Kỷ luật</td>
                            <td><input type="text" id="inp-edit-punish"></td>
                        </tr>
                        <tr>
                            <td>Chức vụ</td>
                            <td><select name="" id="inp-edit-cv">
                                <?php foreach ($Position as $key ) { ?>
                                    <option value="<?= $key['Name'] ?>"><?= $key['Name'] ?></option>
                                <?php } ?>
                            </select></td>
                        </tr>
                    </tbody>
                </table>
                <button id="btn-edit-save">Lưu</button>
                <button id="btn-edit-cancel">Hủy</button>
            </div>
            <div class="view">
                <table><tbody id="table-info"></tbody></table>
            </div>
        </div>
    </div>
    
</div>