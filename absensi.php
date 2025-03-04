<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User ABSENSI</title>
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
            display: flex;
            height: 100vh;
            background-color: #f4f4f9;
            overflow: hidden;
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
            color: #ffffff;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
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
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
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

        .header .user-info span {
            font-size: 16px;
            color: #555;
        }

        /* Form Styles */
        .form-container {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }
        
        .radio-container {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antar elemen */
        }
    
        .radio-container input[type="radio"] {
            margin: 0 5px 0 0; /* Jarak antara radio dan label */
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

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #999;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
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
            <li><a href="user_dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="absensi.php"><i class="fas fa-user-check"></i> Absensi</a></li>
            <!-- <li><a href="profil.php"><i class="fas fa-user"></i> Profil</a></li> -->
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Absensi</h1>
            <div class="user-info">
                <img src="img/logo.jpg" alt="User Profile">
                <span>John Doe</span>
            </div>
        </div>
        <div class="form-container">
            <h2>Form Input Data Absen</h2>
            <form action="input_data_absen.php" method="post">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="DKV">DKV</option>
                        <option value="ANM">ANM</option>
                        <option value="TB">TB</option>
                        <option value="PHT">PHT</option>
                        <option value="SIJA">SIJA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <select id="nama" name="user_id" required>
                        <option value="">Pilih Nama</option>
                        <!-- Data fetched from database -->
                        <?php
                            // Hubungkan ke database
                            include 'koneksi.php';

                            // Query untuk mengambil data siswa
                            $query = "SELECT id, nama FROM data_siswa ORDER BY nama ASC";
                            $result = $conn->query($query);

                            // Tampilkan data siswa dalam dropdown
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Tidak ada data siswa</option>';
                            }
                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Absen</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="status">Status Kehadiran</label>
                    <div class="radio-container">
                        <input type="radio" id="hadir" name="status" value="Hadir" required>
                        <label for="hadir">Hadir</label>
                        <input type="radio" id="izin" name="status" value="Izin">
                        <label for="izin">Izin</label>
                        <input type="radio" id="sakit" name="status" value="Sakit">
                        <label for="sakit">Sakit</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-submit">Simpan Data Absen</button>
            </form>
        </div>
        <footer>
            <p>&copy; 2025 Dashboard User. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const kelasSelect = document.getElementById("kelas");
    const jurusanSelect = document.getElementById("jurusan");
    const namaSelect = document.getElementById("nama");
    const keteranganInput = document.getElementById("keterangan");
    const tanggalInput = document.getElementById("tanggal");

    // Set batas tanggal maksimal ke hari ini
    const today = new Date().toISOString().split("T")[0];
    tanggalInput.setAttribute("max", today);

    // Filter siswa berdasarkan kelas dan jurusan
    function filterNamaSiswa() {
        const kelas = kelasSelect.value;
        const jurusan = jurusanSelect.value;
        
        fetch("fetch_siswa.php?kelas=" + kelas + "&jurusan=" + jurusan)
            .then(response => response.json())
            .then(data => {
                namaSelect.innerHTML = '<option value="">Pilih Nama</option>';
                data.forEach(siswa => {
                    const option = document.createElement("option");
                    option.value = siswa.id;
                    option.textContent = siswa.nama;
                    namaSelect.appendChild(option);
                });
            })
            .catch(error => console.error("Error fetching data:", error));
    }

    kelasSelect.addEventListener("change", filterNamaSiswa);
    jurusanSelect.addEventListener("change", filterNamaSiswa);

    // Batasi jumlah karakter di keterangan
    keteranganInput.addEventListener("input", function () {
        if (this.value.length > 200) {
            this.value = this.value.slice(0, 200);
        }
    });
});

</script>