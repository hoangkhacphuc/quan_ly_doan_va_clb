<div class="new-post">
    <script src="Lib/ckeditor/ckeditor.js"></script>
    <script src="JS/group/new_post.js"></script>

    <div class="container">
        <input type="text" id="inp-title" placeholder="Tiêu đề">
        <div class="line"></div>
    </div>

    <div class="container richtextarea">
        <textarea name="" id="editor" cols="30" rows="10"></textarea>
    </div>

    <div class="container setting-post">
        <div class="item">
            <label for="image-post">Ảnh đại diện</label>
            <div class="select-file">
                <label for="image-post" id="name-image-post">Chọn ảnh</label>
                <input type="file" id="image-post" style="display: none">
            </div>
        </div>
        <div class="item">
            <label for="select-type-post">Thể loại</label>
            <select name="" id="select-type-post">
                <option value="Bài viết">Bài viết</option>
                <option value="Sự kiện">Sự kiện</option>
            </select>
        </div>
        <div class="item" id="on-position" style="display: none"><label for="position-post">Chức vụ</label><i id="position-post" class="fa fa-toggle-off hide-post"></i></div>
        <div class="item list-position">
            <table>
                <tbody>
                    <tr>
                        <th>Chức vụ</th>
                        <th>Điểm thành tích</th>
                        <th>Giới hạn</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Quản lý</td>
                        <td><input type="number" id="inp-score-1" min='0' value="0" max='100'></td>
                        <td><input type="number" id="inp-max-1" min='0' value="0" max='100'></td>
                        <td><input type="checkbox" id="inp-checkbox-1"></td>
                    </tr>
                    <tr>
                        <td>Tình nguyện viên</td>
                        <td><input type="number" id="inp-score-2" min='0' value="0" max='100'></td>
                        <td><input type="number" id="inp-max-2" min='0' value="0" max='100'></td>
                        <td><input type="checkbox" id="inp-checkbox-2"></td>
                    </tr>
                    <tr>
                        <td>Người tham gia</td>
                        <td><input type="number" id="inp-score-3" min='0' value="0" max='100'></td>
                        <td><input type="number" id="inp-max-3" min='0' value="0" max='100'></td>
                        <td><input type="checkbox" id="inp-checkbox-3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="item"><label for="hide-post">Công khai</label><i id="show-post" class="fa fa-toggle-on"></i></div>
        <div class="item">
            <button id="btn-new-post"><i class="fa fa-send"></i>  Xuất bản</button>
        </div>
    </div>
</div>