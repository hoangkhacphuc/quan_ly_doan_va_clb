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
    <script src="JS/templates/header.js"></script>
    <script src="JS/guest/index.js"></script>

</head>

<body>
    <?= $header ?>

    <div class="body">
        <div class="row">
            <div class="title">Thông Báo</div>
            <div class="container">
                <?php foreach ($notification as $value) : ?>
                    <div class="item"><i class="fa fa-bell-o"></i> <?php echo $value['Content']; ?></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row event">
            <div class="title">Sự Kiện</div>
            <div class="container">
                <section class="autoplay slider">
                    <div class="inner">
                        <a href="#" id="event-1">
                            <div class="logo-event">
                                <img src="./Image/Event/img-1.jpg" alt="">
                            </div>
                            <span class="title">
                                Phenikaa Anti Covid đồng hành cùng chiến dịch "Tuổi trẻ"
                                <span><i class="fa fa-check-circle-o"></i> Hoạt động tích điểm</span>
                                <span><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</span>
                                <span><i class="fa fa-calendar"></i> 15/11/2021</span>
                            </span>
                        </a>
                    </div>
                    <div class="inner">
                        <a href="#" id="event-1">
                            <div class="logo-event">
                                <img src="./Image/Event/img-1.jpg" alt="">
                            </div>
                            <span class="title">
                                Phenikaa Anti Covid đồng hành cùng chiến dịch "Tuổi trẻ"
                                <span><i class="fa fa-check-circle-o"></i> Hoạt động tích điểm</span>
                                <span><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</span>
                                <span><i class="fa fa-calendar"></i> 15/11/2021</span>
                            </span>
                        </a>
                    </div>
                    <div class="inner">
                        <a href="#" id="event-1">
                            <div class="logo-event">
                                <img src="./Image/Event/img-1.jpg" alt="">
                            </div>
                            <span class="title">
                                Phenikaa Anti Covid đồng hành cùng chiến dịch "Tuổi trẻ"
                                <span><i class="fa fa-check-circle-o"></i> Hoạt động tích điểm</span>
                                <span><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</span>
                                <span><i class="fa fa-calendar"></i> 15/11/2021</span>
                            </span>
                        </a>
                    </div>
                    <div class="inner">
                        <a href="#" id="event-1">
                            <div class="logo-event">
                                <img src="./Image/Event/img-1.jpg" alt="">
                            </div>
                            <span class="title">
                                Phenikaa Anti Covid đồng hành cùng chiến dịch "Tuổi trẻ"
                                <span><i class="fa fa-check-circle-o"></i> Hoạt động tích điểm</span>
                                <span><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</span>
                                <span><i class="fa fa-calendar"></i> 15/11/2021</span>
                            </span>
                        </a>
                    </div>
                    <div class="inner">
                        <a href="#" id="event-1">
                            <div class="logo-event">
                                <img src="./Image/Event/img-1.jpg" alt="">
                            </div>
                            <span class="title">
                                Phenikaa Anti Covid đồng hành cùng chiến dịch "Tuổi trẻ"
                                <span><i class="fa fa-check-circle-o"></i> Hoạt động tích điểm</span>
                                <span><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</span>
                                <span><i class="fa fa-calendar"></i> 15/11/2021</span>
                            </span>
                        </a>
                    </div>
                    <div class="inner">
                        <a href="#" id="event-1">
                            <div class="logo-event">
                                <img src="./Image/Event/img-1.jpg" alt="">
                            </div>
                            <span class="title">
                                Phenikaa Anti Covid đồng hành cùng chiến dịch "Tuổi trẻ"
                                <span><i class="fa fa-check-circle-o"></i> Hoạt động tích điểm</span>
                                <span><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</span>
                                <span><i class="fa fa-calendar"></i> 15/11/2021</span>
                            </span>
                        </a>
                    </div>
                </section>
                <div class="more">
                    <a href="#">Xem Thêm</a>
                </div>
            </div>
        </div>
