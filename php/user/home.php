<?php
session_start();
?>

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
    <?php
    $active_page = 'home';
    require_once 'header.php'
    ?>
    <!--Intro Section-->
    <div id="home" class="intro justify-content-center align-items-center d-flex">
        <div class="intro-overlay"></div>
        <div class="container intro-content">
            <h1 class="font-weight-bold text-white intro-title mb-4 animate__animated animate__backInDown">Apple Store
                HCMUT</h1>
            <span class="wrap"></span>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<h2 class="text-white">Hi, <b style="color: #7200CF">' . htmlspecialchars($_SESSION["username"]) . '</b>! Welcome to our site.</h2></div>';
            }
            ?>
        </div>
    </div>
    <!--Preloader-->
    <div id="preloader"></div>


</body>

</html>