<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

$query = "DELETE FROM data_siswa WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='data_siswa.php';</script>";
} else {
    echo "Error: " . $conn->error;
}
