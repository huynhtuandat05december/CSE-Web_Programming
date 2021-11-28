<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
    <style>
        /* Pagination */
        #pagination {
            text-align: right;
            padding: 0.5rem 1rem 1rem;
            z-index: 100;
        }

        .page-item {
            padding: 5px 9px;
            color: #7200cf;
            background-color: #fff;

            border-radius: 2px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .page-item:hover {
            color: #000;
            text-decoration: none;
        }

        .current-page {
            background-color: #7200cf;
            color: #fff;
        }
    </style>

    <!--Animation.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>Products</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0" id="page-body">
    <!--Header / Navbar-->
    <?php
    $active_page = 'products';
    require_once 'header.php'
    ?>

    <!-- ======= Products Section ======= -->
    <section id="home" class="">
        <div class="overlay-white"></div>
        <div class="container">
            <div class="row animate__animated animate__fadeInDown">
                <div class="col-sm-12">
                    <div class="price-box">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Products
                            </h3>
                            <div class="searchBox d-flex align-items-center">
                                <input class="searchInput" type="text" name="searchText" id="searchText" placeholder="Input name, type, price" onkeypress="searchProducts(event)">
                                <button class="searchButton" onclick="searchButton()">
                                    <i class="material-icons">
                                        search
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ======= Get Url Image from Database ======= -->
            <div class="row">
                <?php
                require_once "config.php";

                if (!isset($_GET['action'])) {
                    // Pagination
                    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 9;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Current page
                    $offset = ($current_page - 1) * $item_per_page;

                    if (!isset($_GET['type'])) {
                        // Calculate total rows
                        $totalRecords = $mysqli->query("SELECT * FROM product");
                        $totalRecords = $totalRecords->num_rows;
                        $totalPages = ceil($totalRecords / $item_per_page);
                        //Display all categories
                        $sql = "SELECT * FROM product limit " . $offset . "," . $item_per_page . " ";

                        if ($stmt = $mysqli->prepare($sql)) {
                            if ($stmt->execute()) {
                                $stmt->store_result();

                                $stmt->bind_result($id, $name, $author, $type, $url, $price);
                                while ($stmt->fetch()) {
                ?>
                                    <div class="col-md-4 d-flex">
                                        <div class="work-box animate__animated animate__fadeInLeftBig d-flex flex-column" style="width: 100%;">
                                            <a href="detail.php?id=<?php echo $id ?>" data-gall="portfolioGallery" class="venobox" style="flex: 1;">
                                                <div class="work-img text-center d-flex" style="height: 100%">
                                                    <?php echo '<img src="' . $url . '" alt="" class="img-fluid" style="object-fit: cover;">' ?>
                                                </div>
                                            </a>
                                            <div class="work-content">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h2 class="w-title font-weight-bold"><?php echo $name ?></h2>
                                                        <p>Description: <?php echo $type ?></p>
                                                        <div class="w-more">
                                                            <span class="w-category">Price</span>: <span><?php echo $price; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                include 'pagination.php';
                            }
                        }
                    } else //Case display with type
                    {
                        $type = $_GET['type'];

                        $sql = "SELECT * FROM product WHERE type=?";
                        if ($stmt = $mysqli->prepare($sql)) {
                            $stmt->bind_param('s', $param_type);
                            $param_type = $type;

                            if ($stmt->execute()) {
                                $stmt->store_result();

                                $stmt->bind_result($id, $name, $author, $type, $url, $price);
                                if ($stmt->num_rows == 0) {
                                ?>
                                    <div class="container">
                                        <h2 style="font-style:italic;" class="text-info">No result</h2>
                                    </div>
                                <?php
                                }
                                while ($stmt->fetch()) {
                                ?>
                                    <div class="col-md-4 d-flex">
                                        <div class="work-box animate__animated animate__fadeInLeftBig d-flex flex-column" style="width: 100%;">
                                            <a href="detail.php?id=<?php echo $id ?>" data-gall="portfolioGallery" class="venobox" style="flex: 1;">
                                                <div class="work-img text-center d-flex" style="height: 100%">
                                                    <?php echo '<img src="' . $url . '" alt="" class="img-fluid" style="object-fit: cover;">' ?>
                                                </div>
                                            </a>
                                            <div class="work-content">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h2 class="w-title font-weight-bold"><?php echo $name ?></h2>
                                                        <p>Description: <?php echo $type ?></p>
                                                        <div class="w-more">
                                                            <span class="w-category">Price</span>: <span><?php echo $price; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                        }
                    }
                } else {
                    $value = $_GET['value'];
                    $value = "%" . $value . "%";

                    $sql = "SELECT * FROM product WHERE name LIKE ? OR author LIKE ? OR type LIKE ? OR price LIKE ?";
                    if ($stmt = $mysqli->prepare($sql)) {
                        $stmt->bind_param('ssss', $param_name, $param_author, $param_type, $param_price);
                        $param_name = $value;
                        $param_author = $value;
                        $param_type = $value;
                        $param_price = $value;

                        if ($stmt->execute()) {
                            $stmt->store_result();

                            $stmt->bind_result($id, $name, $author, $type, $url, $price);
                            ?>
                            <div class="container">
                                <h2 style="font-style:italic;" class="text-info"><?php echo $stmt->num_rows() ?> results</h2>
                            </div>
                            <?php
                            while ($stmt->fetch()) {
                            ?>
                                <div class="col-md-4 d-flex">
                                    <div class="work-box animate__animated animate__fadeInLeftBig d-flex flex-column" style="width: 100%;">
                                        <a href="detail.php?id=<?php echo $id ?>" data-gall="portfolioGallery" class="venobox" style="flex: 1;">
                                            <div class="work-img text-center d-flex" style="height: 100%">
                                                <?php echo '<img src="' . $url . '" alt="" class="img-fluid" style="object-fit: cover;">' ?>
                                            </div>
                                        </a>
                                        <div class="work-content">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h2 class="w-title font-weight-bold"><?php echo $name ?></h2>
                                                    <p>Description: <?php echo $type ?></p>
                                                    <div class="w-more">
                                                        <span class="w-category">Price</span>: <span><?php echo $price; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
    <!--Back to to-->
    <a href="#page-body" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!--Preloader-->
    <div id="preloader"></div>
</body>