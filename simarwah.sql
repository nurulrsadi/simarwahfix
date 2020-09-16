-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2020 pada 02.33
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simarwah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nm_anggota` varchar(255) NOT NULL,
  `kode_bidang` varchar(255) NOT NULL,
  `kode_himpunan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nm_bidang` varchar(255) NOT NULL,
  `ketua_bidang` varchar(255) NOT NULL,
  `kode_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nm_bidang`, `ketua_bidang`, `kode_bidang`) VALUES
(14, 'PAO', 'Rifky', 'PAO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `himpunan`
--

CREATE TABLE `himpunan` (
  `id_himp` int(11) NOT NULL,
  `nm_himp` varchar(255) NOT NULL,
  `tentang_himp` varchar(255) NOT NULL,
  `visi_himp` varchar(255) NOT NULL,
  `misi_himp` varchar(255) NOT NULL,
  `ketua_himp` varchar(255) NOT NULL,
  `wakil_himp` varchar(255) NOT NULL,
  `sekretaris_himp` varchar(255) NOT NULL,
  `bendahara_himp` varchar(255) NOT NULL,
  `kode_himp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `himpunan`
--

INSERT INTO `himpunan` (`id_himp`, `nm_himp`, `tentang_himp`, `visi_himp`, `misi_himp`, `ketua_himp`, `wakil_himp`, `sekretaris_himp`, `bendahara_himp`, `kode_himp`) VALUES
(83, 'Himatif', 'IF Pisan', 'Ngoding', 'Rebahan', 'Irfan', 'Cecep', 'Yana', 'Agung', 'HIMATIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `role`) VALUES
(1, 'nuy', 'nuy@gmail.com', 'admin1', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'molly', 'molly@gmail.com', 'molly', 'ed6658e6f22583ed66fb5e5e735b9e63', 0),
(3, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `himpunan`
--
ALTER TABLE `himpunan`
  ADD PRIMARY KEY (`id_himp`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `himpunan`
--
ALTER TABLE `himpunan`
  MODIFY `id_himp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
