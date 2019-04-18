-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 01:34 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistech2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(40) NOT NULL COMMENT 'BR-0',
  `id_ruangan` varchar(40) NOT NULL,
  `id_jenisBarang` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `merek` text NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_ruangan`, `id_jenisBarang`, `nama_barang`, `merek`, `stok_barang`, `tanggal_beli`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('BR-1', 'R-1', 2, 'Keyboard', 'Asus', 20, '2019-04-23', 'USER-1', '2019-04-14 22:42:40', '0', '0000-00-00 00:00:00', 'USER-1', '2019-04-14 22:53:00', 1),
('BR-2', 'R-2', 2, 'Monitor', 'Acer', 20, '2019-04-17', 'USER-1', '2019-04-16 20:13:33', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('BR-3', 'R-2', 1, 'Photoshop CC 2017', 'Adobe', 50, '2019-04-16', 'USER-1', '2019-04-16 20:14:51', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('BR-4', 'R-2', 1, 'Premiere CC 2019', 'Adobe', 20, '2019-04-24', 'USER-1', '2019-04-16 20:15:26', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('BR-5', 'R-2', 1, 'Illustrator CC 2018', 'Adobe', 30, '2019-04-24', 'USER-1', '2019-04-16 20:15:59', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('BR-6', 'R-1', 1, 'Netbeans', 'Netbeans', 40, '2019-04-16', 'USER-1', '2019-04-16 20:17:10', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('BR-7', 'R-3', 2, 'Mouse', 'Logitech', 20, '2019-04-18', 'USER-1', '2019-04-18 18:27:35', 'USER-1', '2019-04-18 18:27:52', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `waktu_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` varchar(40) NOT NULL COMMENT 'FK-0',
  `nama_fakultas` varchar(60) NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenisBarang` int(11) NOT NULL,
  `nama_jenisBarang` varchar(60) NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenisBarang`, `nama_jenisBarang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Software', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Hardware', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Lain - Lain', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_acara`
--

