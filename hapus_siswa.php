<?php
include 'koneksi.php'; // Pastikan koneksi database sudah benar

// Ambil ID dari URL
$id = $_GET['id'];

// Hapus data terkait di tabel `data_absen`
$query_absen = "DELETE FROM data_absen WHERE user_id = ?";
$stmt_absen = $conn->prepare($query_absen);
$stmt_absen->bind_param("i", $id);

if ($stmt_absen->execute()) {
    // Hapus data di tabel `data_siswa`
    $query_siswa = "DELETE FROM data_siswa WHERE id = ?";
    $stmt_siswa = $conn->prepare($query_siswa);
    $stmt_siswa->bind_param("i", $id);

    if ($stmt_siswa->execute()) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='data_siswa.php';</script>";
    } else {
        echo "Error menghapus data siswa: " . $conn->error;
    }
} else {
    echo "Error menghapus data terkait: " . $conn->error;
}
?>
