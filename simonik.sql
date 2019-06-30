-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 12:05 AM
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
-- Table structure for table `kategori_lapor`
--

CREATE TABLE `kategori_lapor` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(80) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_lapor`
--

INSERT INTO `kategori_lapor` (`id_kategori`, `nama_kategori`, `nilai`) VALUES
(3, 'Belum Dikerjakan', '0'),
(4, 'Progres', '50'),
(5, 'Sudah Dikerjakan', '100');

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
(2, 3, 2, 'Keputrian', 7, 8),
(4, 10, 2, 'Tata bogab', 47, 48),
(5, 33, 2, 'Ketakmiran', 58, 59),
(6, 33, 2, 'Syiar', 63, 64),
(7, 33, 2, 'Humas', 75, 76),
(8, 33, 2, 'Kaderisasi', 69, 70),
(9, 33, 2, 'Mentoring', 80, 81),
(10, 33, 2, 'Keputrian', 86, 87),
(11, 37, 2, 'Ketakmiran', 113, 114),
(12, 37, 2, 'Syi\'ar', 118, 119),
(13, 37, 2, 'Kaderisasi', 124, 125),
(14, 37, 2, 'Humas', 130, 131),
(15, 37, 2, 'Mentoring', 135, 136),
(16, 37, 2, 'Keputrian', 141, 142),
(17, 26, 2, 'Olahraga Darat', 168, 168),
(18, 38, 2, 'COba 1', 173, 173);

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
(1, 'Safari Dakwah', 9, '2019-06-17', 'Desa Bulupitu', 3, 1, 0),
(2, 'Sholawatan Rutin', 11, '2019-06-02', 'Masjid Raya An Nur Polinema', 3, 1, 0),
(3, 'Firma Ceria', 16, '2019-06-25', 'Aula Pertamina', 3, 2, 0),
(6, 'Proker kucing', 49, '2019-07-02', 'Polinema', 10, 4, 2),
(7, 'Safari Dakwah', 102, '2019-06-01', 'Desa Taman Satrian Dampit', 33, 6, 2),
(8, 'Palhalbil', 103, '2019-06-29', 'Gd. AH Polinema', 33, 7, 2),
(9, 'Palhalbil', 145, '2019-07-01', 'Auditorium AH', 37, 14, 2),
(11, 'ISO 1', 147, '2019-08-01', 'Ledok Ombo', 37, 13, 2),
(12, 'Safari Dakwah', 152, '2019-06-17', 'Desa Taman Kesatrian', 37, 12, 2),
(13, 'Opening Mentoring', 155, '2019-07-31', 'Graha Polinema', 37, 15, 2),
(14, 'Expo', 146, '2019-06-19', 'Gedung AH', 37, 14, 2),
(15, 'Pimpong', 169, '2019-06-21', 'Aula Pertamina', 26, 17, 2),
(16, 'Pimpong Hutan', 174, '2019-06-22', 'Hutan RIngin', 38, 18, 2);

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

--
-- Dumping data for table `tb_evaluasi`
--

INSERT INTO `tb_evaluasi` (`id_evaluasi`, `id_ukm`, `id_periode`, `id_proker`, `id_sie`, `hasil_evaluasi`) VALUES
(4, 37, 2, 9, 218, '<p>cssssssasdadxa</p>');

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
(31, 31, 9, 14, 37, 218, 2, 'Document_311560851763.pdf'),
(32, 32, 9, 14, 37, 218, 2, ''),
(33, 33, 9, 14, 37, 218, 2, ''),
(34, 34, 9, 14, 37, 219, 2, ''),
(35, 35, 9, 14, 37, 219, 2, ''),
(36, 36, 9, 14, 37, 219, 2, ''),
(37, 37, 9, 14, 37, 219, 2, ''),
(38, 38, 9, 14, 37, 220, 2, ''),
(39, 39, 9, 14, 37, 220, 2, ''),
(40, 40, 9, 14, 37, 220, 2, ''),
(41, 41, 9, 14, 37, 220, 2, ''),
(42, 42, 9, 14, 37, 220, 2, ''),
(43, 43, 9, 14, 37, 221, 2, ''),
(44, 44, 9, 14, 37, 221, 2, ''),
(45, 45, 9, 14, 37, 221, 2, ''),
(46, 46, 9, 14, 37, 221, 2, ''),
(47, 47, 9, 14, 37, 221, 2, ''),
(48, 48, 9, 14, 37, 222, 2, ''),
(49, 49, 9, 14, 37, 222, 2, ''),
(50, 50, 9, 14, 37, 223, 2, ''),
(51, 51, 9, 14, 37, 223, 2, ''),
(52, 52, 9, 14, 37, 223, 2, ''),
(53, 53, 9, 14, 37, 223, 2, ''),
(54, 54, 9, 14, 37, 223, 2, ''),
(55, 55, 9, 14, 37, 223, 2, ''),
(56, 56, 9, 14, 37, 224, 2, ''),
(57, 57, 9, 14, 37, 224, 2, ''),
(58, 58, 9, 14, 37, 224, 2, ''),
(59, 59, 9, 14, 37, 224, 2, ''),
(60, 60, 9, 14, 37, 226, 2, ''),
(61, 61, 9, 14, 37, 226, 2, ''),
(62, 62, 9, 14, 37, 226, 2, ''),
(63, 63, 9, 14, 37, 226, 2, ''),
(64, 64, 9, 14, 37, 226, 2, ''),
(65, 65, 9, 14, 37, 226, 2, ''),
(66, 66, 12, 12, 37, 218, 2, ''),
(69, 69, 9, 14, 37, 218, 2, ''),
(70, 70, 14, 14, 37, 218, 2, ''),
(71, 71, 14, 14, 37, 218, 2, ''),
(73, 73, 15, 17, 26, 152, 2, ''),
(74, 74, 16, 18, 38, 227, 2, '');

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
  `validasi` varchar(40) NOT NULL,
  `catatan_progres` varchar(200) NOT NULL,
  `file_laporan` varchar(50) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jobdesk`
