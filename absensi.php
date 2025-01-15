<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Absen</title>
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
            overflow-y: auto; /* Hilangkan scroll horizontal jika ada */
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

        /* Form Styles */
        .form-container {
            flex: 1; /* Agar konten menyesuaikan tinggi layar */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f9f9f9;
            overflow-y: auto; /* Scroll untuk form jika konten terlalu panjang */
        }

        .form-container form {
            max-width: 1500px;
            width: 100%;
            margin: 0 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            
            padding: 20px;
        }

h2 {
    text-align: center;
    color: #4CAF50;
    margin-bottom: 20px;
    margin-top: 30px;
    
    
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="date"],
textarea,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

input[type="radio"] {
    margin-right: 5px;
}

textarea {
    resize: none;
}

button.btn-submit {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}

button.btn-submit:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <img src="img/logo.jpg" alt="Logo">
        </div>
        <h2>Navigation</h2>
        <ul>
            <li><a href="user_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="absensi.php"><i class="fas fa-user-graduate"></i> Absensi</a></li>
            <li><a href="dataa_siswa.php"><i class="fas fa-chart-line"></i> Data Siswa</a></li>
            <li><a href="profil_user.php"><i class="fas fa-calendar-check"></i> Profil Saya</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <footer>
            <p>&copy; 2025 Abdul Website</p>
        </footer>
    </div>

    <div class="form-container">
        <h2>Form Input Data Absen</h2>
        <form action="input_data_absen.php" method="post">
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select id="kelas" name="kelas" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select id="jurusan" name="jurusan" class="form-control" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="RPL">RPL</option>
                    <option value="TKJ">TKJ</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>
            <div class="form-group">
                <label for="siswa">Nama Siswa</label>
                <select id="siswa" name="user_id" class="form-control" required>
                    <option value="">Pilih Siswa</option>
                    <?php
                    // Ambil data siswa berdasarkan kelas dan jurusan dari database
                    include 'koneksi.php';
                    $query = "SELECT id, nama, kelas, jurusan FROM data_siswa";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}' data-kelas='{$row['kelas']}' data-jurusan='{$row['jurusan']}'>
                              {$row['nama']}
                              </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Absen</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status Kehadiran</label>
                <div>
                    <input type="radio" id="hadir" name="status" value="Hadir" required>
                    <label for="hadir">Hadir</label>
                    <input type="radio" id="izin" name="status" value="Izin">
                    <label for="izin">Izin</label>
                    <input type="radio" id="sakit" name="status" value="Sakit">
                    <label for="sakit">Sakit</label>
                    <input type="radio" id="alpha" name="status" value="Alpha">
                    <label for="alpha">Alpha</label>
                </div>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-submit">Simpan Data Absen</button>
        </form>
    </div>
</body>
</html>
