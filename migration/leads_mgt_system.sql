-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table leads_mgt_system.dstv_delivery_status
CREATE TABLE IF NOT EXISTS `dstv_delivery_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_delivery_status: ~0 rows (approximately)
/*!40000 ALTER TABLE `dstv_delivery_status` DISABLE KEYS */;
REPLACE INTO `dstv_delivery_status` (`id`, `name`, `status`) VALUES
	(1, 'Not Delivered', 1);
/*!40000 ALTER TABLE `dstv_delivery_status` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_installers
CREATE TABLE IF NOT EXISTS `dstv_installers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_installers: ~0 rows (approximately)
/*!40000 ALTER TABLE `dstv_installers` DISABLE KEYS */;
/*!40000 ALTER TABLE `dstv_installers` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_leads
CREATE TABLE IF NOT EXISTS `dstv_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_number` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `assigned_to` int(11) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  `location_id` int(255) NOT NULL DEFAULT '2',
  `source_id` int(11) NOT NULL DEFAULT '2',
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `utm_campaign` varchar(200) NOT NULL,
  `utm_medium` varchar(200) NOT NULL,
  `utm_source` varchar(200) NOT NULL,
  `customer_number` varchar(255) DEFAULT NULL,
  `alternative_phone` varchar(45) DEFAULT NULL,
  `confirmation_code` varchar(45) DEFAULT NULL,
  `status_id` int(11) DEFAULT '1',
  `comments` text,
  `payment_status` enum('Paid','Not Paid') DEFAULT 'Not Paid',
  `amount_paid` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
  `delivery_address` text,
  `followup_time` timestamp NULL DEFAULT NULL,
  `amount_due` double DEFAULT NULL,
  `followup_comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `lead_number_UNIQUE` (`lead_number`),
  UNIQUE KEY `mobile_UNIQUE` (`mobile`),
  UNIQUE KEY `customer_id_UNIQUE` (`customer_number`),
  UNIQUE KEY `confirmation_code_UNIQUE` (`confirmation_code`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_leads: ~0 rows (approximately)
/*!40000 ALTER TABLE `dstv_leads` DISABLE KEYS */;
REPLACE INTO `dstv_leads` (`id`, `lead_number`, `name`, `email`, `mobile`, `assigned_to`, `product_id`, `location_id`, `source_id`, `date_submitted`, `utm_campaign`, `utm_medium`, `utm_source`, `customer_number`, `alternative_phone`, `confirmation_code`, `status_id`, `comments`, `payment_status`, `amount_paid`, `balance`, `delivery_status`, `postal_address`, `delivery_address`, `followup_time`, `amount_due`, `followup_comment`) VALUES
	(77, 'L00123', 'John Nguru', 'ngurujohn@gmail.com', '0711689938', 3, 1, 2, 2, '2015-02-19 18:38:13', '', '', '', 'GH676767689', '0711689938', 'FGFGF788', 2, '[{"date":"22-02-15 02:57:46 PM","comment":"This is a testing."},{"date":"22-02-15 02:59:33 PM","comment":"Provides training, consulting, development, and contract\\/permanent staffing services around Ext JS, Sencha Touch, JavaScript frameworks, jQuery, JQTouch, PhoneGap, J2EE, Flex, .Net, Eclipse Plugins, RCP, and more. We can design, develop, and test your cross-platform as well as native mobile applications."},{"date":"22-02-15 03:00:26 PM","comment":"Provides training, consulting, development, and contract\\/permanent staffing services around Ext JS, Sencha Touch, JavaScript frameworks, jQuery, JQTouch, PhoneGap, J2EE, Flex, .Net, Eclipse Plugins, RCP, and more. We can design, develop, and test your cross-platform as well as native mobile applications."}]', '', 10000, NULL, 1, '', '', '2015-02-11 06:10:00', 10000, '[{"date":"22-02-15 03:06:40 PM","comment":"This is a test commnent"},{"date":"22-02-15 03:09:58 PM","comment":"With Xamarin, you write your apps entirely in C#, sharing the same code on iOS, Android, Windows, Mac and more. Anything you can do in Objective-C, Swift or Java, you can do in C#."},{"date":"22-02-15 03:12:19 PM","comment":"With Xamarin, you write your apps entirely in C#, sharing the same code on iOS, Android, Windows, Mac and more. Anything you can do in Objective-C, Swift or Java, you can do in C#."},{"date":"22-02-15 03:13:02 PM","comment":"With Xamarin, you write your apps entirely in C#, sharing the same code on iOS, Android, Windows, Mac and more. Anything you can do in Objective-C, Swift or Java, you can do in C#."},{"date":"22-02-2015 01:30:00 PM","comment":"Windows, Mac and more. Anything you can do in Objective-C, Swift or Java, you can do in C#."},{"date":"11-02-2015 06:10:00 PM","comment":"Call me next week.\\n"}]');
