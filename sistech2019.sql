-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 07:03 PM
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
('BR-1', 'R-1', 2, 'Keyboardaa', 'Logitech', 20, '2019-04-20', 'USER-1', '2019-04-20 17:48:46', 'USER-1', '2019-04-23 23:51:10', 'USER-1', '0000-00-00 00:00:00', 0),
('BR-2', 'R-1', 2, 'Monitor', 'Acer', 20, '2019-04-18', 'USER-1', '2019-04-20 17:49:13', '0', '0000-00-00 00:00:00', 'USER-1', '2019-04-20 21:57:19', 1),
('BR-3', 'R-1', 1, 'Photoshop CC 2017', 'Adobe', 20, '2019-04-20', 'USER-1', '2019-04-20 17:51:15', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('BR-4', 'R-2', 3, 'Kipas', 'Panasonic', 5, '2019-04-20', 'USER-1', '2019-04-20 17:53:07', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('BR-5', 'R-4', 2, 'Proyektor', 'Epson', 1, '2019-03-20', 'USER-1', '2019-04-24 12:44:26', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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
  `waktu_kirim` datetime NOT NULL,
  `status_pesan` int(11) NOT NULL COMMENT '0: BELUM READ; 1:READ; 2:DIBALAS',
  `replied_by` varchar(40) NOT NULL
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

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('FK-1', 'Sistech', 'USER-1', '2019-04-24 09:57:57', '0', '0000-00-00 00:00:00', 'USER-1', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenisBarang` int(11) NOT NULL,
  `nama_jenisBarang` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenisBarang`, `nama_jenisBarang`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'Etc.');

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

-- --------------------------------------------------------

--
-- Table structure for table `log_fakultas`
--

CREATE TABLE `log_fakultas` (
  `id_logFakultas` int(11) NOT NULL,
  `id_fakultas` varchar(40) NOT NULL,
  `nama_fakultas` varchar(60) NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_kategori_acara`
--

CREATE TABLE `log_kategori_acara` (
  `id_logKategoriAcara` int(11) NOT NULL,
  `id_kategoriAcara` int(11) NOT NULL,
  `jenis_acara` varchar(60) NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
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
(1, 'PJ-6', '2019-05-24', 'R-5', '09:15:00', '17:15:00', 'USER-4', 'Meeting Maraton', 50, 4, 'asd asd assd assdas', 1, 'USER-1', '2019-05-01 10:26:05'),
(2, 'PJ-5', '2019-05-24', 'R-5', '07:15:00', '18:15:00', 'USER-4', 'Maraton rapat', 50, 3, '50', 4, 'USER-1', '2019-05-01 10:26:11'),
(3, 'PJ-6', '2019-05-24', 'R-5', '09:15:00', '17:15:00', 'USER-4', 'Meeting Maraton', 50, 4, 'asd asd assd assdas', 5, 'USER-4', '2019-05-01 10:30:10'),
(4, 'PJ-7', '2019-04-30', 'R-5', '09:15:00', '10:15:00', 'USER-4', 'Meeting Sedikit', 50, 4, 'asd wqe wet erteryryt', 1, 'USER-1', '2019-04-29 10:26:05'),
(5, 'PJ-7', '2019-04-30', 'R-5', '09:15:00', '10:15:00', 'USER-4', 'Meeting Sedikit', 50, 4, 'asd wqe wet erteryryt', 3, 'USER-1', '2019-05-01 10:57:12'),
(6, 'PJ-1', '2019-04-29', 'R-3', '09:15:00', '10:15:00', 'USER-1', 'KP SBD', 69, 1, 'gy', 3, 'USER-1', '2019-05-01 11:19:26'),
(7, 'PJ-8', '2019-05-31', 'R-6', '10:15:00', '11:15:00', 'USER-4', 'Belajar Sendiri', 1, 5, 'fgfdggdf', 4, 'USER-1', '2019-05-01 11:28:14');

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
(1, 'USER-2', 'verenvalenciaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Veren Admin', 'p', '2019-04-10', 'Jalan M.H. Thamrin, Karawaci', '09821737464', '2019-04-26', 3, 1, 'USER-2', '2019-04-26 23:00:03'),
(2, 'USER-2', 'verenvalenciaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Veren Admin', 'p', '2019-04-10', 'Jalan M.H. Thamrin, Karawaci', '09821737464', '2019-04-26', 3, 2, 'USER-1', '2019-04-26 23:07:12'),
(3, 'USER-2', 'verenvalenciaa@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'Veren Admin', 'p', '2019-04-10', 'Jalan M.H. Thamrin, Karawaci', '09821737464', '2019-04-26', 2, 2, 'USER-1', '2019-04-26 23:10:46'),
(4, 'USER-3', 'elfkyushfly@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Elf Dosenn', 'p', '2019-05-15', 'Jalan Melati, no 18', '08234356755', '2019-05-01', 3, 1, 'USER-3', '2019-05-01 08:07:14'),
(5, 'USER-3', 'elfkyushfly@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Elf Dosenn', 'p', '2019-05-15', 'Jalan Melati, no 18', '08234356755', '2019-05-01', 3, 2, 'USER-1', '2019-05-01 08:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `log_program_studi`
--

CREATE TABLE `log_program_studi` (
  `id_logProgramStudi` int(11) NOT NULL,
  `id_programStudi` varchar(40) NOT NULL,
  `nama_programStudi` varchar(60) NOT NULL,
  `id_fakultas` varchar(40) NOT NULL,
  `user_edit` varchar(40) NOT NULL,
  `waktu_edit` datetime NOT NULL
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
  `gedung_lantai` varchar(20) NOT NULL,
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
('00000020271', 'USER-4', 'PS-3', 2018, 5, 23, 3, 'USER-1', '2019-05-01 08:17:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('036457', 'USER-5', 'PS-3', 2004, 4, 4, 4, 'USER-1', '2019-05-01 11:41:59', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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
  `status_peminjaman` int(11) NOT NULL COMMENT '0:TUNGGU APPROVE, 1:APPROVED, 3:SELESAI, 4:TIDAK APPROVE 5:DIBATALKAN 6:TIMEOUT',
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
('PJ-1', '2019-04-29', 'R-3', '09:15:00', '10:15:00', 'USER-1', 'KP SBD', 69, 1, 'gy', 3, 'USER-1', '2019-04-27 16:28:47', 'USER-1', '2019-05-01 11:19:26', '0', '0000-00-00 00:00:00', 0),
('PJ-10', '2019-05-25', 'R-2', '09:15:00', '10:15:00', 'USER-5', 'KP IT SEC', 20, 3, 'sdfgsf dfg fghg dghf', 0, 'USER-5', '2019-05-01 11:46:27', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-11', '2019-05-16', 'R-1', '09:15:00', '10:15:00', 'USER-1', 'Kelas po', 10, 1, 'etsfuyr tu tutghgfhhdg', 0, 'USER-1', '2019-05-01 11:48:33', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-12', '2019-05-16', 'R-2', '07:15:00', '18:15:00', 'USER-1', 'Kelas SPS', 50, 1, 'rwgtb dghdfg yteyr', 0, 'USER-1', '2019-05-01 11:59:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-2', '2019-05-02', 'R-1', '08:15:00', '09:15:00', 'USER-1', 'KP Strukdat', 50, 1, 'asfsd esf d sfdfsdf', 1, 'USER-1', '2019-05-01 09:13:20', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-3', '2019-05-24', 'R-4', '15:15:00', '16:15:00', 'USER-1', 'Diskusi Paper', 5, 5, 'bimbingan tugas mata kuliah EIS', 1, 'USER-1', '2019-05-01 09:16:11', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-4', '2019-05-02', 'R-5', '07:15:00', '17:15:00', 'USER-1', 'Hari Guru', 50, 3, 'memperingati hari guru', 1, 'USER-1', '2019-05-01 09:17:39', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-5', '2019-05-24', 'R-5', '07:15:00', '18:15:00', 'USER-4', 'Maraton rapat', 50, 3, 'ffff fff fff ff', 4, 'USER-4', '2019-05-01 10:00:02', 'USER-1', '2019-05-01 10:26:11', '0', '0000-00-00 00:00:00', 0),
('PJ-6', '2019-05-24', 'R-5', '09:15:00', '17:15:00', 'USER-4', 'Meeting Maraton', 50, 4, 'asd asd assd assdas', 5, 'USER-4', '2019-05-01 10:02:25', 'USER-1', '2019-05-01 10:26:05', '0', '0000-00-00 00:00:00', 0),
('PJ-7', '2019-04-30', 'R-5', '09:15:00', '10:15:00', 'USER-4', 'Meeting Sedikit', 50, 4, 'asd wqe wet erteryryt', 3, 'USER-4', '2019-04-28 10:02:25', 'USER-1', '2019-05-01 10:57:12', '0', '0000-00-00 00:00:00', 0),
('PJ-8', '2019-05-31', 'R-6', '10:15:00', '11:15:00', 'USER-4', 'Belajar Sendiri', 1, 5, 'fgfdggdf', 4, 'USER-4', '2019-05-01 11:27:42', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PJ-9', '2019-05-03', 'R-5', '08:15:00', '09:15:00', 'USER-5', 'Makan Makan', 50, 4, 'makan dalam rangka perpisahan dengan pak John Doe', 0, 'USER-5', '2019-05-01 11:44:14', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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
  `status_daftar` int(11) NOT NULL COMMENT '0 =TIDAK AKTIF, 1=MENUNGGU APPROVE, 2=AKTIF, 3=DITOLAK',
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
('USER-2', 'verenvalenciaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Veren Admin', 'p', '2019-04-10', 'Jalan M.H. Thamrin, Karawaci', '09821737464', '2019-04-26', 2, 2, '0', '2019-04-26 22:57:34', 'USER-1', '2019-04-26 23:10:46', '0', '0000-00-00 00:00:00', 0),
('USER-3', 'elfkyushfly@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Elf Dosenn', 'p', '2019-05-15', 'Jalan Melati, no 18', '08234356755', '2019-05-01', 3, 2, '0', '2019-05-01 07:58:24', 'USER-1', '2019-05-01 08:07:59', '0', '0000-00-00 00:00:00', 0),
('USER-4', 'verenv999999@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Veren Mahasiswa', 'p', '2019-05-15', 'jalan asda no 19', '089616961915', '2019-05-01', 4, 2, 'USER-1', '2019-05-01 08:17:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('USER-5', 'wivinatugas@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'John Doe mhs', 'p', '2019-05-23', 'jalan haha, no 47', '1234567890', '2019-05-01', 4, 2, 'USER-1', '2019-05-01 11:41:59', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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
('PS-1', 'USER-1', 'Peminjaman: <b>PJ-6</b> - Acara: <b>Meeting Maraton</b>', 'PJ-6'),
('PS-2', 'USER-1', 'Peminjaman: <b>PJ-5</b> - Acara: <b>Maraton rapat</b>', 'PJ-5'),
('PS-3', 'USER-1', 'Peminjaman: <b>PJ-7</b> - Acara: <b>Meeting Sedikit</b>', 'PJ-7'),
('PS-4', 'USER-1', 'Peminjaman: <b>PJ-8</b> - Acara: <b>Belajar Sendiri</b>', 'PJ-8');

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
('PD-1', 'PS-1', 'USER-4', 'USER-1', '2019-05-01 10:26:05', 'Selamat peminjaman dengan kode PJ-6 untuk acara Meeting Maraton sudah diterima. Gunakan fitur chatting ini untuk menghubungi pengurus ruangan!', 1),
('PD-2', 'PS-2', 'USER-4', 'USER-1', '2019-05-01 10:26:11', 'Maaf peminjaman dengan kode PJ-5 dan nama acara Maraton rapat ditolak. Dengan alasan: karena waiting list', 1),
('PD-3', 'PS-3', 'USER-4', 'USER-1', '2019-05-01 10:57:12', 'Peminjaman Anda telah selesai. Terima kasih telah menggunakan Click&Rent SISTech untuk memesan ruangan!', 1),
('PD-4', 'PS-4', 'USER-4', 'USER-1', '2019-05-01 11:28:14', 'Maaf peminjaman dengan kode PJ-8 ditolak. Dengan alasan: DILARANG MENGGUNAKAN RUANG MEETING UNTUK BELAJAR SENDIRI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_programStudi` varchar(40) NOT NULL COMMENT 'PS-',
  `nama_programStudi` varchar(60) NOT NULL,
  `id_fakultas` varchar(40) NOT NULL,
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

INSERT INTO `program_studi` (`id_programStudi`, `nama_programStudi`, `id_fakultas`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PS-1', 'Sistem Informasi', 'FK-1', 'USER-1', '2019-04-24 09:58:20', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PS-2', 'Teknik Informatika', 'FK-1', 'USER-1', '2019-04-24 09:58:31', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('PS-3', 'Sistem Komputer', 'FK-1', 'USER-1', '2019-04-24 09:58:55', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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
('R-1', 'Lab F208', 1, 'F2', 50, 'Lab untuk angkatan 2018', 'USER-1', '2019-04-20 17:33:27', '0', '0000-00-00 00:00:00', 'USER-1', '0000-00-00 00:00:00', 0),
('R-2', 'Lab F210', 1, 'F2', 60, 'Lab untuk angkatan 2017', 'USER-1', '2019-04-20 17:34:00', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('R-3', 'Lab F211', 1, 'F2', 30, 'Lab untuk angkatan 2016', 'USER-1', '2019-04-20 17:34:33', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('R-4', 'Meeting Room 1', 2, 'B3', 5, 'Meeting room untuk bimbingan skripsi', 'USER-1', '2019-04-20 17:35:22', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('R-5', 'Meeting Room 2', 2, 'B3', 50, 'Meeting room untuk rapat dosen', 'USER-1', '2019-04-20 17:35:46', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('R-6', 'Meeting Room 3', 2, 'B3', 4, 'Meeting room untuk konsultasi project', 'USER-1', '2019-04-20 17:43:54', '0', '0000-00-00 00:00:00', 'USER-1', '0000-00-00 00:00:00', 0);

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
  ADD PRIMARY KEY (`id_logProgramStudi`);

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
