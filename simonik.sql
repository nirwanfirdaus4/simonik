-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 02:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simonik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `ketua_bidang` int(5) NOT NULL,
  `sekretaris_bidang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_proker`
--

CREATE TABLE `tb_daftar_proker` (
  `id_proker` int(5) NOT NULL,
  `nama_proker` varchar(50) NOT NULL,
  `ketua_proker` int(5) NOT NULL,
  `tanggal_proker` date NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_bidang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_evaluasi` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_sie` int(5) NOT NULL,
  `hasil_evaluasi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_file_backup`
--

CREATE TABLE `tb_file_backup` (
  `id_file` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_sie` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `file_laporan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobdesk`
--

CREATE TABLE `tb_jobdesk` (
  `id_jobdesk` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_sie` int(5) NOT NULL,
  `nama_jobdesk` varchar(50) NOT NULL,
  `startline` date NOT NULL,
  `deadline` date NOT NULL,
  `status_jobdesk` enum('Belum Dikerjakan','Progres','Sudah Dikerjakan') NOT NULL,
  `file_laporan` varchar(50) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_panitia_proker`
--

CREATE TABLE `tb_panitia_proker` (
  `id_panitia` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_sie` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode`
--

CREATE TABLE `tb_periode` (
  `id_periode` int(5) NOT NULL,
  `th_periode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `th_periode`) VALUES
(9, '2017/2018'),
(10, '2018/2019'),
(11, '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sie`
--

CREATE TABLE `tb_sie` (
  `id_sie` int(5) NOT NULL,
  `nama_sie` varchar(40) NOT NULL,
  `id_ukm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sie`
--

INSERT INTO `tb_sie` (`id_sie`, `nama_sie`, `id_ukm`) VALUES
(1, 'Ketua Pelaksana', 0),
(2, 'Sekretaris Pelaksana', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_user`
--

CREATE TABLE `tb_type_user` (
  `id_type_user` int(5) NOT NULL,
  `nama_type_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_type_user`
--

INSERT INTO `tb_type_user` (`id_type_user`, `nama_type_user`) VALUES
(1, 'Super admin'),
(2, 'Admin'),
(6, 'Badan Pengurus Harian'),
(7, 'Divisi'),
(8, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukm`
--

CREATE TABLE `tb_ukm` (
  `id_ukm` int(5) NOT NULL,
  `nama_ukm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ukm`
--

INSERT INTO `tb_ukm` (`id_ukm`, `nama_ukm`) VALUES
(3, 'BEM'),
(30, 'DPM'),
(31, 'RISPOL'),
(32, 'USMA'),
(33, 'KOMPEN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(70) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_telp_user` varchar(15) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `id_type_user` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `nim`, `username`, `password`, `no_telp_user`, `email_user`, `id_type_user`, `id_periode`, `id_ukm`) VALUES
(12, 'Erlangga Panji Wibawa', '1731273382', '1731273382', 'super', '088976543234', 'erlangga7@gmail.com', 1, 11, 3),
(13, 'Abdulloh Habibie', '1631710011', '1631710011', 'admin', '088376743239', 'habibie4@gmail.com', 2, 11, 31),
(14, 'Gatot Kaca Pecah', '1631710923', '1631710923', 'bph', '088176543232', 'gatotkaca@gmail.com', 6, 11, 31),
(17, 'Alessandro Eka', '1731565563', '1731565563', 'anggota', '088965432124', 'ales@gmail.com', 8, 11, 31),
(18, 'Aji Broto Pakuningrat', '1531762212', '', '', '08865342122', 'ajibroto@gmail.com', 7, 11, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tb_daftar_proker`
--
ALTER TABLE `tb_daftar_proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indexes for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indexes for table `tb_file_backup`
--
ALTER TABLE `tb_file_backup`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  ADD PRIMARY KEY (`id_jobdesk`);

--
-- Indexes for table `tb_panitia_proker`
--
ALTER TABLE `tb_panitia_proker`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `tb_sie`
--
ALTER TABLE `tb_sie`
  ADD PRIMARY KEY (`id_sie`);

--
-- Indexes for table `tb_type_user`
--
ALTER TABLE `tb_type_user`
  ADD PRIMARY KEY (`id_type_user`);

--
-- Indexes for table `tb_ukm`
--
ALTER TABLE `tb_ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_daftar_proker`
--
ALTER TABLE `tb_daftar_proker`
  MODIFY `id_proker` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_file_backup`
--
ALTER TABLE `tb_file_backup`
  MODIFY `id_file` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  MODIFY `id_jobdesk` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_panitia_proker`
--
ALTER TABLE `tb_panitia_proker`
  MODIFY `id_panitia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_sie`
--
ALTER TABLE `tb_sie`
  MODIFY `id_sie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_type_user`
--
ALTER TABLE `tb_type_user`
  MODIFY `id_type_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_ukm`
--
ALTER TABLE `tb_ukm`
  MODIFY `id_ukm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
