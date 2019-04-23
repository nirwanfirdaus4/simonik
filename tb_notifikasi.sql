-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2019 pada 04.56
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
-- Struktur dari tabel `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id_notifikasi` bigint(20) NOT NULL,
  `konten_notifikasi` longtext NOT NULL,
  `penerima_notifikasi` int(5) NOT NULL,
  `tautan_notifikasi` text NOT NULL,
  `status_notifikasi` enum('0','1') NOT NULL DEFAULT '0',
  `tanggal_notifikasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`id_notifikasi`, `konten_notifikasi`, `penerima_notifikasi`, `tautan_notifikasi`, `status_notifikasi`, `tanggal_notifikasi`) VALUES
(8, 'Menghubungi Pemateri', 10, 'http://localhost/simonik/anggota/Proker/index_detail/6/1/1', '0', '2019-04-22 16:36:35'),
(9, 'Menentukan Panitia Teknis', 16, 'http://localhost/simonik/anggota/Proker/index_detail/7/2/4', '0', '2019-04-22 16:36:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `penerima_notifikasi` (`penerima_notifikasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD CONSTRAINT `tb_notifikasi_ibfk_1` FOREIGN KEY (`penerima_notifikasi`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
