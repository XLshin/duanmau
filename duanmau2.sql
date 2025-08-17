-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 17, 2025 lúc 06:07 PM
-- Phiên bản máy phục vụ: 8.4.3
-- Phiên bản PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Giày Sneaker', 'Các loại giày sneaker thời trang'),
(2, 'Giày Thể Thao', 'Phù hợp tập luyện, chạy bộ'),
(3, 'Giày Tây', 'Giày da, sang trọng, công sở'),
(4, 'Giày Sandal', 'Thoải mái cho mùa hè');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rating` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `created_at`, `updated_at`, `rating`) VALUES
(4, 1, 1, 'sản phẩm thật tuyệt vời ông mặt trời', '2025-08-17 17:40:34', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `size` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `size`, `quantity`) VALUES
(1, 1, '39', 10),
(2, 1, '40', 8),
(3, 1, '41', 5),
(4, 2, '38', 12),
(5, 2, '39', 7),
(6, 3, '40', 15),
(7, 3, '41', 10),
(8, 4, '36', 20),
(9, 4, '37', 18),
(10, 3, '36', 0),
(11, 2, '36', 0),
(12, 1, '36', 0),
(13, 3, '37', 0),
(14, 2, '37', 0),
(15, 1, '37', 0),
(16, 4, '38', 0),
(17, 3, '38', 0),
(18, 1, '38', 0),
(19, 4, '39', 0),
(20, 3, '39', 0),
(21, 4, '40', 0),
(22, 2, '40', 0),
(23, 4, '41', 0),
(24, 2, '41', 0),
(25, 4, '42', 0),
(26, 3, '42', 0),
(27, 2, '42', 0),
(28, 1, '42', 0),
(29, 4, '43', 0),
(30, 3, '43', 0),
(31, 2, '43', 0),
(32, 1, '43', 0),
(41, 16, '36', 10),
(42, 15, '36', 10),
(43, 14, '36', 10),
(44, 13, '36', 10),
(45, 12, '36', 10),
(46, 11, '36', 10),
(47, 10, '36', 10),
(48, 9, '36', 10),
(49, 8, '36', 10),
(50, 7, '36', 10),
(51, 6, '36', 10),
(52, 5, '36', 10),
(53, 16, '37', 10),
(54, 15, '37', 10),
(55, 14, '37', 10),
(56, 13, '37', 10),
(57, 12, '37', 10),
(58, 11, '37', 10),
(59, 10, '37', 10),
(60, 9, '37', 10),
(61, 8, '37', 10),
(62, 7, '37', 10),
(63, 6, '37', 10),
(64, 5, '37', 10),
(65, 16, '38', 10),
(66, 15, '38', 10),
(67, 14, '38', 10),
(68, 13, '38', 10),
(69, 12, '38', 10),
(70, 11, '38', 10),
(71, 10, '38', 10),
(72, 9, '38', 10),
(73, 8, '38', 10),
(74, 7, '38', 10),
(75, 6, '38', 10),
(76, 5, '38', 10),
(77, 16, '39', 10),
(78, 15, '39', 10),
(79, 14, '39', 10),
(80, 13, '39', 10),
(81, 12, '39', 10),
(82, 11, '39', 10),
(83, 10, '39', 10),
(84, 9, '39', 10),
(85, 8, '39', 10),
(86, 7, '39', 10),
(87, 6, '39', 10),
(88, 5, '39', 10),
(89, 16, '40', 10),
(90, 15, '40', 10),
(91, 14, '40', 10),
(92, 13, '40', 10),
(93, 12, '40', 10),
(94, 11, '40', 10),
(95, 10, '40', 10),
(96, 9, '40', 10),
(97, 8, '40', 10),
(98, 7, '40', 10),
(99, 6, '40', 10),
(100, 5, '40', 10),
(101, 16, '41', 10),
(102, 15, '41', 10),
(103, 14, '41', 10),
(104, 13, '41', 10),
(105, 12, '41', 10),
(106, 11, '41', 10),
(107, 10, '41', 10),
(108, 9, '41', 10),
(109, 8, '41', 10),
(110, 7, '41', 10),
(111, 6, '41', 10),
(112, 5, '41', 10),
(113, 16, '42', 10),
(114, 15, '42', 10),
(115, 14, '42', 10),
(116, 13, '42', 10),
(117, 12, '42', 10),
(118, 11, '42', 10),
(119, 10, '42', 10),
(120, 9, '42', 10),
(121, 8, '42', 10),
(122, 7, '42', 10),
(123, 6, '42', 10),
(124, 5, '42', 10),
(125, 16, '43', 10),
(126, 15, '43', 10),
(127, 14, '43', 10),
(128, 13, '43', 10),
(129, 12, '43', 10),
(130, 11, '43', 10),
(131, 10, '43', 10),
(132, 9, '43', 10),
(133, 8, '43', 10),
(134, 7, '43', 10),
(135, 6, '43', 10),
(136, 5, '43', 10),
(137, 16, '44', 10),
(138, 15, '44', 10),
(139, 14, '44', 10),
(140, 13, '44', 10),
(141, 12, '44', 10),
(142, 11, '44', 10),
(143, 10, '44', 10),
(144, 9, '44', 10),
(145, 8, '44', 10),
(146, 7, '44', 10),
(147, 6, '44', 10),
(148, 5, '44', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `category_id` int DEFAULT NULL,
  `brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `brand`, `image`, `created_at`) VALUES
