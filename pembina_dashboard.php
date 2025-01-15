<?php
session_start();
if ($_SESSION['role'] !== 'pembina') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembina Dashboard</title>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="main-content">
        <div class="header">
            <h1>Selamat Datang, Pembina!</h1>
            <p>Kelola jadwal kegiatan dan laporan di sini.</p>
        </div>
        <div class="dashboard-cards">
            <div class="card">
                <i class="fas fa-calendar-alt"></i>
                <h3>Jadwal Kegiatan</h3>
                <p>Atur dan kelola jadwal kegiatan.</p>
            </div>
            <div class="card">
                <i class="fas fa-file-alt"></i>
                <h3>Laporan Kegiatan</h3>
                <p>Lihat dan buat laporan kegiatan.</p>
            </div>
            <div class="card">
                <i class="fas fa-users"></i>
                <h3>Data Siswa</h3>
                <p>Kelola data siswa yang aktif.</p>
            </div>
        </div>
    </div>
</body>
</html>
