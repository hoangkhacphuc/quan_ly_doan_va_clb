<div class="new-post">
    <script src="Lib/ckeditor/ckeditor.js"></script>
    <script src="JS/group/edit_post.js"></script>
    
    <?php 
    if (!$List_Post['status'])
    {
        echo "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>";
        return;
    }
    $id = $List_Post['message'][0]['ID'];
    $title = $List_Post['message'][0]['Title'];
    $content = $List_Post['message'][0]['Content'];
    $type = $List_Post['message'][0]['Type'];
    $hide = $List_Post['message'][0]['Hide'];
    $position = explode('|', $List_Post['message'][0]['Position']);
    $maxplayer = explode('|', $List_Post['message'][0]['MaxPlayer']);
    $selectposition = explode('|', $List_Post['message'][0]['SelectPosition']);
    $onselect = in_array(1, $selectposition);

    $start = $List_Post['message'][0]['Start'];
    $end = $List_Post['message'][0]['End'];
    ?>

    <input type="hidden" id="inp-id" value="<?= $id ?>">
    <div class="container">
        <input type="text" id="inp-title" placeholder="Tiêu đề" value="<?= $title ?>">
        <div class="line"></div>
    </div>

    <div class="container richtextarea">
        <textarea name="" id="editor" cols="30" rows="10"><?= $content ?></textarea>
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
                <option value="Bài viết" <?= $type ? '' : 'selected="selected"' ?> >Bài viết</option>
                <option value="Sự kiện" <?= $type ? 'selected="selected"' : '' ?> >Sự kiện</option>
            </select>
        </div>
        <div class="item" id="date-event" style="display: <?= $type ? 'block' : 'none' ?>">
            <div class="row"><label for="inp-date-start">Ngày bắt đầu</label><input type="date" id="inp-date-start" value="<?= $start ?>"></div>
            <div class="row"><label for="inp-date-end">Ngày kết thúc</label><input type="date" id="inp-date-end" value="<?= $end ?>"></div>
        </div>
        <div class="item" id="on-position" style="display: <?= $type && $onselect  ? 'block' : 'none' ?>"><label for="position-post">Chức vụ</label><i id="position-post" class="fa fa-toggle-off hide-post"></i></div>
        <div class="item list-position" style="display : none">
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
                        <td><input type="number" id="inp-score-1" min='0' max='100' value="<?= $position[0] ?>"></td>
                        <td><input type="number" id="inp-max-1" min='0' max='100' value="<?= $maxplayer[0] ?>"></td>
                        <td><input type="checkbox" id="inp-checkbox-1" <?= $selectposition[0] ? 'checked' : '' ?> ></td>
                    </tr>
                    <tr>
                        <td>Tình nguyện viên</td>
                        <td><input type="number" id="inp-score-2" min='0' max='100' value="<?= $position[1] ?>"></td>
                        <td><input type="number" id="inp-max-2" min='0' max='100' value="<?= $maxplayer[1] ?>"></td>
                        <td><input type="checkbox" id="inp-checkbox-2" <?= $selectposition[1] ? 'checked' : '' ?> ></td>
                    </tr>
                    <tr>
                        <td>Người tham gia</td>
                        <td><input type="number" id="inp-score-3" min='0' max='100' value="<?= $position[2] ?>"></td>
                        <td><input type="number" id="inp-max-3" min='0' max='100' value="<?= $maxplayer[2] ?>"></td>
                        <td><input type="checkbox" id="inp-checkbox-3" <?= $selectposition[2] ? 'checked' : '' ?> ></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="item"><label for="hide-post">Công khai</label><i id="show-post" class="fa fa-toggle<?= $hide ? '-on' : '-off hide-post' ?>"></i></div>
        <div class="item">
            <button id="btn-new-post"><i class="fa fa-send"></i>  Xuất bản</button>
        </div>
    </div>

    <script>
        show_Post = <?= $hide ? 'true' : 'false' ?>;
    </script>
</div>