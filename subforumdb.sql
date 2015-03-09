-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 09:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `subforumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
`postnum` int(11) NOT NULL,
  `username` varchar(18) CHARACTER SET utf8 NOT NULL,
  `subject` text CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`postnum`, `username`, `subject`, `date`, `message`) VALUES
(1, 'Subrosian', 'Welcome to the forum!', 'Mar. 9/15, 12:40AM', 'Welcome to Subrosian''s home-made forum. Hope I get some activity around here!'),
(2, 'Jacob', 'Re: Welcome to the forum!', 'Jan. 31/15, 12:54PM', 'Really, please post!'),
(3, 'Subrosian', 'Re: New post!', 'Mar. 9/15, 12:27AM', 'Hi, this is a new post!');

-- --------------------------------------------------------

--
-- Table structure for table `gaming`
--

CREATE TABLE IF NOT EXISTS `gaming` (
`postnum` int(11) NOT NULL,
  `username` varchar(18) CHARACTER SET utf8 NOT NULL,
  `subject` text CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gaming`
--

INSERT INTO `gaming` (`postnum`, `username`, `subject`, `date`, `message`) VALUES
(1, 'Subrosian', 'So, about Super Smash Bros for Wii U', 'Jan. 31/15, 2:34PM', 'I haven''t gotten around to play that game very much. What''s your Wii U Friend code? Maybe anyone here can come around to play.'),
(2, 'Jacob', 'Re: So, about Super Smash Bros for Wii U', 'Jan. 31/15, 2:38PM', 'My friend code is 2391-594444-1192. What''s yours?');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE IF NOT EXISTS `general` (
`postnum` int(11) NOT NULL,
  `username` varchar(18) CHARACTER SET utf8 NOT NULL,
  `subject` text CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`postnum`, `username`, `subject`, `date`, `message`) VALUES
(1, 'Subrosian', 'Introduce yourself here!', 'Jan. 31/15, 1:20PM', 'So, my name is Subrosian Laguardia. I''m just some guy who enjoys dwelling basements.'),
(2, 'Jacob', 'Re: Introduce yourself here!', 'Jan. 31/15, 1:25PM', 'So, I''m Jacob Bell. I''m just an 18 year old freelancer from the Yukon who makes a living off of sculpting snow goons, and in his spare time likes to chill in the basement of his 150 sq. meter igloo.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
 ADD PRIMARY KEY (`postnum`), ADD UNIQUE KEY `postnum` (`postnum`);

--
-- Indexes for table `gaming`
--
ALTER TABLE `gaming`
 ADD PRIMARY KEY (`postnum`), ADD UNIQUE KEY `postnum` (`postnum`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
 ADD PRIMARY KEY (`postnum`), ADD UNIQUE KEY `postnum` (`postnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
MODIFY `postnum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `gaming`
--
ALTER TABLE `gaming`
MODIFY `postnum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
MODIFY `postnum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
