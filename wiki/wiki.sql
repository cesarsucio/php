-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2015 at 07:58 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `date_posted` datetime NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_body` text NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `allow_comments` tinyint(1) NOT NULL,
  `category_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Microsoft Exchange', 'Area for Windows operating systems that can cross between multiple versions, ranging from Windows XP to Windows 10 and all those in between, each of which is developed by Microsoft.'),
(2, 'Windows OS', 'Area for Windows operating systems that can cross between multiple versions, ranging from Windows XP to Windows 10 and all those in between, each of which is developed by Microsoft.'),
(3, 'Microsoft IIS Web Server', 'Microsoft IIS is an extremely popular web server. Microsoft IIS has changed and grown beyond its modest boundaries under Windows NT, its strength boosted by the creation of the .NET framework. As well as being a popular web server, it plays a critical role alongside many of Microsoft''s application servers. Perhaps the most well-known are Microsoft Exchange and Microsoft Lync.'),
(4, 'Active Directory', 'Active Directory (AD) is a Microsoft brand for identity-related capabilities. In the on-premises world, Windows Server AD provides a set of identity capabilities and services, and is hugely popular (88% of Fortune 1000 and 95% of enterprises use AD). This topic includes all things Active Directory including DNS, Group Policy, DFS, troubleshooting, ADFS, and all other topics under the Microsoft AD and identity umbrella.'),
(5, 'Linux', 'Linux is a very popular free and open source OS with a very large user and support community. Linux runs on a lot of devices, like PC hardware, (ARM) embedded devices like switches/routers, TVs and set top boxes.'),
(6, 'MS Applications', 'Microsoft is mostly known for its operating systems, its Office suite and its server and enterprise software, Microsoft Exchange and SQL Server. But it has a lot of other packages, and this topic is where you can find out about them.'),
(7, 'Web Browsers', 'Web browsers are your vehicle for taking a safari on the Internet. Sometimes, you''ve get a bicycle, sometimes the latest Ferrari. But you really want a more secure vehicle in a safari because of predators. Browsing the web is dangerous, and your browser may have some issues correctly displaying even a simple page. This topic will help you find out why you''re having problems viewing pages.'),
(8, 'VB Script', 'VBScript (Visual Basic Scripting) is a general purpose scripting language developed by Microsoft modeled on the Visual Basic language. It is mainly used by system administrators in Microsoft environments to perform a wide range of tasks. VBScript uses the COM (Component Object Model) to access its host environment. It is also used in embedded applications. It is slowly being replaced by PowerShell.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `comment_body` text NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `comment_date` datetime NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `article_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `user_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_password` varchar(40) NOT NULL,
  `user_email` varchar(254) NOT NULL,
  `user_pic` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `user_bio` text NOT NULL,
  `date_joined` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `user_id`, `user_password`, `user_email`, `user_pic`, `is_admin`, `user_bio`, `date_joined`) VALUES
('admin', '', 'admin', 4, 'password', 'cesarjesparza@gmail.com', '', 1, '', '0000-00-00 00:00:00'),
('', '', 'administrator', 8, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin@bob.com', '', 0, '', '2015-06-15 20:19:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
