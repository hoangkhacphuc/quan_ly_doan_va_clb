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

    <div class="body">
        <div class="row post">
            <div class="title">Sự kiện</div>
            <div class="container">
                <?php foreach ($Posts as $item): ?>
                    <div class="news-item">
                        <div class="logo-post">
                            <a href="posts?ID=<?= $item['ID'] ?>"><img src="<?= $item['Image'] ?>" alt=""></a>
                        </div>
                        <div class="content">
                        <div class="content-1">
                            <a href="posts?ID=<?= $item['ID'] ?>"><?= $item['Title'] ?></a>
                            </div>
                        <div class="gc"> </div>
                            <p><?= strip_tags(substr($item['Content'],0,300)) ?></p>
                        <div class="content-2">
                            <p><i class="fa fa-paper-plane-o"></i> <?= $item['Author'] ?></p>
                            <p><i class="fa fa-calendar"></i> <?= $item['Posting'] ?></p>
                        </div>
                        <div class="more"> 
                            <a href="posts?ID=<?= $item['ID'] ?>"> Xem thêm <i class="fa fa-long-arrow-right"></i></a> 
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <style>
                    .container > .more > a{
                        padding: 7px 12px !important;
                        margin: 0 7px;
                        font-size: 18px;
                    }

                    a.color-1 {
                        background-color: #ddd !important;
                        color: #333 !important;
                    }

                    a.color-2 {
                        color: white !important;
                        background-color:#e94b00 !important;
                    }

                    .container > .more > a:hover{
                        background-color: #e94b00 !important;
                        color: white !important;
                    }
                </style>
                <div class="more">
                    <?php
                        if ($Count > 10)
                        {
                            if ($Count <= 20) 
                                if ($Current == 0) { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-2">1</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-1">2</a>
                                <?php }
                                else { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-1">1</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-2">2</a>
                                <?php }
                            if ($Count > 20 && $Count <= 30){ 
                                if ($Current == 0) { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-2">1</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-1">2</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=2" class="color-1">3</a>
                                <?php }
                                else if ($Current == 1) { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-1">1</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-2">2</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=2" class="color-1">3</a>
                                <?php }
                                else { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-1">1</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-1">2</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=2" class="color-2">3</a>
                                <?php }
                            }
                            if ($Count > 30){
                                if ($Count <= 40 && $Current == 3){ ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-1">&#10092;&#10092;</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-1">2</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=2" class="color-2">3</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=3" class="color-1">4</a>
                                <?php }
                                else if($Count > 40 && $Count <= 50 && $Current == 3) { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-1">&#10092;&#10092;</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-1">2</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=2" class="color-2">3</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=3" class="color-1">4</a>
                                <?php }
                                else if($Count > 40 && $Count <= 50 && $Current == 4) { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=0" class="color-1">&#10092;&#10092;</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=1" class="color-1">2</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=2" class="color-1">3</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=3" class="color-2">4</a>
                                <?php }
                                else if ( (intval($Current)+1)*10 < $Count && $Count < (intval($Current)+2)*10 ) { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current - 2 ?>" class="color-1">&#10092;&#10092;</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current - 1 ?>" class="color-1"><?= $Current - 1 ?></a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current ?>" class="color-2"><?= $Current ?></a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current + 1 ?>" class="color-1"><?= $Current + 1 ?></a>
                                <?php }
                                else if ((intval($Current)+1)*10 > $Count){ ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current - 3 ?>" class="color-1">&#10092;&#10092;</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current - 2 ?>" class="color-1"><?= $Current - 2 ?></a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current - 1 ?>" class="color-1"><?= $Current - 1 ?></a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current ?>" class="color-2"><?= $Current ?></a>
                                <?php }
                                else { ?>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current - 2 ?>" class="color-1">&#10092;&#10092;</a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current - 1 ?>" class="color-1"><?= $Current - 1 ?></a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current ?>" class="color-2"><?= $Current ?></a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current + 1 ?>" class="color-1"><?= $Current + 1 ?></a>
                                    <a href="moreposts?Status=<?= $Status ?>&Limit=<?= $Current + 2 ?>" class="color-1">&#10093;&#10093;</a>
                                <?php }
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>

                
    <?= $footer ?>
</body>

</html>