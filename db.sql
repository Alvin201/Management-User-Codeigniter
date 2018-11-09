-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 08:40 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kompas_alvin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_admin`
--

CREATE TABLE `ac_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `idrole` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_admin`
--

INSERT INTO `ac_admin` (`id_admin`, `username`, `password`, `email`, `created_at`, `updated_at`, `idrole`) VALUES
(1, 'administrator', '9573534ee6a886f4831ac5bcdfe85565', 'admin@gmail.com', '2018-10-19 10:06:13', '2018-10-19 10:37:05', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', '2018-10-19 10:39:59', '2018-10-19 10:40:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ac_gallery`
--

CREATE TABLE `ac_gallery` (
  `id_gallery` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_gallery`
--

INSERT INTO `ac_gallery` (`id_gallery`, `foto`, `description`) VALUES
(2, 'upload/general/6320b3f7157eb77c97fbc850bab842a2.png', 'oisoajs'),
(3, 'upload/general/4a2d5f895db69e61c6ce6e68b729e2ec.png', ' nnn'),
(4, 'upload/general/e53b7e88b408d8077337e5adc3423910.png', ' mnmn');

-- --------------------------------------------------------

--
-- Table structure for table `ac_role`
--

CREATE TABLE `ac_role` (
  `idrole` int(3) NOT NULL,
  `namerole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_role`
--

INSERT INTO `ac_role` (`idrole`, `namerole`) VALUES
(1, 'admin'),
(2, 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_admin`
--
ALTER TABLE `ac_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ac_gallery`
--
ALTER TABLE `ac_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `ac_role`
--
ALTER TABLE `ac_role`
  ADD PRIMARY KEY (`idrole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_admin`
--
ALTER TABLE `ac_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ac_gallery`
--
ALTER TABLE `ac_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ac_role`
--
ALTER TABLE `ac_role`
  MODIFY `idrole` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
