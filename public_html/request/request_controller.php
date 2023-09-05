<?php
require 'request_algo.php';
require '../database/dbConn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $isbn = $_POST["isbn"];
    $requestNumber = requestNumber::createRequestNumber();
    $status = "Pending";
    $sql = "INSERT INTO requests (vcRequestNumber, vcTitle, vcAuthor, vcISBN, vcStatus) VALUES ('$requestNumber', '$title', '$author', '$isbn', '$status')";
    $result = DB::$conn->query($sql);

    if ($result) {
        $response = ['status' => 'success', 'message' => 'Request processed successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'An error occurred during processing.'];
    }

    DB::$conn->close();
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

