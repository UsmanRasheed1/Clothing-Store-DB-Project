-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 07:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-clothingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout_details`
--

CREATE TABLE `checkout_details` (
  `email` varchar(50) NOT NULL,
  `phonenum` varchar(13) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout_details`
--

INSERT INTO `checkout_details` (`email`, `phonenum`, `Address`, `Comments`) VALUES
('example@gmail.com', '03222231670', 'Example Address', 'dsafads'),
('exmple12@gmail.com', '03222231670', 'Example Address', 'dsafads'),
('k213225@nu.edu.pk', '03222231670', 'Example Address', 'dsafads'),
('k214924@nu.edu.pk', '03222231670', 'Example Address', 'dsafads'),
('newemail@gmail.com', '12222222222', 'Example Address', '4sed5rf6g7h8j9i'),
('usmanrasheed2002@gmail.com', '03222231670', 'Example Address', 'dsafads');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `Clothesid` int(11) NOT NULL,
  `clothes_name` varchar(100) DEFAULT NULL,
  `category` varchar(6) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`Clothesid`, `clothes_name`, `category`, `Price`, `picture`) VALUES
(1, 'MENS T-SHIRT', 'Men', 400, 'ProjectImages/1black.webp'),
(2, 'MENS LEVIS', 'Men', 700, 'ProjectImages/2black.webp'),
(3, 'PALM TREE EMBROIDERY HOODIE', 'Women', 2200, 'ProjectImages/3pink.jpg'),
(4, 'LINEN BRAND SHORTS', 'Women', 1200, 'ProjectImages/4orange.jpg'),
(5, 'SCOTCH & SODA CONTRAST PANEL SHORTS', 'Women', 2200, 'ProjectImages/5pink.jpg'),
(6, 'HALF FANCY SUMMER DRESS', 'Women', 1300, 'ProjectImages/6yellow.jpg'),
(7, 'FLIX FLOX JEANS', 'Women', 1300, 'ProjectImages/7blue.jpg'),
(8, 'FANCY SWEATER', 'Women', 1500, 'ProjectImages/8yellow.jpg'),
(9, 'VARSITY RIBBED MAXI DRESS WITH BELT', 'Women', 4000, 'ProjectImages/9blue.webp'),
(10, 'WOMENS JOSS PANTS', 'Women', 3000, 'ProjectImages/10blue.jpg'),
(13, 'CONTRAST COLLAR COTTON JACKET', 'Winter', 20000, 'ProjectImages/13black.webp'),
(14, 'DENIM VARSITY JACKET', 'Winter', 15000, 'ProjectImages/14blue.webp'),
(15, 'QUILTED GILET WITH CONTRAST DETAILS', 'winter', 12000, 'ProjectImages/15brown.webp'),
(16, 'FAUX SUEDE JACKET WITH SHERPA COLLAR', 'winter', 12000, 'ProjectImages/16black.webp'),
(17, 'FAUX SUEDE VARSITY BOMBER JACKET', 'winter', 18000, 'ProjectImages/17blue.webp'),
(18, 'FAUX LEATHER OVERSIZED JACKET', 'winter', 19000, 'ProjectImages/18black.webp'),
(19, 'FAUX SUEDE JACKET WITH ZIP', 'winter', 17000, 'ProjectImages/19green.webp'),
(20, 'FAUX SUEDE VARSITY JACKET', 'winter', 23000, 'ProjectImages/20black.webp'),
(21, 'FAUX SUEDE BIKER JACKET', 'winter', 21000, 'ProjectImages/21blue.webp'),
(22, 'HAVANNA TROPIC PRINT SHIRT', 'men', 2200, 'ProjectImages/22orange.webp'),
(24, 'COTTON-LINEN SHIRT', 'men', 1200, 'ProjectImages/24white.webp'),
(25, 'GRADIENT SLOGAN GRAPHIC T-SHIRT', 'men', 1600, 'ProjectImages/25white.webp'),
(26, 'STRIPED COTTON SHIRT', 'men', 1500, 'ProjectImages/26blue.webp'),
(27, 'SLIM FIT TROUSERS', 'men', 2000, 'ProjectImages/27green.webp'),
(28, 'COLOR-BLOCK SHORTS WITH PRINT', 'men', 1800, 'ProjectImages/28blue.webp'),
(29, 'COTTON CHINOS', 'men', 2500, 'ProjectImages/29black.webp'),
(30, 'TENNIS GRAPHIC HOODIE', 'kids', 4000, 'ProjectImages/30black.webp'),
(31, 'SKATER FIT JEANS', 'kids', 3500, 'ProjectImages/31green.webp'),
(32, 'SMILE HOODED ZIPPER SWEATSHIRT', 'kids', 4500, 'ProjectImages/32purple.webp'),
(33, 'SWEATSHIRT WITH CHECKERED PRINT DETAIL', 'kids', 4500, 'ProjectImages/33brown.webp'),
(34, 'CHARACTER PRINTED HOODIE', 'kids', 3500, 'ProjectImages/34gray.webp'),
(35, 'CHECKERED SHIRT WITH PATCH POCKET', 'kids', 3000, 'ProjectImages/35black.webp'),
(36, 'PLAIN SWEATSHIRT WITH ZIPPER OPENING', 'kids', 5000, 'ProjectImages/36red.webp'),
(37, 'STRAIGHT FIT JEANS', 'kids', 4000, 'ProjectImages/37blue.webp'),
(38, 'MOON NECK SWEATER', 'winter', 5000, 'ProjectImages/38orange.webp'),
(39, 'EMPATHY SWEATSHIRT', 'winter', 2000, 'ProjectImages/39purple.webp'),
(40, 'AARUSHI GREEN MUSLIN KURTA SET', 'women', 2900, 'ProjectImages/40green.jpg'),
(42, 'SRILEKHA SLUB STRAIGHT KURTA PALAZZO SET', 'women', 2200, 'ProjectImages/41pink.jpg');

