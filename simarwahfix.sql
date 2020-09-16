-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2020 pada 21.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simarwahfix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_himpunan`
--

CREATE TABLE `anggota_himpunan` (
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `parent_himpunan` varchar(255) NOT NULL,
  `parent_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota_himpunan`
--

INSERT INTO `anggota_himpunan` (`nim`, `nama`, `alamat`, `jenis_kelamin`, `kontak`, `email`, `jabatan`, `parent_himpunan`, `parent_bidang`) VALUES
('1155090000', 'Muhammad Luthfi Aziz', '', 'L', '', '', 'KETUA', 'HIMATIF', 'PAOHIMATIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` varchar(255) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `parent_univ` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `nama_fakultas`, `deskripsi`, `visi`, `misi`, `parent_univ`) VALUES
('contohfakultas', 'contoh fakultas', 'di uin', 'keren', 'gabut', NULL),
('SAINTEK', 'Sains dan TEKNOLOGI', 'Deskripsi Saintek', 'Visi Saintek', 'Misi Saintek', NULL),
('SYARKUM', 'Syariah dan Hukum', '', '', '', NULL),
('Tarbiyah', 'Tarbiyah dan Keguruan', 'Mulai ada sejak awal IAIN dibentuk', 'visinya ini', 'misinya ini', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_himpunan` varchar(255) NOT NULL,
  `nama_himpunan` varchar(255) NOT NULL,
  `desc_himpunan` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `jml_mhsaktif` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `parent_fakultas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_himpunan`, `nama_himpunan`, `desc_himpunan`, `visi`, `misi`, `jml_mhsaktif`, `image`, `parent_fakultas`) VALUES
('Contoh', 'Contoh', 'OK', 'visi fakultas', 'misi fakultas', '0', 'ff9c68a152720d52989b985eaed44616.jpeg', 'SAINTEK'),
('DEMAFSAINTEK', 'DEMAF', 'Dewan Mahasiswa Fakultas Saintek', '', '', '0', '0435035e9a852837df6ae8f2097cf33d.png', 'SAINTEK'),
('DEMAU', 'DEMAU', 'Dewan Mahasiswa Universitas', '', '', '0', 'a213b91829a3ee60d95e2b53f76003e2.jpg', NULL),
('HIMASAKI', 'HIMASAKI', 'Himpunan Mahasiswa Kimia', 'Pinter Ngoding Pisan', '', '0', 'eddd22847be566f592b58be2c2350c7e.png', 'SAINTEK'),
('HIMATIF', 'HIMATIF', 'Himpunan Mahasiswa Teknik Informatika', 'Visi Himatif Update ', 'Misi Himatif Update ', '0', '9b5d664b92465eb5265038ba65331334.PNG', 'SAINTEK'),
('ILHUM', 'ILHUM', 'Ilmu Hukum', '', '', '0', '49192782891da543567e070a77e9ca62.jpg', 'SYARKUM'),
('PAI', 'Pendidikan Agama Islam', '', '', '', '', '920fefe1c9eb746c76bba2a6ad95b95e.jpg', 'Tarbiyah'),
('SEMAU', 'SEMAU', 'Senat Mahasiswa Universitas', 'xxxx', 'Test', '0', '5580f7bbef60dc1f86cd0e3ab7a9e372.PNG', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_bidang`
--

CREATE TABLE `nama_bidang` (
  `kode_bidang` varchar(255) NOT NULL,
  `label_bidang` varchar(255) NOT NULL,
  `desc_bidang` varchar(255) NOT NULL,
  `parent_himpunan` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_bidang`
--

INSERT INTO `nama_bidang` (`kode_bidang`, `label_bidang`, `desc_bidang`, `parent_himpunan`, `image`) VALUES
('BIROHIMATIF', 'Biro', 'Birokrasi', 'HIMATIF', 'b963e16d2434783741ae269e235b8b9f.png'),
('PAOHIMATIF', 'PAO', 'Pengembangan Aparatur Organisasi', 'HIMATIF', 'bac47357f2c3ce876d4490323dada2c7.jpeg'),
('PAOILHUM', 'PAO', '', 'ILHUM', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dana`
--

CREATE TABLE `tb_dana` (
  `id_pengajuan` int(11) NOT NULL,
  `kode_himpunan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `namaKegiatan` text CHARACTER SET latin1 NOT NULL,
  `nPengajuan` int(4) NOT NULL,
  `suratpengajuan_file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rinciankegiatan_file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rkakl_file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tor_file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `insert_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailuser`
--

CREATE TABLE `tb_detailuser` (
  `id_dana` int(11) NOT NULL,
  `kd_jrsn` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kd_fklts` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nPengajuan` int(4) NOT NULL,
  `tahunakademik` year(4) NOT NULL,
  `danaawal` bigint(20) NOT NULL,
  `danasisa` bigint(20) NOT NULL,
  `namaKegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `suratpengajuan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rinciankegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rkakl` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `statususer` int(4) NOT NULL,
  `laporankegiatan` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detailuser`
--

INSERT INTO `tb_detailuser` (`id_dana`, `kd_jrsn`, `kd_fklts`, `nPengajuan`, `tahunakademik`, `danaawal`, `danasisa`, `namaKegiatan`, `suratpengajuan`, `rinciankegiatan`, `rkakl`, `tor`, `statususer`, `laporankegiatan`) VALUES
(6, 'PAI', 'Tarbiyah', 1, 2021, 15000000, 15000000, '', '', '', '', '', 0, ''),
(7, 'Contoh', 'SAINTEK', 0, 0000, 0, 0, '', '', '', '', '', 0, ''),
(8, 'DEMAFSAINTEK', 'SAINTEK', 0, 0000, 0, 0, '', '', '', '', '', 0, ''),
(10, 'HIMASAKI', 'SAINTEK', 0, 0000, 0, 0, '', '', '', '', '', 0, ''),
(11, 'HIMATIF', 'SAINTEK', 0, 0000, 0, 0, '', '', '', '', '', 0, ''),
(13, 'ILHUM', 'SYARKUM', 0, 0000, 0, 0, '', '', '', '', '', 0, '');

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
  `role` int(11) NOT NULL,
  `kode_himp` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `statususer` int(4) NOT NULL,
  `update_date` datetime NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `role`, `kode_himp`, `is_active`, `statususer`, `update_date`, `insert_date`) VALUES
(10, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'HIMATIF', 1, 0, '2020-09-05 00:00:00', '2020-09-05 00:00:00'),
(12, 'Nisvy Syabana Nugraha', 'nisvy@gmail.com', 'nisvysyan', '1658175c5dfbe416e5dbbc7863ddcc90', 0, 'ILHUM', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'nisvy', 'nisvysyabana@gmail.com', 'nisvy', 'cabaa1823f3f04eed79c753a6f5f4845', 0, 'HIMATIF', 1, 0, '0000-00-00 00:00:00', '2020-09-08 10:23:10'),
(17, 'admin aljamiah', 'admin@gmail.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1, 'Contoh', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin2', 'email@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'pai', 'pai@gmail.com', 'paitarbiyah', '844302dc926f0af749081c6d64553489', 0, 'PAI', 1, 0, '0000-00-00 00:00:00', '2020-09-16 17:23:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_himpunan`
--
ALTER TABLE `anggota_himpunan`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `parent_himpunan` (`parent_himpunan`),
  ADD KEY `parent_bidang` (`parent_bidang`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_himpunan`),
  ADD KEY `parent_fakultas` (`parent_fakultas`);

--
-- Indeks untuk tabel `nama_bidang`
--
ALTER TABLE `nama_bidang`
  ADD PRIMARY KEY (`kode_bidang`),
  ADD KEY `parent_himpunan` (`parent_himpunan`);

--
-- Indeks untuk tabel `tb_dana`
--
ALTER TABLE `tb_dana`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `pengajuan_dana` (`kode_himpunan`);

--
-- Indeks untuk tabel `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  ADD PRIMARY KEY (`id_dana`),
  ADD KEY `kd_fklts` (`kd_fklts`),
  ADD KEY `kd_jrsn_1` (`kd_jrsn`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_himp` (`kode_himp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dana`
--
ALTER TABLE `tb_dana`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_himpunan`
--
ALTER TABLE `anggota_himpunan`
  ADD CONSTRAINT `anggota_himpunan_ibfk_3` FOREIGN KEY (`parent_himpunan`) REFERENCES `jurusan` (`kode_himpunan`),
  ADD CONSTRAINT `anggota_himpunan_ibfk_4` FOREIGN KEY (`parent_bidang`) REFERENCES `nama_bidang` (`kode_bidang`);

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`parent_fakultas`) REFERENCES `fakultas` (`kode_fakultas`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nama_bidang`
--
ALTER TABLE `nama_bidang`
  ADD CONSTRAINT `parent_himpunan` FOREIGN KEY (`parent_himpunan`) REFERENCES `jurusan` (`kode_himpunan`);

--
-- Ketidakleluasaan untuk tabel `tb_dana`
--
ALTER TABLE `tb_dana`
  ADD CONSTRAINT `pengajuan_dana` FOREIGN KEY (`kode_himpunan`) REFERENCES `jurusan` (`kode_himpunan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  ADD CONSTRAINT `kd_fklts` FOREIGN KEY (`kd_fklts`) REFERENCES `fakultas` (`kode_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_jrsn_1` FOREIGN KEY (`kd_jrsn`) REFERENCES `jurusan` (`kode_himpunan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
