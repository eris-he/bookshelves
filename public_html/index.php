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
<div class="footer-wrap">
    <head>
        <title>Well Red Bookshelves</title>
        <link href="css/Site.css" rel="stylesheet" />
    </head>
    <div class="body-template">
        <div>
            <h1> Hello world! </h1>
        </div>  
        <div>
            <h2> This is the testing and development site for Well Red's custom inventory management system. </h2>
        </div>
        <div>
            <?php
                echo "This is to test the database connection.";
                $resNumber = $conn->query("SELECT * FROM reservations WHERE vcStatus = 'Pending'");
                $obj2 = $resNumber->fetch_object();
                echo ".$obj2->vcReservationNumber.";
            ?>
        </div>
        <div>
            <?php
                echo 'Your username is... '.$_SESSION['username'].'.';
            ?>
        </div>
    </div>
    <div>
        <?php
            require 'footer.php';
        ?>
    </div>
</div>