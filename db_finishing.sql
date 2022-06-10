-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 10:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_finishing`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataproduk`
--

CREATE TABLE `dataproduk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(25) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Ukuran` varchar(9) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `nomerPemesanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataproduk`
--

INSERT INTO `dataproduk` (`idProduk`, `namaProduk`, `Qty`, `Ukuran`, `warna`, `nomerPemesanan`) VALUES
(3, 'Perlak', 200, '120 x 150', 'Biru Metalik', '5555'),
(4, 'Sprei Karet', 3, '90 x 200 ', 'Putih', '5555');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `idPengiriman` int(11) NOT NULL,
  `idProdukFK` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggalKirim` date NOT NULL,
  `noSuratJalan` varchar(20) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`idPengiriman`, `idProdukFK`, `qty`, `tanggalKirim`, `noSuratJalan`, `status`) VALUES
(2, 4, 3, '2022-06-11', '5555', 'terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `produkmasuk`
--

CREATE TABLE `produkmasuk` (
  `idProdukMasuk` int(11) NOT NULL,
  `idProdukFK` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idStock` int(11) NOT NULL,
  `namaProduk` varchar(25) NOT NULL,
  `ukuran` varchar(9) NOT NULL,
  `qty` int(11) NOT NULL,
  `letakProduk` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idStock`, `namaProduk`, `ukuran`, `qty`, `letakProduk`) VALUES
(2, 'Perlak', '160 x 280', 3, 'Rak Nomer 3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'marketing', 'marketing', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataproduk`
--
ALTER TABLE `dataproduk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`idPengiriman`);

--
-- Indexes for table `produkmasuk`
--
ALTER TABLE `produkmasuk`
  ADD PRIMARY KEY (`idProdukMasuk`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idStock`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataproduk`
--
ALTER TABLE `dataproduk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `idPengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produkmasuk`
--
ALTER TABLE `produkmasuk`
  MODIFY `idProdukMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
