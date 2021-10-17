-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 10:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `description` varchar(225) NOT NULL,
  `url` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `assign` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `unID` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `type`, `description`, `url`, `image`, `assign`, `created`, `modified`, `unID`) VALUES
(1, 'mario', 'admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '', 'download.jpg', 0, '2019-12-10 01:46:20', '2019-12-10 01:46:20', ''),
(3, 'mario', 'admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n', '', '82172316-hut-on-braies-lake-lago-di-braies-pragser-wildsee-in-dolomiti-mountains-and-seekofel-in-background-s.jpg', 0, '2019-12-10 01:46:55', '2019-12-10 01:46:55', ''),
(6, 'mario', 'offer', '', '', 'download (5).jpg', 0, '2019-12-10 01:50:54', '2019-12-10 01:50:54', ''),
(8, 'mario', 'offer', '', '', 'images (3).jpg', 0, '2019-12-10 01:51:39', '2019-12-10 01:51:39', ''),
(9, 'mario', 'ads', '', 'ad.com', 'images.png', 1, '2019-12-10 01:53:47', '2019-12-10 01:53:47', ''),
(10, 'mario', 'ads', '', '2nndad.com', 'images (4).jpg', 2, '2019-12-10 01:54:06', '2019-12-10 01:54:06', ''),
(11, 'Salah', 'doctor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                            quis nostrud exer', '', '1991709.jpg', 0, '2019-12-10 05:49:03', '2019-12-10 05:49:03', '5deee6c372dd5'),
(12, 'Salah', 'doctor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                            quis nostrud exer', '', 'workout-plan-sports-equipment-copy-space-workout-plan-sports-equipment-copy-space-white-paper-exercise-tools-top-view-103236847.jpg', 0, '2019-12-10 05:49:34', '2019-12-10 05:52:27', '5deee6c372dd5'),
(14, 'Salah', 'doctor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', '', 'rutina-gimnasio-5-dias-825x502.jpg', 0, '2019-12-10 05:52:19', '2019-12-10 05:52:19', '5deee6c372dd5');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `client_unID` varchar(225) NOT NULL,
  `elements` int(11) NOT NULL,
  `type` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `doctor_name` text NOT NULL,
  `doctor_unID` varchar(225) NOT NULL,
  `client_name` text NOT NULL,
  `client_unID` varchar(225) NOT NULL,
  `msg` varchar(225) NOT NULL,
  `sender` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `unID` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` text NOT NULL,
  `activity_level` text NOT NULL,
  `routine` text NOT NULL,
  `goal` text NOT NULL,
  `age` int(11) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `food` varchar(225) NOT NULL,
  `routine_issues` text NOT NULL,
  `result` float NOT NULL,
  `doctor_name` varchar(225) NOT NULL,
  `doctor_unID` varchar(225) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `unID`, `email`, `password`, `address`, `phone`, `gender`, `activity_level`, `routine`, `goal`, `age`, `height`, `weight`, `food`, `routine_issues`, `result`, `doctor_name`, `doctor_unID`, `modified`, `created`) VALUES
(1, 'Nesma', '5deeb89c164b5', 'nesma@gmail.com', '$2y$10$287Fy9logQWNrhfT3QYRWOLDZI77s7BQgTRHH5OtOoLg5uVx37Cbi', 'Madent El-solb El-gdeda, Helwan, Cairo', 1094322757, '', '', '', '', 0, 0, 0, '', '', 0, '', '', '2019-12-09 22:13:18', '2019-12-09 22:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `unID` varchar(225) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `cappacity` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `type`, `unID`, `name`, `password`, `price`, `description`, `image`, `address`, `age`, `email`, `cappacity`, `created`, `modified`) VALUES
(11, 'Doctor', '5dac65ff5b3e2', 'Ali', '$2y$10$KsiLldSlUtyUfggdeljc.OFs42DAQKGnQ1aNVhYXtFBd7w1uPJZ0C', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ninja-simple-512.png', 'Madent El-solb El-gdeda, Helwan, Cairo', 30, 'nesmaelsafty18@gmail.com', 55, '2019-10-20', '2019-11-13'),
(19, 'trainer', '5deee6c372dd5', 'Salah', '$2y$10$Mqd.1hPT5Mq3K5amThIgOuYvkigBGPJlVui0c2YmjKXASjVCQ3SDS', 55, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 'break-workout_602724.jpg', 'Madent El-solb El-gdeda, Helwan, Cairo', 40, 'Salah@gmail.com', 5, '2019-12-10', '2019-12-10'),
(21, 'doctor', '5deee791d2cf7', 'john', '$2y$10$kAQBi3C/6VFA6LyWOXxCRetws4mUfCi4tAX.n36euiYWuKIANSGD.', 75, '', '', '', 0, 'john@gmail.com', 0, '2019-12-10', '2019-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `ourdata`
--

CREATE TABLE `ourdata` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `twitter` varchar(225) NOT NULL,
  `instagram` varchar(225) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ourdata`
--

INSERT INTO `ourdata` (`id`, `description`, `phone`, `email`, `image`, `facebook`, `twitter`, `instagram`, `created`, `modified`) VALUES
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1094322757, 'nesmaelsafty18@gmail.com', 'people-eat-healthy-meals-served-table-dinner-party-festive-friends-celebrate-organic-food-wooden-top-view-happy-80334767.jpg', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.instagram.com', '2019-10-20', '2019-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `price` double NOT NULL,
  `meal_name` text NOT NULL,
  `meal_description` varchar(225) NOT NULL,
  `fats` int(11) NOT NULL,
  `calories` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `carbs` int(11) NOT NULL,
  `phase` int(11) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `type`, `price`, `meal_name`, `meal_description`, `fats`, `calories`, `protein`, `carbs`, `phase`, `image`) VALUES
