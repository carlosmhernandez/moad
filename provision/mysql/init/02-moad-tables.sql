-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 22, 2021 at 01:52 AM
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
  `id` int NOT NULL,
  `LOC_ID` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `City` varchar(40) NOT NULL,
  `State` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Country` varchar(100) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `TZ` varchar(20) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreationDate` datetime NOT NULL
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
  `id` int NOT NULL,
  `Category` varchar(100) NOT NULL,
  `PropertyName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PropertyValue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `Category`, `PropertyName`, `PropertyValue`, `Description`) VALUES
(1, 'General', 'Company Name', 'My Company', 'Personalize the site with your company name'),
(2, 'General', 'Company Logo', '/images/logo-32x32.png', 'Path to your company logo image'),
(3, 'Active Directory', 'Primary Domain Name', 'MyDomain', 'Usually this would be the name of your production Active Directory domain. If you have multiple production domains, this would be your primary one.'),
(4, 'Application', 'FROM Email Address', 'MOAD Automation <moad@mycompany.com>', 'Emails sent by the system will use this address as the sender address.'),
(5, 'Application', 'SMTP Server', 'mailrelay.mycompany.com', 'SMTP Relay server to be used by the system to send email messages.'),
(6, 'Application', 'System Administrator eMail Address', 'admin1@mycompany.com', 'Email address of the system administrator that will receive error notifications.');

-- --------------------------------------------------------

--
-- Table structure for table `supporters`
--

DROP TABLE IF EXISTS `supporters`;
CREATE TABLE `supporters` (
  `id` int NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `DisplayName` varchar(200) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `Company` varchar(100) DEFAULT NULL,
  `DirectPhone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `MobilePhone` varchar(200) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `Name` (`Name`),
  ADD KEY `Region` (`Region`),
  ADD KEY `Country` (`Country`),
  ADD KEY `State` (`State`),
  ADD KEY `City` (`City`),
  ADD KEY `TZ` (`TZ`),
  ADD KEY `Status` (`Status`),
  ADD KEY `LOC_ID` (`LOC_ID`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Category` (`Category`,`PropertyName`);

--
-- Indexes for table `supporters`
--
ALTER TABLE `supporters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `LastName` (`LastName`),
  ADD KEY `FirstName` (`FirstName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supporters`
--
ALTER TABLE `supporters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;
