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
    <script src="JS/guest/post.js"></script>

</head>
<style>
    .banner {
        display: none;
    }
</style>

<?php
    $position = explode('|', $Posts['Position']);
    $maxplayer = explode('|', $Posts['MaxPlayer']);
    $onPosition = explode('|', $Posts['SelectPosition']);
    $onEvent = false;
    for ($i=0; $i < count($onPosition); $i++) { 
        if ($onPosition[$i] == 1)
            $onEvent = true;
    }
    $onJoin = (date('Y-m-d') >= $Posts['Start']) && (date('Y-m-d') <= $Posts['End']);
    $joinEvent = 0;
    if (isset($Join) && count($Join) > 0)
        $joinEvent = $Join[0]['Position'];
?>

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
                    <div class="date-event">
                        <i class="fa fa-clock-o"></i>
                        <span><?php 
                            $middle = strtotime($Posts['Start']);
                            echo date('\N\g\à\y d m, Y', $middle); ?> • <?php $middle = strtotime($Posts['End']);
                            echo date('\N\g\à\y d m, Y', $middle); ?></span>
                    </div>
                    <div class="post-main-content">
                        <?= $Posts['Content'] ?>
                    </div>
                    <?php if ($onJoin && $onEvent && $Posts['Type']): ?>
                        <div class="register-event">
                            <h3>Tham gia sự kiện</h3>
                            <input type="hidden" id="inp-ID" value="<?= $Posts['ID'] ?>">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Chức vụ</td>
                                        <td>Điểm thành tích</td>
                                        <td>Giới hạn</td>
                                        <td>Đăng ký</td>
                                    </tr>
                                    <?php if ($onPosition[0]): ?>
                                        <tr>
                                            <td>Quản lý</td>
                                            <td><?= $position[0] ?></td>
                                            <td><?= $maxplayer[0] ?></td>
                                            <td><button id="btn-event-1" <?= $joinEvent == 1 ? 'class="red"' : '' ?> ><?= $joinEvent == 1 ? 'Hủy tham gia' : 'Tham gia' ?></button></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($onPosition[1]): ?>
                                        <tr>
                                            <td>Tình nguyện viên</td>
                                            <td><?= $position[1] ?></td>
                                            <td><?= $maxplayer[1] ?></td>
                                            <td><button id="btn-event-2" <?= $joinEvent == 2 ? 'class="red"' : '' ?> ><?= $joinEvent == 2 ? 'Hủy tham gia' : 'Tham gia' ?></button></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($onPosition[2]): ?>
                                        <tr>
                                            <td>Người tham gia</td>
                                            <td><?= $position[2] ?></td>
                                            <td><?= $maxplayer[2] ?></td>
                                            <td><button id="btn-event-3" <?= $joinEvent == 3 ? 'class="red"' : '' ?> ><?= $joinEvent == 3 ? 'Hủy tham gia' : 'Tham gia' ?></button></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="side-post">
                <div class="title">Danh mục</div>
                <div class="list">
                    <a href="/moreposts">Bài viết</a>
                    <a href="/moreevent">Sự kiện</a>
                </div>

                <div class="title">Bài viết gần đây</div>
                <div class="list-item">
                    <?php foreach ($New_Posts as $item): ?>
                        <div class="list-item-tag">
                            <div class="list-item-img"> 
                                <a href="posts?ID=<?= $item['ID'] ?>"><img src="<?= $item['Image'] ?>" alt=""></a>
                            </div>
                            <div class="side-post-text">
                                <p class="post-title-date">&#10147; <?php
                                    $middle = strtotime($item['Posting']);
                                    echo date('\N\g\à\y d m, Y', $middle); ?>
                                </p>
                                <h4><a href="posts?ID=<?= $item['ID'] ?>"><?= $item['Title'] ?></a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="title">Sự kiện gần đây</div>
                <div class="list-item">
                    <?php foreach ($New_Event as $item): ?>
                        <div class="list-item-tag">
                            <div class="list-item-img"> 
                                <a href="posts?ID=<?= $item['ID'] ?>"><img src="<?= $item['Image'] ?>" alt=""></a>
                            </div>
                            <div class="side-post-text">
                                <p class="post-title-date">&#10147; <?php
                                    $middle = strtotime($item['Posting']);
                                    echo date('\N\g\à\y d m, Y', $middle); ?>
                                </p>
                                <h4><a href="posts?ID=<?= $item['ID'] ?>"><?= $item['Title'] ?></a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="system-notification"></div>
    <?= $footer ?>
</body>

</html>