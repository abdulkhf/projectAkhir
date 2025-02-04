<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "app";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Memeriksa apakah parameter ID tersedia
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query untuk mendapatkan data kegiatan berdasarkan ID
    $sql = "SELECT nama_kegiatan, tanggal, lokasi, deskripsi, foto FROM kegiatan_db WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Data kegiatan tidak ditemukan.</p>";
        exit();
    }

    // Query untuk mendapatkan data siswa yang hadir pada kegiatan
    $sql_hadir = "
        SELECT ds.nama 
        FROM data_absen da
        INNER JOIN data_siswa ds ON da.user_id = ds.id
        WHERE da.id = ?";
    $stmt_hadir = $conn->prepare($sql_hadir);
    $stmt_hadir->bind_param("i", $id);
    $stmt_hadir->execute();
    $result_hadir = $stmt_hadir->get_result();
} else {
    echo "<p>ID kegiatan tidak tersedia.</p>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h1 {
            margin-top: 0;
            color: #333;
        }

        p {
            margin: 5px 0;
            color: #555;
        }

        .attendance-list {
            margin-top: 20px;
        }

        .attendance-list h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .attendance-list ul {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }

        .attendance-list ul li {
            padding: 5px 0;
            color: #555;
            border-bottom: 1px solid #f1f1f1;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="uploads/<?php echo htmlspecialchars($row['foto']); ?>" alt="<?php echo htmlspecialchars($row['nama_kegiatan']); ?>">
        <h1><?php echo htmlspecialchars($row['nama_kegiatan']); ?></h1>
        <p><strong>Tanggal:</strong> <?php echo date('d M Y', strtotime($row['tanggal'])); ?></p>
        <p><strong>Lokasi:</strong> <?php echo htmlspecialchars($row['lokasi']); ?></p>
        <p><strong>Deskripsi:</strong> <?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>

        <!-- Daftar siswa yang hadir -->
        <div class="attendance-list">
            <h2>Siswa yang Hadir:</h2>
            <ul>
                <?php
                if ($result_hadir->num_rows > 0) {
                    while ($siswa = $result_hadir->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($siswa['nama']) . "</li>";
                    }
                } else {
                    echo "<li>Tidak ada siswa yang hadir.</li>";
                }
                ?>
            </ul>
        </div>

        <a href="kegiatan_pembina.php" class="btn-back">Kembali ke Daftar Kegiatan</a>
    </div>
</body>
</html>