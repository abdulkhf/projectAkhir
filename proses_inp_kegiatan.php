<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "app";

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari form dengan validasi
$nama_kegiatan = isset($_POST['nama_kegiatan']) ? trim($_POST['nama_kegiatan']) : null;
$tanggal = isset($_POST['tanggal']) ? trim($_POST['tanggal']) : null;
$lokasi = isset($_POST['lokasi']) ? trim($_POST['lokasi']) : null;
$deskripsi = isset($_POST['deskripsi']) ? trim($_POST['deskripsi']) : null;
$foto = isset($_FILES['foto']) ? $_FILES['foto'] : null;

// Validasi input
if (!$nama_kegiatan || !$tanggal || !$lokasi || !$deskripsi || !$foto || $foto['error'] !== UPLOAD_ERR_OK) {
    die("Harap lengkapi semua data.");
}

// Folder untuk menyimpan foto
$targetDir = "uploads/";
$fotoName = time() . '_' . basename($foto['name']);
$targetFile = $targetDir . $fotoName;

// Validasi dan unggah file
if (move_uploaded_file($foto['tmp_name'], $targetFile)) {
    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO kegiatan_db (nama_kegiatan, tanggal, lokasi, deskripsi, foto) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama_kegiatan, $tanggal, $lokasi, $deskripsi, $fotoName);


    if ($stmt->execute()) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Berhasil Disimpan</title>
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: Arial, sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #f4f4f9;
                }
                .message-container {
                    text-align: center;
                    padding: 30px;
                    background: #ffffff;
                    border: 1px solid #ddd;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    border-radius: 15px;
                    max-width: 500px;
                    animation: fadeIn 0.8s ease-in-out;
                }
                .message-container h2 {
                    color: #28a745;
                    font-size: 24px;
                    margin-bottom: 20px;
                }
                .message-container p {
                    color: #555;
                    font-size: 18px;
                    margin-bottom: 20px;
                }
                .message-container a {
                    display: inline-block;
                    text-decoration: none;
                    background: #007bff;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 5px;
                    font-size: 16px;
                    transition: background-color 0.3s;
                }
                .message-container a:hover {
                    background: #0056b3;
                }
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: scale(0.95);
                    }
                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }
            </style>
        </head>
        <body>
            <div class='message-container'>
                <h2>Data kegiatan berhasil disimpan!</h2>
                <p>Terima kasih, data Anda telah berhasil disimpan di sistem.</p>
                <a href='kegiatan.php'>Kembali ke daftar kegiatan</a>
            </div>
        </body>
        </html>
        ";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
    

    $stmt->close();
} else {
    echo "Maaf, terjadi kesalahan saat mengunggah file.";
}

$conn->close();
?>