<div class="row notification">
            <div class="title">Bài Đăng</div>
            <div class="container">
                <div class="news-item">
                        <div class="logo-notification">
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/dsc8958.JPG" alt=""> 
                                </div>
                    
                    <div class="content">
                 	    <div class="content-1"><a href=""> Giải mã “sức hút” của trường Đại học Phenikaa với sinh viên 2k3 </a></div>
                        <div class="gc"> </div>
                        <p> Chất lượng đào tạo và uy tín của một trường đại học được phản ánh dựa trên “sức hút” đối với tân sinh viên của trường qua các năm.</p>
                        <div class="content-2">
                            <p><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</p>
                            <p><i class="fa fa-calendar"></i> 15/11/2021</p>
                        </div>
                        <div class="more"> 
                        <a href=""> Xem thêm <i class="fa fa-long-arrow-right"></i></a> 
                        </div>
                    </div>
                </div>
                <div class="news-item">
                    <div class="logo-notification">
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/dsc8958.JPG" alt=""> 
                    </div>
                    
                    <div class="content">
                 	<div class="content-1"><a href=""> Giải mã “sức hút” của trường Đại học Phenikaa với sinh viên 2k3 </a></div>
                    <div class="gc"> </div>
                        <p> Chất lượng đào tạo và uy tín của một trường đại học được phản ánh dựa trên “sức hút” đối với tân sinh viên của trường qua các năm.</p>
                    <div class="content-2">
                        <p><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</p>
                        <p><i class="fa fa-calendar"></i> 15/11/2021</p>
                    </div>
                    <div class="more"> 
                        <a href=""> Xem thêm <i class="fa fa-long-arrow-right"></i></a> 
                    </div>
                    </div>
                </div>
                <div class="news-item">
                    <div class="logo-notification">
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/dsc8958.JPG" alt=""> 
                    </div>
                    
                    <div class="content">
                 	<div class="content-1"><a href=""> Giải mã “sức hút” của trường Đại học Phenikaa với sinh viên 2k3 </a></div>
                    <div class="gc"> </div>
                        <p> Chất lượng đào tạo và uy tín của một trường đại học được phản ánh dựa trên “sức hút” đối với tân sinh viên của trường qua các năm.</p>
                    <div class="content-2">
                        <p><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</p>
                        <p><i class="fa fa-calendar"></i> 15/11/2021</p>
                    </div>
                    <div class="more"> 
                        <a href=""> Xem thêm <i class="fa fa-long-arrow-right"></i></a> 
                    </div>
                    </div>
                </div>
                <div class="news-item">
                    <div class="logo-notification">
                            <img src="https://phenikaa-uni.edu.vn:3600/pu/vi/posts/dsc8958.JPG" alt=""> 
                    </div>
                    
                    <div class="content">
                 	<div class="content-1"><a href=""> Giải mã “sức hút” của trường Đại học Phenikaa với sinh viên 2k3 </a></div>
                    <div class="gc"> </div>
                        <p> Chất lượng đào tạo và uy tín của một trường đại học được phản ánh dựa trên “sức hút” đối với tân sinh viên của trường qua các năm.</p>
                    <div class="content-2">
                        <p><i class="fa fa-paper-plane-o"></i> Nguyễn Văn A</p>
                        <p><i class="fa fa-calendar"></i> 15/11/2021</p>
                    </div>
                    <div class="more"> 
                        <a href=""> Xem thêm <i class="fa fa-long-arrow-right"></i></a> 
                    </div>
                    </div>
                </div>
            </div>
            <div class="xemthem"> <a href="#">Xem Thêm </a>  </div> 
</div>
       


        <div class="row">
            <div class="title">Câu lạc bộ</div>
            <div class="container">

            </div>
        </div>
        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    </div>

    <?= $footer ?>
</body>

</html>