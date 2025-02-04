<?php
include 'koneksi.php'; // Pastikan file koneksi ada

// Set jumlah data per halaman
$limit = 10;

// Ambil halaman saat ini dari parameter URL (default = 1)
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$offset = ($halaman - 1) * $limit; // Menghitung offset data

// Query untuk mendapatkan data absen dengan pagination
$query = "SELECT a.id, s.nama, a.kelas, a.jurusan, a.tanggal, a.status, a.keterangan 
          FROM data_absen a 
          JOIN data_siswa s ON a.user_id = s.id
          LIMIT $limit OFFSET $offset";
$result = $conn->query($query);

// Hitung total data untuk pagination
$total_query = "SELECT COUNT(*) as total FROM data_absen";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_data = $total_row['total'];

// Hitung jumlah halaman
$total_halaman = ceil($total_data / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Absen</title>
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



/* Styling untuk container form dan tabel */
.form-container, .table-container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Styling untuk form input */
.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="date"], select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

textarea {
    resize: vertical;
}

input[type="radio"] {
    margin-right: 10px;
}

/* Styling untuk button submit */
.btn-submit {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-submit:hover {
    background-color: #45a049;
}

/* Styling untuk tabel data absen */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 12px;
    text-align: center;
    vertical-align: middle;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #007bff;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

/* Responsif: Menyesuaikan ukuran tabel pada perangkat kecil */
@media (max-width: 768px) {
    .form-container, .table-container {
        width: 95%;
    }

    table, th, td {
        font-size: 14px;
    }
}

.pagination {
            margin-top: 20px;
            text-align: left;
            padding-left: 20px;
        }
        .pagination a, .pagination span {
            padding: 8px 12px;
            margin: 5px;
            text-decoration: none;
            background-color: #f1f1f1;
            color: #007bff;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }
        .pagination .active {
            background-color: #007bff;
            color: white;
            pointer-events: none;
        }

    </style>
</head>
<body>

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

    <div class="table-container">
    <div class="section-header">
        <h2 class="section-title">Data Absensi</h2>
    </div>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Tanggal</th>
                    <th>Status Kehadiran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if ($result->num_rows > 0) {
                    $no = $offset + 1; // Nomor urut dimulai dari offset
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['kelas']}</td>
                                <td>{$row['jurusan']}</td>
                                <td>{$row['tanggal']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['keterangan']}</td>
                            </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data tersedia.</td></tr>";
                }
            ?>
            </tbody>
        </table>
            <div class="pagination">
                <?php if ($halaman > 1): ?>
                    <a href="?halaman=<?= $halaman - 1 ?>">Sebelumnya</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_halaman; $i++): ?>
                    <?php if ($i == $halaman): ?>
                        <span class="active"><?= $i ?></span>
                    <?php else: ?>
                        <a href="?halaman=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($halaman < $total_halaman): ?>
                    <a href="?halaman=<?= $halaman + 1 ?>">Berikutnya</a>
                <?php endif; ?>
            </div>
    </div>

</body>
</html>