(1, 'package 1', 'package', 450, '', '', 0, 0, 0, 0, 7, 'download (6).jpg'),
(3, 'package 3', 'package', 980, '', '', 0, 0, 0, 0, 10, 'images (5).jpg'),
(4, 'package 4', 'package', 780, '', '', 0, 0, 0, 0, 14, 'images (7).jpg'),
(5, 'package 1', 'package_meal', 0, 'meal 1', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 23, 32, 43, 24, 0, ''),
(6, 'package 1', 'package_meal', 0, 'meal 2', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 432, 543, 54, 43, 0, ''),
(11, 'package 3', 'package_meal', 0, 'meal 1', '\r\n        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ', 432, 43, 432, 434, 0, ''),
(12, 'package 3', 'package_meal', 0, 'meal 2', '\r\n        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ', 312, 43, 54, 75, 0, ''),
(13, 'package 4', 'package_meal', 0, 'meal 1', '\r\n        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ', 21, 43, 54, 76, 0, ''),
(14, 'package 4', 'package_meal', 0, 'meal 2', '\r\n        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ', 325, 42, 32, 56, 0, ''),
(15, 'Salads', 'menu', 0, '', '', 0, 0, 0, 0, 0, ''),
(16, 'Meat', 'menu', 0, '', '', 0, 0, 0, 0, 0, ''),
(17, 'Salads', 'menu_meal', 100, 'meal 1', '        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut', 12, 43, 23, 423, 0, ''),
(18, 'Salads', 'menu_meal', 54, 'meal 2', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                            ', 12, 43, 23, 54, 0, ''),
(19, 'Salads', 'menu_meal', 333, 'meal 3', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 32, 45, 65, 76, 0, ''),
(20, 'Salads', 'menu_meal', 544, 'meal 4', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 32, 54, 32, 434, 0, ''),
(21, 'Salads', 'menu_meal', 434, 'meal 5', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 323, 45, 35, 231, 0, ''),
(22, 'Meat', 'menu_meal', 343, 'meal 1', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 31, 432, 45, 45, 0, ''),
(23, 'Meat', 'menu_meal', 32, 'meal 2', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 32, 54, 32, 54, 0, ''),
(24, 'Meat', 'menu_meal', 323, 'meal 3', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 312, 43, 434, 32, 0, ''),
(25, 'Meat', 'menu_meal', 324, 'meal 4', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 32, 423, 43, 23, 0, ''),
(26, 'Meat', 'menu_meal', 32, 'meal 5', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 314, 324, 43, 43, 0, ''),
(27, 'package 2', 'package', 334, '', '', 0, 0, 0, 0, 3, 'images (2).jpg'),
(28, 'package 2', 'package_meal', 0, 'meal 1', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 12, 43, 54, 23, 0, ''),
(29, 'package 2', 'package_meal', 0, 'meal 2', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 23, 43, 54, 76, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplements`
--

CREATE TABLE `supplements` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL,
  `storage` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `best_seller` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplements`
--

INSERT INTO `supplements` (`id`, `name`, `price`, `storage`, `image`, `best_seller`) VALUES
(1, 'product1', 45, 20, '18.jpg', 0),
(3, 'Product 2', 89, 50, '71VZC8XJhSL._SY355_.jpg', 0),
(4, 'package 3', 74, 10, 'download (1).jpg', 0),
(5, 'Product 4 ', 45, 66, 'super-gainer-xxl-nut5225-03-muscleblaze-original-imafjaxb9zxmxgyu.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `unID` varchar(225) NOT NULL,
  `auth` text NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `unID`, `auth`, `created`, `modified`) VALUES
(1, 'mario', 'mario@gmail.com', '$2y$10$qjZDUOTRYcAy6RBjBuJ9d.wA3oP13i5bhioiEBskSiOSA.78mWLua', '5dbbeeef2ef6e', 'master', '0000-00-00', '2019-11-04'),
(33, 'Ahmed', 'Ahmed@gmail.com', '$2y$10$QK9ifCnFHIGM/gDmDolCvO2yn.DZe9hdj2uATgGvOz9B1MTY3nJna', '5dbfc72c82621', 'admin', '2019-11-04', '2019-11-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourdata`
--
ALTER TABLE `ourdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplements`
--
ALTER TABLE `supplements`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ourdata`
--
ALTER TABLE `ourdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplements`
--
ALTER TABLE `supplements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