(1, 'Nike Air Max', 'Mẫu sneaker nổi bật của Nike', 2500000.00, 1, 'Nike', '42581_Nike.webp', '2025-07-23 15:23:45'),
(2, 'Adidas Ultraboost', 'Giày chạy bộ cao cấp', 3200000.00, 2, 'Adidas', '39838_adidas.jpg', '2025-07-23 15:23:45'),
(3, 'Giày Tây Oxford Đen', 'Giày công sở lịch lãm', 1800000.00, 3, 'Aldo', 'oxford.webp', '2025-07-23 15:23:45'),
(4, 'Sandal Nữ Hè 2024', 'Sandal nhẹ, thoáng, đẹp', 900000.00, 4, 'Vascara', 'sandal.webp', '2025-07-23 15:23:45'),
(5, 'Nike Air Force 1', 'Giày sneaker cổ điển Nike', 2700000.00, 1, 'Nike', '16962_nikeairforce1.jpg', '2025-08-13 19:14:33'),
(6, 'Adidas Superstar', 'Giày sneaker nổi tiếng của Adidas', 2500000.00, 1, 'Adidas', '79735_AdidasSuperstar.avif', '2025-08-13 19:14:33'),
(7, 'Puma RS-X', 'Giày thể thao Puma năng động', 2200000.00, 2, 'Puma', '65271_Puma RS-X.jpg', '2025-08-13 19:14:33'),
(8, 'Reebok Nano X', 'Giày tập gym Reebok', 2000000.00, 2, 'Reebok', '87932_reebok-nano-x.jpg', '2025-08-13 19:14:33'),
(9, 'Giày Tây Brogue Nâu', 'Giày da công sở lịch lãm', 1900000.00, 3, 'Aldo', '22709_Giày Tây Brogue Nâu.jpg', '2025-08-13 19:14:33'),
(10, 'Giày Tây Derby Đen', 'Giày da cho nam văn phòng', 1850000.00, 3, 'Clarks', '11494_Giày Tây Derby Đen.jpg', '2025-08-13 19:14:33'),
(11, 'Sandal Nam Hè 2025', 'Sandal thoải mái, phong cách', 850000.00, 4, 'Bitis', '54858_Sandal Nam Hè 2025.jpg', '2025-08-13 19:14:33'),
(12, 'Sandal Nữ Xinh Xắn', 'Sandal nữ trẻ trung', 900000.00, 4, 'Vascara', '58472_Sandal Nữ Xinh Xắn.webp', '2025-08-13 19:14:33'),
(13, 'Nike ZoomX', 'Giày chạy bộ cao cấp Nike', 3500000.00, 2, 'Nike', '12895_Nike ZoomX.webp', '2025-08-13 19:14:33'),
(14, 'Adidas Gazelle', 'Sneaker Adidas cổ điển', 2400000.00, 1, 'Adidas', '52388_Adidas Gazelle.avif', '2025-08-13 19:14:33'),
(15, 'Giày Tây Monk Strap', 'Giày da nam lịch lãm', 2000000.00, 3, 'Aldo', '58608_Giày Tây Monk Strap.jpg', '2025-08-13 19:14:33'),
(16, 'Sandal Thể Thao Unisex', 'Sandal thể thao thoải mái', 950000.00, 4, 'Nike', '99733_Nike sandal.jpg', '2025-08-13 19:14:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `role` enum('customer','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = hoạt động, 0 = khóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `status`) VALUES
(1, 'Nguyễn Văn A', 'a@gmail.com', '123456', '0901000001', 'Hà Nội', 'customer', '2025-07-23 15:23:31', 1),
(2, 'Trần Thị B', 'b@gmail.com', '123456\r\n', '0901000002', 'TP HCM', 'customer', '2025-07-23 15:23:31', 1),
(3, 'Lê Văn C', 'c@gmail.com', '123456', '0901000003', 'Đà Nẵng', 'customer', '2025-07-23 15:23:31', 1),
(4, 'Phạm Thị D', 'd@gmail.com', 'hashed_password_4', '0901000004', 'Cần Thơ', 'customer', '2025-07-23 15:23:31', 1),
(5, 'Admin', 'admin@gmail.com', '123456789', '0901000999', 'Hệ thống', 'admin', '2025-07-23 15:23:31', 1),
(6, 'Nguyễn Văn E', 'e@gmail.com', 'hashed_password_5', '0901000005', 'Hà Nội', 'customer', '2025-08-03 14:57:22', 1),
(7, 'Lò Vi Sóng', 'lvs@gmail.com', '$2y$10$E1q2zV4xjKQXDqWKIURo.utnaAf4Ldj7KYg6HWOAGxazc1/DYH1L.', '0985437223', 'Hà Nội', 'customer', '2025-08-04 00:08:34', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
