<?php
require_once '../imports.php';
?>

<!DOCTYPE html>
<head>
    <link href="/css/reserve.css" rel="stylesheet" />
    <script src="/js/reserve.js"></script>
</head>
<div class="footer-wrap">
    <div class="body-template center">
        <h1>Reserve Your Book</h1>
        <!-- PUT YOUR CONTENT HERE, IN BETWEEN THESE CLASSES PLS AND THANK YOU. -->
        <?php
            if (isset($_GET['isbn'])) {
                // get the book from the database
                $stmt = DB::$conn->prepare("SELECT * FROM books WHERE isbn = ?");
                $stmt->bind_param("s", $_GET['isbn']);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $isbn = $row['isbn'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $img_url = "https://covers.openlibrary.org/b/isbn/" . $row['isbn'] . "-L.jpg";
                    echo "<div class='row'>";
                    echo "<div class='col-lg-6'><img class='book-img' src='" . $img_url . "' alt='" . $row['title'] . "'></div>";
                    ?>
                        <div class="body-styling col-lg-6">
                            <form id="reserve-form">
                                <label class="form-label" for="email">Your Email <span style="color: red;">*</span> </label>
                                <input class="form-input" type="email" name="email" id="email" required>
                                <br>
                                <label class="form-label" for="title">Title <span style="color: red;">*</span> </label>
                                <input class="form-input" type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" required>
                                <br>
                                <label class="form-label" for="author">Author <span style="color: red;">*</span> </label>
                                <input class="form-input" type="text" name="author" id="author" value="<?php echo htmlspecialchars($author); ?>" required>
                                <br>
                                <label class="form-label" for="isbn">ISBN<span style="color: red;">*</span> </label>
                                <input class="form-input" type="text" name="isbn" id="isbn" value="<?php echo htmlspecialchars($isbn); ?>" required>
                                <br>
                                <button class="btn btn-success form-input" type="submit">Submit</button>
                            </form>
                        </div>
                    <?php
                    echo "/<div>";
                }
            }
        ?>
    </div>
    <?php
    require_once '../footer.php';
    ?>
</div>