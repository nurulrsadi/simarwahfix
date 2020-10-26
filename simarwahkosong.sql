-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2020 pada 11.22
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_ukmukk`
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
-- Struktur dari tabel `bidang_ukmukk`
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
-- Struktur dari tabel `daftar_kegiatan`
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
  `jml_mhsaktif` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `parent_fakultas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_himpunan`, `nama_himpunan`, `desc_himpunan`, `visi`, `misi`, `jml_mhsaktif`, `image`, `parent_fakultas`) VALUES
('DEMAU', 'DEMAU', 'Dema Mahasiswa Universitas', '', '', 0, '005ef1cbc869f611acf8cf13d160f959.jpg', NULL),
('SEMAU', 'SEMAU', 'Senat Mahasiswa Universitas', 'xxxx', 'Test', 0, '5580f7bbef60dc1f86cd0e3ab7a9e372.PNG', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_ukmukk`
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
-- Struktur dari tabel `nama_bidang`
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
(23, 'DEMAU', NULL, NULL, 1, '\'Alasan tidak ACC\'', 0, 0, 0, 0000, '2020-09-29 11:47:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailuserukmukk`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ket_aula`
--

CREATE TABLE `tb_ket_aula` (
  `warna_id` varchar(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ket_aula`
--

INSERT INTO `tb_ket_aula` (`warna_id`, `keterangan`) VALUES
('blue', 'Aula B'),
('purple', 'Aula A');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan_ukmukk`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewaaula`
--

CREATE TABLE `tb_sewaaula` (
  `id_sewa` int(11) NOT NULL,
  `penyewa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Keterangan` varchar(255) CHARACTER SET latin1 NOT NULL,
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
-- Struktur dari tabel `tb_statussewa`
--

CREATE TABLE `tb_statussewa` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_statussewa`
--

INSERT INTO `tb_statussewa` (`id_status`, `keterangan`) VALUES
(0, 'tidak akti'),
(1, 'aktif sewa');

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
-- Struktur dari tabel `ukm_ukk`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `telp`, `password`, `role`, `kode_himp`, `is_active`, `statususer`, `statussewa`, `update_date`, `insert_date`) VALUES
(17, 'admin aljamiah', 'admin@gmail.com', 'admin1', '', 'e00cf25ad42683b3df678c61f42c6bda', 1, 'Contoh', 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'admin2', 'email@gmail.com', 'admin2', '', 'c84258e9c39059a89ab77d846ddab909', 1, '', 1, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Indeks untuk tabel `anggota_ukmukk`
--
ALTER TABLE `anggota_ukmukk`
  ADD PRIMARY KEY (`u_nim`),
  ADD KEY `parent_ukmukk` (`parent_ukmukk`),
  ADD KEY `parent_ubidang` (`parent_ubidang`);

--
-- Indeks untuk tabel `bidang_ukmukk`
--
ALTER TABLE `bidang_ukmukk`
  ADD PRIMARY KEY (`kode_ubidang`),
  ADD KEY `parent_ukmukk` (`parent_ukmukk`);

--
-- Indeks untuk tabel `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `Parent_himpunan` (`Parent_himpunan`);

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
-- Indeks untuk tabel `kegiatan_ukmukk`
--
ALTER TABLE `kegiatan_ukmukk`
  ADD PRIMARY KEY (`id_ukegiatan`),
  ADD KEY `parent_ukmukk` (`parent_ukmukk`);

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
-- Indeks untuk tabel `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  ADD PRIMARY KEY (`id_dana`),
  ADD KEY `statususer` (`statususer`);

--
-- Indeks untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ket_aula`
--
ALTER TABLE `tb_ket_aula`
  ADD PRIMARY KEY (`warna_id`);

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
-- Indeks untuk tabel `tb_pengajuan_ukmukk`
--
ALTER TABLE `tb_pengajuan_ukmukk`
  ADD PRIMARY KEY (`id_pengajuan_ukmukk`),
  ADD KEY `statususer` (`statususer`);

--
-- Indeks untuk tabel `tb_sewaaula`
--
ALTER TABLE `tb_sewaaula`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `jenisaula` (`jenisaula`),
  ADD KEY `penyewa` (`penyewa`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_statussewa`
--
ALTER TABLE `tb_statussewa`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_sumtotalanggotafak`
--
ALTER TABLE `tb_sumtotalanggotafak`
  ADD KEY `kd_fakultas` (`kd_fakultas`);

--
-- Indeks untuk tabel `ukm_ukk`
--
ALTER TABLE `ukm_ukk`
  ADD PRIMARY KEY (`kode_ukmukk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `status` (`statususer`),
  ADD KEY `statussewa` (`statussewa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_ukmukk`
--
ALTER TABLE `kegiatan_ukmukk`
  MODIFY `id_ukegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_detailuser`
--
ALTER TABLE `tb_detailuser`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan_ukmukk`
--
ALTER TABLE `tb_pengajuan_ukmukk`
  MODIFY `id_pengajuan_ukmukk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
-- Ketidakleluasaan untuk tabel `anggota_ukmukk`
--
ALTER TABLE `anggota_ukmukk`
  ADD CONSTRAINT `anggota_ukmukk_ibfk_1` FOREIGN KEY (`parent_ukmukk`) REFERENCES `ukm_ukk` (`kode_ukmukk`),
  ADD CONSTRAINT `anggota_ukmukk_ibfk_2` FOREIGN KEY (`parent_ubidang`) REFERENCES `bidang_ukmukk` (`kode_ubidang`);

--
-- Ketidakleluasaan untuk tabel `bidang_ukmukk`
--
ALTER TABLE `bidang_ukmukk`
  ADD CONSTRAINT `bidang_ukmukk_ibfk_1` FOREIGN KEY (`parent_ukmukk`) REFERENCES `ukm_ukk` (`kode_ukmukk`);

--
-- Ketidakleluasaan untuk tabel `daftar_kegiatan`
--
ALTER TABLE `daftar_kegiatan`
  ADD CONSTRAINT `daftar_kegiatan_ibfk_1` FOREIGN KEY (`Parent_himpunan`) REFERENCES `jurusan` (`kode_himpunan`);

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`parent_fakultas`) REFERENCES `fakultas` (`kode_fakultas`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan_ukmukk`
--
ALTER TABLE `kegiatan_ukmukk`
  ADD CONSTRAINT `kegiatan_ukmukk_ibfk_1` FOREIGN KEY (`parent_ukmukk`) REFERENCES `ukm_ukk` (`kode_ukmukk`);

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
-- Ketidakleluasaan untuk tabel `tb_detailuserukmukk`
--
ALTER TABLE `tb_detailuserukmukk`
  ADD CONSTRAINT `status_user_relationship` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `status1` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan_ukmukk`
--
ALTER TABLE `tb_pengajuan_ukmukk`
  ADD CONSTRAINT `status12` FOREIGN KEY (`statususer`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
