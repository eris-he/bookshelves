<?php
require '../imports.php';
require 'request_algo.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $isbn = $_POST["isbn"];
    $requestNumber = requestNumber::createRequestNumber();
    $status = "Pending";
    $sql = "INSERT INTO requests (vcRequestNumber, vcTitle, vcAuthor, vcISBN, vcStatus) VALUES ('$requestNumber', '$title', '$author', '$isbn', '$status')";
    $result = DB::$conn->query($sql);
    if ($result) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . DB::$conn->error;
    }
    DB::$conn->close();
}
?>