--
-- Triggers `clothes`
--
DELIMITER $$
CREATE TRIGGER `check_category` BEFORE INSERT ON `clothes` FOR EACH ROW BEGIN
    IF NOT (NEW.Category IN ('Men', 'Women', 'kids','winter')) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid category. Please use Men, Women, kids or winter';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `Clothesid` int(11) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`Clothesid`, `Color`, `picture`) VALUES
(1, 'Black', 'ProjectImages/1black.webp'),
(2, 'Black', 'ProjectImages/2black.webp'),
(2, 'Blue', 'ProjectImages/2blue.jpg'),
(2, 'Red', 'ProjectImages/2red.webp'),
(3, 'Pink', 'ProjectImages/3pink.jpg'),
(4, 'Orange', 'ProjectImages/4orange.jpg'),
(4, 'Pink', 'ProjectImages/4pink.webp'),
(5, 'Green', 'ProjectImages/5green.webp'),
(5, 'Grey', 'ProjectImages/5grey.webp'),
(5, 'Pink', 'ProjectImages/5pink.jpg'),
(6, 'Blue', 'ProjectImages/6blue.jpg'),
(6, 'Yellow', 'ProjectImages/6yellow.jpg'),
(7, 'Black', 'ProjectImages/7black.webp'),
(7, 'Blue', 'ProjectImages/7blue.jpg'),
(8, 'Red', 'ProjectImages/8red.jpg'),
(8, 'Yellow', 'ProjectImages/8yellow.jpg'),
(9, 'Blue', 'ProjectImages/9blue.webp'),
(9, 'Brown', 'ProjectImages/9brown.webp'),
(10, 'Blue', 'ProjectImages/10blue.jpg'),
(10, 'Brown', 'ProjectImages/10brown.jpg'),
(13, 'Black', 'ProjectImages/13black.webp'),
(13, 'Brown', 'ProjectImages/13brown.webp'),
(14, 'Blue', 'ProjectImages/14blue.webp'),
(15, 'Blue', 'ProjectImages/15blue.webp'),
(15, 'Brown', 'ProjectImages/15brown.webp'),
(16, 'Black', 'ProjectImages/16black.webp'),
(16, 'Brown', 'ProjectImages/16brown.webp'),
(17, 'Blue', 'ProjectImages/17blue.webp'),
(17, 'Brown', 'ProjectImages/17brown.webp'),
(18, 'Black', 'ProjectImages/18black.webp'),
(18, 'Blue', 'ProjectImages/18blue.webp'),
(19, 'Black', 'ProjectImages/19black.webp'),
(19, 'Green', 'ProjectImages/19green.webp'),
(20, 'Black', 'ProjectImages/20black.webp'),
(21, 'Blue', 'ProjectImages/21blue.webp'),
(21, 'Brown', 'ProjectImages/21brown.jpg'),
(22, 'Orange', 'ProjectImages/22orange.webp'),
(24, 'White', 'ProjectImages/24white.webp'),
(25, 'Black', 'ProjectImages/25black.webp'),
(25, 'Gray', 'ProjectImages/25gray.webp'),
(25, 'White', 'ProjectImages/25white.webp'),
(26, 'Blue', 'ProjectImages/26blue.webp'),
(26, 'White', 'ProjectImages/26white.webp'),
(27, 'Black', 'ProjectImages/27black.webp'),
(27, 'Green', 'ProjectImages/27green.webp'),
(28, 'Blue', 'ProjectImages/28blue.webp'),
(28, 'Brown', 'ProjectImages/28brown.webp'),
(29, 'Black', 'ProjectImages/29black.webp'),
(29, 'Brown', 'ProjectImages/29brown.webp'),
(30, 'Black', 'ProjectImages/30black.webp'),
(30, 'Brown', 'ProjectImages/30brown.webp'),
(31, 'Green', 'ProjectImages/31green.webp'),
(32, 'Brown', 'ProjectImages/32brown.webp'),
(32, 'Purple', 'ProjectImages/32purple.webp'),
(33, 'Black', 'ProjectImages/33black.webp'),
(33, 'Brown', 'ProjectImages/33brown.webp'),
(34, 'Brown', 'ProjectImages/34brown.webp'),
(34, 'Gray', 'ProjectImages/34gray.webp'),
(35, 'Black', 'ProjectImages/35black.webp'),
(35, 'Green', 'ProjectImages/35green.webp'),
(36, 'Gray', 'ProjectImages/36gray.webp'),
(36, 'Red', 'ProjectImages/36red.webp'),
(37, 'Blue', 'ProjectImages/37blue.webp'),
(38, 'Blue', 'ProjectImages/38blue.webp'),
(38, 'Orange', 'ProjectImages/38orange.webp'),
(39, 'Black', 'ProjectImages/39black.webp'),
(39, 'Purple', 'ProjectImages/39purple.webp'),
(40, 'Green', 'ProjectImages/40green.jpg\r\n'),
(42, 'Pink', 'ProjectImages/41pink.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_receipts`
-- (See below for the actual view)
--
CREATE TABLE `customer_receipts` (
`Full Name` varchar(51)
,`receipttext` varchar(10000)
,`totalprice` int(8)
,`deliverydate` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `my_cart`
--

CREATE TABLE `my_cart` (
  `Orderid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Clothesid` int(11) NOT NULL,
  `Clothes_Name` varchar(50) NOT NULL,
  `Color` varchar(7) NOT NULL,
  `Clothesize` varchar(2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Total_Price` int(11) DEFAULT NULL,
  `Picture` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `my_cart`
--

INSERT INTO `my_cart` (`Orderid`, `email`, `Clothesid`, `Clothes_Name`, `Color`, `Clothesize`, `Quantity`, `Price`, `Total_Price`, `Picture`) VALUES
(101, 'exmple12@gmail.com', 24, 'COTTON-LINEN SHIRT', 'White', 'XS', 1, 1200, 1200, 'ProjectImages/24white.webp'),
(103, 'usmanrasheed2002@gmail.com', 15, 'QUILTED GILET WITH CONTRAST DETAILS', 'Blue', 'XS', 1, 12000, 12000, 'ProjectImages/15blue.webp'),
(105, 'exmple12@gmail.com', 24, 'COTTON-LINEN SHIRT', 'White', 'XS', 1, 1200, 1200, 'ProjectImages/24white.webp'),
(107, 'newemail@gmail.com', 16, 'FAUX SUEDE JACKET WITH SHERPA COLLAR', 'Black', 'XS', 1, 12000, 12000, 'ProjectImages/16black.webp'),
(108, 'newemail@gmail.com', 7, 'FLIX FLOX JEANS', 'Black', 'XS', 1, 1300, 1300, 'ProjectImages/7black.webp');

--
-- Triggers `my_cart`
--
DELIMITER $$
CREATE TRIGGER `calculate_total_price` BEFORE INSERT ON `my_cart` FOR EACH ROW BEGIN
    SET NEW.total_price = NEW.price * NEW.quantity;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_clothes_size` BEFORE INSERT ON `my_cart` FOR EACH ROW BEGIN
    IF NOT (NEW.clothesize IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Invalid clothes size. Please use XS, S, M, L, or XL.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `Owner_Email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`Owner_Email`, `Name`, `Password`) VALUES
('k213225@nu.edu.pk', 'Usman Rasheed', '21K3225'),
('k214924@nu.edu.pk', 'Muneeb Ali', '21K4924');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `ReceiptID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ReceiptText` varchar(10000) NOT NULL,
  `TotalPrice` int(8) NOT NULL,
  `DeliveryDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`ReceiptID`, `Email`, `ReceiptText`, `TotalPrice`, `DeliveryDate`) VALUES
(19, 'usmanrasheed2002@gmail.com', 'Item 1\n FAUX SUEDE JACKET WITH SH Color: black Clothes Size: XS Quantity x Price = 4 x 12000 = 48000\nItem 2\n SKATER FIT JEANS Color: green Clothes Size: XS Quantity x Price = 2 x 3500 = 7000\n\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 03001234567 , Comments: House is near X\n', 55000, '2023-12-03 13:27:02'),
(20, 'usmanrasheed2002@gmail.com', 'Item 1\n COLOR-BLOCK SHORTS WITH P Color: brown Clothes Size: S Quantity x Price = 3 x 1800 = 5400\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 03001234567 , Comments: House is near X\n', 5400, '2023-12-03 19:32:30'),
(21, 'usmanrasheed2002@gmail.com', 'Item 1\n FAUX SUEDE VARSITY BOMBER JACKET Color: blue Clothes Size: XS Quantity x Price = 1 x 18000 = 18000\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 03001234567 , Comments: House is near X\n', 18000, '2023-12-04 10:21:24'),
(22, 'email@gmail.com', 'Item 1\n FAUX SUEDE JACKET WITH SHERPA COLLAR Color: Black Clothes Size: XS Quantity x Price = 2 x 12000 = 24000\nItem 2\n TENNIS GRAPHIC HOODIE Color: Brown Clothes Size: XS Quantity x Price = 12 x 4000 = 48000\nDelivering to A V at Address:  , PhoneNumber:  , Comments: \n', 72000, '2023-12-04 17:33:37'),
(23, 'example@gmail.com', 'Item 1\n Mens Levis Color: Blue Clothes Size: M Quantity x Price = 3 x 700 = 2100\nItem 2\n GRADIENT SLOGAN GRAPHIC T-SHIRT Color: Black Clothes Size: XS Quantity x Price = 3 x 1600 = 4800\nDelivering to Example  User at Address: Example Address , PhoneNumber: 11111111111 , Comments: Example Comment\n', 6900, '2023-12-04 20:52:49'),
(24, 'usmanrasheed2002@gmail.com', 'Item 1\n FAUX SUEDE JACKET WITH ZIP Color: Green Clothes Size: L Quantity x Price = 4 x 17000 = 68000\nItem 2\n STRIPED COTTON SHIRT Color: Blue Clothes Size: XS Quantity x Price = 3 x 1500 = 4500\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 03001234567 , Comments: House is near X\n', 72500, '2023-12-05 14:26:41'),
(25, 'usmanrasheed2002@gmail.com', 'Item 1\n PLAIN SWEATSHIRT WITH ZIPPER OPENING Color: Red Clothes Size: XS Quantity x Price = 2 x 5000 = 10000\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 03001234567 , Comments: House is near X\n', 10000, '2023-12-05 21:18:27'),
(26, 'usmanrasheed2002@gmail.com', 'Item 1\n GRADIENT SLOGAN GRAPHIC T-SHIRT Color: White Clothes Size: M Quantity x Price = 3 x 1600 = 4800\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 03001234567 , Comments: House is near X\n', 4800, '2023-12-08 08:51:25'),
(27, 'usmanrasheed2002@gmail.com', 'Item 1\n LINEN BRAND SHORTS Color: Pink Clothes Size: M Quantity x Price = 2 x 1200 = 2400\nItem 2\n CHECKERED SHIRT WITH PATCH POCKET Color: Green Clothes Size: S Quantity x Price = 1 x 3000 = 3000\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 03001234567 , Comments: House is near X\n', 5400, '2023-12-09 08:45:59'),
(29, 'k214924@nu.edu.pk', 'Item 1\n FLIX FLOX JEANS Color: Black Clothes Size: XS Quantity x Price = 1 x 1300 = 1300\nDelivering to Muneeb Ali at Address: Example Address , PhoneNumber: 12345678999 , Comments: \n', 1300, '2023-12-09 09:33:39'),
(30, 'k214924@nu.edu.pk', 'Item 1\n FANCY SWEATER Color: Red Clothes Size: XS Quantity x Price = 1 x 1500 = 1500\nDelivering to Muneeb Ali at Address: Example Address , PhoneNumber: 12345678999 , Comments: \n', 1500, '2023-12-09 09:37:42'),
(31, 'k214924@nu.edu.pk', 'Item 1\n VARSITY RIBBED MAXI DRESS WITH BELT Color: Blue Clothes Size: XS Quantity x Price = 2 x 4000 = 8000\nItem 2\n FLIX FLOX JEANS Color: Black Clothes Size: XS Quantity x Price = 1 x 1300 = 1300\nDelivering to Muneeb Ali at Address: Example Address , PhoneNumber: 12345678999 , Comments: \n', 9300, '2023-12-09 09:39:05'),
(32, 'usmanrasheed2002@gmail.com', 'Item 1\n FLIX FLOX JEANS Color: Black Clothes Size: XS Quantity x Price = 2 x 1300 = 2600\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 12345678999 , Comments: \n', 2600, '2023-12-09 10:08:58'),
(33, 'usmanrasheed2002@gmail.com', 'Item 1\n COTTON-LINEN SHIRT Color: White Clothes Size: XS Quantity x Price = 1 x 1200 = 1200\nItem 2\n QUILTED GILET WITH CONTRAST DETAILS Color: Brown Clothes Size: XS Quantity x Price = 2 x 12000 = 24000\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 12345678999 , Comments: \n', 25200, '2023-12-09 11:14:28'),
(34, 'usmanrasheed2002@gmail.com', 'Item 1\n COTTON CHINOS Color: Brown Clothes Size: XS Quantity x Price = 1 x 2500 = 2500\nItem 2\n MOON NECK SWEATER Color: Blue Clothes Size: XS Quantity x Price = 1 x 5000 = 5000\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 12345678999 , Comments: \n', 7500, '2023-12-09 21:50:16'),
(35, 'k213225@nu.edu.pk', 'Item 1\n QUILTED GILET WITH CONTRAST DETAILS Color: Blue Clothes Size: XS Quantity x Price = 1 x 12000 = 12000\nItem 2\n WOMENS JOSS PANTS Color: Brown Clothes Size: XS Quantity x Price = 2 x 3000 = 6000\nDelivering to A B at Address: Example Address , PhoneNumber: 032222321670 , Comments: BlaBla\n', 18000, '2023-12-09 21:53:19'),
(36, 'usmanrasheed2002@gmail.com', 'Item 1\n GRADIENT SLOGAN GRAPHIC T-SHIRT Color: Gray Clothes Size: XS Quantity x Price = 1 x 1600 = 1600\nItem 2\n SWEATSHIRT WITH CHECKERED PRINT DETAIL Color: Brown Clothes Size: XS Quantity x Price = 2 x 4500 = 9000\nDelivering to Usman Rasheed at Address: Example Address , PhoneNumber: 12345678999 , Comments: \n', 10600, '2023-12-14 12:33:02'),
(37, 'usmanrasheed2002@gmail.com', 'Item 1\n FLIX FLOX JEANS Color: Black Clothes Size: XS Quantity x Price = 4 x 1300 = 5200\nItem 2\n COTTON CHINOS Color: Black Clothes Size: XS Quantity x Price = 5 x 2500 = 12500\nDelivering to Usman Rasheed at Address: AA , PhoneNumber: 03222231670 , Comments: \n', 17700, '2023-12-31 15:02:00');

--
-- Triggers `receipts`
--
DELIMITER $$
CREATE TRIGGER `set_deliverydate_trigger` BEFORE INSERT ON `receipts` FOR EACH ROW BEGIN
    SET NEW.DeliveryDate = DATE_ADD(NOW(), INTERVAL 2 DAY);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(50) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `First_Name`, `Last_Name`, `password`) VALUES
('ab@gmail.com', 'A', 'B', 'Example123'),
('email@gmail.com', 'A', 'V', 'Example123'),
('example2@gmail.com', 'Example', '2', 'example2'),
('example3@gmail.com', 'Example', '3', 'example2'),
('example@gmail.com', 'Example ', 'User', 'Example123'),
('exmple12@gmail.com', 'Usman', 'Rasheed', 'example'),
('k213225@nu.edu.pk', 'A', 'B', 'Example123'),
('k214924@nu.edu.pk', 'Muneeb', 'Ali', 'Muneeb'),
('newemail@gmail.com', 'Muhammad Usman', 'Rasheed', 'Example'),
('usmanrasheed2002@gmail.com', 'Usman', 'Rasheed', 'Example123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user-view`
-- (See below for the actual view)
--
CREATE TABLE `user-view` (
`email` varchar(50)
,`Full Name` varchar(51)
,`address` varchar(1000)
,`phonenum` varchar(13)
);

-- --------------------------------------------------------

--
-- Structure for view `customer_receipts`
--
DROP TABLE IF EXISTS `customer_receipts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_receipts`  AS SELECT concat(`u`.`First_Name`,' ',`u`.`Last_Name`) AS `Full Name`, `r`.`ReceiptText` AS `receipttext`, `r`.`TotalPrice` AS `totalprice`, `r`.`DeliveryDate` AS `deliverydate` FROM (`user` `u` join `receipts` `r`) WHERE `u`.`Email` = `r`.`Email` ;

-- --------------------------------------------------------

--
-- Structure for view `user-view`
--
DROP TABLE IF EXISTS `user-view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user-view`  AS SELECT `u`.`Email` AS `email`, concat(`u`.`First_Name`,' ',`u`.`Last_Name`) AS `Full Name`, `c`.`Address` AS `address`, `c`.`phonenum` AS `phonenum` FROM (`user` `u` join `checkout_details` `c`) WHERE `u`.`Email` = `c`.`email` OR `c`.`email` is null ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout_details`
--
ALTER TABLE `checkout_details`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`Clothesid`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`Clothesid`,`Color`);

--
-- Indexes for table `my_cart`
--
ALTER TABLE `my_cart`
  ADD PRIMARY KEY (`Orderid`),
  ADD KEY `Color-Cart FK` (`Clothesid`,`Color`),
  ADD KEY `User-Cart FK` (`email`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`Owner_Email`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`ReceiptID`),
  ADD KEY `User-Receipt FK` (`Email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `Clothesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `my_cart`
--
ALTER TABLE `my_cart`
  MODIFY `Orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout_details`
--
ALTER TABLE `checkout_details`
  ADD CONSTRAINT `User-Checkout FK` FOREIGN KEY (`email`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `clothes_color` FOREIGN KEY (`Clothesid`) REFERENCES `clothes` (`Clothesid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `my_cart`
--
ALTER TABLE `my_cart`
  ADD CONSTRAINT `Color-Cart FK` FOREIGN KEY (`Clothesid`,`Color`) REFERENCES `colors` (`Clothesid`, `Color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User-Cart FK` FOREIGN KEY (`email`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `User-Receipt FK` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
