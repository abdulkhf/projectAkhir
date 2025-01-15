<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

/* Styling untuk body dan keseluruhan halaman */
body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow-y: auto; 
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

        /* General Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f9fc;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.section-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #4CAF50;
}

.form-container {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="email"],
textarea,
select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus,
select:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
    outline: none;
}

textarea {
    resize: none;
}

.form-check {
    margin-bottom: 10px;
}

.form-check-input {
    margin-right: 10px;
}

.form-check-label {
    font-size: 14px;
    color: #555;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.btn:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

.btn:active {
    background-color: #3e8e41;
    transform: translateY(0);
}

.text-center {
    text-align: center;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.col-md-6 {
    flex: 1;
    padding: 10px;
    min-width: 300px;
}



.container {
    max-width: 2000px;
    margin: 20px auto;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 20px;
    margin-right: none;
    flex-grow: 1;
    overflow-y: auto;
    justify-content: center;
    align-items: center;
    
}

.section-title {
    font-size: 24px;
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
}

.form-container {
    margin-bottom: 40px;
}

.form-group label {
    font-weight: bold;
    color: #495057;
}

.form-control, .form-select {
    border-radius: 6px;
    border: 1px solid #ced4da;
    padding: 8px;
}

textarea.form-control {
    resize: none;
}

.table {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
}

.table th, .table td {
    text-align: center;
    padding: 12px;
    border: 1px solid #dee2e6;
}

.table thead {
    background-color: #343a40;
    color: #ffffff;
}

.btn {
    border-radius: 4px;
    padding: 8px 12px;
    font-size: 14px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-edit {
    background-color: #28a745;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    padding: 8px 12px;
    font-size: 14px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-edit:hover {
    background-color: #218838;
}


.btn-delete {
    background-color: #dc3545;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    padding: 8px 12px;
    font-size: 14px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-delete:hover {
    background-color: #c82333;
}

.text-center {
    text-align: center;
}

.table-responsive {
    overflow-x: auto;
}

@media (max-width: 576px) {
    .section-title {
        font-size: 20px;
    }

    .form-group label {
        font-size: 14px;
    }

    .btn {
        font-size: 12px;
    }
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
            <li><a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="data_siswa.php"><i class="fas fa-user-graduate"></i> Data Siswa</a></li>
            <li><a href="laporan.php"><i class="fas fa-chart-line"></i> Laporan</a></li>
            <li><a href="data_absen.php"><i class="fas fa-calendar-check"></i> Data Absen</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <footer>
            <p>&copy; 2025 Abdul Website</p>
        </footer>
    </div>


    <div class="container">
        <h2 class="section-title text-center">Input Data Siswa</h2>
        <div class="form-container">
            <form action="input_data_siswa.php" method="POST">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nis">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="laki" name="jenis_kelamin" value="Laki-Laki" checked>
                                <label for="laki" class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="perempuan" name="jenis_kelamin" value="Perempuan">
                                <label for="perempuan" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="3" required></textarea>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" id="kelas" name="kelas" required>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan" required>
                                <option value="RPL">RPL</option>
                                <option value="TKJ">TKJ</option>
                                <option value="DKV">DKV</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telepon">No Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu" required>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>

        <!-- Tabel Data Siswa -->
        <h2 class="section-title text-center mt-5">Data Siswa</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Koneksi ke database
                $conn = new mysqli("localhost", "root", "", "app");

                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Ambil data siswa dari database
                $sql = "SELECT * FROM data_siswa";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nisn']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['kelas']}</td>
                                <td>{$row['jurusan']}</td>
                                <td>{$row['jenis_kelamin']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['telepon']}</td>
                                <td>
                                    <a href='edit_siswa.php?id={$row['id']}' class='btn-edit'>Edit</a>
                                    <a href='hapus_siswa.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                                </td>

                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='11' class='text-center'>Tidak ada data siswa</td></tr>";
                }

                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
