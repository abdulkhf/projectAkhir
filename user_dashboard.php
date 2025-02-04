<?php
session_start();
if ($_SESSION['role'] !== 'user') {
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
    <title>User DASHBOARD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #1e88e5;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
            margin-left: 55px;
        }

        .sidebar .logo img {
            width: 100px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar h2 {
            text-align: center;
            margin: 15px 0;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 13px 0;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: hsl(212, 80.30%, 41.80%);
        }

        .sidebar ul li a i {
            font-size: 18px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            overflow-y: auto;
            height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .header .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
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
            color: #555;
        }

        .card i {
            font-size: 40px;
            color: #1e88e5;
            margin-bottom: 10px;
        }

        .daftar-kegiatan {
    text-align: left;
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-top: 40px; /* Atur jarak dari elemen atas */
    margin-bottom: 20px; /* Jarak dengan daftar kegiatan */
}


        /* Kartu Foto Kegiatan */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .photo-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .photo-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .photo-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 3px solid #007bff;
        }

        .photo-card-content {
            padding: 15px;
            text-align: center;
        }

        .photo-card-content h3 {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .btn-detail {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-detail:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #999;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                width: 180px;
            }
            .main-content {
                margin-left: 180px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="img/logo BP-Photoroom.png" alt="Logo">
        </div>
        <h2>User</h2>
        <ul>
            <li><a href="user_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="absensi.php"><i class="fas fa-user-check"></i> Absensi</a></li>
            <!-- <li><a href="profil.php"><i class="fas fa-user"></i> Profil</a></li> -->
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="user-info">
                <img src="img/logo.jpg" alt="logo">
                <span>John Doe</span>
            </div>
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

    <h2 class="daftar-kegiatan">Daftar Kegiatan</h2>



        <div class="card-grid">
        <?php
            include 'koneksi.php';

            $limit = 16; // 4 baris x 4 kolom
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($page > 1) ? ($page * $limit) - $limit : 0;

            $result = $conn->query("SELECT * FROM kegiatan_db LIMIT $start, $limit");
            $total = $conn->query("SELECT COUNT(*) AS total FROM kegiatan_db")->fetch_assoc()['total'];
            $pages = ceil($total / $limit);

            while ($row = $result->fetch_assoc()) {
                // Jika foto tidak tersedia, gunakan gambar default
                $foto = !empty($row['foto']) ? 'uploads/' . $row['foto'] : 'img/default.jpg';
                
                echo '<div class="card">';
                echo '<img src="' . $foto . '" alt="' . htmlspecialchars($row['nama_kegiatan'], ENT_QUOTES) . '">';
                echo '<div class="card-content">';
                echo '<h3>' . htmlspecialchars($row['nama_kegiatan'], ENT_QUOTES) . '</h3>';
                echo '<p>Tanggal: ' . date('d M Y', strtotime($row['tanggal'])) . '</p>';
                echo '<p>Lokasi: ' . htmlspecialchars($row['lokasi'], ENT_QUOTES) . '</p>';
                echo '<a href="detail_kegiatan_user.php?id=' . $row['id'] . '" class="btn btn-detail">Lihat Detail</a>';
                echo '</div>';
                echo '</div>';
            }
        ?>
        </div>
        <footer>
            <p>&copy; 2025 Dashboard User. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
