<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
    <style>
        /* Reset dan umum */
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: url('img/Screenshot 2025-02-02 194913.png') no-repeat center center fixed;
        background-size: cover;
        }

        body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('img/Screenshot 2025-02-02 194913.png') no-repeat center center fixed;
    background-size: cover;
    filter: blur(8px); /* Menambahkan efek blur */
    z-index: -1;
}


        .container {
            max-width: 900px;
            margin: 50px auto;
            background: rgb(255, 255, 255);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        .form-container {
            padding: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .text-center {
            text-align: center;
        }

        /* Grid untuk kolom */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 10px;
        }

        @media (max-width: 768px) {
            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="section-title text-center">Input Data Siswa</h2>
    <div class="form-container">
        <form action="input_data_siswa.php" method="POST">
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nis">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="3" required></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="DKV">DKV</option>
                            <option value="ANM">ANM</option>
                            <option value="TB">TB</option>
                            <option value="PHT">PHT</option>
                            <option value="SIJA">SIJA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" required>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
