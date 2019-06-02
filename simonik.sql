-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 08:00 PM
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
(1, 3, 2, 'Ketakmiran', 5, 6),
(2, 3, 2, 'Keputrian', 7, 8);

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
  `id_bidang` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar_proker`
--

INSERT INTO `tb_daftar_proker` (`id_proker`, `nama_proker`, `ketua_proker`, `tanggal_proker`, `tempat_proker`, `id_ukm`, `id_bidang`, `id_periode`) VALUES
(1, 'Safari Dakwah', 9, '2019-05-25', 'Desa Bulupitu', 3, 1, 0),
(2, 'Sholawatan Rutin', 11, '2019-06-02', 'Masjid Raya An Nur Polinema', 3, 1, 0),
(3, 'Firma Ceria', 16, '2019-06-25', 'Aula Pertamina', 3, 2, 0);

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
  `id_jobdesk` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_sie` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `file_laporan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_file_backup`
--

INSERT INTO `tb_file_backup` (`id_file`, `id_jobdesk`, `id_proker`, `id_bidang`, `id_ukm`, `id_sie`, `id_periode`, `file_laporan`) VALUES
(1, 1, 1, 1, 3, 1, 2, ''),
(2, 2, 1, 1, 3, 1, 2, ''),
(3, 3, 1, 1, 3, 1, 2, ''),
(4, 4, 1, 1, 3, 2, 2, ''),
(5, 5, 1, 1, 3, 3, 2, 'Document_51559471011.pdf'),
(6, 6, 1, 1, 3, 13, 2, ''),
(7, 7, 1, 1, 3, 13, 2, ''),
(8, 8, 2, 1, 3, 1, 2, 'Document_81559486827.pdf'),
(9, 9, 2, 1, 3, 1, 2, ''),
(10, 10, 2, 1, 3, 2, 2, ''),
(11, 11, 2, 1, 3, 2, 2, ''),
(12, 12, 2, 1, 3, 3, 2, ''),
(13, 13, 2, 1, 3, 3, 2, ''),
(14, 14, 2, 1, 3, 3, 2, ''),
(15, 15, 2, 1, 3, 14, 2, ''),
(16, 16, 2, 1, 3, 14, 2, ''),
(17, 17, 3, 2, 3, 1, 2, ''),
(18, 18, 3, 2, 3, 1, 2, ''),
(19, 19, 3, 2, 3, 2, 2, ''),
(20, 20, 3, 2, 3, 2, 2, ''),
(21, 21, 3, 2, 3, 3, 2, ''),
(22, 22, 3, 2, 3, 3, 2, ''),
(23, 23, 3, 2, 3, 3, 2, ''),
(24, 24, 3, 2, 3, 15, 2, ''),
(25, 25, 3, 2, 3, 15, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobdesk`
--

CREATE TABLE `tb_jobdesk` (
  `id_jobdesk` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_sie` int(5) NOT NULL,
  `nama_jobdesk` varchar(200) NOT NULL,
  `startline` date NOT NULL,
  `deadline` date NOT NULL,
  `status_jobdesk` enum('Belum Dikerjakan','Progres','Sudah Dikerjakan') NOT NULL,
  `catatan_progres` varchar(200) NOT NULL,
  `file_laporan` varchar(50) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jobdesk`
--

INSERT INTO `tb_jobdesk` (`id_jobdesk`, `id_ukm`, `id_proker`, `id_sie`, `nama_jobdesk`, `startline`, `deadline`, `status_jobdesk`, `catatan_progres`, `file_laporan`, `id_user`) VALUES
(1, 3, 1, 1, 'Membuat Jobdesk', '2019-05-22', '2019-05-31', 'Progres', '', '', 9),
(2, 3, 1, 1, 'Mengontrol Kinerja Anggota', '2019-05-23', '2019-06-15', 'Belum Dikerjakan', '', '', 9),
(3, 3, 1, 1, 'Menghubungi Pemateri', '2019-05-27', '2019-06-05', 'Belum Dikerjakan', '', '', 9),
(4, 3, 1, 2, 'Membuat Proposal Kegiatan', '2019-05-27', '2019-05-29', 'Belum Dikerjakan', '', '', 9),
(5, 3, 1, 3, 'Membuat Susunan Acara', '2019-05-27', '2019-05-31', 'Progres', 'Kurang susac bagian pembukaan saja', 'Document_51559471011.pdf', 9),
(6, 3, 1, 13, 'Menjalankan Birokrasi Proposal', '2019-05-27', '2019-06-12', 'Belum Dikerjakan', '', '', 9),
(7, 3, 1, 13, 'Meminta Scan TTD', '2019-05-29', '2019-06-12', 'Belum Dikerjakan', '', '', 9),
(8, 3, 2, 1, 'Membuat Jobdesk', '2019-05-22', '2019-06-05', 'Progres', '', 'Document_81559486827.pdf', 11),
(9, 3, 2, 1, 'Menghubungi Pemateri', '2019-05-27', '2019-06-03', 'Progres', '', '', 11),
(10, 3, 2, 2, 'Membuat Proposal Kegiatan', '2019-05-23', '2019-05-25', 'Belum Dikerjakan', '', '', 11),
(11, 3, 2, 2, 'Membuat Undangan', '2019-05-27', '2019-05-30', 'Belum Dikerjakan', '', '', 11),
(12, 3, 2, 3, 'Membuat Susunan Acara', '2019-05-27', '2019-05-29', 'Belum Dikerjakan', '', '', 11),
(13, 3, 2, 3, 'Membuat Susunan Panitia Teknis', '2019-05-27', '2019-05-30', 'Belum Dikerjakan', '', '', 11),
(14, 3, 2, 3, 'Membuat List Perlengkapan', '2019-05-29', '2019-05-31', 'Belum Dikerjakan', '', '', 11),
(15, 3, 2, 14, 'Membuat Desain Backdrop', '2019-05-27', '2019-05-30', 'Belum Dikerjakan', '', '', 11),
(16, 3, 2, 14, 'Membuat Slide Selamat Datang', '2019-05-30', '2019-06-02', 'Belum Dikerjakan', '', '', 11),
(17, 3, 3, 1, 'Membuat Jobdesk', '2019-05-22', '2019-05-23', 'Belum Dikerjakan', '', '', 16),
(18, 3, 3, 1, 'Menghubungi Pemateri', '2019-05-27', '2019-05-30', 'Belum Dikerjakan', '', '', 16),
(19, 3, 3, 2, 'Membuat Proposal Kegiatan', '2019-05-23', '2019-05-24', 'Belum Dikerjakan', '', '', 16),
(20, 3, 3, 2, 'Membuat Surat Peminjaman Barang', '2019-05-27', '2019-05-31', 'Belum Dikerjakan', '', '', 16),
(21, 3, 3, 3, 'Membuat Susunan Panitia Teknis', '2019-05-23', '2019-05-25', 'Belum Dikerjakan', '', '', 16),
(22, 3, 3, 3, 'Membuat List Anggaran Dana', '2019-05-27', '2019-05-29', 'Belum Dikerjakan', '', '', 16),
(23, 3, 3, 3, 'Membuat List Perlengkapan', '2019-05-27', '2019-05-29', 'Belum Dikerjakan', '', '', 16),
(24, 3, 3, 15, 'Membuat List Perlengkapan', '2019-05-27', '2019-05-29', 'Belum Dikerjakan', '', '', 16),
(25, 3, 3, 15, 'Membuat List Anggaran Dana', '2019-05-28', '2019-05-31', 'Belum Dikerjakan', '', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id_notifikasi` bigint(20) NOT NULL,
  `tipe_notifikasi` varchar(20) NOT NULL,
  `id_jobdesk` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_sie` int(5) NOT NULL,
  `konten_notifikasi` longtext NOT NULL,
  `penerima_notifikasi` int(5) NOT NULL,
  `tautan_notifikasi` text NOT NULL,
  `status_notifikasi` enum('0','1') NOT NULL DEFAULT '0',
  `tanggal_notifikasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`id_notifikasi`, `tipe_notifikasi`, `id_jobdesk`, `id_proker`, `id_sie`, `konten_notifikasi`, `penerima_notifikasi`, `tautan_notifikasi`, `status_notifikasi`, `tanggal_notifikasi`) VALUES
