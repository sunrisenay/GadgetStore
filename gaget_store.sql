-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 02:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaget_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `AccessoriesID` int(11) NOT NULL,
  `AccessoriesName` varchar(60) NOT NULL,
  `AccessoriesModel` varchar(50) NOT NULL,
  `AccessoriesBrand` varchar(50) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `AccessoriesPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`AccessoriesID`, `AccessoriesName`, `AccessoriesModel`, `AccessoriesBrand`, `TotalQty`, `UnitPrice`, `Color`, `Description`, `AccessoriesPhoto`) VALUES
(1, 'JBL TUNE 220TWS True Wireless Earbuds', 'JBL Earbuds', 'JBL', 5, 250000, 'Rose Gold', 'JBL Pure Bass: \r\nJBL TUNE 220TWS earbuds \r\ndon\'t go for average, \r\nbut play standout audio. \r\nWith a 12.5mm driver \r\nfeaturing JBL Pure Bass Sound, \r\nthey do not skimp on sound.', 'AccessoriesPhoto/jblpods.jpg'),
(2, 'Laptop Sleeve Bag Waterproof 14 -15 Inch', 'Up to 14-15 Inch', 'Dealcase', 4, 35000, 'Pink', 'COMPATIBLE WITH: \r\n15.4 inch MacBook Pro 15\r\n15 inch MacBook Pro \r\nAcer Chromebook 14\r\nAspire 14 \r\nHP Stream 14\r\nHP Chromebook 14\r\netc.', 'AccessoriesPhoto/laptopsleeve.jpg'),
(3, 'JBL Clip 4 - Portable Mini Bluetooth Speaker', 'JBL Bluetooth Speaker', 'JBL', 10, 450000, 'Pink', '\r\nJBL CLIP 4 - Pink\r\nOutdoor Type\r\nBluetooth\r\nWaterproof\r\nUltra-Portable', 'AccessoriesPhoto/jblspeaker.jpg'),
(4, 'Orico Aluminum Fast Charging Mobile Power Bank', 'Power Bank', 'Orico', 6, 60000, 'Dusty Pink', 'Capacity: 20,000mAh.\r\n✔ Input: Micro USB 5V-2A.\r\n✔ Output: 2x USB-A 5V-2.1A.\r\n✔ Intelligent device recognition.\r\n✔ Powerful lithium-ion LG battery.\r\n✔ Conform: CE / FCC / RoHs.', 'AccessoriesPhoto/powerbank.jpg'),
(5, 'High Quality Wireless Keyboard And Mouse', '2.4GHz mini keyboard mouse', 'OEM', 20, 40000, 'Pastel', 'High quality wireless \r\nkeyboard and mouse \r\nultra-thin laptop keyboard \r\nintelligent 2.4GHz mini keyboard \r\nmouse combination unique design', 'AccessoriesPhoto/wirelesskb.jpg'),
(6, 'Laptop Bag LIGHT FLIGHT Laptop Backpack for Women', 'Laptop Backpack', 'LIGHT FLIGHT', 3, 85000, 'Blush', 'Travel Laptop Bag School College\r\nLarge Computer Daypack \r\nFits 15.6” Pink\r\n* Large capacity laptop bag\r\n* Charging port your phone\r\n* Water repellent & Anti theft \r\n  zipper protection\r\n* Comfortable & minimalist fashion\r\n', 'AccessoriesPhoto/BagPack.jpg'),
(7, ' Stylus Touch Pen Compatible with Apple iPad', '2018 and Later', ' Stylus ', 6, 60000, 'White', 'Compatible Models: \r\nOur stylus pencil is \r\ncompatible with iPad 2018 \r\nand later versions\r\n* Tilt Function and \r\n   Highly Sensitive\r\n* Touch Switch and \r\n  Power-Saving Mode', 'AccessoriesPhoto/TouchPen.jpg'),
(8, 'Razer Kraken BT Kitty Wireless Gaming Headset', 'Wireless Gaming Headset', 'Razer(レイザー)', 9, 50000, 'Quartz', '* RAZER CHROMA Compatible \r\n  Cat & Ear Cups\r\n* BLUETOOTH 5.0\r\n* 40MS Low Latency Connection\r\n* Custom Tuned 40MM Driver\r\n* Beam Forming Microphone', 'AccessoriesPhoto/HeadSet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `accessoriessorder`
--

CREATE TABLE `accessoriessorder` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` varchar(15) NOT NULL,
  `AccessoriesID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `ContactPhone` varchar(11) NOT NULL,
  `DeliveryAddress` varchar(255) NOT NULL,
  `PaymentType` varchar(25) NOT NULL,
  `ScreenShot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessoriessorder`
--

INSERT INTO `accessoriessorder` (`OrderID`, `OrderDate`, `AccessoriesID`, `CustomerID`, `TotalAmount`, `TotalQty`, `ContactPhone`, `DeliveryAddress`, `PaymentType`, `ScreenShot`) VALUES
(6, '2022-09-25', 3, 1, 1350000, 3, '09456798098', 'ygn', 'cod', ''),
(7, '2022-09-25', 3, 1, 1800000, 4, '09421141234', 'ygn', 'onlinepay', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `cmp_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(120) DEFAULT NULL,
  `industry` int(11) DEFAULT NULL,
  `num_emp` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img_loc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`cmp_id`, `name`, `email`, `PASSWORD`, `phone`, `address`, `website`, `industry`, `num_emp`, `description`, `img_loc`) VALUES
