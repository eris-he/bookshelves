<?php
session_start();
require "../database/dbConn.php";
require "hash.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash = hashPassword($password);

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

            // Redirect to a logged-in page or perform other actions
            header("location: ../public_html/index.php");
        } else {
            // Authentication failed
            echo "Error: Incorrect username or password. Please try again.";
        }
    } else {
        // User not found
        echo "Error: Incorrect username or password. Please try again.";
    }
    DB::$conn->close();
}
?>