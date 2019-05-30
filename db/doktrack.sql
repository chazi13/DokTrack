-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2019 at 02:12 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doktrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `doc_id` int(5) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `no_surat` varchar(25) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`doc_id`, `no_agenda`, `no_surat`, `perihal`, `perusahaan`, `created_at`, `status`) VALUES
(1, 'DOK3052019218', '63/VII/2019', 'Apaan kek', 'PT. Yang Ada', '2019-05-29 19:20:11', 4),
(2, 'DOK3052019731', '69/XI/2019', 'Masukan Aja', 'PT. Yang Ah Sudahlah', '2019-05-30 00:31:48', 5);

-- --------------------------------------------------------

--
-- Table structure for table `trace`
--

CREATE TABLE IF NOT EXISTS `trace` (
  `trace_id` int(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `user_id` int(5) NOT NULL,
  `doc_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trace`
--

INSERT INTO `trace` (`trace_id`, `time`, `note`, `keterangan`, `user_id`, `doc_id`) VALUES
(1, '2019-05-29 19:20:11', '', 'Dokumen diterima', 2, 1),
(2, '2019-05-29 19:39:18', 'Dokumen lengkap dan sesuai', 'Dokumen dalam proses penelitian', 3, 1),
(4, '2019-05-29 19:44:06', '', 'Dokumen dalam proses perizinan', 4, 1),
(5, '2019-05-29 19:47:43', 'Dokumen telah lengkap dan telah disetujui', 'Dokumen telah di proses dan siap diambil', 4, 1),
(6, '2019-05-30 00:31:48', '', 'Dokumen diterima', 7, 2),
(7, '2019-05-30 01:04:34', 'Dokumen telah lengkap', 'Dokumen dalam proses penelitian', 3, 2),
(8, '2019-05-30 01:35:46', '', 'Dokumen dalam proses perizinan', 4, 2),
(9, '2019-05-30 01:39:29', 'Saya tidak setuju', 'Dokumen ditolak', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) unsigned NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('Admin','Front Desk','P2','PKC') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '$2y$10$swVuxN0887g6V3A62qX7nu/Af2ClP/sv/pgzq52gqNjP1XHIWo8Dm', 'Admin'),
(2, 'Siti Khalisah', 'siti_k', '$2y$10$nLOh2rh41jCQBQL5EUI1Demh6uUPr847xAvX4CydC15xEcIWuk2l.', 'Front Desk'),
(3, 'Latifah Khairunnisa', 'tifah_k', '$2y$10$.HH3uLlQ4GgPKy6OSsSeveIKZbAFQQAtP9BSWrSD3/lGGHDoOK3dK', 'P2'),
(4, 'Ahmad Jaelulloh', 'ahmad_j', '$2y$10$JRsJPcKHs0r/i3a3Jee37OUglQ87qjWky0Sz0yfIHENMVV39Ar/qu', 'PKC'),
(7, 'Olivia Putri', 'oliv_p', '$2y$10$kHZffSriz9uxyxFIWgdxXe9FyDaAA5K3t4HlrGsbg4CLupfVZyZ32', 'Front Desk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `track_id` (`no_agenda`);

--
-- Indexes for table `trace`
--
ALTER TABLE `trace`
  ADD PRIMARY KEY (`trace_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `doc_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trace`
--
ALTER TABLE `trace`
  MODIFY `trace_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
