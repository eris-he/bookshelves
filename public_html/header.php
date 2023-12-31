<?php
    // $upOne = dirname(__DIR__, 1);
    // $testDir = "http://localhost/bookshelves/user/login.php";
    // $loginDir = "http://" . $upOne . '/user/login.php'
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/header.css" rel="stylesheet" />
    <link href="/css/Site.css" rel="stylesheet" />
    <link href="/css/fonts/stylesheet.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="/js/header.js"></script>

    <title>Well Red Bookshelves, a Book Inventory For Well Red</title>
</head>
<div id="header">
    <div class = "container-fluid">
        <div class="row" id="navLinks">
            <div class="col-md-4 container-fluid">
                <div class="row">
                    <div>
                        <a href="/">
                            <img id="header-img" src="/img/wellredfox.png" alt="Well Red Bookshelves Logo">
                        </a>
                    </div>
                    <div id="icon-toggle">
                        <a class="icon" data-bs-toggle="collapse" href="#top-links">
                            <i class="fa-solid fa-bars fa-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 center" id="top-links">
                <a class="header-link" href="/"> IN STOCK </a>
                <a class="header-link" href="/request/request.php"> REQUEST A BOOK </a>
                <a class="header-link" href="/lookup/lookup.php"> LOOK UP A REQUEST </a>
                <!-- check if logged in and if they are admin, then if yes, display admin link -->
                <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        if ($_SESSION['is_admin'] == true) {
                        echo '<a class="header-link" href="/admin/admin-dashboard.php"> ADMIN </a>';
                        }
                    }
                ?>
                <!-- check if logged in, then if yes, display logout link -->
                <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<a class="header-link" href="/user/logout.php"> LOGOUT </a>';
                    }
                ?>
                <!-- check if logged in, then if no, display login link -->
                <?php
                    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
                        echo '<a class="header-link" onclick="openForm()"> ADMIN LOGIN </a>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- The form -->
<div class="form-popup" id="loginForm">
    <!-- <form method="POST" action="/user/login.php" class="form-container"> -->
    <form class="form-container" id="adminLogin">
        <label for="username"><b>Username</b></label>
        <input id="username" type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input id="password" type="password" placeholder="Enter Password" name="password" required>

        <div id="loginError" hidden><span style="color:red">Error: Your username or password is incorrect.</span></div>
        <input type="submit" class="btn btn-success" value="Log In"></input>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        <!-- clear inputs after logging in or closing form -->
    </form>
</div>
