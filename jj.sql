-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2013 at 10:19 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jj`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wive', 'In  My  Dreams'),
(2, 'Adele', '21'),
(3, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
(5, 'patrick kelly', 'rock them all'),
(6, 'caca', 'caca');

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE IF NOT EXISTS `carousels` (
  `carousel_id` int(11) NOT NULL AUTO_INCREMENT,
  `carousel_order` int(11) NOT NULL,
  `carousel_page` varchar(40) NOT NULL,
  `carousel_subtitle` varchar(40) NOT NULL,
  PRIMARY KEY (`carousel_id`),
  UNIQUE KEY `carousel_id` (`carousel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`carousel_id`, `carousel_order`, `carousel_page`, `carousel_subtitle`) VALUES
(1, 1, 'what', 'Lets get started'),
(2, 2, 'what', 'Then lets do this'),
(3, 3, 'what', 'And tadaw!!');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `order_id` int(20) NOT NULL,
  `label` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(40) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `order_id`, `label`, `text`, `img`) VALUES
(1, 'home', 0, 'first label', 'this is home', 'home.png'),
(2, 'why', 0, '', 'blbalblalblblablablblablablalblablablablablablablablablablablablabvalblbalablalbdfjlfdj  blbalblalblblablablblablablalblablablablablablablablablablablablabvalblbalablalbdfjlfdj  blbalblalblblablablblablablalblablablablablablablablablablablablabvalblbalablalbdfjlfdjvvvv \r\n', 'why.png'),
(3, 'how', 0, '', 'How to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldj How to blalbalbk;adfsjldjv How to blalbalbk;adfsjldj How to blalbalbk;adfsjldjHow to blalbalbk;adfsjldj', 'how.png'),
(4, 'system', 0, '', 'ipsum caca', 'system.png'),
(5, 'what', 0, '', 'This is what we do for you.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et sapien massa. Phasellus vel ante eget sapien lobortis fermentum at non mauris. Suspendisse mi urna, volutpat sed consequat eu, dignissim ac elit. Nullam ligula lacus, scelerisque semper cursus at, egestas ac ante. Quisque vel ipsum mi. Maecenas eu elit rutrum urna porta venenatis sit amet in nisi. Mauris vel mi dui. Suspendisse ac neque lorem. Ut aliquet pretium erat at feugiat. Etiam vel nulla a turpis fringilla volutpat.\r\n\r\nPellentesque ut lectus a libero adipiscing convallis. Etiam ac orci ac tortor interdum blandit in sit amet eros. Nunc quis diam augue. Mauris id eros et magna placerat porttitor. Nulla ut ligula odio, vitae tristique metus. Aliquam erat volutpat. Integer ac suscipit urna. Maecenas scelerisque accumsan justo, in blandit diam viverra accumsan. Maecenas tincidunt augue id nisl dignissim tristique adipiscing magna accumsan. Curabitur vehicula quam quis leo gravida quis varius neque viverra. Vivamus rutrum, ligula ultrices porta consequat, velit mi faucibus risus, sit amet scelerisque velit magna ut arcu. Mauris ut lorem a ante ullamcorper sollicitudin. Suspendisse semper commodo lobortis. Praesent in odio est. ', 'what.png'),
(6, 'gg', 0, '', 'love you killian', 'csca,gshj'),
(7, 'home', 1, 'the secon label', 'the second carousel', 'second.png'),
(8, 'home', 2, 'the third label', 'the third carousel', 'third.png');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `page` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `page`) VALUES
(1, 'flower.png', 'flower');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(30) NOT NULL,
  `carousel` tinyint(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `text`, `img`, `carousel`, `name`) VALUES
(1, 'Home', 'this is home', 'home.png', 1, 'home'),
(2, 'Why?', 'blbalblalblblablablblablablalblablablablablablablablablablablablabvalblbalablalbdfjlfdj  blbalblalblblablablblablablalblablablablablablablablablablablablabvalblbalablalbdfjlfdj  blbalblalblblablablblablablalblablablablablablablablablablablablabvalblbalablalbdfjlfdjvvvv \r\n', 'why.png', 0, 'why'),
(3, 'How?', 'How to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldjHow to blalbalbk;adfsjldj How to blalbalbk;adfsjldjv How to blalbalbk;adfsjldj How to blalbalbk;adfsjldjHow to blalbalbk;adfsjldj', 'how.png', 1, 'how'),
(4, 'the system', 'ipsum caca', 'system.png', 1, 'system'),
(6, 'WHAT WE DO?', 'This is what we do for you.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et sapien massa. Phasellus vel ante eget sapien lobortis fermentum at non mauris. Suspendisse mi urna, volutpat sed consequat eu, dignissim ac elit. Nullam ligula lacus, scelerisque semper cursus at, egestas ac ante. Quisque vel ipsum mi. Maecenas eu elit rutrum urna porta venenatis sit amet in nisi. Mauris vel mi dui. Suspendisse ac neque lorem. Ut aliquet pretium erat at feugiat. Etiam vel nulla a turpis fringilla volutpat.\r\n\r\nPellentesque ut lectus a libero adipiscing convallis. Etiam ac orci ac tortor interdum blandit in sit amet eros. Nunc quis diam augue. Mauris id eros et magna placerat porttitor. Nulla ut ligula odio, vitae tristique metus. Aliquam erat volutpat. Integer ac suscipit urna. Maecenas scelerisque accumsan justo, in blandit diam viverra accumsan. Maecenas tincidunt augue id nisl dignissim tristique adipiscing magna accumsan. Curabitur vehicula quam quis leo gravida quis varius neque viverra. Vivamus rutrum, ligula ultrices porta consequat, velit mi faucibus risus, sit amet scelerisque velit magna ut arcu. Mauris ut lorem a ante ullamcorper sollicitudin. Suspendisse semper commodo lobortis. Praesent in odio est. ', 'what.png', 1, 'what'),
(7, 'caca', 'love killian', 'csca,gshj', 0, 'gg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