/*!40000 ALTER TABLE `dstv_leads` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_leadsources
CREATE TABLE IF NOT EXISTS `dstv_leadsources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_leadsources: ~2 rows (approximately)
/*!40000 ALTER TABLE `dstv_leadsources` DISABLE KEYS */;
REPLACE INTO `dstv_leadsources` (`id`, `name`, `status`) VALUES
	(1, 'Scangroup', 1),
	(2, 'General', 1);
/*!40000 ALTER TABLE `dstv_leadsources` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_lead_status
CREATE TABLE IF NOT EXISTS `dstv_lead_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_lead_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `dstv_lead_status` DISABLE KEYS */;
REPLACE INTO `dstv_lead_status` (`id`, `name`, `status`) VALUES
	(1, 'Open', 1),
	(2, 'Converted', 1);
/*!40000 ALTER TABLE `dstv_lead_status` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_locations
CREATE TABLE IF NOT EXISTS `dstv_locations` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `physical_location` text NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `regionloc_FK_idx` (`region_id`),
  CONSTRAINT `regionloc_FK` FOREIGN KEY (`region_id`) REFERENCES `dstv_regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_locations: ~8 rows (approximately)
/*!40000 ALTER TABLE `dstv_locations` DISABLE KEYS */;
REPLACE INTO `dstv_locations` (`id`, `region_id`, `name`, `physical_location`, `status`) VALUES
	(1, 1, 'WAIYAKI WAY', 'WAIYAKI WAY', 1),
	(2, 1, 'THIKA ROAD', 'THIKA ROAD', 1),
	(3, 1, 'LANGATA ROAD', 'LANGATA ROAD', 1),
	(4, 1, 'NGONG ROAD/ARGWINGS KHODHEK/NAIVASHA ROAD', 'NGONG ROAD/ARGWINGS KHODHEK/NAIVASHA ROAD\r\n', 1),
	(5, 1, 'OUTER RING/JOGOO ROAD', 'OUTER RING/JOGOO ROAD', 1),
	(6, 1, 'MOMBASA ROAD', 'MOMBASA ROAD', 1),
	(7, 1, 'Test Location', 'Test Location', 1),
	(8, 1, 'Squad Test', 'Nairobi', 1);
/*!40000 ALTER TABLE `dstv_locations` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_menus
CREATE TABLE IF NOT EXISTS `dstv_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `isroot` int(11) NOT NULL DEFAULT '0',
  `parentid` int(11) NOT NULL DEFAULT '0',
  `linkpage` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_menus: ~11 rows (approximately)
/*!40000 ALTER TABLE `dstv_menus` DISABLE KEYS */;
REPLACE INTO `dstv_menus` (`id`, `title`, `icon`, `isroot`, `parentid`, `linkpage`, `isactive`, `ordering`) VALUES
	(1, 'Dashboard', 'icon-home', 1, 0, 'index.php', 1, 1),
	(2, 'Manage Users', 'icon-user', 1, 0, 'users.php', 1, 1),
	(3, 'Manage Regions', 'icon-lock', 1, 0, 'regions.php', 1, 1),
	(4, 'Manage Locations', 'icon-home', 1, 0, 'locations.php', 1, 1),
	(5, 'Manage Outlets', 'icon-user', 1, 0, 'outlets.php', 1, 1),
	(6, 'Leads Management', 'icon-envelope', 1, 0, 'leads.php', 1, 1),
	(7, 'User Types', 'icon-user', 0, 2, 'usertype.php', 1, 2),
	(8, 'User List', 'icon-user', 0, 2, 'users.php', 1, 1),
	(9, 'Order Management', 'icon-puzzle', 1, 0, 'orders.php', 1, 1),
	(10, 'Outlet Products', 'icon-list', 0, 5, 'products.php', 1, 1),
	(11, 'Outlets', 'icon-list', 0, 5, 'outlets.php', 1, 1);
