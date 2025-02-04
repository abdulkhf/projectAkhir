<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #1e88e5;
            color: #ffffff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            height: 100vh;
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
            transform: translateY(-73px);
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            transform: translateY(-116.5px);
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

        .sidebar footer {
            text-align: center;
            font-size: 14px;
            color: #e3f2fd;
            transform: translateY(-40px);
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow-y: auto;
        }

        .form-container {
            margin-left: 280px;
            width: 100%;
            padding: 20px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding: 20px;

        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            margin: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 5px 15px; /* Ukuran tombol lebih kecil */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px; /* Ukuran teks lebih kecil */
            width: auto; /* Tidak memenuhi lebar form */
            display: block; /* Agar bisa diposisikan di kiri */
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #45a049;
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

<div class="form-container">
<div class="section-header">
        <h2 class="section-title">Laporan</h2>
    </div>

        
        <form action="laporan_absen_pembina_pdf.php" method="get">
            <h3>Laporan Absensi</h3>
            <div class="form-group">
                <label for="kelas_absensi">Pilih Kelas:</label>
                <select id="kelas_absensi" name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bulan_absensi">Pilih Bulan:</label>
                <input type="month" id="bulan_absensi" name="bulan" required>
            </div>
            <div style="text-align: left;">
                <button type="submit" class="btn-submit">Cari Absensi Siswa</button>
            </div>

        </form>
        
        <hr>
        
        <form action="laporan_nilai_pembina_pdf.php" method="get">
            <h3>Laporan Penilaian</h3>
            <div class="form-group">
                <label for="kelas_penilaian">Pilih Kelas:</label>
                <select id="kelas_penilaian" name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bulan_penilaian">Pilih Bulan:</label>
                <input type="month" id="bulan_penilaian" name="bulan" required>
            </div>
            <div style="text-align: left;">
                <button type="submit" class="btn-submit">Cari Penilaian Siswa</button>
            </div>

        </form>

</div>
</body>
</html>
