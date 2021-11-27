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

    <title>About</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0" id="page-body" style="background-image:url('https://images.unsplash.com/photo-1512429234305-12fe5b0b0f07?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80'); background-attachment: fixed; background-size: cover;">
    <!--Header / Navbar-->
    <?php
    require_once 'header.php';
    ?>
    <!--About section-->
    <section id="about" class="section d-flex flex-column align-items-center mt-4">
        <!--Item 1-->
        <?php
        require_once "config.php";

        //Display staff information
        $sql = "SELECT * FROM staff";

        if ($stmt = $mysqli->prepare($sql)) {
            if ($stmt->execute()) {
                $stmt->store_result();

                $stmt->bind_result(
                    $id,
                    $name,
                    $profile,
                    $email,
                    $phone,
                    $detail,
                    $url
                );

                while ($stmt->fetch()) {
        ?>
                    <div class="container d-flex justify-content-center align-items-center section-mt-5 animate__animated animate__fadeInLeftBig">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box-shadow-full">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 p-0">
                                            <div class="row">
                                                <div>
                                                    <?php echo '<img src="' . $url . '" class="img-fluid rounded b-shadow-a" width="100%" alt="">' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-9">
                                            <p class="mb-2">
                                            <div class="title-s d-inline-block pr-1">Name:</div><span style="font-size: 1rem;"><?= $name ?></span></p>
                                            <p class="mb-2">
                                            <div class="title-s d-inline-block pr-1">Profile:</div><span style="font-size: 1rem;"><?= $profile ?></span>
                                            </p>
                                            <p class="mb-2">
                                            <div class="title-s d-inline-block pr-1">Email:</div>
                                            <span style="word-break: break-word; font-size: 1rem;"><?= $email ?></span>
                                            </p>
                                            <p class="mb-2">
                                            <div class="title-s d-inline-block pr-1">Phone:</div><span style="font-size: 1rem;"> <?= $phone ?></span></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="title-box-2">
                                                <p class="title-left">
                                                    About me
                                                </p>
                                            </div>
                                            <p style="font-size: 1rem;">
                                                <?php echo $detail; ?>
                                            </p>
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
        ?>

    </section>
    <!--Back to to-->
    <a href="#page-body" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!--Preloader-->

    <div id="preloader"></div>
</body>

</html>