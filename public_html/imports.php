<?php
session_start();
$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();
require "header.php";
require "footer.php";
require "database/dbConn.php";
?>

<!DOCTYPE html>
<link href="/css/Site.css" rel="stylesheet" />
