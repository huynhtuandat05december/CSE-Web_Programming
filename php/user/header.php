<nav id="mainNav" class="navbar navbar-expand-md fixed-top animate__animated animate__slideInDown">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <div class="order-md-4">
            <?php
            session_start();
            if (!isset($_SESSION['username'])) {
                echo '<button class="login-btn btn btn-outline-primary" onclick="directLogin()">Login</button>';
            } else { ?>
                <div class="dropdown">
                    <button id="userDropdown" style='font-size:24px' class='btn btn-outline-primary btn-rounded' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fas fa-user-circle'></i></button>
                    <div class="dropdown-menu mt-1" aria-labelledby="userDropdown">
                        <button class="dropdown-item" onclick="directInformation()"><i class="fas fa-user-cog" style="padding-right: 10px; color: #7200cf;"></i>Personal info</button>
                        <button class="dropdown-item" onclick="logout()"><i class="fas fa-sign-out-alt" style="padding-right: 10px; color: #7200cf;"></i>Log out</button>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <div class="order-md-1"><a href="index.php" class="navbar-brand" id="projectName">Apple Store</a></div>
        <div class="order-md-2">
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarDefault' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <i class='fas fa-bars'></i>
            </button>
        </div>
        <div id="navbarDefault" class="navbar-collapse order-md-3 collapse justify-content-center align-items-center">
            <ul class="nav navbar-nav text-uppercase font-weight-bold">
                <li class="nav-item">
                    <a href="home.php" class="nav-link nav-link-hover">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link nav-link-hover active-item">About</a>
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