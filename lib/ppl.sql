-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 05:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `kode_irs` int(6) NOT NULL,
  `semester_aktif` int(20) NOT NULL,
  `jumlah_sks` int(30) NOT NULL,
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `kode_khs` varchar(6) NOT NULL,
  `semester_aktif` int(20) NOT NULL,
  `jumlah_sks_semester` int(30) NOT NULL,
  `jumlah_sks_kumulatif` int(150) NOT NULL,
  `ip_semester` int(100) NOT NULL,
  `ip_kumulatif` int(100) NOT NULL,
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(14) NOT NULL,
  `nama` char(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` char(50) DEFAULT NULL,
  `provinsi` char(50) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL,
  `jalur_masuk` char(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_handphone` varchar(13) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `dosen_wali` char(50) DEFAULT NULL,
  `kode_irs_fk` varchar(6) DEFAULT NULL,
  `kode_khs_fk` varchar(6) DEFAULT NULL,
  `kode_pkl` varchar(6) DEFAULT NULL,
  `kode_skripsi` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `kota`, `provinsi`, `angkatan`, `jalur_masuk`, `email`, `no_handphone`, `status`, `dosen_wali`, `kode_irs_fk`, `kode_khs_fk`, `kode_pkl`, `kode_skripsi`) VALUES
('24060120140132', 'Muhammad Agisni', 'Jl. Tembalang', 'Semarang', 'Jawa Tengah', 2020, 'Mandiri', 'magis@gmail.com', '081323467001', 'Aktif', 'Pak Satriyo', NULL, NULL, NULL, NULL),
('24060120140211', 'Chris', 'Tembalang', 'Semarang', 'Jawa Tengah', 2021, 'snmptn', 'chris@gmail.com', '081323456002', 'Aktif', 'Pak Siapa', NULL, NULL, NULL, NULL),
('24060120140678', 'jhonson', 'tembalang', 'Semarang', 'Jawa Tengah', 2020, 'Mandiri', 'jhon@gmail.com', '081324456102', 'Aktif', 'Pak Siapa', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `kode_pkl` varchar(6) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nilai_pkl` int(100) NOT NULL,
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `kode_skripsi` varchar(6) NOT NULL,
  `status` char(20) NOT NULL,
  `nilai_skripsi` int(100) NOT NULL,
  `tanggal_lulus` date NOT NULL,
  `lama_studi` varchar(20) NOT NULL,
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `level`) VALUES
(1, 'dosen1', 'dosen1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'dosen'),
(2, 'magis', 'magis@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(3, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`kode_irs`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`kode_khs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`kode_pkl`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`kode_skripsi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
