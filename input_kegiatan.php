<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Kegiatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .main-container {
            margin-left: 300px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(255, 255, 255);
        }

        .form-container {
            width: 1300px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #f4f4f9;
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="form-container">
            <h2>Input Kegiatan Baru</h2>
            <form action="proses_inp_kegiatan.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Kegiatan</label>
        <input type="text" id="nama" name="nama_kegiatan" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" required>
    </div>
    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" id="lokasi" name="lokasi" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" required></textarea>
    </div>
    <div class="form-group">
        <label for="foto">Foto Dokumentasi</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>
    </div>
    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

        </div>
    </div>
</body>
</html>
