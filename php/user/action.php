<?php
require_once "config.php";
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
if ($action == 'logout') {
    session_start();
    unset($_SESSION["username"]);
    //header("Location: home.php");
    echo "home.php";
    session_destroy();
} else if ($action == "changeinfo") {
    $fullname = $_GET['fullname'];
    $email = $_GET['email'];
    $url = $_GET['url'];
    $telephone = $_GET['telephone'];
    $birthday = $_GET['birthday'];

    session_start();
    $username = $_SESSION['username'];
    //SQL
    $sql = "UPDATE users SET full_name = ?, email = ?, url = ?, telephone = ?, date_of_birth = ? WHERE username=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ssssss", $param_fullname, $param_email, $param_url, $param_telephone, $birthday, $param_username);

        //Set param
        $param_fullname = $fullname;
        $param_email = $email;
        $param_url = $url;
        $param_telephone = $telephone;
        $param_birthday = $birthday;
        $param_username = $username;

        if ($stmt->execute()) {
            echo "Update successfully!!!";
        } else {
            echo "Some things went wrong!";
        }
    }
    $stmt->close();
} else if ($action == "changepassword") {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    session_start();
    $username = $_SESSION['username'];


    $sql = "SELECT password FROM users WHERE username = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // Bind result variables
                $stmt->bind_result($hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($oldPassword, $hashed_password)) {
                        echo changePassword($mysqli, $newPassword, $username);
                    } else {
                        // Display an error message if password is not valid
                        echo "The password you entered was wrong";
                    }
                }
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
} else if ($action == "comment") {
    session_start();
    $username = $_SESSION['username'];
    $product_id = $_POST['product_id'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];

    $sql = "INSERT INTO comment(product_id, username, time,detail) VALUES (?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("isss", $param_product_id, $param_username, $param_time, $param_detail);

        $param_product_id = $product_id;
        $param_username = $username;
        $param_time = $date;
        $param_detail = $comment;
        if ($stmt->execute()) {
            echo "Send comment successfully!!!";
        } else {
            echo "Something went wrong!!!";
        }
    }
} else if ($action == "contact") {

    $name = $_GET['name'];
    $email = $_GET['email'];
    $subject = $_GET['subject'];
    $message = $_GET['message'];
    $sql = "INSERT INTO contact(name, email, subject, message) VALUES (?, ?, ?, ?)";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        $param_name = $name;
        $param_email = $email;
        $param_subject = $subject;
        $param_message = $message;
        if ($stmt->execute()) {
            echo "Send message successfully!!!";
        } else {
            echo "Something went wrong!!!";
        }
    }
}


function changePassword($mysqli, $password, $username)
{
    $param_password = $param_username = NULL;

    $sql = "UPDATE users SET password=? WHERE username=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ss", $param_password, $param_username);

        //Set param
        $param_password = $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_username = $username;

        if ($stmt->execute()) {
            return "Change password successfully!!!";
        } else {
            return "Some things went wrong!";
        }
    } else {
        return "Some things went wrong";
    }
}
