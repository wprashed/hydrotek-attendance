-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2021 at 12:19 PM
-- Server version: 5.7.35
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewebdevs_hydrotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `locality` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `dmc` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `worker` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `user_id` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`id`, `address`, `locality`, `city`, `state`, `dmc`, `floor`, `worker`, `comment`, `name`, `user_id`, `time`) VALUES
(1, 'Khalishpur Housing State, Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', '', '', '', '', '', '0', '2021-05-26 07:15:02'),
(2, 'Khalishpur Housing State, Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', '', '', '', '', 'Md Rashed Hossain', 'safan0', '2021-05-26 07:37:18'),
(3, 'Khalishpur Housing State, Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', '', '', '', '', '', 'safan0', '2021-05-26 08:14:15'),
(4, 'Rd No. 12, Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', '', '', '', '', 'Md Rashed Hossain', 'safan0', '2021-05-26 08:15:04'),
(5, 'Khalishpur Housing State, Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', '', '', '', '', 'Md Rashed Hossain', 'safan0', '2021-05-26 08:16:43'),
(6, 'Khalishpur Housing State, Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', '', '', '', '', 'Md Rashed Hossain', 'safan0', '2021-06-02 04:39:13'),
(7, 'VG3W+PM Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', '', '', '', '', 'Md Rashed Hossain', 'safan0', '2021-06-02 04:49:23'),
(8, 'Al Jahra Governorate, Kuwait', '', '', 'Al Jahra Governorate', '', '', '', '', 'Md Rashed Hossain', 'safan0', '2021-06-02 05:04:12'),
(9, 'Ardiya, Kuwait', 'Ardiya', '', 'Al Farwaniyah Governorate', '', '', '', '', 'Md Rashed Hossain', 'safan0', '2021-06-02 07:46:49'),
(10, 'Khalishpur Housing State, Khulna, Bangladesh', 'Khulna', 'Khulna District', 'Khulna Division', 'Transfer Pump Station', '3', '25', 'no', 'Md Rashed Hossain', 'safan0', '2021-06-04 05:06:54'),
(11, 'Al Farwaniyah, Kuwait', 'Al Farwaniyah', '', 'Al Farwaniyah Governorate', 'New DMC Abdally', '1', '50', 'We have 50 people working here', 'Md Rashed Hossain', 'safan0', '2021-06-04 15:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` text NOT NULL,
  `username` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `EPassword` varchar(255) NOT NULL,
  `UGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `password`, `EPassword`, `UGroup`) VALUES
(1, 'safan0', 'Md Rashed Hossain', 'bappy125', 'bappy125', 10),
(2, 'krishna', 'Krishna', 'krishna@125', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
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
-- AUTO_INCREMENT for table `attend`
--
ALTER TABLE `attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
