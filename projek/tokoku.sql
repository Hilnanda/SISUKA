-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 10:05 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `nama_sepatu` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `size_cart` varchar(30) NOT NULL,
  `jumlah_cart` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`nama_sepatu`, `brand`, `harga`, `deskripsi`, `size_cart`, `jumlah_cart`, `total`, `id_cart`) VALUES
('Vans sepatu Galaxy', 'Vans', 800000, 'Vans Galaxy Keren', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_sepatu` int(11) NOT NULL,
  `nama_sepatu` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_sepatu`, `nama_sepatu`, `brand`, `jenis`, `size`, `harga`, `jumlah`, `deskripsi`, `gambar`) VALUES
(1, 'Vans sepatu Superstar', 'Vans', 'Sport', '45-50', 500000, 10, 'Vans keren superstar', 'gambar/Vans sepatu Superstar.jpg'),
(2, 'Vans sepatu Galaxy', 'Vans', 'Casual', '40-42', 800000, 10, 'Vans Galaxy Keren', 'gambar/Vans sepatu Galaxy.jpg'),
(3, 'Vans sepatu Santai', 'Vans', 'Casual', '40-43', 800000, 10, 'Vans Sepatu Saintai Ols school', 'gambar/Vans sepatu Santai.jpg'),
(4, 'Nike Running Man', 'Nike', 'Sport', '40-42', 500000, 10, 'Bagus Banget', 'gambar/Nike Running Man.jpg'),
(5, 'Nike Flyknt Pink', 'Nike', 'Casual', '45-50', 500000, 10, 'Nike Pink Keren', 'gambar/Nike Flyknt Pink.jpg'),
(6, 'Nike Flyknt Zoom', 'Nike', 'Casual', '40-42', 800000, 10, 'Nike terbaru Zoom', 'gambar/Nike Flyknt Zoom.jpg'),
(7, 'Adidas Superstar Splash', 'Adidas', 'Casual', '40-42', 800000, 10, 'Adidas Superstar Splash', 'gambar/Adidas Superstar Splash.jpg'),
(8, 'Adidas Yeezy', 'Adidas', 'Casual', '40-42', 900000, 10, 'Adidas Yeezy Keren', 'gambar/Adidas Yeezy.jpg'),
(9, 'Adidas Yeezy V2', 'Adidas', 'Casual', '40-42', 500000, 10, 'Adidas yyezy V2 Original', 'gambar/Adidas Yeezy V2.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_sepatu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