--

INSERT INTO `tb_jobdesk` (`id_jobdesk`, `id_ukm`, `id_proker`, `id_sie`, `nama_jobdesk`, `startline`, `deadline`, `status_jobdesk`, `validasi`, `catatan_progres`, `file_laporan`, `id_user`) VALUES
(31, 37, 9, 218, 'Membuat Jobdesk', '2019-06-11', '2019-06-19', 'Progres', 'Belum selesai', '-Kurang jobdesk sie perkap saja\n-tambah job buat suspan d acara', 'Document_311560851763.pdf', 145),
(32, 37, 9, 218, 'Menghubungi Pemateri', '2019-06-13', '2019-06-20', 'Sudah Dikerjakan', 'Tervalidasi', '', '', 145),
(33, 37, 9, 218, 'Mengontrol Anggota', '2019-06-20', '2019-06-29', 'Belum Dikerjakan', 'Belum selesai', '', '', 145),
(34, 37, 9, 219, 'Membuat Proposal', '2019-06-11', '2019-06-15', 'Sudah Dikerjakan', '', 'sudah dikerjakan semua', '', 145),
(35, 37, 9, 219, 'Membuat Undangan Pemateri', '2019-06-11', '2019-06-20', 'Sudah Dikerjakan', '', 'alhamdulillah beres', '', 145),
(36, 37, 9, 219, 'Membuat LPJ Kelembagaan', '2019-07-01', '2019-07-04', 'Belum Dikerjakan', '', '', '', 145),
(37, 37, 9, 219, 'Membuat Absensi', '2019-06-19', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(38, 37, 9, 220, 'Membuat Konsep dan Susunan  Acara', '2019-06-19', '2019-06-26', 'Progres', '', '', '', 146),
(39, 37, 9, 220, 'Menentukan Paitia Teknis', '2019-06-18', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(40, 37, 9, 220, 'Membuat Anggaran Dana yang Dibutuhkan', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(41, 37, 9, 220, 'Membuat List Perlengkapan', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(42, 37, 9, 220, 'Membuat Juklak Juknis', '2019-06-20', '2019-06-26', 'Belum Dikerjakan', '', '', '', 145),
(43, 37, 9, 221, 'Mencatat anggaran dana masing-masing sie', '2019-06-18', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(44, 37, 9, 221, 'Mencatat semua pemasukan dan pengeluaran', '2019-06-19', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(45, 37, 9, 221, 'Mengkoordinir pengeluaran tiap sie (disertai nota)', '2019-06-18', '2019-06-26', 'Belum Dikerjakan', '', '', '', 145),
(46, 37, 9, 221, 'Mengkoordinir iuran fungsionaris', '2019-06-18', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(47, 37, 9, 221, 'Membuat laporan keuangan untuk LPJ', '2019-07-01', '2019-07-06', 'Belum Dikerjakan', '', '', '', 145),
(48, 37, 9, 222, 'Meminta list perlengkapan tiap-tiap sie', '2019-06-18', '2019-06-29', 'Belum Dikerjakan', '', '', '', 145),
(49, 37, 9, 222, 'Membuat anggaran dana yang dibutuhkan', '2019-06-19', '2019-06-19', 'Belum Dikerjakan', '', '', '', 145),
(50, 37, 9, 223, 'Membuat desain banner eksternal dan X banner', '2019-06-19', '2019-06-23', 'Belum Dikerjakan', '', '', '', 145),
(51, 37, 9, 223, 'Membuat desain banner internal dan pamflet', '2019-06-18', '2019-06-23', 'Belum Dikerjakan', '', '', '', 145),
(52, 37, 9, 223, 'Membuat desain backdrop,vendel,stiker', '2019-06-19', '2019-06-23', 'Belum Dikerjakan', '', '', '', 145),
(53, 37, 9, 223, 'Membuat penunjuk arah', '2019-06-26', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(54, 37, 9, 223, 'Membuat list anggaran dana', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(55, 37, 9, 223, 'Membuat list perlengkapan', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(56, 37, 9, 224, 'Menentukan masakan', '2019-06-20', '2019-06-26', 'Belum Dikerjakan', '', '', '', 145),
(57, 37, 9, 224, 'Mensurvey dan memesan konsumsi', '2019-06-19', '2019-06-27', 'Belum Dikerjakan', '', '', '', 145),
(58, 37, 9, 224, 'Membuat list perlengkapan', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(59, 37, 9, 224, 'Membuat anggaran dana', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(60, 37, 9, 226, 'Mensurve lokasi', '2019-06-19', '2019-06-24', 'Belum Dikerjakan', '', '', '', 145),
(61, 37, 9, 226, 'Mengurus birokrasi proposal', '2019-06-26', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(62, 37, 9, 226, 'Mengurus birokrasi persuratan', '2019-06-26', '2019-06-28', 'Belum Dikerjakan', '', '', '', 145),
(63, 37, 9, 226, 'Menyebar undangan dan persuratan', '2019-06-28', '2019-06-30', 'Belum Dikerjakan', '', '', '', 145),
(64, 37, 9, 226, 'Membuat anggaran dana', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(65, 37, 9, 226, 'Membuat list perlengkapan', '2019-06-20', '2019-06-22', 'Belum Dikerjakan', '', '', '', 145),
(66, 37, 12, 218, 'Membuat Jobdesk', '2019-06-16', '2019-06-17', 'Belum Dikerjakan', '', '', '', 152),
(69, 37, 9, 218, 'Coba', '2019-06-19', '2019-06-20', 'Sudah Dikerjakan', 'Menunggu validasi', '', '', 145),
(70, 37, 14, 218, 'Membuat Jobdesk', '2019-06-19', '2019-06-20', 'Sudah Dikerjakan', '', '', '', 146),
(71, 37, 14, 218, 'Menghubungi Pemateri', '2019-06-19', '2019-06-21', 'Progres', '', '', '', 146),
(73, 26, 15, 152, 'Membuat Jobdesk', '2019-06-19', '2019-06-20', 'Progres', '', '', '', 169),
(74, 38, 16, 227, 'Membuat Jobdesk', '2019-06-19', '2019-06-20', 'Progres', '', '', '', 174);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lpj`
--

CREATE TABLE `tb_lpj` (
  `id_lpj` int(5) NOT NULL,
  `id_proker` int(5) NOT NULL,
  `id_ukm` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status_file` varchar(50) NOT NULL,
  `revisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lpj`
--

INSERT INTO `tb_lpj` (`id_lpj`, `id_proker`, `id_ukm`, `id_periode`, `file`, `status_file`, `revisi`) VALUES
(9, 9, 37, 2, 'Document_LPJ1561895549.pdf', 'Tervalidasi', ''),
(10, 12, 37, 2, 'Document_LPJ1561932157.pdf', 'Menunggu validasi', '');

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
(218, 'website', 31, 9, 218, 'Membuat Jobdesk', 145, 'http://simonik.website/anggota/Proker/index_detail/31/9/218', '1', '2019-06-18 06:19:40'),
(219, 'website', 35, 9, 219, 'Membuat Undangan Pemateri', 144, 'http://simonik.website/anggota/Proker/index_detail/35/9/219', '0', '2019-06-18 06:27:26'),
(220, 'website', 49, 9, 222, 'Membuat anggaran dana yang dibutuhkan', 151, 'http://simonik.website/anggota/Proker/index_detail/49/9/222', '0', '2019-06-18 06:47:22'),
(221, 'website', 66, 12, 218, 'Membuat Jobdesk', 152, 'http://simonik.website/anggota/Proker/index_detail/66/12/218', '0', '2019-06-18 07:26:57'),
(223, 'website', 49, 9, 222, 'Membuat anggaran dana yang dibutuhkan', 151, 'http://simonik.website/anggota/Proker/index_detail/49/9/222', '0', '2019-06-19 00:05:06'),
(224, 'website', 32, 9, 218, 'Menghubungi Pemateri', 145, 'http://simonik.website/anggota/Proker/index_detail/32/9/218', '1', '2019-06-19 00:17:50'),
(225, 'website', 69, 9, 218, 'Coba', 145, 'http://simonik.website/anggota/Proker/index_detail/69/9/218', '0', '2019-06-19 00:47:48'),
(226, 'website', 32, 9, 218, 'Menghubungi Pemateri', 145, 'http://simonik.website/anggota/Proker/index_detail/32/9/218', '0', '2019-06-20 06:31:44'),
(227, 'website', 40, 9, 220, 'Membuat Anggaran Dana yang Dibutuhkan', 146, 'http://simonik.website/anggota/Proker/index_detail/40/9/220', '0', '2019-06-20 06:31:44'),
(228, 'website', 41, 9, 220, 'Membuat List Perlengkapan', 146, 'http://simonik.website/anggota/Proker/index_detail/41/9/220', '0', '2019-06-20 06:31:44'),
(229, 'website', 49, 9, 222, 'Membuat anggaran dana yang dibutuhkan', 151, 'http://simonik.website/anggota/Proker/index_detail/49/9/222', '0', '2019-06-20 06:31:44'),
(230, 'website', 69, 9, 218, 'Coba', 145, 'http://simonik.website/anggota/Proker/index_detail/69/9/218', '0', '2019-06-20 06:31:44'),
(231, 'website', 40, 9, 220, 'Membuat Anggaran Dana yang Dibutuhkan', 146, 'http://localhost/simonik/anggota/Proker/index_detail/40/9/220', '0', '2019-06-23 16:47:37'),
(232, 'website', 41, 9, 220, 'Membuat List Perlengkapan', 146, 'http://localhost/simonik/anggota/Proker/index_detail/41/9/220', '0', '2019-06-23 16:47:37'),
(233, 'website', 42, 9, 220, 'Membuat Juklak Juknis', 146, 'http://localhost/simonik/anggota/Proker/index_detail/42/9/220', '0', '2019-06-24 00:25:20'),
(234, 'website', 45, 9, 221, 'Mengkoordinir pengeluaran tiap sie (disertai nota)', 156, 'http://localhost/simonik/anggota/Proker/index_detail/45/9/221', '0', '2019-06-24 00:25:20'),
(235, 'website', 42, 9, 220, 'Membuat Juklak Juknis', 146, 'http://localhost/simonik/anggota/Proker/index_detail/42/9/220', '0', '2019-06-25 06:48:21'),
(236, 'website', 45, 9, 221, 'Mengkoordinir pengeluaran tiap sie (disertai nota)', 156, 'http://localhost/simonik/anggota/Proker/index_detail/45/9/221', '0', '2019-06-25 06:48:21'),
(237, 'website', 33, 9, 218, 'Mengontrol Anggota', 145, 'http://localhost/simonik/anggota/Proker/index_detail/33/9/218', '0', '2019-06-30 06:51:17'),
(238, 'website', 48, 9, 222, 'Meminta list perlengkapan tiap-tiap sie', 151, 'http://localhost/simonik/anggota/Proker/index_detail/48/9/222', '0', '2019-06-30 06:51:17');

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
(30, 9, 37, 2, 145, 218, 'Ketua Pelaksana'),
(32, 11, 37, 2, 147, 218, 'Ketua Pelaksana'),
(33, 9, 37, 2, 144, 219, 'Koordinator Sie'),
(34, 9, 37, 2, 146, 220, 'Koordinator Sie'),
(35, 9, 37, 2, 147, 220, 'Anggota Sie'),
(36, 9, 37, 2, 148, 220, 'Anggota Sie'),
(37, 9, 37, 2, 156, 221, 'Koordinator Sie'),
(39, 9, 37, 2, 151, 222, 'Koordinator Sie'),
(40, 9, 37, 2, 150, 222, 'Anggota Sie'),
(41, 12, 37, 2, 152, 218, 'Ketua Pelaksana'),
(42, 13, 37, 2, 155, 218, 'Ketua Pelaksana'),
(43, 14, 37, 2, 146, 218, 'Ketua Pelaksana'),
(44, 15, 26, 2, 169, 152, 'Ketua Pelaksana'),
(45, 16, 38, 2, 174, 227, 'Ketua Pelaksana');

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
(2, '2019/2020'),
(6, '2018/2019');

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
(9, 37, 9, 2, 0),
(11, 37, 11, 2, 0),
(12, 37, 12, 2, 60),
(13, 37, 13, 2, 0),
(14, 37, 14, 2, 60),
(15, 26, 15, 2, 0),
(16, 38, 16, 2, 0);

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
(65, 'Ketua Pelaksana', 12),
(66, 'Sekretaris Pelaksana', 12),
(67, 'Sie Acara', 12),
(68, 'Ketua Pelaksana', 12),
(69, 'Sekretaris Pelaksana', 12),
(70, 'Sie Acara', 12),
(71, 'Ketua Pelaksana', 13),
(72, 'Sekretaris Pelaksana', 13),
(73, 'Sie Acara', 13),
(74, 'Ketua Pelaksana', 13),
(75, 'Sekretaris Pelaksana', 13),
(76, 'Sie Acara', 13),
(77, 'Ketua Pelaksana', 14),
(78, 'Sekretaris Pelaksana', 14),
(79, 'Sie Acara', 14),
(80, 'Ketua Pelaksana', 14),
(81, 'Sekretaris Pelaksana', 14),
(82, 'Sie Acara', 14),
(83, 'Ketua Pelaksana', 15),
(84, 'Sekretaris Pelaksana', 15),
(85, 'Sie Acara', 15),
(86, 'Ketua Pelaksana', 15),
(87, 'Sekretaris Pelaksana', 15),
(88, 'Sie Acara', 15),
(89, 'Ketua Pelaksana', 16),
(90, 'Sekretaris Pelaksana', 16),
(91, 'Sie Acara', 16),
(92, 'Ketua Pelaksana', 16),
(93, 'Sekretaris Pelaksana', 16),
(94, 'Sie Acara', 16),
(95, 'Ketua Pelaksana', 17),
(96, 'Sekretaris Pelaksana', 17),
(97, 'Sie Acara', 17),
(98, 'Ketua Pelaksana', 17),
(99, 'Sekretaris Pelaksana', 17),
(100, 'Sie Acara', 17),
(101, 'Ketua Pelaksana', 18),
(102, 'Sekretaris Pelaksana', 18),
(103, 'Sie Acara', 18),
(104, 'Ketua Pelaksana', 18),
(105, 'Sekretaris Pelaksana', 18),
(106, 'Sie Acara', 18),
(107, 'Ketua Pelaksana', 19),
(108, 'Sekretaris Pelaksana', 19),
(109, 'Sie Acara', 19),
(110, 'Ketua Pelaksana', 19),
(111, 'Sekretaris Pelaksana', 19),
(112, 'Sie Acara', 19),
(113, 'Ketua Pelaksana', 20),
(114, 'Sekretaris Pelaksana', 20),
(115, 'Sie Acara', 20),
(116, 'Ketua Pelaksana', 20),
(117, 'Sekretaris Pelaksana', 20),
(118, 'Sie Acara', 20),
(119, 'Ketua Pelaksana', 21),
(120, 'Sekretaris Pelaksana', 21),
(121, 'Sie Acara', 21),
(122, 'Ketua Pelaksana', 21),
(123, 'Sekretaris Pelaksana', 21),
(124, 'Sie Acara', 21),
(125, 'Ketua Pelaksana', 22),
(126, 'Sekretaris Pelaksana', 22),
(127, 'Sie Acara', 22),
(128, 'Ketua Pelaksana', 22),
(129, 'Sekretaris Pelaksana', 22),
(130, 'Sie Acara', 22),
(131, 'Ketua Pelaksana', 23),
(132, 'Sekretaris Pelaksana', 23),
(133, 'Sie Acara', 23),
(134, 'Ketua Pelaksana', 23),
(135, 'Sekretaris Pelaksana', 23),
(136, 'Sie Acara', 23),
(137, 'Ketua Pelaksana', 24),
(138, 'Sekretaris Pelaksana', 24),
(139, 'Sie Acara', 24),
(140, 'Ketua Pelaksana', 24),
(141, 'Sekretaris Pelaksana', 24),
(142, 'Sie Acara', 24),
(143, 'Ketua Pelaksana', 25),
(144, 'Sekretaris Pelaksana', 25),
(145, 'Sie Acara', 25),
(146, 'Ketua Pelaksana', 25),
(147, 'Sekretaris Pelaksana', 25),
(148, 'Sie Acara', 25),
(149, 'Ketua Pelaksana', 26),
(150, 'Sekretaris Pelaksana', 26),
(151, 'Sie Acara', 26),
(152, 'Ketua Pelaksana', 26),
(153, 'Sekretaris Pelaksana', 26),
(154, 'Sie Acara', 26),
(155, 'Ketua Pelaksana', 27),
(156, 'Sekretaris Pelaksana', 27),
(157, 'Sie Acara', 27),
(158, 'Ketua Pelaksana', 27),
(159, 'Sekretaris Pelaksana', 27),
(160, 'Sie Acara', 27),
(161, 'Ketua Pelaksana', 28),
(162, 'Sekretaris Pelaksana', 28),
(163, 'Sie Acara', 28),
(164, 'Ketua Pelaksana', 28),
(165, 'Sekretaris Pelaksana', 28),
(166, 'Sie Acara', 28),
(173, 'Ketua Pelaksana', 30),
(174, 'Sekretaris Pelaksana', 30),
(175, 'Sie Acara', 30),
(176, 'Ketua Pelaksana', 30),
(177, 'Sekretaris Pelaksana', 30),
(178, 'Sie Acara', 30),
(179, 'Ketua Pelaksana', 31),
(180, 'Sekretaris Pelaksana', 31),
(181, 'Sie Acara', 31),
(182, 'Ketua Pelaksana', 31),
(183, 'Sekretaris Pelaksana', 31),
(184, 'Sie Acara', 31),
(185, 'Ketua Pelaksana', 32),
(186, 'Sekretaris Pelaksana', 32),
(187, 'Sie Acara', 32),
(188, 'Ketua Pelaksana', 32),
(189, 'Sekretaris Pelaksana', 32),
(190, 'Sie Acara', 32),
(218, 'Ketua Pelaksana', 37),
(219, 'Sekretaris Pelaksana', 37),
(220, 'Sie Acara', 37),
(221, 'Bendahara', 37),
(222, 'Sie Perlengkapan', 37),
(223, 'Sie Pubdekdok', 37),
(224, 'Sie Konsumsi', 37),
(225, 'Sie Galang Dana', 37),
(226, 'Sie Humas', 37),
(227, 'Ketua Pelaksana', 38),
(228, 'Sekretaris Pelaksana', 38),
(229, 'Sie Acara', 38);

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
(12, 'KOMPEN'),
(13, 'DPM'),
(14, 'HME'),
(15, 'HMM'),
(16, 'HMS'),
(17, 'HMTK'),
(18, 'HMA'),
(19, 'HIMANIA'),
(20, 'HMTI'),
(21, 'OPA GG'),
(22, 'PLFM'),
(23, 'USMA'),
(24, 'THEATERISTIK'),
(25, 'MENWA'),
(26, 'OR'),
(27, 'PP'),
(28, 'BKM'),
(30, 'KMK'),
(31, 'TALITAKUM'),
(32, 'PASTI'),
(37, 'RISPOL'),
(38, 'Pecinta Alam Polinema');

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
(107, 'Alesandro Eka Pradana', '1731410123', '1731410123', '1731410123', '083111904469', 'alesandro@gmail.com', 2, 2, 37, 'Foto_37_17314101231560846909.png'),
(108, 'Yosi Fernanda Martino', '1731120127', '1731120127', '1731120127', '85707123423', 'yosi@gmail.com', 2, 2, 37, ''),
(110, 'Ikfiana Wafirotul Aula', '1731120136', '1731120136', '1731120136', '85707123427', 'ikfi123@gmail.com', 3, 2, 37, ''),
(111, 'Hikmah Shofiyah', '1732610065', '1732610065', '1732610065', '85707123429', 'hkmshof@gmail.com', 3, 2, 37, ''),
(112, 'Aris Saputra', '1731410093', '1731410093', '1731410093', '85707123431', 'arisspt@gmai.com', 3, 2, 37, ''),
(113, 'M Agung Cahya Diyanto', '1741170007', '1741170007', '1741170007', '85707123433', 'agungc@gmail.com', 3, 2, 37, ''),
(114, 'Riza Adzillah Anwar', '1732610189', '1732610189', '1732610189', '85707123435', 'riz6@gmail.com', 3, 2, 37, ''),
(115, 'Irvan Nuruddin', '1731710149', '', '', '85707123437', 'irvannur34@gmail.com', 4, 2, 37, ''),
(116, 'Muhammad Alfian Ajibroto', '1731210094', '', '', '85707123439', 'ajialfian765@gmail.com', 4, 2, 37, ''),
(117, 'Mohammad Fajar Zabran', '1731120077', '', '', '85707123441', 'fajarmuhammadzabr422@gmail.com', 4, 2, 37, ''),
(118, 'Ifan Nida Nusha Nalaway', '1731410100', '1731410100', '1731410100', '85707123443', 'nush9@gmail.com', 3, 2, 37, ''),
(119, 'Siti Iffah Munawaroh', '1731410148', '1731410148', '1731410148', '85707123445', 'siti0@gmail.com', 3, 2, 37, ''),
(120, 'M. Khanif Zulfikar', '1731410099', '', '', '85707123447', 'khanif@gmail.com', 4, 2, 37, ''),
(121, 'Farita Nurullita', '1731410006', '', '', '85707123449', 'far@gmail.com', 4, 2, 37, ''),
(122, 'M. Imron Hamzah', '1731210189', '', '', '85707123451', 'imron@gmail.com', 4, 2, 37, ''),
(123, 'Ita Handayani', '1741420076', '', '', '85707123453', 'ita@gmail.com', 4, 2, 37, ''),
(124, 'Rizki Pragastia Yonanda', '1741223007', '1741223007', '1741223007', '85707123455', 'pragas@gmail.com', 3, 2, 37, ''),
(125, 'Mia Narulita', '1741420013', '1741420013', '1741420013', '85707123457', 'mia@gmail.com', 3, 2, 37, ''),
(126, 'Nurrahmad Al Farizi', '1741420017', '', '', '85707123324', 'ahmdn7@gmail.com', 4, 2, 37, ''),
(127, 'Mustava Haidar', '1731310086', '', '', '85707123325', 'mustav3@gmail.com', 4, 2, 37, ''),
(128, 'Faiz Al Ghifari', '1741230063', '', '', '85707123326', 'alghifarifa23465@gmail.com', 4, 2, 37, ''),
(129, 'Ayyuba', '1732510062', '', '', '85707123327', 'ayyu0909@gmail.com', 4, 2, 37, ''),
(130, 'M. Wahyu Ainul Fauzi', '1741150117', '1741150117', '1741150117', '85707123328', 'wahyu@gmail.com', 3, 2, 37, ''),
(131, 'Yunita Maulidia P', '1731130001', '1731130001', '1731130001', '85707123329', 'yun@gmail.com', 3, 2, 37, ''),
(132, 'Ahmad Zufar Azmy A F', '1741230073', '', '', '85707123330', 'azmyzuzu7543@gmail.com', 4, 2, 37, ''),
(133, 'Robiatul Hidayah', '1731410017', '', '', '85707123331', 'robiayah762@gmail.com', 4, 2, 37, ''),
(134, 'Dahman Helmi Wahyudi', '1731210022', '', '', '85707123332', 'dahmanyudi91@gmail.com', 4, 2, 37, ''),
(135, 'Abdullah Faiq Munir', '1741150126', '1741150126', '1741150126', '85707123333', 'faiq@gmail.com', 3, 2, 37, ''),
(136, 'Yuni Wulandari', '1731410049', '1731410049', '1731410049', '85707123334', 'yuyun@gmail.com', 3, 2, 37, ''),
(137, 'Ahmad Syaifuddin', '1731210208', '', '', '85707123335', 'ufinsyaif445@gmail.com', 4, 2, 37, ''),
(138, 'Sheyba Adinda A', '1641720170', '', '', '85707123336', 'sheyba@gmail.com', 4, 2, 37, ''),
(139, 'Muhammad Holili', '1731120098', '', '', '85707123337', 'holili@gmail.com', 4, 2, 37, ''),
(140, 'Fajrin Hanik', '1732510038', '', '', '85707123338', 'fajrin@gmail.com', 4, 2, 37, ''),
(141, 'Nunung Iswati', '1731410066', '1731410066', '1731410066', '85707123339', 'nung@gmail.com', 3, 2, 37, ''),
(142, 'Miftakhul jannah', '1731410146', '1731410146', '1731410146', '85707123512', 'mikf@gmail.com', 3, 2, 37, ''),
(143, 'Veronica Hasti', '1742520158', '', '', '85707123514', 'vero@gmail.com', 4, 2, 37, ''),
(144, 'Nurul Lailatul Kodriyah', '1732810021', '1732810021', '1732810021', '85707123516', 'nurl@gmail.com', 5, 2, 37, ''),
(145, 'Ahmad Faiz Shofiyullah', '1831130116', '1831130116', '1831130116', '85707123518', 'abdulhhabibie44@gmail.com', 5, 2, 37, ''),
(146, 'M. Arif Mustofa', '1841230037', '1841230037', '1841230037', '85707123520', 'arifmust231@gmail.com', 5, 2, 37, ''),
(147, 'Zain Muttaqi', '1831110107', '1831110107', '1831110107', '85707123522', 'abdulhhabibie44@gmail.com', 5, 2, 37, ''),
(148, 'Ilham Febrian Arwansah', '1831710087', '1831710087', '1831710087', '85707123524', 'omongkosong153@gmail.com', 5, 2, 37, ''),
(149, 'Yudhan Rizky R', '1831120019', '1831120019', '1831120019', '85707123526', 'yudhrr@gmail.com', 5, 2, 37, ''),
(150, 'Andre Tri Setyawan', '1831210042', '1831210042', '1831210042', '85707123528', 'andr@gmail.com', 5, 2, 37, ''),
(151, 'Yusril Abdurrahman', '1841320106', '1841320106', '1841320106', '85707123530', 'ysrlabdr1531@gmail.com', 5, 2, 37, ''),
(152, 'M. Irsyak Rizqi', '1841720054', '1841720054', '1841720054', '85707123532', 'mirysakri@gmail.com', 5, 2, 37, ''),
(153, 'M. Nur Faizin', '1841720062', '1841720062', '1841720062', '85707123534', 'mhmdffaiz@gmail.com', 5, 2, 37, ''),
(154, 'Faqih Aulia', '1831210134', '1831210134', '1831210134', '85707123536', 'fqhau@gmail.com', 5, 2, 37, ''),
(155, 'Ahmad Helmi Yahya', '1831710042', '1831710042', '1831710042', '85707123538', 'ahmdhel990@gmail.com', 5, 2, 37, ''),
(156, 'Feriskiana Tesafadila', '1831410132', '1831410132', '1831410132', '85707123540', 'feriskiana@gmail.com', 5, 2, 37, ''),
(162, 'MIKO', '780', '780', '780', '87676', 'emi@gmail.com', 5, 2, 37, 'Foto_1621560851879.png'),
(164, 'Moch Choirul Na\'im', '1631410098', '1631410098', '1631410098', '08764532123', 'naim67@gmail.com', 1, 6, 1, ''),
(165, 'Alpino Desta', '1731546321', '1731546321', '1731546321', '08894321234', 'alpin@gmail.com', 5, 2, 37, ''),
(166, 'Alfeta Mendarani', '1731567432', '1731567432', '1731567432', '08842354632', 'alfe@gmail.com', 5, 2, 37, ''),
(167, 'Ahmad Hailala', '1731627863', '1731627863', '1731627863', '0889453621', 'hailala2@gmail.com', 2, 2, 26, ''),
(168, 'Rega Nur A', '18324352612', '18324352612', '18324352612', '088754567', 'tr@gmail.com', 3, 2, 26, ''),
(169, 'Niko', '183125637432', '183125637432', '183125637432', '08876543425', 'ni@gmail.com', 5, 2, 26, ''),
(170, 'Mako', '18315162735', '18315162735', '18315162735', '08834235235', 'hu@gmail.com', 5, 2, 26, ''),
(171, 'Rahmad Zakaria', '1831516161', '1831516161', '1831516161', '0885646737', 'ni@gmail.com', 5, 2, 26, ''),
(172, 'Nirwan Alam', '1631710952', '1631710952', '1631710952', '08874352562', 'nirwan@gmail.com', 2, 2, 38, ''),
(173, 'Abdul Choliq', '1731624352', '1731624352', '1731624352', '088546362778', 'cho4@gmail.com', 3, 2, 38, ''),
(174, 'Risma Dharma', '16316724358', '16316724358', '16316724358', '08843526211', 'risma@gmail.com', 5, 2, 38, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_lapor`
--
ALTER TABLE `kategori_lapor`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `tb_lpj`
--
ALTER TABLE `tb_lpj`
  ADD PRIMARY KEY (`id_lpj`);

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
-- AUTO_INCREMENT for table `kategori_lapor`
--
ALTER TABLE `kategori_lapor`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_daftar_proker`
--
ALTER TABLE `tb_daftar_proker`
  MODIFY `id_proker` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_file_backup`
--
ALTER TABLE `tb_file_backup`
  MODIFY `id_file` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  MODIFY `id_jobdesk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tb_lpj`
--
ALTER TABLE `tb_lpj`
  MODIFY `id_lpj` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `tb_panitia_proker`
--
ALTER TABLE `tb_panitia_proker`
  MODIFY `id_panitia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_sie`
--
ALTER TABLE `tb_sie`
  MODIFY `id_sie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `tb_type_user`
--
ALTER TABLE `tb_type_user`
  MODIFY `id_type_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ukm`
--
ALTER TABLE `tb_ukm`
  MODIFY `id_ukm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

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
