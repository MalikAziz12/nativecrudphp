-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2024 pada 21.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gugun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gugunn`
--

CREATE TABLE `gugunn` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_tgl` varchar(100) NOT NULL,
  `jenis_kl` varchar(20) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gugunn`
--

INSERT INTO `gugunn` (`id`, `nim`, `nama`, `tempat_tgl`, `jenis_kl`, `agama`, `alamat`, `jurusan`, `foto`) VALUES
(9, 312210130, 'malik', 'pekalongan 10 maret 2003', 'Another Gender', 'Konghucu', 'pekalonganaaa', 'Pendidikan mancing', 'patrik.jpeg'),
(13, 312210190, 'Adam', 'Bekasi 10 januari 2000', 'Burhan', 'Konghucu', 'cibuntu', 'Pendidikan mancing', '668d4890cc118.jpeg'),
(15, 312210180, 'Malik', 'Pekalongan 20 januari 2000', 'Burhan', 'Konghucu', 'cibantu', 'Farmasi', '668d496f0b132.jpg'),
(17, 312210170, 'Ageng', 'tEgal', 'Lanang', 'Konghucu', 'karawang', 'Pendidikan mancing', '668d4d0ed8ba5.jpeg'),
(18, 2147483647, 'ara', 'semarang 10 jan 2032', 'Lanang', 'Konghucu', 'smg', 'Pendidikan mancing', '668d71319b150.jpg'),
(19, 312210140, 'Hilal', 'Pemalang 18 des 2012', 'Lanang', 'Katalog', 'pemalang', 'Pendidikan mancing', '668d7d32178da.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gugunn`
--
ALTER TABLE `gugunn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gugunn`
--
ALTER TABLE `gugunn`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
