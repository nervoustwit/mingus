-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2013 at 05:41 PM
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
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(4) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(20) NOT NULL,
  `page_text` text NOT NULL,
  `page_img` varchar(30) NOT NULL,
  `page_carousel` tinyint(1) NOT NULL,
  `page_name` varchar(20) NOT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_text`, `page_img`, `page_carousel`, `page_name`) VALUES
(1, 'WHAT WE DO?', 'This is what we do for you.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et sapien massa. Phasellus vel ante eget sapien lobortis fermentum at non mauris. Suspendisse mi urna, volutpat sed consequat eu, dignissim ac elit. Nullam ligula lacus, scelerisque semper cursus at, egestas ac ante. Quisque vel ipsum mi. Maecenas eu elit rutrum urna porta venenatis sit amet in nisi. Mauris vel mi dui. Suspendisse ac neque lorem. Ut aliquet pretium erat at feugiat. Etiam vel nulla a turpis fringilla volutpat.\r\n\r\nPellentesque ut lectus a libero adipiscing convallis. Etiam ac orci ac tortor interdum blandit in sit amet eros. Nunc quis diam augue. Mauris id eros et magna placerat porttitor. Nulla ut ligula odio, vitae tristique metus. Aliquam erat volutpat. Integer ac suscipit urna. Maecenas scelerisque accumsan justo, in blandit diam viverra accumsan. Maecenas tincidunt augue id nisl dignissim tristique adipiscing magna accumsan. Curabitur vehicula quam quis leo gravida quis varius neque viverra. Vivamus rutrum, ligula ultrices porta consequat, velit mi faucibus risus, sit amet scelerisque velit magna ut arcu. Mauris ut lorem a ante ullamcorper sollicitudin. Suspendisse semper commodo lobortis. Praesent in odio est. ', 'what.png', 1, 'what');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
