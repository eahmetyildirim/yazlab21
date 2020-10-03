-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 02:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yazlab21`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(110) NOT NULL,
  `mail` varchar(110) NOT NULL,
  `pass` varchar(110) NOT NULL,
  `yetki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `mail`, `pass`, `yetki`) VALUES
(1, 'umet99', 'aahmetyldrm99@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitap_adi` varchar(110) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `kitapOn_url` varchar(110) NOT NULL,
  `kitapArka_url` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitap_adi`, `isbn`, `kitapOn_url`, `kitapArka_url`) VALUES
(12, 'Kral Kaybederse', '9789751416575', '1_on.jpg', '1_arka.jpg'),
(13, 'Camdaki Kız', '9786050959628', '13_on.jpg', '13_arka.jpg'),
(14, 'Hayvan Çiftliği', '9789750700118', '14_on.jpg', '14_arka.jpg'),
(15, 'Bin Dokuz Yüz Seksen Dört', '9789750712838', '15_on.jpg', '15_arka.jpg'),
(20, 'Canavarlar Denizi', '9786051110462', '20_on.jpg', '20_arka.jpg'),
(21, 'Labirent Savaşı', '9786051113814', '21_on.jpg', '21_arka.jpg'),
(22, 'Son Olimposlu', '9786051113821', '22_on.jpg', '22_arka.jpg'),
(26, 'İşte Hayat', '9789753316712', '26_on.jpg', '26_arka.jpg'),
(27, 'Şimdi Düğün Zamanı', '9789753316156', '27_on.jpg', '27_arka.jpg'),
(28, 'Hayat Devam Ediyor', '9789753319720', '28_on.jpg', '28_arka.jpg'),
(31, 'Alice Harikalar Diyarında', '9799756231745', '31_on.jpg', '31_arka.jpg'),
(32, 'İnsanların Aklına Girme Sanatı', '9789944983631', '32_on.jpg', '32_arka.jpg'),
(33, 'Şimşek Hırsızı', '9786051110455', '33_on.jpg', '33_arka.jpg'),
(35, 'Arkadaşlar Arasında', '9789753316651', '35_on.jpg', '35_arka.jpg'),
(36, 'Adım Adım Hayata', '9789753316729', '36_on.jpg', '36_arka.jpg'),
(37, 'ABC', '9789753316308', '37_on.jpg', '37_arka.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kitap_sahipleri`
--

CREATE TABLE `kitap_sahipleri` (
  `id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tarih` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kitap_sahipleri`
--

INSERT INTO `kitap_sahipleri` (`id`, `kitap_id`, `user_id`, `tarih`) VALUES
(31, 14, 14, 1587232631),
(36, 36, 17, 1587232683),
(37, 28, 15, 1587232731),
(38, 31, 15, 1587232735),
(43, 15, 12, 1589712253);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(110) NOT NULL,
  `mail` varchar(110) NOT NULL,
  `pass` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `mail`, `pass`) VALUES
(12, 'YarenD', 'yarenduraan@gmail.com', '123'),
(13, 'GizemN', 'gizem.nailoglu@gmail.com', '123'),
(14, 'AhmetY', 'ahmetyildirim@gmail.com', '123'),
(15, 'SukruE', 'sukrukartall@gmail.com', '123'),
(16, 'Kadircanİ', 'kadircaanisbilen@gmail.com', '123'),
(17, 'DeryaD', 'deryadinceer@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitap_sahipleri`
--
ALTER TABLE `kitap_sahipleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kitap_sahipleri`
--
ALTER TABLE `kitap_sahipleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
