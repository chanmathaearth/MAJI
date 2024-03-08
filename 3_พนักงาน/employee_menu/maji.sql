-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 05:40 AM
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
-- Database: `maji`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountId` int(11) NOT NULL,
  `accountEmail` varchar(30) NOT NULL,
  `accountPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountId`, `accountEmail`, `accountPassword`) VALUES
(1, '65070022@kmitl.ac.th', 'tang22'),
(2, '65070038@kmitl.ac.th', 'jeena38'),
(3, '65070048@kmitl.ac.th', 'earth48'),
(4, '65070074@kmitl.ac.th', 'ai74');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custId` int(11) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custSurname` varchar(255) NOT NULL,
  `custPhone` varchar(255) NOT NULL,
  `accountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custId`, `custName`, `custSurname`, `custPhone`, `accountId`) VALUES
(1, 'กุลธิดา', 'รัตนวิจิตร', '0985643214', 1),
(2, 'จีนะ', 'เกิดแก้ว', '0952513965', 2),
(3, 'ชาญเมธา', 'สงวนทรัพย์', '0967543521', 3),
(4, 'ณัฐณิชา', 'เฟื่องฟู', '0956473321', 4);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryId` int(11) NOT NULL,
  `deliveryName` varchar(20) NOT NULL,
  `deliveryPhone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `deliveryStatus` enum('กำลังจัดการออเดอร์','กำลังจัดส่ง','จัดส่งเสร็จสิ้น') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`deliveryId`, `deliveryName`, `deliveryPhone`, `address`, `deliveryStatus`) VALUES
(1, 'พีม', '0967546354', '24 ซ.พิบูลสงคราม 22 แยก 22 ต.บางเขน อ.เมือง จ.นนทบุรี', 'กำลังจัดการออเดอร์'),
(2, 'เอิร์ธ', '0988766554', '23 ซ.ลาดกระบัง ต.บางเขน อ.เมือง จ.กรุงเทพมหานคร', 'กำลังจัดการออเดอร์');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuId` int(100) NOT NULL,
  `menuName` varchar(30) NOT NULL,
  `menuImage` varchar(100) NOT NULL,
  `menuPrice` int(100) NOT NULL,
  `menuDescription` varchar(500) NOT NULL,
  `menuTypeId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuId`, `menuName`, `menuImage`, `menuPrice`, `menuDescription`, `menuTypeId`) VALUES
(1, 'ปลาแซลม่อน', '1.png', 345, 'เซตปลาแซลมอนย่างเกลือกระทะร้อน', 1),
(2, 'ปลาซาบะ', '2.png', 239, 'เซตปลาซาบะย่างเกลือกระทะร้อน', 1),
(3, 'ปลาแพนกาเซียสดอร์รี่', '3.png', 215, 'เซตปลาแพนกาเซียสดอร์รี่ย่างซีอิ๊วกระทะร้อน', 1),
(4, 'ชีสเบอร์เกอร์หมูชุบแป้งทอด', '4.png', 235, 'เซตชีสเบอร์เกอร์หมูชุบแป้งทอด', 1),
(5, 'ไก่ทอดราดซอสนัมบัง', '5.png', 219, 'เซตไก่ทอดราดซอสนัมบัง', 1),
(6, 'หมูผัดกิมจิสูตรเกาหลี', '6.png', 195, 'เซตหมูผัดกิมจิสูตรเกาหลี', 1),
(7, 'อุนางิดงบุริ', '7.png', 395, 'ข้าวหน้าปลาไหลญี่ปุ่น', 2),
(8, 'แซลมอนทรงเครื่องดงบุริ', '8.png', 225, 'มีส่วนผสมของกุ้ง', 2),
(9, 'มาจิ ซากานะ เบนโตะ', '9.png', 255, 'มีส่วนผสมของกุ้ง', 3),
(10, 'มาจิ ชิกกี้ เบนโตะ', '10.png', 245, 'มีส่วนผสมของกุ้ง', 3),
(11, 'ราเม็งแชมป์เปี้ยน', '11.png', 245, 'มีส่วนผสมของหมูและไข่', 4),
(12, 'อุด้งหมูสุกี้ยากี้', '12.png', 185, 'มีส่วนผสมของหมู', 4),
(13, 'มัทฉะ เฟรปเป้', '13.png', 95, 'มีส่วนผมของนม', 5),
(14, 'มัทฉะ ลาเต้', '14.png', 75, 'มีส่วนผมของนม', 5),
(15, 'น้ำแร่', '15.png', 28, 'น้ำแร่ธรรมชาติ', 5),
(16, 'A Box of Love Set B', '16.png', 249, 'ประกอบด้วย :เซตไก่เทอริยากิ + ทาโกะยากิ + น้ำมะนาว', 6);

