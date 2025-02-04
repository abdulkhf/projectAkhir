<?php
include 'koneksi.php';

if (isset($_GET['kelas']) && isset($_GET['bulan'])) {
    $kelas = $_GET['kelas'];
    $bulan = $_GET['bulan']; // Format: YYYY-MM
    list($tahun, $bulan_angka) = explode('-', $bulan);

    // Query SQL untuk mengambil data absensi berdasarkan kelas dan bulan
    $query = "SELECT data_absen.*, data_siswa.nama 
              FROM data_absen 
              JOIN data_siswa ON data_absen.user_id = data_siswa.id 
              WHERE data_absen.kelas = ? 
              AND MONTH(data_absen.tanggal) = ? 
              AND YEAR(data_absen.tanggal) = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sii", $kelas, $bulan_angka, $tahun);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembina LAPORAN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .button-container {
            margin-top: 20px;
        }
        .button {
            padding: 10px 15px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        .print-button {
            background-color: #28a745;
            color: white;
        }
        .back-button {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Laporan Absensi</h2>
    <?php if (isset($result) && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td><?= $row['keterangan']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <div class="button-container">
            <a href="generate_laporan.php?kelas=<?= urlencode($kelas); ?>&bulan=<?= urlencode($bulan); ?>" target="_blank">
                <button class="button print-button">Cetak PDF</button>
            </a>
            <button class="button back-button" onclick="window.history.back();">Kembali</button>
        </div>

    <?php else: ?>
        <p>Tidak ada data absensi untuk kelas dan bulan yang dipilih.</p>
        <button class="button back-button" onclick="window.history.back();">Kembali</button>
    <?php endif; ?>
</body>
</html>
