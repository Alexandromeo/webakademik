-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 08:55 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `11732`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `induk` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`induk`, `password`, `level`) VALUES
(1, 'guru', 'guru'),
(3, 'guru', 'guru'),
(205, 'Teacher', 'guru'),
(2000, 'murid', 'siswa'),
(11732, 'Alexandromeo', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `dataguru`
--

CREATE TABLE `dataguru` (
  `nip` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` varchar(50) NOT NULL,
  `bulanlahir` varchar(50) NOT NULL,
  `tahunlahir` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datasiswa`
--

CREATE TABLE `datasiswa` (
  `nis` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` varchar(50) NOT NULL,
  `bulanlahir` varchar(50) NOT NULL,
  `tahunlahir` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datasiswa`
--

INSERT INTO `datasiswa` (`nis`, `nama`, `alamat`, `tempatlahir`, `tanggallahir`, `bulanlahir`, `tahunlahir`, `jurusan`, `kelas`, `jk`, `foto`) VALUES
(1000, 'Pragya', 'rumah', 'tempat', '17', 'April', '1999', 'MM', 'XI', 'P', 'coba.jpg'),
(11732, 'Alexandromeo', 'Maduqoro', 'Magelang', '6', 'Februari', '2000', 'RPL', 'XI', 'L', 'makinrajin.png');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nis` int(99) NOT NULL,
  `uh1` double NOT NULL,
  `uh2` double NOT NULL,
  `uh3` double NOT NULL,
  `uts` double NOT NULL,
  `ukk` double NOT NULL,
  `id` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nis`, `uh1`, `uh2`, `uh3`, `uts`, `ukk`, `id`) VALUES
(1000, 91, 92, 93, 94, 95, '1000a'),
(1000, 85, 86, 87, 88, 89, '1000b'),
(11732, 100, 100, 100, 100, 100, '11732b'),
(11732, 100, 100, 100, 100, 100, '11732e'),
(999, 99, 99, 99, 98, 98, '999a');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id` varchar(99) NOT NULL,
  `mapel` varchar(99) NOT NULL,
  `nis` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `mapel`, `nis`) VALUES
('1000a', 'Database', 1000),
('1000b', 'Pemrograman Objek', 1000),
('11732b', 'Pemrograman Objek', 11732),
('11732e', 'Pemrograman Web', 11732),
('999a', 'Database', 999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`induk`),
  ADD KEY `induk` (`induk`);

--
-- Indexes for table `dataguru`
--
ALTER TABLE `dataguru`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `mapel` (`mapel`);

--
-- Indexes for table `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
