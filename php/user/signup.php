<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already used.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
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

    <title>Sign up</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0" style="background-image: url('/assets/img/login-bg.jpg'); background-size: cover;">
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
            <div class="line-break"></div>
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

    <!---------Login form-->
    <div class="intro-overlay"></div>
    <div class="main d-flex justify-content-center align-items-center flex-column flex-wrap">
        <div class="login-container right-panel-active" id="container">
            <div class="form-container sign-up-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <!-- fix -->
                    <h1 class="font-weight-bold">Create Account</h1>
                    <img src="/assets/img/hcmut.png">

                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> " style="margin-bottom: 0;">
                        <!-- fix -->
                        <input type="text" name="username" class="form-control animate__animated" id="username" placeholder="Username" required data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $username; ?>"> <!-- fix -->

                    </div>
                    <span class="text-danger"><?php echo $username_err; ?></span> <!-- fix -->
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" style="margin-bottom: 0;">
                        <!-- fix -->
                        <input type="password" name="password" class="form-control animate__animated" id="new-password-change" placeholder="Password" required data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $password; ?>"> <!-- fix -->
                    </div>
                    <span class="text-danger"><?php echo $password_err; ?></span> <!-- fix -->

                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" style="margin-bottom: 0;">
                        <!-- fix -->
                        <input type="password" name="confirm_password" class="form-control animate__animated" id="confirm-password-change" required placeholder="Confirm Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" onkeyup="validateConfirm()" value="<?php echo $confirm_password; ?>"> <!-- fix -->
                    </div>
                    <span class="text-danger mb-3" id="confirmErr"><?php echo $confirm_password_err; ?></span> <!-- fix -->

                    <button class="btn btn-outline-primary btn-rounded px-5">Sign Up</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="text-white">Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <p style="font-style:italic;">Already have an account? Log in now!</p>
                        <button class="btn btn-primary btn-rounded px-5 ghost" onclick="directLogin()">Log in</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Preloader-->
    <div id="preloader"></div>






</body>

</html>