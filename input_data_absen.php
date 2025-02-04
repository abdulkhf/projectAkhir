<?php
include 'koneksi.php'; // Pastikan file ini benar dan koneksi $conn valid

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $kelas = htmlspecialchars(trim($_POST['kelas'] ?? ''));
    $jurusan = htmlspecialchars(trim($_POST['jurusan'] ?? ''));
    $user_id = htmlspecialchars(trim($_POST['user_id'] ?? ''));
    $tanggal = htmlspecialchars(trim($_POST['tanggal'] ?? ''));
    $status = htmlspecialchars(trim($_POST['status'] ?? ''));
    $keterangan = htmlspecialchars(trim($_POST['keterangan'] ?? ''));

    // Periksa apakah semua data telah diisi
    if (empty($kelas) || empty($jurusan) || empty($user_id) || empty($tanggal) || empty($status)) {
        echo "<script>alert('Semua data wajib diisi!'); window.location.href='input_data_absen.php';</script>";
        exit;
    }

    try {
        // Query SQL untuk menyimpan data
        $query = "INSERT INTO data_absen (kelas, jurusan, user_id, tanggal, status, keterangan) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Kesalahan pada query: " . $conn->error);
        }

        // Bind parameter
        $stmt->bind_param("ssisss", $kelas, $jurusan, $user_id, $tanggal, $status, $keterangan);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "<script>alert('Data absen berhasil disimpan!'); window.location.href='absensi.php';</script>";
        } else {
            throw new Exception("Gagal menyimpan data absen: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Tangkap error dan tampilkan
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='input_data_absen.php';</script>";
    } finally {
        // Pastikan koneksi dan statement selalu ditutup
        $stmt->close();
        $conn->close();
    }
} else {
    // Jika metode bukan POST
    echo "<script>alert('Akses tidak valid.'); window.location.href='input_data_absen.php';</script>";
}
?>