(184, 'website', 16, 2, 14, 'Membuat Slide Selamat Datang', 21, 'http://localhost/simonik/anggota/Proker/index_detail/16/2/14', '1', '2019-06-02 06:17:18'),
(187, 'website', 9, 2, 1, 'Menghubungi Pemateri', 11, 'http://localhost/simonik/anggota/Proker/index_detail/9/2/1', '1', '2019-06-02 06:41:28');

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
(1, 1, 3, 2, 9, 1, 'Ketua Pelaksana'),
(2, 2, 3, 2, 11, 1, 'Ketua Pelaksana'),
(3, 3, 3, 2, 16, 1, 'Ketua Pelaksana'),
(4, 1, 3, 2, 10, 2, 'Koordinator Sie'),
(5, 1, 3, 2, 11, 3, 'Koordinator Sie'),
(6, 1, 3, 2, 12, 3, 'Anggota Sie'),
(7, 1, 3, 2, 13, 3, 'Anggota Sie'),
(8, 1, 3, 2, 14, 13, 'Koordinator Sie'),
(9, 1, 3, 2, 15, 13, 'Anggota Sie'),
(10, 1, 3, 2, 16, 13, 'Anggota Sie'),
(11, 2, 3, 2, 17, 2, 'Koordinator Sie'),
(12, 2, 3, 2, 18, 3, 'Koordinator Sie'),
(13, 2, 3, 2, 19, 3, 'Anggota Sie'),
(14, 2, 3, 2, 20, 3, 'Anggota Sie'),
(15, 2, 3, 2, 21, 14, 'Koordinator Sie'),
(16, 2, 3, 2, 22, 14, 'Anggota Sie'),
(17, 2, 3, 2, 23, 14, 'Anggota Sie'),
(18, 3, 3, 2, 24, 2, 'Koordinator Sie'),
(19, 3, 3, 2, 25, 3, 'Koordinator Sie'),
(20, 3, 3, 2, 26, 3, 'Anggota Sie'),
(21, 3, 3, 2, 27, 3, 'Anggota Sie'),
(22, 3, 3, 2, 15, 15, 'Koordinator Sie'),
(23, 3, 3, 2, 28, 15, 'Anggota Sie'),
(24, 3, 3, 2, 29, 15, 'Anggota Sie');

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
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `rate` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_ukm`, `id_proker`, `id_periode`, `rate`) VALUES
(1, 3, 1, 2, 0),
(2, 3, 2, 2, 0),
(3, 3, 3, 2, 0);

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
(3, 'Sie Acara', 3),
(13, 'Sie Humas', 3),
(14, 'Sie Pubdekdok', 3),
(15, 'Sie Perlengkapan', 3);

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
(3, 'RISPOL');

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
(1, 'Erlangga Panji', '1731710090', '1731710090', '1731710090', '088976512342', 'erlangga4@gmail.com', 1, 2, 1, ''),
(4, 'Alessandro Eka', '1731810080', '1731810080', '1731810080', '088765432421', 'alessandro9@gmail.com', 2, 2, 3, 'RISPOL-BIRU.png'),
(5, 'Agung Cahya', '1731814598', '1731814598', '1731814598', '088523423467', 'agung3@gmail.com', 3, 2, 3, ''),
(6, 'Riza Cahya', '1781652432', '1781652432', '1781652432', '088976543256', 'riza@gmail.com', 3, 2, 3, ''),
(7, 'Nunung Iswati', '1784326745', '1784326745', '1784326745', '088765432456', 'nunung@gmail.com', 3, 2, 3, ''),
(8, 'Miftahul Jannah', '1781009865', '1781009865', '1781009865', '088434567834', 'mifjan@gmail.com', 3, 2, 3, ''),
(9, 'Tomi Sekaroni', '1871310086', '1871310086', '1871310086', '088654356789', 'tomi3@gmail.com', 5, 2, 3, ''),
(10, 'Reni Mahaputri', '1871310089', '1871310089', '1871310089', '088567843521', 'reni2@gmail.com', 5, 2, 3, ''),
(11, 'Dafa Eka Putra', '1871412080', '1871412080', '1871412080', '088765435632', 'dafa3@gmail.com', 5, 2, 3, ''),
(12, 'Gilang Syaputra', '1871212089', '1871212089', '1871212089', '088987654324', 'gilang4@gmail.com', 5, 2, 3, ''),
(13, 'Mega Yani Insan', '1871414081', '1871414081', '1871414081', '088976567835', 'mega5@gmail.com', 5, 2, 3, ''),
(14, 'Ilham Eko Putra', '1871213089', '1871213089', '1871213089', '088765434523', 'ilham4@gmail.com', 5, 2, 3, ''),
(15, 'Desta Wika Cahya', '1871912081', '1871912081', '1871912081', '088765678924', 'desta4@gmail.com', 5, 2, 3, ''),
(16, 'Hanum Cahyani', '1871312088', '1871312088', '1871312088', '088976543267', 'hanum4@gmail.com', 5, 2, 3, ''),
(17, 'Putri Handayani', '1874422009', '1874422009', '1874422009', '088767865434', 'putri4@gmail.com', 5, 2, 3, ''),
(18, 'Leo Eka', '1871513089', '1871513089', '1871513089', '088456789032', 'leo7@gmail.com', 5, 2, 3, ''),
(19, 'Galih Indra Permana', '1871712088', '1871712088', '1871712088', '088678909832', 'galih3@gmail.com', 5, 2, 3, ''),
(20, 'Firda Permana Sari', '1871712089', '1871712089', '1871712089', '088654324567', 'firda7@gmail.com', 5, 2, 3, ''),
(21, 'Roki Santonio', '1871912082', '1871912082', '1871912082', '088976543289', 'roki5@gmail.com', 5, 2, 3, ''),
(22, 'Ahmad Raka', '1871115089', '1871115089', '1871115089', '088245678943', 'ahmad5@gmail.com', 5, 2, 3, ''),
(23, 'Sena Firdaus Putra', '1871712083', '1871712083', '1871712083', '088765432278', 'sena6@gmail.com', 5, 2, 3, ''),
(24, 'Sulistiana', '1871013087', '1871013087', '1871013087', '088756743245', 'sulis4@gmail.com', 5, 2, 3, ''),
(25, 'Azis Magra', '1871418011', '1871418011', '1871418011', '088765432456', 'azis9@gmail.com', 5, 2, 3, ''),
(26, 'Mela Ana', '1871410089', '1871410089', '1871410089', '088654324567', 'mela7@gmail.com', 5, 2, 3, ''),
(27, 'Nana Meliana', '1871812089', '1871812089', '1871812089', '088765432145', 'nana7@gmail.com', 5, 2, 3, ''),
(28, 'Rizal Rahmad', '1871111081', '1871111081', '1871111081', '088765432456', 'rizal6@gmail.com', 5, 2, 3, ''),
(29, 'Shenlong Rega', '1891212010', '1891212010', '1891212010', '088543245678', 'shenlong5@gmail.com', 5, 2, 3, '');

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
-- Indexes for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `penerima_notifikasi` (`penerima_notifikasi`);

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
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`);

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
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_file` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  MODIFY `id_jobdesk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `tb_panitia_proker`
--
ALTER TABLE `tb_panitia_proker`
  MODIFY `id_panitia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sie`
--
ALTER TABLE `tb_sie`
  MODIFY `id_sie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_type_user`
--
ALTER TABLE `tb_type_user`
  MODIFY `id_type_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ukm`
--
ALTER TABLE `tb_ukm`
  MODIFY `id_ukm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD CONSTRAINT `tb_notifikasi_ibfk_1` FOREIGN KEY (`penerima_notifikasi`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
