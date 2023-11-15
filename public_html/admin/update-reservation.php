<?php
// update_request.php
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();
require_once '../database/dbConn.php';

// Get the POST data
$reservationNumber = $_POST['reservationNumber'];
$status = $_POST['status'];
$isbn = $_POST['isbn'];
$isArchived = 0;

if ($status == "Completed") {
    $isArchived = 1;
}

// Prepare the statement
$stmt = DB::$conn->prepare("UPDATE reservations SET vcISBN = ?, vcStatus = ?, bIsArchived = ? WHERE vcReservationNumber = ?");
$stmt->bind_param("ssis", $isbn, $status, $isArchived, $reservationNumber);

// Execute the statement
if($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>