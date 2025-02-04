<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
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

        .content {
            flex-grow: 1;
            margin-left: 0px;
            padding: 20px;
            overflow-y: auto;
        }

        .content h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .header {
            position: relative;
            padding: 20px;
            margin-bottom: 20px;
            text-align: left;
        }

        .header .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .header .btn:hover {
            background-color: #218838;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-content {
            padding: 10px;
        }

        .card-content h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .card-content p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }

        .pagination {
            text-align: center;
            margin: 20px 0;
        }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 8px 12px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination a.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .btn-detail {
            display: inline-block;
            padding: 8px 12px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn-detail:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            padding: 10px;
            color: black;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <img src="img/logo BP-Photoroom.png" alt="Logo">
        </div>
        <h2>Pembina</h2>
        <ul>
            <li><a href="pembina_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="kegiatan_pembina.php"><i class="fas fa-bullhorn"></i> Kegiatan</a></li>
            <li><a href="laporan_pembina.php"><i class="fas fa-chart-line"></i> Laporan</a></li>
            <li><a href="penilaian_pembina.php"><i class="fas fa-clipboard-list"></i> Penilaian</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <footer>
            <p>&copy; 2025 Abdul Website</p>
        </footer>
    </div>
    </div>
    <div class="content">
        <h1>Daftar Kegiatan</h1>

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
                echo '<div class="card">';
                echo '<img src="uploads/' . $row['foto'] . '" alt="' . $row['nama_kegiatan'] . '">';
                echo '<div class="card-content">';
                echo '<h3>' . $row['nama_kegiatan'] . '</h3>';
                echo '<p>Tanggal: ' . date('d M Y', strtotime($row['tanggal'])) . '</p>';
                echo '<p>Lokasi: ' . $row['lokasi'] . '</p>';
                echo '<a href="detail_kegiatan_pembina.php?id=' . $row['id'] . '" class="btn btn-detail">Lihat Detail</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="pagination">
            <?php
            for ($i = 1; $i <= $pages; $i++) {
                echo '<a href="?page=' . $i . '" class="' . ($i == $page ? 'active' : '') . '">' . $i . '</a>';
            }
            ?>
        </div>
        <div class="footer">
            <p>&copy; 2025 Kegiatan Ekstrakurikuler</p>
        </div>
    </div>
</body>
</html>
