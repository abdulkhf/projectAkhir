<?php
$host = 'localhost'; // Sesuaikan dengan server Anda
$user = 'root';      // Username database
$pass = '';          // Password database
$db = 'app';   // Nama database Anda

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
