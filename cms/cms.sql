-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2012 at 05:21 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `created_by` varchar(150) NOT NULL,
  `created_on` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_by`, `created_on`) VALUES
(1, 'jquery', 'admin', '2012-04-14 09:25:12'),
(2, 'php', 'admin', '2012-04-14 09:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `website` varchar(150) NOT NULL,
  `comments` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_date` varchar(40) NOT NULL,
  `comment_time` varchar(40) NOT NULL,
  `comment_status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `website`, `comments`, `post_id`, `comment_date`, `comment_time`, `comment_status`) VALUES
(1, 'Aman', 'harry.30virk@gmail.com', '', 'This is nice\r\n', 1, '2012-04-14', '05:11:48', 'Pending'),
(2, 'aman', 'harry.30virk@gmail.com', '', 'this is awesome', 1, '2012-04-14', '07:11:35', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `categories` varchar(200) NOT NULL,
  `post_meta` varchar(200) NOT NULL,
  `post_robots` varchar(200) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` varchar(40) NOT NULL,
  `post_status` varchar(20) NOT NULL,
  `imageref` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `categories`, `post_meta`, `post_robots`, `meta_title`, `meta_description`, `created_by`, `created_on`, `post_status`, `imageref`) VALUES
(1, 'Drag and Drop Admin Interface - Enhanced', 'Recently i have made a tutorial on how to create drag and drop interface than i received a request if i can show how to setup database for that, that''s why this time i would be showing you how to setup it''s database\r\n\r\nWe would be using Jquery UI Sortable Widget to add interactivity to our blocks \r\n\r\n<strong>Go to full screen for better view</strong>\r\n\r\n<iframe width="570" height="315" src="http://www.youtube.com/embed/Bh8yFv7gDTQ" frameborder="0" allowfullscreen></iframe>', 'php,jquery', 'jquery,drag,drop,php', 'Drag and Drop Jquery Interface', 'Drag and Drop Jquery Interface', 'Drag and Drop Jquery Interface', 'admin', '2012-04-14 09:26:43', 'Published', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_meta`
--

CREATE TABLE IF NOT EXISTS `site_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `type` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_meta`
--

INSERT INTO `site_meta` (`id`, `name`, `type`) VALUES
(1, 'portfolio', 'theme');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `last_log_time` varchar(40) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `last_log_time`, `user_status`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '2012-04-16 10:22:44', 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
