-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2023 at 03:10 PM
-- Server version: 8.0.31-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Websites`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`) VALUES
(1, 2, 'dsadsd'),
(2, 2, 'dsadsddads'),
(3, 2, 'saas'),
(4, 2, 'saassasa'),
(5, 2, 'saassasasassasa'),
(6, 9, 'nice parbhat'),
(7, 9, 'hi pooja'),
(8, 8, '8911111111'),
(10, 1, 'nice'),
(11, 2, 'dfs');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `image`, `body`) VALUES
(1, '4', 'gsachgcfmsdcd', 'web.jpg', 'dsnvgcdfcv'),
(2, '5', 'gfghgh', 'coat_model_fashion-wallpaper-2048x1152.jpg', 'ghghghghgh'),
(3, '5', 'gghhghg', 'coat_model_fashion-wallpaper-2048x1152.jpg', 'hfghfh'),
(4, '6', 'instagram', 'coat_model_fashion-wallpaper-2048x1152.jpg', 'nature is beautiful'),
(5, '4', 'dfgh', 'web(1).jpg', 'dfjhmk'),
(6, '4', 'Upasna', 'web(1).jpg', 'nature is beautiful'),
(7, '4', 'sdfhng', 'web(1).jpg', 'sdfhgng'),
(8, '7', 'Adventure', 'asss.jpeg', 'nature is beautiful'),
(9, '9', 'my journey', 'fashion.png', 'nature is beautiful');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `image`, `role`) VALUES
(5, 'hghggh', 'hgghhg', 'tqmassociate@gmail.com', 'hghghg', 'Yamunanagar', 'coat_model_fashion-wallpaper-2048x1152.jpg', NULL),
(6, 'manish', 'sharma', 'upasnak@gmail.com', '1111', 'Yamunanagar', 'asss.jpeg', NULL),
(7, 'Anukul', 'sharma', 'anukulantwal12@gmail.com', '$2y$10$HIe0nl1QkKaw1H885CGDM.lVIKmuBdmCwIav1SE1d7cHw7tOLzfLG', 'Yamunanagar', 'web(1).jpg', NULL),
(8, 'manish', 'sharma', 'anukulantwal@gmail.com', '$2y$10$T7NFLcPRcitogDPUQ5zeMeZmOOw5utD9B5bkGNdbTRji1R.j3goqS', 'Yamunanagar', 'coat_model_fashion-wallpaper-2048x1152.jpg', NULL),
(9, 'parbhat', 'sharma', 'anukulantaaaawal@gmail.com', '$2y$10$LBs54F4PpbJE6wx8UG.j3eN6dovq/N2E52FnS0PjMedcT8wS8J1sK', 'Yamunanagar', 'web.jpg', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
