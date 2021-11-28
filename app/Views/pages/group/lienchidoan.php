<div class="page-lienchidoan">
    <script src="JS/group/lienchidoan.js"></script>
    <div class="container">
        <div class="title">Quản lý</div>
        <div class="quanly">
            <div class="box">
                <span>Liên chi Đoàn</span>
                <div class="content">
                    <input type="text" id="inp-create-lcd" placeholder="Tên liên chi đoàn . . .">
                    <button id="btn-create-lcd">Thêm</button>
                </div>
            </div>
            <div class="box">
                <span>Chi đoàn</span>
                <select name="" id="sl-lcd">
                    <option value="Liên chi Đoàn">Liên chi Đoàn</option>
                    <?php
                    if (count($LienChiDoan) > 0)
                        foreach ($LienChiDoan as $key ) {
                            
                         ?>
                        <option value="<?= $key['Name'] ?>"><?= $key['Name'] ?></option>
                    <?php } ?>
                </select>
                <div class="content">
                    <input type="text" id="inp-create-cd" placeholder="Tên Chi đoàn . . .">
                    <button id="btn-create-cd">Thêm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">Danh sách</div>
        <div class="danhsach">
            <div class="search">
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
                <table>
                    <tbody>
                        <tr>
                            <td>Họ và tên</td>
                            <td><input type="text" id="inp-edit-name"></td>
                        </tr>
                        <tr>
                            <td>Mã sinh viên</td>
                            <td><input type="text" id="inp-edit-studentid" disabled></td>
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
                    </tbody>
                </table>
                <button id="btn-edit-save">Lưu</button>
                <button id="btn-edit-cancel">Hủy</button>
            </div>
            <div class="view">
                <table>
                    <tbody id="table-lcd">
                        <tr>
                            <td>Liên chi Đoàn</td>
                            <td>Lựa chọn</td>
                        </tr>
                        <?php
                        $num = 0;
                        if (count($LienChiDoan) > 0)
                        foreach ($LienChiDoan as $key ) {
                            $num++;
                         ?>
                            <tr>
                                <td><?= $key['Name'] ?></td>
                                <td><i class="fa fa-edit" id="btn-edit-<?= $key['ID'] ?>"></i><i class="fa fa-trash-o" id="btn-trash-1"></i></td>
                            </tr>
                        <?php } ?>
                    <tbody>
                    <tbody  id="table-info" style="display: none">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>