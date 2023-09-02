<?php
    require 'imports.php';
?>

<DOCTYPE html>
<html>
    <head>
        <title>Well Red Bookshelves</title>
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
                $resNumber = DB::$conn->query("SELECT * FROM reservations WHERE iStatus = 2");
                $obj2 = $resNumber->fetch_object();
                echo ".$obj2->vcReservationNumber.";
            ?>
        </div>
        <div>
            <?php
                echo $_SESSION["username"];
            ?>
        </div>
</div>
</html>