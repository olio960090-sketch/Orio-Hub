<?php
$host = "localhost";  // usually 'localhost'
$user = "root";       // your MySQL username
$pass = "";           // your MySQL password
$dbname = "screen_recorder_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
