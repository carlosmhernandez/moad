# create root user and grant rights
CREATE USER 'moad'@'localhost' IDENTIFIED BY '';
#GRANT ALL ON *.* TO 'root'@'%';


# create databases

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 19, 2021 at 02:45 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `moad`
--
CREATE DATABASE IF NOT EXISTS `moad` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `moad`;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `APP_ID` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Business_Owner` varchar(50) NOT NULL,
  `IT_Owner` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `LOC_ID` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(40) NOT NULL,
  `State` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Country` varchar(100) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `TZ` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
CREATE TABLE `servers` (
  `id` int NOT NULL,
  `Instance` int NOT NULL DEFAULT '0',
  `hostname` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fqdn` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uuid` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Server_Type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Disposition` varchar(30) DEFAULT NULL,
  `Environment` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `LOC_ID` varchar(20) DEFAULT NULL,
  `DataCenter_ID` varchar(50) DEFAULT NULL,
  `iLO` varchar(200) DEFAULT NULL,
  `Platform` varchar(20) NOT NULL DEFAULT 'VM',
  `Manufacturer` varchar(25) DEFAULT NULL,
  `Model` varchar(30) DEFAULT NULL,
  `Serial_Number` varchar(25) DEFAULT NULL,
  `AD_Domain` varchar(50) DEFAULT NULL,
  `OS_Vendor` varchar(20) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  `OS_Version` varchar(25) DEFAULT NULL,
  `IPV4_Addresses` varchar(300) DEFAULT NULL,
  `APP_IDs` varchar(200) DEFAULT NULL,
  `TZ` varchar(20) DEFAULT NULL,
  `CreationTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Retirement_Date` date DEFAULT NULL,
  `LastUpdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `Category` varchar(100) NOT NULL,
  `PropertyName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PropertyValue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`APP_ID`),
  ADD KEY `IT_Owner` (`IT_Owner`),
  ADD KEY `Business_Owner` (`Business_Owner`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`LOC_ID`),
  ADD KEY `Name` (`Name`),
  ADD KEY `Region` (`Region`),
  ADD KEY `Country` (`Country`),
  ADD KEY `State` (`State`),
  ADD KEY `City` (`City`),
  ADD KEY `TZ` (`TZ`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Instance` (`Instance`,`hostname`),
  ADD KEY `hostname` (`hostname`),
  ADD KEY `fqdn` (`fqdn`),
  ADD KEY `Server_Type` (`Server_Type`),
  ADD KEY `LOC_ID` (`LOC_ID`),
  ADD KEY `Platform` (`Platform`),
  ADD KEY `Serial_Number` (`Serial_Number`),
  ADD KEY `Retirement_Date` (`Retirement_Date`),
  ADD KEY `OS_Vendor` (`OS_Vendor`),
  ADD KEY `OS` (`OS`),
  ADD KEY `OS_Version` (`OS_Version`),
  ADD KEY `IPV4_Addresses` (`IPV4_Addresses`),
  ADD KEY `APP_IDs` (`APP_IDs`),
  ADD KEY `Manufacturer` (`Manufacturer`),
  ADD KEY `Model` (`Model`),
  ADD KEY `CreationTime` (`CreationTime`),
  ADD KEY `AD_Domain` (`AD_Domain`),
  ADD KEY `iLO` (`iLO`),
  ADD KEY `DataCenter_ID` (`DataCenter_ID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `Disposition` (`Disposition`),
  ADD KEY `LastUpdated` (`LastUpdated`),
  ADD KEY `Environment` (`Environment`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Category`,`PropertyName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;











-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 15, 2021 at 12:52 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `logs`
--
CREATE DATABASE IF NOT EXISTS `logs` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `logs`;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `jobid` int NOT NULL,
  `ts` datetime NOT NULL,
  `uuid` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `JobName` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `RC` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `end_time` (`end_time`),
  ADD KEY `RC` (`RC`),
  ADD KEY `uuid` (`uuid`),
  ADD KEY `JobName` (`JobName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int NOT NULL AUTO_INCREMENT;
COMMIT;


















-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 16, 2021 at 01:41 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `ad`
--
CREATE DATABASE IF NOT EXISTS `ad` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ad`;

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

DROP TABLE IF EXISTS `computers`;
CREATE TABLE `computers` (
  `dn` varchar(250) NOT NULL,
  `cn` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `sid` varchar(40) NOT NULL,
  `SamAccountName` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `OperatingSystem` varchar(100) NOT NULL,
  `IPV4Address` varchar(200) NOT NULL,
  `Enabled` varchar(5) NOT NULL,
  `PasswordLastSet` datetime NOT NULL,
  `WhenCreated` datetime NOT NULL,
  `WhenChanged` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `dn` varchar(250) NOT NULL,
  `cn` varchar(200) NOT NULL,
  `Enabled` varchar(10) NOT NULL,
  `GivenName` varchar(100) NOT NULL,
  `Surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DisplayName` varchar(200) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `Domain` varchar(100) NOT NULL,
  `UserPrincipalName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`dn`),
  ADD KEY `cn` (`cn`),
  ADD KEY `domain` (`domain`);
COMMIT;
