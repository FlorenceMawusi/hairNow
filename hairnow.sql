-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 12:50 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(6, 'HairNow'),
(7, 'Cantu'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(3, 'Hair Accessories'),
(4, 'Shampoo'),
(5, 'Pomades and Oils'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registry`
--

CREATE TABLE `customer_registry` (
  `customerID` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(150) NOT NULL,
  `c_country` varchar(30) NOT NULL,
  `c_city` varchar(30) NOT NULL,
  `c_contact` varchar(15) NOT NULL,
  `customer_image` varchar(100) DEFAULT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_registry`
--

INSERT INTO `customer_registry` (`customerID`, `customer_name`, `customer_email`, `customer_password`, `c_country`, `c_city`, `c_contact`, `customer_image`, `user_role`) VALUES
(1, 'Florence Ofori', 'florenceoforixyz@gmail.com', '$2y$10$FFXyAx0k5HFPlAr8fTQ4Dut.OixuTm/PZd6W6cSBZ4D1k2031.Z3C', 'Ghana', 'Kwabenya', '0503577361', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hairproducts`
--

CREATE TABLE `hairproducts` (
  `productID` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `productprice` double NOT NULL,
  `productdescription` varchar(500) DEFAULT NULL,
  `productimage` varchar(100) DEFAULT NULL,
  `product_keywords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hairproducts`
--

INSERT INTO `hairproducts` (`productID`, `product_cat`, `product_brand`, `productname`, `productprice`, `productdescription`, `productimage`, `product_keywords`) VALUES
(1, 5, 6, 'HairNow Organic Coconut Oil', 30, 'Due to the composition of organic Coconut Oil, it will help to bind to the protein in hair and protect both the roots and strands of hair from breakage. Repair damaged hair - Organic Coconut Oil is said to be extremely effective in preventing protein loss which will help to repair damaged hair.', 'organic_coconut_oil.jpeg', 'organic, coconut oil'),
(2, 3, 6, 'HairNow Hair thread', 10, ' African Threading is best known as a way of stretching your hair. You can also use threading to style your hair.', 'hair_thread.jpg', 'threading'),
(3, 4, 8, 'Art Naturals Argan Oil', 30, 'Our natural and organic ingredients help repair hair damage and prevent any effects from heat and excess styling. The hydrating minerals and oils work to hydrate the hair and scalp. Leaving hair feeling soft and refreshed.', 'artnaturals_arg_shampoo.jpeg', 'argan oil'),
(4, 6, 6, 'HairNow Organic Aloe Vera Gel', 33, 'It also soothes the scalp and conditions hair. It can reduce dandruff and unblock hair follicles that may be blocked by excess oil. ', 'organic_aloe_vera_gel.jpeg', 'gel, aloe'),
(5, 5, 7, 'Cantu Hair Conditioner', 35, 'Natural Hair Sulfate-Free Hydrating Cream Conditioner Salon Size Sulfate-Free Hydrating Cream Conditioner Salon Size.', 'cantu_hair_conditioner.jpeg', 'conditioner');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderpayments`
--

CREATE TABLE `orderpayments` (
  `pay_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` double NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderpayments`
--

INSERT INTO `orderpayments` (`pay_id`, `invoice_number`, `amount`, `customerID`, `orderid`, `currency`, `payment_date`) VALUES
(3, 1665876427, 106, 1, 3, 'GHC', '2020-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `productorders`
--

CREATE TABLE `productorders` (
  `orderID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productorders`
--

INSERT INTO `productorders` (`orderID`, `customer_ID`, `invoice_no`, `order_date`, `order_status`) VALUES
(1, 1, 485545837, '2020-11-25', 'in progress'),
(2, 1, 559278381, '2020-11-25', 'in progress'),
(3, 1, 1665876427, '2020-11-25', 'in progress');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `product_id` int(11) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`product_id`, `ip_add`, `customer_id`, `quantity`) VALUES
(1, '::1', NULL, 1),
(2, '::1', NULL, 6),
(3, '::1', NULL, 6),
(4, '::1', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_registry`
--
ALTER TABLE `customer_registry`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `hairproducts`
--
ALTER TABLE `hairproducts`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `product_brand` (`product_brand`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orderpayments`
--
ALTER TABLE `orderpayments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `productorders`
--
ALTER TABLE `productorders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_registry`
--
ALTER TABLE `customer_registry`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hairproducts`
--
ALTER TABLE `hairproducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderpayments`
--
ALTER TABLE `orderpayments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productorders`
--
ALTER TABLE `productorders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hairproducts`
--
ALTER TABLE `hairproducts`
  ADD CONSTRAINT `hairproducts_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `hairproducts_ibfk_2` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `productorders` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `hairproducts` (`productID`);

--
-- Constraints for table `orderpayments`
--
ALTER TABLE `orderpayments`
  ADD CONSTRAINT `orderpayments_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_registry` (`customerID`),
  ADD CONSTRAINT `orderpayments_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `productorders` (`orderID`);

--
-- Constraints for table `productorders`
--
ALTER TABLE `productorders`
  ADD CONSTRAINT `productorders_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer_registry` (`customerID`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `hairproducts` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_registry` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
