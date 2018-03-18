-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2018 at 07:15 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hobi` varchar(100) NOT NULL,
  `level` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `hp`, `alamat`, `hobi`, `level`, `status`) VALUES
(1, 'amirfahmi8@gmail.com', '$2y$10$eyIMvD3T7zTncjJqPT2nsuglf4vT.zKaHcwhLSMDEChIbYg1Ffd2q', 'fahmi', '0876876767658', 'klepek sukosewu bojonegoro', 'bola', 1, 'aktif'),
(5, 'bayu@yahoo.com', '$2y$10$WxSfKR1RrSenwnNdTwLNg.vyUG6kgxO7F86pCU6Qgw4zhn8yPS3wS', 'bayu', '0876876767658', 'klepek sukosewu bojonegoro', 'voli', 1, 'aktif'),
(6, 'puput@yahoo.com', '$2y$10$OEPGUQ2RbtdOdQjmKguW2e9iysnPFVDwD6ju1dLIfZ6MjdNNA3P5u', 'puput', '0876876767658', 'ngawinan', 'baca buku', 1, 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
