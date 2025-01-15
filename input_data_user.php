<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "app");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nisn = $_POST['nisn'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$telepon = $_POST['telepon'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];

// Tentukan user_type
$user_type = 'admin';

// Simpan data ke tabel data_siswa
$sql = "INSERT INTO data_siswa (nisn, email, nama, jenis_kelamin, alamat, kelas, jurusan, telepon, nama_ayah, nama_ibu, user_type) 
        VALUES ('$nisn', '$email', '$nama', '$jenis_kelamin', '$alamat', '$kelas', '$jurusan', '$telepon', '$nama_ayah', '$nama_ibu', '$user_type')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data siswa berhasil disimpan!');
            window.location.href = 'dataa_siswaa.php';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
