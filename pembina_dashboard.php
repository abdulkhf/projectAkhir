<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembina DASHBOARD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Styling untuk body dan keseluruhan halaman */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar kiri */
        .sidebar {
            width: 250px;
            background-color: #1e88e5;
            color: #ffffff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 100px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar h2 {
            text-align: center;
            transform: translateY(-63.5px);
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            transform: translateY(-92px);
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
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f4f6f9;
            overflow-y: auto;
        }

        .content h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .sidebar ul li a {
                font-size: 14px;
            }
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

    <div class="content">
        <h1>Selamat Datang, Pembina</h1>
        <p>Gunakan menu di sebelah kiri untuk mengakses fitur-fitur yang tersedia.</p>
        <p>Halaman ini adalah dashboard utama untuk pembina, tempat Anda dapat mengelola kegiatan, laporan, dan penilaian.</p>
    </div>
</body>
</html>
