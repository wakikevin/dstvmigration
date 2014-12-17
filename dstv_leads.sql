-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2014 at 10:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dstv_leads`
--

-- --------------------------------------------------------

--
-- Table structure for table `dstv_agents`
--

DROP TABLE IF EXISTS `dstv_agents`;
CREATE TABLE IF NOT EXISTS `dstv_agents` (
`id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_agents`
--

INSERT INTO `dstv_agents` (`id`, `location_id`, `name`, `phone`, `email`, `status`) VALUES
(1, 1, 'Kev', '0721823517', 'dev.gsoft@gmail.com', 1),
(2, 4, 'Kinuthia Mbugua', '0721823517', 'dev.gsoft@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dstv_leads`
--

DROP TABLE IF EXISTS `dstv_leads`;
CREATE TABLE IF NOT EXISTS `dstv_leads` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `location_id` int(255) NOT NULL DEFAULT '2',
  `source_id` int(11) NOT NULL DEFAULT '2',
  `agent_id` int(11) NOT NULL DEFAULT '1',
  `product` text NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `referrer` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_leads`
--

INSERT INTO `dstv_leads` (`id`, `name`, `email`, `mobile`, `location_id`, `source_id`, `agent_id`, `product`, `date_submitted`, `status`, `referrer`) VALUES
(1, 'Kevin', 'kevinwaki@gmail.com', '9986545', 5, 2, 1, 'Explora', '2014-12-04 19:41:16', 0, ''),
(2, 'Kevin Waki', 'kevinwaki2@gmail.com', '07218325174', 4, 2, 1, '', '2014-12-16 20:40:04', 0, ''),
(3, 'Kinuthia Mbugua', 'dev.gsoft@gmail.com', '77537359588935853', 4, 2, 2, '', '2014-12-16 21:50:52', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `dstv_leadsources`
--

DROP TABLE IF EXISTS `dstv_leadsources`;
CREATE TABLE IF NOT EXISTS `dstv_leadsources` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_leadsources`
--

