-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 08:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdevproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` int(20) NOT NULL,
  `BookTitle` varchar(40) NOT NULL,
  `Author` varchar(40) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Year` int(4) NOT NULL,
  `Edition` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `BookTitle`, `Author`, `Category`, `Year`, `Edition`) VALUES
(4234, 'The Art of the Deal', 'Donald Trump', 'Business', 1987, 1),
(848474, 'Beans: A History', 'Ken Albala', 'Cookery', 2007, 2),
(8478238, 'Trainspotting', 'Irvine Walsh', 'Fiction', 1996, 2),
(1, 'The Bible', 'The big man', 'Fiction', 35, 1),
(2241, '50 Shades of Grey', 'E.L James', 'Fiction', 2011, 1),
(523, 'How not to die', 'Gene Stone', 'Health', 2015, 2),
(45234, 'Making friends with the menopause', 'Sarah Rayner', 'Health', 2015, 1),
(6231, 'Java 8 in action', 'Alan Mycroft', 'Technology', 2014, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `username` varchar(50) NOT NULL,
  `ISBN` int(10) NOT NULL,
  `Booktitle` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`username`, `ISBN`, `Booktitle`, `Author`) VALUES
('mark', 1, 'Array', 'Array'),
('mark', 1, 'The Bible', 'The big man'),
('mark', 4234, 'The Art of the Deal', 'Donald Trump'),
('jim', 1, 'The ', 'bib'),
('jim', 1, 'The Bible', 'The big man');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` int(10) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Email`, `Phone`, `FirstName`, `LastName`) VALUES
('Jim', '123456', 'ff', 1234567890, 's', 's');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
