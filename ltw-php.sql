-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2021 lúc 12:13 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ltw-php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `account`, `password`) VALUES
(1, 'admin1', '12345678'),
(2, 'admin2', '12345678');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(55) DEFAULT NULL,
  `gmail` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `gmail`, `password`, `created_at`, `date_of_birth`, `phone_number`, `address`, `image_path`, `point`) VALUES
(73, 'test1', 'test1@gmail.com', '1', '2021-05-25 00:00:00', '2021-05-26', '2021-05-26', 'hn', 'upload/Ảnh chụp màn hình 2021-05-20 221531.png', 100),
(79, '123', 'c111ong@gmail.com', '1', '2021-05-26 00:00:00', '2021-04-29', '1234', 'hn', 'upload/Ảnh chụp màn hình 2021-05-26 172657.png', 10),
(80, 'Hoang Duc Thang', 'hdt@gmail.com', '1', '2021-05-26 00:00:00', '2021-05-26', '1234', 'hn', 'upload/Ảnh chụp màn hình 2021-05-20 221531.png', 2),
(81, 'test18', 'test28@gmail.com', '5', '2021-05-26 00:00:00', '2021-05-28', '1234', 'hn', 'upload/Ảnh chụp màn hình 2021-05-10 092642.png', 50),
(83, 'Ma Cong Thanh', 'mct@gmail.com', '1', '2021-05-26 00:00:00', '2021-05-29', '1234', 'hn', 'upload/Ảnh chụp màn hình 2021-05-10 092642.png', 500),
(84, 'aaaa', 'd@gmail.com', '1', '2021-05-27 00:00:00', '2021-05-28', '1234', 'hn', 'upload/download.jpg', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
