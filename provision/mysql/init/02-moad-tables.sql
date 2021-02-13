-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 11, 2021 at 02:20 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `moad`
--
CREATE DATABASE IF NOT EXISTS `moad` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
  ADD KEY `LastUpdated` (`LastUpdated`);
COMMIT;