-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 02:22 AM
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
-- Database: `simarwahfix`
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

--
-- Dumping data for table `anggota_himpunan`
--

INSERT INTO `anggota_himpunan` (`nim`, `nama`, `alamat`, `jenis_kelamin`, `kontak`, `email`, `jabatan`, `parent_himpunan`, `parent_bidang`) VALUES
('1177050083', 'qwerty', 'bandung', 'P', '098873652', '', 'KETUA BIDANG', 'HIMATIF', 'SOSROH_HIMATIF');

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

--
-- Dumping data for table `anggota_ukmukk`
--

INSERT INTO `anggota_ukmukk` (`u_nim`, `u_nama`, `u_alamat`, `u_jeniskelamin`, `u_kontak`, `u_email`, `u_jabatan`, `parent_ukmukk`, `parent_ubidang`) VALUES
('117787362', 'hehe', 'bandung', 'L', '', 'nhsad@gmail.com', 'KETUA BIDANG', 'Ukk_pramuka', 'PAO_Pramuka');

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

--
-- Dumping data for table `bidang_ukmukk`
--

INSERT INTO `bidang_ukmukk` (`kode_ubidang`, `label_ubidang`, `desc_ubidang`, `image`, `parent_ukmukk`) VALUES
('PAO_Pramuka', 'PAO', 'Singkatannya', 'a5ad2c02fbc0cf418ea2b124cecf17de.png', 'Ukk_pramuka');

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

--
-- Dumping data for table `daftar_kegiatan`
--

INSERT INTO `daftar_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `start_date`, `end_date`, `Parent_himpunan`) VALUES
(1, 'PBAK', '2020-11-19', '2020-11-21', 'HIMATIF');

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
('HIMATIF', 'Teknik Informatika', 'Himpunan Mahasiswa Teknik Informatika', 'visi himatif', 'misi himatif', 1900, '6d1464e2fb6e0c84cd4c60e89038d751.jpg', 'SAINTEK'),
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

--
-- Dumping data for table `kegiatan_ukmukk`
--

INSERT INTO `kegiatan_ukmukk` (`id_ukegiatan`, `nama_ukegiatan`, `ustart_date`, `uend_date`, `parent_ukmukk`) VALUES
(4, 'mos', '2020-11-10', '2020-12-02', 'Ukk_pramuka');

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

--
-- Dumping data for table `nama_bidang`
--

INSERT INTO `nama_bidang` (`kode_bidang`, `label_bidang`, `desc_bidang`, `parent_himpunan`, `image`) VALUES
('SOSROH_HIMATIF', 'SOSROH', 'Sosial dan Rohani', 'HIMATIF', 'b4199843f2695a75112ecb89d2c89901.png');

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
-- Table structure for table `tb_detailuser`
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
-- Dumping data for table `tb_detailuser`
--

INSERT INTO `tb_detailuser` (`id_dana`, `kd_jrsn`, `kd_fklts`, `jurusan`, `statususer`, `pesangagal`, `nPengajuan`, `danaawal`, `danasisa`, `tahunakademik`, `insertdata`) VALUES
(20, 'SEMAU', NULL, NULL, 1, 'Alasan tidak ACC', 1, 14000000, 14000000, 2020, '2020-09-27 17:09:33'),
(23, 'DEMAU', NULL, NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-29 11:47:03'),
(39, 'HIMATIF', 'SAINTEK', NULL, 4, 'KURANG LENGKAP', 1, 19000000, 11000000, 2020, '2020-11-06 00:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailuserukmukk`
--

