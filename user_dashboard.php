<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #1e88e5;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .logo img {
            width: 100px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar h2 {
            text-align: center;
            margin: 15px 0;
            font-size: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color:hsl(212, 80.30%, 41.80%);
        }

        .sidebar ul li a i {
            font-size: 18px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .header .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .header .user-info span {
            font-size: 16px;
            color: #555;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .card h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            color: #777;
        }

        .card .icon {
            font-size: 40px;
            color: #4CAF50;
            margin-bottom: 10px;
        }

        .card.izin .icon {
            color: #FFC107;
        }

        .card.sakit .icon {
            color: #FF5722;
        }

        .card.alpha .icon {
            color: #E91E63;
        }

        .card.clock-card {
    background-color: #ffcc80; /* Warna latar card */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 150px; /* Tinggi card */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card.clock-card .clock-time {
    font-size: 48px; /* Ukuran besar untuk jam */
    font-weight: bold;
    color: #333; /* Warna teks */
}

.clock-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Tinggi penuh layar konten */
    background-color: #f5f5f5; /* Warna latar belakang */
}

.clock-time {
    font-size: 96px; /* Ukuran font besar */
    font-weight: bold;
    color: #333; /* Warna teks */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Efek bayangan */
}



        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="img/logo.jpg" alt="Logo">
        </div>
        <h2>Welcome, User!</h2>
        <ul>
            <li><a href="user_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="absensi.php"><i class="fas fa-user-check"></i> Absensi</a></li>
            <li><a href="dataa_siswaa.php"><i class="fas fa-users"></i> Data Siswa</a></li>
            <li><a href="profil.php"><i class="fas fa-user"></i> Profil</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="user-info">
                <img src="img/logo.jpg" alt="logo">
                <span>John Doe</span>
            </div>
        </div>
        <div class="dashboard-cards">
            <div class="card">
                <div class="icon">📊</div>
                <h3>Total Siswa</h3>
                <p>120</p>
            </div>
            <div class="card">
                <div class="icon">✅</div>
                <h3>Siswa Hadir</h3>
                <p>100</p>
            </div>
            <div class="card izin">
                <div class="icon">📝</div>
                <h3>Siswa Izin</h3>
                <p>5</p>
            </div>
            <div class="card sakit">
                <div class="icon">🤒</div>
                <h3>Siswa Sakit</h3>
                <p>3</p>
            </div>
            <div class="card alpha">
                <div class="icon">❌</div>
                <h3>Siswa Alpha</h3>
                <p>12</p>
            </div>
            <div class="card clock-card">
    <p class="clock-time" id="clock">--:--</p>
</div>

        </div>
        <footer>
            <p>&copy; 2025 Dashboard User. All rights reserved.</p>
        </footer>
    </div>

    <script>
    function updateClock() {
        const clockElement = document.getElementById('clock');
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        clockElement.textContent = `${hours}:${minutes}`;
    }
    setInterval(updateClock, 1000); // Update setiap detik
    updateClock(); // Panggil langsung saat halaman dimuat
</script>

</body>
</html>
