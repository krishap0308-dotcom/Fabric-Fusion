-- Fabric Fusion Database Schema
-- Compatible with MySQL / MariaDB (phpMyAdmin / XAMPP)

CREATE DATABASE IF NOT EXISTS `shopping`;
USE `shopping`;

-- --------------------------------------------------------

-- Table structure for `user_form` (Login & Registration System)
CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `cart` (User Shopping Cart)
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `payment` (Order Payment Details)
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tbladmin` (Admin Portal Users)
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default Admin Account: admin / admin123 (MD5 hashed: 21232f297a57a5a743894a0e4a801fc3)
INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegDate`) 
VALUES (1, 'Admin', 'admin', 9876543210, 'admin@fabricfusion.com', '21232f297a57a5a743894a0e4a801fc3', CURRENT_TIMESTAMP)
ON DUPLICATE KEY UPDATE `ID`=`ID`;

-- --------------------------------------------------------

-- Table structure for `tblartist`
CREATE TABLE IF NOT EXISTS `tblartist` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Education` text DEFAULT NULL,
  `Award` text DEFAULT NULL,
  `Profilepic` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblarttype`
CREATE TABLE IF NOT EXISTS `tblarttype` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ArtType` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblartmedium`
CREATE TABLE IF NOT EXISTS `tblartmedium` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ArtMedium` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblartproduct`
CREATE TABLE IF NOT EXISTS `tblartproduct` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) DEFAULT NULL,
  `Dimension` varchar(200) DEFAULT NULL,
  `Orientation` varchar(200) DEFAULT NULL,
  `Size` varchar(200) DEFAULT NULL,
  `Artist` int(10) DEFAULT NULL,
  `ArtType` int(10) DEFAULT NULL,
  `ArtMedium` int(10) DEFAULT NULL,
  `SellingPricing` decimal(10,2) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Image1` varchar(200) DEFAULT NULL,
  `Image2` varchar(200) DEFAULT NULL,
  `Image3` varchar(200) DEFAULT NULL,
  `Image4` varchar(200) DEFAULT NULL,
  `RefNum` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblphotographer`
CREATE TABLE IF NOT EXISTS `tblphotographer` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Education` text DEFAULT NULL,
  `Award` text DEFAULT NULL,
  `Profilepic` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblpictype`
CREATE TABLE IF NOT EXISTS `tblpictype` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `picType` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblpicproduct`
CREATE TABLE IF NOT EXISTS `tblpicproduct` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) DEFAULT NULL,
  `Dimension` varchar(200) DEFAULT NULL,
  `Orientation` varchar(200) DEFAULT NULL,
  `Size` varchar(200) DEFAULT NULL,
  `Photographer` int(10) DEFAULT NULL,
  `PicType` int(10) DEFAULT NULL,
  `SellingPricing` decimal(10,2) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Image1` varchar(200) DEFAULT NULL,
  `Image2` varchar(200) DEFAULT NULL,
  `Image3` varchar(200) DEFAULT NULL,
  `Image4` varchar(200) DEFAULT NULL,
  `RefNum` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblenquiry`
CREATE TABLE IF NOT EXISTS `tblenquiry` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `EnquiryNumber` varchar(200) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `AdminRemark` text DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for `tblpage`
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` text DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Timing` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed data for Contact Us page
INSERT INTO `tblpage` (`PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `Timing`) 
VALUES ('contactus', 'Contact Us', 'Feel free to reach out to Fabric Fusion support.', 'info@fabricfusion.com', 9876543210, '10:00 AM - 7:00 PM')
ON DUPLICATE KEY UPDATE `ID`=`ID`;
