-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 09.54
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajaroop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama_peminjam` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `kepentingan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `alamat`, `kepentingan`) VALUES
(1, 'Sofyani', 'Kalipuro', 'Festival di Kecamatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prototipe`
--

CREATE TABLE `prototipe` (
  `id_prototipe` int(5) NOT NULL,
  `id_tema` int(5) NOT NULL,
  `nama_prototipe` varchar(20) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `pembuat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prototipe`
--

INSERT INTO `prototipe` (`id_prototipe`, `id_tema`, `nama_prototipe`, `jumlah`, `tanggal_masuk`, `pembuat`) VALUES
(1, 1, 'Alas Purwo', 2, '2023-06-20', 'Agus'),
(2, 1, 'Parang Ireng', 1, '2023-04-01', 'Suprianto'),
(3, 1, 'Ijen', 2, '2023-05-06', 'Supurianto'),
(4, 1, 'Sukamade', 2, '2023-04-30', 'Rama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id_tema` varchar(20) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah_prototipe` int(3) NOT NULL,
  `penyusun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id_tema`, `nama`, `tahun`, `jumlah_prototipe`, `penyusun`) VALUES
('1', 'The Magic Of Agen Geopark ', 2023, 4, 'panitia'),
('2', 'The Diversity Of Banyuwangi Culture ', 2022, 2, 'panitia'),
('3', 'The Kingdom Of  Blambangan ', 2019, 2, 'Panitia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `prototipe`
--
ALTER TABLE `prototipe`
  ADD PRIMARY KEY (`id_prototipe`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prototipe`
--
ALTER TABLE `prototipe`
  MODIFY `id_prototipe` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
