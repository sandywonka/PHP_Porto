-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 05:39 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `live` varchar(255) DEFAULT NULL,
  `working` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `user_type`, `password`, `profile_image`, `live`, `working`, `education`, `dari`) VALUES
(2, 'administrator', 'administrator@canda.com', 'admin', '278f568c8da67ee9233a254a5504f506', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `image`, `image_text`) VALUES
(9, '0ae7792f36b599d422501631dc7cdd22.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(999) NOT NULL,
  `postedby` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `working` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `waktu` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `judul`, `deskripsi`, `postedby`, `path`, `working`, `email`, `budget`, `waktu`) VALUES
(63, 'tes budget', 'tes budget 123456', 'sumail', '_request__love_live____yazawa_nico_by_krukmeister-d84adnf.png', 'EG', 'sumail@EG.com', '1,000,000', '2018-12-08 06:36:42'),
(67, 'Evil Geniuses Pro Dota 2 Team', 'Hello I need some players to join me at my adventures! I put my email below! Just let me know if you\'re interested!', 'arteezy', '17201081_1345536088842358_5796033797249720208_n.jpg', 'Evil Geniuses', 'arteezy@evilgeniuses.com', '7,000,000', '2018-12-08 11:16:13'),
(68, 'Tes Project budget sort', 'tes tes tes tes tes tes', 'sumail', '14690968_1184592021603433_7190341151134059250_n.jpg', 'Evil Geniuses', 'sumail@evilgeniuses.com', '3,000,000', '2018-12-09 03:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `live` varchar(255) DEFAULT NULL,
  `working` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `profile_image`, `live`, `working`, `education`, `dari`) VALUES
(42, 'sumail', 'sumail@evilgeniuses.com', 'user', '63fa4c642626315ba42c406353292689', '1544325718-15319256_1242118292517472_3708261748754554582_n.jpg', 'Pakistan', 'Evil Geniuses', 'Dota 2 Pro', 'Pakistan'),
(45, 'arteezy', 'arteezy@evilgeniuses.com', 'user', '278f568c8da67ee9233a254a5504f506', '1544266735-19430028_1215306465282649_6424384871488288008_n.jpg', 'Canada', 'Evil Geniuses', 'Stamford University', 'London');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `live` varchar(255) NOT NULL,
  `working` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `profile_image`, `bio`, `live`, `working`, `education`, `dari`, `email`) VALUES
(5, '1544193593-13901459_1153640941367407_2970685967285602762_n.jpg', 'tes1', 'tes2', 'tes3', 'tes4', 'tes5', ''),
(6, '1544193625-17201081_1345536088842358_5796033797249720208_n.jpg', 'tes1', 'tes2', 'tes3', 'tes4', 'tes5', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image` (`image`),
  ADD UNIQUE KEY `image_2` (`image`),
  ADD KEY `image_3` (`image`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
