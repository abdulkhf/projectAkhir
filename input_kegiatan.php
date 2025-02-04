<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Kegiatan</title>
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
            top: 0;
            left: 0;
            bottom: 0;
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
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 18px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #1565c0;
        }

        .sidebar footer {
            text-align: center;
            font-size: 14px;
            color: #e3f2fd;
        }

        .main-container {
            margin-left: 300px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(255, 255, 255);
        }

        .form-container {
            width: 1300px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #f4f4f9;
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="img/logo.jpg" alt="Logo">
        </div>
        <h2>Admin</h2>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="data_siswa.php"><i class="fas fa-user-graduate"></i> Data Siswa</a></li>
            <li><a href="laporan.php"><i class="fas fa-chart-line"></i> Laporan</a></li>
            <li><a href="data_absen.php"><i class="fas fa-calendar-check"></i> Data Absen</a></li>
            <li><a href="kegiatan.php"><i class="fas fa-bullhorn"></i> Kegiatan</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <footer>
            <p>&copy; 2025 Abdul Website</p>
        </footer>
    </div>

    <div class="main-container">
        <div class="form-container">
            <h2>Input Kegiatan Baru</h2>
            <form action="proses_inp_kegiatan.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Kegiatan</label>
        <input type="text" id="nama" name="nama_kegiatan" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" required>
    </div>
    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" id="lokasi" name="lokasi" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" required></textarea>
    </div>
    <div class="form-group">
        <label for="foto">Foto Dokumentasi</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>
    </div>
    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

        </div>
    </div>
</body>
</html>
