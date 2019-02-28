-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2019 pada 04.20
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
-- Struktur dari tabel `tb_bidang`
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
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `id_ukm`, `id_periode`, `nama_bidang`, `ketua_bidang`, `sekretaris_bidang`) VALUES
(1, 31, 11, 'Ketakmiran', 18, 17),
(2, 31, 11, 'Syi\'ar', 14, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_proker`
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
-- Dumping data untuk tabel `tb_daftar_proker`
--

INSERT INTO `tb_daftar_proker` (`id_proker`, `nama_proker`, `ketua_proker`, `tanggal_proker`, `tempat_proker`, `id_ukm`, `id_bidang`) VALUES
(1, 'Safari Dakwah', 17, '2019-06-20', 'Desa Purwoerjo', 31, 1),
(6, 'Polinema Bersholawat', 24, '2019-02-23', 'Belum ada', 31, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_evaluasi`
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
-- Struktur dari tabel `tb_file_backup`
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
-- Struktur dari tabel `tb_jobdesk`
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
-- Dumping data untuk tabel `tb_jobdesk`
--

INSERT INTO `tb_jobdesk` (`id_jobdesk`, `id_ukm`, `id_proker`, `id_sie`, `nama_jobdesk`, `startline`, `deadline`, `status_jobdesk`, `file_laporan`, `id_user`) VALUES
(1, 31, 1, 1, 'Membuat Timeline dan Scheadule', '2019-02-01', '2019-02-02', 'Belum Dikerjakan', 'jobdesk.pdf', 17),
(6, 31, 1, 2, 'Membuat Surat', '2019-02-21', '2019-02-22', 'Belum Dikerjakan', '', 17),
(7, 31, 1, 2, 'Membuat surat', '2019-02-14', '2019-02-15', 'Belum Dikerjakan', '', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_panitia_proker`
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
-- Dumping data untuk tabel `tb_panitia_proker`
--

INSERT INTO `tb_panitia_proker` (`id_panitia`, `id_proker`, `id_ukm`, `id_periode`, `id_user`, `id_sie`, `jenis_panitia`) VALUES
(9, 1, 31, 11, 17, 1, ''),
(10, 1, 31, 11, 24, 3, 'Anggota Sie'),
(12, 6, 31, 11, 24, 1, ''),
(13, 6, 31, 11, 17, 3, 'Koordinator Sie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode`
--

CREATE TABLE `tb_periode` (
  `id_periode` int(5) NOT NULL,
  `th_periode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `th_periode`) VALUES
(9, '2017/2018'),
(10, '2018/2019'),
(11, '2019/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sie`
--

CREATE TABLE `tb_sie` (
  `id_sie` int(5) NOT NULL,
  `nama_sie` varchar(40) NOT NULL,
  `id_ukm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sie`
--

INSERT INTO `tb_sie` (`id_sie`, `nama_sie`, `id_ukm`) VALUES
(1, 'Ketua Pelaksana', 31),
(2, 'Sekretaris Pelaksana', 31),
(3, 'Sie Acara', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_type_user`
--

CREATE TABLE `tb_type_user` (
  `id_type_user` int(5) NOT NULL,
  `nama_type_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_type_user`
--

INSERT INTO `tb_type_user` (`id_type_user`, `nama_type_user`) VALUES
(1, 'Super admin'),
(2, 'Admin'),
(6, 'Badan Pengurus Harian'),
(7, 'Divisi'),
(8, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ukm`
--

CREATE TABLE `tb_ukm` (
  `id_ukm` int(5) NOT NULL,
  `nama_ukm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ukm`
--

INSERT INTO `tb_ukm` (`id_ukm`, `nama_ukm`) VALUES
(3, 'BEM'),
(30, 'DPM'),
(31, 'RISPOL'),
(32, 'USMA'),
(33, 'KOMPEN'),
(34, 'BKM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `nim`, `username`, `password`, `no_telp_user`, `email_user`, `id_type_user`, `id_periode`, `id_ukm`, `foto_user`) VALUES
(12, 'Erlangga Panji Wibawa', '1731273382', '1731273382', 'super', '088976543234', 'erlangga7@gmail.com', 1, 11, 3, ''),
(13, 'Abdulloh Habibie', '1631710011', '1631710011', 'admin', '088376743239', 'habibie4@gmail.com', 2, 11, 31, ''),
(14, 'Gatot Kaca Pecah', '1631710923', '1631710923', 'bph', '088176543232', 'gatotkaca@gmail.com', 6, 11, 31, ''),
(17, 'Alessandro Eka', '1731565563', '1731565563', 'anggota', '088965432124', 'ales@gmail.com', 8, 11, 31, ''),
(18, 'Aji Broto Pakuningrat', '1531762212', '', '', '08865342122', 'ajibroto@gmail.com', 7, 11, 31, ''),
(19, 'Yosi Fernando', '1763243111', '1763243111', '1763243111', '08876543421', 'yosi@gmail.com', 8, 11, 31, ''),
(20, 'Riatno', '18212121214', '18212121214', '18212121212', '08823232323', 'das@gmail.com', 2, 11, 30, ''),
(23, 'Yusuf', '163198921', '163198921', '163198921', '02891281982', 'asasajks@gmail.com', 2, 11, 34, ''),
(24, 'Waluyo Ferbrianto', '1732142251', '1732142251', '1732142251', '08897262535', 'waluyo@gmail.com', 2, 11, 31, 'IMG201811141544321.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `tb_daftar_proker`
--
ALTER TABLE `tb_daftar_proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indeks untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indeks untuk tabel `tb_file_backup`
--
ALTER TABLE `tb_file_backup`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  ADD PRIMARY KEY (`id_jobdesk`);

--
-- Indeks untuk tabel `tb_panitia_proker`
--
ALTER TABLE `tb_panitia_proker`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indeks untuk tabel `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `tb_sie`
--
ALTER TABLE `tb_sie`
  ADD PRIMARY KEY (`id_sie`);

--
-- Indeks untuk tabel `tb_type_user`
--
ALTER TABLE `tb_type_user`
  ADD PRIMARY KEY (`id_type_user`);

--
-- Indeks untuk tabel `tb_ukm`
--
ALTER TABLE `tb_ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_daftar_proker`
--
ALTER TABLE `tb_daftar_proker`
  MODIFY `id_proker` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_file_backup`
--
ALTER TABLE `tb_file_backup`
  MODIFY `id_file` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  MODIFY `id_jobdesk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_panitia_proker`
--
ALTER TABLE `tb_panitia_proker`
  MODIFY `id_panitia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_sie`
--
ALTER TABLE `tb_sie`
  MODIFY `id_sie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_type_user`
--
ALTER TABLE `tb_type_user`
  MODIFY `id_type_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_ukm`
--
ALTER TABLE `tb_ukm`
  MODIFY `id_ukm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
