-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2013 at 10:36 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wive', 'In  My  Dreams'),
(2, 'Adele', '21'),
(3, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
(5, 'patrick kelly', 'rock them all'),
(6, 'caca', 'caca'),
(7, 'moi', 'caca');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `order_id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `media` varchar(40) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `order_id`, `title`, `label`, `text`, `media`) VALUES
(1, 'what', 0, 'whateva!', '', 'Our treatment room software helps you view patient x histories, transcribe your SOAP notes, create prescriptions, and the other things you need to do in the treatment room.Our office software helps medical office assistants with all their tasks from booking to billing and everything in between. always a margin!!!', '2'),
(2, 'why', 0, 'We Believe in the Doctor-Patient Relationship!', '', 'This relationship gives patients the courage to endure painful treatments and it adds meaning to the doctor''s work. We make Electronic Medical Records (EMR) software that gets out of your way so that you can focus on your patients. It lets doctors be doctors.', '3'),
(3, 'how', 0, 'You Are Now Free to do What You do Best: Patient Care!', '', 'Imagine more eye contact with your patient and less with the screen. Imagine never having to write or type your SOAP notes.', '4'),
(4, 'system', 0, 'Our System is a Team of 5 Computers Who Play Different Roles in Your Office', '1) The Welcome', 'Know how many patients come through your doors and if they were on-time.\n\nEvery patient that comes will sign-in on this device. Instantly, your other computers will remind you to collect money, give documents, or the other things we sometimes forget to do while your patients are in the offices!!!\n', '5'),
(5, 'system', 1, 'Our System is a Team of 5 Computers Who Play Different Roles in Your Office', '2) The Wait is almost done', 'Let your patients help you too. While your patients wait in the waiting room, they can use that time to enter their demographic data, update their phone numbers, scan their Health cards, and even enter symptoms.', '6'),
(6, 'system', 2, 'Our System is a Team of 5 Computers Who Play Different Roles in Your Office', '3) The Tracker', 'Always know where your patients are. This computer keeps track of  all your patients in the office and how many more are coming today. It will also tell your other computers too.', '7'),
(7, 'system', 3, 'Our System is a Team of 5 Computers Who Play Different Roles in Your Office', '4) The Assistant', 'The computer by your side. Document your patient encounter without any typing or writing! Nuance’s revolutionary technology does the typing, and gets even better as it learns. Just like a real assistant should.', '8'),
(8, 'system', 4, 'Our System is a Team of 5 Computers Who Play Different Roles in Your Office', '5) Mission Controls', 'the third carousel', '9'),
(9, 'start', 0, 'To install our system is as easy as 1-2-3! And it’s completely FREE! And you can stop at any time!', 'Step 1', 'Let’s connect. Give us a call toll free (1-855-621-2345) or email us at info@medicuscorda.com.', 'page11.gif'),
(10, 'start', 1, '', 'Step 2', 'Let’s meet. A friendly person from Medicus Corda will volunteer to work with your Medical Office Assistants to understand the workflow of your office. We’ll modify our system to fit. ', 'page12.gif'),
(11, 'start', 2, '', 'Step 3', 'Let’s test. That friendly volunteer will be with you as you test our system in your office.\r\n\r\nIf you decide to continue, there will be some equipment purchases (e.g. iPads, iPad Stands) and a flat monthly fee.\r\n\r\nNo Installation Fee!\r\n\r\nNo Training Fees!\r\n\r\nCancel at Anytime!\r\n\r\nWe make it easy. We’re with you at every step: from installation, to training, to go-live, and beyond.\r\n', 'page13.gif'),
(12, 'faq', 0, 'Frequently Asked Questions', '', '<p class=''question''>Do we have to scan all our records?</p>\r\n                                        <p>No. We recommend a gradual adoption of  EMR. That means using paper and EMR together until enough of  the patient history is in electronic format.</p>\r\n                                        <p class=''question''>Do our patients have to agree to have their medical records in electronic format?</p>\r\n                                        <p>Yes. Our lawyers drafted that document for you.</p>\r\n                                        <p class=''question''>Is the Internet secure?</p>\r\n\r\n<p>No. Like our city roadways, Internet traffic is not secure. What makes the Internet secure are the protections we implement.</p>', 'page15.gif'),
(13, 'faq', 1, '', '', '<p class=''question''>What if the Internet fails?</p>\r\n                                        <p>It is always good to prepare for the worst situations. That is why you can still treat scheduled patients without Internet for a limited time so that you can repair the situation without skipping a beat.</p>\r\n                                        <p class=''question''>Is my data secure?</p>\r\n                                        <p>Yes. Your data is stored on servers that reside in a guarded maximum security Canadian datacenter that requires keys, keycards, and fingerprints to access. </p>\r\n                                        <p>The data is simultaneously stored on many hard drives including a remote backup.</p>\r\n                                       <p class=''question''>What does this system require to start?</p>\r\n                                        <p>This system is designed to be inexpensive and easy to setup. It requires equipment that is likely to already be in your office: a computer, wireless router, a printer, and Internet. An iPad is on us!</p>\r\n                                        <p class=''question''>What is the most gradual way I can adopt EMR?</p>\r\n                                        <p>You can use the complete version of  our office software for a flat monthly fee. </p>\r\n                                        <p>After your staff  is comfortable with our office software, you can begin to use the treatment room software on the iPad for an additional monthly fee.</p>', 'page15.gif'),
(14, 'cost', 0, '		This is the cost sections!', '', 'the cost section\n', 'page14.gif'),
(136, 'testmedia', 1, 'Testing the media widget', 'badflb', 'kjnfdkjgnkjfn', '2'),
(137, 'Egjhg', 100, 'Francis is noob', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `page` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `page`) VALUES
(1, 'flower.png', 'flower');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `content_id` int(12) NOT NULL,
  `kind` varchar(12) NOT NULL,
  `url` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `content_id`, `kind`, `url`) VALUES
(1, 136, 'youtube', 'Yj6nqPeGaoE'),
(2, 136, 'img', 'http://site.jj/img/page6.gif'),
(3, 0, 'img', 'http://site.jj/img/page4.gif'),
(4, 0, 'img', 'http://site.jj/img/page5.gif'),
(5, 0, 'img', 'http://site.jj/img/page6.gif'),
(6, 0, 'img', 'http://site.jj/img/page7.gif'),
(7, 0, 'img', 'http://site.jj/img/page8.gif'),
(8, 0, 'img', 'http://site.jj/img/page9.gif'),
(9, 0, 'img', 'http://site.jj/img/page10.gif');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `template` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `order_id`, `title`, `name`, `template`) VALUES
(3, 6, 'HOW', 'how', 1),
(4, 0, 'THE SYSTEM', 'system', 2),
(5, 0, 'gfgkgk', 'Egjhg', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
