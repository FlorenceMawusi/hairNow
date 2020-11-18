-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 06:18 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hairnow`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_registry`
--

CREATE TABLE `customer_registry` (
  `customerID` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(20) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `c_country` varchar(50) NOT NULL,
  `c_city` varchar(50) NOT NULL,
  `c_contact` int(15) NOT NULL,
  `customer_image` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hairproducts`
--

CREATE TABLE `hairproducts` (
  `productID` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productdescription` text NOT NULL,
  `productprice` double NOT NULL,
  `productimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderpayments`
--

CREATE TABLE `orderpayments` (
  `invoice_number` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `amount` double NOT NULL,
  `paymentmode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productorders`
--

CREATE TABLE `productorders` (
  `orderID` int(10) NOT NULL,
  `customer_ID` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_registry`
--
ALTER TABLE `customer_registry`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `hairproducts`
--
ALTER TABLE `hairproducts`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `orderpayments`
--
ALTER TABLE `orderpayments`
  ADD PRIMARY KEY (`invoice_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_registry`
--
ALTER TABLE `customer_registry`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hairproducts`
--
ALTER TABLE `hairproducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderpayments`
--
ALTER TABLE `orderpayments`
  MODIFY `invoice_number` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