-- --------------------------------------------------------

--
-- Table structure for table `menutype`
--

CREATE TABLE `menutype` (
  `menuTypeId` int(100) NOT NULL,
  `menuTypeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menutype`
--

INSERT INTO `menutype` (`menuTypeId`, `menuTypeName`) VALUES
(1, 'ชุดเซ็ต'),
(2, 'ดงบุริ'),
(3, 'เบนโตะ'),
(4, 'ราเม็ง'),
(5, 'เครื่องดื่ม'),
(6, 'สิทธิพิเศษ');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderId` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `menuStatus` enum('ได้รับเมนู','กำลังทำเมนู','เสร็จสิ้นเมนู') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderId`, `menuId`, `menuStatus`) VALUES
(1, 1, 'ได้รับเมนู'),
(1, 3, 'ได้รับเมนู'),
(1, 6, 'ได้รับเมนู'),
(1, 2, 'ได้รับเมนู'),
(2, 7, 'ได้รับเมนู'),
(2, 3, 'ได้รับเมนู'),
(3, 13, 'ได้รับเมนู'),
(3, 16, 'ได้รับเมนู');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `tableId` varchar(2) DEFAULT NULL,
  `takeawayId` int(11) DEFAULT NULL,
  `deliveryId` int(11) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `orderStatus` enum('กำลังสั่งอาหาร','ได้รับออเดอร์','กำลังปรุงอาหาร','เสร็จสิ้นออเดอร์','ยกเลิกออเดอร์') NOT NULL,
  `custId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `tableId`, `takeawayId`, `deliveryId`, `description`, `price`, `orderDateTime`, `orderStatus`, `custId`) VALUES
(1, 'A1', NULL, NULL, '', 0, '2024-03-01 10:12:44', 'กำลังสั่งอาหาร', NULL),
(2, NULL, NULL, 1, '', 560, '2024-03-01 10:12:44', 'ได้รับออเดอร์', NULL),
(3, NULL, 1, NULL, 'ไม่เอาผัก', 450, '2024-03-01 10:14:40', 'ได้รับออเดอร์', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `promotionId` int(11) DEFAULT NULL,
  `amountMoney` float NOT NULL,
  `paymentMethod` enum('เงินสด','โอนเงิน') NOT NULL,
  `paymentDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `paymentStatus` enum('กำลังชำระเงิน','ชำระเงินเสร็จสิ้น') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `orderId`, `promotionId`, `amountMoney`, `paymentMethod`, `paymentDateTime`, `paymentStatus`) VALUES
