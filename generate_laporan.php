<?php
require('includes/fpdf/fpdf.php'); // Pastikan file FPDF tersedia
include 'koneksi.php';

// Ambil data dari form
$kelas = $_GET['kelas'];
$jurusan = $_GET['jurusan'];
$tanggal_mulai = $_GET['tanggal_mulai'];
$tanggal_selesai = $_GET['tanggal_selesai'];

// Query data berdasarkan filter
$query = "SELECT * FROM data_absen 
          WHERE kelas = ? AND jurusan = ? AND tanggal BETWEEN ? AND ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $kelas, $jurusan, $tanggal_mulai, $tanggal_selesai);
$stmt->execute();
$result = $stmt->get_result();

// Inisialisasi FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Header PDF
$pdf->Cell(0, 10, 'Laporan Kehadiran Siswa', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Kelas: $kelas | Jurusan: $jurusan", 0, 1, 'C');
$pdf->Cell(0, 10, "Periode: $tanggal_mulai s/d $tanggal_selesai", 0, 1, 'C');
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
    $pdf->Cell(40, 10, $row['nama'], 1, 0);
    $pdf->Cell(30, 10, $row['tanggal'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['status'], 1, 0, 'C');
    $pdf->Cell(80, 10, $row['keterangan'], 1, 1);
}

// Output PDF
$pdf->Output();
?>
