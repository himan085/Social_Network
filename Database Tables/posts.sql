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
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `user` varchar(200) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `user`, `date_added`) VALUES
(48, 'my first post', 'juhi66', '2017-01-20'),
(47, 'pinffgtt', 'himan085', '2017-01-20'),
(46, 'pineaff', 'himan085', '2017-01-20'),
(45, 'pineapplegg', 'himan085', '2017-01-20'),
(44, 'pineapple', 'himan085', '2017-01-20'),
(43, 'laura', 'himan085', '2017-01-20'),
(52, 'himam085\n', 'juhi66', '2017-01-21'),
(51, 'himan', 'juhi66', '2017-01-21'),
(50, 'my 3 post\n\n\n', 'juhi66', '2017-01-20'),
(49, 'my second post', 'juhi66', '2017-01-20'),
(42, 'yo man', 'himan085', '2017-01-20'),
(63, 'nkjdfnkldf', 'himan085', '2017-01-26'),
(62, 'nkjdfnkldf', 'himan085', '2017-01-26'),
(53, 'juhi\n', 'juhi66', '2017-01-21'),
(54, 'hhhhhhhhhhhh', 'himan085', '2017-01-21'),
(55, 'kkkk', 'himan085', '2017-01-21'),
(56, 'l', 'himan085', '2017-01-21'),
(57, 'my first account\n', 'palit', '2017-01-22'),
(58, 'Have eEW taKeN youR luncH ??', 'palit', '2017-01-22'),
(59, 'yo amn... new post after so many daysss\n', 'himan085', '2017-01-23'),
(60, 'hfgvhvh', 'himan085', '2017-01-23'),
(61, 'hgfhfdhxgdgdfhhhh', 'himan085', '2017-01-23'),
(64, 'jknkn', 'himan085', '2017-01-26'),
(65, 'jknkn', 'himan085', '2017-01-26'),
(66, 'jknbhjbj', 'himan085', '2017-01-26'),
(67, 'MyÂ goalÂ wasÂ toÂ learnÂ aboutÂ theÂ stateÂ ofÂ artificialÂ intelligenceÂ ', 'palit', '2017-01-26'),
(68, 'MyÂ goalÂ wasÂ toÂ learnÂ aboutÂ theÂ stateÂ ofÂ artificialÂ intelligenceÂ ', 'palit', '2017-01-26'),
(69, '\nMy goal was to learn about the state of artificial intelligence \nMy goal was to learn about the state of artificial intelligence ', 'palit', '2017-01-26'),
(70, '\nMy goal was to learn about the state of artificial intelligence .\nMy goal was to learn about the state of artificial intelligence ', 'palit', '2017-01-26'),
(71, 'My goal was to learn about the state of artificial intelligence .\nMy goal was to learn about the state of artificial intelligence .\nMy goal was to learn about the state of artificial intelligence .', 'palit', '2017-01-26'),
(72, 'So', 'juhi66', '2017-01-26'),
(73, 'So so So so So so So so So so So so So so So so So so So so ', 'juhi66', '2017-01-26'),
(74, 'So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so ', 'juhi66', '2017-01-26'),
(75, 'So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so. So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so So so ', 'juhi66', '2017-01-26'),
(76, 'v', 'himan085', '2017-01-27'),
(77, 'jnbjb', 'himan085', '2017-03-17'),
(78, 'This is my new post after a long time\n', 'himan085', '2017-07-06'),
(79, 'yo everyone\n', 'himan085', '2017-07-06'),
(80, 'I am hirak\n', 'himan085', '2017-07-06'),
(81, 'fedadg', 'hirak', '2017-07-06'),
(82, 'fedadg', 'hirak', '2017-07-06'),
(83, 'fedadg', 'hirak', '2017-07-06'),
(84, 'fedadg', 'hirak', '2017-07-06'),
(85, 'fedadg', 'hirak', '2017-07-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
