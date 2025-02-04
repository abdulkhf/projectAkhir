<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kegiatan = $_POST['id_kegiatan'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';

    if (empty($id_kegiatan) || empty($tanggal)) {
        echo "Kegiatan atau tanggal tidak valid.";
        exit;
    }

    // Ambil informasi kegiatan dari tabel kegiatan_db
    $query_kegiatan = "SELECT nama_kegiatan FROM kegiatan_db WHERE id = ?";
    $stmt_kegiatan = $conn->prepare($query_kegiatan);
    $stmt_kegiatan->bind_param('i', $id_kegiatan);
    $stmt_kegiatan->execute();
    $result_kegiatan = $stmt_kegiatan->get_result();
    
    if ($result_kegiatan->num_rows == 0) {
        echo "Kegiatan tidak ditemukan.";
        exit;
    }
    
    $kegiatan = $result_kegiatan->fetch_assoc();
    $nama_kegiatan = $kegiatan['nama_kegiatan'];

    // Query untuk mengambil siswa yang hadir berdasarkan tanggal dari data_absen dan join ke data_siswa
    $query = "
        SELECT a.user_id, s.nama 
        FROM data_absen a
        JOIN data_siswa s ON a.user_id = s.id
        WHERE a.tanggal = ? AND a.status = 'Hadir'
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $tanggal);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['id_kegiatan'] = $id_kegiatan;
        $_SESSION['nama_kegiatan'] = $nama_kegiatan;
        $_SESSION['tanggal'] = $tanggal;
        $_SESSION['siswa'] = $result->fetch_all(MYSQLI_ASSOC);

        header('Location: nilai.php');
        exit;
    } else {
        echo "Tidak ada siswa yang hadir dalam kegiatan ini pada tanggal tersebut.";
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
?>