INSERT INTO `dstv_leadsources` (`id`, `name`, `status`) VALUES
(1, 'Scangroup', 1),
(2, 'General', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dstv_locations`
--

DROP TABLE IF EXISTS `dstv_locations`;
CREATE TABLE IF NOT EXISTS `dstv_locations` (
`id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `physical_location` text NOT NULL,
  `contact_name` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_locations`
--

INSERT INTO `dstv_locations` (`id`, `region_id`, `name`, `physical_location`, `contact_name`, `phone`, `email`, `status`) VALUES
(1, 1, 'Multichoice Tmall', 'Tmall', 'Kinuthia', '09786543423235', 'kinuthia@gmail.com', 1),
(2, 1, 'TRM', 'Thika Road', 'Mbugua', '09786543423235', 'dev.gsoft@gmail.com', 1),
(3, 3, 'Nyali ', 'Nyali Mall', 'Kinuthia', '09786543423235', 'kinuthia@gmail.com', 1),
(4, 1, 'Westlands', 'Sarit Centre', 'Mbugua', '09786543423235', 'dev.gsoft@gmail.com', 1),
(5, 1, 'Village Market', 'Village Market', 'Mbugua', '09786543423235', 'dev.gsoft@gmail.com', 1),
(6, 2, 'Kisumu Town', 'Kisumu Town Center', 'Mbugua', '09786543423235', 'dev.gsoft@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dstv_menus`
--

DROP TABLE IF EXISTS `dstv_menus`;
CREATE TABLE IF NOT EXISTS `dstv_menus` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `isroot` int(11) NOT NULL DEFAULT '0',
  `parentid` int(11) NOT NULL DEFAULT '0',
  `linkpage` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_menus`
--

INSERT INTO `dstv_menus` (`id`, `title`, `icon`, `isroot`, `parentid`, `linkpage`, `isactive`) VALUES
(1, 'Dashboard', 'icon-home', 0, 0, 'index.php', 1),
(2, 'Users', 'icon-user', 1, 0, 'users.php', 0),
(3, 'Manage Regions', 'icon-lock', 0, 0, 'regions.php', 1),
(4, 'Manage Locations', 'icon-home', 0, 0, 'locations.php', 1),
(5, 'Manage Agents', 'icon-user', 0, 0, 'agents.php', 1),
(6, 'Leads', 'icon-envelope', 0, 0, 'leads.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dstv_regions`
--

DROP TABLE IF EXISTS `dstv_regions`;
CREATE TABLE IF NOT EXISTS `dstv_regions` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_regions`
--

INSERT INTO `dstv_regions` (`id`, `name`, `status`) VALUES
(1, 'Nairobi', 1),
(2, 'Kisumu City', 1),
(3, 'Mombasa', 1),
(4, 'Mount Kenya', 0),
(5, 'Rift Valley', 0),
(6, 'North Eastern', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dstv_tokens`
--

DROP TABLE IF EXISTS `dstv_tokens`;
CREATE TABLE IF NOT EXISTS `dstv_tokens` (
`id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `isUsed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_tokens`
--

INSERT INTO `dstv_tokens` (`id`, `token`, `isUsed`) VALUES
(1, 'DL-C7378B7DFF', 0),
(2, 'DL-F718BE032A', 0),
(3, 'DL-E62DB9A97A', 0),
(4, 'DL-5CA778C4A2', 1),
(5, 'DL-77F8C23028', 0),
(6, 'DL-C6E707675E', 1),
(7, 'DL-A34F00F1A7', 0),
(8, 'DL-A39CEF738D', 0),
(9, 'DL-807682A8E3', 0),
(10, 'DL-CCE0282A10', 1),
(11, 'DL-C59671F5A6', 0),
(12, 'DL-81B482945A', 0),
(13, 'DL-5E8D80FC81', 0),
(14, 'DL-FC75E316B4', 0),
(15, 'DL-C0FD8BF481', 0),
(16, 'DL-255435E5DF', 0),
(17, 'DL-FC2DDCDF1D', 0),
(18, 'DL-7C34A88F5A', 0),
(19, 'DL-4BBDA65EAA', 0),
(20, 'DL-FD114C27E9', 0),
(21, 'DL-102D42F9EE', 0),
(22, 'DL-5629184D6C', 0),
(23, 'DL-5EA519C150', 0),
(24, 'DL-7DCFFB61CF', 0),
(25, 'DL-4DF67066DF', 0),
(26, 'DL-A93C20BB98', 0),
(27, 'DL-929EB09EB1', 0),
(28, 'DL-73889E4D90', 0),
(29, 'DL-E0A1F73044', 0),
(30, 'DL-8E98C5DB18', 0),
(31, 'DL-11F766A39E', 0),
(32, 'DL-F2C3F65A28', 0),
(33, 'DL-809F233984', 0),
(34, 'DL-591F3DA523', 1),
(35, 'DL-018073BA6E', 0),
(36, 'DL-0181D9B337', 0),
(37, 'DL-ED2D32A09C', 0),
(38, 'DL-ACDCB2962B', 0),
(39, 'DL-167EF8EB97', 0),
(40, 'DL-385DFE6283', 0),
(41, 'DL-EC9E1EC001', 0),
(42, 'DL-B6E5E85374', 0),
(43, 'DL-96069749E7', 1),
(44, 'DL-3678A63912', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dstv_users`
--

DROP TABLE IF EXISTS `dstv_users`;
CREATE TABLE IF NOT EXISTS `dstv_users` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dstv_users`
--

INSERT INTO `dstv_users` (`id`, `name`, `username`, `email`, `password`, `createdon`, `status`) VALUES
(1, 'DSTV Admin', 'admin', 'dev@gsoft@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2014-12-10 20:00:22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dstv_agents`
--
ALTER TABLE `dstv_agents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstv_leads`
--
ALTER TABLE `dstv_leads`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dstv_leadsources`
--
ALTER TABLE `dstv_leadsources`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstv_locations`
--
ALTER TABLE `dstv_locations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstv_menus`
--
ALTER TABLE `dstv_menus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstv_regions`
--
ALTER TABLE `dstv_regions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstv_tokens`
--
ALTER TABLE `dstv_tokens`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstv_users`
--
ALTER TABLE `dstv_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dstv_agents`
--
ALTER TABLE `dstv_agents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dstv_leads`
--
ALTER TABLE `dstv_leads`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dstv_leadsources`
--
ALTER TABLE `dstv_leadsources`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dstv_locations`
--
ALTER TABLE `dstv_locations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dstv_menus`
--
ALTER TABLE `dstv_menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dstv_regions`
--
ALTER TABLE `dstv_regions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dstv_tokens`
--
ALTER TABLE `dstv_tokens`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `dstv_users`
--
ALTER TABLE `dstv_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
