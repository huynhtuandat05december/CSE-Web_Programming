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
    <title>Staff</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="/assets/css/admin.css">
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
                    <img src="/assets/img/user.png" width="40" height="40" class="rounded-circle">
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
                <a href="user.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-user-alt"></i>
                    </div>
                    <span>User</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="staff.php" class="sidebar-nav-link active">
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
                <div class="counter bg-warning">
                    <p>
                        <i class="fas fa-user-friends"></i>
                    </p>
                    <?php
                    $sql = "SELECT COUNT(id) FROM staff";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($number_staff);
                    $stmt->fetch();
                    ?>
                    <h3><?php echo $number_staff; ?></h3>
                    <p>Staff</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 id="titleTable">
                            Staff table
                        </h3>
                    </div>
                    <div class="card-content">
                        <table class="table-stripped">
                            <tr>
                                <th>ID</th>
                                <th>Full name</th>
                                <th>Profile</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>HTML</th>
                                <th>CSS</th>
                                <th>PHP</th>
                                <th>JS</th>
                                <th>URL</th>
                                <th class="text-align:center">Detail</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <?php
                            require_once "config.php";


                            //Display all staff
                            $sql = "SELECT * FROM staff where 1";

                            $staff = array();

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
                                        array_push($staff, array($id, $name, $profile, $email, $phone, $html, $css, $php, $javascript, $url, $detail));
                            ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $profile ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $phone ?></td>
                                            <td><?php echo $html ?></td>
                                            <td><?php echo $css ?></td>
                                            <td><?php echo $php ?></td>
                                            <td><?php echo $javascript ?></td>
                                            <td><?php echo $url ?></td>
                                            <td><?php echo $detail ?></td>
                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#staffEditModal<?php echo $id ?>">Edit</button></td>
                                            <td><button class="btn btn-danger" onclick="deleteStaff(<?php echo $id ?>)">Delete</button></td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>

                        </table>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-outline-primary mx-3" data-toggle="modal" data-target="#staffModal">Add new staff</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add staff-->
    <div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="staffModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add new staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row align-items-center">
                            <label for="id" class="col-2 col-form-label"><strong>ID</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="id">
                            </div>
                            <span class="text-danger" id="idErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="name" class="col-2 col-form-label"><strong>Full name</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="name">
                            </div>
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="profile" class="col-2 col-form-label"><strong>Profile</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="profile">
                            </div>
                            <span class="text-danger" id="profileErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="email" class="col-2 col-form-label"><strong>Email</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="" id="email">
                            </div>
                            <span class="text-danger" id="emailErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="phone" class="col-2 col-form-label"><strong>Phone</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="phone">
                            </div>
                            <span class="text-danger" id="phoneErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="html" class="col-2 col-form-label"><strong>HTML</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="number" min="0" max="100" value="" id="html">
                            </div>
                            <span class="text-danger" id="htmlErr"></span>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="css" class="col-2 col-form-label"><strong>CSS</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="number" min="0" max="100" value="" id="css">
                            </div>
                            <span class="text-danger" id="cssErr"></span>
                        </div>

                        <div class="form-group row align-items-center justify-content-center">
                            <label for="php" class="col-2 col-form-label"><strong>PHP</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="number" min="0" max="100" value="" id="php">
                            </div>
                            <span class="text-danger" id="phpErr"></span>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="details" class="col-2 col-form-label"><strong>Detail</strong></label>
                            <div class="col-10">
                                <textarea class="form-control" type="" value="" id="detail"></textarea>
                            </div>
                            <span class="text-danger" id="detailErr"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addStaff()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit staff-->
    <?php
    for ($index = 0; $index < count($staff); $index++) {
    ?>
        <div class="modal fade" id="staffEditModal<?php echo $staff[$index][0]; ?>" tabindex="-1" role="dialog" aria-labelledby="staffEditModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Edit staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row align-items-center">
                                <label for="id-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>ID</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $staff[$index][0]; ?>" id="id-edit-<?php echo $staff[$index][0]; ?>" disabled>
                                </div>
                                <span class="text-danger" id="idErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="name-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>Full name</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $staff[$index][1]; ?>" id="name-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="nameErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="profile-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>Profile</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $staff[$index][2]; ?>" id="profile-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="profileErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="email-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>Email</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="email" value="<?php echo $staff[$index][3]; ?>" id="email-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="emailErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="phone-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>Phone</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $staff[$index][4]; ?>" id="phone-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="phoneErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="html-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>HTML</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="number" min="0" max="100" value="<?php echo $staff[$index][5]; ?>" id="html-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="htmlErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="css-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>CSS</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="number" min="0" max="100" value="<?php echo $staff[$index][6]; ?>" id="css-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="cssErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="php-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>PHP</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="number" min="0" max="100" value="<?php echo $staff[$index][7]; ?>" id="php-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="phpErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="javascript-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>Javascript</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="number" min="0" max="100" value="<?php echo $staff[$index][8]; ?>" id="javascript-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="phpErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="url-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>URL</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" min="0" max="100" value="<?php echo $staff[$index][9]; ?>" id="url-edit-<?php echo $staff[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="phpErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="details-edit-<?php echo $staff[$index][0]; ?>" class="col-2 col-form-label"><strong>Detail</strong></label>
                                <div class="col-10">
                                    <textarea class="form-control" type="" id="detail-edit-<?php echo $staff[$index][0]; ?>"><?php echo $staff[$index][10]; ?></textarea>
                                </div>
                                <span class="text-danger" id="detailErr"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="editStaff(<?php echo $staff[$index][0]; ?>)">Edit</button>
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
<script src="/assets/js/admin.js"></script>
<!-- end import script -->


</html>