<?php
require('includes/fpdf/fpdf.php'); // Pastikan file FPDF tersedia
include 'koneksi.php';

$kelas = $_GET['kelas'];
$bulan = $_GET['bulan']; 

// Query untuk mengambil data penilaian
$query = "SELECT s.nama AS nama_siswa, k.nama_kegiatan, p.tanggal, 
                p.pbb, p.fisik, p.public_speaking, p.tanggung_jawab, p.disiplin, p.attitude 
            FROM penilaian p
            JOIN data_siswa s ON p.id_siswa = s.id
            JOIN kegiatan_db k ON p.id_kegiatan = k.id
            WHERE s.kelas = '$kelas' AND DATE_FORMAT(p.tanggal, '%Y-%m') = '$bulan'
            ORDER BY p.tanggal DESC";

$result = $conn->query($query);

// Inisialisasi FPDF
$pdf = new FPDF('L', 'mm', 'A4'); // Orientasi Landscape
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Header PDF
$pdf->Cell(0, 10, 'LAPORAN PENILAIAN SISWA', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 8, "Kelas: $kelas", 0, 1, 'C');
$pdf->Cell(0, 8, "Periode: $bulan", 0, 1, 'C');
$pdf->Ln(5);

// Table Header
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Nama Siswa', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Kegiatan', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Tanggal', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'PBB', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Fisik', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Public Speaking', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Disiplin', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Attitude', 1, 1, 'C', true);

// Table Content
$pdf->SetFont('Arial', '', 10);
$no = 1;
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(45, 10, $row['nama_siswa'], 1, 0);
    $pdf->Cell(45, 10, $row['nama_kegiatan'], 1, 0);
    $pdf->Cell(25, 10, $row['tanggal'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['pbb'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['fisik'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['public_speaking'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['disiplin'], 1, 0, 'C');
    $pdf->Cell(25, 10, $row['attitude'], 1, 1, 'C');
}

// Output PDF
$pdf->Output();
?>
