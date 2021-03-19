-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 04:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminLevel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `adminLevel`) VALUES
(1, 'Duc An', 'hezo.anvu@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'Nike'),
(4, 'Addias');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`, `catTitle`) VALUES
(1, 'Điện thoại - Máy tính bảng', 'dien-thoai-may-tinh'),
(2, 'Điện tử - Điện lạnh', 'dien-tu-dien-lanh'),
(5, 'Laptop - Thiết bị IT', 'laptop-thiet-bi-it'),
(6, 'Máy ảnh - Quay phim', 'may-anh-quay-phim'),
(7, 'Điện gia dụng', 'dien-gia-dung'),
(8, 'Thực phẩm', 'thuc-pham'),
(9, 'Làm đẹp - Sức khỏe', 'lam-dep-suc-khoe'),
(10, 'Thời trang - Phụ kiện', 'thoi-trang-phu-kien'),
(12, 'Hàng quốc tế', 'hang-quoc-te'),
(13, 'Voucher - Dịch vụ', 'dich-vu-voucher'),
(15, 'Thể thao - Dã ngoại', 'the-thao-da-ngoai'),
(16, 'Đồ chơi', 'do-choi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userCity` varchar(255) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userPhone` varchar(50) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`userId`, `userName`, `userCity`, `userAddress`, `userPhone`, `userEmail`, `userPassword`) VALUES
(1, 'admin', 'Hà Nội', '214 Nam Dư, Lĩnh Nam, Hoàng Mai', '0974737970', 'hezo.anvu@gmail.com', 'admin'),
(2, 'Đức An', 'Hà Nội', '214 Nam Dư, Lĩnh Nam, Hoàng Mai', '0974737970', 'nguyethimm@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(255) NOT NULL,
  `proId` int(255) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `ordate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `proId`, `proName`, `image`, `userId`, `userName`, `quantity`, `price`, `status`, `ordate`) VALUES
(14, 9, 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', 'admincontroller/uploads/d83a51f362.jpg', 1, 'admin', 1, '1,300,000', 1, '2020-11-23,07:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payId` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payId`, `proId`, `sId`, `proName`, `price`, `quantity`, `image`) VALUES
(21, 1, 'qoqhnqv91fqeorbickgc46m6k7', 'Chuột Không Dây DareU LM115G MultiColor - Hàng Chính Hãng', '1300000', 1, '53de78e314.png'),
(22, 7, '4u9pf7quaka7d4jb80627f9mqj', 'Chuột Không Dây DareU LM115G MultiColor - Hàng Chính Hãng', '1300000', 5, 'f3e031a5b4.png'),
(23, 1, '4u9pf7quaka7d4jb80627f9mqj', 'Chuột Không Dây DareU LM115G MultiColor - Hàng Chính Hãng', '1300000', 2, '53de78e314.png'),
(25, 8, '4u9pf7quaka7d4jb80627f9mqj', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '95000', 2, '93d006abc4.jpg'),
(26, 9, '5rb9hrgc9e2g5g8pv2b4prug6g', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1300000', 2, 'd83a51f362.jpg'),
(27, 9, 'lbj26g94nki8ntagao0nh84v8t', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1300000', 2, 'd83a51f362.jpg'),
(28, 9, '7r0oahv05gpc33a8d788f0cudq', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1300000', 1, 'd83a51f362.jpg'),
(29, 9, 'ct43pkgg5ia2d684139u478i8k', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1300000', 1, 'd83a51f362.jpg'),
(30, 9, 'rlcghaa8h7qpnj3amp23g7j3h4', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1300000', 1, 'd83a51f362.jpg'),
(31, 9, 'rlcghaa8h7qpnj3amp23g7j3h4', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1300000', 2, 'd83a51f362.jpg'),
(32, 9, '9n18l4pd8o83dh04modeh807bt', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1300000', 1, 'd83a51f362.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `proId` int(11) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proCode` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `size` varchar(5) NOT NULL,
  `priceOld` varchar(100) NOT NULL,
  `priceCurrent` int(100) NOT NULL,
  `preImage` varchar(255) NOT NULL,
  `proDesc` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`proId`, `proName`, `proCode`, `quantity`, `catId`, `brandId`, `color`, `size`, `priceOld`, `priceCurrent`, `preImage`, `proDesc`, `status`) VALUES
(1, 'Chuột Không Dây DareU LM115G MultiColor - Hàng Chính Hãng', '', 0, 0, 4, 'Đen', '8US', '2700000', 1300000, 'fc1cdd8116.jpg', 'Hàng đẹp', '1'),
(7, 'Chuột Không Dây DareU LM115G MultiColor - Hàng Chính Hãng', '', 0, 2, 0, 'Đen', '8US', '2700000', 1300000, 'f3e031a5b4.png', 'Hàng đẹp vl', '1'),
(8, 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '', 0, 0, 4, 'Đen', '8US', '100000', 95000, '93d006abc4.jpg', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1'),
(9, 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '', 0, 0, 4, 'Đen', '8US', '2700000', 1300000, 'd83a51f362.jpg', 'Dép mang trong nhà mặt cảm xúc (tặng kèm 1 sản phẩm ngẫu nhiên)', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`proId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
