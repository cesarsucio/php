-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2015 at 05:35 PM
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

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `date_posted`, `article_title`, `article_body`, `user_id`, `is_published`, `allow_comments`, `category_id`) VALUES
(1, '2015-05-04 00:00:00', 'This is the first article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', 1, 1, 1, 1),
(2, '2015-05-03 00:00:00', 'This is the second article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', 2, 1, 1, 2),
(3, '2015-05-15 00:00:00', 'This is the third article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', 3, 1, 1, 3),
(4, '2015-06-08 00:00:00', 'About this KnowledgeBase', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper nec mi a eleifend. Nulla nisl elit, imperdiet non tortor ut, tempus tempus enim. Mauris vitae tortor varius, mollis ligula ut, aliquet leo. Etiam facilisis turpis at faucibus porttitor. Suspendisse non metus nec est mollis fermentum. Phasellus luctus nulla arcu, sed scelerisque ante consectetur a. Suspendisse est tellus, viverra ut ullamcorper eleifend, consectetur sed velit. Nulla quam mauris, ullamcorper id arcu et, molestie vestibulum lorem. Phasellus interdum dolor vitae turpis bibendum efficitur. Aliquam ut rutrum massa. Nullam quam eros, dignissim nec tellus non, maximus luctus lectus. Nam tincidunt porta urna sit amet commodo. Etiam auctor in metus in porta. Nulla metus lectus, dapibus non velit quis, pretium pellentesque magna. Duis scelerisque justo justo, ut porttitor elit dapibus ac. Curabitur auctor vestibulum diam.\r\n\r\nEtiam et orci ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec et dignissim justo. Maecenas vitae erat augue. Phasellus erat nisi, congue quis congue sit amet, euismod et libero. Nunc placerat, justo eget posuere porttitor, ipsum massa lobortis erat, sit amet faucibus felis enim eget ante. Sed sit amet nisi id nibh imperdiet feugiat fermentum pharetra augue. Proin suscipit dui et arcu fermentum, ut tempor urna ullamcorper.\r\n\r\nCras a lectus a massa elementum consectetur in ac eros. Donec viverra neque at pretium dapibus. Vivamus at justo est. Donec cursus orci vitae velit tempus, sed gravida sapien mattis. Integer quis eleifend lorem, eget tristique metus. Maecenas consectetur in nisl id porttitor. Nunc porttitor ultrices justo, in suscipit purus laoreet sit amet. Fusce mauris augue, imperdiet nec dolor et, iaculis pharetra est. Nunc finibus volutpat justo. Nulla tincidunt turpis vel sem viverra, a accumsan lectus porttitor. Nullam congue non turpis non ultrices. Etiam in suscipit risus, ut suscipit leo. Maecenas eget ullamcorper ligula, dictum tempus nibh. Duis ex tellus, dignissim eu faucibus eu, tempus a odio.\r\n\r\nAliquam at sem euismod, sodales ex vel, ultrices est. Proin ornare iaculis nunc ac fermentum. Proin eros purus, blandit nec gravida at, dapibus ut augue. Sed faucibus porta odio, et ultrices felis sagittis vitae. Nam aliquet cursus efficitur. Quisque vestibulum quis odio nec consequat. Donec in lacinia ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi viverra rutrum ullamcorper. Nunc vitae metus mauris. Vestibulum efficitur tincidunt mauris, et tincidunt urna blandit et. Fusce non iaculis felis. Cras et libero ultricies, vestibulum ante in, egestas est. Duis pulvinar dapibus metus. Praesent sem orci, gravida eget urna eu, vestibulum ultricies sapien.\r\n\r\nCurabitur nec magna vitae arcu dictum cursus. Donec at mauris nisl. Aenean dictum in velit vel sagittis. In hac habitasse platea dictumst. Ut dapibus quam eleifend sapien tristique tristique. Vestibulum sodales ante laoreet scelerisque tristique. Aliquam velit magna, vehicula et maximus in, molestie quis turpis. Fusce sit amet finibus nunc, in malesuada magna. Proin lacinia mollis augue, quis pretium libero ullamcorper id. Curabitur vel eros sit amet dolor ultrices laoreet. Maecenas a sem sed ante sagittis faucibus. Sed eu dolor at sapien bibendum scelerisque', 4, 1, 0, 4),
(5, '0000-00-00 00:00:00', 'Privacy Policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper nec mi a eleifend. Nulla nisl elit, imperdiet non tortor ut, tempus tempus enim. Mauris vitae tortor varius, mollis ligula ut, aliquet leo. Etiam facilisis turpis at faucibus porttitor. Suspendisse non metus nec est mollis fermentum. Phasellus luctus nulla arcu, sed scelerisque ante consectetur a. Suspendisse est tellus, viverra ut ullamcorper eleifend, consectetur sed velit. Nulla quam mauris, ullamcorper id arcu et, molestie vestibulum lorem. Phasellus interdum dolor vitae turpis bibendum efficitur. Aliquam ut rutrum massa. Nullam quam eros, dignissim nec tellus non, maximus luctus lectus. Nam tincidunt porta urna sit amet commodo. Etiam auctor in metus in porta. Nulla metus lectus, dapibus non velit quis, pretium pellentesque magna. Duis scelerisque justo justo, ut porttitor elit dapibus ac. Curabitur auctor vestibulum diam.\r\n\r\nEtiam et orci ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec et dignissim justo. Maecenas vitae erat augue. Phasellus erat nisi, congue quis congue sit amet, euismod et libero. Nunc placerat, justo eget posuere porttitor, ipsum massa lobortis erat, sit amet faucibus felis enim eget ante. Sed sit amet nisi id nibh imperdiet feugiat fermentum pharetra augue. Proin suscipit dui et arcu fermentum, ut tempor urna ullamcorper.\r\n\r\nCras a lectus a massa elementum consectetur in ac eros. Donec viverra neque at pretium dapibus. Vivamus at justo est. Donec cursus orci vitae velit tempus, sed gravida sapien mattis. Integer quis eleifend lorem, eget tristique metus. Maecenas consectetur in nisl id porttitor. Nunc porttitor ultrices justo, in suscipit purus laoreet sit amet. Fusce mauris augue, imperdiet nec dolor et, iaculis pharetra est. Nunc finibus volutpat justo. Nulla tincidunt turpis vel sem viverra, a accumsan lectus porttitor. Nullam congue non turpis non ultrices. Etiam in suscipit risus, ut suscipit leo. Maecenas eget ullamcorper ligula, dictum tempus nibh. Duis ex tellus, dignissim eu faucibus eu, tempus a odio.\r\n\r\nAliquam at sem euismod, sodales ex vel, ultrices est. Proin ornare iaculis nunc ac fermentum. Proin eros purus, blandit nec gravida at, dapibus ut augue. Sed faucibus porta odio, et ultrices felis sagittis vitae. Nam aliquet cursus efficitur. Quisque vestibulum quis odio nec consequat. Donec in lacinia ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi viverra rutrum ullamcorper. Nunc vitae metus mauris. Vestibulum efficitur tincidunt mauris, et tincidunt urna blandit et. Fusce non iaculis felis. Cras et libero ultricies, vestibulum ante in, egestas est. Duis pulvinar dapibus metus. Praesent sem orci, gravida eget urna eu, vestibulum ultricies sapien.\r\n\r\nCurabitur nec magna vitae arcu dictum cursus. Donec at mauris nisl. Aenean dictum in velit vel sagittis. In hac habitasse platea dictumst. Ut dapibus quam eleifend sapien tristique tristique. Vestibulum sodales ante laoreet scelerisque tristique. Aliquam velit magna, vehicula et maximus in, molestie quis turpis. Fusce sit amet finibus nunc, in malesuada magna. Proin lacinia mollis augue, quis pretium libero ullamcorper id. Curabitur vel eros sit amet dolor ultrices laoreet. Maecenas a sem sed ante sagittis faucibus. Sed eu dolor at sapien bibendum scelerisque', 4, 1, 0, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Science', ''),
(2, 'Tech', ''),
(3, 'Fashion', ''),
(4, 'docs', '');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_body`, `user_id`, `comment_date`, `is_approved`, `article_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', 1, '2015-05-05 00:00:00', 1, 1),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', 2, '2015-05-22 00:00:00', 1, 2),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', 3, '2015-05-14 00:00:00', 1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `user_id`, `user_password`, `user_email`, `user_pic`, `is_admin`, `user_bio`, `date_joined`) VALUES
('Bob', 'Danfro', 'bobdanfro', 1, 'password', 'bobdanfro@gmail.com', 'http://0.media.collegehumor.cvcdn.com/45/19/846ea3fda8a9f02ac37a92fdef488af3-dumb-face-paul-ryan.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', '2015-05-01 00:00:00'),
('Roger', 'Beans', 'rogerbeans', 2, 'password', 'rogerbeans@gmail.com', 'http://www.youhaveadumbface.com/wp-content/uploads/2011/07/Boehner.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', '2015-05-13 00:00:00'),
('Ralph', 'Crotchio', 'ralphcrotchio', 3, 'password', 'ralphcrotchio@gmail.com', 'http://www.reactionface.info/sites/default/files/imagecache/Node_Page/images/1311000574183.gif', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a feugiat metus. Praesent erat turpis, porta eu eleifend id, vulputate et urna. Phasellus vehicula, mauris sit amet tempor vulputate, velit ligula fringilla eros, vel mattis velit justo nec urna. Aenean ultricies diam mi, vitae tristique sem aliquet vel. Morbi suscipit metus vel turpis cursus auctor. Aliquam elementum massa ut pharetra interdum. Proin blandit sit amet arcu eget tincidunt. Suspendisse elementum orci congue augue posuere, ut laoreet ligula feugiat. Suspendisse placerat tempus venenatis. Phasellus pretium, lorem ac sagittis suscipit, erat augue egestas nisl, sit amet hendrerit sem mi quis nisi. Quisque vestibulum imperdiet odio, et rutrum velit hendrerit ut.', '2015-05-15 00:00:00'),
('admin', '', 'admin', 4, 'password', 'cesarjesparza@gmail.com', '', 1, '', '0000-00-00 00:00:00'),
('', '', 'melissa', 6, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'melissa@hotmail.com', '', 0, '', '2015-06-08 21:37:38'),
('', '', 'machaka', 7, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'hot@username.com', '', 0, '', '2015-06-10 07:47:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
