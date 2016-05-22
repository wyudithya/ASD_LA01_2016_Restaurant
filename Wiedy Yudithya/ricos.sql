-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2016 at 07:39 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ricos`
--

-- --------------------------------------------------------

--
-- Table structure for table `mscategory`
--

CREATE TABLE IF NOT EXISTS `mscategory` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscategory`
--

INSERT INTO `mscategory` (`CategoryID`, `CategoryName`) VALUES
(1, 'Food'),
(2, 'Drink');

-- --------------------------------------------------------

--
-- Table structure for table `msingredient`
--

CREATE TABLE IF NOT EXISTS `msingredient` (
  `id` int(11) NOT NULL,
  `ingredientName` varchar(100) NOT NULL,
  `ingredientStock` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msingredient`
--

INSERT INTO `msingredient` (`id`, `ingredientName`, `ingredientStock`) VALUES
(1, 'Sosis Sapi', 100),
(2, 'Keju', 100),
(3, 'Sosis Ayam', 100);

-- --------------------------------------------------------

--
-- Table structure for table `msproduct`
--

CREATE TABLE IF NOT EXISTS `msproduct` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductDecription` varchar(100) NOT NULL,
  `ProductPhoto` varchar(100) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductCategory` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msproduct`
--

INSERT INTO `msproduct` (`ProductID`, `ProductName`, `ProductDecription`, `ProductPhoto`, `ProductPrice`, `ProductCategory`) VALUES
(1, 'Meat Lovers', 'Irisan sosis sapi, daging sapi cincang, burger sapi, sosis ayam', 'assets/themes/images/products/a.png', 40000, 1),
(2, 'Tuna Melt', 'Irisan daging ikan tuna, butiran jagung, saus mayonnaise', 'assets/themes/images/products/b.png', 50000, 1),
(3, 'Hawaiian Chicken', 'Gurih manis pas, nanas, daging ayam asap, saus tomat pizza.', 'assets/themes/images/products/c.png', 88000, 1),
(4, 'Deluxe Cheese', '100% keju mozzarella dengan saus pizza kaya rasa', 'assets/themes/images/products/d.png', 100000, 1),
(5, 'Pepsi Large', 'Softdrink Pepsi', 'assets/themes/images/products/e.png', 10000, 2),
(6, 'Mtn Drew', 'Softdrink Mtn Drew', 'assets/themes/images/products/f.png', 15000, 2),
(7, 'Maist', 'Softdrink Maist', 'assets/themes/images/products/g.png', 5000, 2),
(8, 'Pepsi Reguler', 'Softdrink Pepsi', 'assets/themes/images/products/h.png', 8000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `msrecipe`
--

CREATE TABLE IF NOT EXISTS `msrecipe` (
  `ProductID` int(11) NOT NULL,
  `IngredientID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msrecipe`
--

INSERT INTO `msrecipe` (`ProductID`, `IngredientID`, `Qty`) VALUES
(1, 1, 3),
(1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
  `UserID` int(11) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `UserName` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`UserID`, `UserTypeID`, `UserName`, `Password`, `Name`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Wiedy Yudithya');

-- --------------------------------------------------------

--
-- Table structure for table `msusertype`
--

CREATE TABLE IF NOT EXISTS `msusertype` (
  `usertypeid` int(11) NOT NULL,
  `Usertypename` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msusertype`
--

INSERT INTO `msusertype` (`usertypeid`, `Usertypename`) VALUES
(1, 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mscategory`
--
ALTER TABLE `mscategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `msingredient`
--
ALTER TABLE `msingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msproduct`
--
ALTER TABLE `msproduct`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `msusertype`
--
ALTER TABLE `msusertype`
  ADD PRIMARY KEY (`usertypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mscategory`
--
ALTER TABLE `mscategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `msingredient`
--
ALTER TABLE `msingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `msproduct`
--
ALTER TABLE `msproduct`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `msuser`
--
ALTER TABLE `msuser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `msusertype`
--
ALTER TABLE `msusertype`
  MODIFY `usertypeid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
