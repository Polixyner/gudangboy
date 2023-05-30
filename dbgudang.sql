-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 09:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `idBarang` int(255) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `stokBarang` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`idBarang`, `namaBarang`, `stokBarang`) VALUES
(23, 'Sabun Mandi', 54);

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaksi`
--

CREATE TABLE `tbltransaksi` (
  `idTransaksi` int(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idBarang` int(255) NOT NULL,
  `statusTransaksi` int(2) NOT NULL,
  `tanggalTransaksi` date NOT NULL,
  `stokTransaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`idTransaksi`, `idUser`, `idBarang`, `statusTransaksi`, `tanggalTransaksi`, `stokTransaksi`) VALUES
(1, 5, 23, 1, '2023-05-18', 80),
(2, 5, 23, 0, '2023-05-25', 6),
(3, 5, 23, 1, '2023-05-30', 10),
(4, 12, 23, 0, '2023-05-30', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `idUser` int(255) NOT NULL,
  `namaUser` varchar(255) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `passwordUser` varchar(255) NOT NULL,
  `roleUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`idUser`, `namaUser`, `emailUser`, `passwordUser`, `roleUser`) VALUES
(2, 'Admin', 'admin@gmail.com', '$2y$10$wTJqq.LbojoRSdbZkhlB8eVObsncuofyvAtxzEvXXSl.N8YUv81RC', 'Owner'),
(4, 'Okky Firmansyah', 'okky@gmail.com', '$2y$10$gMQR.XhVzOrnDM0ggQn0de8zqBHIURmPmO0L1Vf13h8uug6M1/HsW', 'Manager'),
(5, 'Bowo', 'bowo@gmail.com', '$2y$10$YN0Q1gPemw57R4JYqVZYuuVJuQuW8ndo.5VNNopCuPOuux8DeQKtW', 'Staff'),
(12, 'Ronaldo', 'ronaldo@gmail.com', '$2y$10$jQ6UQ259tm2usYOkwK531eghg4lDSUf4rit8l.PdRvmyWL6tDEiAS', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `fk1` (`idBarang`),
  ADD KEY `fk2` (`idUser`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbarang`
--
ALTER TABLE `tblbarang`
  MODIFY `idBarang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  MODIFY `idTransaksi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `idUser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idBarang`) REFERENCES `tblbarang` (`idBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`idUser`) REFERENCES `tbluser` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
