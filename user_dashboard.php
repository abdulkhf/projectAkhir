<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <img src="img/logo BP-Photoroom.png" alt="Logo">
        </div>
        <h2>User</h2>
        <ul>
            <li><a href="user_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="absensi.php"><i class="fas fa-user-check"></i> Absensi</a></li>
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


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="relative group">
                <img src="img/WhatsApp Image 2025-01-16 at 21.54.45.jpeg" alt="Kegiatan 1" class="w-full h-64 object-cover rounded-xl shadow-lg group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-30 rounded-xl flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-white text-lg font-semibold">Kegiatan 1</span>
                </div>
            </div>
            
            <div class="relative group">
                <img src="img/WhatsApp Image 2025-01-16 at 21.54.34.jpeg" alt="Kegiatan 2" class="w-full h-64 object-cover rounded-xl shadow-lg group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-30 rounded-xl flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-white text-lg font-semibold">Kegiatan 2</span>
                </div>
            </div>
            
            <div class="relative group">
                <img src="img/WhatsApp Image 2025-01-16 at 21.54.44.jpeg" alt="Kegiatan 3" class="w-full h-64 object-cover rounded-xl shadow-lg group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-30 rounded-xl flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-white text-lg font-semibold">Kegiatan 3</span>
                </div>
            </div>
        </div>
</body>
</html>
