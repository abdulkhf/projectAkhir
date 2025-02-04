<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kegiatan = $_POST['id_kegiatan'];
    $tanggal = $_POST['tanggal'];
    $id_siswa = $_POST['id_siswa'];
    $pbb = $_POST['pbb'];
    $fisik = $_POST['fisik'];
    $public_speaking = $_POST['public_speaking'];
    $tanggung_jawab = $_POST['tanggung_jawab'];
    $disiplin = $_POST['disiplin'];
    $attitude = $_POST['attitude'];

    $stmt = $conn->prepare("INSERT INTO penilaian (id_siswa, id_kegiatan, tanggal, pbb, fisik, public_speaking, tanggung_jawab, disiplin, attitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    for ($i = 0; $i < count($id_siswa); $i++) {
        $stmt->bind_param('iisssssss', $id_siswa[$i], $id_kegiatan, $tanggal, $pbb[$i], $fisik[$i], $public_speaking[$i], $tanggung_jawab[$i], $disiplin[$i], $attitude[$i]);
        $stmt->execute();
    }

    echo "<script>
            alert('Data siswa berhasil disimpan!');
            window.location.href = 'penilaian_pembina.php';
          </script>";
} else {
    echo "<script>
            alert('Metode pengiriman tidak valid.');
             window.location.href='penilaian_pembina.php'();
          </script>";
}
?>
