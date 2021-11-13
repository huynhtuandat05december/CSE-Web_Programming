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

    <title>Contact</title>
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
                        <a href="categories.php" class="nav-link nav-link-hover">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="products.php" class="nav-link nav-link-hover">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link nav-link-hover active-item">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Conntact Section-->
    <div class="section d-flex justify-content-center" id="contact-section" style="background-image: url(/assets/img/overlay-bg.jpg)">
        <section class="contact">
            <div class="overlay-mf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-mf">
                            <div id="contact" class="box-shadow-full animate__animated animate__rotateInDownLeft">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <h5 class="title-left">
                                                Send Message Us
                                            </h5>
                                        </div>
                                        <div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                                            <div class="validate" id="validateName"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control animate__animated" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                                            <div class="validate" id="validateEmail"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control animate__animated" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                                                            <div class="validate" id="validateSubject"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control animate__animated" name="message" id="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                                            <div class="validate" id="validateMessage"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center mb-3">
                                                        <div class="sent-message" id="message-box">Your message has been
                                                            sent. Thank you!
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-outline-primary btn-lg btn-rounded" onclick="return validateData()">Send
                                                    Message
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-box-2 pt-4 pt-md-0">
                                            <h5 class="title-left">
                                                Get in Touch
                                            </h5>
                                        </div>
                                        <?php
                                        require_once "config.php";

                                        //Display information
                                        $sql = "SELECT * FROM information";

                                        if ($stmt = $mysqli->prepare($sql)) 
                                        {
                                        if ($stmt->execute()) {
                                            $stmt->store_result();

                                            $stmt->bind_result($detail, $address, $phone, $email);
                                        
                                            while ($stmt->fetch()) {
                                        ?>
                                        <div>
                                            <p class="lead">
                                                <?php echo $detail ?>
                                            </p>
                                            <ul class="list-icon">
                                                <li><span class="material-icons">location_on</span> <?php  echo $address?></li>
                                                <li><span class="material-icons">call</span><?php echo $phone ?></li>
                                                <li><span class="material-icons">email</span><?php echo $email ?></li>
                                            </ul>
                                        </div>
                                        <div class="socials">
                                            <ul>
                                                <li><a href="https://www.facebook.com/"><span class="ico-circle"><i class="fab fa-facebook-f"></i></span></a></li>
                                                <li><a href="https://www.instagram.com/"><span class="ico-circle"><i class="fab fa-instagram"></i></span></a></li>
                                                <li><a href="https://twitter.com/"><span class="ico-circle"><i class="fab fa-twitter"></i></span></a></li>
                                                <li><a href="https://pinterest.com/"><span class="ico-circle"><i class="fab fa-pinterest-p"></i></span></a></li>
                                            </ul>
                                        </div>
                                        <?php
                                                                    }
                                                                }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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