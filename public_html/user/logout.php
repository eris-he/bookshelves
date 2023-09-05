<?php
//end session and log out
session_start();
session_destroy();
header("location: /");
?>