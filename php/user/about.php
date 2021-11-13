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

    <!--Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Style file-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/main.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!--Animation.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>About us</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0" id="page-body" style="background-image:url('assets/img/about-bg.jpg'); background-attachment: fixed; background-size: cover;">
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
                        <a href="about.php" class="nav-link nav-link-hover active-item">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="categories.php" class="nav-link nav-link-hover">Categories</a>
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
    <!--Abput section-->
    <section id="about" class="section sect-pt4 d-flex flex-column align-items-center mt-4">
        <!--Item 1-->
        <?php
        require_once "config.php";

        //Display staff information
        $sql = "SELECT * FROM staff";

        if ($stmt = $mysqli->prepare($sql)) {
            if ($stmt->execute()) {
                $stmt->store_result();

                $stmt->bind_result(
                    $id,
                    $name,
                    $profile,
                    $email,
                    $phone,
                    $html,
                    $css,
                    $php,
                    $javascript,
                    $detail,
                    $url
                );

                while ($stmt->fetch()) {
        ?>
                    <div class="container d-flex justify-content-center align-items-center section-mt-10 animate__animated animate__fadeInLeftBig">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box-shadow-full">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="about-img">
                                                        <?php echo '<img src="' . $url . '" class="img-fluid rounded b-shadow-a" alt="">' ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-7">
                                                    <div>
                                                        <p><span class="title-s">Name: </span> <span><?php echo $name ?></span></p>
                                                        <p><span class="title-s">Profile: </span> <span><?php echo $profile ?></span>
                                                        </p>
                                                        <p><span class="title-s">Email: </span>
                                                            <span style="word-break: break-word"><?php echo $email ?></span></p>
                                                        <p><span class="title-s">Phone: </span> <span><?php echo $phone ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="skill-mf">
                                                <p class="title-s">Skill</p>
                                                <span>HTML</span> <span class="float-right"><?php echo $html ?>%</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width:<?php echo $html ?>%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span>CSS3</span> <span class="float-right"><?php echo $css ?>%</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $css ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span>PHP</span> <span class="float-right"><?php echo $php ?>%</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $php ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span>JAVASCRIPT</span> <span class="float-right"><?php echo $javascript ?>%</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width:<?php echo $javascript ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pt-4 pt-md-0">
                                                <div class="title-box-2">
                                                    <h5 class="title-left">
                                                        About me
                                                    </h5>
                                                </div>
                                                <p class="lead">
                                                    <?php echo $detail; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>

    </section>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<button class="btn btn-primary float" onclick="logout()"><i class="fa fa-arrow-right"></i></button>';
    }
    ?>
    <!--Back to to-->
    <a href="#page-body" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!--Preloader-->
    <div id="preloader"></div>
</body>

</html>