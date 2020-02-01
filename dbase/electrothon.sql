-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2020 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electrothon`
--

-- --------------------------------------------------------

--
-- Table structure for table `amblogin`
--

CREATE TABLE `amblogin` (
  `ambno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bblogin`
--

CREATE TABLE `bblogin` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bblogin`
--

INSERT INTO `bblogin` (`name`, `username`, `password`) VALUES
('hosp1', 'kkk', '5150d2104c8cd974b27fad3f25ec4e8098bb7bbe');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dcity` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `type`, `email`, `dcity`) VALUES
(3, 'efef', 'AB-', 'burgerleo90@gmail.com', 'BBSR');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dist` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `name`, `address`, `city`, `dist`, `state`, `phone`, `email`) VALUES
(1, 'fawfwaf', 'egse', 'awfwafawf', 'heiuh,feouhfe,eif', 'Bbsr', 'khurdha', 'odisha', 3363563, 'fwf@efy.com'),
(2, 'pop', '4f197c99a78b8411f1cf48ab409a0a6d176b99b7', 'eibgusegiuse', 'efef,nefe', 'Bbsr', 'khurdha', 'odisha', 9879827, 'fe@ejkfn.com'),
(3, 'pop', '4f197c99a78b8411f1cf48ab409a0a6d176b99b7', 'Hospital1', 'gsgsf,aw,wad,wad,dwda', 'BBSR', 'KHORDHA', 'ODISHA', 3048535, 'ef@gwh.ei'),
(4, 'lol', '403926033d001b5279df37cbbe5287b7c7c267fa', 'hospital1', 'kjbd,efef,fef', 'BBSR', 'KHORDHA', 'ODISHA', 876876, 'ejfbh@d.fj'),
(5, 'ppp', 'b3054ff0797ff0b2bbce03ec897fe63e0b6490e0', 'hosp1', 'gesse,esfse,efsef', 'BBSR', 'KHORDHA', 'ODISHA', 4435355, 'ee@j.ff'),
(6, 'ooo', '4ae9fa0a8299a828a886c0eb30c930c7cf302a72', 'hosp2', 'jebnf,efef,efefe', 'BBSR', 'KHURDHA', 'ODISHA', 982892, 'dn2J@N.COM'),
(7, 'lll', 'e80b2d2608711cbb3312db7c4727a46fbad9601a', 'hosp3', 'dwjd,dwd,dwd', 'Cuttack', 'KHURDHA', 'ODISHA', 234234, 'wef2@nd.co'),
(8, 'jjj', 'c84c766f873ecedf75aa6cf35f1e305e095fec83', 'hosp4', 'jbjekj,fefef,fefef', 'KHURDHA', 'KHURDHA', 'ODISHA', 87687, 'vrk@v.bf'),
(9, 'nnn', '7f88bb68e14d386d89af3cf317f6f7af1d39246c', 'fww', 'jebnf,efef,efefe', 'BBSR', 'KHURDHA', 'ODISHA', 34987345, 'wef2@nd.co');

-- --------------------------------------------------------

--
-- Table structure for table `pharmalogin`
--

CREATE TABLE `pharmalogin` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pharmalogin`
--

INSERT INTO `pharmalogin` (`username`, `password`, `name`) VALUES
('iii', '425ffc1422dc4f32528bd9fd5af355fdb5c96192', 'hosp1'),
('mmm', '91223fd10ce86fc852b449583aa2196c304bf6e0', 'hosp4');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `product_id` int(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`product_id`, `name`, `type`, `rname`, `quantity`, `price`) VALUES
(14, 'hosp1', 'vaccine', 'HIV', 344, 447),
(15, 'hosp1', 'medicine', 'Paracetamol', 46, 32),
(16, 'hosp1', 'medicine', 'Cold Syrup', 34, 80),
(17, 'hosp1', 'blood', 'A+', 90, NULL),
(18, 'hosp1', 'blood', 'B+', 23, NULL),
(19, 'hosp1', 'blood', 'O-', 43, NULL),
(20, 'hosp1', 'blood', 'O+', 77, NULL),
(21, 'hosp1', 'blood', 'AB+', 90, NULL),
(22, 'hosp2', 'medicine', 'Asthama', 23, 23),
(23, 'hosp2', 'vaccine', 'Common cold', 22, 398),
(24, 'hosp2', 'blood', 'A+', 34, NULL),
(25, 'hosp2', 'blood', 'B-', 12, NULL),
(26, 'hosp2', 'blood', 'O+', 45, NULL),
(27, 'hosp2', 'medicine', 'Paracetamol', 762, 72),
(28, 'hosp3', 'medicine', 'Paracetamol', 33, 23),
(29, 'hosp4', 'medicine', 'Paracetamol', 98, 78);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `ambno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pulseoxy` int(100) NOT NULL,
  `pulserate` int(100) NOT NULL,
  `bp` int(100) NOT NULL,
  `details` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amblogin`
--
ALTER TABLE `amblogin`
  ADD PRIMARY KEY (`ambno`);

--
-- Indexes for table `bblogin`
--
ALTER TABLE `bblogin`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`ambno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
