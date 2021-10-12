<header>
    <div class="row above">
        <div class="item" id="btn-showMenu">
            <i class="fa fa-reorder"></i>
        </div>
        <div class="item">
            <a href="/"><img src="Image/logo.png" alt="Trang chủ"></a>
        </div>
        <div class="item search">
            <input autocomplete="off" type="text" id="search" placeholder="Tìm kiếm ...">
            <button id='btn-search'><i class="fa fa-search"></i></button>
        </div>
        <div class="item player" ondblclick="false">
            <img src='Image/avt-<?= $sex ?>.jpg' alt="">
            <div class="content">
                <span class="name" id="namePlayer"><?= $Name ?></span>
                <span class="point"><i class="fa fa-heartbeat"></i>&nbsp;<?= $Point ?></span>
            </div>
            <div class="menu-box">
                <a href="#">Thông tin</a>
                <a href="#">Cài đặt</a>
                <a href="#">Thông báo</a>
                <a href="#">Xem hoạt động</a>
                <a href="#">Đăng xuất</a>
            </div>
        </div>
        <div class="both"></div>
    </div>
    <div class="row menu">
        <ul>
            <li>
                <div class="item">
                    <a href="/"><i class="fa fa-home"></i></a>
                </div>
            </li>
            <li>
                <div class="item">
                    <a href="/">Bài Đăng</a>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Hoạt Động</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="">Đang diễn ra</a>
                            <a href="">Đã diễn ra</a>
                            <a href="">Giftcode</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Cộng Đồng</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="">Fanpage</a>
                            <a href="">Group</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Câu Lạc Bộ</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="">Bài viết</a>
                            <a href="">Hoạt động</a>
                            <a href="">Danh sách</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Hỗ Trợ</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="">Hướng dẫn</a>
                            <a href="">Thông Tin</a>
                            <a href="">Báo Lỗi</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="row banner">
        <img src="Image/Banner/img1.jpg" alt="" id="Banner-0" style="display: block;">
        <img src="Image/Banner/img2.jpg" alt="" id="Banner-1" style="display: none;">
        <img src="Image/Banner/img3.jpg" alt="" id="Banner-2" style="display: none;">
    </div>
</header>

<div class="content">
    <?php
        for ($i=0; $i < 20; $i++)  echo "$i<br>";
    ?>
</div>