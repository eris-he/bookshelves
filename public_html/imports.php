<?php
session_start();
$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();
require "header.php";
require "database/dbConn.php";
?>

<!DOCTYPE html>
<link href="/css/Site.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/css/bootstrap-toaster.min.css" rel="stylesheet">