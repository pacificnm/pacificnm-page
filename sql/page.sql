-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2016 at 08:50 PM
-- Server version: 10.0.28-MariaDB-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`page_id` int(20) unsigned NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_subtitle` varchar(100) DEFAULT NULL,
  `page_icon` varchar(100) DEFAULT NULL,
  `page_menu` varchar(100) DEFAULT NULL,
  `page_menu_sub` varchar(100) DEFAULT NULL,
  `page_type` varchar(100) NOT NULL,
  `page_route` varchar(255) NOT NULL,
  `page_layout` varchar(60) NOT NULL,
  `module_id` int(20) unsigned NOT NULL,
  `controller_id` int(20) unsigned NOT NULL,
  `page_action` varchar(100) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`page_id`), ADD UNIQUE KEY `page_name` (`page_name`), ADD KEY `controller_id` (`controller_id`), ADD KEY `module_id` (`module_id`), ADD KEY `page_layout_id` (`page_layout`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `page_id` int(20) unsigned NOT NULL AUTO_INCREMENT;SET FOREIGN_KEY_CHECKS=1;
