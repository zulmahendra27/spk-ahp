-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2022 at 06:19 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `nama_alternatif` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`) VALUES
(4, 'A01', 'SMA 1'),
(5, 'A02', 'SMA 2'),
(6, 'A03', 'SMA 3');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`) VALUES
(1, 'C01', 'Akreditasi'),
(2, 'C02', 'Jarak Tempuh'),
(3, 'C03', 'Prestasi'),
(4, 'C04', 'Pembelajaran'),
(5, 'C05', 'Sarana'),
(6, 'C06', 'Kualitas Guru'),
(7, 'C07', 'Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_alternatif`
--

CREATE TABLE `penilaian_alternatif` (
  `id_pa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_alternatif`
--

INSERT INTO `penilaian_alternatif` (`id_pa`, `id_kriteria`, `alternatif1`, `alternatif2`, `nilai`) VALUES
(19, 2, 4, 5, 4),
(20, 2, 4, 6, 0.5),
(21, 2, 5, 6, 0.2),
(25, 3, 4, 5, 3),
(26, 3, 4, 6, 0.5),
(27, 3, 5, 6, 0.14286),
(31, 1, 4, 5, 0.33333),
(32, 1, 4, 6, 2),
(33, 1, 5, 6, 3),
(46, 4, 4, 5, 0.14286),
(47, 4, 4, 6, 0.5),
(48, 4, 5, 6, 2),
(49, 5, 4, 5, 0.2),
(50, 5, 4, 6, 0.33333),
(51, 5, 5, 6, 2),
(76, 6, 4, 5, 2),
(77, 6, 4, 6, 3),
(78, 6, 5, 6, 2),
(85, 7, 4, 5, 2),
(86, 7, 4, 6, 2),
(87, 7, 5, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_kriteria`
--

CREATE TABLE `penilaian_kriteria` (
  `id_pk` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_kriteria`
--

INSERT INTO `penilaian_kriteria` (`id_pk`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(1, 1, 2, 3),
(2, 1, 3, 3),
(3, 1, 4, 4),
(4, 1, 5, 9),
(5, 1, 6, 2),
(6, 1, 7, 3),
(7, 2, 3, 0.5),
(8, 2, 4, 0.5),
(9, 2, 5, 4),
(10, 2, 6, 0.5),
(11, 2, 7, 0.25),
(12, 3, 4, 2),
(13, 3, 5, 7),
(14, 3, 6, 0.5),
(15, 3, 7, 3),
(16, 4, 5, 5),
(17, 4, 6, 0.33333),
(18, 4, 7, 3),
(19, 5, 6, 0.125),
(20, 5, 7, 0.2),
(21, 6, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prioritas_alternatif`
--

CREATE TABLE `prioritas_alternatif` (
  `id_pva` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prioritas_alternatif`
--

INSERT INTO `prioritas_alternatif` (`id_pva`, `id_kriteria`, `id_alternatif`, `nilai`) VALUES
(163, 1, 4, 0.25185),
(164, 1, 5, 0.58889),
(165, 1, 6, 0.15926),
(166, 2, 4, 0.33394),
(167, 2, 5, 0.09819),
(168, 2, 6, 0.56787),
(169, 3, 4, 0.29236),
(170, 3, 5, 0.09262),
(171, 3, 6, 0.61502),
(172, 4, 4, 0.10994),
(173, 4, 5, 0.62671),
(174, 4, 6, 0.26335),
(175, 5, 4, 0.10959),
(176, 5, 5, 0.58126),
(177, 5, 6, 0.30915),
(178, 6, 4, 0.53896),
(179, 6, 5, 0.29726),
(180, 6, 6, 0.16378),
(181, 7, 4, 0.49048),
(182, 7, 5, 0.3119),
(183, 7, 6, 0.19762);

-- --------------------------------------------------------

--
-- Table structure for table `prioritas_kriteria`
--

CREATE TABLE `prioritas_kriteria` (
  `id_pvk` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prioritas_kriteria`
--

INSERT INTO `prioritas_kriteria` (`id_pvk`, `id_kriteria`, `nilai`) VALUES
(1, 1, 0.31358),
(2, 2, 0.07491),
(3, 3, 0.15411),
(4, 4, 0.11515),
(5, 5, 0.02289),
(6, 6, 0.21306),
(7, 7, 0.1063);

-- --------------------------------------------------------

--
-- Table structure for table `ri`
--

CREATE TABLE `ri` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ri`
--

INSERT INTO `ri` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian_alternatif`
--
ALTER TABLE `penilaian_alternatif`
  ADD PRIMARY KEY (`id_pa`),
  ADD KEY `idkriteria_idkriteria` (`id_kriteria`),
  ADD KEY `alternatif1_idalternatif` (`alternatif1`),
  ADD KEY `alternatif2_idalternatif` (`alternatif2`);

--
-- Indexes for table `penilaian_kriteria`
--
ALTER TABLE `penilaian_kriteria`
  ADD PRIMARY KEY (`id_pk`),
  ADD KEY `kriteria1_idkriteria` (`kriteria1`),
  ADD KEY `kriteria2_idkriteria` (`kriteria2`);

--
-- Indexes for table `prioritas_alternatif`
--
ALTER TABLE `prioritas_alternatif`
  ADD PRIMARY KEY (`id_pva`),
  ADD KEY `prioritasalternatif_idkriteria_idkriteria` (`id_kriteria`),
  ADD KEY `prioritasalternatif_idalternatif_idalternatif` (`id_alternatif`);

--
-- Indexes for table `prioritas_kriteria`
--
ALTER TABLE `prioritas_kriteria`
  ADD PRIMARY KEY (`id_pvk`),
  ADD KEY `prioritaskriteria_idkriteria_idkriteria` (`id_kriteria`);

--
-- Indexes for table `ri`
--
ALTER TABLE `ri`
  ADD PRIMARY KEY (`jumlah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penilaian_alternatif`
--
ALTER TABLE `penilaian_alternatif`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `penilaian_kriteria`
--
ALTER TABLE `penilaian_kriteria`
  MODIFY `id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prioritas_alternatif`
--
ALTER TABLE `prioritas_alternatif`
  MODIFY `id_pva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `prioritas_kriteria`
--
ALTER TABLE `prioritas_kriteria`
  MODIFY `id_pvk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian_alternatif`
--
ALTER TABLE `penilaian_alternatif`
  ADD CONSTRAINT `alternatif1_idalternatif` FOREIGN KEY (`alternatif1`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif2_idalternatif` FOREIGN KEY (`alternatif2`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idkriteria_idkriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_kriteria`
--
ALTER TABLE `penilaian_kriteria`
  ADD CONSTRAINT `kriteria1_idkriteria` FOREIGN KEY (`kriteria1`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria2_idkriteria` FOREIGN KEY (`kriteria2`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prioritas_alternatif`
--
ALTER TABLE `prioritas_alternatif`
  ADD CONSTRAINT `prioritasalternatif_idalternatif_idalternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prioritasalternatif_idkriteria_idkriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prioritas_kriteria`
--
ALTER TABLE `prioritas_kriteria`
  ADD CONSTRAINT `prioritaskriteria_idkriteria_idkriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
