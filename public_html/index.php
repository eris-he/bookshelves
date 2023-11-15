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
    <link href="css/index.css" rel="stylesheet" />
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
        <div id="main-container">
            <?php
                // get some random books to display from the books table in the database
                $sql = "SELECT * FROM books ORDER BY RAND() LIMIT 15";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<div id='book-container'>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='book'>";
                        // check that the image exists, if not, use a placeholder
                        $img_url = "https://covers.openlibrary.org/b/isbn/" . $row['isbn'] . "-L.jpg";
                        echo "<a href='book/book.php?isbn=" . $row['isbn'] . "'><img class='book-img' src='" . $img_url . "' alt='" . $row['title'] . "'>";
                        echo "<div class='book-title'>" . htmlspecialchars($row['title']) . "</div>";
                        echo "</a>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "<h2>No results found</h2>";
                }
            ?>
        </div>
        <div>
            <?php
            # get latest access token from database
            $sql = "SELECT * FROM auth_info ORDER BY expiresAt DESC LIMIT 1";
            $result = $conn->query($sql);
            $accessToken = "";
            while ($row = $result->fetch_assoc()) {
                $accessToken = $row["accessToken"];
            }
            $ch = curl_init('https://connect.squareupsandbox.com/v2/catalog/list');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Square-Version: 2023-10-18',
                'Authorization: Bearer ' . $accessToken,
                'Content-Type: application/json'
            ]);

            $response = curl_exec($ch);
            // Check for cURL errors
            if (curl_errno($ch)) {
                die('cURL error: ' . curl_error($ch));
            }
            curl_close($ch);

            $response = json_decode($response, true);

            ?>
        </div>
    </div>
    <div>
        <?php
            require 'footer.php';
        ?>
    </div>
</div>