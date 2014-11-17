-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2014 at 04:09 PM
-- Server version: 5.1.67-rel14.3-log
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medicusc_zend`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `order_id`, `title`, `label`, `text`, `media`) VALUES
(1, 'what', 0, 'Electronic Medical Records.', '', 'Our treatment room software helps you view patient histories, transcribe your SOAP notes, create prescriptions, and the other things you need to do in the treatment room.\n\nOur office software helps medical office assistants with all their tasks from booking to billing and everything in between.', '122'),
(2, 'why', 1, 'We Believe in the Doctor-Patient Relationship.', '', 'This relationship gives patients the courage to endure painful treatments and it adds m<span style="font-size: 14px; line-height: 1.428571429;">eaning to the doctor''s work. We make Electronic Medical Records (EMR) software that gets out of your way so that you can focus on your patients. It lets doctors be doctors.<br></span>', '131'),
(3, 'how', 2, 'You Are Now Free to do What You do Best: Patient Care', '', 'Imagine more eye contact with your patient and less with the screen. Imagine never having to write or type your SOAP notes.', '117'),
(4, 'system', 3, 'The System', '1) The Welcome', 'Know how many patients come through your doors and if they were on-time.\n\nEvery patient that comes will sign-in on this device. Instantly, your other computers will remind you to collect money, give documents, or the other things we sometimes forget to do while your patients are in the office.', '118'),
(5, 'system', 1, 'The System', '2) The Wait', 'Let your patients help you too. While your patients wait in the waiting room, they can use that time to enter their demographic data, update their phone numbers, scan their Health cards, and even enter symptoms.', '125'),
(6, 'system', 2, 'The System', '3) The Tracker', 'Always know where your patients are. This computer keeps track of  all your patients in the office and how many more are coming today. It will also tell your other computers too.', '123'),
(7, 'system', 3, 'The System', '4) The Assistant', 'The computer by your side. Document your patient encounter without any typing or writing! Nuance’s revolutionary technology does the typing, and gets even better as it learns. Just like a real assistant should.', '127'),
(8, 'system', 4, 'The System', '5) Mission Control', 'The heart of  the system. Labs come in, bills go out, and nothing is lost in the\r\n\r\n                                                                            traffic. It even monitors your chronic care and complex care bonuses so that all \r\n\r\n                                                                            your work will not be forgotten.', '108'),
(9, 'get_started', 0, 'To install our system is as easy as 1-2-3! And it’s completely FREE! And you can stop at any time!', 'Step 1', 'Let’s connect. Give us a call toll free (1-855-621-2345) or email us at info@medicuscorda.com.', '109'),
(10, 'get_started', 1, '', 'Step 2', 'Let’s meet. A friendly person from Medicus Corda will volunteer to work with your Medical Office Assistants to understand the workflow of your office. We’ll modify our system to fit. ', '110'),
(11, 'get_started', 2, '', 'Step 3', 'Let’s test. That friendly volunteer will be with you as you test our system in your office.\r\n\r\nIf you decide to continue, there will be some equipment purchases (e.g. iPads, iPad Stands) and a flat monthly fee.\r\n\r\nNo Installation Fee!\r\n\r\nNo Training Fees!\r\n\r\nCancel at Anytime!\r\n\r\nWe make it easy. We’re with you at every step: from installation, to training, to go-live, and beyond.\r\n', '111'),
(12, 'faq', 0, 'Frequently Asked Questions', '', '<p class=''question''>Do we have to scan all our records?</p>\r\n                                        <p>No. We recommend a gradual adoption of  EMR. That means using paper and EMR together until enough of  the patient history is in electronic format.</p>\r\n                                        <p class=''question''>Do our patients have to agree to have their medical records in electronic format?</p>\r\n                                        <p>Yes. Our lawyers drafted that document for you.</p>\r\n                                        <p class=''question''>Is the Internet secure?</p>\r\n\r\n<p>No. Like our city roadways, Internet traffic is not secure. What makes the Internet secure are the protections we implement.</p>', '112'),
(13, 'faq', 1, '', 'Most asked', '<p class=''question''>What if the Internet fails?</p>\r\n                                        <p>It is always good to prepare for the worst situations. That is why you can still treat scheduled patients without Internet for a limited time so that you can repair the situation without skipping a beat.</p>\r\n                                        <p class=''question''>Is my data secure?</p>\r\n                                        <p>Yes. Your data is stored on servers that reside in a guarded maximum security Canadian datacenter that requires keys, keycards, and fingerprints to access. </p>\r\n                                        <p>The data is simultaneously stored on many hard drives including a remote backup.</p>\r\n                                       <p class=''question''>What does this system require to start?</p>\r\n                                        <p>This system is designed to be inexpensive and easy to setup. It requires equipment that is likely to already be in your office: a computer, wireless router, a printer, and Internet. An iPad is on us!</p>\r\n                                        <p class=''question''>What is the most gradual way I can adopt EMR?</p>\r\n                                        <p>You can use the complete version of  our office software for a flat monthly fee. </p>\r\n                                        <p>After your staff  is comfortable with our office software, you can begin to use the treatment room software on the iPad for an additional monthly fee.</p>', '113'),
(14, 'cost', 0, 'The Cost', '', '<p>Call us for the cost: 1-855-621-2345.</p><p><br></p><p>No Installation Fees!</p><p><br></p><p>No Training Fees!</p><p><br></p><p>Cancel at anytime.</p>', '130'),
(190, 'jj', 100, '', 'Questions', '', ''),
(191, 'jj', 100, '', 'Questions', '', ''),
(196, 'newage', 100, '.,mn', '', '<p>afasdafsfdasdllmfas,m,m</p><p>jljljfafasfafk</p>', ''),
(198, 'wowowow', 100, 'lkljl;j;lk', '', '', ''),
(199, 'newpage', 100, 'Newest Page', '', '<p>This is the new page.</p>', '137');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `content_id`, `kind`, `url`) VALUES
(101, 0, 'img', 'img/page3.gif'),
(102, 0, 'img', 'img/page4.gif'),
(103, 0, 'img', 'img/page5.gif'),
(104, 0, 'img', 'img/page6.gif'),
(105, 0, 'img', 'img/page7.gif'),
(106, 0, 'img', 'img/page8.gif'),
(107, 0, 'img', 'img/page9.gif'),
(108, 0, 'img', 'img/page10.gif'),
(109, 0, 'img', 'img/page11.gif'),
(110, 0, 'img', 'img/page12.gif'),
(111, 0, 'img', 'img/page13.gif'),
(112, 0, 'img', 'img/page15.gif'),
(113, 0, 'img', 'img/page15.gif'),
(114, 0, 'img', 'img/page14.gif'),
(115, 1, 'img', '/img/phpklWoK3_5369760f313bd.gif'),
(116, 2, 'img', '/img/phpi5uPQC_53697656b6669.gif'),
(117, 3, 'img', '/img/php5iqqSs_53697674707a0.gif'),
(118, 4, 'img', '/img/phpLyT8QB_536976d5ab3bb.gif'),
(119, 2, 'youtube', '205K9Pim2oE'),
(120, 6, 'youtube', '205K9Pim2oE'),
(121, 1, 'youtube', '205K9Pim2oE'),
(122, 1, 'img', '/img/phpEMS6Zz_5369fcf012209.gif'),
(123, 6, 'img', '/img/phphlF1kZ_5369fd567c6e6.gif'),
(124, 5, 'youtube', 'vwnVI_x5g0I'),
(125, 5, 'img', '/img/phpveduos_5369fe126ee98.gif'),
(126, 7, 'youtube', 'vwnVI_x5g0I'),
(127, 7, 'img', '/img/phprvyRDL_5369fe6d2cc63.gif'),
(128, 2, 'youtube', 'gvRw96qhvPQ'),
(129, 14, 'youtube', '3wn8igSeiCI'),
(130, 14, 'img', '/img/php4TqegJ_536a00baaa49b.gif'),
(131, 2, 'img', '/img/phpDYKtVg_536a00e47ebe0.gif'),
(132, 194, 'img', '/img/phpETP7J2_536a0f64931c2.png'),
(133, 194, 'img', '/img/phpzChtSR_536a0f6fa8346.png'),
(134, 194, 'img', '/img/php5FhCMH_536a0f6ff3045.png'),
(135, 194, 'img', '/img/phpylB0ke_536a0f8287adf.png'),
(136, 199, 'img', '/img/phpdJIjsG_536a6591014f6.jpg'),
(137, 199, 'img', '/img/php7Us2bx_536a6599a413a.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `order_id`, `title`, `name`, `template`) VALUES
(8, 6, 'F.A.Q.', 'faq', 2),
(19, 3, 'System', 'system', 2),
(20, 0, 'What we do', 'what', 1),
(21, 1, 'Why', 'why', 1),
(22, 2, 'How', 'how', 1),
(23, 4, 'Get Started', 'get_started', 2),
(24, 5, 'Cost', 'cost', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `state` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `display_name`, `password`, `state`) VALUES
(1, NULL, 'colin.b.kelly@gmail.com', NULL, '$2y$14$olHna8Z7NYLInE9QIahpeua.xZQ.2qHYxbvjnbG4uT8X8ihm7mOyu', NULL),
(2, NULL, 'patrick.harold.kelly@gmail.com', NULL, '$2y$14$WddLa7wuQYLzwpsdMtu8WOsGFs1TtuHbNvprtQqUvC5/nBH.UZ4Ye', NULL),
(3, NULL, 'jonathan.james.loh@gmail.com', NULL, '$2y$14$cX/2mH5eZtYhGojbDB58lOLQZvyLZ2yovghsjwYCi/DEaLsNenmHG', NULL),
(4, NULL, 'patrick@myevent.com', NULL, '$2y$14$KJSqj9EjCtgSn.GO4JP3Fubf3YC6Wvl8DGVTLZMpgEaUVAEeyAV6q', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_role` (`role_id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `is_default`, `parent_id`) VALUES
(1, 'guest', 1, NULL),
(2, 'user', 0, 1),
(3, 'admin', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_linker`
--

CREATE TABLE IF NOT EXISTS `user_role_linker` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `idx_role_id` (`role_id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role_linker`
--

INSERT INTO `user_role_linker` (`user_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