(1, 'Company1', 'cmp1@gmail.com', 'cmp1', '09423698432', 'Sanchaung Yangon', 'www.cmp1.com', NULL, 100, 'This company1 and good.', NULL),
(2, 'Company2', 'cmp2@gmail.com', 'cmp2', '09422698432', 'Sanchaung Yangon', 'www.cmp2.com', NULL, 200, 'This company2 and good.', NULL),
(3, 'Company3', 'cmp3@gmail.com', 'cmp3', '09422898432', 'Sanchaung Yangon', 'www.cmp3.com', NULL, 300, 'This company3 and good.', NULL),
(4, 'Company4', 'cmp4@gmail.com', 'cmp4', '09422498432', 'Sanchaung Yangon', 'www.cmp4.com', NULL, 400, 'This company4 and good.', NULL),
(5, 'Company5', 'cmp5@gmail.com', 'cmp5', '09422498437', 'Sanchaung Yangon', 'www.cmp5.com', NULL, 500, 'This company5 and good.', NULL),
(6, 'Company6', 'cmp6@gmail.com', 'cmp6', '09422988432', 'Sanchaung Yangon', 'www.cmp6.com', NULL, 600, 'This company6 and good.', NULL),
(7, 'Company7', 'cmp7@gmail.com', 'cmp7', '09422498438', 'Sanchaung Yangon', 'www.cmp7.com', NULL, 100, 'This company7 and good.', NULL),
(8, 'Company8', 'cmp8@gmail.com', 'cmp8', '09422498492', 'Sanchaung Yangon', 'www.cmp8.com', NULL, 100, 'This company8 and good.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `Email` varchar(60) DEFAULT NULL,
  `Password` text DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Dob` date DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `Email`, `Password`, `Phone`, `Dob`, `Gender`, `ProfilePicture`, `Address`) VALUES
(1, 'Su Su', 'susu@gmail.com', 'Susu@123', '09421141234', '1999-10-31', 'Female', 'CustomerProfile/cover.jpg', 'South Okkalapa'),
(2, 'Hla Hla', 'hlahla@gmail.com', 'Hlahla123!@#', '09456798098', '2000-01-02', 'Female', 'CustomerProfile/fashionable-pale-brunette-long-green-dress-black-jacket-sunglasses-standing-street-during-daytime-against-wall-light-city-building.jpg', 'San Chaung'),
(3, 'Khin', 'Khin@gmail.com', 'Khin@123', '09421141234', '1998-02-10', 'Female', 'CustomerProfile/58 Dark Green 3.jpg', 'Ygn'),
(5, 'Aye Aye', 'ayeaye@gmail.com', 'Ayeaye@123', '09123345678', '1998-02-02', 'Male', 'CustomerProfile/Black 1.jpg', '14, Baho Rd, Sanchaung, Yangon.'),
(9, 'James', 'James@gmail.com', 'James@123', '09929323232', '1998-11-25', 'Male', 'CustomerProfile/05 Grey.jpg', 'Hlaing'),
(10, 'Aung Aung', 'aungaung@gmail.com', 'Aung@123', '09423598456', '1990-08-24', 'Male', 'CustomerProfile/00 White.jpg', 'Shan State');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Dob` varchar(20) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `Email`, `Password`, `Gender`, `Dob`, `Phone`, `Role`, `Address`) VALUES
(1, 'Su Su', 'susu@gmail.com', 'Susu@12345', 'Female', '1989-01-31', '09423598456', 'Accountant', 'Ygn'),
(2, 'Thidar', 'thidar@gmail.com', 'Thidar@123', 'Female', '2000-01-01', '09876543234', 'Finance Admin', 'Ygn'),
(3, 'Harry Potter', 'HarryPotter@gmail.com', 'Harry@123', 'Male', '2002-02-02', '09876598567', 'Content Writer', 'Mdy'),
(4, 'Patricia Ong', 'patricia123@gmail.com', 'Patricia@123', 'Female', '1995-02-15', '09421167985', 'HR Manager', 'Mandalay');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `cmp_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `first_name`, `last_name`, `email`, `PASSWORD`, `cmp_id`, `type`) VALUES
(1, 'Kyi Kyi', 'Thant', 'kkt@gmail.com', 'kkt', 1, 1),
(2, 'Kyi Kyi', 'Win', 'kkw@gmail.com', 'kkw', 2, 2),
(3, 'Yin', 'MinKyaw', 'ymk@gmail.com', 'ymk', 3, 3),
(4, 'Marlar', 'Win', 'mlw@gmail.com', 'mlw', 4, 4),
(5, 'Yin', 'KKhine', 'ykk@gmail.com', 'ykk', 5, 5),
(6, 'Moh', 'MohAung', 'mma@gmail.com', 'mma', 6, 6),
(7, 'John', 'Smith', 'john@gmail.com', 'john', 7, 7),
(9, 'Jackson', 'Doe', 'jackson@gmail.com', 'jackson', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`AccessoriesID`);

--
-- Indexes for table `accessoriessorder`
--
ALTER TABLE `accessoriessorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `AccessoriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `accessoriessorder`
--
ALTER TABLE `accessoriessorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
