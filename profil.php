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
            display: flex;
            height: 100vh;
            background-color: #f4f4f9;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #1e88e5;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: fixed;
            height: 100%;
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
            color: #ffffff;
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
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            overflow-y: auto;
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
        <h2>User</h2>
        <ul>
            <li><a href="user_dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="absensi.php"><i class="fas fa-user-check"></i> Absensi</a></li>
            <li><a href="dataa_siswaa.php"><i class="fas fa-users"></i> Data Siswa</a></li>
            <li><a href="profil.php"><i class="fas fa-user"></i> Profil</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Profil</h1>
            <div class="user-info">
                <img src="img/logo.jpg" alt="User Profile">
                <span>John Doe</span>
            </div>
        </div>
        
        <footer>
            <p>&copy; 2025 Dashboard User. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
