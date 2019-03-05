-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 09:22 AM
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

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `id_ukm`, `id_periode`, `nama_bidang`, `ketua_bidang`, `sekretaris_bidang`) VALUES
(1, 3, 2, 'Syiar', 3, 8),
(2, 3, 2, 'Ketakmiran', 11, 12),
(3, 3, 2, 'Keputrian', 17, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_proker`
--

CREATE TABLE `tb_daftar_proker` (
  `id_proker` int(5) NOT NULL,
  `nama_proker` varchar(50) NOT NULL,
  `ketua_proker` int(5) NOT NULL,
  `tanggal_proker` date NOT NULL,
  `tempat_proker` varchar(50) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_bidang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar_proker`
--

INSERT INTO `tb_daftar_proker` (`id_proker`, `nama_proker`, `ketua_proker`, `tanggal_proker`, `tempat_proker`, `id_ukm`, `id_bidang`) VALUES
(1, 'Safari Dakwah', 10, '2019-03-16', '', 3, 1),
(2, 'Polinema Bersholawat', 13, '2019-02-28', '', 3, 2),
(3, 'Palhalbil', 16, '2019-03-01', '', 3, 2),
(4, 'Firma Ceria', 19, '2019-03-07', '', 3, 3);

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

--
-- Dumping data for table `tb_jobdesk`
--

INSERT INTO `tb_jobdesk` (`id_jobdesk`, `id_ukm`, `id_proker`, `id_sie`, `nama_jobdesk`, `startline`, `deadline`, `status_jobdesk`, `file_laporan`, `id_user`) VALUES
(1, 3, 1, 4, 'Membuat Susunan Acara', '2019-03-01', '2019-03-04', 'Sudah Dikerjakan', '', 10),
(2, 3, 1, 4, 'Membuat Susunan Panintia', '2019-03-07', '2019-03-09', 'Progres', '', 10),
(4, 3, 1, 1, 'Membuat Jobdesk', '2019-03-01', '2019-03-02', 'Progres', '', 3),
(5, 3, 2, 1, 'Mengontrol Kerja Anggotam', '2019-03-01', '2019-03-30', 'Belum Dikerjakan', '', 13),
(6, 3, 1, 1, 'Menghubungi Pemateri', '2019-03-15', '2019-03-16', 'Belum Dikerjakan', '', 10),
(7, 3, 2, 4, 'Menentukan Panitia Teknis', '2019-03-06', '2019-03-08', 'Belum Dikerjakan', 'CV2.pdf', 13);

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
  `id_sie` int(5) NOT NULL,
  `jenis_panitia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_panitia_proker`
--

INSERT INTO `tb_panitia_proker` (`id_panitia`, `id_proker`, `id_ukm`, `id_periode`, `id_user`, `id_sie`, `jenis_panitia`) VALUES
(1, 1, 3, 2, 10, 1, ''),
(2, 2, 3, 2, 13, 1, ''),
(3, 3, 3, 2, 16, 1, ''),
(4, 4, 3, 2, 19, 1, ''),
(5, 2, 3, 2, 16, 4, 'Anggota Sie'),
(6, 1, 3, 2, 19, 4, 'Koordinator Sie');

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
(1, '2018/2019'),
(2, '2019/2020');

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
(1, 'Ketua Pelaksana', 3),
(2, 'Sekretaris Pelaksana', 3),
(4, 'Sie Acara', 3),
(5, 'Sie Humas', 3),
(6, 'Sie Perlengkapan', 3),
(7, 'Sie Konsumsi', 3),
(8, 'Sie Pubdekdok', 3),
(9, 'Sie Galang Dana', 3);

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
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Badan Pengurus Harian'),
(4, 'Divisi'),
(5, 'Anggota');

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
(1, 'BEM'),
(2, 'DPM'),
(3, 'RISPOL'),
(4, 'KOMPEN'),
(5, 'PLFM'),
(6, 'MENWA'),
(7, 'HMM'),
(8, 'HME'),
(9, 'HMA'),
(10, 'HIMANIA'),
(11, 'TALITAKUM'),
(12, 'KMK'),
(13, 'PP'),
(14, 'USMA'),
(15, 'BKM'),
(16, 'SENI'),
(17, 'OR'),
(18, 'PASTI'),
(19, 'OPA GG');

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
  `id_ukm` int(5) NOT NULL,
  `foto_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `nim`, `username`, `password`, `no_telp_user`, `email_user`, `id_type_user`, `id_periode`, `id_ukm`, `foto_user`) VALUES
(1, 'Erlangga Dwi Prasetya', '1741223007', '1741223007', '1741223007', '088976543213', 'erlangga@gmail.com', 1, 2, 1, ''),
(2, 'Alesandro Eka P', '167409808', '167409808', '167409808', '087989898991', 'alesandroeka@gmail.com', 2, 2, 3, 'Untitled.png'),
(3, 'Rizky P', '163988198', '163988198', '163988198', '08108200299', 'Rizki@gmail.com', 3, 2, 3, ''),
(7, 'Aris', '163892891', '163892891', '163892891', '912012019201', 'aris@gmail.com', 4, 2, 3, 'IMG20181114154432.jpg'),
(8, 'Riza', '198918219', '198918219', '198918219', '898983', 'aksjaksja@gmail.com', 3, 2, 3, 'Untitled-1.jpg'),
(10, 'Tomi', '183281298', '183281298', '183281298', '08792928282', 'amama@gmail.com', 5, 2, 3, 'kupon_masjid.png'),
(11, 'M agung Cahya Diyanto', '173152525257', '173152525257', '173152525257', '088723232323', 'agung@gmail.com', 3, 2, 3, '1548755cb44ff8e4a45ebd1eb88eca2d.jpg'),
(12, 'Mia narulita', '173121223232', '173121223232', '173121223232', '08875656677878', 'mia@gmail.com', 3, 2, 3, 'index.jpg'),
(13, 'Galih Sukma Indra', '187262652525', '187262652525', '187262652525', '08852626262', 'galih@gmail.com', 5, 2, 3, '4-google-flat.jpg'),
(14, 'M Faiq Munir', '173232322333', '173232322333', '173232322333', '0885353535353', 'faiq@gmail.com', 3, 2, 3, '53168-responsive-layout.jpg'),
(15, 'Yuni Adam', '173626263637', '173626263637', '173626263637', '088536373737', 'yuni@gmail.com', 3, 2, 3, '500_F_118976220_tDNkMVmS10peequbs9KFtQ1x24S8nUeX.jpg'),
(16, 'Rega Setya Raga', '1831626262673', '1831626262673', '1831626262673', '0886535262727', 'rega@gmail.com', 5, 2, 3, 'Capture.PNG'),
(17, 'Nunung Iswati', '173232322344', '173232322344', '173232322344', '08876353536536', 'noenoeng@gmail.com', 3, 2, 3, '7252-01-flat-design-process-powerpoint-16x9-8.jpg'),
(18, 'Miftahul Jannah', '1782323232323', '1782323232323', '1782323232323', '0883526326737', 'miftah@gmail.com', 3, 2, 3, 'classic-solar-system-scheme-with-flat-design_23-2147929092.jpg'),
(19, 'Hanum Ega', '1842332348889', '1842332348889', '1842332348889', '088537372887', 'hanum@gmail.com', 5, 2, 3, 'joomla-features.jpg');

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
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_daftar_proker`
--
ALTER TABLE `tb_daftar_proker`
  MODIFY `id_proker` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_jobdesk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_panitia_proker`
--
ALTER TABLE `tb_panitia_proker`
  MODIFY `id_panitia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sie`
--
ALTER TABLE `tb_sie`
  MODIFY `id_sie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_type_user`
--
ALTER TABLE `tb_type_user`
  MODIFY `id_type_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ukm`
--
ALTER TABLE `tb_ukm`
  MODIFY `id_ukm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
