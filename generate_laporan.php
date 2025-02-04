<?php
require('includes/fpdf/fpdf.php'); // Pastikan file FPDF tersedia
include 'koneksi.php';

// Ambil data dari form
$kelas = $_GET['kelas'];
$bulan = $_GET['bulan']; // Format: YYYY-MM

// Pisahkan tahun dan bulan dari input
list($tahun, $bulan_angka) = explode('-', $bulan);

// Query SQL untuk filter berdasarkan kelas dan bulan
$query = "SELECT data_absen.*, data_siswa.nama 
          FROM data_absen 
          JOIN data_siswa ON data_absen.user_id = data_siswa.id 
          WHERE data_absen.kelas = ? 
          AND MONTH(data_absen.tanggal) = ? 
          AND YEAR(data_absen.tanggal) = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sii", $kelas, $bulan_angka, $tahun);

// Eksekusi query
$stmt->execute();
$result = $stmt->get_result();

// Inisialisasi FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Header PDF
$pdf->Cell(0, 10, 'Laporan Kehadiran Siswa', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Kelas: $kelas", 0, 1, 'C');
$pdf->Cell(0, 10, "Periode: $bulan", 0, 1, 'C');
$pdf->Ln(10);

// Table Header
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 10, 'Tanggal', 1, 0, 'C');
$pdf->Cell(30, 10, 'Status', 1, 0, 'C');
$pdf->Cell(80, 10, 'Keterangan', 1, 1, 'C');

// Table Content
$pdf->SetFont('Arial', '', 10);
$no = 1;
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(40, 10, $row['nama'], 1, 0); // Gunakan nama dari hasil query
    $pdf->Cell(30, 10, $row['tanggal'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['status'], 1, 0, 'C');
    $pdf->Cell(80, 10, $row['keterangan'], 1, 1);
}

// Output PDF
$pdf->Output();
?>
