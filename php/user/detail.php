<?php
session_start();
$id = $_GET['id'];
require_once "config.php";


//Get product detail
$sql = "SELECT name, author, type, url, price FROM product WHERE id=?";

if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param('i', $param_id);
    $param_id = intval($id);
    if ($stmt->execute()) {
        //Store result
        $stmt->store_result();

        $stmt->bind_result($name, $author, $type, $url, $price);
        $stmt->fetch();
    }
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

    <title><?php echo $name; ?></title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0" id="page-body">
    <!--Header / Navbar-->
    <?php
    $active_page = '';
    require_once 'header.php';
    ?>

    <div class="container text-center fixed product-title pt-5 pb-2 font-weight-bold">
        <h1 class="font-weight-bold">Product details</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color:white;">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $name; ?></li>
            </ol>
        </nav>
    </div>

    <!--Detail Section-->
    <div class="justify-content-center align-items-center d-flex">
        <!-- ======= Portfolio Details Section ======= -->
        <section class="portfolio-details" style="margin-top: 0px;">
            <div class="container">
                <div class="portfolio-details-container">

                    <div class="portfolio-details-carousel">
                        <img src="<?php echo $url; ?>" style="width:50%;" alt="">
                        <!--<img src="assets/img/souvenirs/hat-1.jpg" style="width:100%;" alt="">-->
                    </div>

                    <div class="portfolio-info">
                        <h3>Product information</h3>
                        <ul>
                            <li><strong>Category</strong>: <?php echo $type; ?></li>
                            <li><strong>Author</strong>: <?php echo $author; ?></li>
                            <li><strong>Price</strong>: <?php echo "$price $" ?></li>
                        </ul>
                    </div>

                </div>

                <div class="portfolio-description">
                    <h2>This is an example of products detail</h2>
                    <p>
                        Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </p>
                </div>
                <!------ Display comment section----->
                <?php
                $sql = "SELECT username, time, detail FROM comment WHERE product_id=?";

                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param('i', $param_id);
                    $param_id = intval($id);

                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($username, $time, $detail);
                }
                ?>

                <div>
                    <h3 class="font-weight-bold"><?php echo $stmt->num_rows(); ?> comments</h3>
                    <div class="card-deck container justify-content-between flex-column">
                        <?php
                        while ($stmt->fetch()) {
                        ?>
                            <div class="card border-info mb-3" style="width: 100%;">
                                <div class="card-header">
                                    <img src="/assets/img/user.png">
                                    <p class="font-weight-bold" style="margin-bottom: 0; margin-left: 100px; margin-top: 20px;"><?php echo $username; ?></p>
                                    <p style="font-style:italic;margin-left: 100px;"><?php echo $time; ?></p>
                                </div>
                                <div class="card-body text-info">
                                    <p class="card-text"><?php echo $detail ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!----Comment section---------->
                <div style="padding-bottom: 100px;">
                    <form>
                        <div class="form-group">
                            <label for="comment" class="font-weight-bold">Add new comment:</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                    </form>
                    <?php
                    if (!isset($_SESSION['username'])) {
                        echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Please login to send comment!">';
                        echo '<button class="btn btn-outline-primary" style="pointer-events: none;" type="button" disabled>Send</button></span>';
                    } else {
                        echo '<button type="button" class="btn btn-outline-primary" onclick="sendComment(' . $id . ')">Send</button>';
                    }
                    ?>

                </div>
            </div>
        </section><!-- End Portfolio Details Section -->
    </div>
    <!--Preloader-->
    <div id="preloader"></div>
    <!--Back to to-->
    <a href="#page-body" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

</body>

</html>