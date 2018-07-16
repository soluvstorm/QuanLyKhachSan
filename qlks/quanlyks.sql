-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 07, 2017 lúc 07:49 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucphong`
--

DROP TABLE IF EXISTS `danhmucphong`;
CREATE TABLE IF NOT EXISTS `danhmucphong` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(3) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Trống',
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_type` (`room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `danhmucphong`
--

INSERT INTO `danhmucphong` (`room_id`, `room_type`, `status`, `note`) VALUES
(101, 'A', 'Đang sử dụng', '123456'),
(202, 'B', 'Trống', ''),
(303, 'C', 'Trống', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `id_bill` int(11) NOT NULL,
  `id_rent` int(11) NOT NULL,
  `type` float NOT NULL,
  `number` float NOT NULL,
  `out_date` date DEFAULT NULL,
  PRIMARY KEY (`id_bill`),
  UNIQUE KEY `id_rent_2` (`id_rent`),
  KEY `id_rent` (`id_rent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_bill`, `id_rent`, `type`, `number`, `out_date`) VALUES
(1, 1, 1, 1.25, '2018-01-01'),
(2, 2, 1.5, 1, '2018-01-05'),
(3, 3, 1.5, 1, '2018-01-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuthuephong`
--

DROP TABLE IF EXISTS `phieuthuephong`;
CREATE TABLE IF NOT EXISTS `phieuthuephong` (
  `id_rent` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `star_date` date NOT NULL,
  `rent_stat` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa thanh toán',
  `cus_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cus_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cus_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cus_add` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cus_name_2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_type_2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_id_2` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_add_2` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_name_3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_type_3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_id_3` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_add_3` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_rent`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `phieuthuephong`
--

INSERT INTO `phieuthuephong` (`id_rent`, `room_id`, `star_date`, `rent_stat`, `cus_name`, `cus_type`, `cus_id`, `cus_add`, `cus_name_2`, `cus_type_2`, `cus_id_2`, `cus_add_2`, `cus_name_3`, `cus_type_3`, `cus_id_3`, `cus_add_3`) VALUES
(1, 303, '2017-11-30', 'Đã thanh toán', 'Xịn', 'Nội địa', '123', '123', 'Khôi', 'Nội địa', '456', '456', 'Checker', 'Nội địa', '789', '789'),
(2, 202, '2017-11-30', 'Đã thanh toán', 'Nhật', 'Nước ngoài', '987', '987', '', '', '', '', '', '', '', ''),
(3, 101, '2017-12-04', 'Chưa thanh toán', 'Luật', 'Nước ngoài', '456', '456', 'Lưu', 'Nước ngoài', '147', '147', 'Khôi lưu', 'Nội địa', '789', '789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

DROP TABLE IF EXISTS `phong`;
CREATE TABLE IF NOT EXISTS `phong` (
  `room_type` varchar(3) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`room_type`, `price`) VALUES
('A', 150000),
('B', 170000),
('C', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `role`) VALUES
(1, 'admin', '123', 1),
(2, 'nhanvien2', '2', 0),
(3, 'nhanvien3', '3', 0),
(4, 'nhanvien4', '4', 0),
(5, 'nhanvien5', '5', 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhmucphong`
--
ALTER TABLE `danhmucphong`
  ADD CONSTRAINT `danhmucphong_ibfk_1` FOREIGN KEY (`room_type`) REFERENCES `phong` (`room_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_rent`) REFERENCES `phieuthuephong` (`id_rent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieuthuephong`
--
ALTER TABLE `phieuthuephong`
  ADD CONSTRAINT `phieuthuephong_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `danhmucphong` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
