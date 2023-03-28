-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20221214.9c4a90137d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 05:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a3phpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `cg_id` int(11) NOT NULL,
  `cg_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cg_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cg_dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`cg_id`, `cg_name`, `cg_icon`, `cg_dateCreated`) VALUES
(1, 'Citrus', '2023-03-27_04-03-26pm_citrus_fruit.png', '2023-03-27 14:03:26'),
(2, 'Tropical', '2023-03-27_04-03-40pm_tropical_fruit.png', '2023-03-27 14:03:40'),
(3, 'Berries', '2023-03-27_04-03-56pm_berry_fruit.png', '2023-03-27 14:03:56'),
(4, 'Melons', '2023-03-27_04-04-08pm_melon_fruit.png', '2023-03-27 14:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `cp_id` int(11) NOT NULL,
  `cp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_telegram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_miniLogo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`cp_id`, `cp_name`, `cp_email`, `cp_phone`, `cp_telegram`, `cp_facebook`, `cp_twitter`, `cp_instagram`, `cp_address`, `cp_logo`, `cp_miniLogo`) VALUES
(1, 'Fresh Fruit Store', 'freshfruitstore@gmail.com', '+855 23 999 9999', 't.me/freshfruitstore', 'www.facebook.com/freshfruitstore', 'www.twitter.com/freshfruitstore', 'www.instagram.com/freshfruitstore', 'Street 143\r\nCity Sangkat Boeng Keng Kang Ti Bei\r\nStatePhnom Penh\r\nLatitude11.5470792\r\nZipcode120104\r\nLongitude104.9159494\r\nCounty Cambodia', '2023-03-28_05-38-36am_2023-03-16_02-29-11pm_hamster loading cooler.gif', '2023-03-28_05-38-36am_2023-03-16_02-29-26pm_preloader.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `od_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shippingAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Phnom Penh',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Cambodia',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ordered',
  `tax` int(11) DEFAULT NULL,
  `subTotal` float DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `dateOrdered` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateDelivered` date DEFAULT NULL,
  `dateSuccess` date DEFAULT NULL,
  `Tmode` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `Tstatus` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `TDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_orderdetail`
--

CREATE TABLE `tb_orderdetail` (
  `odt_id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `pd_id` int(11) NOT NULL,
  `pd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_regularPrice` float NOT NULL,
  `pd_salePrice` float NOT NULL,
  `pd_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cg_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_countInStock` int(11) NOT NULL,
  `pd_dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`pd_id`, `pd_name`, `pd_description`, `pd_image`, `pd_regularPrice`, `pd_salePrice`, `pd_sku`, `cg_id`, `pd_countInStock`, `pd_dateCreated`) VALUES
(1, 'Yellow Banana', 'The best of tropical fruit ', '2023-03-27_04-05-42pm_fruit4.png', 35, 0, 'FF-0001', '2', 50, '2023-03-27 14:05:42'),
(2, 'Watermelon', 'The most favorite fruit in Asia', '2023-03-27_04-06-42pm_fruit9.png', 25, 0, 'FF-0002', '4', 50, '2023-03-27 14:06:43'),
(3, 'Avocado', 'The most flavor fruit', '2023-03-27_04-09-07pm_fruit10.png', 38.5, 37, 'FF-0003', '2', 100, '2023-03-27 14:09:08'),
(4, 'Longan', 'The most sweetest fruit', '2023-03-27_04-12-00pm_fruit35.png', 30, 28.5, 'FF-0004', '2', 500, '2023-03-27 14:12:01'),
(5, 'Orange', 'The most popular fruit', '2023-03-27_04-13-10pm_fruit3.png', 32, 0, 'FF-0005', '1', 100, '2023-03-27 14:13:10'),
(6, 'Guava', 'Guava Fruit', '2023-03-27_04-14-15pm_fruit8.png', 16, 0, 'FF-0006', '4', 250, '2023-03-27 14:14:17'),
(7, 'Passion', 'Passion Fruit', '2023-03-27_04-16-51pm_fruit20.png', 35, 0, 'FF-0007', '1', 50, '2023-03-27 14:16:51'),
(8, 'Starwberry', 'Starwberry Fruit', '2023-03-27_04-18-43pm_fruit7.png', 36.5, 34, 'FF-0008', '3', 150, '2023-03-27 14:18:45'),
(9, 'Blueberry', 'Blueberry Fruit', '2023-03-27_04-20-45pm_fruit14.png', 36, 0, 'FF-0009', '3', 50, '2023-03-27 14:20:45'),
(10, 'Dragon Fruit', 'Dragon Fruit', '2023-03-27_04-28-47pm_fruit21.png', 25, 23.8, 'FF-0010', '2', 300, '2023-03-27 14:28:49'),
(11, 'Lychee', 'Lychee Fruit', '2023-03-27_04-30-14pm_fruit32.png', 38, 0, 'FF-0011', '3', 50, '2023-03-27 14:30:14'),
(12, 'Pineapple', 'Pineapple Fruit', '2023-03-27_04-46-37pm_fruit15.png', 25, 23, 'FF-0012', '4', 150, '2023-03-27 14:46:39'),
(13, 'Rambutan', 'Rambutan Fruit', '2023-03-27_04-52-40pm_fruit33.png', 20, 18, 'FF-0013', '3', 60, '2023-03-27 14:52:42'),
(14, 'Blackberry', 'Blackberry', '2023-03-27_05-05-09pm_fruit30.png', 35, 34, 'FF-0014', '3', 30, '2023-03-27 15:05:11'),
(15, 'Raspberry', 'Raspberry ', '2023-03-27_05-06-45pm_fruit18.png', 38, 0, 'FF-0015', '3', 35, '2023-03-27 15:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slideshow`
--

CREATE TABLE `tb_slideshow` (
  `ss_id` int(11) NOT NULL,
  `ss_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss_enable` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `ss_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss_order` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_slideshow`
--

INSERT INTO `tb_slideshow` (`ss_id`, `ss_event`, `ss_title`, `ss_description`, `ss_enable`, `ss_image`, `ss_url`, `ss_order`, `date_created`) VALUES
(13, 'Khmer New Year', '25% Off', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '1', '2023-03-28_04-27-41am_slide3.jpg', '#', 13, '0000-00-00'),
(12, 'Big Promotion', 'New Tropical Fruit', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '1', '2023-03-28_04-27-31am_slide1.jpg', 'http://localhost:8000/shop', 12, '0000-00-00'),
(15, 'Autumn Season', 'Fruit, Make you healthy', 'asdf', '1', '2023-03-28_04-27-51am_slide5.png', 'localhost:8000', 15, '0000-00-00'),
(16, 'Summer Vocation', 'Get Fruit, Gain your beauty', 'asdf', '1', '2023-03-28_04-28-00am_slide8.png', 'localhost:8000/shop', 16, '0000-00-00'),
(17, 'Khmer New Year', '100% Fresh Fruit ', 'asdf', '1', '2023-03-28_04-28-17am_slide2.jpg', 'localhost:8000/shop', 17, '0000-00-00'),
(18, 'New Arrival Berries', 'Come First, Get the Fresh Berries', '123', '1', '2023-03-28_04-28-41am_slide6.png', 'http://localhost:8000/shop', 18, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `us_id` int(11) NOT NULL,
  `us_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_passwordHash` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_DOB` date NOT NULL,
  `us_nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_isAdmin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `us_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`us_id`, `us_name`, `us_email`, `us_passwordHash`, `us_phone`, `us_address`, `us_DOB`, `us_nationality`, `us_isAdmin`, `us_image`, `us_dateCreated`) VALUES
(1, 'Phan ChhayFong', 'phanchhayfong168@gmail.com', '$2y$10$gp92klXs69KFhXLCRKsCnuBV4ah8.92UhdgAJBB2Qd.b1h05ttYVO', '010 886 578', '137AE0, 143, BKK III, BKK, PP', '0000-00-00', 'Cambodian', '1', '2023-03-19_07-12-20am_photo_2021-04-21_10-54-10.jpg', '2023-03-19 07:12:20'),
(2, 'Koeun Putheara', 'koeunputheara@gmail.com', '$2y$10$dqxrFYh70vCc531unGtLtO4kzuw6Fxq/lPuNx7wwJiy1rkhmilR.i', '096 286 2940', '123, 456', '0000-00-00', 'Cambodian', '1', '2023-03-20_02-28-08am_pic.png', '2023-03-20 02:28:08'),
(3, 'Ren Sopanharith', 'rensopanharith@gmail.com', '$2y$10$wgd/DmAAFKw0q034si699OwmjKmQyBwHjnm3NGwqHJTRKOUxoJeXe', '085 401 444', '#124, st 148, KKK, KKKK, PP', '2023-03-01', 'Cambodian', '1', '2023-03-20_02-29-34am_photo_2022-11-21_08-52-15.jpg', '2023-03-20 02:29:34'),
(4, 'Sea Chan', 'chan.sea999@gmail.com', '$2y$10$Mt7fJk23jISPcBXwnv.X1.RkIPIPObxueU.gP389LfXvTpL2i4IBi', '096 718 7093', 'Siem Reap, Phnom Penh, Cambodia.', '0000-00-00', 'Cambodian', '1', '2023-03-20_02-31-59am_1675841957126.jpeg', '2023-03-20 02:31:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`cg_id`);

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `us_id` (`us_id`);

--
-- Indexes for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD PRIMARY KEY (`odt_id`),
  ADD KEY `od_id` (`od_id`),
  ADD KEY `pd_id` (`pd_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `cg_id` (`cg_id`(250));

--
-- Indexes for table `tb_slideshow`
--
ALTER TABLE `tb_slideshow`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `cg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  MODIFY `odt_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;