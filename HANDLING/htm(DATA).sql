-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 10:38 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `html`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `Id_pendaftar` int(11) NOT NULL,
  `Nama_Lengkap` varchar(255) NOT NULL,
  `Nama_Belakang` varchar(255) NOT NULL,
  `Nama_Panggilan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `asalnegara` varchar(255) NOT NULL,
  `Tempat_Lahir` varchar(255) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Jenis_Kelamin` varchar(255) NOT NULL,
  `Hobi` varchar(255) NOT NULL,
  `Nomor_Telfon` int(11) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Data_Masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`Id_pendaftar`, `Nama_Lengkap`, `Nama_Belakang`, `Nama_Panggilan`, `email`, `alamat`, `asalnegara`, `Tempat_Lahir`, `Tanggal_Lahir`, `Jenis_Kelamin`, `Hobi`, `Nomor_Telfon`, `Foto`, `Data_Masuk`) VALUES
(2, 'lisda', 'samyang', 'BOOS', 'lisda@gamil.com', 'xxs', 'Indonesia', 'Makassar', '1998-11-12', 'Perempuan', 'Olahraga', 8552460, '97865456.jpg', '2020-04-19'),
(3, 'aco', 'boos', 'bbbbb', 'aabb@gmail.com', 'jl. Masjid Baiturrahman Panaikang', 'Indonesia', 'Makassar', '2000-11-11', 'Laki-Laki', 'Olahraga', 8552460, 'aco.jpg', '2020-04-19'),
(10, 'yusno', 'cute', 'yuyus', 'yusnoboss123@gmail.com', 'Jl. Sejiwa', 'Indonesia', 'Wajo', '2000-12-12', 'Laki-Laki', '', 8552460, 'yusno.png', '2020-04-19'),
(11, 'Muh Irzhan', 'Syah Imran', 'Irzhan', 'Irzhan@gmail.com', 'Jl. Alauddin', 'Indonesia', 'Makassar', '2000-01-07', 'Laki-Laki', 'Sepak Bola', 85524, 'Muh Irzhan.jpg', '2020-04-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`Id_pendaftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `Id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
