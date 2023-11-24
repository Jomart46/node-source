-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 01:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `assetType` varchar(255) NOT NULL,
  `date_of_purchase` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `assetType`, `date_of_purchase`, `quantity`, `image`, `created_at`) VALUES
(101, 'x', '2023-08-11', '3', 'uploads/356300020_228015346836386_4170292679268512038_n.jpg', '2023-08-30 16:06:33'),
(102, 'a', '2023-08-09', '25pcs', 'uploads/355563038_846527150225480_2217913206854210649_n.jpg', '2023-08-30 16:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `Cust_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `buyername` varchar(255) DEFAULT NULL,
  `Cust_mobile` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`Cust_id`, `product_name`, `date`, `location`, `buyername`, `Cust_mobile`, `status`, `Created_at`, `Updated_at`) VALUES
(27, 'sample', '2023-09-09', 's', 's', '2', NULL, '2023-08-30 15:20:47', '2023-08-30 15:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `id` int(11) NOT NULL,
  `cropName` varchar(255) NOT NULL,
  `cropType` varchar(255) NOT NULL,
  `plantingDate` date NOT NULL,
  `harvestDate` date NOT NULL,
  `location` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` int(11) NOT NULL,
  `cropName` varchar(255) NOT NULL,
  `cropType` varchar(255) NOT NULL,
  `plantingDate` date NOT NULL,
  `harvestDate` date NOT NULL,
  `location` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `cropName`, `cropType`, `plantingDate`, `harvestDate`, `location`, `quantity`, `image`) VALUES
(5, 'scsc', 'scsc', '2023-07-14', '2023-07-21', 'sscsc', 232, 'uploads/R.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer`
--

CREATE TABLE `fertilizer` (
  `id` int(11) NOT NULL,
  `fertilizer_type` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fertilizer`
--

INSERT INTO `fertilizer` (`id`, `fertilizer_type`, `price`, `quantity`, `unit`, `total`, `date`) VALUES
(16, 's', '2.00', 2, 'box', '4.00', '2023-08-26'),
(17, 'c', '34.00', 2, 'box', '68.00', '2023-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `filepath`, `upload_date`) VALUES
(1, 'R.jpg', 'uploads/R.jpg', '2023-07-29 13:09:46'),
(2, 'R.jpg', 'uploads/R.jpg', '2023-07-29 13:18:38'),
(3, 'R.jpg', 'uploads/R.jpg', '2023-07-30 05:09:43'),
(4, 'R.jpg', 'uploads/R.jpg', '2023-07-30 10:57:50'),
(5, 'OIP.jpg', 'uploads/OIP.jpg', '2023-07-30 11:05:26'),
(6, 'vendor.PNG', 'uploads/vendor.PNG', '2023-07-31 08:49:01'),
(7, 'vendor.PNG', 'uploads/vendor.PNG', '2023-07-31 08:50:47'),
(8, 'StartingDota2_image2.jpg', 'uploads/StartingDota2_image2.jpg', '2023-07-31 08:51:02'),
(9, 'StartingDota2_image2.jpg', 'uploads/StartingDota2_image2.jpg', '2023-08-01 00:41:54'),
(10, 'vendor.PNG', 'uploads/vendor.PNG', '2023-08-04 15:25:53'),
(11, 'OIP.jpg', 'uploads/OIP.jpg', '2023-08-04 15:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `land_assets`
--

CREATE TABLE `land_assets` (
  `id` int(11) NOT NULL,
  `landMeasure` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `partners` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_assets`
--

INSERT INTO `land_assets` (`id`, `landMeasure`, `location`, `date_of_purchase`, `partners`, `price`, `image`) VALUES
(2, 'dd', 'd', '2023-07-17', 'd', '2.00', 'uploads/R.jpg'),
(3, 's', 's', '2023-08-17', 's', '2.00', 'uploads/355563038_846527150225480_2217913206854210649_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `land_images`
--

CREATE TABLE `land_images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_images`
--

INSERT INTO `land_images` (`id`, `filename`, `filepath`) VALUES
(1, 'R.jpg', 'uploads/R.jpg'),
(2, 'R.jpg', 'uploads/R.jpg'),
(3, '355563038_846527150225480_2217913206854210649_n.jpg', 'uploads/355563038_846527150225480_2217913206854210649_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(11) NOT NULL,
  `machineName` varchar(255) NOT NULL,
  `machineModel` varchar(255) NOT NULL,
  `purchaseDate` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `machineName`, `machineModel`, `purchaseDate`, `location`, `status`, `image`) VALUES
(9, 'a', 'a', '2023-08-16', 'a', 'Ongoing Repair', 'uploads/vendor.PNG'),
(10, 'z', 'z', '2023-08-26', 'z1', 'Ongoing Repair', 'uploads/OIP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `address`) VALUES
(1, 'neovic', 'devierte', 'silay city'),
(2, 'gemalyn', 'cepe', 'carmen, bohol'),
(3, 'lee', 'apilinga', 'bacolod'),
(4, 'julyn', 'divinagracia', 'eb magalona'),
(5, 'cristine', 'demapanag', 'talisay');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `order_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date_of_purchase`, `order_name`, `quantity`, `unit_price`, `created_at`, `updated_at`, `cust_id`) VALUES
(33, NULL, 's', 2, '2.00', '2023-08-30 15:20:47', '2023-08-30 15:20:47', 27),
(34, NULL, 'ass', 112, '12.00', '2023-08-31 15:09:59', '2023-08-31 15:09:59', 28);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`) VALUES
(1, 'admin', 'elias', 'adminadmin', 'Elias Abdurrahman'),
(2, 'user', 'John', 'admin123', 'John Doe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_assets`
--
ALTER TABLE `land_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_images`
--
ALTER TABLE `land_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `Cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fertilizer`
--
ALTER TABLE `fertilizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `land_assets`
--
ALTER TABLE `land_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `land_images`
--
ALTER TABLE `land_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
