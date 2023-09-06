<?php
require 'request_algo.php';
require '../database/dbConn.php';
require '../email/email.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $isbn = $_POST["isbn"];
    $date = date("Y-m-d H:i:s");
    $requestNumber = requestNumber::createRequestNumber();
    $status = "Pending";
    $sql = "INSERT INTO requests (vcRequestNumber, vcTitle, vcAuthor, vcISBN, vcEmail, dtDateRequested, vcStatus) 
            VALUES ('$requestNumber', '$title', '$author', '$isbn', '$email', '$date', '$status')";
    $result = DB::$conn->query($sql);

    if ($result) {
        Email::requestEmail($email, $requestNumber);
        $response = ['status' => 'success', 'message' => 'Request processed successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'An error occurred during processing.'];
    }

    DB::$conn->close();
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

