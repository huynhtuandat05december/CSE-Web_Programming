<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} ?>

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

    <title>User information</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0">
    <!--Header / Navbar-->
    <nav id="mainNav" class="navbar navbar-expand-md fixed-top animate__animated animate__slideInDown">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <?php
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
                        <a href="contact.php" class="nav-link nav-link-hover ">Contact</a>
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
                                    <div class="col-md-12">
                                        <div class="mb-5">
                                            <h5 class="title-left">
                                                User information
                                            </h5>
                                        </div>
                                        <?php
                                        //Get data from database
                                        require_once "config.php";
                                        $username = $_SESSION['username'];

                                        $sql = 'SELECT username, password, email, full_name, url, telephone, date_of_birth FROM users WHERE username = ?';
                                        if ($stmt = $mysqli->prepare($sql)) {
                                            $stmt->bind_param("s", $param_username);
                                            $param_username = $username;

                                            if ($stmt->execute()) {
                                                $stmt->store_result();
                                                $stmt->bind_result($username, $hashed_password, $email, $full_name, $url, $telephone, $date_of_birth);
                                                $stmt->fetch();
                                            }
                                        }
                                        ?>
                                        <div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row align-items-center">
                                                            <label for="username" class="col-2 col-form-label"><strong>Username</strong></label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="text" value="<?php echo $username ?>" id="username" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row align-items-center">
                                                            <label for="password" class="col-2 col-form-label"><Strong>Password</strong></label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="password" value="password" id="password" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-10"><a href="#" data-toggle="modal" data-target="#passwordModal" class="text-primary" style="font-style:italic;">Change password?</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row align-items-center">
                                                            <label for="full-name" class="col-2 col-form-label"><strong>Full name</strong></label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="text" value="<?php echo $full_name ?>" id="full-name" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row align-items-center">
                                                            <label for="email" class="col-2 col-form-label"><strong>Email</strong></label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="email" value="<?php echo $email ?>" id="email" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row align-items-center">
                                                            <label for="url" class="col-2 col-form-label"><strong>URL</strong></label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="url" value="<?php echo $url ?>" id="url" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row align-items-center">
                                                            <label for="telephone" class="col-2 col-form-label"><strong>Telephone</strong></label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="tel" value="<?php echo $telephone; ?>" id="telephone" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row align-items-center">
                                                            <label for="birthday" class="col-2 col-form-label"><Strong>Date of birth</strong></label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="date" value="<?php echo $date_of_birth; ?>" id="birthday" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center mb-3">
                                                        <div class="sent-message" id="message-box">Your information has been changed!!!
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-md-12 text-center" id="button-group">
                                                <button class="btn btn-outline-primary btn-lg btn-rounded" onclick="edit_information()">Edit information</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Change password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row align-items-center">
                                <label for="password-change" class="col-2 col-form-label"><strong>Current password</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="password" value="" id="password-change">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="new-password-change" class="col-2 col-form-label"><strong>New password</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="password" value="" id="new-password-change">
                                </div>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="confirm-password-change" class="col-2 col-form-label"><strong>Confirm password</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="password" value="" id="confirm-password-change" onkeyup="validateConfirm()">
                                </div>
                                <span class="text-danger" id="confirmErr"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="changepassword()">Save changes</button>
                    </div>
                </div>
            </div>
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