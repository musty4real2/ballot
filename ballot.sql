-- phpMyAdmin SQL Dump
-- version 2.11.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2011 at 12:06 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ballot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `usename` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `shapass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `assfinsec`
--

CREATE TABLE `assfinsec` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assfinsec`
--


-- --------------------------------------------------------

--
-- Table structure for table `assgensec`
--

CREATE TABLE `assgensec` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assgensec`
--


-- --------------------------------------------------------

--
-- Table structure for table `asstreasurer`
--

CREATE TABLE `asstreasurer` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `asstreasurer`
--


-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `assname` varchar(200) NOT NULL,
  `dept1` varchar(100) NOT NULL,
  `dept2` varchar(100) NOT NULL,
  `dept3` varchar(100) NOT NULL,
  `dept4` varchar(100) NOT NULL,
  `dept5` varchar(100) NOT NULL,
  `dept6` varchar(100) NOT NULL,
  `dept7` varchar(100) NOT NULL,
  `dept8` varchar(100) NOT NULL,
  `dept9` varchar(100) NOT NULL,
  `dept10` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--


-- --------------------------------------------------------

--
-- Table structure for table `error_logs`
--

CREATE TABLE `error_logs` (
  `id` int(10) NOT NULL auto_increment,
  `location` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `error_logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `finsec`
--

CREATE TABLE `finsec` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `finsec`
--


-- --------------------------------------------------------

--
-- Table structure for table `gensec`
--

CREATE TABLE `gensec` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gensec`
--


-- --------------------------------------------------------

--
-- Table structure for table `presgroup`
--

CREATE TABLE `presgroup` (
  `id` int(10) NOT NULL auto_increment,
  `presname` varchar(200) NOT NULL,
  `vpresname` varchar(200) NOT NULL,
  `prespic` varchar(200) NOT NULL,
  `vprespic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `presgroup`
--


-- --------------------------------------------------------

--
-- Table structure for table `pres_single`
--

CREATE TABLE `pres_single` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pres_single`
--


-- --------------------------------------------------------

--
-- Table structure for table `pro1`
--

CREATE TABLE `pro1` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pro1`
--


-- --------------------------------------------------------

--
-- Table structure for table `pro2`
--

CREATE TABLE `pro2` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pro2`
--


-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `research`
--


-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `socials`
--


-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sports`
--


-- --------------------------------------------------------

--
-- Table structure for table `treasurer`
--

CREATE TABLE `treasurer` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `treasurer`
--


-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE `voted` (
  `voterid` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `matric` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `pres` int(10) NOT NULL,
  `vpres` int(10) NOT NULL,
  `gensec` int(10) NOT NULL,
  `assgensec` int(10) NOT NULL,
  `treasurer` int(10) NOT NULL,
  `asstreasurer` int(10) NOT NULL,
  `finsec` int(10) NOT NULL,
  `assfinsec` int(10) NOT NULL,
  `research` int(10) NOT NULL,
  `pro1` int(10) NOT NULL,
  `pro2` int(10) NOT NULL,
  `wellfare1` int(10) NOT NULL,
  `wellfare2` int(10) NOT NULL,
  `sports` int(10) NOT NULL,
  `social` int(10) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `numvote` int(10) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`voterid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `voted`
--


-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `matric` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `verstatus` varchar(200) NOT NULL,
  `votestatus` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `voter`
--


-- --------------------------------------------------------

--
-- Table structure for table `vpres`
--

CREATE TABLE `vpres` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vpres`
--


-- --------------------------------------------------------

--
-- Table structure for table `wellfare1`
--

CREATE TABLE `wellfare1` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wellfare1`
--


-- --------------------------------------------------------

--
-- Table structure for table `wellfare2`
--

CREATE TABLE `wellfare2` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `votecount` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wellfare2`
--

