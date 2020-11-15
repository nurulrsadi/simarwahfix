-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 07:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ymarwah`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_himpunan`
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

-- --------------------------------------------------------

--
-- Table structure for table `anggota_ukmukk`
--

CREATE TABLE `anggota_ukmukk` (
  `u_nim` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_nama` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_alamat` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_jeniskelamin` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_kontak` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_jabatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent_ubidang` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_ukmukk`
--

CREATE TABLE `bidang_ukmukk` (
  `kode_ubidang` varchar(255) CHARACTER SET latin1 NOT NULL,
  `label_ubidang` varchar(255) CHARACTER SET latin1 NOT NULL,
  `desc_ubidang` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kegiatan`
--

CREATE TABLE `daftar_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `Parent_himpunan` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
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
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `nama_fakultas`, `deskripsi`, `visi`, `misi`, `parent_univ`) VALUES
('SAINTEK', 'Sains dan Teknologi', '', 'visi saintek', 'misi saintek', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_himpunan` varchar(255) NOT NULL,
  `nama_himpunan` varchar(255) NOT NULL,
  `desc_himpunan` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `jml_mhsaktif` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `parent_fakultas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_himpunan`, `nama_himpunan`, `desc_himpunan`, `visi`, `misi`, `jml_mhsaktif`, `image`, `parent_fakultas`) VALUES
('DEMAU', 'DEMAU', 'Dema Mahasiswa Universitas', '', '', 0, '005ef1cbc869f611acf8cf13d160f959.jpg', NULL),
('HIMATIF', 'Teknik Informatika', 'Himpunan Mahasiswa Teknik Informatika', '', '', 0, '5e98278f39217d06a205b042d090b5df.jpg', 'SAINTEK'),
('saintek', 'DEMAF', 'Dewan Mahasiswa Fakultas SAINTEK', '', '', 0, 'a98f947c03e5f9b7c8f88e65bb497582.png', 'SAINTEK'),
('SEMAU', 'SEMAU', 'Senat Mahasiswa Universitas', 'xxxx', 'Test', 0, '5580f7bbef60dc1f86cd0e3ab7a9e372.PNG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_ukmukk`
--

CREATE TABLE `kegiatan_ukmukk` (
  `id_ukegiatan` int(11) NOT NULL,
  `nama_ukegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ustart_date` date NOT NULL,
  `uend_date` date NOT NULL,
  `parent_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nama_bidang`
--

CREATE TABLE `nama_bidang` (
  `kode_bidang` varchar(255) NOT NULL,
  `label_bidang` varchar(255) NOT NULL,
  `desc_bidang` varchar(255) NOT NULL,
  `parent_himpunan` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailmenu`
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
-- Dumping data for table `tb_detailmenu`
--

INSERT INTO `tb_detailmenu` (`id`, `status_id`, `url`, `title`, `icon`, `is_active`) VALUES
(1, 1, 'c_user/', '&nbsp;&nbsp;Pengajuan Anggaran', 'fas fa-hand-holding-usd fa-2x', 1),
(2, 1, 'c_user', '&nbsp;&nbsp;&nbsp;Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(3, 2, 'c_user/Pagu_Anggaran', '&nbsp;&nbsp;Pengajuan Anggaran', 'fas fa-hand-holding-usd fa-2x', 1),
(4, 2, 'c_user/Pinjam_Aula', '&nbsp;&nbsp;&nbsp;Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(5, 3, 'c_user/Verifikasi_Data', '&nbsp;&nbsp;&nbsp;&nbsp;Verifikasi Data Pengajuan', 'fas fa-file-invoice-dollar fa-2x', 1),
(6, 3, 'c_user/Pinjam_Aula', '&nbsp;&nbsp;&nbsp;Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(7, 4, 'c_user/Laporan_Kegiatan', '&nbsp;&nbsp;Laporan Kegiatan', 'fas fa-search fa-2x', 1),
(8, 4, 'c_user/Pinjam_Aula', ' &nbsp;&nbsp;&nbsp;Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(9, 5, 'c_user/Verifikasi_Laporan', '&nbsp;&nbsp;&nbsp;&nbsp;Verifikasi Laporan Kegiatan', 'fas fa-file-contract fa-2x', 1),
(10, 5, 'c_user/Pinjam_Aula', '&nbsp;&nbsp;&nbsp;Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(11, 6, 'c_user/Failed_Anggaran', '&nbsp;&nbsp;Gagal Pengajuan Anggaran', 'fas fa-times-circle fa-2x', 1),
(12, 6, 'c_user/Pinjam_Aula', '&nbsp;&nbsp;&nbsp;Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1),
(13, 7, 'c_user/Failed_Laporan', '&nbsp;&nbsp;Gagal Pengajuan Laporan', 'fas fa-times-circle fa-2x', 1),
(14, 7, 'c_user/Pinjam_Aula', '&nbsp;&nbsp;&nbsp;Peminjaman Aula SC', 'fas fa-calendar-day fa-2x', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailuser`
--

CREATE TABLE `tb_detailuser` (
  `id_dana` int(11) NOT NULL,
  `kd_jrsn` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kd_fklts` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `statususer` int(9) NOT NULL,
  `pesangagal` longtext CHARACTER SET latin1 NOT NULL DEFAULT '\'Alasan tidak ACC\'',
  `nPengajuan` int(3) DEFAULT 0,
  `danaawal` bigint(20) DEFAULT 0,
  `danasisa` bigint(20) DEFAULT 0,
  `tahunakademik` year(4) NOT NULL,
  `insertdata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detailuser`
--

INSERT INTO `tb_detailuser` (`id_dana`, `kd_jrsn`, `kd_fklts`, `jurusan`, `statususer`, `pesangagal`, `nPengajuan`, `danaawal`, `danasisa`, `tahunakademik`, `insertdata`) VALUES
(48, 'HIMATIF', 'SAINTEK', NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-11-15 06:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailuserukmukk`
--

CREATE TABLE `tb_detailuserukmukk` (
  `id_dana` int(11) NOT NULL,
  `kd_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `statususer` int(9) NOT NULL,
  `pesangagal` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nPengajuan` int(3) NOT NULL,
  `danaawal` bigint(20) NOT NULL DEFAULT 0,
  `danasisa` bigint(20) NOT NULL DEFAULT 0,
  `tahunakademik` year(4) NOT NULL DEFAULT 0000,
  `insertdata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id` int(11) NOT NULL,
  `kd_ormawa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kd_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  `isikeluhan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ket_aula`
--

CREATE TABLE `tb_ket_aula` (
  `warna_id` varchar(11) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ket_aula`
--

INSERT INTO `tb_ket_aula` (`warna_id`, `keterangan`) VALUES
('blue', 'Aula A'),
('purple', 'Aula B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menuuser`
--

CREATE TABLE `tb_menuuser` (
  `id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menuuser`
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
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `kd_jrsn` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kd_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tahunakademik` year(4) NOT NULL,
  `nPengajuan` int(3) DEFAULT NULL,
  `statususer` int(9) NOT NULL,
  `alasan_gagal_pengajuan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `alasan_gagal_laporan` varchar(255) CHARACTER SET latin1 NOT NULL,
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
  `insertdata` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_ukmukk`
--

CREATE TABLE `tb_pengajuan_ukmukk` (
  `id_pengajuan_ukmukk` int(11) NOT NULL,
  `kd_ukmkk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tahunakademik` year(4) NOT NULL,
  `nPengajuan` int(3) NOT NULL,
  `statususer` int(9) NOT NULL,
  `alasan_gagal_pengajuan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `alasan_gagal_laporan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `akhirkegiatan` date NOT NULL,
  `tglmakslaporan` date NOT NULL,
  `tgluploadlpj` date NOT NULL,
  `namaKegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `danaawal` bigint(20) NOT NULL,
  `danasisa` bigint(20) NOT NULL,
  `danaacc` bigint(20) NOT NULL,
  `suratpengajuan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rinciankegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rkakl` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `laporankegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `laporanrincianbiaya` varchar(255) CHARACTER SET latin1 NOT NULL,
  `insertdata` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewaaula`
--

CREATE TABLE `tb_sewaaula` (
  `id_sewa` int(11) NOT NULL,
  `penyewa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Keterangan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `no_surat` varchar(255) CHARACTER SET latin1 NOT NULL,
  `surat_sewa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jenisaula` varchar(10) CHARACTER SET latin1 NOT NULL,
  `dari` date NOT NULL,
  `hingga` date NOT NULL,
  `mulaipukul` time NOT NULL,
  `akhirpukul` time NOT NULL,
  `nama_pj` varchar(255) CHARACTER SET latin1 NOT NULL,
  `no_pj` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `Nama_Status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `button_color_history` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `Nama_Status`, `button_color_history`) VALUES
(1, 'Belum Update Informasi Ormawa', ''),
(2, 'Selesai Update Informasi Ormawa', ''),
(3, 'Proses Pengajuan Anggaran Dana', 'btn btn-sm btn-warning'),
(4, 'Proses Laporan Kegiatan', 'btn btn-sm btn-warning'),
(5, 'Verifikasi Laporan', 'btn btn-sm btn-warning'),
(6, 'Proses Failed Pengajuan', 'btn btn-sm btn-danger'),
(7, 'Proses Failed Laporan', 'btn btn-sm btn-danger'),
(8, 'Pengajuan Ditolak', 'btn btn-sm btn-danger'),
(9, 'Laporan Ditolak', 'btn btn-sm btn-danger'),
(10, 'Laporan di terima', 'btn btn-sm btn-success');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statuspengajuan`
--

CREATE TABLE `tb_statuspengajuan` (
  `id_status_pengajuan` int(11) NOT NULL,
  `Keterangan_pengajuan` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_statuspengajuan`
--

INSERT INTO `tb_statuspengajuan` (`id_status_pengajuan`, `Keterangan_pengajuan`) VALUES
(1, 'Proses Pengajuan'),
(2, 'Pengajuan diterima'),
(3, 'Pengajuan ditolak'),
(4, 'Proses Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statussewa`
--

CREATE TABLE `tb_statussewa` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_statussewa`
--

INSERT INTO `tb_statussewa` (`id_status`, `keterangan`) VALUES
(0, 'tidak akti'),
(1, 'aktif sewa');

-- --------------------------------------------------------

--
-- Table structure for table `ukm_ukk`
--

CREATE TABLE `ukm_ukk` (
  `kode_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `desc_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `visi_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `misi_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jml_umhsaktif` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukm_ukk`
--

INSERT INTO `ukm_ukk` (`kode_ukmukk`, `nama_ukmukk`, `desc_ukmukk`, `visi_ukmukk`, `misi_ukmukk`, `jml_umhsaktif`, `image`) VALUES
('UKK Pramuka', 'PRAMUKA', 'PRAMUKA', '', '', 0, 'd0032888b458671ac647038abb320f30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `kode_himp` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `statususer` int(7) NOT NULL,
  `update_date` datetime NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `telp`, `password`, `role`, `kode_himp`, `is_active`, `statususer`, `update_date`, `insert_date`) VALUES
(17, 'admin aljamiahaaaa', 'admin@gmail.com', 'admin1', '', 'eed57216df3731106517ccaf5da2122d', 1, 'Contoh', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Admin HIMATIF', '', 'himatif@uinsgd', '126486172', '23abc39caa54c738db2e54511dac4e96', 0, 'HIMATIF', 1, 1, '0000-00-00 00:00:00', '2020-11-15 14:10:14'),
(43, 'Admin DEMA-F SAINTEK', '', 'admindemafsaintek@gmail.com', '8624716482', '7f07f384b9ca1f5c06f88b75b977caa9', 0, 'saintek', 1, 1, '0000-00-00 00:00:00', '2020-11-15 14:11:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_himpunan`
--
ALTER TABLE `anggota_himpunan`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `parent_himpunan` (`parent_himpunan`),
  ADD KEY `parent_bidang` (`parent_bidang`);

--
-- Indexes for table `anggota_ukmukk`
--
ALTER TABLE `anggota_ukmukk`
  ADD PRIMARY KEY (`u_nim`),
  ADD KEY `parent_ukmukk` (`parent_ukmukk`),
  ADD KEY `parent_ubidang` (`parent_ubidang`);

--
-- Indexes for table `bidang_ukmukk`
--
ALTER TABLE `bidang_ukmukk`
  ADD PRIMARY KEY (`kode_ubidang`),
  ADD KEY `parent_ukmukk` (`parent_ukmukk`);

--
-- Indexes for table `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `Parent_himpunan` (`Parent_himpunan`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_himpunan`),
  ADD KEY `parent_fakultas` (`parent_fakultas`);

--
-- Indexes for table `kegiatan_ukmukk`
--
ALTER TABLE `kegiatan_ukmukk`
  ADD PRIMARY KEY (`id_ukegiatan`),
  ADD KEY `parent_ukmukk` (`parent_ukmukk`);

--
-- Indexes for table `nama_bidang`
--
ALTER TABLE `nama_bidang`
  ADD PRIMARY KEY (`kode_bidang`),
  ADD KEY `parent_himpunan` (`parent_himpunan`);

--
-- Indexes for table `tb_detailmenu`
--
ALTER TABLE `tb_detailmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indexes for table `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indexes for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ket_aula`
--
ALTER TABLE `tb_ket_aula`
  ADD PRIMARY KEY (`warna_id`);

--
-- Indexes for table `tb_menuuser`
--
ALTER TABLE `tb_menuuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `faklts` (`kd_fakultas`),
  ADD KEY `status1` (`statususer`);

--
-- Indexes for table `tb_pengajuan_ukmukk`
--
ALTER TABLE `tb_pengajuan_ukmukk`
  ADD PRIMARY KEY (`id_pengajuan_ukmukk`),
  ADD KEY `statususer` (`statususer`);

--
-- Indexes for table `tb_sewaaula`
--
ALTER TABLE `tb_sewaaula`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `jenisaula` (`jenisaula`),
  ADD KEY `penyewa` (`penyewa`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_statuspengajuan`
--
ALTER TABLE `tb_statuspengajuan`
  ADD PRIMARY KEY (`id_status_pengajuan`);

--
-- Indexes for table `tb_statussewa`
--
ALTER TABLE `tb_statussewa`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `ukm_ukk`
--
ALTER TABLE `ukm_ukk`
  ADD PRIMARY KEY (`kode_ukmukk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `status_menu` (`statususer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan_ukmukk`
--
ALTER TABLE `kegiatan_ukmukk`
  MODIFY `id_ukegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_pengajuan_ukmukk`
--
ALTER TABLE `tb_pengajuan_ukmukk`
  MODIFY `id_pengajuan_ukmukk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sewaaula`
--
ALTER TABLE `tb_sewaaula`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_himpunan`
--
ALTER TABLE `anggota_himpunan`
  ADD CONSTRAINT `anggota_himpunan_ibfk_3` FOREIGN KEY (`parent_himpunan`) REFERENCES `jurusan` (`kode_himpunan`),
  ADD CONSTRAINT `anggota_himpunan_ibfk_4` FOREIGN KEY (`parent_bidang`) REFERENCES `nama_bidang` (`kode_bidang`);

--
-- Constraints for table `anggota_ukmukk`
--
ALTER TABLE `anggota_ukmukk`
  ADD CONSTRAINT `anggota_ukmukk_ibfk_1` FOREIGN KEY (`parent_ukmukk`) REFERENCES `ukm_ukk` (`kode_ukmukk`),
  ADD CONSTRAINT `anggota_ukmukk_ibfk_2` FOREIGN KEY (`parent_ubidang`) REFERENCES `bidang_ukmukk` (`kode_ubidang`);

--
-- Constraints for table `bidang_ukmukk`
--
ALTER TABLE `bidang_ukmukk`
  ADD CONSTRAINT `bidang_ukmukk_ibfk_1` FOREIGN KEY (`parent_ukmukk`) REFERENCES `ukm_ukk` (`kode_ukmukk`);

--
-- Constraints for table `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  ADD CONSTRAINT `daftar_kegiatan_ibfk_1` FOREIGN KEY (`Parent_himpunan`) REFERENCES `jurusan` (`kode_himpunan`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`parent_fakultas`) REFERENCES `fakultas` (`kode_fakultas`) ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan_ukmukk`
--
ALTER TABLE `kegiatan_ukmukk`
  ADD CONSTRAINT `kegiatan_ukmukk_ibfk_1` FOREIGN KEY (`parent_ukmukk`) REFERENCES `ukm_ukk` (`kode_ukmukk`);

--
-- Constraints for table `nama_bidang`
--
ALTER TABLE `nama_bidang`
  ADD CONSTRAINT `parent_himpunan` FOREIGN KEY (`parent_himpunan`) REFERENCES `jurusan` (`kode_himpunan`);

--
-- Constraints for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `status1` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_pengajuan_ukmukk`
--
ALTER TABLE `tb_pengajuan_ukmukk`
  ADD CONSTRAINT `status12` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_sewaaula`
--
ALTER TABLE `tb_sewaaula`
  ADD CONSTRAINT `WARNA PENYEWA` FOREIGN KEY (`jenisaula`) REFERENCES `tb_ket_aula` (`warna_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `status_menu` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