CREATE TABLE `kategori_acara` (
  `id_kategoriAcara` int(11) NOT NULL,
  `jenis_acara` varchar(60) NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_acara`
--

INSERT INTO `kategori_acara` (`id_kategoriAcara`, `jenis_acara`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Kelas', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Kelas Pengganti', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Himpunan Mahasiswa', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Acara Dosen', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Lain-lain', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_barang`
--

CREATE TABLE `log_barang` (
  `id_logBarang` int(11) NOT NULL,
  `id_barang` varchar(40) NOT NULL,
  `id_ruangan` varchar(40) NOT NULL,
  `id_jenisBarang` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `merek` text NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_barang`
--

INSERT INTO `log_barang` (`id_logBarang`, `id_barang`, `id_ruangan`, `id_jenisBarang`, `nama_barang`, `merek`, `stok_barang`, `tanggal_beli`, `user_edit`, `waktu_edit`) VALUES
(1, 'BR-1', 'R-1', 2, 'Keyboard', 'Asus', 20, '2019-04-23', 'USER-1', '2019-04-14 22:53:00'),
(2, 'BR-7', 'R-3', 2, 'Mouse', 'Logitech', 20, '2019-04-18', 'USER-1', '2019-04-18 18:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `log_fakultas`
--

CREATE TABLE `log_fakultas` (
  `id_logFakultas` int(11) NOT NULL,
  `id_fakultas` varchar(40) NOT NULL,
  `nama_fakultas` varchar(60) NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_kategori_acara`
--

CREATE TABLE `log_kategori_acara` (
  `id_logKategoriAcara` int(11) NOT NULL,
  `id_kategoriAcara` int(11) NOT NULL,
  `jenis_acara` varchar(60) NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_mahasiswa`
--

CREATE TABLE `log_mahasiswa` (
  `id_logMahasiswa` int(11) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `id_pengguna` varchar(40) NOT NULL,
  `id_programStudi` varchar(40) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `total_sks` int(11) NOT NULL,
  `ipk_terakhir` float NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_mahasiswa`
--

INSERT INTO `log_mahasiswa` (`id_logMahasiswa`, `id_mahasiswa`, `id_pengguna`, `id_programStudi`, `angkatan`, `semester`, `total_sks`, `ipk_terakhir`, `user_edit`, `waktu_edit`) VALUES
(1, '00000020271', 'USER-4', 'PS-1', 2010, 8, 18, 3.75, 'USER-1', '2019-04-13 22:11:44'),
(2, '00000020271', 'USER-4', 'PS-1', 2016, 8, 18, 3.75, 'USER-1', '2019-04-13 22:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `log_peminjaman`
--

CREATE TABLE `log_peminjaman` (
  `id_logPeminjaman` int(11) NOT NULL,
  `id_peminjaman` varchar(40) NOT NULL COMMENT 'PJ-0',
  `tanggal_peminjaman` date NOT NULL,
  `id_ruangan` varchar(40) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `id_pengguna` varchar(40) NOT NULL,
  `acara` varchar(70) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `id_kategoriAcara` int(11) NOT NULL,
  `deskripsi_acara` text NOT NULL,
  `status_peminjaman` int(11) NOT NULL COMMENT '0:TUNGGU APPROVE, 1:APPROVED, 2:SEDANG DIPINJAM, 3:SELESAI, 4:TIDAK APPROVE 5:DIBATALKAN 6:TIMEOUT',
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_peminjaman`
--

INSERT INTO `log_peminjaman` (`id_logPeminjaman`, `id_peminjaman`, `tanggal_peminjaman`, `id_ruangan`, `waktu_mulai`, `waktu_selesai`, `id_pengguna`, `acara`, `jumlah_peserta`, `id_kategoriAcara`, `deskripsi_acara`, `status_peminjaman`, `user_edit`, `waktu_edit`) VALUES
(1, 'PJ-1', '2019-04-30', 'R-1', '09:15:00', '10:15:00', 'USER-2', 'Charity', 50, 3, 'Mengundang guru dari SMK Dasana Indah', 0, 'USER-2', '2019-04-17 15:19:05'),
(2, 'PJ-2', '2019-04-30', 'R-1', '07:15:00', '10:15:00', 'USER-2', 'Struktur Data', 30, 1, 'Kelas oleh ci Calandra', 0, 'USER-2', '2019-04-17 15:23:18'),
(3, 'PJ-3', '2019-04-24', 'R-4', '10:15:00', '11:15:00', 'USER-2', 'Hari Guru', 50, 3, 'Memperingati hari guru SISTech', 0, 'USER-2', '2019-04-17 15:24:42'),
(4, 'PJ-3', '2019-04-24', 'R-4', '10:15:00', '11:15:00', 'USER-2', 'Hari Guru', 50, 3, 'Memperingati hari guru SISTech', 1, 'USER-1', '2019-04-17 15:34:00'),
(5, 'PJ-2', '2019-04-30', 'R-1', '07:15:00', '10:15:00', 'USER-2', 'Struktur Data', 30, 1, 'Kelas oleh ci Calandra', 1, 'USER-1', '2019-04-17 16:23:30'),
(6, 'PJ-1', '2019-04-30', 'R-1', '09:15:00', '10:15:00', 'USER-2', 'Charity', 50, 3, 'Mengundang guru dari SMK Dasana Indah', 4, 'USER-1', '2019-04-17 16:23:42'),
(7, 'PJ-2', '2019-04-30', 'R-1', '07:15:00', '10:15:00', 'USER-2', 'Struktur Data', 30, 1, 'Kelas oleh ci Calandra', 3, 'USER-1', '2019-04-17 16:32:29'),
(8, 'PJ-4', '2019-04-30', 'R-1', '10:15:00', '11:15:00', 'USER-2', 'Syukuran', 30, 4, 'Syukuran per tahun', 0, 'USER-2', '2019-04-17 16:35:08'),
(9, 'PJ-4', '2019-04-30', 'R-1', '10:15:00', '11:15:00', 'USER-2', 'Syukuran', 30, 4, 'Syukuran per tahun', 1, 'USER-1', '2019-04-17 16:38:32'),
(10, 'PJ-5', '2019-05-29', 'R-6', '08:15:00', '09:15:00', 'USER-3', 'Skripsi', 40, 4, 'Bimbingan dengan pak hihi', 0, 'USER-3', '2019-04-17 18:09:37'),
(11, 'PJ-6', '2019-04-30', 'R-3', '09:15:00', '10:15:00', 'USER-3', 'Pelatihan A', 50, 5, 'Pelatihan untuk asdasd', 0, 'USER-3', '2019-04-17 18:16:52'),
(12, 'PJ-7', '2019-04-18', 'R-2', '07:15:00', '08:15:00', 'USER-3', 'ERP KP', 30, 2, 'Kelas pengganti pak Riswan', 0, 'USER-3', '2019-04-17 21:00:31'),
(13, 'PJ-7', '2019-04-18', 'R-2', '07:15:00', '08:15:00', 'USER-3', 'ERP KP', 30, 2, 'Kelas pengganti pak Riswan', 6, 'USER-1', '2019-04-18 10:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `log_pengguna`
--

CREATE TABLE `log_pengguna` (
  `id_logPengguna` int(11) NOT NULL,
  `id_pengguna` varchar(40) NOT NULL COMMENT 'USER-0',
  `email` varchar(50) NOT NULL,
  `kata_sandi` text NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status_pengguna` int(11) NOT NULL COMMENT '1: SUPER ADMIN, 2: ADMIN, 3: MEMBER DOSEN, 4:MEMBER MAHASISWA',
  `status_daftar` int(11) NOT NULL COMMENT '0 =TIDAK AKTIF, 1=MENUNGGU APPROVE, 2=AKTIF',
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_pengguna`
--

INSERT INTO `log_pengguna` (`id_logPengguna`, `id_pengguna`, `email`, `kata_sandi`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_hp`, `tanggal_masuk`, `status_pengguna`, `status_daftar`, `user_edit`, `waktu_edit`) VALUES
(1, 'USER-1', 'wivinadaicy@yahoo.com', '25d55ad283aa400af464c76d713c07ad', 'Wivina Admin', 'p', '1999-10-23', 'Jalan newton no 16', '082153967707', '2019-04-13', 3, 1, '0', '2019-04-13 17:57:31'),
(2, 'USER-2', 'wivinadaicy.wd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Wivina Gmail Student', 'p', '2019-04-04', 'Jalan Nanana no 17', '08261536475', '2019-04-13', 4, 1, '0', '2019-04-13 18:03:58'),
(3, 'USER-2', 'wivinadaicy.wd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Wivina Gmail Student', 'p', '2019-04-04', 'Jalan Nanana no 17', '08261536475', '2019-04-13', 4, 2, 'USER-1', '2019-04-13 18:05:24'),
(4, 'USER-3', 'verenvalenciaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 3, 1, '0', '2019-04-13 19:02:46'),
(5, 'USER-3', 'verenvalenciaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 3, 2, 'USER-1', '2019-04-13 19:03:11'),
(6, 'USER-4', 'joshuanatan.jn@gmail.com', '74be16979710d4c4e7c6647856088456', 'Joshua Mahasiswaa', 'p', '1998-03-13', 'Jalan Kembang Molek IX...', '082153746575', '2019-04-13', 4, 2, 'USER-1', '2019-04-13 22:18:29'),
(7, 'USER-3', 'verenvalenciaa@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 2, 2, 'USER-1', '2019-04-14 15:59:36'),
(8, 'USER-3', 'verenvalenciaa@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 2, 2, 'USER-1', '2019-04-14 16:03:59'),
(9, 'USER-3', 'verenvalenciaa@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 2, 2, 'USER-1', '2019-04-14 16:06:50'),
(10, 'USER-3', 'verenvalenciaa@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 2, 2, 'USER-1', '2019-04-14 16:07:11'),
(11, 'USER-3', 'verenvalenciaa@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 1, 2, 'USER-1', '2019-04-14 16:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `log_program_studi`
--

CREATE TABLE `log_program_studi` (
  `log_programStudi` int(11) NOT NULL,
  `id_programStudi` varchar(40) NOT NULL,
  `nama_programStudi` varchar(60) NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_ruangan`
--

CREATE TABLE `log_ruangan` (
  `id_logRuangan` int(11) NOT NULL,
  `id_ruangan` varchar(40) NOT NULL,
  `nama_ruangan` varchar(60) NOT NULL,
  `jenis_ruangan` int(11) NOT NULL,
  `gedung_lantai` int(20) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` varchar(20) NOT NULL COMMENT 'NIM',
  `id_pengguna` varchar(40) NOT NULL,
  `id_programStudi` varchar(40) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `total_sks` int(11) NOT NULL,
  `ipk_terakhir` float NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_Delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_pengguna`, `id_programStudi`, `angkatan`, `semester`, `total_sks`, `ipk_terakhir`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_Delete`, `status_delete`) VALUES
('00000020271', 'USER-4', 'PS-1', 2016, 8, 18, 3.75, 'USER-1', '2019-04-13 21:18:18', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('01081170002', 'USER-2', 'PS-1', 2017, 5, 18, 3.74, '0', '2019-04-13 01:00:00', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('01081170007', 'USER-3', 'PS-2', 2017, 5, 16, 3.33, 'USER-1', '2019-04-14 17:06:52', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(40) NOT NULL COMMENT 'PJ-0',
  `tanggal_peminjaman` date NOT NULL,
  `id_ruangan` varchar(40) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `id_pengguna` varchar(40) NOT NULL,
  `acara` varchar(70) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `id_kategoriAcara` int(11) NOT NULL,
  `deskripsi_acara` text NOT NULL,
  `status_peminjaman` int(11) NOT NULL COMMENT '0:TUNGGU APPROVE, 1:APPROVED, 2:SEDANG DIPINJAM, 3:SELESAI, 4:TIDAK APPROVE 5:DIBATALKAN 6:TIMEOUT',
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_peminjaman`, `id_ruangan`, `waktu_mulai`, `waktu_selesai`, `id_pengguna`, `acara`, `jumlah_peserta`, `id_kategoriAcara`, `deskripsi_acara`, `status_peminjaman`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PJ-1', '2019-04-30', 'R-1', '09:15:00', '10:15:00', 'USER-2', 'Charity', 50, 3, 'Mengundang guru dari SMK Dasana Indah', 4, 'USER-2', '2019-04-17 15:19:05', 'USER-1', '2019-04-17 16:23:42', '0', '0000-00-00 00:00:00', 0),
('PJ-2', '2019-04-30', 'R-1', '07:15:00', '10:15:00', 'USER-2', 'Struktur Data', 30, 1, 'Kelas oleh ci Calandra', 3, 'USER-2', '2019-04-17 15:23:18', 'USER-1', '2019-04-17 16:32:29', '0', '0000-00-00 00:00:00', 0),
('PJ-3', '2019-04-24', 'R-4', '10:15:00', '11:15:00', 'USER-2', 'Hari Guru', 50, 3, 'Memperingati hari guru SISTech', 1, 'USER-2', '2019-04-17 15:24:42', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-4', '2019-04-30', 'R-1', '10:15:00', '11:15:00', 'USER-2', 'Syukuran', 30, 4, 'Syukuran per tahun', 1, 'USER-2', '2019-04-17 16:35:08', 'USER-1', '2019-04-17 16:38:32', '0', '0000-00-00 00:00:00', 0),
('PJ-5', '2019-05-29', 'R-6', '08:15:00', '09:15:00', 'USER-3', 'Skripsi', 40, 4, 'Bimbingan dengan pak hihi', 0, 'USER-3', '2019-04-17 18:09:37', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-6', '2019-04-30', 'R-3', '09:15:00', '10:15:00', 'USER-3', 'Pelatihan A', 50, 5, 'Pelatihan untuk asdasd', 1, 'USER-3', '2019-04-17 18:16:52', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-7', '2019-04-18', 'R-2', '07:15:00', '08:15:00', 'USER-3', 'ERP KP', 30, 2, 'Kelas pengganti pak Riswan', 6, 'USER-3', '2019-04-17 21:00:31', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(40) NOT NULL COMMENT 'USER-0',
  `email` varchar(50) NOT NULL,
  `kata_sandi` text NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status_pengguna` int(11) NOT NULL COMMENT '1: SUPER ADMIN, 2: ADMIN, 3: MEMBER DOSEN, 4:MEMBER MAHASISWA',
  `status_daftar` int(11) NOT NULL COMMENT '0 =TIDAK AKTIF, 1=MENUNGGU APPROVE, 2=AKTIF',
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `email`, `kata_sandi`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_hp`, `tanggal_masuk`, `status_pengguna`, `status_daftar`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('USER-1', 'wivinadaicy@yahoo.com', '202cb962ac59075b964b07152d234b70', 'Wivina Admin', 'p', '1999-10-23', 'Jalan newton no 16', '082153967707', '2019-04-13', 1, 2, '0', '2019-04-13 17:56:26', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('USER-2', 'wivinadaicy.wd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Wivina Gmail Student', 'p', '2019-04-04', 'Jalan Nanana no 17', '08261536475', '2019-04-13', 4, 2, '0', '2019-04-13 18:01:18', 'USER-1', '2019-04-13 18:05:24', '0', '0000-00-00 00:00:00', 0),
('USER-3', 'verenvalenciaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Veren Admin2', 'p', '1999-06-17', 'Jalan M.H Thamrin', '082153746585', '2019-04-13', 2, 2, '0', '2019-04-13 19:01:44', 'USER-1', '2019-04-14 17:06:52', '0', '0000-00-00 00:00:00', 0),
('USER-4', 'joshuanatan.jn@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Joshua Mahasiswaa', 'p', '1998-03-13', 'Jalan Kembang Molek IX...', '082153746575', '2019-04-13', 4, 2, 'USER-1', '2019-04-13 21:18:18', 'USER-1', '2019-04-13 22:18:29', 'USER-1', '2019-04-13 22:36:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(40) NOT NULL COMMENT 'PS-0',
  `id_penggunaKirimPesan` varchar(40) NOT NULL,
  `topik_pesan` varchar(80) NOT NULL,
  `id_peminjaman` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_penggunaKirimPesan`, `topik_pesan`, `id_peminjaman`) VALUES
('PS-1', 'USER-1', 'Peminjaman: <b>PJ-3</b> - Acara: <b>Hari Guru</b>', 'PJ-3'),
('PS-2', 'USER-1', 'Peminjaman: <b>PJ-2</b> - Acara: <b>Struktur Data</b>', 'PJ-2'),
('PS-3', 'USER-1', 'Peminjaman: <b>PJ-2</b> - Acara: <b>Struktur Data</b>', 'PJ-1'),
('PS-4', 'USER-1', 'Peminjaman: <b>PJ-4</b> - Acara: <b>Syukuran</b>', 'PJ-4');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_detail`
--

CREATE TABLE `pesan_detail` (
  `id_pesanDetail` varchar(40) NOT NULL COMMENT 'PD-0',
  `id_pesan` varchar(40) NOT NULL,
  `id_penggunaKe` varchar(40) NOT NULL,
  `id_penggunaDari` varchar(40) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `pesan` text NOT NULL,
  `status_pesan` int(11) NOT NULL COMMENT '0: TERKIRIM, 1: READ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_detail`
--

INSERT INTO `pesan_detail` (`id_pesanDetail`, `id_pesan`, `id_penggunaKe`, `id_penggunaDari`, `tanggal_waktu`, `pesan`, `status_pesan`) VALUES
('PD-1', 'PS-1', 'USER-2', 'USER-1', '2019-04-17 15:34:00', 'Selamat peminjaman dengan kode PJ-3 untuk acara Hari Guru sudah diterima. Gunakan fitur chatting ini untuk menghubungi pengurus ruangan!', 0),
('PD-2', 'PS-2', 'USER-2', 'USER-1', '2019-04-17 16:23:30', 'Selamat peminjaman dengan kode PJ-2 untuk acara Struktur Data sudah diterima. Gunakan fitur chatting ini untuk menghubungi pengurus ruangan!', 0),
('PD-3', 'PS-3', 'USER-2', 'USER-1', '2019-04-17 16:23:42', 'Maaf peminjaman dengan kode PJ-1 dan nama acara Charity ditolak. Dengan alasan: karena waiting list', 0),
('PD-4', 'PS-2', 'USER-2', 'USER-1', '2019-04-17 16:32:29', 'Peminjaman Anda telah selesai. Terima kasih telah menggunakan Click&Rent SISTech untuk memesan ruangan!', 0),
('PD-5', 'PS-4', 'USER-2', 'USER-1', '2019-04-17 16:38:32', 'Selamat peminjaman dengan kode PJ-4 untuk acara Syukuran sudah diterima. Gunakan fitur chatting ini untuk menghubungi pengurus ruangan!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_programStudi` varchar(40) NOT NULL COMMENT 'PS-',
  `nama_programStudi` varchar(60) NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_programStudi`, `nama_programStudi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PS-1', 'Sistem Informasi', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PS-2', 'Teknik Informatika', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PS-3', 'Sistem Komputer', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` varchar(40) NOT NULL COMMENT 'R-0',
  `nama_ruangan` varchar(60) NOT NULL,
  `jenis_ruangan` int(11) NOT NULL COMMENT '1:LABORATORY, 2: MEETING ROOM',
  `gedung_lantai` varchar(20) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `jenis_ruangan`, `gedung_lantai`, `kapasitas`, `deskripsi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('R-1', 'Lab F 208', 1, 'F2', 50, 'asdf', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-2', 'Lab F 210', 1, 'F2', 60, 'qwer', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-3', 'Lab F 211', 1, 'F2', 30, 'apoi', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-4', 'Meeting Room 1', 2, 'B3', 3, 'zxcv', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-5', 'Meeting Room 2', 2, 'B3', 3, 'zxcv', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-6', 'Meeting Room 3', 2, 'B3', 3, 'zxcv', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `waktu_jadwal`
--

CREATE TABLE `waktu_jadwal` (
  `id_waktuJadwal` int(11) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_jadwal`
--

INSERT INTO `waktu_jadwal` (`id_waktuJadwal`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, '07:15:00', '08:15:00'),
(2, '07:15:00', '09:15:00'),
(3, '07:15:00', '10:15:00'),
(4, '07:15:00', '11:15:00'),
(5, '07:15:00', '12:15:00'),
(6, '07:15:00', '13:15:00'),
(7, '07:15:00', '14:15:00'),
(8, '07:15:00', '15:15:00'),
(9, '07:15:00', '16:15:00'),
(10, '07:15:00', '17:15:00'),
(11, '07:15:00', '18:15:00'),
(12, '08:15:00', '09:15:00'),
(13, '08:15:00', '10:15:00'),
(14, '08:15:00', '11:15:00'),
(15, '08:15:00', '12:15:00'),
(16, '08:15:00', '13:15:00'),
(17, '08:15:00', '14:15:00'),
(18, '08:15:00', '15:15:00'),
(19, '08:15:00', '16:15:00'),
(20, '08:15:00', '17:15:00'),
(21, '08:15:00', '18:15:00'),
(22, '09:15:00', '10:15:00'),
(23, '09:15:00', '11:15:00'),
(24, '09:15:00', '12:15:00'),
(25, '09:15:00', '13:15:00'),
(26, '09:15:00', '14:15:00'),
(27, '09:15:00', '15:15:00'),
(28, '09:15:00', '16:15:00'),
(29, '09:15:00', '17:15:00'),
(30, '09:15:00', '18:15:00'),
(31, '10:15:00', '11:15:00'),
(32, '10:15:00', '12:15:00'),
(33, '10:15:00', '13:15:00'),
(34, '10:15:00', '14:15:00'),
(35, '10:15:00', '15:15:00'),
(36, '10:15:00', '16:15:00'),
(37, '10:15:00', '17:15:00'),
(38, '10:15:00', '18:15:00'),
(39, '11:15:00', '12:15:00'),
(40, '11:15:00', '13:15:00'),
(41, '11:15:00', '14:15:00'),
(42, '11:15:00', '15:15:00'),
(43, '11:15:00', '16:15:00'),
(44, '11:15:00', '17:15:00'),
(45, '11:15:00', '18:15:00'),
(46, '12:15:00', '13:15:00'),
(47, '12:15:00', '14:15:00'),
(48, '12:15:00', '15:15:00'),
(49, '12:15:00', '16:15:00'),
(50, '12:15:00', '17:15:00'),
(51, '12:15:00', '18:15:00'),
(52, '13:15:00', '14:15:00'),
(53, '13:15:00', '15:15:00'),
(54, '13:15:00', '16:15:00'),
(55, '13:15:00', '17:15:00'),
(56, '13:15:00', '18:15:00'),
(57, '14:15:00', '15:15:00'),
(58, '14:15:00', '16:15:00'),
(59, '14:15:00', '17:15:00'),
(60, '14:15:00', '18:15:00'),
(61, '15:15:00', '16:15:00'),
(62, '15:15:00', '17:15:00'),
(63, '15:15:00', '18:15:00'),
(64, '16:15:00', '17:15:00'),
(65, '16:15:00', '18:15:00'),
(66, '17:15:00', '18:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenisBarang`);

--
-- Indexes for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  ADD PRIMARY KEY (`id_kategoriAcara`);

--
-- Indexes for table `log_barang`
--
ALTER TABLE `log_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `log_fakultas`
--
ALTER TABLE `log_fakultas`
  ADD PRIMARY KEY (`id_logFakultas`);

--
-- Indexes for table `log_kategori_acara`
--
ALTER TABLE `log_kategori_acara`
  ADD PRIMARY KEY (`id_logKategoriAcara`);

--
-- Indexes for table `log_mahasiswa`
--
ALTER TABLE `log_mahasiswa`
  ADD PRIMARY KEY (`id_logMahasiswa`);

--
-- Indexes for table `log_peminjaman`
--
ALTER TABLE `log_peminjaman`
  ADD PRIMARY KEY (`id_logPeminjaman`);

--
-- Indexes for table `log_pengguna`
--
ALTER TABLE `log_pengguna`
  ADD PRIMARY KEY (`id_logPengguna`);

--
-- Indexes for table `log_program_studi`
--
ALTER TABLE `log_program_studi`
  ADD PRIMARY KEY (`log_programStudi`);

--
-- Indexes for table `log_ruangan`
--
ALTER TABLE `log_ruangan`
  ADD PRIMARY KEY (`id_logRuangan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `pesan_detail`
--
ALTER TABLE `pesan_detail`
  ADD PRIMARY KEY (`id_pesanDetail`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_programStudi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `waktu_jadwal`
--
ALTER TABLE `waktu_jadwal`
  ADD PRIMARY KEY (`id_waktuJadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
