-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 02:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meals`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `price` decimal(10,4) UNSIGNED DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `title`, `price`, `image`, `description`) VALUES
(3, 'Burger Meal', '27.5000', 'meal3.png', 'Cool Beef Burger'),
(5, 'Chicken Burger', '19.4000', 'meal5.png', 'Best in town'),
(6, 'Pizza', '28.5000', 'meal6.png', 'a 12-slice pizza with different options and flavors');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviewer_name` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `date` datetime NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(500) NOT NULL,
  `review` varchar(500) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewer_name`, `city`, `date`, `rating`, `image`, `review`, `meal_id`) VALUES
(110027312, 'Kahlid', 'Makkah', '2021-12-14 02:01:20', 5, 'download.jpg', 'Will visit again', 3),
(222462026, 'Ayman', 'Dammam', '2021-12-14 02:00:41', 3, 'images (1).jpg', 'not so good', 6),
(2147483647, 'Waleed Alasad', 'Khobar', '2021-12-14 01:58:14', 3, 'images.jpg', 'I enjoyed this meal', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
