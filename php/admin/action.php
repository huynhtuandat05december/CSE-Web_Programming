<?php
$action = isset($_POST['action']) ? $_POST['action'] : "";;

require_once "config.php";


// Login phase
if ($action == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT password FROM admin WHERE username=?';

    echo login($mysqli, $sql, $username, $password);
}
function login($mysqli, $sql, $username, $password)
{
    $param_username = NULL;
    $admin_password = NULL;
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('s', $param_username);

        $param_username = $username;

        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($admin_password);
            if ($stmt->fetch()) {
                if ($stmt->num_rows == 0) {
                    return "Wrong username!";
                }
                if ($password != $admin_password) {
                    return "Wrong password!";
                } else {
                    session_start();
                    $_SESSION['admin'] = $username;
                    return "Login successfully!";
                }
            } else {
                return "SQL fetch incorrectly!";
            }
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
///////////////////////////////////////

// Edit profile phase
if ($action == "edit_profile") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $url = $_POST['url'];
    $birthday = $_POST['birthday'];

    echo changeProfile($mysqli, $fullname, $email, $phone, $url, $birthday);
}
function changeProfile($mysqli, $fullname, $email, $phone, $url, $birthday)
{
    $param_username = $param_fullname = $param_email = $param_phone  = $param_url = $param_birthday = NULL;
    session_start();
    $admin = $_SESSION['admin'];
    $sql = "UPDATE admin SET email=?, full_name=?,url=?, telephone=?, date_of_birth=? WHERE username = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ssssss', $param_email, $param_fullname, $param_phone, $param_url, $param_birthday, $param_username);

        $param_username = $admin;
        $param_fullname = $fullname;
        $param_email = $email;
        $param_phone  = $phone;
        $param_url = $url;
        $param_birthday = $birthday;

        if ($stmt->execute()) {
            return "Change profile successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
//////////////////////////////////////////////

//Change password
if ($action == "change_password") {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    echo changePassword($mysqli, $oldPassword, $newPassword);
}
function changePassword($mysqli, $oldPassword, $newPassword)
{
    $param_username = $admin_password = NULL;
    session_start();
    $username = $_SESSION['admin'];

    $sql = "SELECT password FROM admin WHERE username=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('s', $param_username);

        $param_username = $username;

        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($admin_password);
            if ($stmt->fetch()) {
                if ($oldPassword != $admin_password) {
                    return "Wrong password!";
                } else {
                    return updatePassword($mysqli, $username, $newPassword);
                }
            } else {
                return "SQL fetch incorrectly!";
            }
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
function updatePassword($mysqli, $username, $password)
{
    $param_username = $param_password = NULL;
    $sql = "UPDATE admin SET password=? WHERE username=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ss', $param_password, $param_username);

        $param_username = $username;
        $param_password = $password;

        if ($stmt->execute()) {
            return "Change password successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
////////////////////////////////////////

//Log out
if ($action == "logout") {
    logout();
}
function logout()
{
    session_start();
    unset($_SESSION["admin"]);
    session_destroy();
}
///////////////////////////////

// Change info
if ($action == "change_info") {
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $detail = $_POST['detail'];

    echo changeInfo($mysqli, $address, $phone, $email, $detail);
}
function changeInfo($mysqli, $address, $phone, $email, $detail)
{
    $param_address = $param_email = $param_phone  = $param_detail = NULL;

    $sql = "UPDATE information SET address=?, email=?, phone=?, detail=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ssss', $param_address, $param_email, $param_phone, $param_detail);

        $param_address = $address;
        $param_email = $email;
        $param_phone  = $phone;
        $param_detail = $detail;

        if ($stmt->execute()) {
            return "Change information successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
/////////////////////////////////////USER//////////////////////////////////////////////

//Add user
if ($action == "add_user") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];
    $url = $_POST['url'];
    $phone = $_POST['telephone'];
    $birthday = $_POST['birthday'];

    echo addUser($mysqli, $username, $email, $password, $full_name, $url, $phone, $birthday);
}

function addUser($mysqli, $username, $email, $password, $full_name, $url, $phone, $birthday)
{
    $param_password = $param_username = $param_email = $param_fullname = $param_url = $param_telephone = $param_birthday = NULL;
    $sql = "INSERT INTO users (username, password, email, full_name, url, telephone,date_of_birth) VALUES (?,?,?,?,?,?,?)";
    $mysqli->prepare($sql);
    if ($stmt = $mysqli->prepare($sql)) {

        $stmt->bind_param('sssssss', $param_username, $param_password, $param_email, $param_fullname, $param_url, $param_telephone, $param_birthday);
        $param_username = $username;
        $param_password = $password;
        $param_email = $email;
        $param_fullname = $full_name;
        $param_url = $url;
        $param_telephone = $phone;
        $param_birthday = $birthday;


        if ($stmt->execute()) {
            return "Add new user successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}

// Edit user
if ($action == "edit_user") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $full_name = $_POST['fullname'];
    $url = $_POST['url'];
    $telephone = $_POST['telephone'];
    $date_of_birth = $_POST['date_of_birth'];
    echo editUser($mysqli, $id, $username, $email, $full_name, $url, $telephone, $date_of_birth);
}

function editUser($mysqli, $id, $username, $email, $full_name, $url, $telephone, $date_of_birth)
{
    $param_username = $param_email = $param_fullname = $param_url = $param_telephone = $param_birthday = $param_id = NULL;
    $sql = "UPDATE users SET email=?, full_name=?,url=?,telephone=?,date_of_birth=? WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param(
            'sssssi',
            $param_email,
            $param_fullname,
            $param_url,
            $param_telephone,
            $param_birthday,
            $param_id
        );

        $param_email = $email;
        $param_fullname = $full_name;
        $param_url = $url;
        $param_telephone  = $telephone;
        $param_birthday = $date_of_birth;
        $param_id = $id;
        if ($stmt->execute()) {
            return "Change user information successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}

// Delete user
if ($action == "delete_user") {
    $id = $_POST['id'];
    echo deleteUser($mysqli, $id);
}

function deleteUser($mysqli, $id)
{
    $param_id = NULL;
    $sql = "DELETE FROM users WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $param_id);

        $param_id = $id;

        if ($stmt->execute()) {
            $mysqli->query("ALTER TABLE users AUTO_INCREMENT=1");
            return "Delete user successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}

///////////////////////////////////STAFF////////////////////////////////////////////
// Add staff
if ($action == "add_staff") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $profile = $_POST['profile'];
    $phone = $_POST['phone'];
    $detail = $_POST['detail'];
    echo addStaff($mysqli, $name, $email, $profile, $phone, $detail);
}

function addStaff($mysqli, $name, $email, $profile, $phone, $detail)
{
    $param_name = $param_email = $param_profile = $param_phone = $param_detail = NULL;

    $stmt = $mysqli->prepare("INSERT INTO staff (name, profile, email, phone, detail) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param(
            'sssss',
            $param_name,
            $param_profile,
            $param_email,
            $param_phone,
            $param_detail,
        );

        $param_name = $name;
        $param_profile = $profile;
        $param_email = $email;
        $param_phone = $phone;
        $param_detail = $detail;
        if ($stmt->execute()) {
            return "Add staff successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
// Edit staff
if ($action == "edit_staff") {
    $name = $_POST['name'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $url = $_POST['url'];
    $detail = $_POST['detail'];

    $id = $_POST['id'];
    echo editStaff($mysqli, $id, $name, $profile, $email, $phone, $url, $detail);
}
function editStaff($mysqli, $id, $name, $profile, $email, $phone, $url, $detail)
{
    $param_name = $param_profile = $param_email = $param_phone =  $param_detail = $param_url = $param_id = NULL;
    $sql = "UPDATE staff SET name=?,profile=?, email=?,phone=?,url=?,detail=? where id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param(
            'ssssssi',
            $param_name,
            $param_profile,
            $param_email,
            $param_phone,
            $param_url,
            $param_detail,
            $param_id
        );

        $param_name = $name;
        $param_profile = $profile;
        $param_email = $email;
        $param_phone = $phone;
        $param_url = $url;
        $param_detail = $detail;

        $param_id = $id;
        if ($stmt->execute()) {
            return "Change staff information successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}

//Delete staff
if ($action == "delete_staff") {
    $id = $_POST['id'];
    echo deleteStaff($mysqli, $id);
}
function deleteStaff($mysqli, $id)
{
    $param_id = NULL;
    $sql = "DELETE FROM staff WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $param_id);

        $param_id = $id;

        if ($stmt->execute()) {
            $mysqli->query("ALTER TABLE staff AUTO_INCREMENT=1");
            return "Delete staff successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
///////////////////////////////PRODUCT////////////////////////////////////////
// Add product
if ($action == "add_product") {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $type = $_POST['type'];
    $url = $_POST['url'];
    $price = $_POST['price'];


    echo addProduct($mysqli, $name, $author, $type, $url, $price);
}

function addProduct($mysqli, $name, $author, $type, $url, $price)
{
    $param_name = $param_author = $param_url = $param_type = $param_price = NULL;
    $sql = "INSERT INTO product(name, author, type, url, price) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param(
            'ssssi',
            $param_name,
            $param_author,
            $param_type,
            $param_url,
            $param_price
        );
        $param_name = $name;
        $param_author = $author;
        $param_url = $url;
        $param_type  = $type;
        $param_price = $price;
        if ($stmt->execute()) {
            return "Add product successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
// Edit product
if ($action == "edit_product") {
    $new_id = $_POST['new_id'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $type = $_POST['type'];
    $url = $_POST['url'];
    $price = $_POST['price'];

    echo changeProduct($mysqli, $new_id, $name, $author, $type, $url, $price);
}

function changeProduct($mysqli, $new_id, $name, $author, $type, $url, $price)
{
    $param_name = $param_author = $param_type  = $param_url = $param_price = $id = NULL;
    $sql = "UPDATE product SET name=?,author=?, type=?, url=?, price=? WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ssssii', $param_name, $param_author, $param_type, $param_url, $param_price, $id);

        $param_name = $name;
        $param_author = $author;
        $param_type  = $type;
        $param_url = $url;
        $param_price = $price;
        $id = $new_id;
        if ($stmt->execute()) {
            return "Change product information successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}

//Delete products
if ($action == "delete_product") {
    $id = $_POST['id'];
    echo deleteProduct($mysqli, $id);
}
function deleteProduct($mysqli, $id)
{
    $param_id = NULL;
    $sql = "DELETE FROM product WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $param_id);

        $param_id = $id;

        if ($stmt->execute()) {
            $mysqli->query("ALTER TABLE product AUTO_INCREMENT=1");
            return "Delete product successfully!\n" . deleteCommentWithProductId($mysqli, $id);;
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}
function deleteCommentWithProductId($mysqli, $product_id)
{
    $param_product_id = NULL;
    $sql = "DELETE FROM comment WHERE product_id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $param_product_id);

        $param_product_id = $product_id;

        if ($stmt->execute()) {
            return "Delete comment with product_id = " . $product_id . " successfully!";
        } else {
            return "SQL executed incorrectly!";
        }
    } else {
        return "SQL prepared incorrectly!";
    }
}

//Delete comment
if ($action == "delete_comment") {
    $id = $_POST['id'];
    echo deleteComment($mysqli, $id);
}

function deleteComment($mysqli, $id)
{
    $param_id = NULL;
    $sql = "DELETE FROM comment WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $param_id);
    $param_id = $id;
    if ($stmt->execute()) {
        $mysqli->query("ALTER TABLE comment AUTO_INCREMENT=1");
        return "Delete comment successfully!";
    } else {
        return "SQL executed incorrectly!!!";
    }
}
///////////////////////////////
