-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 09:56 AM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL,
  `bio` text NOT NULL,
  `profile_pic` text NOT NULL,
  `friend_array` text NOT NULL,
  `closed` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `activated`, `bio`, `profile_pic`, `friend_array`, `closed`) VALUES
(5, 'juhi66', 'juhi', 'gupta', 'juhi.c5gupta.juhi5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-01-11', '0', 'Write something about yourself.', '', 'himan085,palit', 'no'),
(6, 'himan085', 'himanshu', 'Gupta', 'hmnshgta088@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-01-11', '0', 'I am a student @ NITJgfcgbxvcx', 'uploads/album_pics/20151020_220039.jpg', 'palit,juhi66,hirak', 'no'),
(9, 'palit', 'Saurav', 'Palit', 'sauravpalit123@gmail.com', 'a9d898c665bdda0ddca9facaad1e53e4', '2017-01-22', '0', 'Write something about yourself.', 'uploads/profile_pics/15823259_1825593477655302_9024108346392598939_n.jpg', 'himan085,juhi66', 'no'),
(10, 'newuser', 'newuser', 'newuser', 'newuser', '0354d89c28ec399c00d3cb2d094cf093', '2017-01-23', '0', 'Write something about yourself.', '', '', 'yes'),
(11, 'hirak', 'hirak', 'hirak', 'hirak@gmail.com', '21dcaf22aa091f51aa2be0700169b62a', '2017-07-06', '0', 'Write something about yourself.', 'uploads/profile_pics/b_three-golden-fish.jpg', 'himan085', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
