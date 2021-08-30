-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 09:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rizkinovitria-sertifikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `kategori` enum('Undangan','Pengumuman','Nota Dinas','Pemberitahuan') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `waktu_pengarsipan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `no_surat`, `kategori`, `judul`, `file_surat`, `waktu_pengarsipan`) VALUES
(5, '4949279u8289', 'Undangan', 'denjeh', 'giftbox-10x29x42_cm___64b2f8fv.pdf', '2021-08-30 06:45:20'),
(6, '330/123/020502021/Undangan/LSP', 'Undangan', 'Undangan Rapat Dewan', 'SOAL_TES_OBSERVASI_SERTIKOM_BNSP_2021.pdf', '2021-08-30 06:50:27'),
(7, '01/003/2021/Pemberitahuan', 'Pemberitahuan', 'Pemberitahuan ', 'TATA_CARA_BIMBINGAN_ABSTRAK_TUGAS_AKHIR_LA_SKRIPSI_2021.pdf', '2021-08-30 07:25:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
