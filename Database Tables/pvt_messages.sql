-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 09:10 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends`
--

-- --------------------------------------------------------

--
-- Table structure for table `pvt_messages`
--

CREATE TABLE IF NOT EXISTS `pvt_messages` (
  `id` int(11) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `msg_title` text NOT NULL,
  `msg_body` text NOT NULL,
  `date` date NOT NULL,
  `opened` varchar(255) NOT NULL,
  `deleted` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pvt_messages`
--

INSERT INTO `pvt_messages` (`id`, `user_from`, `user_to`, `msg_title`, `msg_body`, `date`, `opened`, `deleted`) VALUES
(1, 'himan085', 'juhi66', 'hi anshu', 'Enter the message.', '2017-01-23', 'yes', 'yes'),
(2, 'himan085', 'juhi66', 'hfh', 'hvchfhh', '2017-01-23', 'yes', 'yes'),
(3, 'juhi66', 'himan085', 'hi anshu', 'hoe are you??', '2017-01-25', 'yes', 'yes'),
(4, 'juhi66', 'himan085', 'hello threr!', 'Lets party tonite!.\r\n', '2017-01-25', 'yes', 'yes'),
(5, 'himan085', 'palit', 'Welcome', 'Hi How are you bro??', '2017-01-25', 'yes', 'yes'),
(6, 'himan085', 'palit', 'mm missing u', 'mm missing u', '2017-01-25', 'yes', 'yes'),
(7, 'himan085', 'palit', 'gjgfshfghf', 'ghfjgfjf fhdfbhd fddfhdfh', '2017-01-25', 'yes', 'yes'),
(8, 'palit', 'himan085', 'please open this!', 'Fuck u man!', '2017-01-25', 'yes', 'yes'),
(9, 'himan085', 'palit', 'gfsfffgfg', 'Enter the message you wish to s', '2017-01-25', 'yes', 'yes'),
(10, 'himan085', 'palit', 'uohkhk', 'Enter the message ', '2017-01-25', 'yes', 'yes'),
(11, 'himan085', 'palit', 'iyhk', 'Enter the message you wis', '2017-01-25', 'yes', 'yes'),
(12, 'palit', 'himan085', 'jgj', 'Enter the message you wish to  ...', '2017-01-25', 'yes', 'yes'),
(13, 'palit', 'himan085', 'please open this', 'Enter the message g to send ...', '2017-01-25', 'yes', 'yes'),
(14, 'palit', 'himan085', 'gdddfh', 'Enter the message you wishh..', '2017-01-25', 'yes', 'no'),
(15, 'himan085', 'palit', 'fhhf', 'Enter the messhfhe you wish to send ...', '2017-01-25', 'yes', 'yes'),
(16, 'himan085', 'palit', 'fhffd', 'Enter the mfhfhe you wish to send ...', '2017-01-25', 'yes', 'yes'),
(17, 'himan085', 'palit', 'fhhdf', 'Enter the mesfhffge you wish to send ...', '2017-01-25', 'yes', 'yes'),
(18, 'himan085', 'palit', 'nnfjsf', 'ncjsnc sdkjbnsazjfs sajbfkjb', '2017-01-26', 'yes', 'no'),
(19, 'himan085', 'palit', 'vncg', 'Enter the message you wfhb', '2017-01-26', 'yes', 'no'),
(20, 'himan085', 'palit', 'fgfgf', 'Enter the message you wish to senfhhfhd ...', '2017-07-06', 'yes', 'no'),
(21, 'himan085', 'juhi66', 'grfrg', 'Enter httht thbt tger tg', '2017-07-06', 'yes', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pvt_messages`
--
ALTER TABLE `pvt_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pvt_messages`
--
ALTER TABLE `pvt_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
