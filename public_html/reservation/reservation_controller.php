<?php
require 'reservation_algo.php';
require '../database/dbConn.php';
require '../email/email.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $isbn = $_POST["isbn"];
    $date = date("Y-m-d H:i:s");
    $reserveNumber = reservationNumber::createResNumber();
    $status = "Pending";
    $sql = "INSERT INTO reservations (vcReservationNumber, vcTitle, vcAuthor, vcISBN, vcEmail, dtDateReserved, vcStatus) 
            VALUES ('$reserveNumber', '$title', '$author', '$isbn', '$email', '$date', '$status')";
    $result = DB::$conn->query($sql);

    if ($result) {
        Email::reserveEmail($email, $reserveNumber);
        $response = ['status' => 'success', 'message' => 'Reservation processed successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'An error occurred during processing.'];
    }

    DB::$conn->close();
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

