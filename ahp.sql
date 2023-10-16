-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 02:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `kode_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'MTK', 'Matematika', '2023-05-15 16:34:47', '2023-05-15 16:34:47'),
(4, 'STK', 'Statistika', '2023-05-15 23:40:13', '2023-05-15 23:40:13'),
(5, 'BIO', 'Biologi', '2023-05-15 23:40:29', '2023-05-15 23:40:29'),
(6, 'AK', 'Akuntansi', '2023-05-16 07:42:13', '2023-05-16 07:42:13'),
(7, 'EKO', 'Ilmu Ekonomi', '2023-05-16 07:42:13', '2023-05-16 07:42:13'),
(8, 'ILKOM', 'Ilmu Komunikasi', '2023-05-16 07:42:13', '2023-05-16 07:42:13'),
(9, 'PGSD', 'PGSD', '2023-05-16 07:42:13', '2023-05-16 07:42:13'),
(10, 'BIN', 'Bahasa dan Sastra Indonesia', '2023-05-16 07:42:13', '2023-05-16 07:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'XII IPA-1', '2023-05-15 15:17:08', '2023-05-15 15:17:20'),
(2, 'XII IPA-2', '2023-05-15 15:17:08', '2023-05-15 15:17:20'),
(3, 'XII IPA-3', '2023-05-15 15:17:08', '2023-05-15 07:19:12'),
(4, 'XII IPA-4', '2023-05-15 15:17:08', '2023-05-15 15:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `keputusan_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`keputusan_id`, `siswa_id`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-19 08:51:26', '2023-05-19 08:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` varchar(50) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`, `created_at`, `updated_at`) VALUES
('C1', 'Matematika', '2023-05-15 16:42:01', '2023-05-15 16:42:01'),
('C2', 'B.Indonesia', '2023-05-15 16:42:01', '2023-05-15 16:42:01'),
('C3', 'B.Inggris', '2023-05-15 23:42:54', '2023-05-15 23:42:54'),
('C4', 'Biologi', '2023-05-15 23:43:05', '2023-05-15 23:43:05'),
('C5', 'Ekonomi', '2023-05-15 23:43:24', '2023-05-15 23:43:24'),
('C6', 'Minat Siswa', '2023-05-15 23:43:34', '2023-05-15 23:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `matematika` float NOT NULL,
  `indonesia` float NOT NULL,
  `inggris` float NOT NULL,
  `biologi` float NOT NULL,
  `ekonomi` float NOT NULL,
  `minat_siswa` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `nis`, `nama`, `matematika`, `indonesia`, `inggris`, `biologi`, `ekonomi`, `minat_siswa`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, '11223344', 'John', 100, 85, 85, 86, 89, 'Matematika', 1, '2023-05-15 12:51:50', '2023-06-28 07:19:38'),
(3, '6754432', 'Albert', 99, 99, 99, 99, 89, 'Ilmu Ekonomi', 1, '2023-05-15 12:51:50', '2023-06-28 07:19:27'),
(5, '12121212', 'asasas', 96, 89, 89, 89, 89, 'Bahasa dan Sastra Indonesia', 2, '2023-06-28 07:10:46', '2023-06-28 07:19:46'),
(6, '12121212', 'tester', 100, 87, 87, 87, 87, 'Statistika', 3, '2023-06-28 07:17:00', '2023-06-28 07:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `sub_kriteria_id` int(11) NOT NULL,
  `sub_kriteria` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`sub_kriteria_id`, `sub_kriteria`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Mutlak Sangat Penting', 9, '2023-05-15 17:12:31', '2023-05-15 09:33:18'),
(2, 'Mendekati Mutlak', 8, '2023-05-15 17:12:31', '2023-05-15 17:12:31'),
(4, 'Sangat Penting', 7, '2023-05-15 23:44:10', '2023-05-15 23:44:10'),
(5, 'Cukup Penting', 6, '2023-05-19 17:24:18', '2023-05-19 17:24:18'),
(6, 'Netral', 5, '2023-05-19 17:24:18', '2023-05-19 17:24:18'),
(7, 'Kurang Penting', 4, '2023-05-19 17:24:18', '2023-05-19 17:24:18'),
(8, 'Tidak Penting', 3, '2023-05-19 17:24:18', '2023-05-19 17:24:18'),
(9, 'Sangat Tidak Penting', 2, '2023-05-19 17:24:18', '2023-05-19 17:24:18'),
(10, 'Mutlak Tidak Penting', 1, '2023-05-19 17:24:18', '2023-05-19 17:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `role` enum('user','admin','superadmin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `username`, `email`, `password`, `jabatan`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'superadmin@example.com', '$2a$12$g6K8MTRRfvLWbvsjVXesk.xi6OFwhOxPs1.jPCQ1jyX23j0qmpeia', 'Super Admin', 'superadmin', '2023-05-10 14:14:51', '2023-05-10 14:14:51'),
(2, 'Admin', 'admin', 'admin@example.com', '$2a$12$cUc4Q5zhFuu4vWOe0ytJYuxK0ZMADnD6cqElsvGDBbaNj.bPWYQxC', 'Guru', 'admin', '2023-05-10 14:14:51', '2023-05-10 14:14:51'),
(3, 'Bob Smith', 'bobsmith', 'bobsmith@example.com', '$2y$10$9mMYf6U5J6pS4C.IRMyaA.CgwUMw/7dUPT/CJUnh7VwdDQ8WZ7VRO', 'Guru', 'admin', '2023-05-10 14:14:51', '2023-05-10 14:14:51'),
(6, 'tester', 'tester', 'test@gmail.com', '$2y$10$Vcbv/Q2k1RPlKw4Wk3f7m.NyuCxCxcB2w07fnPntL0ZSoFt.sKTz2', 'Guru', 'admin', '2023-05-15 06:23:22', '2023-05-15 06:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`keputusan_id`),
  ADD KEY `siswa` (`siswa_id`),
  ADD KEY `jurusan` (`jurusan_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `siswa.kelas` (`kelas_id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`sub_kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `keputusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `sub_kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `jurusan` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`jurusan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa.kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
