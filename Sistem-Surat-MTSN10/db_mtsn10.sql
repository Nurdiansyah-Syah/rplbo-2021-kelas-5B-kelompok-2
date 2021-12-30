-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 09:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mtsn10`
--

-- --------------------------------------------------------

--
-- Table structure for table `legalisir_keluar`
--

CREATE TABLE `legalisir_keluar` (
  `id` int(11) NOT NULL,
  `no_ijazah` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_keluar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `legalisir_keluar`
--

INSERT INTO `legalisir_keluar` (`id`, `no_ijazah`, `nama`, `tanggal_keluar`) VALUES
(1, '1502nnnana', 'Putri', '2021-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_legalisir`
--

CREATE TABLE `pengajuan_legalisir` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_legalisir`
--

INSERT INTO `pengajuan_legalisir` (`id`, `nisn`, `nama`, `email`) VALUES
(0, 23, 'buku', 'mawaddawarohma2@gmail.com'),
(1, 2147483647, 'Nurdiansyah', 'nurdiansyah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id`, `nisn`, `nama`, `email`, `jenis_surat`) VALUES
(1, 2147483647, 'Putri', 'putri2@gmail.com', 'Surat Aktif Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `level_akses` enum('Administrator','KP','Staf') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level_akses`) VALUES
(1, 'Halim', 'halim123', '88f354d347594cdbd3d81d44c9263932', 'Administrator'),
(2, 'Rahman', 'rahman123', '1a0856ae5fab30c0cd4c2bffc68d4141', 'KP'),
(3, 'Mawadda', 'mawadda123', 'c089812ff4c1b3165d2bce801f6b90c2', 'Staf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `kode_surat` varchar(25) NOT NULL,
  `tanggal_keluar` varchar(30) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `kode_surat`, `tanggal_keluar`, `jenis_surat`, `nama_pemohon`) VALUES
(1, '1502/nn/2021', '2021-11-08', 'Surat_Aktif_Sekolah', 'Nurdiansyah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `legalisir_keluar`
--
ALTER TABLE `legalisir_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_ijazah` (`no_ijazah`);

--
-- Indexes for table `pengajuan_legalisir`
--
ALTER TABLE `pengajuan_legalisir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_surat` (`kode_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
