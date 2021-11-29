<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?= $Title ?></title>
    <base href='<?php echo base_url(); ?>'>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Romanesco&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Slider -->
    <link rel="stylesheet" type="text/css" href="Lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="Lib/slick/slick-theme.css">
    <script src="Lib/slick/slick.js" type="text/javascript" charset="utf-8"></script>

    <!-- Tài nguyên -->
    <link rel="stylesheet" href="CSS/templates/header.css">
    <link rel="stylesheet" href="CSS/templates/footer.css">
    <link rel="stylesheet" href="CSS/guest/index.css">
    <link rel="stylesheet" href="CSS/guest/post.css">

    <script src="JS/templates/header.js"></script> 
    <script src="JS/guest/index.js"></script>

</head>
<style>
    .banner {
        display: none;
    }
</style>
<body>
    <?= $header ?>
    <div class="post-contain">
            <div class="content-contain">
                <div class="title"><?= $Posts['Type'] ? 'Sự kiện' : 'Bài viết' ?></div>
                <img src="<?= $Posts['Image'] ?>" alt="">
                <div class="post-content">
                    <div class="post-title">
                        <p class="post-title-date">&#10147; <?php
                            $middle = strtotime($Posts['Posting']);
                            echo date('\N\g\à\y d m, Y', $middle);
                        ?></p>
                        <h2><?= $Posts['Title'] ?></h2>
                    </div>
                    <div class="post-main-content">
                        <?= $Posts['Content'] ?>
                    </div>
                    <div class="register-event">
                        <h3>Đăng ký tham gia sự kiện</h3>
                        <label for="regis">Chức vụ</label>
                        <select name="" id="">
                            <option value="reg-event">Quản lý 5 điểm Tối đã 5 người </option>
                            <option value="reg-event">Quản lý 5 điểm Tối đã 5 người </option>
                            <option value="reg-event">Quản lý 5 điểm Tối đã 5 người </option>
                        </select>
                        <h4>Đã đăng ký: Quản lý </h4>
                        <a href="#">Đăng ký</a>
                    </div>
                </div>
            </div>

            <div class="side-post">
                <div class="title">Danh mục</div>
                <div class="list">
                    <a href="#">Bài viết</a>
                    <a href="#">Sự kiện</a>
                </div>

                <div class="title">Bài viết mới</div>
                <div class="list-item">
                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>
                </div>
                
                <div class="title">Sự kiện gần đây</div>
                <div class="list-item">
                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>

                    <div class="list-item-tag">
                        <div class="list-item-img"> 
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/thumbnail-le-kick-off-02.jpg" alt="">
                        </div>
                        <div class="side-post-text">
                            <p class="post-title-date">&#10147;  Tháng 11 18, 2021</p>
                            <h4><a href="#">Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"Lễ kick off Dự án "Tam giác hướng nghiệp hiệu quả"</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                
    <?= $footer ?>
</body>

</html>