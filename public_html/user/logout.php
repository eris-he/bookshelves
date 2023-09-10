<?php
//end session and log out
session_start();
session_destroy();
header("Location: /");
exit();

// if (isset($_SESSION['return_to'])) {
//     // Redirect the user back to the saved URL
//     header('Location: ' . $_SESSION['return_to']);
//     exit();
// } else {
//     // If no saved URL is found, redirect to a default page
//     header('Location: /');
//     exit();
// }
?>