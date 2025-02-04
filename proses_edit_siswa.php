<?php
include 'koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];


$query = "UPDATE data_siswa 
          SET nisn = ?, nama = ?, jenis_kelamin = ?, kelas = ?, jurusan = ?, alamat = ?, telepon = ?
          WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssi", $nisn, $nama, $jenis_kelamin, $kelas, $jurusan, $alamat, $telepon, $id);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='data_siswa.php';</script>";
} else {
    echo "Error: " . $conn->error;
}
