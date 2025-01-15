<?php
include 'koneksi.php';

// Ambil data berdasarkan ID
$id = $_GET['id'];
$query = "SELECT * FROM data_siswa WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='data_siswa.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <style>
        /* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    color: #333;
}

/* Form Container */
.form-container {
    max-width: 700px;
    margin: 50px auto;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

/* Heading */
.form-container h2 {
    text-align: center;
    color: #4CAF50;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="email"],
textarea,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

input[type="radio"] {
    margin-right: 5px;
}

textarea {
    resize: none;
}

button.btn-edit {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}

button.btn-edit:hover {
    background-color: #45a049;
}

/* Radio Buttons */
.form-group div {
    margin-bottom: 10px;
}

/* Error Alert */
.alert {
    color: #d8000c;
    background-color: #ffbaba;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .form-container {
        padding: 15px;
    }

    button.btn-edit {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Siswa</h2>
        <form action="proses_edit_siswa.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div>
                <label>NISN</label>
                <input type="text" name="nisn" value="<?= $data['nisn']; ?>" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?= $data['email']; ?>" required>
            </div>
            <div>
                <label>Nama</label>
                <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
            </div>
            <div>
                <label>Jenis Kelamin</label>
                <div>
                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?= $data['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : ''; ?>> Laki-Laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : ''; ?>> Perempuan
                </div>
            </div>
                    <div class="form-group">
                <label for="kelas">Kelas</label>
                <select class="form-control" id="kelas" name="kelas" required>
                    <option value="X" <?php if ($data['kelas'] == 'X') echo 'selected'; ?>>X</option>
                    <option value="XI" <?php if ($data['kelas'] == 'XI') echo 'selected'; ?>>XI</option>
                    <option value="XII" <?php if ($data['kelas'] == 'XII') echo 'selected'; ?>>XII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan" required>
                    <option value="IPA" <?php if ($data['jurusan'] == 'IPA') echo 'selected'; ?>>IPA</option>
                    <option value="IPS" <?php if ($data['jurusan'] == 'IPS') echo 'selected'; ?>>IPS</option>
                    <option value="Bahasa" <?php if ($data['jurusan'] == 'Bahasa') echo 'selected'; ?>>Bahasa</option>
                </select>
            </div>
            <div>
                <label>No Telepon</label>
                <input type="text" name="telepon" value="<?= $data['telepon']; ?>">
            </div>
            <div>
                <label>Nama Ayah</label>
                <input type="text" name="nama_ayah" value="<?= $data['nama_ayah']; ?>">
            </div>
            <div>
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" value="<?= $data['nama_ibu']; ?>">
            </div>
            <div>
                <label>Alamat</label>
                <textarea name="alamat" rows="3" required><?= $data['alamat']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-edit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