/*!40000 ALTER TABLE `dstv_menus` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_outlets
CREATE TABLE IF NOT EXISTS `dstv_outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text,
  `website` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_outlets: ~0 rows (approximately)
/*!40000 ALTER TABLE `dstv_outlets` DISABLE KEYS */;
REPLACE INTO `dstv_outlets` (`id`, `name`, `email`, `phone`, `address`, `logo`, `description`, `website`, `status`) VALUES
	(1, 'DSTV', 'ngurujohn@gmail.com', 711689938, '24, Matathia', NULL, 'Test', 'test.com', 1);
/*!40000 ALTER TABLE `dstv_outlets` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_outlet_products
CREATE TABLE IF NOT EXISTS `dstv_outlet_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT '0',
  `logo` varchar(255) DEFAULT NULL,
  `discount_price` double DEFAULT '0',
  `agent_commission` double DEFAULT '0',
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `outlet_FK_idx` (`outlet_id`),
  CONSTRAINT `outlet_FK` FOREIGN KEY (`outlet_id`) REFERENCES `dstv_outlets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_outlet_products: ~0 rows (approximately)
/*!40000 ALTER TABLE `dstv_outlet_products` DISABLE KEYS */;
REPLACE INTO `dstv_outlet_products` (`id`, `outlet_id`, `name`, `description`, `price`, `logo`, `discount_price`, `agent_commission`, `status`) VALUES
	(1, 1, 'Explora', 'Testing this ', 12000, '425f5382_explora.jpg', 10, 10, 1);
/*!40000 ALTER TABLE `dstv_outlet_products` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_regions
CREATE TABLE IF NOT EXISTS `dstv_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_regions: ~6 rows (approximately)
/*!40000 ALTER TABLE `dstv_regions` DISABLE KEYS */;
REPLACE INTO `dstv_regions` (`id`, `name`, `status`) VALUES
	(1, 'Nairobi', 1),
	(2, 'Kisumu City', 0),
	(3, 'Mombasa', 0),
	(4, 'Mount Kenya', 0),
	(5, 'Rift Valley', 0),
	(6, 'North Eastern', 0);
/*!40000 ALTER TABLE `dstv_regions` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_tokens
CREATE TABLE IF NOT EXISTS `dstv_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `isUsed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `dstv_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `dstv_tokens` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_users
CREATE TABLE IF NOT EXISTS `dstv_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `usertype_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usertypeFK_idx` (`usertype_id`),
  CONSTRAINT `usertypeFK` FOREIGN KEY (`usertype_id`) REFERENCES `dstv_usertypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `dstv_users` DISABLE KEYS */;
REPLACE INTO `dstv_users` (`id`, `name`, `username`, `email`, `password`, `createdon`, `status`, `usertype_id`) VALUES
	(1, 'DSTV Admin', 'admin', 'dev.gsoft@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2014-12-10 20:00:22', 1, 1),
	(3, 'Jane Maina', 'jmaina', 'jmaina@gmail.com', '$leadDetails->mobile', '2015-02-20 10:41:24', 1, 3);
/*!40000 ALTER TABLE `dstv_users` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_usertypes
CREATE TABLE IF NOT EXISTS `dstv_usertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT '0',
  `allowedmenu` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_usertypes: ~2 rows (approximately)
/*!40000 ALTER TABLE `dstv_usertypes` DISABLE KEYS */;
REPLACE INTO `dstv_usertypes` (`id`, `title`, `description`, `status`, `allowedmenu`) VALUES
	(1, 'Super Admin', NULL, 1, '[{"index":"1","name":"Dashboard"},{"index":"6","name":"Leads"},{"index":"5","name":"Manage Agents"},{"index":"4","name":"Manage Locations"},{"index":"3","name":"Manage Regions"},{"index":"2","name":"Manage Users"},{"index":"9","name":"Order Management"}]'),
	(3, 'Telecaller', NULL, 1, '[{"index":"1","name":"Dashboard"},{"index":"6","name":"Leads"}]');
/*!40000 ALTER TABLE `dstv_usertypes` ENABLE KEYS */;


-- Dumping structure for table leads_mgt_system.dstv_usertype_menu_map
CREATE TABLE IF NOT EXISTS `dstv_usertype_menu_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_id` int(11) DEFAULT NULL,
  `menulist` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype_menu_FK_idx` (`usertype_id`),
  CONSTRAINT `usertype_menu_FK` FOREIGN KEY (`usertype_id`) REFERENCES `dstv_usertypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table leads_mgt_system.dstv_usertype_menu_map: ~0 rows (approximately)
/*!40000 ALTER TABLE `dstv_usertype_menu_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `dstv_usertype_menu_map` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
