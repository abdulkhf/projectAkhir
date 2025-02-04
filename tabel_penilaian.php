<?php
include 'koneksi.php';

// Query untuk mengambil data dari tabel penilaian
$sql = "SELECT p.id, s.nama AS nama_siswa, k.nama_kegiatan, p.tanggal, 
        p.pbb, p.fisik, p.public_speaking, p.tanggung_jawab, p.disiplin, p.attitude 
        FROM penilaian p
        JOIN data_siswa s ON p.id_siswa = s.id
        JOIN kegiatan_db k ON p.id_kegiatan = k.id
        ORDER BY p.tanggal DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Penilaian</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            min-width: 600px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d9edf7;
            transition: 0.3s;
        }

        .btn-back {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Tabel Hasil Penilaian</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                    <th>PBB</th>
                    <th>Fisik</th>
                    <th>Public Speaking</th>
                    <th>Disiplin</th>
                    <th>Attitude</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama_siswa']}</td>
                                <td>{$row['nama_kegiatan']}</td>
                                <td>{$row['tanggal']}</td>
                                <td>{$row['pbb']}</td>
                                <td>{$row['fisik']}</td>
                                <td>{$row['public_speaking']}</td>
                                <td>{$row['disiplin']}</td>
                                <td>{$row['attitude']}</td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='10'>Tidak ada data penilaian.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <a href="penilaian.php" class="btn-back">Kembali</a>
</body>
</html>
