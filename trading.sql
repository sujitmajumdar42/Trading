-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2014 at 03:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `BRAND_ID` varchar(30) NOT NULL,
  `BRAND_NAME` varchar(30) NOT NULL,
  PRIMARY KEY (`BRAND_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BRAND_ID`, `BRAND_NAME`) VALUES
('1406954968', 'SAMSUNGS'),
('1407572188', 'DELLs'),
('1408085628', 'kissan'),
('1409373782', 'delmonte');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `PROD_ID` varchar(30) NOT NULL,
  `BRAND_ID` varchar(30) NOT NULL,
  `PROD_NAME` varchar(30) NOT NULL,
  `PROD_UNIT` varchar(10) NOT NULL,
  `PROD_IN_BOX` int(30) NOT NULL,
  PRIMARY KEY (`PROD_ID`),
  KEY `BRAND_ID` (`BRAND_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PROD_ID`, `BRAND_ID`, `PROD_NAME`, `PROD_UNIT`, `PROD_IN_BOX`) VALUES
('1407054916', '1406954968', 'galaxy', '', 0),
('1408085670', '1408085628', 'tomato ketchup', 'pac', 0),
('1408173683', '1407572188', 'Inspiron', 'box', 3),
('1408207666', '1406954968', 'Select', 'pac', 0),
('1408864108', '1408085628', 'JAM', 'box', 10),
('1408864349', '1408085628', 'SAUCE', 'box', 12),
('1408864393', '1408085628', 'CHIPS', 'pac', 0),
('1409282965', '1408085628', 'aaa', 'box', 5),
('1409374436', '1409373782', 'Bread', 'pac', 0),
('1409374474', '1409373782', 'Juice', 'box', 10);

-- --------------------------------------------------------

--
-- Table structure for table `prod_account`
--

