<?php
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

class DB {
    private static $init = FALSE;
    public static $conn;

    public static function initialize() {
        global $conn;
        if (self::$init) return;
        self::$conn = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PW'], $_ENV['DB']);
        if (self::$conn->connect_error) {
            echo "<h1>Connection failed<h1>";
            die("Connection failed: " . self::$conn->connect_error);
        } else {
            echo "<h1>Connected successfully<h1>";
        }
        self::$init = TRUE;
    }
}

DB::initialize();
?>