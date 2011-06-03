-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2011 at 08:52 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mcac_churchie`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attachment_type_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachment_type_id` (`attachment_type_id`,`post_id`,`user_id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attachment_metadata`
--

DROP TABLE IF EXISTS `attachment_metadata`;
CREATE TABLE `attachment_metadata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attachment_id` int(10) unsigned NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachment_id` (`attachment_id`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attachment_metadata`
--


-- --------------------------------------------------------

--
-- Table structure for table `attachment_types`
--

DROP TABLE IF EXISTS `attachment_types`;
CREATE TABLE `attachment_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attachment_types`
--

INSERT INTO `attachment_types` VALUES(1, 'Banner', '', '2010-12-21 20:12:44', '2010-12-21 20:12:44');
INSERT INTO `attachment_types` VALUES(2, 'Audio', '', '2011-01-13 00:06:00', '2011-01-13 00:06:00');
INSERT INTO `attachment_types` VALUES(3, 'Images', NULL, NULL, NULL);
INSERT INTO `attachment_types` VALUES(4, 'Documents', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

DROP TABLE IF EXISTS `cake_sessions`;
CREATE TABLE `cake_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `lft` bigint(20) unsigned DEFAULT NULL,
  `rght` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`name`),
  KEY `slug` (`slug`),
  KEY `lft` (`lft`),
  KEY `rght` (`rght`),
  KEY `parent_id_2` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` VALUES(1, NULL, 1, 60, 'Churches', 'churches', NULL, '2011-04-23 16:00:05', '2011-04-23 16:00:05');
INSERT INTO `groups` VALUES(2, 1, 2, 59, 'Montreal Chinese Alliance Church', 'mcac', NULL, '2011-04-23 16:00:28', '2011-04-23 16:00:28');
INSERT INTO `groups` VALUES(3, 2, 3, 18, 'Ministries', 'ministries', '', '2011-04-23 16:27:38', '2011-04-23 16:27:38');
INSERT INTO `groups` VALUES(4, 2, 19, 24, 'Congregations', 'congregations', '', '2011-04-23 16:27:50', '2011-04-23 16:27:50');
INSERT INTO `groups` VALUES(5, 4, 20, 21, 'English Congregation', 'english-congregation', '', '2011-04-23 16:27:57', '2011-04-23 16:27:57');
INSERT INTO `groups` VALUES(6, 4, 22, 23, 'Chinese Congregation', 'chinese-congregation', '', '2011-04-23 16:28:08', '2011-04-23 16:28:08');
INSERT INTO `groups` VALUES(7, 3, 4, 17, 'Fellowships', 'fellowships', '', '2011-04-23 16:28:14', '2011-04-23 16:28:14');
INSERT INTO `groups` VALUES(8, 7, 5, 10, 'Bethany Fellowship', 'bethanies', '', '2011-04-23 16:29:00', '2011-04-23 16:29:00');
INSERT INTO `groups` VALUES(9, 7, 11, 14, 'Timothy Fellowship', 'timothies', '', '2011-04-23 16:29:23', '2011-04-23 16:29:23');
INSERT INTO `groups` VALUES(10, 7, 15, 16, 'AE', 'ae', '', '2011-04-23 16:29:52', '2011-04-23 16:29:52');
INSERT INTO `groups` VALUES(11, 8, 6, 7, 'News & Events', 'bethany-news', '', '2011-04-23 16:30:02', '2011-05-04 22:31:15');
INSERT INTO `groups` VALUES(12, 8, 8, 9, 'Staff', 'bethany-staff', '', '2011-04-23 16:30:12', '2011-04-23 16:30:12');
INSERT INTO `groups` VALUES(53, 2, 25, 26, 'About', 'about', '', '2011-04-24 15:51:45', '2011-04-24 15:51:45');
INSERT INTO `groups` VALUES(54, 2, 27, 48, 'Pastors', 'pastors', '', '2011-04-24 20:36:46', '2011-04-24 20:36:46');
INSERT INTO `groups` VALUES(55, 2, 49, 56, 'Series', 'series', '', '2011-04-24 20:36:58', '2011-04-24 20:36:58');
INSERT INTO `groups` VALUES(56, 54, 28, 31, 'Rev. Thomas Chan', 'tchan', '', '2011-04-24 20:37:18', '2011-04-24 20:37:18');
INSERT INTO `groups` VALUES(57, 54, 32, 35, 'Rev. Jonathan Kaan', 'jkaan', '', '2011-04-24 20:37:41', '2011-04-24 20:37:41');
INSERT INTO `groups` VALUES(58, 54, 36, 39, 'Rev. Ian Ho', 'iho', '', '2011-04-24 20:38:34', '2011-04-24 20:38:34');
INSERT INTO `groups` VALUES(59, 54, 40, 43, 'Rev. Terry Yeung', 'tyeung', '', '2011-04-24 20:38:53', '2011-04-24 20:38:53');
INSERT INTO `groups` VALUES(60, 54, 44, 47, 'Rev. Marshall Davis', 'mdavis', '', '2011-04-24 20:39:28', '2011-04-24 20:39:28');
INSERT INTO `groups` VALUES(61, 55, 50, 51, 'No Series', 'no-series', '', '2011-04-24 23:47:08', '2011-04-24 23:47:08');
INSERT INTO `groups` VALUES(64, 56, 29, 30, 'Articles', 'tcarticles', '', '2011-04-25 20:35:39', '2011-04-25 20:37:26');
INSERT INTO `groups` VALUES(65, 57, 33, 34, 'Articles', 'jkarticles', '', '2011-04-25 20:35:47', '2011-04-25 20:37:15');
INSERT INTO `groups` VALUES(66, 58, 37, 38, 'Articles', 'iharticles', '', '2011-04-25 20:35:54', '2011-04-25 20:37:04');
INSERT INTO `groups` VALUES(67, 59, 41, 42, 'Articles', 'tyarticles', '', '2011-04-25 20:36:02', '2011-04-25 20:36:52');
INSERT INTO `groups` VALUES(68, 60, 45, 46, 'Articles', 'mdarticles', '', '2011-04-25 20:36:29', '2011-04-25 20:36:29');
INSERT INTO `groups` VALUES(69, 2, 57, 58, 'News & Events', 'news', '', '2011-04-27 00:14:47', '2011-04-27 00:14:47');
INSERT INTO `groups` VALUES(112, 9, 12, 13, 'News & Events', 'timothies-news', '', '2011-04-29 18:58:22', '2011-04-29 18:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `groups_groups`
--

DROP TABLE IF EXISTS `groups_groups`;
CREATE TABLE `groups_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `related_group_id` bigint(20) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_group_id` (`group_id`,`related_group_id`),
  KEY `child_group_id` (`related_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `groups_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text NOT NULL,
  `publish_timestamp` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `publish_date` (`publish_timestamp`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES(26, 53, 1, 'Montreal Chinese Alliance Church', NULL, '<p>THIS IS AN AWESOME CHURCH.</p>', '2011-05-21 00:00:00', '2011-05-21 02:14:08', '2011-05-21 02:14:08');
INSERT INTO `posts` VALUES(27, 53, 1, 'Bethany Fellowship', NULL, '<p>Freakin'' awesome fellowship.</p>', '2011-05-21 00:00:00', '2011-05-21 02:20:07', '2011-05-21 02:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `search_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`search_name`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` VALUES(1, 1, 'Administrator', '', 'admin@example.com', '2010-07-06', '2010-10-06 18:44:37', '2010-10-06 18:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `group_id_2` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roles`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE `roles_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roles_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `secured_actions`
--

DROP TABLE IF EXISTS `secured_actions`;
CREATE TABLE `secured_actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `controller` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `controller` (`controller`,`action`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `secured_actions`
--

INSERT INTO `secured_actions` VALUES(1, NULL, '*', '*', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sermons`
--

DROP TABLE IF EXISTS `sermons`;
CREATE TABLE `sermons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `series_id` bigint(20) unsigned DEFAULT NULL,
  `pastor_id` bigint(20) unsigned DEFAULT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `passages` varchar(255) DEFAULT NULL,
  `speaker_name` varchar(100) DEFAULT NULL,
  `description` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `series_id` (`series_id`,`pastor_id`,`post_id`,`speaker_name`),
  KEY `passages` (`passages`),
  KEY `series_id_2` (`series_id`),
  KEY `pastor_id` (`pastor_id`),
  KEY `pastor_id_2` (`pastor_id`),
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`),
  KEY `speaker_name` (`speaker_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `group_id` (`group_id`),
  KEY `group_id_2` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'admin', '57db0c8f8f62c657afaa89d69a0b2608c107cda1', '2010-10-06 18:44:37', '2010-10-06 18:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
CREATE TABLE `widgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `action` varchar(200) NOT NULL,
  `placement` varchar(255) DEFAULT NULL,
  `options` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `name` (`name`),
  KEY `action` (`action`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` VALUES(1, 2, 'UrgPost.RecentActivity', '/urg/groups/view', '1|0', '{"Component": {"group_id": 7, "title": "Around the Church"}}', '2011-04-28 20:51:55', '2011-04-29 18:57:08');
INSERT INTO `widgets` VALUES(2, 2, 'UrgPost.RecentActivity', '/urg/groups/view', '0|0', '{"Component": {"title": "Announcements", "group_id": 69}} ', '2011-04-28 22:32:43', '2011-05-01 17:13:58');
INSERT INTO `widgets` VALUES(3, 2, 'UrgSermon.Sermons', '/urg/groups/view', '2|0', '', '2011-04-28 22:35:01', '2011-05-03 20:45:54');
INSERT INTO `widgets` VALUES(4, 7, 'UrgPost.About', '/urg/groups/view', '0|0', '{"Component": {"group_id": ${group_id}}}', '2011-04-29 00:57:54', '2011-05-06 21:44:50');
INSERT INTO `widgets` VALUES(5, 7, 'UrgPost.RecentActivity', '/urg/groups/view', '1|0', '{"Component": {"group_id": ${group_id}}}', '2011-04-29 01:21:06', '2011-05-06 21:44:58');
INSERT INTO `widgets` VALUES(6, 7, 'UrgPost.UpcomingEvents', '/urg/groups/view', '2|0', '{"Component": {"group_id": ${group_id}}}', '2011-04-29 01:22:15', '2011-05-06 21:45:07');
INSERT INTO `widgets` VALUES(7, 7, 'UrgSubscription.Subscribe', '/urg/groups/view', '0|1', '{"Component": {"group_id": 11, "title": "Interested?", "message": "Sign up now to keep up to date with the latest happenings for Bethany Fellowship!"}}', '2011-05-07 22:02:22', '2011-05-26 22:21:38');
INSERT INTO `widgets` VALUES(8, 1, 'UrgSubscription.NotifySubscribers', '/urg_post/posts/add', '', '{"Behavior": true}', '2011-05-22 11:54:39', '2011-05-22 11:54:39');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `attachments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `attachments_ibfk_3` FOREIGN KEY (`attachment_type_id`) REFERENCES `attachment_types` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `attachments_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `attachments_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `groups_groups`
--
ALTER TABLE `groups_groups`
  ADD CONSTRAINT `groups_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `groups_groups_ibfk_2` FOREIGN KEY (`related_group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `secured_actions`
--
ALTER TABLE `secured_actions`
  ADD CONSTRAINT `secured_actions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sermons`
--
ALTER TABLE `sermons`
  ADD CONSTRAINT `sermons_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sermons_ibfk_2` FOREIGN KEY (`pastor_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sermons_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `widgets`
--
ALTER TABLE `widgets`
  ADD CONSTRAINT `widgets_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
