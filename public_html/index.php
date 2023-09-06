<?php
    session_start();
    $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
    require "vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();
    require 'header.php';

    function initialize() {
        global $init;
        global $conn;
        if ($init) return;
        $conn = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PW'], $_ENV['DB']);
        if ($conn->connect_error) {
            echo "<h1>Connection failed<h1>";
            die("Connection failed: " . $conn->connect_error);
        }
        $init = TRUE;
    }

    initialize();
?>

<DOCTYPE html>
<head>
    <title>Well Red Bookshelves</title>
    <link href="css/Site.css" rel="stylesheet" />
</head>
<div class="footer-wrap">
    <div class="body-template">
        <!-- Content for page goes here -->
        <div class="center">
            <h1>Welcome to the Well Red Bookshelves!</h1>
            <h2>Browse and search our catalog of books, available to purchase on-site.</h2>
        </div>
        <div>
            <?php
                require 'search/search-form.php';
            ?>
        </div>

    </div>
    <div>
        <?php
            require 'footer.php';
        ?>
    </div>
</div>