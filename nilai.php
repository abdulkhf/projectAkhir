<style>
    /* Import Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

body {
    font-family: 'Poppins', sans-serif;
    background: #f4f6f9;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    max-width: 900px;
    background: #ffffff;
    padding: 20px;
    margin: 30px auto;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #2c3e50;
    font-weight: 600;
}

p {
    text-align: center;
    color: #555;
    font-size: 16px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

table th {
    background: #3498db;
    color: white;
}

table tbody tr:nth-child(even) {
    background: #f8f9fa;
}

table tbody tr:hover {
    background: #ecf0f1;
}

select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    background: white;
    cursor: pointer;
}

.button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.kembali {
    background: #e74c3c;
    color: white;
    padding: 5px 10px;
    font-size: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.kembali:hover {
    background: #c0392b;
}

.simpan {
    background: #2ecc71;
    color: white;
    padding: 7px 15px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.simpan:hover {
    background: #27ae60;
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
}

/* Posisi tombol kembali di pojok kanan bawah tabel */
.button-container {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
    gap: 15px;
}


/* Responsif */
@media screen and (max-width: 600px) {
    table th, table td {
        padding: 10px;
        font-size: 14px;
    }

    button {
        font-size: 14px;
        padding: 10px;
    }
}

</style>

<?php
session_start();
if (!isset($_SESSION['siswa'])) {
    echo "Data tidak tersedia.";
    exit;
}

$siswaList = $_SESSION['siswa'];
$id_kegiatan = $_SESSION['id_kegiatan'];
$nama_kegiatan = $_SESSION['nama_kegiatan'];
$tanggal = $_SESSION['tanggal'];
?>

<h2>Penilaian Kegiatan: <?php echo $nama_kegiatan; ?></h2>
<p>Tanggal: <?php echo $tanggal; ?></p>

<form action="proses_simpan_nilai.php" method="POST">
    <input type="hidden" name="id_kegiatan" value="<?php echo $id_kegiatan; ?>">
    <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">

    <table>
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>PBB</th>
                <th>Fisik</th>
                <th>Public Speaking</th>
                <th>Tanggung Jawab</th>
                <th>Disiplin</th>
                <th>Attitude</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswaList as $siswa) : ?>
                <tr>
                    <td><?php echo $siswa['nama']; ?></td>
                    <input type="hidden" name="id_siswa[]" value="<?php echo $siswa['user_id']; ?>">
                    <?php
                    $aspek = ['pbb', 'fisik', 'public_speaking', 'tanggung_jawab', 'disiplin', 'attitude'];
                    foreach ($aspek as $a) {
                        echo "<td>
                                <select name='{$a}[]' required>
                                    <option value='Sangat Baik'>Sangat Baik</option>
                                    <option value='Baik'>Baik</option>
                                    <option value='Cukup'>Cukup</option>
                                    <option value='Kurang'>Kurang</option>
                                    <option value='Sangat Kurang'>Sangat Kurang</option>
                                </select>
                              </td>";
                    }
                    ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="button-container">
    <button type="button" class="kembali" onclick="window.history.back()">Kembali</button>
    <button type="submit" class="simpan">Simpan</button>
</div>

</form>
