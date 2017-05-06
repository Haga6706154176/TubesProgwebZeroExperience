-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 08:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

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
(5, 'haga', '0198b13dbee779789d2e5993582cca11', 'Mahasiswa'),
(10, 'Izam', 'a0e6983146b63c23a662059b7032fffc', 'Petugas'),
(11, 'Bram', '4562c1b6efc284d93860f678a5b4950b', 'Administrator'),
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

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
('6706150008', 'M. Ikhwan Hamzah', 'L', '1997-04-10', 'D3IF-39-04', 'q_r_2.png'),
('6706154112', 'Bram Andika Ahmad Al''aziz', 'L', '2016-12-06', 'D3IF-39-04', 'photos.jpg'),
('6706154176', 'M. Tri Al Haga', 'L', '1996-07-26', 'D3IF-39-04', 'q_r_2.png');

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
('0001', 'Haga', 'Makan', '<p>dawdwad</p>', ''),
('AL001', 'Aula FIT', 'LAK FIT', '<p>Aula FIT</p>', 'cinema.png'),
('AL002', 'Aula FKB', 'LAK FKB', '<p>Aula FKB</p>', 'city-hall.png'),
('LB001', 'Laboratorium Pride', 'Aslab Komputer FIT', '<p>Laboratorium</p>', 'lab.png'),
('LB002', 'Laboratorium Gear', 'Aslab Komputer FIT', '<p>Laboratorium</p>', 'lab1.png'),
('PK001', 'Keyboard', 'Aslab Komputer FIT', '<p>Perangkat</p>', 'keyboard.png'),
('PK002', 'Monitor', 'Aslab Komputer FIT', '<p>Perangkat</p>', 'imac.png'),
('PK003', 'Kabel UTP', 'Aslab Komputer FIT', '<p>Perangkat</p>', 'ethernet.png'),
('PK004', 'Mouse', 'Aslab Komputer FIT', '<p>Perangkat</p>', 'mouse.png'),
('PK005', 'Access Point', 'Aslab Komputer FIT', '<p>Perangkat</p>', 'wifi.png'),
('PK006', 'Kabel HDMI', 'Aslab Komputer FIT', '<p>Perangkat</p>', 'hdmi.png'),
('RG001', 'Ruang Kelas A4', 'LAK FIT', '<p>Ruangan</p>', 'kelas.png'),
('RG002', 'Ruang Kelas G2', 'LAK FIT', '<p>Ruangan</p>', 'kelas1.png');

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
('20170430006', '2017-04-30', '', 0, NULL),
('20170505001', '2017-05-05', '', 0, NULL),
('20170505001', '2017-05-05', '', 0, NULL);

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
  `id_akun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nis`, `kode_asset`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_akun`) VALUES
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505001', '6706150008', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505002', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505002', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505002', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505002', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505002', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505003', '6706154112', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505004', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505004', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505004', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505005', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505005', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505005', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505006', '6706154112', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505006', '6706154112', 'PK003', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505006', '6706154112', 'PK005', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505006', '6706154112', 'PK004', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505006', '6706154112', 'PK006', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505006', '6706154112', 'PK001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505007', '6706154176', 'PK003', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505007', '6706154176', 'LB001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505007', '6706154176', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505008', '6706154112', 'RG001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505008', '6706154112', 'PK004', '2017-05-05', '2017-05-12', 'N', NULL),
('20170505008', '6706154112', 'LB001', '2017-05-05', '2017-05-12', 'N', NULL),
('20170506001', '6706154112', 'AL001', '2017-05-06', '2017-05-13', 'N', NULL);

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
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