CREATE TABLE `tb_detailuserukmukk` (
  `id_dana` int(11) NOT NULL,
  `kd_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_ukmukk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `statususer` int(5) NOT NULL DEFAULT 1,
  `pesangagal` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nPengajuan` int(3) NOT NULL,
  `danaawal` bigint(20) NOT NULL DEFAULT 0,
  `danasisa` bigint(20) NOT NULL DEFAULT 0,
  `tahunakademik` year(4) NOT NULL DEFAULT 0000,
  `insertdata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detailuserukmukk`
--

INSERT INTO `tb_detailuserukmukk` (`id_dana`, `kd_ukmukk`, `nama_ukmukk`, `statususer`, `pesangagal`, `nPengajuan`, `danaawal`, `danasisa`, `tahunakademik`, `insertdata`) VALUES
(6, 'Ukk_pramuka', 'Pramuka', 4, '', 1, 13000000, 11500000, 2020, '2020-11-06 01:17:52');

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
('blue', 'Aula B'),
('purple', 'Aula A');

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
  `statususer` int(5) NOT NULL,
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
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `kd_jrsn`, `kd_fakultas`, `jurusan`, `tahunakademik`, `nPengajuan`, `statususer`, `akhirkegiatan`, `tglmakslaporan`, `tgluploadlpj`, `namaKegiatan`, `danaawal`, `danasisa`, `danaacc`, `suratpengajuan`, `rinciankegiatan`, `rkakl`, `tor`, `laporankegiatan`, `laporanrincianbiaya`, `insertdata`) VALUES
(27, 'HIMATIF', 'SAINTEK', '', 2020, 1, 4, '2020-11-12', '0000-00-00', '0000-00-00', 'PBAK, Monitor', 19000000, 11000000, 8000000, 'SPJ-201105-206235bc40.pdf', 'RKG-201105-206235bc40.pdf', 'RKA_KL-201105-206235bc40.pdf', 'TOR-201105-206235bc40.pdf', '', '', '2020-11-06 00:35:22');

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
  `statususer` int(5) NOT NULL,
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
  `inserdata` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan_ukmukk`
--

INSERT INTO `tb_pengajuan_ukmukk` (`id_pengajuan_ukmukk`, `kd_ukmkk`, `nama_ukmukk`, `tahunakademik`, `nPengajuan`, `statususer`, `akhirkegiatan`, `tglmakslaporan`, `tgluploadlpj`, `namaKegiatan`, `danaawal`, `danasisa`, `danaacc`, `suratpengajuan`, `rinciankegiatan`, `rkakl`, `tor`, `laporankegiatan`, `laporanrincianbiaya`, `inserdata`) VALUES
(2, 'HM', 'hm', 0000, 1, 3, '2020-11-09', '0000-00-00', '0000-00-00', 'monitor', 1982000, 1982000, 0, '', '', '', '', '', '', '2020-11-06 00:31:27'),
(3, 'Ukk_pramuka', 'Pramuka', 2020, 1, 4, '2020-11-18', '0000-00-00', '0000-00-00', 'ospek', 13000000, 11500000, 1500000, 'SPJ-201106-1dbf660b02.pdf', 'RKG-201106-1dbf660b02.pdf', 'RKA_KL-201106-1dbf660b02.pdf', 'TOR-201106-1dbf660b02.pdf', '', '', '2020-11-06 01:17:52');

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

--
-- Dumping data for table `tb_sewaaula`
--

INSERT INTO `tb_sewaaula` (`id_sewa`, `penyewa`, `Keterangan`, `no_surat`, `surat_sewa`, `jenisaula`, `dari`, `hingga`, `mulaipukul`, `akhirpukul`, `nama_pj`, `no_pj`) VALUES
(1, 'HIMATIF', 'PRS', '19283/2983/Permohonan Izin Sewa Aula', 'SuratIzinSewaAula-201105-0d6ed3d935-HIMATIF-PRS.pdf', 'blue', '2020-11-06', '2020-11-08', '09:00:00', '04:00:00', 'saya', '0876273612'),
(2, 'HIMATIF', 'PRS2', '987/2312/B/312', 'SuratIzinSewaAula-201105-7704668530-HIMATIF-PRS2.pdf', 'purple', '2020-11-12', '2020-11-14', '09:00:00', '03:00:00', 'YYYYYyyyyy', '0967567564'),
(4, 'Ukk_pramuka', 'Ospek', '12873/23/B', 'SuratIzinSewaAula-201106-07f389b2b6-Ukk_pramuka-Ospek.pdf', 'blue', '2020-11-06', '2020-11-08', '09:01:00', '07:02:00', 'saya', '0986745643');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `Nama Status` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `Nama Status`) VALUES
(1, 'Belum Update Informasi Ormawa'),
(2, 'Selesai Update Informasi Ormawa'),
(3, 'Proses Pengajuan Dana'),
(4, 'Proses Laporan Kegiatan'),
(5, 'Verifikasi Laporan');

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
-- Table structure for table `tb_sumtotalanggotafak`
--

CREATE TABLE `tb_sumtotalanggotafak` (
  `id` int(11) NOT NULL,
  `kd_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_fakultas` varchar(255) CHARACTER SET latin1 NOT NULL,
  `total_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sumtotalanggotafak`
--

INSERT INTO `tb_sumtotalanggotafak` (`id`, `kd_fakultas`, `nama_fakultas`, `total_anggota`) VALUES
(0, 'Tarbiyah', 'Tarbiyah dan Keguruan', 0),
(0, 'Ushuluddin', 'Ushuluddin', 0);

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
('Ukk_pramuka', 'Pramuka', 'ya pramuka', 'visi pramuka', 'misi pramuka', 1200, 'dbe6bea1849ac8b36a503c1536d29fdb.png');

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
  `statususer` int(5) DEFAULT NULL,
  `statussewa` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `telp`, `password`, `role`, `kode_himp`, `is_active`, `statususer`, `statussewa`, `update_date`, `insert_date`) VALUES
(17, 'admin aljamiahaaaa', 'admin@gmail.com', 'admin1', '', 'eed57216df3731106517ccaf5da2122d', 1, 'Contoh', 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin2', 'email@gmail.com', 'admin2', '', 'c84258e9c39059a89ab77d846ddab909', 1, '', 1, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'HMJ Teknik Informatika', '', 'himatif@uinsgd.ac.id', '0898746352', '23abc39caa54c738db2e54511dac4e96', 0, 'HIMATIF', 1, 4, 0, '0000-00-00 00:00:00', '2020-11-05 19:55:19'),
(40, 'UKK Pramuka', '', 'Pramuka@uinsgd.ac.id', '098785756', '78ef2c624387fdd0837ad47421536a27', 2, 'Ukk_pramuka', 1, 4, 0, '0000-00-00 00:00:00', '2020-11-06 02:04:31');

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
  ADD PRIMARY KEY (`id_dana`),
  ADD KEY `status` (`statususer`),
  ADD KEY `jurusan_ibfk_2` (`kd_fklts`);

--
-- Indexes for table `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  ADD PRIMARY KEY (`id_dana`),
  ADD KEY `statususer` (`statususer`);

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
-- Indexes for table `tb_statussewa`
--
ALTER TABLE `tb_statussewa`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_sumtotalanggotafak`
--
ALTER TABLE `tb_sumtotalanggotafak`
  ADD KEY `kd_fakultas` (`kd_fakultas`);

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
  ADD KEY `status` (`statususer`),
  ADD KEY `statussewa` (`statussewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kegiatan_ukmukk`
--
ALTER TABLE `kegiatan_ukmukk`
  MODIFY `id_ukegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_pengajuan_ukmukk`
--
ALTER TABLE `tb_pengajuan_ukmukk`
  MODIFY `id_pengajuan_ukmukk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sewaaula`
--
ALTER TABLE `tb_sewaaula`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- Constraints for table `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  ADD CONSTRAINT `jurusan_ibfk_2` FOREIGN KEY (`kd_fklts`) REFERENCES `fakultas` (`kode_fakultas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`);

--
-- Constraints for table `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  ADD CONSTRAINT `status_user_relationship` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
