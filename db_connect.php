<?php
// Database connection file
$host = "localhost";
$username = "root";
$password = "";
$dbname = "urms_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
