-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 02:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parblu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `DATA_ID` int(11) NOT NULL,
  `KENDARAAN_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `VENDOR_ID` int(11) NOT NULL,
  `MATERIAL_ID` int(11) NOT NULL,
  `LOKASI_ID` int(11) NOT NULL,
  `DATA_TANGGAL` date NOT NULL,
  `DATA_VOLUME` float DEFAULT NULL,
  `DATA_HARGA` int(11) NOT NULL,
  `DATA_STATUS` varchar(50) DEFAULT NULL,
  `DATA_FOTO` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`DATA_ID`, `KENDARAAN_ID`, `USER_ID`, `VENDOR_ID`, `MATERIAL_ID`, `LOKASI_ID`, `DATA_TANGGAL`, `DATA_VOLUME`, `DATA_HARGA`, `DATA_STATUS`, `DATA_FOTO`) VALUES
(10, 2, 7, 2, 3, 2, '2019-10-20', 0.07, 11900, 'Terbayar', '../datafoto/7.jpg'),
(11, 2, 8, 3, 3, 2, '2019-10-20', 0.07, 0, 'Belum Terbayar', '../datafoto/8.png'),
(12, 2, 8, 2, 4, 2, '2019-10-21', 0.07, 35700, 'Belum Terbayar', '../datafoto/8.jpg'),
(13, 2, 8, 2, 5, 2, '2019-10-21', 0.07, 35700, 'Belum Terbayar', '../datafoto/8.png'),
(16, 2, 8, 2, 3, 2, '2019-10-21', 0.07, 35700, 'Belum Terbayar', '../datafoto/8.jpg'),
(17, 2, 8, 2, 3, 2, '2019-11-04', 0.07, 0, 'Belum Terbayar', '../datafoto/8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groupuser`
--

CREATE TABLE `groupuser` (
  `GROUP_ID` int(11) NOT NULL,
  `JENIS_USER` varchar(50) NOT NULL,
  `JABATAN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupuser`
--

INSERT INTO `groupuser` (`GROUP_ID`, `JENIS_USER`, `JABATAN`) VALUES
(1, 'Admin', 'Mengelola Data'),
(2, 'Checker', 'Mengecek tiap material '),
(3, 'Pemilik', 'Pemilik CV ParBLU');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `KENDARAAN_ID` int(11) NOT NULL,
  `NOPOL` varchar(10) NOT NULL,
  `PANJANG_KENDARAAN` float DEFAULT NULL,
  `LEBAR_KENDARAAN` float DEFAULT NULL,
  `TINGGI_KENDARAAN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`KENDARAAN_ID`, `NOPOL`, `PANJANG_KENDARAAN`, `LEBAR_KENDARAAN`, `TINGGI_KENDARAAN`) VALUES
(2, 'N 4563 NM', 420, 145, 123),
(3, 'N 1234 LK', 420, 190, 123);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `LAPORAN_ID` int(11) NOT NULL,
  `DATA_ID` int(11) NOT NULL,
  `LAPORAN_NAMA` varchar(100) NOT NULL,
  `LAPORAN_TANGGAL` date DEFAULT NULL,
  `LAPORAN_STATUS` varchar(50) DEFAULT NULL,
  `LAPORAN_VOLUME` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`LAPORAN_ID`, `DATA_ID`, `LAPORAN_NAMA`, `LAPORAN_TANGGAL`, `LAPORAN_STATUS`, `LAPORAN_VOLUME`) VALUES
(1, 10, 'Pasir-ParBLU-BP 1', '2019-10-20', 'Belum Terbayar', 0.14),
(2, 11, 'Pasir-KLU-BP 1', '2019-10-20', 'Belum Terbayar', 0.14),
(3, 12, 'Split-ParBLU-BP 1', '2019-10-21', 'Belum Terbayar', 0.21),
(4, 13, 'Semen-ParBLU-BP 1', '2019-10-21', 'Belum Terbayar', 0.21),
(7, 16, 'Pasir-ParBLU-BP 1', '2019-10-21', 'Belum Terbayar', 0.21);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `LOKASI_ID` int(11) NOT NULL,
  `LOKASI_NAMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`LOKASI_ID`, `LOKASI_NAMA`) VALUES
(2, 'BP 1'),
(3, 'BP 2'),
(4, 'BP 3');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `MATERIAL_ID` int(11) NOT NULL,
  `MATERIAL_NAMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`MATERIAL_ID`, `MATERIAL_NAMA`) VALUES
(3, 'Pasir'),
(4, 'Split'),
(5, 'Semen'),
(6, 'Batu'),
(7, 'Koral');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `GROUP_ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(1000) DEFAULT NULL,
  `NO_HP` varchar(20) NOT NULL,
  `FOTO_KTP` varchar(1000) NOT NULL,
  `JENIS_KELAMIN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `GROUP_ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `ALAMAT`, `NO_HP`, `FOTO_KTP`, `JENIS_KELAMIN`) VALUES
(6, 1, 'DionM', 'dion', 'dion@g.com', 'dfsjj', '67800', 'images/foto/DionMW.PNG', 'Laki-laki'),
(7, 3, 'Ardi', 'ardi', 'ardi@gmail.com', 'kalpataru', '08952432738', 'asdawdsad', 'Laki-laki'),
(8, 2, 'rido', 'rido', 'rido@gmail.com', 'bululawang', '1234567', 'images/foto/rido.png', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `VENDOR_ID` int(11) NOT NULL,
  `VENDOR_NAMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VENDOR_ID`, `VENDOR_NAMA`) VALUES
(2, 'ParBLU'),
(3, 'KLU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`DATA_ID`),
  ADD KEY `FK_KENDARAAN` (`KENDARAAN_ID`),
  ADD KEY `FK_LOKASI` (`LOKASI_ID`),
  ADD KEY `FK_MATERIAL` (`MATERIAL_ID`),
  ADD KEY `FK_USER` (`USER_ID`),
  ADD KEY `FK_VENDOR` (`VENDOR_ID`);

--
-- Indexes for table `groupuser`
--
ALTER TABLE `groupuser`
  ADD PRIMARY KEY (`GROUP_ID`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`KENDARAAN_ID`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`LAPORAN_ID`),
  ADD KEY `FK_DATA` (`DATA_ID`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`LOKASI_ID`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`MATERIAL_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `FK_GROUP` (`GROUP_ID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`VENDOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `DATA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `groupuser`
--
ALTER TABLE `groupuser`
  MODIFY `GROUP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `KENDARAAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `LAPORAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `LOKASI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `MATERIAL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `VENDOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `FK_KENDARAAN` FOREIGN KEY (`KENDARAAN_ID`) REFERENCES `kendaraan` (`KENDARAAN_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LOKASI` FOREIGN KEY (`LOKASI_ID`) REFERENCES `lokasi` (`LOKASI_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MATERIAL` FOREIGN KEY (`MATERIAL_ID`) REFERENCES `material` (`MATERIAL_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VENDOR` FOREIGN KEY (`VENDOR_ID`) REFERENCES `vendor` (`VENDOR_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `FK_DATA` FOREIGN KEY (`DATA_ID`) REFERENCES `data` (`DATA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_GROUP` FOREIGN KEY (`GROUP_ID`) REFERENCES `groupuser` (`GROUP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
