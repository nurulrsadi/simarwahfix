-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2020 pada 11.25
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
('1155090000', 'Muhammad Luthfi Aziz', '', 'L', '', '', 'KETUA', 'HIMATIF', 'PAOHIMATIF'),
('1177050100', 'pucuk', 'jkrt', 'P', '0898334873', 'jeru1k@gmail.com', 'KETUA BIDANG', 'PGSD', 'Sosroh'),
('1177050101', 'jeruk', 'bandung', 'P', '089813', 'asd@gmail.com', 'ANGGOTA', 'PGSD', 'Sosroh'),
('1177050102', 'jeruk', 'jakarta', 'L', '0898765', 'jeruk@gmail.com', 'ANGGOTA', 'PGSD', 'Sosroh');

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
('contohfakultas', 'contoh fakultas', 'di uin', 'jir', 'jir', NULL),
('SAINTEK', 'Sains dan Teknologi', 'Deskripsi Saintek', 'Visi Saintek', 'Misi Saintek', NULL),
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
('Contoh', 'HIMANETRO', 'OK', 'visi fakultas', 'misi fakultas', '0', 'ff9c68a152720d52989b985eaed44616.jpeg', 'SAINTEK'),
('DEMAFSAINTEK', 'DEMAF', 'Dewan Mahasiswa Fakultas Saintek', '', '', '0', '0435035e9a852837df6ae8f2097cf33d.png', 'SAINTEK'),
('DEMAU', 'DEMAU', 'Dewan Mahasiswa Universitas', '', '', '0', 'a213b91829a3ee60d95e2b53f76003e2.jpg', NULL),
('HIMASAKI', 'HIMASAKI', 'Himpunan Mahasiswa Kimia', 'Pinter Ngoding Pisan', '', '0', 'eddd22847be566f592b58be2c2350c7e.png', 'SAINTEK'),
('HIMATIF', 'HIMATIF', 'Himpunan Mahasiswa Teknik Informatika', 'Visi Himatif Update ', 'Misi Himatif Update ', '0', '9b5d664b92465eb5265038ba65331334.PNG', 'SAINTEK'),
('ILHUM', 'ILHUM', 'Ilmu Hukum', '', '', '0', '49192782891da543567e070a77e9ca62.jpg', 'SYARKUM'),
('PGSD', 'PSGD', '', 'Visi Himatif Update k', 'Misi Himatif Update ', '', 'db5f08c6d02598be878609e792325cce.jpg', 'Tarbiyah'),
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
('PAOILHUM', 'PAO', '', 'ILHUM', ''),
('Sosroh', 'Sosroh', 'Sosial dan Rohani', 'PGSD', '9fb078b4a011b9fd2c99a6791b99ead8.jpg');

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
(14, 'ILHUM', 'SYARKUM', NULL, 1, 'Alasan tidak ACC', 1, 13000000, 13000000, 2021, '2020-09-23 18:06:28'),
(15, 'HIMATIF', 'SAINTEK', NULL, 1, 'Alasan tidak ACC', 1, 20000000, 20000000, 2021, '2020-09-22 19:53:19'),
(16, 'HIMASAKI', 'SAINTEK', NULL, 1, 'Alasan tidak ACC', 1, 12000000, 12000000, 2021, '2020-09-22 19:53:14'),
(17, 'DEMAFSAINTEK', 'SAINTEK', NULL, 1, 'Alasan tidak ACC', 1, 19000000, 19000000, 2020, '2020-09-22 19:53:08'),
(18, 'Contoh', 'SAINTEK', NULL, 1, 'Alasan tidak ACC', 1, 19000000, 19000000, 2020, '2020-09-21 17:59:05'),
(19, 'DEMAU', NULL, NULL, 1, 'Alasan tidak ACC', 1, 18000000, 18000000, 2020, '2020-09-23 11:57:50'),
(20, 'SEMAU', NULL, NULL, 1, 'Alasan tidak ACC', 1, 19000000, 19000000, 2020, '2020-09-23 18:06:21'),
(21, 'PGSD', 'Tarbiyah', NULL, 2, 'yang bener ya lain kalee', 2, 13000000, 9000000, 2021, '2020-09-25 09:01:18');

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
-- Struktur dari tabel `tb_namafakultas`
--

CREATE TABLE `tb_namafakultas` (
  `id_namafakultas` int(11) NOT NULL,
  `kode_namafakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_namafakultas`
--

INSERT INTO `tb_namafakultas` (`id_namafakultas`, `kode_namafakultas`, `nama_fakultas`) VALUES
(1, 'contohfakultas', 'contoh fakultas'),
(2, 'SAINTEK', 'Sains dan Teknologi'),
(3, 'SYARKUM', 'Syariah dan Hukum'),
(4, 'Tarbiyah', 'Tarbiyah dan Keguruan'),
(5, 'Universitas', 'UNIV');

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
(10, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'HIMATIF', 1, 1, '2020-09-05 00:00:00', '2020-09-05 00:00:00'),
(12, 'Nisvy Syabana Nugraha', 'nisvy@gmail.com', 'nisvysyan', '1658175c5dfbe416e5dbbc7863ddcc90', 0, 'ILHUM', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'nisvy', 'nisvysyabana@gmail.com', 'nisvy', 'cabaa1823f3f04eed79c753a6f5f4845', 0, 'HIMATIF', 1, 1, '0000-00-00 00:00:00', '2020-09-08 10:23:10'),
(17, 'admin aljamiah', 'admin@gmail.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1, 'Contoh', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin2', 'email@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1, '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'PGSD', 'jeruk@gmail.com', 'PGSD', '115b3860d663b4206ee6dfd929e72a93', 0, 'PGSD', 1, 2, '0000-00-00 00:00:00', '2020-09-19 19:26:18');

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
-- Indeks untuk tabel `tb_namafakultas`
--
ALTER TABLE `tb_namafakultas`
  ADD PRIMARY KEY (`id_namafakultas`),
  ADD KEY `fak` (`kode_namafakultas`);

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
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_namafakultas`
--
ALTER TABLE `tb_namafakultas`
  MODIFY `id_namafakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
