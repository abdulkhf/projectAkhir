<?php
include 'koneksi.php'; // Pastikan file ini benar dan koneksi $conn valid

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : null;
    $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : null;
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : null;

    // Periksa apakah semua data telah diisi
    if (empty($kelas) || empty($jurusan) || empty($user_id) || empty($tanggal) || empty($status) || empty($keterangan)) {
        echo "<script>alert('Semua data harus diisi!'); window.location.href='input_data_absen.php';</script>";
        exit;
    }

    // Query SQL untuk menyimpan data
    $query = "INSERT INTO data_absen (kelas, jurusan, user_id, tanggal, status, keterangan) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Periksa jika prepare gagal
    if (!$stmt) {
        echo "<script>alert('Terjadi kesalahan pada query.'); window.location.href='input_data_absen.php';</script>";
        exit;
    }

    // Bind parameter
    $stmt->bind_param("ssisss", $kelas, $jurusan, $user_id, $tanggal, $status, $keterangan);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Data absen berhasil disimpan!'); window.location.href='absensi.php';</script>";
    } else {
        // Tampilkan pesan error jika gagal
        echo "<script>alert('Gagal menyimpan data absen: " . $stmt->error . "'); window.location.href='input_data_absen.php';</script>";
    }

    $stmt->close(); // Tutup statement
    $conn->close(); // Tutup koneksi
} else {
    // Jika metode bukan POST
    echo "<script>alert('Akses tidak valid.'); window.location.href='input_data_absen.php';</script>";
}
?>
