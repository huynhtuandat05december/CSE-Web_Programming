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

<body data-new-gr-c-s-check-loaded="8.867.0">
    <!--Header / Navbar-->
    <nav id="mainNav" class="navbar navbar-expand-md fixed-top animate__animated animate__slideInDown">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <?php
                session_start();
                if (!isset($_SESSION['username'])) {
                    echo '<button class="login-btn btn btn-outline-primary" onclick="directLogin()">Login</button>';
                } else {
                    echo "<button style='font-size:24px' class='btn btn-outline-primary btn-rounded' onclick='directInformation()'><i class='fas fa-user-circle'></i></button>";
                }
                ?>
            </div>
            <a href="index.php" class="navbar-brand font-weight-bold" id="projectName">Bookstore</a>
            <button type="button" class="btn" data-toggle="collapse" data-target="#navbarDefault"><i class="material-icons" id="nav-icon">menu</i></button>
            <div id="navbarDefault" class="navbar-collapse collapse justify-content-center align-items-center">
                <ul class="nav navbar-nav text-uppercase font-weight-bold">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link nav-link-hover">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link nav-link-hover">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="categories.php" class="nav-link nav-link-hover active-item">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="products.php" class="nav-link nav-link-hover">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link nav-link-hover">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="service" class="services-mf pt-5 route">
        <div class="container">
            <div class="row animate__animated animate__fadeInDown">
                <div class="col-sm-12">
                    <div class="service-box">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Book Store
                            </h3>
                            <p class="subtitle-a">
                                Categories
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animate__animated animate__fadeInLeftBig">
                    <a href="products.php?type=Domestic book">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="ion-ios-book"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Domestic books</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate__animated animate animate__fadeInDownBig">
                    <a href="products.php?type=International">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="ion-ios-bookmarks"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">International books</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInRightBig">
                    <a href="products.php?type=Electronics">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="ion-ios-camera"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Electronics</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animate__animated animate__fadeInLeftBig">
                    <a href="products.php?type=Souvenirs">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="ion-android-car"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Toys</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInUpBig">
                    <a href="products.php?type=Stationary">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="ion-calculator"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">Stationary</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInRightBig">
                    <a href="products.php?type=Toys">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle">
                                    <i class="ion-calendar"></i>
                                </span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">souvenirs</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    <?php
    if (isset($_SESSION['username'])) {
        echo '<button class="btn btn-primary float" onclick="logout()"><i class="fa fa-arrow-right"></i></button>';
    }
    ?>
    <!--Preloader-->
    <div id="preloader"></div>
</body>

</html>