(1, 1, NULL, 1090, 'เงินสด', '2024-03-01 16:19:21', 'กำลังชำระเงิน'),
(3, 2, NULL, 450, 'โอนเงิน', '2024-03-01 16:19:50', 'กำลังชำระเงิน'),
(4, 3, NULL, 560, 'โอนเงิน', '2024-03-01 16:20:14', 'กำลังชำระเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotionId` int(11) NOT NULL,
  `promotionName` varchar(100) NOT NULL,
  `discount` float NOT NULL,
  `promotionCondition` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotionId`, `promotionName`, `discount`, `promotionCondition`) VALUES
(1, 'ลูกค้าเป็นสมาชิก ลดทันที 10%', 0.07, 'custId NOT NULL');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `tableTypeId` varchar(2) NOT NULL,
  `appointmentDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `peopleReserved` int(11) NOT NULL,
  `reservationStatus` enum('รอการเช็คอิน','เช็คอินเสร็จสิ้น') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationId`, `custId`, `tableTypeId`, `appointmentDateTime`, `peopleReserved`, `reservationStatus`) VALUES
(1, 2, 'B4', '2024-03-01 16:21:48', 4, 'รอการเช็คอิน'),
(2, 2, 'C2', '2024-03-01 16:22:05', 5, 'รอการเช็คอิน');

-- --------------------------------------------------------

--
-- Table structure for table `tabletype`
--

CREATE TABLE `tabletype` (
  `tableTypeId` varchar(2) NOT NULL,
  `tableSize` enum('2','4','6','8') NOT NULL,
  `tableTypeStatus` enum('ว่าง','ไม่ว่าง') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabletype`
--

INSERT INTO `tabletype` (`tableTypeId`, `tableSize`, `tableTypeStatus`) VALUES
('A1', '2', 'ไม่ว่าง'),
('A2', '2', 'ว่าง'),
('A3', '2', 'ว่าง'),
('A4', '2', 'ว่าง'),
('A5', '2', 'ว่าง'),
('B1', '4', 'ว่าง'),
('B2', '4', 'ว่าง'),
('B3', '4', 'ว่าง'),
('B4', '4', 'ว่าง'),
('B5', '4', 'ว่าง'),
('C1', '6', 'ว่าง'),
('C2', '6', 'ว่าง'),
('C3', '6', 'ว่าง'),
('D1', '8', 'ว่าง'),
('D2', '8', 'ว่าง');

-- --------------------------------------------------------

--
-- Table structure for table `takeaway`
--

CREATE TABLE `takeaway` (
  `takeawayId` int(11) NOT NULL,
  `takeawayName` varchar(20) NOT NULL,
  `takeawayPhone` varchar(10) NOT NULL,
  `takeawayBranch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `takeaway`
--

INSERT INTO `takeaway` (`takeawayId`, `takeawayName`, `takeawayPhone`, `takeawayBranch`) VALUES
(1, 'ไอ', '0986765541', 'ลาดกระบัง'),
(2, 'แตงกี้', '0988657843', 'ลาดกระบัง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountId`),
  ADD UNIQUE KEY `UN_account` (`accountEmail`,`accountPassword`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custId`),
  ADD UNIQUE KEY `UN_accountId` (`accountId`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuId`),
  ADD KEY `FK_menuTypeId_menutype` (`menuTypeId`);

--
-- Indexes for table `menutype`
--
ALTER TABLE `menutype`
  ADD PRIMARY KEY (`menuTypeId`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `FK_menuId_orderdetail` (`menuId`),
  ADD KEY `FK_orderId_orderdetail` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `FK_custId_orders` (`custId`),
  ADD KEY `FK_delivery_orders` (`deliveryId`),
  ADD KEY `FK_table_orders` (`tableId`),
  ADD KEY `FK_takeaway_orders` (`takeawayId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`),
  ADD UNIQUE KEY `UN_orderId` (`orderId`),
  ADD KEY `FK_promotionId_payment` (`promotionId`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotionId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `FK_custId_reservation` (`custId`),
  ADD KEY `FK_tableTypeId_reservation` (`tableTypeId`);

--
-- Indexes for table `tabletype`
--
ALTER TABLE `tabletype`
  ADD PRIMARY KEY (`tableTypeId`);

--
-- Indexes for table `takeaway`
--
ALTER TABLE `takeaway`
  ADD PRIMARY KEY (`takeawayId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `deliveryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menutype`
--
ALTER TABLE `menutype`
  MODIFY `menuTypeId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `takeaway`
--
ALTER TABLE `takeaway`
  MODIFY `takeawayId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_accountId_customer` FOREIGN KEY (`accountId`) REFERENCES `account` (`accountId`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_menuTypeId_menutype` FOREIGN KEY (`menuTypeId`) REFERENCES `menutype` (`menuTypeId`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_menuId_orderdetail` FOREIGN KEY (`menuId`) REFERENCES `menu` (`menuId`),
  ADD CONSTRAINT `FK_orderId_orderdetail` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_custId_orders` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`),
  ADD CONSTRAINT `FK_delivery_orders` FOREIGN KEY (`deliveryId`) REFERENCES `delivery` (`deliveryId`),
  ADD CONSTRAINT `FK_table_orders` FOREIGN KEY (`tableId`) REFERENCES `tabletype` (`tableTypeId`),
  ADD CONSTRAINT `FK_takeaway_orders` FOREIGN KEY (`takeawayId`) REFERENCES `takeaway` (`takeawayId`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_orderId_payment` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `FK_promotionId_payment` FOREIGN KEY (`promotionId`) REFERENCES `promotion` (`promotionId`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_custId_reservation` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`),
  ADD CONSTRAINT `FK_tableTypeId_reservation` FOREIGN KEY (`tableTypeId`) REFERENCES `tabletype` (`tableTypeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
