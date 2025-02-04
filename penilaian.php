<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PENILAIAN</title>
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


        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1335px;
            margin: 0px 0;
            margin-left: 0px;
        
        }

        label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 8px;
        }

        select, input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .button-container {
        display: flex;
        gap: 10px;
        margin-top: 10px; /* Jarak dari input tanggal */
    }

    .button-container button {
        padding: 10px 15px;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Tombol Lihat Siswa */
    .button-container button:first-child {
        background-color: #007bff;
        color: white;
    }

    .button-container button:first-child:hover {
        background-color: #0056b3;
    }

    /* Tombol Tabel Siswa */
    .tabel-siswa-btn {
        background-color: #28a745;
        color: white;
    }

    .tabel-siswa-btn:hover {
        background-color: #218838;
    }
    </style>
</head>
<body>
    <!-- Sidebar -->
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

    

    <form action="proses_penilaian.php" method="POST">
    <div class="section-header">
        <h2 class="section-title">Penilaian</h2>
    </div>
        
        <label for="kegiatan">Pilih Kegiatan:</label>
            <select name="id_kegiatan" id="kegiatan" required>
                <option value="">-- Pilih Kegiatan --</option>
                <?php
                include 'koneksi.php';
                $result = $conn->query("SELECT id, nama_kegiatan FROM kegiatan_db");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nama_kegiatan']}</option>";
                }
                ?>
            </select>

        <label for="tanggal">Pilih Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" required>

        <div class="button-container">
            <button type="submit" name="submit">Lihat Siswa</button>
            <button type="button" onclick="window.location.href='tabel_penilaian.php'" class="tabel-siswa-btn">Tabel Siswa</button>
        </div>
    </form>



   
</body>
</html>