CREATE TABLE IF NOT EXISTS `prod_account` (
  `PROD_ID` varchar(30) NOT NULL,
  `PROD_BOX_COST` decimal(20,0) NOT NULL,
  `PROD_PAC_COST` decimal(20,0) NOT NULL,
  `VAT` decimal(20,0) NOT NULL,
  `DISCOUNT` decimal(20,0) NOT NULL,
  PRIMARY KEY (`PROD_ID`),
  UNIQUE KEY `PROD_ACCNT_UK` (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_account`
--

INSERT INTO `prod_account` (`PROD_ID`, `PROD_BOX_COST`, `PROD_PAC_COST`, `VAT`, `DISCOUNT`) VALUES
('1409282965', '90', '101', '2', '0'),
('1409374436', '-1', '25', '0', '0'),
('1409374474', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `prod_repo`
--

CREATE TABLE IF NOT EXISTS `prod_repo` (
  `PROD_ID` varchar(30) NOT NULL,
  `PROD_UNIT` varchar(10) NOT NULL,
  `PROD_AVAIL` decimal(20,0) NOT NULL,
  UNIQUE KEY `PROD_REPO_UK_1` (`PROD_ID`,`PROD_UNIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_repo`
--

INSERT INTO `prod_repo` (`PROD_ID`, `PROD_UNIT`, `PROD_AVAIL`) VALUES
('1409282965', 'box', '6'),
('1409282965', 'pac', '26'),
('1409374436', 'pac', '18'),
('1409374474', 'box', '0'),
('1409374474', 'pac', '0');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detl`
--

CREATE TABLE IF NOT EXISTS `receipt_detl` (
  `RCP_ID` varchar(30) NOT NULL,
  `RCP_DATE` datetime NOT NULL,
  `RCP_TOTAL` decimal(30,0) NOT NULL,
  PRIMARY KEY (`RCP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_detl`
--

INSERT INTO `receipt_detl` (`RCP_ID`, `RCP_DATE`, `RCP_TOTAL`) VALUES
('111', '2014-08-12 04:08:39', '100'),
('1407856189', '2014-08-12 05:08:50', '5997'),
('1409286309', '2014-08-29 06:08:09', '296');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `TRD_ID` varchar(30) NOT NULL,
  `TRD_DATE` date NOT NULL,
  `TRD_TYPE` varchar(30) NOT NULL,
  `USER_USERNAME` varchar(30) NOT NULL,
  PRIMARY KEY (`TRD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`TRD_ID`, `TRD_DATE`, `TRD_TYPE`, `USER_USERNAME`) VALUES
('1408174189', '2014-08-16', 'IN', 'admin'),
('1409286523', '2014-08-29', 'IN', 'admin'),
('1409287685', '2014-08-29', 'IN', 'admin'),
('1409289230', '2014-08-29', 'IN', 'admin'),
('1409289326', '2014-08-29', 'IN', 'admin'),
('1409289374', '2014-08-29', 'IN', 'admin'),
('1409289392', '2014-08-29', 'IN', 'admin'),
('1409289609', '2014-08-29', 'IN', 'admin'),
('1409289729', '2014-08-29', 'IN', 'admin'),
('1409289764', '2014-08-29', 'IN', 'admin'),
('1409377653', '2014-08-30', 'IN', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `trade_detl`
--

CREATE TABLE IF NOT EXISTS `trade_detl` (
  `TRD_ID` varchar(30) NOT NULL,
  `PROD_ID` varchar(30) NOT NULL,
  `PROD_UNIT` varchar(30) NOT NULL,
  `PROD_QTY` int(20) NOT NULL,
  UNIQUE KEY `trade_detl_uk` (`TRD_ID`,`PROD_ID`),
  KEY `trd_detl_fk2` (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade_detl`
--

INSERT INTO `trade_detl` (`TRD_ID`, `PROD_ID`, `PROD_UNIT`, `PROD_QTY`) VALUES
('1408174189', '1408173683', 'BOX', 4),
('1409286523', '1409282965', 'BOX', 3),
('1409287685', '1409282965', 'BOX', 3),
('1409289230', '1409282965', 'PAC', 10),
('1409289326', '1409282965', 'PAC', 2),
('1409289374', '1409282965', 'PAC', 2),
('1409289392', '1409282965', 'PAC', 2),
('1409289609', '1409282965', 'PAC', 1),
('1409289729', '1409282965', 'PAC', 1),
('1409289764', '1409282965', 'PAC', 3),
('1409377653', '1409374436', 'PAC', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USR_USERNAME` varchar(30) NOT NULL,
  `USR_PASS` varchar(30) NOT NULL,
  `USR_NAME` varchar(30) NOT NULL,
  `USR_ROLE` varchar(30) NOT NULL,
  `USR_LAST_LOGIN` timestamp NOT NULL,
  PRIMARY KEY (`USR_USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USR_USERNAME`, `USR_PASS`, `USR_NAME`, `USR_ROLE`, `USR_LAST_LOGIN`) VALUES
('admin', 'pass', 'Amit', 'admin', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Brand` FOREIGN KEY (`BRAND_ID`) REFERENCES `brand` (`BRAND_ID`);

--
-- Constraints for table `prod_account`
--
ALTER TABLE `prod_account`
  ADD CONSTRAINT `prod_account_ibfk_1` FOREIGN KEY (`PROD_ID`) REFERENCES `product` (`PROD_ID`);

--
-- Constraints for table `prod_repo`
--
ALTER TABLE `prod_repo`
  ADD CONSTRAINT `PROD_ID_FK_1` FOREIGN KEY (`PROD_ID`) REFERENCES `product` (`PROD_ID`);

--
-- Constraints for table `trade_detl`
--
ALTER TABLE `trade_detl`
  ADD CONSTRAINT `trd_detl_fk1` FOREIGN KEY (`TRD_ID`) REFERENCES `trade` (`TRD_ID`),
  ADD CONSTRAINT `trd_detl_fk2` FOREIGN KEY (`PROD_ID`) REFERENCES `product` (`PROD_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
