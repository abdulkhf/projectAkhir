<?php
require_once 'koneksi.php';

if (isset($_GET['kelas']) && isset($_GET['bulan'])) {
    $kelas = $_GET['kelas'];
    $bulan = $_GET['bulan'];
    
    $sql = "SELECT s.nama AS nama_siswa, k.nama_kegiatan, p.tanggal, 
                p.pbb, p.fisik, p.public_speaking, p.tanggung_jawab, p.disiplin, p.attitude 
            FROM penilaian p
            JOIN data_siswa s ON p.id_siswa = s.id
            JOIN kegiatan_db k ON p.id_kegiatan = k.id
            WHERE s.kelas = '$kelas' AND DATE_FORMAT(p.tanggal, '%Y-%m') = '$bulan' 
            ORDER BY p.tanggal DESC";
    
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembina LAPORAN</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Styling container utama */
        .container {
            width: 90%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        /* Styling judul */
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }

        /* Styling untuk tabel */
        .table-container {
            width: 100%;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background: #4CAF50;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tr:hover {
            background: #f1f1f1;
            transition: 0.3s ease;
        }

        /* Tombol cetak dan kembali */
        .btn-container {
            display: flex;
            margin-top: 15px;
        }

        .btn-print, .btn-back {
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            margin-right: 10px;
            transition: 0.3s ease-in-out;
        }

        .btn-print {
            background: #4CAF50;
            color: white;
            border: none;
        }

        .btn-print:hover {
            background: #45a049;
        }

        .btn-back {
            background: #e53935;
            color: white;
        }

        .btn-back:hover {
            background: #c62828;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="title">Laporan Penilaian</h2>
    
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
                if (isset($result) && $result->num_rows > 0) {
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
    
    <div class="btn-container">
        <a href="generate_laporan_penilaian.php?kelas=<?php echo $kelas; ?>&bulan=<?php echo $bulan; ?>" class="btn-print">Cetak PDF</a>
        <a href="laporan_pembina.php" class="btn-back">Kembali</a>
    </div>
</div>

</body>
</html>
