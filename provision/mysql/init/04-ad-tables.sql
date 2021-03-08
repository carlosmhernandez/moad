-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Mar 08, 2021 at 12:29 AM
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
  `ou` varchar(250) NOT NULL,
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
-- Table structure for table `groupmemberships`
--

DROP TABLE IF EXISTS `groupmemberships`;
CREATE TABLE `groupmemberships` (
  `groupdn` varchar(250) NOT NULL,
  `usercn` varchar(250) DEFAULT NULL,
  `userdn` varchar(250) NOT NULL,
  `domain` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `dn` varchar(250) NOT NULL,
  `ou` varchar(250) NOT NULL,
  `cn` varchar(200) NOT NULL,
  `Description` tinytext,
  `TotalMembers` int DEFAULT NULL,
  `Domain` varchar(100) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `dn` varchar(250) NOT NULL,
  `ou` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cn` varchar(200) NOT NULL,
  `Enabled` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GivenName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DisplayName` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SID` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Domain` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `UserPrincipalName` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `TelephoneNumber` varchar(30) DEFAULT NULL,
  `UAC` int DEFAULT NULL,
  `HomeDirectory` varchar(200) DEFAULT NULL,
  `LastLogonDate` datetime DEFAULT NULL,
  `LastBadPasswordAttempt` datetime DEFAULT NULL,
  `LockedOut` varchar(5) DEFAULT NULL,
  `PasswordExpired` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PasswordLastSet` datetime DEFAULT NULL,
  `PasswordNetverExpires` varchar(5) DEFAULT NULL,
  `PasswordNotRequired` varchar(5) DEFAULT NULL,
  `GroupMemberships` int DEFAULT NULL,
  `WhenCreated` datetime DEFAULT NULL,
  `WhenChanged` datetime DEFAULT NULL
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
  ADD KEY `domain` (`domain`),
  ADD KEY `ou` (`ou`),
  ADD KEY `WhenChanged` (`WhenChanged`),
  ADD KEY `Enabled` (`Enabled`),
  ADD KEY `OperatingSystem` (`OperatingSystem`),
  ADD KEY `sid` (`sid`),
  ADD KEY `SamAccountName` (`SamAccountName`),
  ADD KEY `IPV4Address` (`IPV4Address`),
  ADD KEY `WhenCreated` (`WhenCreated`),
  ADD KEY `PasswordLastSet` (`PasswordLastSet`);

--
-- Indexes for table `groupmemberships`
--
ALTER TABLE `groupmemberships`
  ADD PRIMARY KEY (`groupdn`,`userdn`),
  ADD KEY `usercn` (`usercn`),
  ADD KEY `domain` (`domain`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`dn`),
  ADD KEY `ou` (`ou`),
  ADD KEY `cn` (`cn`),
  ADD KEY `Type` (`Type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`dn`),
  ADD KEY `ou` (`ou`),
  ADD KEY `cn` (`cn`),
  ADD KEY `Enabled` (`Enabled`),
  ADD KEY `GivenName` (`GivenName`),
  ADD KEY `Surname` (`Surname`),
  ADD KEY `DisplayName` (`DisplayName`),
  ADD KEY `UAC` (`UAC`),
  ADD KEY `Domain` (`Domain`),
  ADD KEY `SID` (`SID`),
  ADD KEY `email` (`email`),
  ADD KEY `GroupMemberships` (`GroupMemberships`),
  ADD KEY `WhenCreated` (`WhenCreated`);
COMMIT;
