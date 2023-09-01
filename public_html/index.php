<?php
    require '../database/dbConn.php';
?>

<DOCTYPE html>
<html>
    <head>
        <title>Well Red Bookshelves</title>
    </head>
    <body>
        <h1> Hello world! </h1>
        <h2> This is the testing and development site for Well Red's custom inventory management system. </h2>
        <?php
            echo "This is to test the database connection.";
            $resNumber = DB::$conn->query("SELECT * FROM reservations WHERE iStatus = 2");
            $obj2 = $resNumber->fetch_object();
            echo ".$obj2->vcReservationNumber.";
        ?>
    </body>
</html>