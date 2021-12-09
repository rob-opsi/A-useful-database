-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: morpheus.cypher.local
-- Generation Time: Jul 1, 2021 at 06:27 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `media_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_genre`
--

CREATE TABLE IF NOT EXISTS `book_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `book_genre`
--

INSERT INTO `book_genre` (`id`, `genre_name`) VALUES
(1, 'Comedy'),
(2, 'Romance');
(3, 'Science Fiction');
(4, 'Factual');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE IF NOT EXISTS `borrowed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(15) NOT NULL,
  `borrowed_by` int(5) NOT NULL,
  `date_borrowed` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`id`, `title`, `borrowed_by`, `date_borrowed`) VALUES
(1, 42, 9, '2015-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'PS3 Games'),
(2, 'PS4 Games'),
(3, 'PS Vita Games'),
(4, 'DVD'),
(5, 'Blueray'),
(6, 'Music'),
(7, 'Book');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `house_number` varchar(150) NOT NULL,
  `town` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `post_code` varchar(25) NOT NULL,
  `borrowed` int(1) NOT NULL,
  `notes` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `email`, `phone`, `house_number`, `town`, `city`, `post_code`, `borrowed`, `notes`) VALUES
(9, 'Samuel', 'Thornhill', 'samuel.thornhill@gmail.com', '', '', 'Birmingham', 'United Kingdom', 'B735NR', 1, 'This is a note.');

-- --------------------------------------------------------

--
-- Table structure for table `game_genre`
--

CREATE TABLE IF NOT EXISTS `game_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `game_genre`
--

INSERT INTO `game_genre` (`id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'RPG'),
(4, 'Sports'),
(5, 'Simulation'),
(6, 'Shooter'),
(7, 'Strategy');

-- --------------------------------------------------------

--
-- Table structure for table `game_type`
--

CREATE TABLE IF NOT EXISTS `game_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `game_type`
--

INSERT INTO `game_type` (`id`, `type_name`) VALUES
(1, 'Physical Copy'),
(2, 'Download');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_category` int(3) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `album` varchar(100) NOT NULL,
  `track` int(3) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `borrowed` int(1) NOT NULL,
  `author` varchar(100) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_category`, `genre`, `type`, `album`, `track`, `artist`, `location`, `borrowed`, `author`, `isbn`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE IF NOT EXISTS `movie_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `genre_name`) VALUES
(1, 'Action'),
(3, 'Comedy'),
(4, 'Crime & Gangster'),
(5, 'Drama'),
(6, 'Horror'),
(7, 'Musicals'),
(8, 'Science Fiction'),
(9, 'War'),
(11, 'Documentary'),
(14, 'Western')
(10, 'Science Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `music_genre`
--

CREATE TABLE IF NOT EXISTS `music_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `music_genre`
--

INSERT INTO `music_genre` (`id`, `genre_name`) VALUES
(5, 'Classical'),
(7, 'Country'),
(8, 'Dance'),
(10, 'Hip-Hop/Rap'),
(11, 'Holiday'),
(12, 'Gospel'),
(13, 'Christian'),
(15, 'Pop'),
(16, 'R&B/Soul'),
(17, 'Reggae'),
(19, 'Rock'),
(22, 'Alternative');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`) VALUES
(1, 'ST', 'Samuel Thornhill', 'password');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
