<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin - Dashboard</title>
    <base href="<?= base_url(); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Romanesco&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Tài nguyên -->
    <link rel="stylesheet" href="CSS/admin/index.css">
    <script src="JS/admin/index.js"></script>
</head>
<body>
    <header>
        <div class="item menu-dashboard"><i class="fa fa-bars"></i></div>
        <div class="item">
            <a href="/"><img src="Image/logo.png" alt="Trang chủ"></a>
        </div>
        <div class="item search">
            <input autocomplete="off" type="text" id="search" placeholder="Tìm kiếm ...">
            <button id='btn-search'><i class="fa fa-search"></i></button>
        </div>
        <div class="item"></div>
    </header>
</body>
</html>