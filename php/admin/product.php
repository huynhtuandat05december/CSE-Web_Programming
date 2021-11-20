<?php
require_once "config.php";
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>
>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>

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
                <a href="staff.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <span>Staff</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="product.php" class="sidebar-nav-link active">
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
                <div class="counter bg-success">
                    <p>
                        <i class="fas fa-dice-d6"></i>
                    </p>
                    <?php
                    $sql = "SELECT COUNT(id) FROM product";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($number_product);
                    $stmt->fetch();
                    ?>
                    <h3><?php echo $number_product; ?></h3>
                    <p>Products</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 id="titleTable">
                            Product table
                        </h3>
                    </div>
                    <div class="card-content">
                        <table class="table-stripped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Type</th>
                                <th>URL</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM product";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->bind_result($product_id, $name, $author, $type, $url, $price);
                            $product = array();
                            while ($stmt->fetch()) {
                                array_push($product, array($product_id, $name, $author, $type, $url, $price))
                            ?>
                                <tr>
                                    <td><?php echo $product_id; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $author; ?></td>
                                    <td><?php echo $type; ?></td>
                                    <td><?php echo $url; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <th><button class="btn btn-info" data-toggle="collapse" data-target="#comment<?php echo $product_id; ?>" aria-expanded="false" aria-controls="comment<?php echo $product_id; ?>">View comment</button></th>
                                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#productEditModal<?php echo $product_id; ?>">Edit</button></td>
                                    <td><button class="btn btn-danger" onclick="deleteProduct(<?php echo $product_id; ?>)">Delete</button></td>
                                </tr>
                                <!---Comment-->
                                <?php
                                $sql1 = "SELECT id, username, time, detail FROM comment WHERE product_id = ?";
                                $stmt1 = $mysqli->prepare($sql1);
                                $stmt1->bind_param("i", $product_id);
                                $stmt1->execute();
                                $stmt1->store_result();
                                $stmt1->bind_result($comment_id, $username, $time, $detail);
                                ?>
                                <tr>
                                    <th colspan="9">
                                        <div class="card collapse" id="comment<?php echo $product_id; ?>">
                                            <div class="card-header">
                                                <h3 id="titleTable">
                                                    Comment
                                                </h3>
                                            </div>
                                            <div class="card-content">
                                                <table class="table-stripped">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Username</th>
                                                        <th>Time</th>
                                                        <th>Detail</th>
                                                        <th></th>
                                                    </tr>
                                                    <?php
                                                    while ($stmt1->fetch()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $comment_id; ?></td>
                                                            <td><?php echo $username; ?></td>
                                                            <td><?php echo $time; ?></td>
                                                            <td><?php echo $detail; ?></td>
                                                            <td><button class="btn btn-danger" onclick="deleteComment(<?php echo $comment_id; ?>)">Delete</button></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-outline-primary mx-3" data-toggle="modal" data-target="#productModal">Add new product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add products-->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add new product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-product-form">
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="name" class="col-2 col-form-label"><strong>Name</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="name" required>
                                <span class="text-danger" id="nameErr"></span>
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="author" class="col-2 col-form-label"><strong>Author</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="author" required>
                                <span class="text-danger" id="authorErr"></span>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="type" class="col-2 col-form-label"><strong>Type</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="type" required>
                                <span class="text-danger" id="typeErr"></span>
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="url" class="col-2 col-form-label"><strong>URL</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="" id="url" required>
                                <span class="text-danger" id="urlErr"></span>
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-center">
                            <label for="price" class="col-2 col-form-label"><strong>Price</strong></label>
                            <div class="col-10">
                                <input class="form-control" type="number" min="0" step="1" value="" id="price" required>
                                <span class="text-danger" id="priceErr"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addProduct()">Add</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    for ($index = 0; $index < count($product); $index++) {
    ?>
        <!-- Modal edit products-->
        <div class="modal fade" id="productEditModal<?php echo $product[$index][0]; ?>" tabindex="-1" role="dialog" aria-labelledby="productEditModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Edit product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row align-items-center">
                                <label for="id-edit-<?php echo $product[$index][0]; ?>" class="col-2 col-form-label"><strong>ID</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $product[$index][0]; ?>" id="id-edit-<?php echo $product[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="idErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="name-edit-<?php echo $product[$index][0]; ?>" class="col-2 col-form-label"><strong>Name</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $product[$index][1]; ?>" id="name-edit-<?php echo $product[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="nameErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="author-edit-<?php echo $product[$index][0]; ?>" class="col-2 col-form-label"><strong>Author</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $product[$index][2]; ?>" id="author-edit-<?php echo $product[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="authorErr"></span>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="type-edit-<?php echo $product[$index][0]; ?>" class="col-2 col-form-label"><strong>Type</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $product[$index][3]; ?>" id="type-edit-<?php echo $product[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="typeErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="url-edit-<?php echo $product[$index][0]; ?>" class="col-2 col-form-label"><strong>URL</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?php echo $product[$index][4]; ?>" id="url-edit-<?php echo $product[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="urlErr"></span>
                            </div>
                            <div class="form-group row align-items-center justify-content-center">
                                <label for="price-edit-<?php echo $product[$index][0]; ?>" class="col-2 col-form-label"><strong>Price</strong></label>
                                <div class="col-10">
                                    <input class="form-control" type="number" min="0" step="0.01" value="<?php echo $product[$index][5]; ?>" id="price-edit-<?php echo $product[$index][0]; ?>">
                                </div>
                                <span class="text-danger" id="priceErr"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="editProduct(<?php echo $product[$index][0]; ?>)">Save</button>
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