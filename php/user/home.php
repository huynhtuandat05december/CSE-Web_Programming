<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

    <title>Homepage</title>
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
                        <a href="home.php" class="nav-link nav-link-hover active-item">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link nav-link-hover">About</a>
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
    <!--Intro Section-->
    <div id="home" class="intro justify-content-center align-items-center d-flex">
        <div class="intro-overlay"></div>
        <div class="container intro-content">
            <h1 class="font-weight-bold text-white intro-title mb-4 animate__animated animate__backInDown">Bookstore
                HCMUT</h1>
            <p class="typewrite intro-subtitle" data-period="2000" data-type="[ &quot;Huỳnh Công Hải&quot;, &quot;Trương Minh Hiệp&quot;, &quot;Hoàng Vũ Tĩnh&quot;, &quot;Hồ Ngọc Trí&quot; ]">
                <span class="wrap">Huỳnh Công Hải</span>
            </p>

            <span class="wrap"></span>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<h2 class="text-white">Hi, <b>' . htmlspecialchars($_SESSION["username"]) . '!</b>. Welcome to our site.</h2></div>';
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<button class="btn btn-primary float" onclick="logout()"><i class="fa fa-arrow-right"></i></button>';
        }
        ?>
    </div>
    <!--Preloader-->
    <div id="preloader"></div>


</body>

</html>