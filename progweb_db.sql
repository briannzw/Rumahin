-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2021 pada 11.35
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progweb_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_jual`
--

CREATE TABLE `daftar_jual` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `nama_bangunan` varchar(100) NOT NULL,
  `tipe_bangunan` enum('apartemen','ruko','rumah','gedung') NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `harga_bangunan` bigint(20) NOT NULL,
  `gambar_bangunan` varchar(64) NOT NULL,
  `gambar2_bangunan` varchar(64) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(14) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_jual`
--

INSERT INTO `daftar_jual` (`id`, `user_id`, `nama_penjual`, `nama_bangunan`, `tipe_bangunan`, `luas_bangunan`, `harga_bangunan`, `gambar_bangunan`, `gambar2_bangunan`, `keterangan`, `email`, `no_telpon`, `date`) VALUES
(3, 9999999, 'Brian Wijaya', 'Bangunan 1', 'apartemen', 999, 999999999, '', '', '', 'brianwijaya2003@gmail.com', '08999999999', '2021-05-17'),
(4, 9999999, 'Brian Wijoyo', 'Bangunan 2', 'gedung', 1, 1000, '', '', '', 'brianwijaya2003@gmail.com', '082222222222', '2022-05-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(30, 2901834567, 'aa', 'aa', '2021-05-17 03:56:42'),
(31, 6749082351, 'ab', 'ab', '2021-05-17 03:56:51'),
(32, 2564390781, 'aaa', 'aaa', '2021-05-17 09:11:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_jual`
--
ALTER TABLE `daftar_jual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_jual`
--
ALTER TABLE `daftar_jual`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
