<div class="page-home">
    <script src="JS/group/home.js"></script>

    <div class="head-home">
        <div class="search">
            <input type="text" id="inp-search-post" placeholder="Tìm kiếm bài đăng ...">
            <label for="" id="btn-search"><i class="fa fa-search"></i></label>
            <div class="line"></div>
        </div>
        <div class="manager">
            <div class="container">
                <div class="setting-more">
                    <div class="check" id="check-all"><i class="fa fa-check"></i></div>
                    <i class="fa fa-unlock" id="unlock-all"></i>
                    <i class="fa fa-unlock-alt" id="lock-all"></i>
                    <i class="fa fa-trash-o" id="trash-all"></i>
                </div>
                <div class="dropdown">
                    <div class="item" id="select-all">Tất cả</div>
                    <div class="item" id="select-posted">Đã xuất bản</div>
                    <div class="item" id="select-draft">Bài đăng nháp</div>
                </div>
                <div class="type-current">Tất cả<i class="fa fa-sort-down"></i></div>
            </div>
            <div class="container">
                <span id="onSettingMore">TÙY CHỌN</span>
            </div>
        </div>
    </div>
    <div class="body-home" id="show-list-post">
        <?php
            if (!$List_Post['status'])
            {
                echo "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>";
                return;
            }
            $id_post = 0;
            foreach ($List_Post['message'] as $data):
                $id_post++;
        ?>
                <div class="item" id="post-<?= $id_post ?>" name="post-<?= $data['ID'] ?>">
                    <div class="head">
                        <div class="check"><i class="fa fa-check"></i></div>
                        <img src="<?php echo $data['Image']; ?>" alt="">
                        <div class="container">
                            <div class="title"><?php echo $data['Title']; ?></div>
                            <div class="info"><?php echo !$data['Hide'] ? "<span>Bản nháp" : "<span style='color: orange'>Đã xuất bản"; ?></span> • <span><?php echo $data['Posting']; ?></span></div>
                        </div>
                    </div>
                    <div class="author">
                        <div class="container" id="name-author"><?php echo $data['Author']; ?></div>
                        <div class="container setting-post">
                            <i class="fa fa-unlock<?= !$data['Hide'] ? '-alt' : '' ?>" id="unlock-<?= $id_post ?>" name="unlock-<?= $data['ID'] ?>"></i>
                            <i class="fa fa-trash-o" id="trash-<?= $id_post ?>" name="trash-<?= $data['ID'] ?>"></i>
                            <i class="fa fa-eye" id="eye-<?= $id_post ?>" name="eye-<?= $data['ID'] ?>"></i>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>