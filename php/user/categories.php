<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Icon CSS-->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!--Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Style file-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/main.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!--Animation.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>Categories</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0" style="background-image:url('https://images.unsplash.com/photo-1517336714731-489689fd1ca8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=726&q=80'); background-attachment: fixed; background-size: cover;">
    <!--Header / Navbar-->
    <?php
    $active_page = 'categories';
    require_once 'header.php';
    ?>
    <section id="service" class="services-mf">
        <div class="container">
            <div class="row animate__animated animate__fadeInDown">
                <div class="col-sm-12">
                    <div class="service-box">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                <i class="fab fa-apple"></i>
                                Apple Store
                            </h3>
                            <p class="subtitle-a">
                                Categories
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animate__animated animate__fadeInLeftBig">
                    <a href="products.php?type=imac">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="fas fa-desktop"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Imac</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate__animated animate animate__fadeInDownBig">
                    <a href="products.php?type=macbook">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="fas fa-laptop"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Macbook</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInRightBig">
                    <a href="products.php?type=iphone">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="fas fa-mobile-alt"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Iphone</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 animate__animated animate__fadeInLeftBig">
                    <a href="products.php?type=ipad">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="fas fa-tablet-alt"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Ipad</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInUpBig">
                    <a href="products.php?type=accessories">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="far fa-keyboard"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Accessories</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    <!--Preloader-->
    <div id="preloader"></div>
</body>

</html>