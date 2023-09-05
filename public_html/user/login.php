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
        echo $hashedPassword;

        // Verify the submitted password against the stored hash
        if (password_verify($password, $hashedPassword)) {
            // Authentication successful
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["is_admin"] = true; // Assuming the user is an admin

            if (isset($_SESSION['return_to'])) {
                // Redirect the user back to the saved URL
                header('Location: ' . $_SESSION['return_to']);
                exit();
            } else {
                // If no saved URL is found, redirect to a default page
                header('Location: /');
                exit();
            }
        } else {
            // Authentication failed
            // return to index page but with an error message
            echo "Error: Incorrect username or password. Please try again.";
        }
    } else {
        // User not found
        echo "Error: Incorrect username or password. Please try again.";
    }
    DB::$conn->close();
}
?>