-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2015 at 02:03 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vape`
--

-- --------------------------------------------------------

--
-- Table structure for table `ltnotificationtype`
--

CREATE TABLE IF NOT EXISTS `ltnotificationtype` (
  `NotificationTypeID` int(11) NOT NULL,
  `NotificationType` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltnotificationtype`
--

INSERT INTO `ltnotificationtype` (`NotificationTypeID`, `NotificationType`) VALUES
(1, 'Order'),
(2, 'Payment'),
(3, 'Contact');

-- --------------------------------------------------------

--
-- Table structure for table `ltorderstatus`
--

CREATE TABLE IF NOT EXISTS `ltorderstatus` (
  `OrderStatusID` int(11) NOT NULL,
  `OrderStatus` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltorderstatus`
--

INSERT INTO `ltorderstatus` (`OrderStatusID`, `OrderStatus`) VALUES
(1, 'Waiting Payment'),
(2, 'Waiting Confirmation'),
(3, 'Being Processed'),
(4, 'On The Way'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `ltpaymenttype`
--

CREATE TABLE IF NOT EXISTS `ltpaymenttype` (
  `PaymentTypeID` int(11) NOT NULL,
  `PaymentType` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltpaymenttype`
--

INSERT INTO `ltpaymenttype` (`PaymentTypeID`, `PaymentType`) VALUES
(1, 'Cash on Delivery'),
(2, 'Bank Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `ltusertype`
--

CREATE TABLE IF NOT EXISTS `ltusertype` (
  `UserTypeID` int(11) NOT NULL,
  `UserType` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltusertype`
--

INSERT INTO `ltusertype` (`UserTypeID`, `UserType`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `msbanner`
--

CREATE TABLE IF NOT EXISTS `msbanner` (
  `BannerID` char(20) NOT NULL,
  `ProductID` char(20) NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msbanner`
--

INSERT INTO `msbanner` (`BannerID`, `ProductID`, `AuditedUser`, `AuditedTime`, `AuditedActivity`) VALUES
('BPt20151031120225467', 'Pte20151029015804237', 'test', '2015-10-31 18:02:25', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `mscategory`
--

CREATE TABLE IF NOT EXISTS `mscategory` (
  `CategoryID` int(11) NOT NULL,
  `ParentCategoryID` int(11) NOT NULL,
  `IsSubCategory` char(1) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscategory`
--

INSERT INTO `mscategory` (`CategoryID`, `ParentCategoryID`, `IsSubCategory`, `CategoryName`, `AuditedUser`, `AuditedTime`, `AuditedActivity`) VALUES
(1, 0, '0', 'test parent1111', 'test', '2015-11-07 07:59:55', 'U'),
(2, 4, '1', 'test child', 'test', '2015-11-07 08:37:47', 'U'),
(3, 1, '1', 'child2', 'test', '2015-11-06 00:00:00', 'I'),
(4, 0, '0', 'parent 2', 'test', '2015-11-06 00:00:00', 'I'),
(5, 0, '0', 'asdf', 'test', '2015-11-07 08:37:32', 'U'),
(6, 0, '1', 'asdfasdfasdf', 'test', '2015-11-07 08:38:35', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `mscontact`
--

CREATE TABLE IF NOT EXISTS `mscontact` (
  `ContactID` char(20) NOT NULL,
  `UserID` char(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Message` text NOT NULL,
  `Time` datetime NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscontact`
--

INSERT INTO `mscontact` (`ContactID`, `UserID`, `Name`, `Email`, `PhoneNumber`, `Message`, `Time`, `AuditedUser`, `AuditedTime`, `AuditedActivity`) VALUES
('c1', 'test', 'Fer', 'fer@asdf.com', '34675722353', 'agaewt Berikut terlampir notulen rapat dan rundown FUMA 17 Oktober 2015Berikut terlampir notulen rapat dan rundown FUMA 17 Oktober 2015Berikut terlampir notulen rapat dan rundown FUMA 17 Oktober 2015Berikut terlampir notulen rapat dan rundown FUMA 17 Oktober 2015Berikut terlampir notulen rapat dan rundown FUMA 17 Oktober 2015Berikut terlampir notulen rapat dan rundown FUMA 17 Oktober 2015Berikut terlampir notulen rapat dan rundown FUMA 17 Oktober 2015', '2015-10-19 00:00:00', 'test', '2015-10-25 16:51:02', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `mspayment`
--

CREATE TABLE IF NOT EXISTS `mspayment` (
  `PaymentID` char(20) NOT NULL,
  `OrderID` char(20) NOT NULL,
  `BankName` varchar(50) NOT NULL,
  `AccountNumber` varchar(20) NOT NULL,
  `TransferDestinationID` int(11) NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL,
  `TransferDate` date NOT NULL,
  `AccountName` varchar(100) NOT NULL,
  `IsProcessed` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mspayment`
--

INSERT INTO `mspayment` (`PaymentID`, `OrderID`, `BankName`, `AccountNumber`, `TransferDestinationID`, `AuditedUser`, `AuditedTime`, `AuditedActivity`, `TransferDate`, `AccountName`, `IsProcessed`) VALUES
('C1220151212050041305', 'o1', 'BCA', '1246354327', 1, 'test', '2015-12-12 11:00:41', 'I', '2015-12-12', 'asdf', '0');

-- --------------------------------------------------------

--
-- Table structure for table `msproduct`
--

CREATE TABLE IF NOT EXISTS `msproduct` (
  `ProductID` char(20) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `ProductName` varchar(300) NOT NULL,
  `ProductDesc` text NOT NULL,
  `ShortDescription` text NOT NULL,
  `Color` char(7) NOT NULL,
  `Price` int(11) NOT NULL,
  `Keyword` text NOT NULL,
  `TransactionCount` int(11) NOT NULL,
  `Discount` double NOT NULL,
  `IsFeatured` char(1) NOT NULL,
  `Photo` text NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msproduct`
--

INSERT INTO `msproduct` (`ProductID`, `CategoryID`, `ProductName`, `ProductDesc`, `ShortDescription`, `Color`, `Price`, `Keyword`, `TransactionCount`, `Discount`, `IsFeatured`, `Photo`, `AuditedUser`, `AuditedTime`, `AuditedActivity`) VALUES
('p1', 3, 'product name', 'description', '', '#000000', 100000, 'no keywords', 1, 0, '0', '', 'test', '2015-10-21 00:00:00', 'I'),
('p15', 3, 'product name', 'description', '', '#ffffff', 100000, 'no keywords', 1, 0, '0', '', 'test', '2015-10-21 00:00:00', 'I'),
('p2', 3, 'prodname2', 'description 2', '', '#57d731', 2000000, 'cheap', 2, 10, '1', '', 'test', '2015-10-21 00:00:00', 'I'),
('Pte20151029015804237', 2, 'testf', '<p>asdfasdba aewfae faweg</p>', '', '#1578f4', 32556, 'vavda fawef aew faef a', 0, 11, '0', 'Pte20151029015804237.jpg', 'test', '2015-10-29 07:58:04', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `mstransferdestination`
--

CREATE TABLE IF NOT EXISTS `mstransferdestination` (
  `TransferDestinationID` int(11) NOT NULL,
  `BankName` varchar(50) NOT NULL,
  `AccountNumber` varchar(20) NOT NULL,
  `AccountName` varchar(100) NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstransferdestination`
--

INSERT INTO `mstransferdestination` (`TransferDestinationID`, `BankName`, `AccountNumber`, `AccountName`, `AuditedUser`, `AuditedTime`, `AuditedActivity`) VALUES
(1, 'BCA', '5271254343', 'Ferico Samuel', 'test', '2015-11-15 17:37:33', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
  `UserID` char(20) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Address` text NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`UserID`, `UserTypeID`, `Name`, `Username`, `Password`, `Email`, `PhoneNumber`, `DOB`, `Address`, `AuditedUser`, `AuditedTime`, `AuditedActivity`) VALUES
('adminR', 1, 'rafael', 'adminR', '21232f297a57a5a743894a0e4a801fc3', '', '', '0000-00-00', '', 'Raw', '2015-10-18 00:00:00', 'I'),
('test', 1, 'ferico samuel', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'asdf@asdf.com', '123', '2015-12-12', 'addr', 'Fer', '2015-10-18 00:00:00', 'I'),
('u2', 2, 'asdf asdf', 'asdf', 'asdf', '', '', '2015-10-25', 'asdfasdfasdfasdfsdf', 'test', '2015-10-25 00:00:00', 'I'),
('UAn20151130035942008', 3, 'Andre Wijaya', 'anwijaya', '202cb962ac59075b964b07152d234b70', 'andy_djauw@yahoo.co.id', '1234', '0000-00-00', 'asfd', 'Admin', '2015-11-30 22:59:42', 'I'),
('Uan20151130042539246', 3, 'andrewij', 'asdf', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '12', '0000-00-00', 'asdf', 'Admin', '2015-11-30 23:25:39', 'I'),
('Uas20151130042516816', 3, 'asdf', 'adsf', '21232f297a57a5a743894a0e4a801fc3', 'ddd@gmail.com', '1234', '0000-00-00', 'asdfasdf', 'Admin', '2015-11-30 23:25:16', 'I'),
('USi20151130042706319', 3, 'Siti', 'admin1', '21232f297a57a5a743894a0e4a801fc3', 'siti@gm.co', '123', '2015-11-25', '123', 'Admin', '2015-11-30 23:27:06', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `trnotification`
--

CREATE TABLE IF NOT EXISTS `trnotification` (
  `NotificationID` char(20) NOT NULL,
  `NotificationTypeID` int(11) NOT NULL,
  `ReferenceID` char(20) NOT NULL,
  `IsRead` char(1) NOT NULL,
  `Time` datetime NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trnotification`
--

INSERT INTO `trnotification` (`NotificationID`, `NotificationTypeID`, `ReferenceID`, `IsRead`, `Time`, `AuditedUser`, `AuditedTime`, `AuditedActivity`) VALUES
('n1', 3, 'c1', '1', '2015-10-19 00:00:00', 'test', '2015-11-14 20:01:38', 'U'),
('n2', 1, 'o1', '1', '2015-10-19 00:00:00', 'test', '2015-12-13 07:55:39', 'U'),
('n3', 2, 'p1', '1', '2015-11-14 00:00:00', 'test', '2015-11-15 09:47:07', 'U'),
('NCB20151212050041342', 2, 'C1220151212050041305', '1', '2015-12-12 11:00:41', 'test', '2015-12-12 11:02:14', 'U'),
('NOt20151212074923351', 1, 'Ote20151212074923302', '1', '2015-12-12 13:49:23', 'test', '2015-12-13 07:59:36', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `trorder`
--

CREATE TABLE IF NOT EXISTS `trorder` (
  `OrderID` char(20) NOT NULL,
  `UserID` char(20) NOT NULL,
  `PaymentTypeID` int(11) NOT NULL,
  `OrderStatusID` int(11) NOT NULL,
  `TrackingID` int(11) NOT NULL,
  `Notes` text NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `RecipientName` varchar(300) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `DeliveryDate` datetime NOT NULL,
  `ReceivedDate` datetime NOT NULL,
  `AuditedUser` char(20) NOT NULL,
  `AuditedTime` datetime NOT NULL,
  `AuditedActivity` char(1) NOT NULL,
  `ShippingCost` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `NomorResi` varchar(100) NOT NULL,
  `Service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trorder`
--

INSERT INTO `trorder` (`OrderID`, `UserID`, `PaymentTypeID`, `OrderStatusID`, `TrackingID`, `Notes`, `Address`, `Email`, `PhoneNumber`, `RecipientName`, `OrderDate`, `DeliveryDate`, `ReceivedDate`, `AuditedUser`, `AuditedTime`, `AuditedActivity`, `ShippingCost`, `Total`, `NomorResi`, `Service`) VALUES
('o1', 'test', 2, 5, 123, 'no notes for now', 'same address', '', '', 'no name tough', '2015-12-09 00:00:00', '2015-12-12 00:00:00', '2015-12-14 00:00:00', 'test', '2015-12-12 17:38:24', 'U', 9000, 10000000, '3333333333333333333', ''),
('Ote20151212074923302', 'test', 2, 1, 1714763056, 'byugy', 'iuhaohdauh<br>Jambi<br>Jambi', 'ferico55@gmail.com', '12567886754', 'ferfer', '2015-12-12 13:49:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', '2015-12-12 13:49:23', 'I', 19000, 7200000, '', 'JNE - Ongkos Kirim Ekonomis');

-- --------------------------------------------------------

--
-- Table structure for table `trorderdetail`
--

CREATE TABLE IF NOT EXISTS `trorderdetail` (
  `OrderDetailID` char(20) NOT NULL,
  `OrderID` char(20) NOT NULL,
  `ProductID` char(20) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trorderdetail`
--

INSERT INTO `trorderdetail` (`OrderDetailID`, `OrderID`, `ProductID`, `Qty`, `Discount`, `Price`) VALUES
('D0120151212074923348', 'Ote20151212074923302', 'p2', 4, 10, 2000000),
('od1', 'o1', 'p1', 10, 0, 100000),
('od2', 'o2', 'p2', 5, 10, 2000000),
('od3', 'o1', 'p2', 55, 10, 2000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ltnotificationtype`
--
ALTER TABLE `ltnotificationtype`
  ADD PRIMARY KEY (`NotificationTypeID`);

--
-- Indexes for table `ltorderstatus`
--
ALTER TABLE `ltorderstatus`
  ADD PRIMARY KEY (`OrderStatusID`);

--
-- Indexes for table `ltpaymenttype`
--
ALTER TABLE `ltpaymenttype`
  ADD PRIMARY KEY (`PaymentTypeID`);

--
-- Indexes for table `ltusertype`
--
ALTER TABLE `ltusertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- Indexes for table `msbanner`
--
ALTER TABLE `msbanner`
  ADD PRIMARY KEY (`BannerID`);

--
-- Indexes for table `mscategory`
--
ALTER TABLE `mscategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `mscontact`
--
ALTER TABLE `mscontact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `mspayment`
--
ALTER TABLE `mspayment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `msproduct`
--
ALTER TABLE `msproduct`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `mstransferdestination`
--
ALTER TABLE `mstransferdestination`
  ADD PRIMARY KEY (`TransferDestinationID`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `trnotification`
--
ALTER TABLE `trnotification`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `trorder`
--
ALTER TABLE `trorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `trorderdetail`
--
ALTER TABLE `trorderdetail`
  ADD PRIMARY KEY (`OrderDetailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ltnotificationtype`
--
ALTER TABLE `ltnotificationtype`
  MODIFY `NotificationTypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ltorderstatus`
--
ALTER TABLE `ltorderstatus`
  MODIFY `OrderStatusID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ltpaymenttype`
--
ALTER TABLE `ltpaymenttype`
  MODIFY `PaymentTypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ltusertype`
--
ALTER TABLE `ltusertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mscategory`
--
ALTER TABLE `mscategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mstransferdestination`
--
ALTER TABLE `mstransferdestination`
  MODIFY `TransferDestinationID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
