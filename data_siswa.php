<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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

        .container {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
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

        .btn-add {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }


        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #ffffff;
        }

        .table th, .table td {
            text-align: center;
            padding: 12px;
            border: 1px solid #dee2e6;
        }

        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .table-striped tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn-edit {
            background-color: #28a745;
            color: #ffffff;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .pagination {
    display: flex;
    justify-content: left;
    padding: 10px 0;
}

.pagination .page-item {
    list-style: none;
    margin: 0 5px;
}

.pagination .page-link {
    display: block;
    padding: 8px 12px;
    border: 1px solid #007bff;
    border-radius: 5px;
    color: #007bff;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.pagination .page-link:hover {
    background-color: #007bff;
    color: white;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
    cursor: default;
    background-color: transparent;
    border: none;
}

        .table-responsive {
            overflow-x: auto;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            background-color: #ffffff;
            padding: 10px;
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

<div class="container">
<div class="section-header">
        <h2 class="section-title">Data Siswa</h2>
        <a href="inp_data_siswa.php" class="btn-add">+ Input Siswa</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
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

                    // Tentukan jumlah data per halaman
                    $limit = 10;

                    // Ambil halaman saat ini dari parameter URL (default: halaman 1)
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $page = max($page, 1); // Halaman minimal adalah 1

                    // Hitung offset (data awal yang akan ditampilkan)
                    $offset = ($page - 1) * $limit;

                    // Ambil total jumlah data
                    $total_sql = "SELECT COUNT(*) AS total FROM data_siswa";
                    $total_result = $conn->query($total_sql);
                    $total_row = $total_result->fetch_assoc();
                    $total_data = $total_row['total'];

                    // Hitung total halaman
                    $total_pages = ceil($total_data / $limit);

                    // Ambil data siswa sesuai limit dan offset
                    $sql = "SELECT * FROM data_siswa LIMIT $limit OFFSET $offset";
                    $result = $conn->query($sql);
                ?>
                <?php
            if ($result->num_rows > 0) {
                $no = $offset + 1; // Penomoran dimulai dari offset + 1
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>{$no}</td>
                            <td>{$row['nisn']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['kelas']}</td>
                            <td>{$row['jurusan']}</td>
                            <td>{$row['jenis_kelamin']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['telepon']}</td>
                            <td>
                                <a href='edit_siswa.php?id={$row['id']}' class='btn-edit'>Edit</a>
                                <a href='hapus_siswa.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                        </tr>
                    ";
                    $no++;
                }
            } else {
                echo "
                    <tr>
                        <td colspan='10' class='text-center'>Tidak ada data siswa</td>
                    </tr>
                ";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="pagination text-center">
        <nav>
            <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Sebelumnya</a>
                </li>
            <?php endif; ?>

            <?php if ($page > 2): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=1">1</a>
                </li>
                <?php if ($page > 3): ?>
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php for ($i = max(1, $page - 1); $i <= min($total_pages, $page + 1); $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $total_pages - 1): ?>
                <?php if ($page < $total_pages - 2): ?>
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                <?php endif; ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a>
                </li>
            <?php endif; ?>

            <?php if ($page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Berikutnya</a>
                </li>
            <?php endif; ?>
            </ul>
        </nav>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
