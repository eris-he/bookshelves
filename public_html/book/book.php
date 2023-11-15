<?php
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../../");
    $dotenv->load();
    require '../imports.php';
?>

<!DOCTYPE html>
<header>
    <link href="../css/book.css" rel="stylesheet" />
</header>
<div class="footer-wrap">
    <div class="body-template center">
        <!-- PUT YOUR CONTENT HERE, IN BETWEEN THESE CLASSES PLS AND THANK YOU. -->
        <?php
            if (isset($_GET['isbn'])) {
                // get the book from the database
                $sql = "SELECT * FROM books WHERE isbn = " . $_GET['isbn'];
                $result = DB::$conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<h1>" . $row['title'] . "</h1>";
                        echo "<h2>" . $row['author'] . "</h2>";

                        echo "<div class='row desc-container'>";
                        $img_url = "https://covers.openlibrary.org/b/isbn/" . $row['isbn'] . "-L.jpg";
                        echo "<div class='col-lg-6'><img class='book-img' src='" . $img_url . "' alt='" . $row['title'] . "'></div>";

                        // scraping book description here
                        $lib_url = "https://openlibrary.org/isbn/" . $row['isbn'];
                        $html = file_get_contents($lib_url);
                        $doc = new DOMDocument;
                        libxml_use_internal_errors(true);
                        $doc->loadHTML($html);
                        libxml_clear_errors();
                        $xpath = new DOMXPath($doc);
                        $bookDescriptions = $xpath->query("//*[contains(@class, 'book-description')]");
                        // only get description for the first bookDescription
                        $description = $bookDescriptions[0];
                        echo "<div class='col-lg-6'>";
                        // check if description exists
                        $descText = $description->textContent;
                        if (str_contains($descText, "This edition doesn't have a description yet")) {
                            echo "No description available.";
                        } else {
                            echo $description->textContent;
                        }
                        
                        echo "</div>";
                        echo "</div>";

                        echo "<h2><a class='btn btn-success btn-lg btn-block' href='../reservation/reserve.php?isbn=" . $row['isbn'] . "'> Reserve This Book</a></h2>";
                    }
                }
            }
        ?>
    </div>
    <?php
    require_once '../footer.php';
    ?>
</div>

