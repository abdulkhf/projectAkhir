<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}


include 'koneksi.php'; // Koneksi database

// Query total siswa
$query_total_students = "SELECT COUNT(*) AS total_students FROM data_siswa";
$result_students = $conn->query($query_total_students);
$total_students = ($result_students->num_rows > 0) ? $result_students->fetch_assoc()['total_students'] : 0;

// Tanggal hari ini
$tanggal_hari_ini = date('Y-m-d');

// Query siswa hadir
$query_siswa_hadir = "SELECT COUNT(*) AS siswa_hadir FROM data_absen WHERE tanggal = '$tanggal_hari_ini' AND status = 'Hadir'";
$result_hadir = $conn->query($query_siswa_hadir);
$siswa_hadir = ($result_hadir->num_rows > 0) ? $result_hadir->fetch_assoc()['siswa_hadir'] : 0;

// Query siswa izin
$query_siswa_izin = "SELECT COUNT(*) AS siswa_izin FROM data_absen WHERE tanggal = '$tanggal_hari_ini' AND status = 'Izin'";
$result_izin = $conn->query($query_siswa_izin);
$siswa_izin = ($result_izin->num_rows > 0) ? $result_izin->fetch_assoc()['siswa_izin'] : 0;

// Query siswa sakit
$query_siswa_sakit = "SELECT COUNT(*) AS siswa_sakit FROM data_absen WHERE tanggal = '$tanggal_hari_ini' AND status = 'Sakit'";
$result_sakit = $conn->query($query_siswa_sakit);
$siswa_sakit = ($result_sakit->num_rows > 0) ? $result_sakit->fetch_assoc()['siswa_sakit'] : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DASHBOARD</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Styling untuk body dan keseluruhan halaman */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh; /* Tinggi layar penuh */
            overflow: hidden; /* Hilangkan scroll horizontal jika ada */
        }

        /* Sidebar kiri */
        .sidebar {
            width: 250px; /* Lebar sidebar */
            background-color: #1e88e5; /* Warna latar sidebar */
            color: #ffffff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Logo di atas */
        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 100px; /* Ukuran logo */
            border-radius: 50%; /* Membuat logo berbentuk lingkaran */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar h2 {
            text-align: center;
            transform: translateY(-60px);
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            transform: translateY(-90px);
        }

        .sidebar ul li {
            margin: 15px 0;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background-color 0.3s, color 0.3s ease;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #1565c0;
            color: #bbdefb;
        }

        .sidebar ul li a i {
            font-size: 18px;
        }

        /* Footer di sidebar */
        .sidebar footer {
            text-align: center;
            font-size: 14px;
            color: #e3f2fd;
        }

        /* Konten utama */
        /* Main content */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f4f6f9;
            overflow-y: auto;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding: 20px;
            margin-top: -20px;

        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            margin: 0;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #555;
        }

        .card p {
            font-size: 16px;
            color: #888;
        }

        .card i {
            font-size: 40px;
            color: #1e88e5;
            margin-bottom: 10px;
        }

        .chart-container {
            margin-top: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="img/logo BP-Photoroom.png" alt="Logo">
        </div>
        <h2>Admin</h2>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="data_siswa.php"><i class="fas fa-user-graduate"></i> Data Siswa</a></li>
            <li><a href="laporan.php"><i class="fas fa-chart-line"></i> Laporan</a></li>
            <li><a href="data_absen.php"><i class="fas fa-calendar-check"></i> Data Absen</a></li>
            <li><a href="kegiatan.php"><i class="fas fa-bullhorn"></i> Kegiatan</a></li>
            <li><a href="penilaian.php"><i class="fas fa-clipboard-list"></i> Penilaian</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <footer>
            <p>&copy; 2025 Abdul Website</p>
        </footer>
    </div>

    <div class="main-content">
    <div class="section-header">
        <h2 class="section-title">Admin Dashboard</h2>
    </div>

        <div class="cards">
        <div class="card">
            <i class="fas fa-user-graduate"></i>
            <h3>Total Siswa</h3>
            <p><?php echo $total_students; ?></p>
        </div>
        <div class="card">
            <i class="fas fa-chalkboard-teacher"></i>
            <h3>Siswa Hadir</h3>
            <p><?php echo $siswa_hadir; ?></p>
        </div>
        <div class="card">
            <i class="fas fa-calendar-check"></i>
            <h3>Siswa Izin</h3>
            <p><?php echo $siswa_izin; ?></p>
        </div>
        <div class="card">
            <i class="fas fa-users"></i>
            <h3>Siswa Sakit</h3>
            <p><?php echo $siswa_sakit; ?></p>
        </div>
    </div>

</body>
</html>
