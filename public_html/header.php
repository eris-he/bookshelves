<?php
    // $upOne = dirname(__DIR__, 1);
    // $testDir = "http://localhost/bookshelves/user/login.php";
    // $loginDir = "http://" . $upOne . '/user/login.php'
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/header.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/header.js"></script>
</head>
<div id="header">
    <div class="row">
        <div class="col-md-4">
            <a href="/">
                <img id="header-img" src="/img/wellredfox.png" alt="Well Red Bookshelves Logo">
            </a>
        </div>
        <div class="col-md-8 center top-links">
            <a class="header-link" href="/"> In Stock </a>
            <a class="header-link" href="/request/request.php"> Request a Book </a>
            <a class="header-link" href="/lookup/lookup.php"> Look Up a Request </a>
            <!-- check if logged in and if they are admin, then if yes, display admin link -->
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    if ($_SESSION['is_admin'] == true) {
                    echo '<a class="header-link" href="/admin/admin-dashboard.php"> Admin </a>';
                    }
                }
            ?>
            <!-- check if logged in, then if yes, display logout link -->
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<a class="header-link" href="/user/logout.php"> Logout </a>';
                }
            ?>
            <!-- check if logged in, then if no, display login link -->
            <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
                    echo '<a class="header-link" onclick="openForm()"> Admin Login </a>';
                }
            ?>
        </div>
    </div>
</div>
<hr>
<!-- The form -->
<div class="form-popup" id="loginForm">
    <form method="POST" action="/user/login.php" class="form-container">
    <label for="username"><b>Username</b></label>
    <input id="username" type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input id="password" type="password" placeholder="Enter Password" name="password" required>

    <input type="submit" class="btn btn-success" value="Log In"></input>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    <!-- clear inputs after logging in or closing form -->
  </form>
</div>