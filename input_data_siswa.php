<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "app");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$telepon = $_POST['telepon'];

// Tentukan user_type
$user_type = 'admin';

// Simpan data ke tabel data_siswa
$sql = "INSERT INTO data_siswa (nisn, nama, jenis_kelamin, alamat, kelas, jurusan, telepon,  user_type) 
        VALUES ('$nisn', '$nama', '$jenis_kelamin', '$alamat', '$kelas', '$jurusan', '$telepon', '$user_type')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data siswa berhasil disimpan!');
            window.location.href = 'data_siswa.php';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
