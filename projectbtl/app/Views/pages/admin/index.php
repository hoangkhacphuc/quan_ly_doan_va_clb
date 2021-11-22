<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Title ?></title>
    <base href="<?= base_url(); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Romanesco&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <!-- Tài nguyên -->
    <link rel="stylesheet" href="CSS/admin/index.css">
    <link rel="stylesheet" href="CSS/admin/home.css">
    <link rel="stylesheet" href="CSS/admin/member.css">

    <script src="JS/admin/index.js"></script>
</head>
<body>
    <header>
        <div class="item btn-menu-dashboard"><i class="fa fa-bars"></i></div>
        <div class="item">
            <a href="/"><img src="Image/logo.png" alt="Trang chủ"></a>
        </div>
        <!-- <div class="item search">
            <input autocomplete="off" type="text" id="search" placeholder="Tìm kiếm ...">
            <button id='btn-search'><i class="fa fa-search"></i></button>
        </div> -->
    </header>
    <div class="dashboard">
        <div class="menu-dashboard">
            <div class="container">
                <div class="item" id="page-1"><i class="fa fa-home"></i> Trang Chủ</div>
                <div class="item" id="page-2"><i class="fa fa-users"></i> Thành Viên</div>
                <div class="item" id="page-3"><i class="fa fa-bullhorn"></i> Thông Báo</div>
                <div class="item" id="page-4"><i class="fa fa-gift"></i> Giftcode</div>
                <div class="item" id="page-5"><i class="fa fa-bug"></i> Góp Ý & Báo Lỗi</div>
            </div>
        </div>
        <div class="page"></div>
    </div>
    <div class="system-notification">
    </div>
</body>
</html>