-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2024 at 10:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Catherinian`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `postID` int(5) NOT NULL,
  `comment` text NOT NULL,
  `dateandtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `userID`, `postID`, `comment`, `dateandtime`) VALUES
(16, 9, 6, 'hello this is a comment\\r\\n', '2024-02-21 13:24:42'),
(17, 9, 6, 'commenting test', '2024-02-21 13:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `Bio` text NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `userID`, `Bio`, `likes`, `dislikes`, `date`, `status`) VALUES
(6, 9, 'test post', 1, 1, '0000-00-00 00:00:00', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `postImages`
--

CREATE TABLE `postImages` (
  `ID` int(5) NOT NULL,
  `imagePath` varchar(100) NOT NULL,
  `dateandTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `postID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postImages`
--

INSERT INTO `postImages` (`ID`, `imagePath`, `dateandTime`, `postID`) VALUES
(18, '1 (1).png', '2024-02-18 16:15:49', 6);

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `reactionID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `postID` int(5) NOT NULL,
  `reaction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`reactionID`, `userID`, `postID`, `reaction`) VALUES
(5, 9, 6, 'Like'),
(6, 1, 6, 'Dislike');

-- --------------------------------------------------------

--
-- Table structure for table `userLogin`
--

CREATE TABLE `userLogin` (
  `userID` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accountType` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userLogin`
--

INSERT INTO `userLogin` (`userID`, `idnumber`, `password`, `accountType`, `email`) VALUES
(1, '12345', 'mantsanitas', 'user', 'dadelahi.raj@gmail.com'),
(2, '0', '', 'User', ''),
(3, '0', '', 'User', ''),
(4, '45678', 'password', 'User', ''),
(5, '5786', '05786', 'User', ''),
(6, '9865', '09865', 'User', ''),
(7, 'ADMIN', '123', 'Admin', ''),
(8, '2456', 'password', 'User', ''),
(9, '78965', 'password', 'User', ''),
(10, '567567', '317677', 'User', 'yannacamacho18@gmail.com'),
(11, '678676', '102074', 'User', ''),
(12, '18722991', '267052', 'Moderator', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `comments_ibfk_1` (`postID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `postImages`
--
ALTER TABLE `postImages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`reactionID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `userLogin`
--
ALTER TABLE `userLogin`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `postImages`
--
ALTER TABLE `postImages`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `reactionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userLogin`
--
ALTER TABLE `userLogin`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `userLogin` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userLogin` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postImages`
--
ALTER TABLE `postImages`
  ADD CONSTRAINT `postimages_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reaction`
--
ALTER TABLE `reaction`
  ADD CONSTRAINT `reaction_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `userLogin` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
