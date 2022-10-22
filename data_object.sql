-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2022 pada 10.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_object`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelbarang1`
--

CREATE TABLE `tabelbarang1` (
  `id` int(11) NOT NULL,
  `kode` char(6) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabelbarang1`
--

INSERT INTO `tabelbarang1` (`id`, `kode`, `nama`, `harga`, `jumlah`, `kondisi`) VALUES
(36, 'RZR005', 'LAPTOP RAZER ', 15000000, 7, 'Baru'),
(37, 'ALW006', 'LAPTOP ALIENWARE', 15000000, 3, 'Baru'),
(38, 'MSI007', 'LAPTOP MSI', 2700000, 1, 'Second'),
(39, 'HP0009', 'LAPTOP HP', 2000000, 5, 'Second'),
(41, 'AXO100', 'TAB AXIOO', 1000000, 3, 'Baru'),
(43, 'k', 'n', 1, 2, 'kon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_checkout` int(11) NOT NULL,
  `kondisi` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode`, `nama`, `harga`, `jumlah_checkout`, `kondisi`) VALUES
(35, 'LNL004', 'LENOVO LEGION', 15000000, 1, 'Baru'),
(36, 'RZR005', 'LAPTOP RAZER ', 15000000, 2, 'Baru'),
(37, 'ALW006', 'LAPTOP ALIENWARE', 15000000, 1, 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin123'),
(3, 'administrator', 'administrator123'),
(4, 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabelbarang1`
--
ALTER TABLE `tabelbarang1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabelbarang1`
--
ALTER TABLE `tabelbarang1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
