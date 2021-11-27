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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!--Animation.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>Contact</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0" style="background-image:url('https://images.unsplash.com/photo-1501676491272-7bbd3e71f7e1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=838&q=80'); background-attachment: fixed; background-size: cover;">
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
            <a href="index.php" class="navbar-brand font-weight-bold" id="projectName">Apple store</a>
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
    <!--Contact Section-->
    <div class="section d-flex justify-content-center" id="contact-section">
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="contact" class="box-shadow-full animate__animated animate__rotateInDownLeft">
                            <div class="row">
                                <div id="send-message-us" class="col-md-6 d-none animate__animated animate__slideInRight">
                                    <div class="mb-4">
                                        <p class="title-left">
                                            Send Message Us
                                        </p>
                                    </div>
                                    <div style="width: 90%;">
                                        <form>
                                            <div class="row d-flex justify-content-center">
                                                <div class="form-group mb-1" style="width: 100%;">
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                                    <div class="validate" id="validateName"></div>
                                                </div>
                                                <div class="form-group mb-1" style="width: 100%;">
                                                    <input type="email" class="form-control animate__animated" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                                    <div class="validate" id="validateEmail"></div>
                                                </div>
                                                <div class="form-group mb-1" style="width: 100%;">
                                                    <input type="text" class="form-control animate__animated" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                                                    <div class="validate" id="validateSubject"></div>
                                                </div>
                                                <div class="form-group mb-1" style="width: 100%;">
                                                    <textarea class="form-control animate__animated my-2" name="message" id="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                                    <div class="validate" id="validateMessage"></div>
                                                </div>
                                                <div class="sent-message mb-3" id="message-box">
                                                    Your message has been sent. Thank you!
                                                </div>
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-outline-info btn-lg btn-send-message" onclick="return validateData()">
                                                Send
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="get-in-touch" class="col-md-12">
                                    <div class="title-box-2 pt-4 pt-md-0">
                                        <p class="title-left">
                                            Get in Touch
                                        </p>
                                    </div>
                                    <?php
                                    require_once "config.php";

                                    //Display information
                                    $sql = "SELECT * FROM information";

                                    if ($stmt = $mysqli->prepare($sql)) {
                                        if ($stmt->execute()) {
                                            $stmt->store_result();

                                            $stmt->bind_result($detail, $address, $phone, $email);

                                            while ($stmt->fetch()) {
                                    ?>
                                                <div>
                                                    <p style="font-size: 1rem;">
                                                        <?= $detail ?>
                                                    </p>
                                                    <div class="list-icon">
                                                        <div>
                                                            <span>Address:</span>
                                                            <div><?= $address ?></div>
                                                        </div>
                                                        <div>
                                                            <span>Phone:</span>
                                                            <div><?= $phone ?></div>
                                                        </div>
                                                        <div>
                                                            <span>Email:</span>
                                                            <div><?= $email ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="socials my-3">
                                                    <div class="d-flex justify-content-between" style="width: 80%;">
                                                        <div><a href="https://www.facebook.com/"><span class="ico-circle"><i class="fab fa-facebook-f"></i></span></a>
                                                            <span class="d-none d-sm-inline-block">Facebook</span>
                                                        </div>
                                                        <div><a href="https://www.instagram.com/"><span class="ico-circle"><i class="fab fa-instagram"></i></span></a>
                                                            <span class="d-none d-sm-inline-block">Instagram</span>
                                                        </div>
                                                        <div>
                                                            <a href="https://twitter.com/"><span class="ico-circle"><i class="fab fa-twitter"></i></span></a>
                                                            <span class="d-none d-sm-inline-block">Twitter</span>
                                                        </div>
                                                        <div>
                                                            <a href="https://youtube.com/"><span class="ico-circle"><i class="fab fa-youtube"></i></span></a>
                                                            <span class="d-none d-sm-inline-block">Youtube</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center"><button id="toggle-send-message" class="btn btn-primary" onclick="openSendMessage()">Please send message us...</button></div>
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
        </section>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<button class="btn btn-primary float" style="border-color: #7200cf" onclick="logout()"><i class="fa fa-arrow-right"></i></button>';
        }
        ?>
    </div>
    <!--Preloader-->
    <div id="preloader"></div>
    <!-- Script -->
    <script src="/assets/js/main.js"></script>
</body>

</html>