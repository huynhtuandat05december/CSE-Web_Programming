<?php
session_start();
require_once "config.php";
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Import lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- End import lib -->



</head>

<body class="overlay-scrollbar">
    <!-- navbar -->
    <div class="navbar" style="position:fixed;">
        <!-- nav left -->
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item mx-2" style="line-height:0;">
                <a class="nav-link">
                    <i class="fas fa-bars" onclick="collapseSidebar()"></i>
                </a>
            </li>
            <li class="nav-item" id="mangeLogo">
                Management
            </li>
        </ul>
        <!-- end nav left -->
        <!-- form -->
        <form class="navbar-search">
            <input type="text" name="Search" class="navbar-search-input" placeholder="What you looking for...">
            <i class="fas fa-search"></i>
        </form>
        <!-- end form -->
        <!-- nav right -->
        <ul class="navbar-nav nav-right d-flex flex-row align-items-center justify-content-between">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="user-img" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="../../assets/img/user.png" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="user-img" style="position: absolute;left: auto;">
                    <a class="dropdown-item" href="#"><i class="fas fa-cog" style="padding-right: 20px;"></i>Settings</a>
                    <a class="dropdown-item" href="#" onclick="logOut()"><i class="fas fa-sign-out-alt" style="padding-right: 20px;"></i>Log out</a>
                </div>
            </li>
        </ul>
        </ul>
        <!-- end nav right -->
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div class="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="dashboard.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="user.php" class="sidebar-nav-link  active  ">
                    <div>
                        <i class="fas fa-user-alt"></i>
                    </div>
                    <span>User</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="staff.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <span>Staff</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="product.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-dice-d6"></i>
                    </div>
                    <span>Product</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="contact.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-comment"></i>
                    </div>
                    <span>Contact</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->


    <!-- main content -->
    <div class="wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="counter bg-primary">
                    <p>
                        <i class="fas fa-user-alt"></i>
                    </p>
                    <?php
                    $sql = "SELECT COUNT(id) FROM users";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($number_user);
                    $stmt->fetch();
                    ?>
                    <h3><?php echo $number_user; ?></h3>
                    <p>Users</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 id="titleTable">
                            User table
                        </h3>
                    </div>
                    <div class="card-content">
                        <table class="table-stripped">
                            <tr>
                                <th>ID</th>
                                <th>User name</th>

                                <th>Email</th>
                                <th>Full name</th>
                                <th>URL</th>
                                <th>Telephone</th>
                                <th>Date of birth</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php
                            require_once "config.php";


                            //Display all categories
                            $user = array();
                            $sql = "SELECT * FROM users WHERE 1";

                            if ($stmt = $mysqli->prepare($sql)) {
                                if ($stmt->execute()) {
                                    $stmt->store_result();

                                    $stmt->bind_result(
                                        $id,
                                        $username,
                                        $password,
                                        $email,
                                        $full_name,
                                        $url,
                                        $telephone,
                                        $date_of_birth,
                                        $created_at
                                    );
                                    while ($stmt->fetch()) {
                                        array_push($user, array($id, $username, $email, $full_name, $url, $telephone, $date_of_birth))
                            ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $username ?></td>

                                            <td><?php echo $email ?></td>
                                            <td><?php echo $full_name ?></td>
                                            <td><?php echo $url ?></td>
                                            <td><?php echo $telephone ?></td>
                                            <td><?php echo $date_of_birth ?></td>
                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#userEditModal<?php echo $id ?>">Edit</button></td>
                                            <td><button class="btn btn-danger" onclick="deleteUser(<?php echo $id ?>)">Delete</button></td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </table>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-dark mx-3" data-toggle="modal" data-target="#userModal">Add new user</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add user-->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add new user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row align-items-center">
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="username" class="col-2 col-form-label"><strong>Username</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="username">
                            </div>
                            <span class="text-danger" id="usernameErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="password" class="col-2 col-form-label"><strong>Password</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="password">
                            </div>
                            <span class="text-danger" id="passwordErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="email" class="col-2 col-form-label"><strong>Email</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="" id="email">
                            </div>
                            <span class="text-danger" id="emailErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="full-name" class="col-2 col-form-label"><strong>Full name</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="full-name">
                            </div>
                            <span class="text-danger" id="fullnameErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="url" class="col-2 col-form-label"><strong>URL</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="url" value="" id="url">
                            </div>
                            <span class="text-danger" id="urlErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="telephone" class="col-2 col-form-label"><strong>Telephone</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="telephone">
                            </div>
                            <span class="text-danger" id="telephoneErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="birthday" class="col-2 col-form-label"><strong>Birthday</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="" id="birthday">
                            </div>
                            <span class="text-danger" id="birthdayErr"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="addUser()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <?php for ($index = 0; $index < count($user); $index++) {
    ?>
        <!-- Modal edit user-->
        <div class="modal fade" id="userEditModal<?php echo $user[$index][0]; ?>" tabindex="-1" role="dialog" aria-labelledby="userEditModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Edit user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row align-items-center">
                                <label for="id-edit-<?php echo $user[$index][0]; ?>" class="col-2 col-form-label"><strong>ID</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $user[$index][0]; ?>" id="id-edit-<?php echo $user[$index][0]; ?>" disabled>
                                </div>
                                <span class="text-danger" id="idErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="username-edit-<?php echo $user[$index][0]; ?>" class="col-2 col-form-label"><strong>Username</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $user[$index][1]; ?>" id="username-edit-<?php echo $user[$index][0]; ?>" disabled>
                                </div>
                                <span class="text-danger" id="usernameErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="email-edit-<?php echo $user[$index][0]; ?>" class="col-2 col-form-label"><strong>Email</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="email" value="<?php echo $user[$index][2]; ?>" id="email-edit-<?php echo $user[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="emailErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="full-name-edit-<?php echo $user[$index][0]; ?>" class="col-2 col-form-label"><strong>Full name</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $user[$index][3]; ?>" id="full-name-edit-<?php echo $user[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="fullnameErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="url-edit-<?php echo $user[$index][0]; ?>" class="col-2 col-form-label"><strong>URL</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="url" value="<?php echo $user[$index][4]; ?>" id="url-edit-<?php echo $user[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="urlErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="telephone-edit-<?php echo $user[$index][0]; ?>" class="col-2 col-form-label"><strong>Telephone</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $user[$index][5]; ?>" id="telephone-edit-<?php echo $user[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="telephoneErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="birthday-edit-<?php echo $user[$index][0]; ?>" class="col-2 col-form-label"><strong>Birthday</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="date" value="<?php echo $user[$index][6]; ?>" id="birthday-edit-<?php echo $user[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="birthdayErr"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="editUser(<?php echo $user[$index][0]; ?>)">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- end main content -->
    <!-- import script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="js/home.js"></script>
    <!-- end import script -->
</body>

<!-- import script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="../../assets/js/admin.js"></script>
<!-- end import script -->


</html>