-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2014 at 01:36 PM
-- Server version: 5.5.20
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pentima`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `td_id` int(11) NOT NULL AUTO_INCREMENT,
  `td_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `td_body` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `td_updated` datetime,
  `td_created` datetime, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`td_id`, `td_title`, `td_body`) VALUES (1, 'Hello world', 'Hello world body');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `us_name` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `us_password` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `us_salt` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `us_updated` datetime,
  `us_created` datetime, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_name`, `us_password`, `us_salt`) VALUES (1, 'hello', '$2y$11$0169a8e4f300c04bbc6b5eXfPTVNbv4cccsMte0WUJcVH68FCXIyq', '0169a8e4f300c04bbc6b5e20c2cd5644');