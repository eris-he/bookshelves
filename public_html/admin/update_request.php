<?php
// update_request.php
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();
require_once '../database/dbConn.php';

// Get the POST data
$requestNumber = $_POST['requestNumber'];
$status = $_POST['status'];
$isbn = $_POST['isbn'];

// Validate and sanitize inputs...

// Prepare the statement
$stmt = DB::$conn->prepare("UPDATE requests SET vcISBN = ?, vcStatus = ? WHERE vcRequestNumber = ?");
$stmt->bind_param("sss", $isbn, $status, $requestNumber);

// Execute the statement
if($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>