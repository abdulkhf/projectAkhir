<?php
include 'koneksi.php';

$id_kegiatan = $_POST['id_kegiatan'];
$id_siswa_list = $_POST['id_siswa'];
$tanggal = $_POST['tanggal'];

foreach ($id_siswa_list as $index => $id_siswa) {
    // Cek apakah siswa sudah dinilai
    $check_query = "SELECT * FROM penilaian WHERE id_siswa = '$id_siswa' AND id_kegiatan = '$id_kegiatan'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows == 0) {
        // Jika belum dinilai, simpan data
        $pbb = $_POST['pbb'][$index];
        $fisik = $_POST['fisik'][$index];
        $public_speaking = $_POST['public_speaking'][$index];
        $disiplin = $_POST['disiplin'][$index];
        $attitude = $_POST['attitude'][$index];

        $insert_query = "INSERT INTO penilaian (id_kegiatan, id_siswa, tanggal, pbb, fisik, public_speaking, disiplin, attitude) 
                         VALUES ('$id_kegiatan', '$id_siswa', '$tanggal', '$pbb', '$fisik', '$public_speaking', '$disiplin', '$attitude')";
        $conn->query($insert_query);
    }
}
header("Location: tabel_penilaian.php");
?>
