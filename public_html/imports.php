<?php
session_start();
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();
require "header.php";
require "footer.php";
require "database/dbConn.php";
?>

<!DOCTYPE html>
<link href="/css/Site.css" rel="stylesheet" />
