-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 03:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_absen`
--

CREATE TABLE `data_absen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` enum('HADIR','IZIN','SAKIT','ALPHA') NOT NULL,
  `keterangan` text NOT NULL,
  `jurusan` enum('RPL','TKJ','DKV','TB','PHT','ANM','SIJA') NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_absen`
--

INSERT INTO `data_absen` (`id`, `user_id`, `nisn`, `nama`, `kelas`, `tanggal`, `waktu`, `status`, `keterangan`, `jurusan`, `id_kegiatan`) VALUES
(22, 9, '', '', 'XI', '2025-01-26', '00:00:00', 'HADIR', '-', 'RPL', 14),
(23, 18, '', '', 'XI', '2025-01-26', '00:00:00', 'HADIR', '-', 'DKV', 0),
(24, 22, '', '', 'XI', '2025-01-26', '00:00:00', 'HADIR', '-', 'PHT', 0),
(25, 8, '', '', 'XI', '2025-01-27', '00:00:00', 'HADIR', '-', 'ANM', 0),
(26, 9, '', '', 'XI', '2025-01-28', '00:00:00', 'HADIR', '-', 'RPL', 0),
(27, 9, '', '', 'XI', '2025-01-29', '00:00:00', 'HADIR', '-', 'RPL', 0),
(28, 8, '', '', 'XI', '2025-01-29', '00:00:00', 'HADIR', '-', 'ANM', 0),
(29, 10, '', '', 'XI', '2025-01-29', '00:00:00', 'HADIR', '-', 'DKV', 0),
(30, 16, '', '', 'XI', '2025-01-30', '00:00:00', 'IZIN', '', 'DKV', 0),
(31, 16, '', '', 'XI', '2025-01-30', '00:00:00', 'HADIR', '-', 'DKV', 0),
(32, 20, '', '', 'XI', '2025-01-30', '00:00:00', 'HADIR', '-', 'TKJ', 0),
(33, 45, '', '', 'XII', '2025-02-02', '00:00:00', 'HADIR', '-', 'RPL', 0),
(34, 7, '', '', 'XI', '2025-02-03', '00:00:00', 'HADIR', '-', 'RPL', 0),
(37, 42, '', '', 'XII', '2025-02-03', '00:00:00', 'HADIR', '-', 'DKV', 0),
(38, 47, '', '', 'XII', '2025-02-03', '00:00:00', 'HADIR', '-', 'PHT', 0),
(39, 43, '', '', 'XII', '2025-02-03', '00:00:00', 'HADIR', '-', '', 0),
(40, 24, '', '', 'XI', '2025-02-04', '00:00:00', 'HADIR', '-', 'DKV', 0),
(41, 33, '', '', 'XII', '2025-02-04', '00:00:00', 'HADIR', '-', 'TKJ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('RPL','TKJ','DKV','TB','PHT','ANM','SIJA') NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `user_type` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nisn`, `email`, `nama`, `jenis_kelamin`, `alamat`, `kelas`, `jurusan`, `telepon`, `user_type`) VALUES
(7, '78382918', 'nazriel@gmail.com', 'Acham Nazriel ', 'laki-laki', 'Mojokerto', 'XI', 'RPL', '2147483647', 'admin'),
(8, '66347438', 'rifky@gmail.com', 'Achmad Rifky ', 'laki-laki', 'Mojosari', 'XI', 'ANM', '2147483647', 'admin'),
(9, '66748384', 'jamil@gmail.com', 'Ahmad Jamil', 'laki-laki', 'Sumbersari', 'XI', 'RPL', '2147483647', 'admin'),
(10, '0077756373', 'diar@gmail.com', 'Asyifa Diar', 'perempuan', 'Puri', 'XI', 'DKV', '08564737283', 'admin'),
(11, '0076473287', 'bilqis@gmail.com', 'Bilqis Desy', 'perempuan', 'Pesanggrahan', 'XI', 'TB', '085736426251', 'admin'),
(12, '0066256645', 'carissa@gmail.com', 'Carissa Azzahra', 'perempuan', 'Dlanggu', 'XI', 'DKV', '085874827938', 'admin'),
(13, '0068493849', 'dinda@gmail.com', 'Dinda Amelia', 'perempuan', 'Mojokarang', 'XI', 'TKJ', '085637827627', 'admin'),
(14, '0076563728', 'dio@gmail.com', 'Dio Ramadhan', 'laki-laki', 'Mojosari', 'XI', 'TB', '085647287287', 'admin'),
(15, '0067838287', 'dwi@gmail.com', 'Dwi Novianti', 'perempuan', 'Segunung', 'XI', 'TB', '085635627872', 'admin'),
(16, '0076839848', 'dewi@gmail.com', 'Evelyn Dewi', 'perempuan', 'Mojosari', 'XI', 'DKV', '085784938948', 'admin'),
(17, '0066473847', 'firda@gmail.com', 'Firda Hesti', 'perempuan', 'Dawarblandong', 'XI', 'ANM', '085637467287', 'admin'),
(18, '0062547376', 'nisa@gmail.com', 'Galuh Nisa', 'perempuan', 'Kutorejo', 'XI', 'DKV', '085367487378', 'admin'),
(20, '0066372287', 'hari@gmail.com', 'Hari Wahyudi', 'laki-laki', 'Pacet', 'XI', 'TKJ', '085476278291', 'admin'),
(21, '0067637278', 'juwita@gamil.com', 'Juwita Susilowati', 'perempuan', 'Mojosari', 'XI', 'TB', '085767828626', 'admin'),
(22, '0087838928', 'keisya@gmail.com', 'Keisya Auliya', 'perempuan', 'Kutorejo', 'XI', 'PHT', '085676256526', 'admin'),
(23, '0077556655', 'aditya@gmail.com', 'Dwi Aditya', 'laki-laki', 'Segunung', 'XI', 'RPL', '085948938829', 'admin'),
(24, '0067736467', 'afif@gmail.com', 'Muhammad Afifudin', 'laki-laki', 'puri', 'XI', 'DKV', '085367726635', 'admin'),
(25, '0076746264', 'mailinda@gmail.com', 'Mailinda', 'perempuan', 'Sambilawang', 'XI', 'PHT', '085748372634', 'admin'),
(26, '0066432265', '', 'Muhammad Fajar Ardiansyah', 'laki-laki', 'Dsn. Pohkecik Ds. Pohkecik Dlanggu', 'XI', 'DKV', '085763627736', 'admin'),
(27, '0076847584', '', 'Muhammad Kevin Keysa Firmansyah', 'laki-laki', 'Dsn.Sajen Ds. Pacet Kec.Pacet', 'XI', 'TKJ', '08564738746', 'admin'),
(28, '0067857483', '', 'Muhammad Rizky Afandi', 'laki-laki', 'Dsn. Keputran Ds. Kutorejo Kec. Kutorejo', 'XI', 'ANM', '085362718736', 'admin'),
(29, '0065847387', '', 'Mukhammad Ganda Difan Faza', 'laki-laki', 'Dsn. Mlaten Ds. Mlaten Kec. Puri', 'XI', 'TB', '089738746378', 'admin'),
(30, '0077656374', '', 'Mutiara Firtiyani', 'perempuan', 'Perum Pekukuhan Asri Mojosari', 'XI', 'ANM', '085376283748', 'admin'),
(31, '0066374462', '', 'Nadia Nisrina Dzun Nuraini', 'perempuan', 'Dsn. Mlaten Ds. Mlaten Kec. Puri', 'XI', 'RPL', '085367284736', 'admin'),
(32, '0076857485', '', 'Naina Metamadhana', 'perempuan', 'Dsn. Pugeran Ds. Gondang Kec. Gondang', 'XI', 'RPL', '085763647587', 'admin'),
(33, '0066347273', '', 'Akhmad Goniyun Nafiq', 'laki-laki', 'Dsn. Grogol Ds. Kepuhpandak Kec. Kutorejo\r\n', 'XII', 'TKJ', '085364736467', 'admin'),
(34, '0066847384', '', 'Alya Harnsti Rahayu', 'perempuan', 'Dsn. Banjarsari Ds. Badung Kec. Dlanggu', 'XII', 'SIJA', '085763238273', 'admin'),
(35, '0066738823', '', 'Andis Dwi Rahadianti', 'perempuan', 'Dsn. Keputran Ds. Kutprejo Kec. Kutorejo', 'XII', 'DKV', '085736827942', 'admin'),
(36, '0066282217', '', 'Anindita Asmiranda', 'perempuan', 'Dsn. Kalen Ds. Mojokarang Kec. DLanggu', 'XII', 'TKJ', '085837928347', 'admin'),
(37, '0064637492', '', 'Aulia Lisda Nuraini', 'perempuan', 'Dsn. Pugeran Ds. Gondang Kec. Gondang', 'XII', 'TB', '08563729729', 'admin'),
(38, '0066738293', '', 'Cecilia Agita Putri A', 'perempuan', 'Dsn. Ketidur Ds. Ketidur Kec. Kutorejo', 'XII', 'DKV', '08536728736', 'admin'),
(39, '0075637485', '', 'Chelsea Oktavia Ramadani', 'perempuan', 'Dsn. Ngrayung Ds. Kepuhpandak Kec. Kutorejo\r\n', 'XII', 'RPL', '085738472378', 'admin'),
(40, '0066463745', '', 'Dessy Kartianti Lestari', 'perempuan', 'Dsn. Pungging Ds. Pungging Kec. Pungging', 'XII', 'TB', '085731938478', 'admin'),
(41, '0066271187', '', 'Faisal Naufal Maarif', 'laki-laki', 'perum puri asri', 'XII', 'TKJ', '085287463872', 'admin'),
(42, '0066289983', '', 'Farhan Zidane Imawan', 'laki-laki', 'Dsn. Tawar Ds. Tawar Kec. Gondang', 'XII', 'DKV', '085827647827', 'admin'),
(43, '0077637728', '', 'Faza Alifta Mediantoro', 'perempuan', 'Dsn. Talok Ds. Talok Kec. Dlanggu', 'XII', 'SIJA', '085283746928', 'admin'),
(44, '0066837728', '', 'Sofi Jannah Ramadhani', 'perempuan', 'Dsn. Ngoro Ds. Ngoro Kec. Ngoro', 'XII', 'SIJA', '085728938749', 'admin'),
(45, '0066256645', '', 'Muhammad Abdul Khafi ', 'laki-laki', 'Dsn. Mojogeneng Ds. Mojokarang Kec. Dlanggu', 'XII', 'RPL', '085736426251', 'admin'),
(46, '0066382287', '', 'Muhammad Faizin', 'laki-laki', 'Dsn. Mberjo Ds. Pandanarum Kec. Kutoejo', 'XII', 'TKJ', '085267384726', 'admin'),
(47, '0066387287', '', 'Widiana Wulandari', 'perempuan', 'Dsn. Tumapel Ds. Tumapel Kec. Dlanggu', 'XII', 'PHT', '085837857382', 'admin'),
(48, '0066473387', '', 'Muhammad Bryan Permana Aji', 'laki-laki', 'Perum Pekukuhan Asri', 'XII', 'PHT', '08563747387', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_db`
--

CREATE TABLE `kegiatan_db` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan_db`
--

INSERT INTO `kegiatan_db` (`id`, `nama_kegiatan`, `tanggal`, `lokasi`, `deskripsi`, `foto`, `created_at`) VALUES
(14, 'Latihan Peleton', '2025-01-26', 'Lapangan belakang', 'Latihan hari ini mengulas variasi dan formasi', '1737902317_WhatsApp Image 2025-01-16 at 21.54.33 (1).jpeg', '2025-01-26 14:38:37'),
(17, 'Latihan Peleton', '2025-01-29', 'SMKN 1 DLanggu', '-', '1738130218_logo BP-Photoroom.png', '2025-01-29 05:56:58'),
(18, 'Pra Diklat', '2025-01-30', 'SMKN 1 DLanggu', '-', '1738240444_logo BP.jpg', '2025-01-30 12:34:04'),
(19, 'diklat', '2025-01-31', 'SMKN 1 DLanggu', '-', '1738252551_logo BP.jpg', '2025-01-30 15:55:51'),
(20, 'Ekstra Wajib', '2025-02-01', 'SMKN 1 DLanggu', 'Wajib Membawa bekal', '1738252771_logo BP.jpg', '2025-01-30 15:59:31'),
(21, 'AD/ART Angkatan 17', '2025-02-02', 'SMKN 1 DLanggu', 'Sidang AD/ART Brigpasda Periode 2023-2024', '1738487005_WhatsApp Image 2025-02-02 at 16.02.41_8ad5a932.jpg', '2025-02-02 09:03:25'),
(22, 'Lomba LKBB Angkasa', '2025-02-03', 'SMAN 1 Bangsal', 'Lomba Pertama di awal Tahun 2024', '1738547261_WhatsApp Image 2025-02-03 at 08.08.55_0b51714e.jpg', '2025-02-03 01:47:41'),
(23, 'Ekstra Wajib', '2025-02-04', 'Lapangan Basket', 'Materi & Pengumpulan Buku merah putih', '1738635281_WhatsApp Image 2025-02-03 at 08.08.53_d61263a3.jpg', '2025-02-04 02:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  `id_kegiatan` int(10) NOT NULL,
  `pbb` enum('Sangat baik','Baik','Cukup','Kurang','Sangat Kurang') NOT NULL,
  `fisik` enum('Sangat Baik','Baik','Cukup','Kurang','Sangat Kurang') NOT NULL,
  `public_speaking` enum('Sangat Baik','Baik','Cukup','Kurang','Sangat Kurang') NOT NULL,
  `tanggung_jawab` enum('Sangat Baik','Baik','Cukup','Kurang','Sangat Kurang') NOT NULL,
  `disiplin` enum('Sangat Baik','Baik','Cukup','Kurang','Sangat Kurang') NOT NULL,
  `attitude` enum('Sangat Baik','Baik','Cukup','Kurang','Sangat Kurang') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_siswa`, `id_kegiatan`, `pbb`, `fisik`, `public_speaking`, `tanggung_jawab`, `disiplin`, `attitude`, `tanggal`) VALUES
(1, 9, 14, 'Sangat baik', 'Baik', 'Baik', 'Baik', 'Cukup', 'Kurang', '2025-01-26'),
(2, 18, 14, 'Cukup', 'Kurang', 'Kurang', 'Baik', 'Baik', 'Baik', '2025-01-26'),
(3, 22, 14, 'Kurang', 'Kurang', 'Baik', 'Cukup', 'Cukup', 'Cukup', '2025-01-26'),
(4, 9, 17, 'Baik', 'Sangat Baik', 'Sangat Baik', 'Cukup', 'Kurang', 'Sangat Baik', '2025-01-29'),
(5, 8, 17, 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', '2025-01-29'),
(6, 10, 17, 'Cukup', 'Sangat Baik', 'Sangat Baik', 'Cukup', 'Sangat Baik', 'Sangat Baik', '2025-01-29'),
(7, 16, 18, 'Sangat baik', 'Baik', 'Kurang', 'Baik', 'Baik', 'Baik', '2025-01-30'),
(8, 20, 18, 'Cukup', 'Baik', 'Kurang', 'Kurang', 'Kurang', 'Cukup', '2025-01-30'),
(9, 7, 20, 'Cukup', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Sangat Baik', '2025-02-03'),
(10, 42, 20, 'Kurang', 'Sangat Baik', 'Cukup', 'Cukup', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(11, 47, 20, 'Sangat Kurang', 'Sangat Baik', 'Kurang', 'Kurang', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(12, 7, 22, 'Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(13, 42, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(14, 47, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(15, 7, 22, 'Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(16, 42, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(17, 47, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(18, 7, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(19, 42, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(20, 47, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(21, 7, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(22, 42, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(23, 47, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(24, 43, 22, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-03'),
(25, 24, 23, 'Baik', 'Sangat Baik', 'Kurang', 'Sangat Baik', 'Cukup', 'Sangat Baik', '2025-02-04'),
(26, 33, 23, 'Baik', 'Sangat Baik', 'Kurang', 'Sangat Baik', 'Cukup', 'Sangat Baik', '2025-02-04'),
(27, 24, 23, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-04'),
(28, 33, 23, 'Sangat baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', '2025-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','pembina','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', '123', 'admin', '2025-01-14 03:00:55'),
(2, 'pembina', 'pembina@pembina.com', '123', 'pembina', '2025-01-14 03:00:55'),
(3, 'user', 'user@user.com', '123', 'user', '2025-01-14 03:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Error reading structure for table app.users: #1932 - Table &#039;app.users&#039; doesn&#039;t exist in engine
-- Error reading data for table app.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `app`.`users`&#039; at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_data_absen_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_db`
--
ALTER TABLE `kegiatan_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kegiatan_db`
--
ALTER TABLE `kegiatan_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_absen`
--
ALTER TABLE `data_absen`
  ADD CONSTRAINT `data_absen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `data_siswa` (`id`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan_db` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
