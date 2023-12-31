<?php
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../../");
    $dotenv->load();
    require '../imports.php';
?>

<!DOCTYPE html>
<head>
    <link href="/css/request.css" rel="stylesheet" />
    <script src="/js/request.js"></script>
</head>
<div class="footer-wrap">
    <div class='body-template'>
        <div class="body-styling">
            <h1>Request a Book</h1>   
        </div>
        <div style="text-align:center">
            <p>
                Can't find the book you're looking for in our store? Request it here and we'll do our best to get it for you!
            </p> 
            <!-- <p>
                Requested books are automatically added as a reserved book for you once we get it in stock.
            </p>
            <p>
                Please note that reserved books are only reserved for <b>7 days</b> after we receive them.
            </p> -->
        </div>
        <div class="body-styling">
            <form id="request-form">
                <label class="form-label" for="email">Your Email <span style="color: red;">*</span> </label>
                <input class="form-input" type="email" name="email" id="email" required>
                <br>
                <label class="form-label" for="title">Title <span style="color: red;">*</span> </label>
                <input class="form-input" type="text" name="title" id="title" required>
                <br>
                <label class="form-label" for="author">Author <span style="color: red;">*</span> </label>
                <input class="form-input" type="text" name="author" id="author" required>
                <br>
                <label class="form-label" for="isbn">ISBN</label>
                <input class="form-input" type="text" name="isbn" id="isbn">
                <br>
                <button class="btn btn-success form-input" type="submit">Submit</button>
            </form>
        </div>
    </div>
    
    <?php
        require '../footer.php';
    ?>
</div>


