-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 11:50 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teleweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `callbacks`
--

CREATE TABLE `callbacks` (
  `mkcbid` int(11) NOT NULL,
  `callback_date` date NOT NULL,
  `callback_time` time NOT NULL,
  `prospectid` varchar(45) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `call_logs`
--

CREATE TABLE `call_logs` (
  `callid` int(11) NOT NULL,
  `twilioCallSid` text,
  `ccampaignid` int(11) DEFAULT NULL,
  `calluniqueid` varchar(45) DEFAULT NULL,
  `cprospectid` int(11) DEFAULT NULL,
  `call_type` varchar(45) DEFAULT NULL,
  `call_status` varchar(45) DEFAULT NULL,
  `cagentid` int(11) DEFAULT NULL,
  `cnumbercall` varchar(45) DEFAULT NULL,
  `call_start` datetime DEFAULT NULL,
  `call_end` datetime DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `campaignid` int(11) NOT NULL,
  `updatedByWorkerID` int(11) NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `campaign_status` varchar(45) NOT NULL,
  `campaign_type` varchar(45) NOT NULL,
  `campaign_target` varchar(255) NOT NULL,
  `period_start` datetime NOT NULL,
  `period_end` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `mid` int(11) NOT NULL,
  `userid` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripeEmail` text COLLATE utf8_unicode_ci,
  `telewebPlanName` text COLLATE utf8_unicode_ci,
  `stripePlanName` text COLLATE utf8_unicode_ci,
  `stripeCustomerID` text COLLATE utf8_unicode_ci,
  `stripePlanID` text COLLATE utf8_unicode_ci,
  `amount` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `membershipStatus` text COLLATE utf8_unicode_ci,
  `periodStart` date DEFAULT NULL,
  `periodEnd` date DEFAULT NULL,
  `datePaid` date DEFAULT NULL,
  `renewalDate` date DEFAULT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prospects`
--

CREATE TABLE `prospects` (
  `pid` int(11) NOT NULL,
  `salesCampaignId` varchar(255) DEFAULT NULL,
  `referenceNumber` int(11) DEFAULT NULL,
  `dataEntryWorkerID` varchar(45) DEFAULT NULL,
  `isDev` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `stateProvince` varchar(255) DEFAULT NULL,
  `postalZipeCode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `countryCode` int(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `cellphone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `website2` varchar(255) DEFAULT NULL,
  `current_website_host` varchar(255) DEFAULT NULL,
  `registration_date` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `last_host_update` varchar(255) DEFAULT NULL,
  `average_website_visits_month` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `facebookPage` varchar(255) DEFAULT NULL,
  `facebookLikes` varchar(255) DEFAULT NULL,
  `facebookFollowers` varchar(255) DEFAULT NULL,
  `linkedinPage` varchar(255) DEFAULT NULL,
  `linkedinPageFollowers` varchar(255) DEFAULT NULL,
  `twitterPage` varchar(255) DEFAULT NULL,
  `twitterFollowers` varchar(255) DEFAULT NULL,
  `instagramPage` varchar(255) DEFAULT NULL,
  `instagramFollowers` varchar(255) DEFAULT NULL,
  `youtubePage` varchar(255) DEFAULT NULL,
  `youtubeSubscribers` varchar(255) DEFAULT NULL,
  `pinterestPage` varchar(255) DEFAULT NULL,
  `pinterestVisits` varchar(255) DEFAULT NULL,
  `pinterestFollowers` varchar(255) DEFAULT NULL,
  `googlePlusPage` varchar(255) DEFAULT NULL,
  `vimeoPage` varchar(255) DEFAULT NULL,
  `vimeoFollowers` varchar(255) DEFAULT NULL,
  `numberOfSocialMediaAccounts` varchar(255) DEFAULT NULL,
  `additionalDetails` varchar(255) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `lastUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_emails`
--

CREATE TABLE `sales_emails` (
  `seid` int(11) NOT NULL,
  `userid` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mailto` text COLLATE utf8_unicode_ci,
  `mailfromemail` text COLLATE utf8_unicode_ci,
  `mailfromnames` text COLLATE utf8_unicode_ci,
  `mailsubject` text COLLATE utf8_unicode_ci,
  `mailbody` text COLLATE utf8_unicode_ci,
  `mailsignature` text COLLATE utf8_unicode_ci,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0',
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyDatabase` text COLLATE utf8_unicode_ci,
  `companyAccessCode` text COLLATE utf8_unicode_ci,
  `cac` text COLLATE utf8_unicode_ci,
  `first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8_unicode_ci,
  `industry` text COLLATE utf8_unicode_ci,
  `website` text COLLATE utf8_unicode_ci,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci,
  `isActive` int(11) NOT NULL DEFAULT '0',
  `date_created` date DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `sagentsid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `agent_call_status` varchar(45) NOT NULL DEFAULT 'Idle',
  `agent_type` varchar(45) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `validation_numbers`
--

CREATE TABLE `validation_numbers` (
  `nvid` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `validation_number` text COLLATE utf8_unicode_ci,
  `isValid` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `callbacks`
--
ALTER TABLE `callbacks`
  ADD PRIMARY KEY (`mkcbid`);

--
-- Indexes for table `call_logs`
--
ALTER TABLE `call_logs`
  ADD PRIMARY KEY (`callid`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaignid`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `sales_emails`
--
ALTER TABLE `sales_emails`
  ADD PRIMARY KEY (`seid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`sagentsid`);

--
-- Indexes for table `validation_numbers`
--
ALTER TABLE `validation_numbers`
  ADD PRIMARY KEY (`nvid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `callbacks`
--
ALTER TABLE `callbacks`
  MODIFY `mkcbid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `call_logs`
--
ALTER TABLE `call_logs`
  MODIFY `callid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaignid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_emails`
--
ALTER TABLE `sales_emails`
  MODIFY `seid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `sagentsid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `validation_numbers`
--
ALTER TABLE `validation_numbers`
  MODIFY `nvid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
