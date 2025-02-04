<?php
include 'koneksi.php';

$kelas = $_GET['kelas'] ?? '';
$jurusan = $_GET['jurusan'] ?? '';

$query = "SELECT id, nama FROM data_siswa WHERE kelas = '$kelas' AND jurusan = '$jurusan' ORDER BY nama ASC";
$result = $conn->query($query);

$siswa = [];
while ($row = $result->fetch_assoc()) {
    $siswa[] = $row;
}

echo json_encode($siswa);
?>
