-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 06:43 AM
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
(4, 'Acara Dosen', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
-- Table structure for table `log_jenis_barang`
--

CREATE TABLE `log_jenis_barang` (
  `id_logJenisBarang` int(11) NOT NULL,
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
  `user_add` varchar(40) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(40) NOT NULL,
  `waktu_Delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_peminjaman`
--

CREATE TABLE `log_peminjaman` (
  `id_logPeminjaman` int(11) NOT NULL,
  `id_peminjaman` varchar(40) NOT NULL COMMENT 'PJ-0',
  `tanggal_peminjaman` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `id_pengguna` varchar(40) NOT NULL,
  `acara` varchar(70) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `id_kategoriAcara` int(11) NOT NULL,
  `status_peminjaman` int(11) NOT NULL COMMENT '0:TUNGGU APPROVE, 1:APPROVED, 2:SEDANG DIPINJAM, 3:SELESAI, 4:TIDAK APPROVE',
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

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_peminjaman`, `id_ruangan`, `waktu_mulai`, `waktu_selesai`, `id_pengguna`, `acara`, `jumlah_peserta`, `id_kategoriAcara`, `deskripsi_acara`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PJ-1', '2019-03-28', 'R-1', '09:15:00', '11:15:00', '1', 'Charity', 30, 3, '', 'USER-1', '2019-03-26 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PJ-2', '2019-03-28', 'R-1', '13:15:00', '15:15:00', '1', 'HMTIF Gathering', 50, 3, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('USER-1', 'wivinadaicy@yahoo.com', '202cb962ac59075b964b07152d234b70', 'Wivina Daicy', 'p', '1999-10-23', 'Jalan qwerty ajsdajsd jasdj asd', '12345678', '2018-12-20', 1, 2, '', '0000-00-00 00:00:00', 'USER-1', '2019-03-29 20:33:44', '0', '0000-00-00 00:00:00', 0),
('USER-2', 'qweqwe@qwe.com', '25d55ad283aa400af464c76d713c07ad', 'qweqwe', 'p', '2019-03-21', 'qweqweqweqweqwe', '123456789', '2019-03-24', 3, 2, '0', '2019-03-24 19:11:52', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('USER-3', 'dfddgfg@gcfcfg.gg', '202cb962ac59075b964b07152d234b70', '5656a', 'p', '2019-03-07', '65', '565', '2019-03-27', 4, 2, '0', '2019-03-27 14:18:16', 'USER-1', '2019-03-29 07:15:26', '', '0000-00-00 00:00:00', 1),
('USER-4', 'wivinadaicy@yahoo.comsa', '202cb962ac59075b964b07152d234b70', 'wovo', 'p', '2019-03-01', '123123123', '1231231231', '2019-03-28', 1, 2, 'USER-1', '2019-03-28 22:31:50', '', '2019-03-29 07:55:03', '0', '0000-00-00 00:00:00', 0),
('USER-5', 'wivinah@gmail.com', 'b26986ceee60f744534aaab928cc12df', 'wivinah', 'p', '2019-03-14', 'qweqwe', '01010101', '2019-03-29', 2, 2, 'USER-1', '2019-03-29 07:09:59', '', '2019-03-29 07:55:01', '0', '0000-00-00 00:00:00', 0),
('USER-6', '243@w.r', '202cb962ac59075b964b07152d234b70', '234', 'p', '2019-03-22', '123', '123123', '2019-03-29', 1, 2, 'USER-1', '2019-03-29 07:20:33', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(40) NOT NULL COMMENT 'PS-0',
  `id_penggunaKirimPesan` varchar(40) NOT NULL,
  `topik_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_detail`
--

CREATE TABLE `pesan_detail` (
  `id_pesanDetail` varchar(40) NOT NULL COMMENT 'PD-0',
  `id_pesan` int(11) NOT NULL,
  `id_penggunaKe` varchar(40) NOT NULL,
  `id_penggunaDari` varchar(40) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `pesan` text NOT NULL,
  `status_pesan` int(11) NOT NULL COMMENT '0: TERKIRIM, 1: READ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `jenis_ruangan` int(11) NOT NULL COMMENT '1:LABORATORIUM, 2: MEETING ROOM',
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
('R-1', 'Lab Satu', 1, 'F2', 50, 'asdf', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-2', 'Lab Dua', 1, 'F2', 60, 'qwer', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-3', 'Lab Tiga', 1, 'F2', 30, 'apoi', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('R-4', 'Meeting Room 1', 2, 'B3', 3, 'zxcv', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
-- Indexes for table `log_jenis_barang`
--
ALTER TABLE `log_jenis_barang`
  ADD PRIMARY KEY (`id_logJenisBarang`);

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
