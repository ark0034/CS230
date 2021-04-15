-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2021 at 06:47 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs230`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `pid` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `descript` text NOT NULL,
  `picpath` varchar(80) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`pid`, `title`, `descript`, `picpath`, `upload_date`, `rating`) VALUES
(1, 'test', 'a wonderful test', '../gallery/60764e55e8afa2.03498260.jpg', '2021-04-13 22:07:17', NULL),
(2, 'gallery', 'gallery', '../gallery/60778d8f49d091.70822242.jpg', '2021-04-14 20:49:19', NULL),
(3, 'new', 'thats right its new', '../gallery/6078b8d41e61e1.85664384.jpg', '2021-04-15 18:06:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `pid` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `profpic` varchar(100) NOT NULL DEFAULT '../images/default.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`pid`, `fname`, `uname`, `profpic`) VALUES
(1, 'a', 'a', '../images/default.jpeg'),
(2, 'a', 'b', '../images/default.jpeg'),
(3, 'a', 'z', '../images/default.jpeg'),
(4, 'arpan ', 'akumar', '../profiles/6076445be999e3.60634728.jpg'),
(5, 'a', 's', '../images/default.jpeg'),
(6, 'f', 'f', '../images/default.jpeg'),
(7, 'q', 'q', '../images/default.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `revid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `uname` varchar(80) NOT NULL,
  `title` varchar(60) NOT NULL,
  `reviewtext` text NOT NULL,
  `revdate` datetime NOT NULL,
  `ratingnum` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`revid`, `itemid`, `uname`, `title`, `reviewtext`, `revdate`, `ratingnum`, `status`) VALUES
(1, 1, 'akumar', 'yo', 'work pplesa', '2021-04-15 02:28:42', 5, 1),
(2, 1, 'akumar', 'a', 'b', '2021-04-15 02:50:07', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `admin` int(11) DEFAULT '0',
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le COMMENT='user database for signup/signin';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `admin`, `fname`, `lname`, `uname`, `password`, `email`) VALUES
(1, 0, 'a', 'a', 'a', '$2y$10$EvEemdb.AjSPGFG/YCfjlOxhzxNPLXM0i./Kg1qBKHkxadxNlNqJu', 'test2@test2.com'),
(2, 0, 'a', 'a', 'b', '$2y$10$M2vxtWv.LoU.Brka56UEB.KZ7JKY.TZQx22HXr7ueNVw8rUH3/R.q', 'test2@test2.com'),
(3, 0, 'a', 'a', 'z', '$2y$10$EqWSXhWHYIc3G/pSd6Kme.vdXuyQQHsg3IhsJWUaN5GAQhKxSd6oS', 'test2@test2.com'),
(4, 1, 'arpan ', 'kumar', 'akumar', '$2y$10$kIA34oaO5Si015gE7WtWUOMj7jQNOUWzLO2b6SQIQh7Yx8R1k.O/i', 'akumar@mail.com'),
(5, 0, 'a', 's', 's', '$2y$10$DCZmlkN/His4C1u7RjprPej2iepIsWEJuzx6OCWkd2xXvEhBr//aK', 'test2@test2.com'),
(6, 0, 'f', 'f', 'f', '$2y$10$WpV7Mz/mxXurgWIdLi6LsOLgCGpkURdkCKPGoPDDA7uGUNMcdF3fS', 't@t'),
(7, 0, 'q', 'wq', 'q', '$2y$10$5obw51iAStl7FcEiHGjI9.e0IXM5tbmT.P56pqO68IFgh25HdLzau', 'test2@test2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`revid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `revid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
