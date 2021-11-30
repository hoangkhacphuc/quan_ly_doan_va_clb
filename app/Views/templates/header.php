<header>
    <div class="model" id="model-login">
        <div class="container" id="container-model-login">
            <div class="header-model">Đăng nhập</div>
            <div class="body-model">
                <div class="item" id="errorLogin"></div>
                <div class="item"><input type="text" id="login-user" placeholder="Username"><label for="login-user"><i class="fa fa-user"></i></label></div>
                <div class="item"><input type="password" id="login-pass" placeholder="Password"><label for="login-pass"><i class="fa fa-unlock-alt"></i></label></div>
                <div class="item"><span>Quên mật khẩu ?</span></div>
                <div class="item"><button id="btn-login">login</button></div>
            </div>
            <div class="footer-model">
                <button onclick="closeModelLogin()">Đóng</button>
            </div>
        </div>
    </div>
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
            <?php if ($Login) { ?>
                <img src='Image/Avatar/<?= $Avatar ?>' alt="">
                <div class="content">
                    <span class="name" id="namePlayer"><?= $Name ?></span>
                    <span class="point"><i class="fa fa-heartbeat"></i>&nbsp;<?= $Point ?></span>
                </div>
                <div class="menu-box">
                    <a href="#">Thông tin</a>
                    <a href="#">Cài đặt</a>
                    <a href="#">Thông báo</a>
                    <a href="#">Xem hoạt động</a>
                    <a href="/logout">Đăng xuất</a>
                </div>
            <?php } else { ?>
                <span class="login" onclick="startModelLogin()">Đăng Nhập <i class='fa fa-sign-in'></i></span>
            <?php } ?>
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
                    <a href="/moreposts">Bài Đăng</a>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Hoạt Động</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="/moreevent">Tất cả</a>
                            <a href="/moreevent?Status=now">Đang diễn ra</a>
                            <a href="/moreevent?Status=late">Đã diễn ra</a>
                            <a href="#">Giftcode</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Cộng Đồng</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="https://www.facebook.com/Doantruongphenikaa/">Fanpage</a>
                            <a href="https://www.phenikaa-uni.edu.vn/">Trang chủ</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Câu Lạc Bộ</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="#">Bài viết</a>
                            <a href="#">Hoạt động</a>
                            <a href="#">Danh sách</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <span>Hỗ Trợ</span>
                    <div class="drop">
                        <div class="dropdown">
                            <a href="#">Hướng dẫn</a>
                            <a href="#">Thông Tin</a>
                            <a href="#">Báo Lỗi</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="row banner">
        <?php 
        $id = 0;
        foreach ($Banner as $value) { ?>
            <img src="Image/Banner/<?= $value['Image']; ?>" alt="" id="Banner-<?= $id; ?>" style="display: <?= $id==0 ? 'block':'none' ?>">
            
        <?php $id++; } ?>
    </div>
</header>