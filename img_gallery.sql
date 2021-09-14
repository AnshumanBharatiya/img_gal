-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 07:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `img_gallery`
--

CREATE TABLE `img_gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(400) NOT NULL,
  `img_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img_gallery`
--

INSERT INTO `img_gallery` (`id`, `img`, `img_tag`) VALUES
(4, 'img1.jpg', 'sdfdv'),
(6, 'img2.jpg', 'sunset,sun,sunrise,nature,tree'),
(7, 'img3.jpg', 'nature,beauty,hill,sunset,sun'),
(8, 'Abstract.jpg', 'Meaningless,Room,Painting,Canvas,Frame'),
(9, 'Room.jpg', 'Abstract,Car,Vehicle,Nature,Devine,'),
(10, 'Frame.jpg', 'Decorative,Canvas,Nature,Car,Meaningless,'),
(11, 'Elephant.jpg', 'Animal'),
(12, 'Img4.jpg', 'Unity'),
(13, 'img5.jpg', 'Nature'),
(14, 'Blog.jpg', 'Blog'),
(15, 'Abstract2.jpg', 'Meaningfull,Abstract, Abstract2,Car,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img_gallery`
--
ALTER TABLE `img_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img_gallery`
--
ALTER TABLE `img_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
