-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 02:04 AM
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
  `username` varchar(100) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` enum('hadir','izin','sakit','alpha') NOT NULL,
  `keterangan` text NOT NULL,
  `jurusan` enum('rpl','tkj','dkv','tb','pht','anm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_absen`
--

INSERT INTO `data_absen` (`id`, `user_id`, `username`, `nisn`, `nama`, `kelas`, `tanggal`, `waktu`, `status`, `keterangan`, `jurusan`) VALUES
(1, 3, '', 0, '', 'XII', '2025-01-14', '00:00:00', 'izin', 'nikah', 'rpl'),
(2, 2, '', 0, '', 'XII', '2025-01-15', '00:00:00', 'izin', 'nikah', 'tkj'),
(3, 2, '', 0, '', 'XI', '2025-01-16', '00:00:00', 'hadir', '-', 'tkj'),
(4, 4, '', 0, '', 'X', '2025-01-16', '00:00:00', 'hadir', '-', 'dkv');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nisn` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('rpl','tkj','dkv','tb','pht','anm') NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `telepon` int(20) NOT NULL,
  `user_type` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nisn`, `email`, `nama`, `jenis_kelamin`, `alamat`, `kelas`, `jurusan`, `nama_ayah`, `nama_ibu`, `telepon`, `user_type`) VALUES
(2, 66256645, 'khafi9672@gmail.com', 'Muhammad Abdul Khafi ', '', 'dsn. mojogeneng ds. mojokarang kec. dlanggu', 'XII', '', 'paijo', 'sri', 2147483647, 'admin'),
(3, 876543, 'cantik@gmail.com', 'mita', 'perempuan', 'dsn badung ds kedunglengkong kec dlanggu kab mojokerto', 'XII', 'rpl', 'andik', 'teteh', 2147483647, 'admin'),
(4, 12345678, 'khafi512@gmail.com', 'paijo', 'laki-laki', 'mjk', 'X', 'dkv', 'al', 'sri', 2147483647, 'admin');

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
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
