<?php
$host = "localhost";
$user = "teresa";
$password = "1234";
$dbname = "animales_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
