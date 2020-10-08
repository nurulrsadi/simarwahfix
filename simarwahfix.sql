-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2020 pada 12.25
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
('1127050100', 'dimas', '', 'L', '08982736531', 'dimasta@gmail.com', 'KETUA BIDANG', 'Kimia', 'PAO'),
('1157050083', 'Nm', '', 'L', '', '', 'KETUA', 'HIMANETRO', 'Sosroh'),
('1157050093', 'qw', '', 'P', '', '', 'SEKRETARIS', 'HIMANETRO', 'Sosroh'),
('11570501012', 'qw', '', 'L', '', '', 'KETUA', 'HIMANETRO', 'ADFOKOM'),
('1177050093', 'as', '', 'L', '', '', 'BENDAHARA', 'HIMATIF', 'EXOFFHIMATIF'),
('1177050100', 'jeruk', '', 'L', '', '', 'KETUA', 'HIMATIF', 'ADFOKOMHIMATIF'),
('1177050101', 'DF', '', 'P', '', '', 'KETUA', 'HIMATIF', 'EXOFFHIMATIF'),
('1177050102', 'asd', '', 'P', '', '', 'SEKRETARIS', 'HIMATIF', 'ADFOKOMHIMATIF'),
('11770501023', 'asd', 'bandung', 'L', '08982736531', 'jeruk@gmail.com', 'ANGGOTA', 'HIMATIF', 'ADFOKOMHIMATIF'),
('1197050100', 'QS', '', 'P', '', '', 'ANGGOTA', 'PGSD', 'ADFOKOM PGSD'),
('1197050101', 'HM', '', 'L', '', '', 'KETUA BIDANG', 'PGSD', 'ADFOKOM PGSD');

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
('SAINTEK', 'Sains dan Teknologi', 'Since 2010', 'sainteksatu', 'sainteksatu', NULL),
('Tarbiyah', 'Tarbiyah dan Keguruan', '', '', '', NULL),
('UKK', 'Unit Kegiatan Khusus', '', '', '', NULL),
('UKM', 'Unit Kegiatan Mahasiswa', 'bla bla bla', '', '', NULL),
('Ushuluddin', 'Ushuluddin', '', '', '', NULL);

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
('DEMAU', 'DEMAU', 'Dema Mahasiswa Universitas', '', '', '', '005ef1cbc869f611acf8cf13d160f959.jpg', NULL),
('HIMANETRO', 'Himpunan Mahasiswa Teknik Elektro', '', 'visi elektro', 'misi elektro', '', '114957ea22a8959998b0dcdab5608212.jpg', 'SAINTEK'),
('HIMASAKI', 'Himpunan Mahasiswa Fisika', '', '', '', '', '31ebb51f1c3f4feed5ab80087f636ff0.jpg', 'SAINTEK'),
('HIMATIF', 'Himpunan Mahasiswa Teknik Informatika', '', 'visi himatif', 'misi himatif', '', '867cc687efb6f0d4944ac50b9a46d329.jpg', 'SAINTEK'),
('Ilmu Hadist', 'Ilmu Hadist', '', '', '', '', '866340740b81f9c837ebff2a70ac539f.jpg', 'Ushuluddin'),
('Kimia', 'kimia', '', 'visi', 'misi', '', 'c36e150a184398f0f355918ee21ca678.jpg', 'SAINTEK'),
('KM-HB', 'Keluarga Mahasiswa Himpunan Biologi', '', '', '', '', '0eba58501f44fa87a7e4d9ba6912aaf6.jpg', 'SAINTEK'),
('Matematika', 'Matematika Murni', '', '', '', '', '7899c22d4ea5c6f98ede3db50ea3994f.png', 'SAINTEK'),
('PAI', 'pai', '', '', '', '', 'fe325e1ef0ddfb234806fff35df9b88b.jpg', 'Tarbiyah'),
('PenKimia', 'Pendidikan Kimia', '', '', '', '', 'f1d7e759c6e41bb21e85a147672ca045.png', 'Tarbiyah'),
('Perbandingan Agama', 'Perbandingan Agama', '', '', '', '', '76d4ba9b66e537273e63e67071498379.jpg', 'Ushuluddin'),
('PGSD', 'Perguruan SD', '', '', '', '', 'aace5ce95d05333b6de821b26612b15c.png', 'Tarbiyah'),
('PRAMUKA', 'PRAMUKA', '', '', '', '', '99c57da6d47e9ddb1bf8e65a667588c1.jpg', 'UKM'),
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
('ADFOKOM', 'ADFOKOM', 'Advokasi dan Komunikasi', 'HIMANETRO', '8b6a85c4732ccd10161a5cb1ef83870d.jpg'),
('ADFOKOM PGSD', 'ADFOKOM', 'Advokasi dan Komunikasi', 'PGSD', '2854d53a4d7697a6f2aefae0dc592e5e.jpg'),
('ADFOKOMHIMATIF', 'ADFOKOMHIMATIF', 'ADFOKOM', 'HIMATIF', 'd785c3e7a68f59ac6cdab7595fd946a1.jpg'),
('EXOFFHIMATIF', 'EXOFFHIMATIF', 'EX OFFICIO HIMATIF', 'HIMATIF', '4efd79ba58ff28861f118154ea8b13a8.jpg'),
('PAO', 'PAO', 'peaaoo', 'Kimia', '7b5935cca26aceca89589b7cdfd71da8.jpg'),
('Sosroh', 'Sosroh', 'Sosial dan Rohani', 'HIMANETRO', 'e5c3f86dab21bfd1113ca9203abe8f84.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailmenu`
--

CREATE TABLE `tb_detailmenu` (
  `id` int(11) NOT NULL,
  `status_id` int(4) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detailmenu`
--

INSERT INTO `tb_detailmenu` (`id`, `status_id`, `url`, `title`, `icon`, `is_active`) VALUES
(1, 1, 'c_user/', '   Pengajuan Uang', 'fas fa-hand-holding-usd fa-2x', 1),
(2, 1, 'c_user', '   Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(3, 2, 'c_user/Pagu_Anggaran', '   Pengajuan Uang', 'fas fa-hand-holding-usd fa-2x', 1),
(4, 2, 'c_user/Pinjam_Aula', '   Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(5, 3, 'c_user/Verifikasi_Data', '   Verifikasi Data Pengajuan', 'fas fa-file-invoice-dollar fa-2x', 1),
(6, 3, 'c_user/Pinjam_Aula', '   Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(7, 4, 'c_user/Laporan_Kegiatan', '  Laporan Kegiatan', 'fas fa-search fa-2x', 1),
(8, 4, 'c_user/Pinjam_Aula', '   Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(9, 5, 'c_user/Verifikasi_Laporan', '   Verifikasi Laporan', 'fas fa-file-contract fa-2x', 1),
(10, 5, 'c_user/Pinjam_Aula', '   Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailuser`
--

CREATE TABLE `tb_detailuser` (
  `id_dana` int(11) NOT NULL,
  `kd_jrsn` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kd_fklts` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `statususer` int(5) NOT NULL DEFAULT 1,
  `pesangagal` longtext CHARACTER SET latin1 NOT NULL DEFAULT '\'Alasan tidak ACC\'',
  `nPengajuan` int(3) DEFAULT 0,
  `danaawal` bigint(20) DEFAULT 0,
  `danasisa` bigint(20) DEFAULT 0,
  `tahunakademik` year(4) NOT NULL,
  `insertdata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detailuser`
--

INSERT INTO `tb_detailuser` (`id_dana`, `kd_jrsn`, `kd_fklts`, `jurusan`, `statususer`, `pesangagal`, `nPengajuan`, `danaawal`, `danasisa`, `tahunakademik`, `insertdata`) VALUES
(20, 'SEMAU', NULL, NULL, 1, 'Alasan tidak ACC', 1, 14000000, 14000000, 2020, '2020-09-27 17:09:33'),
(23, 'DEMAU', NULL, NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-29 11:47:03'),
(24, 'HIMATIF', 'SAINTEK', NULL, 2, '\'Alasan tidak ACC\'', 1, 10000000, 8000000, 2021, '2020-10-08 09:02:04'),
(26, 'HIMANETRO', 'SAINTEK', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-29 14:21:32'),
(27, 'PGSD', 'Tarbiyah', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-30 13:01:48'),
(28, 'HIMASAKI', 'SAINTEK', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-30 14:12:33'),
(29, 'Kimia', 'SAINTEK', NULL, 5, '\'Alasan tidak ACC\'', 1, 19000000, 11000000, 2021, '2020-10-08 10:04:50'),
(30, 'KM-HB', 'SAINTEK', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-30 14:13:56'),
(31, 'PenKimia', 'Tarbiyah', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-30 14:14:32'),
(32, 'Matematika', 'SAINTEK', NULL, 1, '\'Alasan tidak ACC\'', 1, 19000000, 19000000, 2021, '2020-10-06 08:49:15'),
(33, 'Perbandingan Agama', 'Ushuluddin', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-30 14:16:29'),
(34, 'Ilmu Hadist', 'Ushuluddin', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-30 14:17:12'),
(35, 'PAI', 'Tarbiyah', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-30 14:17:50'),
(36, 'PRAMUKA', 'UKM', NULL, 1, '\'Alasan tidak ACC\'', 1, 17000000, 17000000, 2021, '2020-10-02 14:14:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id` int(11) NOT NULL,
  `kd_ormawa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kd_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  `isikeluhan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`id`, `kd_ormawa`, `kd_fakultas`, `tanggal`, `isikeluhan`) VALUES
(1, 'PGSD', 'Tarbiyah', '2020-09-25', 'kurang jelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menuuser`
--

CREATE TABLE `tb_menuuser` (
  `id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menuuser`
--

INSERT INTO `tb_menuuser` (`id`, `status_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 3, 6),
(7, 4, 7),
(8, 4, 8),
(9, 5, 9),
(10, 5, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `kd_jrsn` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kd_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tahunakademik` year(4) NOT NULL,
  `nPengajuan` int(3) DEFAULT NULL,
  `statususer` int(4) NOT NULL,
  `akhirkegiatan` date NOT NULL,
  `tglmakslaporan` date NOT NULL,
  `tgluploadlpj` date NOT NULL,
  `namaKegiatan` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `danaawal` bigint(20) NOT NULL,
  `danasisa` double NOT NULL,
  `danaacc` bigint(20) NOT NULL,
  `suratpengajuan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rinciankegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rkakl` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `laporankegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `laporanrincianbiaya` varchar(255) CHARACTER SET latin1 NOT NULL,
  `insertdata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `kd_jrsn`, `kd_fakultas`, `jurusan`, `tahunakademik`, `nPengajuan`, `statususer`, `akhirkegiatan`, `tglmakslaporan`, `tgluploadlpj`, `namaKegiatan`, `danaawal`, `danasisa`, `danaacc`, `suratpengajuan`, `rinciankegiatan`, `rkakl`, `tor`, `laporankegiatan`, `laporanrincianbiaya`, `insertdata`) VALUES
(24, 'Kimia', 'SAINTEK', '', 2021, 1, 5, '2020-12-10', '2020-12-17', '2020-10-08', 'PBAK, AUDIENSI, ', 19000000, 11000000, 8000000, 'SPJ-201008-bee87c62c0.pdf', 'RKG-201008-bee87c62c0.pdf', 'RKA_KL-201008-bee87c62c0.pdf', 'TOR-201008-bee87c62c0.pdf', 'LPJ-201008-f2c39a8edd.pdf', 'RBY-201008-f2c39a8edd.pdf', '2020-10-08 10:04:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `Nama Status` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `Nama Status`) VALUES
(1, 'Belum Update Informasi Ormawa'),
(2, 'Selesai Update Informasi Ormawa'),
(3, 'Proses Pengajuan Dana'),
(4, 'Proses Laporan Kegiatan'),
(5, 'Verifikasi Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sumtotalanggotafak`
--

CREATE TABLE `tb_sumtotalanggotafak` (
  `id` int(11) NOT NULL,
  `kd_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `total_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sumtotalanggotafak`
--

INSERT INTO `tb_sumtotalanggotafak` (`id`, `kd_fakultas`, `nama_fakultas`, `total_anggota`) VALUES
(0, 'Tarbiyah', 'Tarbiyah dan Keguruan', 0),
(0, 'Ushuluddin', 'Ushuluddin', 0);

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
  `statususer` int(5) DEFAULT NULL,
  `update_date` datetime NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `role`, `kode_himp`, `is_active`, `statususer`, `update_date`, `insert_date`) VALUES
(17, 'admin aljamiah', 'admin@gmail.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1, 'Contoh', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin2', 'email@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1, '', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'if', 'jeruk@gmail.com', 'ifsakti', '929d97cf81785edc0ff40c0fcad87726', 0, 'HIMATIF', 1, 2, '0000-00-00 00:00:00', '2020-09-29 16:22:35'),
(31, 'elektro', 'asd@gmail.com', 'elektro', '3f0062caa096feac56117e460aa91bdd', 0, 'HIMANETRO', 1, 2, '0000-00-00 00:00:00', '2020-09-29 16:23:03'),
(32, 'PGSD', 'jeruk@gmail.com', 'pgsd', '115b3860d663b4206ee6dfd929e72a93', 0, 'PGSD', 1, 2, '0000-00-00 00:00:00', '2020-09-30 15:02:19'),
(33, 'kimiasains', 'kimia@uinsgd.ac.id', 'kimiasains', '5c913be9b7d3732443786aeebbad0818', 0, 'Kimia', 1, 5, '0000-00-00 00:00:00', '2020-10-08 11:49:26');

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
-- Indeks untuk tabel `tb_detailmenu`
--
ALTER TABLE `tb_detailmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  ADD PRIMARY KEY (`id_dana`),
  ADD KEY `status` (`statususer`),
  ADD KEY `jurusan_ibfk_2` (`kd_fklts`);

--
-- Indeks untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_menuuser`
--
ALTER TABLE `tb_menuuser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `faklts` (`kd_fakultas`),
  ADD KEY `status1` (`statususer`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_sumtotalanggotafak`
--
ALTER TABLE `tb_sumtotalanggotafak`
  ADD KEY `kd_fakultas` (`kd_fakultas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_himp` (`kode_himp`) USING BTREE,
  ADD KEY `status` (`statususer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Ketidakleluasaan untuk tabel `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  ADD CONSTRAINT `jurusan_ibfk_2` FOREIGN KEY (`kd_fklts`) REFERENCES `fakultas` (`kode_fakultas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `status1` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
