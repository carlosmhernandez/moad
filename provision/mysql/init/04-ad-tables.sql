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
