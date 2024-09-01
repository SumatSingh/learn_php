-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 11:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `city`, `zip`, `phone`, `payment_method`, `total_amount`, `user_id`, `product_id`, `quantity`, `status`, `created_at`) VALUES
(1, 'Veer', '78 Scheme, indore', 'indore', '452010', '09876543210', 'cod', '12168.00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`) VALUES
(1, 1, 5, 1, '1170.00', NULL),
(2, 1, 3, 1, '10998.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(60) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`, `created_at`) VALUES
(1, 'Poco M6 Pro', '11999.00', 'UploadImage/poco-m6-pro5G.jpg', 'mobile', '2024-08-22 09:59:44'),
(3, 'Honor 9N', '10998.00', 'UploadImage/honor9N.jpg', 'mobile', '2024-08-24 09:54:21'),
(4, 'i phone 15 pro', '179000.00', 'UploadImage/apple-iphone-15-pro.jpg', 'mobile', '2024-08-22 09:59:44'),
(5, 'Laptop Bagback', '1170.00', 'UploadImage/bag1.jpg', 'bag', '2024-08-22 22:06:49'),
(6, 'HP Laptop 15s', '48999.00', 'UploadImage/HP Laptop 15s.jpg', 'laptop', '2024-08-22 22:13:07'),
(7, 'MEERtronics T800 Smart Watch', '1495.00', 'UploadImage/MEERtronics T800 Ultra Bluetooth Calling Smart Watch.jpeg', 'home', '2024-08-24 09:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `last_login`) VALUES
(1, 'Sahil Singh', 'sahil123@gmail.com', '$2y$10$BHEiTeS1qVqSrYZ.B4xcYeSof1nmwIcLemMJAuMMMmH26DcTu/mqy', NULL, NULL),
(2, 'Veer', 'veer123@gmail.com', '$2y$10$Xb4Vp3NnDTlbbfH5NyzsV.vnzeNyHBwqKak.RinUvcxoY/qIrnivK', NULL, NULL),
(3, 'Muskan', 'muskan123@gmail.com', '$2y$10$8X/LjFcCHhGptDZA2jXMhOyXjUXNDXHKwnWyXRvPEllCzvrqljUIm', NULL, NULL),
(4, 'Rajesh', 'rajesh123@gmail.com', '$2y$10$IOL7Bf4udqn8DJkjdwy6Me1RUm2rYdZZlx8o/Axw7yewnWaIBi8VO', 'admin', NULL),
(5, 'Ritik Singh', 'ritik123@gmail.com', '$2y$10$eXAr38NN2LYSlkF5saz1FO6sJ/xdnu4A9q6WIMbNbIR.w997ziBvO', 'user', NULL),
(6, 'admin', 'admin123@gmail.com', '$2y$10$8T5QWmwrXFvy94m1NGJKouAEvZENpaekwR2jriYjfJujRJCKflD.O', 'admin', '0000-00-00 00:00:00'),
(7, 'Falcon', 'falcon123@gmail.com', '$2y$10$mQDctK9Y1bzjAs4FyJ77..8XCx7jq8qtFyM4wWRhoW9dq57UU7Pam', 'admin', '0000-00-00 00:00:00'),
(8, 'Sriyan', 'sriyan123@gmail.com', '$2y$10$gdlvGac49mBwWNvf1aNCKeVgtNbpmSTg1EzFhS94Ctx0wtr6Yy.42', 'user', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
