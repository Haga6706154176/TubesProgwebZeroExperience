-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 02:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_easset`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` text,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `user`, `password`, `status`) VALUES
(3, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator'),
(5, 'haga', '0198b13dbee779789d2e5993582cca11', 'Mahasiswa'),
(10, 'Izam', 'a0e6983146b63c23a662059b7032fffc', 'Petugas'),
(11, 'Bram', '4562c1b6efc284d93860f678a5b4950b', 'Administrator'),
(13, 'Sego', '73b180aafc233cfe97be8619518ba876', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nis`, `nama`, `jk`, `ttl`, `kelas`, `image`) VALUES
('12345', 'Haga', 'L', '2010-02-02', 'D3IF3904', 'haga.JPG'),
('670615466', 'Slayer', 'L', '1997-06-12', 'D3IF3903', 'IMG_1019.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `kode_asset` varchar(5) NOT NULL,
  `nama_asset` varchar(100) DEFAULT NULL,
  `pejab` varchar(50) DEFAULT NULL,
  `klasifikasi` varchar(25) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`kode_asset`, `nama_asset`, `pejab`, `klasifikasi`, `image`) VALUES
('1', 'Mana', 'Mene', '<p>wdawwwdc</p>', ''),
('2', 'Aw', 'Talal', '<p>sdwdwad</p>', '41368e61-3b20-4ec8-ae0b-4d7fa9adcca4.png'),
('4', 'nmht', 'htrerfew', '<p>bbvcbxc</p>', 'afe5fe520c34a5220ef02dd9d36e2f1e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `denda` varchar(2) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_transaksi`, `tgl_pengembalian`, `denda`, `nominal`, `id_petugas`) VALUES
('20170422001', '2017-04-22', '', 0, NULL),
('20170422001', '2017-04-22', '', 0, NULL),
('20170430001', '2017-04-30', '', 0, NULL),
('20170430001', '2017-04-30', '', 0, NULL),
('20170430002', '2017-04-30', '', 0, NULL),
('20170430002', '2017-04-30', '', 0, NULL),
('20170430004', '2017-04-30', '', 0, NULL),
('20170430004', '2017-04-30', '', 0, NULL),
('20170422002', '2017-04-30', '', 0, NULL),
('20170422002', '2017-04-30', '', 0, NULL),
('20170423001', '2017-04-30', '', 0, NULL),
('20170423001', '2017-04-30', '', 0, NULL),
('20170430003', '2017-04-30', '', 0, NULL),
('20170430003', '2017-04-30', '', 0, NULL),
('20170430005', '2017-04-30', '', 0, NULL),
('20170430005', '2017-04-30', '', 0, NULL),
('20170430007', '2017-04-30', '', 0, NULL),
('20170430007', '2017-04-30', '', 0, NULL),
('20170430006', '2017-04-30', '', 0, NULL),
('20170430006', '2017-04-30', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_asset` varchar(5) NOT NULL,
  `nama_asset` varchar(100) NOT NULL,
  `pejab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tmp`
--

INSERT INTO `tmp` (`kode_asset`, `nama_asset`, `pejab`) VALUES
('4', 'nmht', 'htrerfew');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `kode_asset` varchar(5) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nis`, `kode_asset`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_petugas`) VALUES
('20170422001', '12345', '1', '2017-04-22', '2017-04-29', 'Y', NULL),
('20170422002', '12345', '1', '2017-04-22', '2017-04-29', 'Y', NULL),
('20170423001', '12345', '1', '2017-04-23', '2017-04-30', 'Y', NULL),
('20170430001', '670615466', 'wdwd', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430002', '670615466', '2', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430003', '12345', '2', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430003', '12345', 'wdwd', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430004', '670615466', '2', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430005', '12345', '2', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430006', '12345', '2', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430007', '670615466', '2', '2017-04-30', '2017-05-07', 'Y', NULL),
('20170430008', '12345', '4', '2017-04-30', '2017-05-07', 'N', NULL),
('20170430009', '12345', '4', '2017-04-30', '2017-05-07', 'N', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`kode_asset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
