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

    <!-- Tài nguyên -->
    <link rel="stylesheet" href="CSS/templates/header.css">
    <link rel="stylesheet" href="CSS/templates/footer.css">

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
    <div style="width: 100%; text-align: center; margin: 50px"><img src="Image/empty_box.png" style="width: 200px;"><br><strong style="color: #777">Không tìm thấy bài viết !</strong></div>
    <?= $footer ?>
</body>

</html>