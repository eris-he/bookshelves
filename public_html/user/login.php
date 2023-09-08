<?php
session_start();
require '../database/dbConn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE vcUsername = '$username'";
    $result = DB::$conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["vcHashed"];

        // Verify the submitted password against the stored hash
        if (password_verify($password, $hashedPassword)) {
            // Authentication successful
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["is_admin"] = true; // Assuming the user is an admin

            if (isset($_SESSION['return_to'])) {
                // Redirect the user back to the saved URL
                $response = ['status' => 'success', 'message' => 'Login successful.'];

            } else {
                // If no saved URL is found, redirect to a default page
                $response = ['status' => 'success', 'message' => 'Login successful.'];

            }
        } else {
            // Authentication failed
            $response = ['status' => 'error', 'message' => 'Incorrect username or password. Please try again.'];
        }
    } else {
        // User not found
        $response = ['status' => 'error', 'message' => 'Incorrect username or password. Please try again.'];
    }
    DB::$conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>