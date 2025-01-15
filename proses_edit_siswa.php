<?php
include 'koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$nisn = $_POST['nisn'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];

$query = "UPDATE data_siswa 
          SET nisn = ?, email = ?, nama = ?, jenis_kelamin = ?, kelas = ?, jurusan = ?, alamat = ?, telepon = ?, nama_ayah = ?, nama_ibu = ?
          WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssssssi", $nisn, $email, $nama, $jenis_kelamin, $kelas, $jurusan, $alamat, $telepon, $nama_ayah, $nama_ibu, $id);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='data_siswa.php';</script>";
} else {
    echo "Error: " . $conn->error;
}
