-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 02:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_mvc`
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
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`) VALUES
(1, 'vinh', 'vinh@gmail.com', 'vinhadmin', '202cb962ac59075b964b07152d234b70'),
(2, 'nhan', 'nhan@gmail.com', 'nhanadmin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`) VALUES
(1, 'Apple'),
(2, 'Razor'),
(3, 'Lenovo'),
(4, 'Dell'),
(5, 'LG'),
(6, 'HP'),
(7, 'Asus'),
(8, 'Acer'),
(9, 'GIGABYTE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `productID`, `sID`, `productName`, `price`, `quantity`, `image`) VALUES
(54, 1, 'vda8atie5ff7co7ljv173ad49n', 'MacBook Air 2022 (Apple M2) (MLY33SA/A)', '26990000', 1, 'macbook-air-2022-m2.png'),
(55, 2, 'vda8atie5ff7co7ljv173ad49n', 'Apple Macbook Air (Chính hãng - Apple M1 - Late 2020) (MGND3SA/A)', '16990000', 1, 'macbook-air-m1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(1, 'Laptop'),
(2, 'Màn hình'),
(3, 'Arm màn hình'),
(4, 'Âm thanh'),
(5, 'Bàn phím'),
(6, 'Ghế công thái học'),
(7, 'Máy chơi game'),
(8, 'PC'),
(9, 'Chuột');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cusID` int(11) NOT NULL,
  `cusName` varchar(255) NOT NULL,
  `cusEmail` varchar(50) NOT NULL,
  `cusUser` varchar(255) NOT NULL,
  `cusPass` varchar(30) NOT NULL,
  `cusPhone` varchar(10) NOT NULL,
  `cusAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cusID`, `cusName`, `cusEmail`, `cusUser`, `cusPass`, `cusPhone`, `cusAddress`) VALUES
(2, 'Văn Nhân', 'vannhan@gmail.conm', 'vannhanuser', '123', '0808080808', 'Long Thành Đồng Nai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) DEFAULT NULL,
  `sID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userAddress` text NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPhone` varchar(10) NOT NULL,
  `userNote` text NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `sID`, `userName`, `userAddress`, `userEmail`, `userPhone`, `userNote`, `payment`) VALUES
(NULL, 0, 'Nguyễn Quốc Vinh', 'Nhà Bè', 'quocvinh9502@gmail.com', '0899052002', '123124324132512', 3),
(NULL, 0, 'Nguyễn Quốc Vinh', 'Nhà Bè', 'quocvinh9502@gmail.com', '0899052002', '21312', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDesc` text NOT NULL,
  `feature` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `popular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `catID`, `brandID`, `productName`, `productDesc`, `feature`, `price`, `image`, `popular`) VALUES
(1, 0, 0, 'MacBook Air 2022 (Apple M2) (MLY33SA/A)', 'Apple M2 Apple M2, 8 nhân 8GB SSD 256GB Tích hợp trong máy Apple Apple GPU MacOS 13.6 2560 x 1664 px Liquid Retina Glossy 100% sRGB 13.6 1.24 kg', 1, '1000', 'macbook-air-2022-m2.png', 0),
(2, 1, 1, 'Apple Macbook Air (Chính hãng - Apple M1 - Late 2020) (MGND3SA/A)', 'Apple M1 Apple M1 8 nhân 8 luồng 8GB SSD 256GB Tích hợp trong máy Apple Apple GPU MacOS 13.3 2560 x 1600 px Retina Glossy 100% sRGB 60 Hz 13.3 1.29 kg', 1, '16990000', 'macbook-air-m1.jpg', 0),
(3, 1, 1, 'Apple Macbook Pro 16 (Apple M1) (MK1F3SA/A)', 'Apple M1 Pro Apple M1 Pro 10 nhân 16GB SSD 1024GB Tích hợp trong máy Apple Apple GPU MacOS 16.2 3456 x 2234 px Liquid Retina XDR 100% sRGB 120 Hz 16.2 2.1 kg', 1, '69990000', 'apple-macbook-pro-16-m1.png', 0),
(4, 1, 1, 'Apple Macbook Air (M1, Late 2020 - Apple Silicon) (MGN63LLA)', 'Apple M1 8 nhân 8 luồng 8GB SSD 256GB Tích hợp trong máy Apple Apple GPU MacOS 13 2560 x 1600 px Retina Glossy 98% sRGB 60 Hz 13 1.3 kg', 1, '21690000', 'apple-macbook-air-2020-03.png', 0),
(5, 1, 2, 'Razer Blade 14 AMD (RZ09-0370BEA3-R3U1)', 'Ryzen 9 AMD Ryzen 9 5900HX 8 nhân 16 luồng 16GB SSD 1024GB Card rời Nvidia Geforce AMD Radeon Graphics Nvidia Geforce RTX3070 Window 14 2560x1440 px IPS Matte Cảm ứng 165 Hz 14 1.78kg', 1, '59990000', 'razor-blade-14-amd.png', 0),
(6, 1, 2, 'Razer Book 13 (RZ09-03571EM1-R3U1)', 'Intel Core i7 Intel Core i7 1165G7 4 nhân 8 luồng 16GB SSD 256GB Tích hợp trong máy Intel Iris Iris Plus G7 Window 13 1920 x 1200 px IPS Glossy 100% sRGB 60 Hz 13 1.34 kg', 1, '31990000', 'razor-book-13.jpg', 0),
(7, 1, 2, 'New Razer Blade Pro 17', 'Intel Core i7 Intel Core i7 9750H 6 nhân 12 luồng 16GB SSD 512GB Tích hợp trong máy Intel UHD Intel UHD 630 Window 17 1920 x 1080 px IPS Matte 89% sRGB 144 Hz 17\" 2.8 kg', 1, '62990000', 'new-razer-blade-pro-17.jpg', 0),
(8, 1, 2, 'Razer Blade 15 Advanced (Intel Gen 11) (RZ09-0409AED3-R3U1)', 'Intel Core i7 Intel Core i7 11800H 8 nhân 16 luồng 16GB SSD 1024GB Tích hợp trong máy Intel UHD Intel UHD 630 Window 15.6 2560x1440 px IPS Matte Cảm ứng 240 Hz 15.6\" 1.99 kg', 1, '66990000', 'razor-blade-15-advanced.png', 0),
(9, 1, 3, 'Lenovo Ideapad 5 Pro 16 AMD (82L50095VN)', 'Ryzen 5 AMD Ryzen 5 5600H 6 nhân 12 luồng 8GB SSD 512GB Card rời Nvidia Geforce AMD Radeon Graphics GeForce® GTX 1650 Window 16.1 2560 x 1600 px IPS 100%% sRGB 120 Hz 16.1\" 1.9 kg', 1, '24990000', 'lenovo-ideapad-5-pro-16.png', 0),
(10, 1, 3, 'Lenovo IdeaPad 5 15 (82FG01H8VN)', 'Intel Core i5 Intel Core i5-1135G7 4 nhân 8 luồng 8GB SSD 256GB Tích hợp trong máy Intel Iris Iris XE Window 15.6 1920x1080 px IPS 65% sRGB 60 Hz 15.6\" 1.66 kg', 1, '17990000', 'lenovo-ideapad-5-15.png', 0),
(11, 1, 3, 'Lenovo IdeaPad 5 Pro 14IAP7 (82SH000SVN)', 'Intel Core i5 Intel Core i5-1240P 12 nhân 16 luồng 16GB SSD 512GB Tích hợp trong máy Intel Iris Intel Iris Xe Graphics Window 14\" 2880 x 1800 px IPS Chống chói Anti Glare 100% sRGB 90 Hz 14\" 1.42 kg', 1, '24990000', 'lenovo-ideapad-5-pro-14iap7.png', 0),
(12, 1, 3, 'Lenovo ThinkBook 14 G4+ (Intel)', 'Intel Core i5 Intel Core i5 12500H 12 nhân 16 luồng  16GB SSD 512GB Tích hợp trong máy Intel Iris Intel Iris XE Window 14 2880 x 1800 px IPS 100% sRGB 90 Hz 14\" 1.43 kg', 1, '26990000', 'lenovo-thinkbook-14-g4+.png', 0),
(13, 1, 4, 'Dell Alienware Area 51m R2', 'Intel Core i5 Intel Core i7 10700K 8 nhân 16 luồng 16GB SSD 1000GB Tích hợp trong máy Intel UHD Intel UHD 630 Window 15\" 1920 x 1080 px IPS Matte 100% sRGB 300 Hz 15 4.1 kg', 1, '84990000', 'alienware-area-51m-r2.png', 0),
(14, 1, 4, 'Dell XPS 13 9315 (2022)', 'Intel Core i7 Intel Core i5 1230U 10 nhân 12 luồng 8GB SSD 512GB Tích hợp trong máy Intel Iris Intel® Iris® Xe Graphics Window 13.4 1920 x 1200 px IPS Chống chói Hz 13.4\" 1.17 kg', 1, '31990000', 'dell-xps-13-9315.png', 0),
(15, 1, 4, 'Dell Latitude 7320 Detachable (Kèm bàn phím)', 'Intel Core i5 Intel Core™ i5-1140G7 4 nhân 8 luồng 8GB SSD 256GB Tích hợp trong máy Intel Iris Intel® Iris® Xe Graphics Window 13.3 1920 X 1280 px IPS Cảm ứng 13.3\" 1.18 kg', 1, '19990000', 'dell-latitude-7320-detachable.png', 0),
(16, 1, 4, 'Dell Inspiron 14 Plus (7420)', 'Intel Core i5 Intel Core i5 12500H 12 nhân 16 luồng 16GB SSD 512GB Tích hợp trong máy Intel Iris Intel® Iris® Xe Graphics Window 14 2240x1400 px WVA Chống chói 100% sRGB 14\" 1.68 kg', 1, '28990000', 'dell-inspiron-14-plus.jpg', 0),
(17, 1, 5, 'LG Gram 17 2021', 'Intel Core i7 Intel Core i7 1165G7 4 nhân 8 luồng 32GB SSD 512GB Tích hợp trong máy Intel Iris Intel Iris Xe Window 17\" 2560 X 1600 px IPS 17\" 1.35 kg', 1, '34990000', 'lg-gram-17-2021.png', 0),
(18, 1, 5, 'LG Gram 16 2 in 1 2022', 'Intel Core i7 Intel Core i7 1260P 12 nhân 16 luồng 16GB SSD 1024GB Tích hợp trong máy Intel Iris Intel Iris Xe Window 16\" 2560 x 1600 px IPS Chống chói Cảm ứng 16\" 1.48 kg', 1, '32990000', 'lg-gram-16-2-in-1-2022.png', 0),
(19, 1, 5, 'LG Gram 16 2022 (16Z90Q-G.AH52A5)', 'Intel Core i5 Intel Core i5-1240P 12 nhân 16 luồng 16GB SSD 256GB Tích hợp trong máy Intel Iris Intel Iris Xe Window 16 2560x1600 px IPS Chống chói 16\" 1.199 kg', 1, '41990000', 'LG-Gram-16-2022.jpg', 0),
(20, 1, 6, 'HP Envy 15 X360', 'Ryzen 5 AMD Ryzen™ 5 5625U 6 nhân 12 luồng 8GB SSD 256GB Tích hợp trong máy AMD Radeon AMD Radeon Graphics Window 15.6\" 1920 x 1080 px IPS Chống chói Cảm ứng 100% sRGB 60 Hz 15.6\" 1.77 kg', 1, '15990000', 'hp-envy-15-x360.png', 0),
(21, 1, 6, 'HP ProBook 440 G8', 'Intel Core i5 Intel Core i5 1135G7 4 nhân 8 luồng 8GB SSD 256GB Tích hợp trong máy Intel Iris Intel Iris Xe Window 14\" 1920 X 1080 px IPS Nhám 60 Hz 14 1.38 kg', 1, '15990000', 'hp-probook-440-g8.jpg', 0),
(22, 1, 6, 'HP Pavilion 15 (Intel Gen 11) (4P5G7PA)', 'Intel Core i5 Intel Core i5-1135G7 4 nhân 8 luồng 8GB SSD 256GB Tích hợp trong máy Intel Iris Intel Iris Xe Window 15.6\" 1920x1080 px IPS 65% sRGB 60 Hz 15.6 1.75 kg', 1, '16490000', 'hp-pavilion-15-intel.jpeg', 0),
(23, 1, 6, 'HP Victus Gaming 16 Intel (Chính hãng) (4R0U1PA)', 'Intel Core i7 Intel Core i7-11800H 8 nhân 16 luồng 8GB SSD 512GB Card rời Nvidia GeForce Intel® Core™ UHD GeForce RTX 3050 Window 16.1\" 1080 px IPS 144 Hz 16.1 2.46 kg', 1, '30490000', 'hp-victus-gaming-16-intel.png', 0),
(24, 1, 6, 'HP Zbook Firefly 15 G8', 'Intel Core i7 Intel Core i7 1185G7 4 nhân 8 luồng 32GB SSD 512GB Tích hợp trong máy Intel Iris Intel Iris Xe Window 15.6\" 1920 x 1080 px IPS Glossy 60 Hz 15.6 1.69 kg', 1, '26990000', 'hp-zbook-firefly-15-g8.jpg', 0),
(25, 1, 7, 'Asus Zenbook Flip 15 Q508', 'Ryzen 7 AMD Ryzen 7 5700U 8 nhân 16 luồng 8GB SSD 256GB Tích hợp trong máy Nvidia GeForce NVIDIA® GeForce® MX450 2GB GDDR6 Window 15.6\" 1920 x 1080 px IPS Cảm ứng 15.6 1.9 kg', 1, '18490000', 'asus_zenbook_flip_15_q508.jpg', 0),
(26, 1, 7, 'Asus Vivobook S14 S433 (Intel Gen 11) (S433EA-AM439T)', 'Intel Core i5 Intel Core i5 1135G7 4 nhân 8 luồng 8GB SSD 512GB Tích hợp trong máy Intel Iris Intel Iris Xe Window 14\" 1920 x 1080 px IPS Matte 64% sRGB 60 Hz 14 1.4 kg', 1, '17490000', 'asus-vivobook-s14-s433-intel-gen-11.jpg', 0),
(27, 1, 7, 'ASUS TUF Dash F15 (Chính hãng) (FX516PC-HN011T)', 'Intel Core i5 Intel Core i5-11300H 4 nhân 8 luồng 8GB SSD 512GB Tích hợp trong máy Nvidia GeForce NVIDIA® GeForce® MX450 2GB GDDR6 Window 15.6\" 1080 px IPS 144 Hz 15.6 2 kg', 1, '23990000', 'asus-tuf-dash-f15-white.png', 0),
(28, 1, 7, 'Asus Ultra Thin 15 (LM510MA)', 'Intel Celeron Intel Celeron N4020 2 nhân 2 luồng 4GB SSD 128GB Tích hợp trong máy Intel UHD Intel UHD Graphics Window 15.6\" 1920 x 1080 px TN Matte 60 Hz 15.6 1.8 kg', 1, '7990000', 'asus-ultra-thin-15.jpg', 0),
(29, 1, 7, 'ASUS ROG Strix G15 (G513) (G513QM-HQ283T)', 'Ryzen 9 AMD Ryzen 9 5900HX 8 nhân 16 luồng 16GB SSD 512GB Card rời Nvidia GeForce Radeon™ Graphics GeForce RTX 3060 Window 15.6 2560 x 1440 px IPS Chống chói 165 Hz 15.6 2.3 kg', 1, '42990000', 'asus-rog-strix-g15-g513.png', 0),
(30, 1, 8, 'Acer Nitro 5 2021 (Intel H45) (AN515-57-71VV)', 'Intel Core i7 Intel Core i7 11800H 8 nhân 16 luồng 8GB SSD 512GB Card rời Nvidia GeForce Intel® UHD Graphics GeForce RTX 3050 Window 15.6\" 1080 px IPS Matte 65% sRGB 144 Hz 15.6 2.2 kg', 1, '28990000', 'acer-nitro-5-2021.png', 0),
(31, 1, 8, 'Acer TravelMate B3 (TMB311-31-P49D)', 'Intel Pentium Intel Pentium® Silver N5030 4 nhân 4 lu?ng 4GB SSD 256GB Tích h?p trong máy Intel UHD Intel UHD Graphics 605 Window 11.6\" 1366 x 768 px TN Matte 60 Hz 11.6 1.4 kg', 1, '4490000', 'acer-travelmate-b3.png', 0),
(32, 1, 8, 'Acer Nitro 5 Tiger Intel Gen 12 (Chính hãng) (AN515-58-52SP)', 'Intel Core i5 Intel Core i5-12500H 12 nhân 16 luồng 8GB SSD 512GB Tích hợp trong máy Nvidia GeForce GeForce RTX™ 3050 4GB Window 15.6\" 1920x1080 px IPS 144 Hz 15.6 2.5 kg', 1, '27990000', 'acer-nitro-5-tiger-intel-gen-12.jpg', 0),
(33, 1, 8, 'Acer Swift 3 14 AMD (Chính hãng) (SF314-43-R4X3)', 'Ryzen 5 AMD Ryzen 5 5500U 6 nhân 12 luồng 16GB SSD 512GB Tích hợp trong máy AMD Radeon AMD Radeon Graphics Window 14\" 1920x1080 px IPS Matte 60 Hz 14 2.4 kg', 1, '20990000', 'acer-swift-3-14-amd.jpg', 0),
(34, 1, 8, 'Acer Aspire 3 15 Intel (Chính hãng) (A315-57G-524Z)', 'Intel Core i5 Intel Core i5 1035G1 2 nhân 4 luồng 4GB SSD 512GB Card rời Nvidia Intel UHD Nvidia MX 330 Window 15.6\" 1920 x 1080 px TFT Matte 60 Hz 15.6 2 kg', 1, '15490000', 'acer-aspire-3-15-intel-009.jpg', 0),
(35, 1, 9, 'GIGABYTE G5 Gaming Laptop (GD-51S1123SO)', 'Intel Core i5 Intel Core i5 11400H 6 nhân 12 luồng 16GB SSD 512GB Card rời Intel UHD UHD Graphics GeForce RTX™ 3050 Window 15.6\" 1920x1080 px IPS 100% sRGB 144 Hz 15.6 2.2 kg', 1, '25490000', 'gigabyte-g5.png', 0),
(36, 1, 9, 'GIGABYTE AORUS 15P Gaming Laptop (KD-72S1223GH)', 'Intel Core i7 Intel Core i7 11800H 8 nhân 16 luồng 16GB SSD 512GB Tích hợp trong máy Intel UHD Intel UHD Tiger Lake Window 15.6\" 1920x1080 px IPS Matte Cảm ứng 240 Hz 15.6 2.2 kg', 1, '45990000', 'gigabyte-aorus-15p-gaming-laptop.png', 0),
(37, 1, 9, 'GIGABYTE AERO 15 OLED (KD-72S1623GH)', 'Intel Core i7 Intel Core i7 11800H 8 nhân 16 luồng 16GB SSD 512GB Card rời Nvidia GeForce Intel UHD Tiger Lake NVIDIA GeForce RTX 3060 6GB GDDR6 Window 15.6\" 3840x2160 px OLED Glossy Cảm ứng 60 Hz 15.6 2 kg', 1, '46000000', 'gigabyte-aero-15-oled.png', 0),
(38, 1, 9, 'GIGABYTE U4 (UD-70S1823SO)', 'Intel Core i7 Core i7-1195G7 4 nhân 8 luồng 16GB SSD 512GB Tích hợp trong máy Intel Iris Intel® Iris® Xe Graphics Window 14\" 1080 px IPS 100% sRGB 60 Hz 14 0.99 kg', 1, '24190000', 'gigabyte-u4.jpg', 0),
(39, 1, 9, 'GIGABYTE AERO 16 XE (Intel gen 12) (XE5-73VN938AH)', 'Intel Core i7 Intel Core i7-12700H 14 nhân 20 luồng 16GB SSD 2TB Card rời Nvidia GeForce Iris® Xe Graphics eligible GeForce RTX™ 3070 Ti Window 16\" 3840x2400 px AMOLED 100% sRGB 90 Hz 16 2.3 kg', 1, '82990000', 'AERO-16-XE15.jpg', 0),
(40, 2, 5, 'Màn hình LG UltraWide 34', 'IPS Cong QHD 75Hz (34WN80C-B.ATV)', 1, '16900000', '34wn80c-b-1.png', 0),
(41, 2, 5, 'Màn hình LG UltraWide 34', 'Nano IPS Cong QHD 75Hz Freesync (34WK95C-W.ATV)', 1, '25500000', '34wk95c-w-1.png', 0),
(42, 2, 5, 'Màn hình LG UltraWide 38', 'Nano IPS Cong QHD+ G-Sync (38WN95C-W.ATV)', 1, '34900000', '38wn95c-w-1.png', 0),
(43, 3, 1, 'Arm Microphone HyperWork MA-01', 'Trọng lượng 3kg Dài 77cm Rộng 5.5cm Cao 100cm 180° Thép', 1, '990000', 'gia-do-microphone-hyperwork-thinkpro-01.png', 0),
(44, 3, 1, 'Arm màn hình HyperWork A1C (Black)', 'Trọng lượng 3.5kg Dài 60 Rộng 5.5cm Cao 11cm 180° Nhôm', 1, '1490000', 'dden-hyperwork.png', 0),
(45, 4, 1, 'Loa Bluetooth Harman Kardon Aura Studio 3', 'Trọng lượng 3.6kg Không dây 130W Dài 23.2 Rộng 23.2cm Cao 28.3cm', 1, '6900000', 'harman-kardon-soundsticks-4-thinkpro-01.jpeg', 0),
(46, 4, 1, 'Loa Bluetooth Harman Kardon Soundstick 4', 'Trọng lượng 4.43kg Không dây 140W Dài 22cm Rộng 22cm Cao 27.3cm', 1, '7990000', 'loa-harman-kardon-aura-studio-3-thinkpro-01.jpeg', 0),
(47, 5, 1, 'Bàn phím Keychron K4 v2 (Case Nhôm - Gateron Brown Swtich - Hotswap)', 'HDD 0GB NVMe 0 1.1 kg Windows 3 Mode Dài 37.1cm Rộng 12.4cm Cao 4.1cm Nhôm', 1, '2290000', 'Ban-phim-Keychron-K4-v2-004.jpg', 0),
(48, 5, 1, 'Bàn phím không dây Logitech MX Keys (For Windows & MacOS)', '0.4kg Windows Không dây Dài 29.6cm Rộng 13.1cm Cao 0.21cm Nhựa', 1, '2590000', 'mx-keys-1.png', 0),
(49, 6, 1, 'Ghế Công Thái Học Epione Easy Chair 2.0 (All Black)', '20kg Lưới Tech Fiber Dài 65cm Rộng 51cm Cao 50cm Nhựa Kim loại', 1, '6590000', 'EEC2_Product_1.png', 0),
(50, 6, 1, 'Ghế Công Thái Học HyperWork HW01 (Arm 3D - Gray)', '20kg Lưới Fibone Dài 61cm Rộng 50cm Cao 61cm Nhựa Kim loại', 1, '3690000', '17-11_01525.jpg', 0),
(51, 7, 1, 'Máy chơi game Sony PlayStation 5 - PS5 (Digital Edition - Phiên bản Korea)', '4.78kg AMD Zen 2 8 nhân 16 luồng xung nhịp 3.5GHz 16GB Kiến trúc RDNA 2 của AMD sức mạnh 10.3 TFLOPS tốc độ 2.23GHz 825GB Dài 39cm Rộng 10.4cm Cao 26cm', 1, '19490000', 'ps5-02.jpg', 0),
(52, 7, 1, 'Máy chơi game Nintendo Switch OLED (Pokémon Scarlet & Violet Edition)', '1280x720 7-inch OLED Hỗ trợ cảm ứng đa điểm NVIDIA Tegra tuỳ chỉnh riêng cho Switch 4310mAh', 1, '11500000', 'Screenshot_2.png', 0),
(53, 8, 1, 'Dán màn hình Innostyle Crystal Clear Screen (For MacBook Pro 13 (M1&M2))', '0.1kg', 1, '320000', 'CrystalClear_Packaging-1.png', 0),
(54, 9, 7, 'Chuột ASUS TUF Gaming M3', 'Có dây RGB ở LOGO Windows/Mac OS USB 2.0', 1, '450000', 'tufm3-1.png', 0),
(55, 9, 2, 'Chuột Razer Basilisk Ultimate (RZ01-03170100-R3A1)', 'Không dây 14 vùng LED RGB Chroma Windows/Mac OS Đầu USB Wireless 2.4GHz', 1, '3990000', 'Chuot-Razer-Basilisk-Ultimate-(RZ01-03170100-R3A1)-001.jpg', 0),
(56, 10, 1, 'Bàn nâng hạ Epione SmartDesk Pro (Frame only - 2 motor - 3 stage)', '30kg Kim loại', 1, '7490000', 'xu-0515.jpg', 0),
(57, 10, 2, 'Bàn nâng hạ Epione SmartDesk Lite', '10kg Kim loại', 1, '5590000', 'ban-nang-ha-ep-smartdesk-lite-thinkpro-01.jpg', 0),
(58, 11, 8, 'Balo Acer Predator SUV', 'Phù hợp với 1 laptop kích thước lên đến 17inch', 1, '1700000', 'predatorsuv-01.jpg', 0),
(59, 11, 1, 'Túi Laptop chống sốc ReeYee (RY4001)', '0.5 kg Dài 37cm Rộng 27cm Cao 4cm Phù hợp với laptop 14 inch', 1, '640000', '40014002-01.png', 0),
(60, 12, 1, 'Cổng chuyển USB-C HyperDrive BAR 6 in 1 (HD22E-GRAY)', 'HDMI 4K USB-C SD CARD MICRO SD 2 cổng USB 3.0. BASIC USB-C HUB', 1, '1799000', 'hd22egray-01.png', 0),
(61, 12, 2, 'Cổng chuyển đổi Mazer USB-C Multimedia Pro 6-in-1 (M-UC2MULTI7001-BK)', 'HDMI 4K30Hz, 3 x USB-A, Khe cắm thẻ nhớ Micro SD / SD', 1, '1180000', 'multipro6in1-1.png', 0),
(62, 13, 1, 'Giá đỡ tản nhiệt Pisen cho laptop', 'Hỗ trợ laptop đến 17 inch Kim loại', 1, '499000', 'photo-2021-11-12-13-52-54.jpg', 0),
(63, 13, 2, 'Đế tản nhiệt Notepal Cooler Master C3 (R9-NBC-CMC3-GP)', 'Phù hợp với laptop 15 inch', 1, '260000', 'cmc3-1.png', 0),
(64, 14, 1, 'Ổ cứng SSD Samsung 870 Evo 2.5\"', 'SSD 870EVO 560MB/s-530MB/s 500GB', 1, '1890000', '870evo-1.png', 0),
(65, 14, 2, 'SSD Samsung 870 Qvo 2.5-Inch SATA III MZ-77Q2T0 (2TB)', '2.5\" Sata SSD 560MB/s-530MB/s 2TB ', 1, '5190000', '870-qvo-01.png', 0),
(66, 15, 1, 'Ram laptop Apacer SO-DIMM DDR4 3200Mhz - Chính hãng (8GB)', 'DDR4 Bus 3200MHz 8 GB', 1, '799000', '16726_ram_laptop_apacer_so_dimm_8g_ddr4___3200mhz_2.jpg', 0),
(67, 15, 2, 'Ram Laptop Team Elite SO 8GB DDR4 bus 3200MHz (TEAMGROUP)', 'DDR4 Bus 3200MHz 8 GB', 1, '999000', '33998_capture.png', 0),
(68, 16, 1, 'Microsoft 365 Personal bản quyền (Trọn bộ Office: Word, Exel, PowerPoint)', 'Gói thuê bao 1 năm dành cho 1 người dùng với đủ bộ phần mềm Office Windows 10 Windows 11 macOS', 1, '1290000', 'Microsoft-365-Personal-bq-sale-sn.jpg', 0),
(69, 16, 1, 'Microsoft 365 Family bản quyền (Trọn bộ Office: Word, Exel, PowerPoint 6 người dùng)', 'Gói thuê bao 1 năm dành cho 6 người dùng với đủ bộ phần mềm Office Windows 10 Windows 11 macOS', 1, '1690000', 'microsoft-365-family-ban-quyen-thinkpro-01.png', 0),
(70, 17, 1, 'Vỏ Case MSI MAG FORGE 110R (Mid Tower/ Màu Đen/1 Fan Led RGB)', 'Dài 40.9cm Rộng 21.4cm Cao 48.5cm', 1, '1099000', 'vo-case-msi-thinkpro-01.jpg', 0),
(71, 17, 2, 'Vỏ case Razer Tomahawk Mini-ITX (RC21-01400100-R3M1)', 'Dài 40.9cm Rộng 21.4cm Cao 48.5cm', 1, '6490000', 'caserazeritx-01.jpg', 0),
(72, 18, 1, 'Apple iMac 24\" (Apple M1 - Chính hãng) (MGPL3SA/A)', 'Apple M1 Apple M1 16GB LPDDR4X bus 4266MHz ( hỗ trợ tối đa 8 GB) SSD 512GB Tích hợp trong máy Apple Apple GPU (8 Cores) MacOS 23.5\" 4480 x 2520 px Retina 60 Hz Glossy 23.5 4.46 kg', 1, '49990000', 'imac24-21-blue-1.png', 0),
(73, 18, 1, 'Apple Mac Mini Late 2020 (Apple M1 - Chính hãng) (MGNT3SA/A)', 'Apple M1 Apple M1 8 nhân 8 luồng 8GB LPDDR4X ( hỗ trợ tối đa 8 GB) SSD 512GB Tích hợp trong máy Apple Apple GPU 1.2 kg', 1, '13990000', 'apple-mac-mini-late-2020-thinkpro-1.png', 0),
(74, 19, 1, 'CPU Intel Core i9 12900K', 'Core I9 12900K Cpu Boost 5.2GHz Cpu Base 3.9GHz', 1, '14990000', 'CPU_Intel_Core_i9_12900K.png', 0),
(75, 19, 1, 'Intel Core i9-13900K Processor', 'Core I9 13900K Cpu Boost 5.7GHz Cpu Base 3GHz', 1, '16590000', 'Intel-Core-i9-13900K-Processor.png', 0);

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
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cusID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
