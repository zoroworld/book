<?php
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$countUrl = count($parts);
$urlidx = $parts[$countUrl - 1];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Author Meta -->
    <meta name="author" content="<?php echo $author ?>">
    <!-- Meta Description -->
    <meta name="description" content="<?php echo $description ?>">
    <!-- Meta Keyword -->
    <meta name="keywords" content="<?php echo $keywords ?>">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title><?php echo $siteTitle ?></title>


    <!-- include boostrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- include owl slider css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- include light box css-->
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="assets/css/font-awesome_all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- MY CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<style>

</style>

<body>
    <div class="preloader">
        <img src="loader.gif" alt="Computer man">
    </div>
    <header id="header" class="header">
        <div class="container">
            <div class="navbar-container">
                <nav class="navbar-eccom navbar navbar-expand-lg">
                    <div id="logo">
                        <h3 class="text-white"><strong>.BOOKLED.</strong></h3>
                        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" title="" /></a> -->
                    </div>
                    <button class="navbar-ecomm-btn btn-nav-tg navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="newwork-phone">
                        <ul>
                            <li>
                                <a href="cart" class="head-cart position-relative">
                                    <i class="fa-solid fa-cart-shopping fa-xl"></i>
                                    <span class="cart-num position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        99+
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-eccom-collapse  collapse navbar-collapse" id="navbarText">
                        <div class="navbar-eccom-collapse-contain">
                            <ul class="nav-menu">
                                <li class="<?php echo ($urlidx == "") ? "menu-active" : ""; ?>"><a href="./">Home</a></li>
                                <li class="<?php echo ($urlidx == "about") ? "menu-active" : ""; ?>"><a href="about">About</a></li>
                                <li class="<?php echo ($urlidx == "publisher") ? "menu-active" : ""; ?>"><a href="publisher">Publisher</a></li>
                                <li class="<?php echo ($urlidx == "buy") ? "menu-active" : ""; ?>"><a href="buy">Buy Book</a></li>
                                <li class="<?php echo ($urlidx == "contact") ? "menu-active" : ""; ?>"><a href="contact">Contact</a></li>
                                <!-- <li class="menu-has-children"><a href="">Pages</a>
                                <ul>
                                    <li><a href="generic.html">Generic</a></li>
                                    <li><a href="elements.html">Elements</a></li>
                                </ul>
                            </li> -->
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="newwork-desktop">
                    <ul>
                        <li>
                            <a href="cart" class="head-cart position-relative">
                                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                                <span class="cart-num position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php
                                    echo $productOrderEmpty;
                                    ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>