<div class="page-home">
    <script src="JS/admin/home.js"></script>
    <div class="container">
        <div class="title">Thông Báo</div>
        <div class="content">
            <div class="add-notification">
                <input type="text" id="inp-add-notification" placeholder="Nội dung . . .">
                <button id="btn-add">Thêm thông báo</button>
            </div>
            <div class="edit-notification">
                <p><strong id="old-content"></strong></p>
                <input type="text" id="inp-edit-notification" placeholder="Nội dung . . .">
                <button id="btn-save-edit">Lưu</button>
                <button id="btn-cancel-edit">Hủy</button>
            </div>
            <div class="list-notification">
                <?php foreach ($notification as $value) : ?>
                        <div class="item">
                            <strong id="content-<?php echo $value['ID']; ?>"><?php echo $value['Content']; ?></strong>
                            <i class="fa <?php echo $value['Status'] == 0 ? 'fa-toggle-on':'fa fa-toggle-off'; ?>" id="view-<?php echo $value['ID']; ?>"></i>
                            <i class="fa fa-pencil-square-o" id="edit-<?php echo $value['ID']; ?>"></i>
                            <i class="fa fa-trash-o" id="delete-<?php echo $value['ID']; ?>"></i>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">Banner</div>
        <div class="content">
            <div class="upload">
                <input type="file" id="upload-file" style="display: none">
                <label for="upload-file"><i class="fa fa-cloud-upload"></i></label>
            </div>
            <div class="info-file">
                <div class="item" id="name-file">This is file name</div>
                <div class="item" id="size-file">7749kb</div>
                <div class="item"><button id="btn-upload-file">Tải lên</button></div>
            </div>
            <div class="list-banner">
                <?php 
                    $id = 1;
                    foreach ($Banner as $value) {
                ?>
                    <div class="item">
                        <img src="Image/Banner/<?php echo $value['Image']; ?>" alt="" id="banner-img-<?php echo $id; ?>">
                        <label for="" id="view-banner-<?php echo $id; ?>"><i class="fa fa-eye"></i></label>
                        <label for="" id="delete-banner-<?php echo $id; ?>"><i class="fa fa-trash-o"></i></label>
                    </div>
                <?php 
                        $id++;
                    } ?>
            </div>
        </div>
    </div>
</div>
<div class="img-show">
    <div class="content">
        <label id="btn-cancel-zoom-image"><i class="fa fa-remove"></i></label>
        <img src="" alt="">
    </div>
</div>