-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2023 pada 17.50
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_puskesmas`
--
CREATE DATABASE IF NOT EXISTS `db_aplikasi_puskesmas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_aplikasi_puskesmas`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_auth`
--

DROP TABLE IF EXISTS `tb_auth`;
CREATE TABLE `tb_auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_auth`
--

INSERT INTO `tb_auth` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'RESTAPI', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

DROP TABLE IF EXISTS `tb_pasien`;
CREATE TABLE `tb_pasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `status_perkawinan` enum('Belum Menikah','Menikah') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rm` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id`, `nik`, `nama`, `kelamin`, `telepon`, `ttl`, `status_perkawinan`, `alamat`, `rm`) VALUES
(1, '1234567890123456', 'Silpea', 'Laki-Laki', '081234567890', 'Abung,10 Oktober 2021', 'Menikah', 'Abung raya', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
