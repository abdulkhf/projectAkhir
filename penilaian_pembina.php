<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembina PENILAIAN</title>
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
        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1300px;
            margin: 20px 0;
            margin-left: 20px;
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

    <form action="proses_penilaian.php" method="POST">
        <h1>Penilaian</h1>
        
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
            <button type="button" onclick="window.location.href='tabel_nilai_pembina.php'" class="tabel-siswa-btn">Tabel Siswa</button>
        </div>
    </form>
</body>
</html>
