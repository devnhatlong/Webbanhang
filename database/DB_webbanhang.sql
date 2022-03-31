-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 11:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Trẻ Em');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Long', 'Nhật', 'nhatlong@gmail.com', '0123456789', 'chu de 1', 'noi dung 1', '2022-03-10 20:44:50', '2022-03-10 15:02:15', 1),
(2, 'ADLong', 'ABC Nhật', 'it.nhatlong@gmail.com', '0123456789', 'chu de 2', 'noi dung 2', '2022-03-10 20:44:50', '2022-03-10 20:44:50', 0),
(3, 'Nguyễn Văn', 'A', 'nguyenvana@gmail.com', '012457896', 'Chu de 3', 'noi dung 3', '2022-03-10 21:12:26', '2022-03-10 21:12:26', 0),
(4, 'Nguyễn', 'Long', 'leetieulong687@gmail.com', '', 'asd', 'asdasdasd', '2022-03-21 15:05:02', '2022-03-21 15:05:02', 0),
(5, 'Nguyễn', 'Long', 'leetieulong687@gmail.com', '', 'asd', 'asdasdasd', '2022-03-21 15:05:33', '2022-03-21 15:05:33', 0),
(6, 'Nguyễn', 'Long', 'leetieulong687@gmail.com', '+84365756687', 'fghj', 'ghjghj', '2022-03-21 15:05:44', '2022-03-21 15:05:44', 0),
(7, 'Nguyễn', 'Long', 'leetieulong687@gmail.com', '+84365756687', 'fghj', 'ghjghj', '2022-03-21 15:06:27', '2022-03-21 15:06:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 15, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '+84878924143', 'TP.HCM', 'ÁD', '2022-03-10 21:45:06', 1, 2),
(3, 17, 'Phạm Thị E', 'phamthie@gmail.com', '+8487892487', 'Hà Nội', 'FTGD', '2022-03-10 21:51:24', 1, 1),
(4, 17, 'Phạm Thị E', 'phamthie@gmail.com', '+8487892487', 'Hà Nội', 'KJIJI', '2022-03-11 00:20:56', 1, 2),
(6, 1, 'Nguyễn Nhật Long', 'leetieulong687@gmail.com', '+84365756687', '21/6 Dương Đình Hội Quận 9 TP.HCM', '', '2022-03-20 18:36:42', 1, 2209000),
(7, 3, 'Nguyễn Văn Chương', 'chuong2k.com@gmail.com', '+84945658243', '21 Đỗ Xuân Hợp Quận 9 TP.HCM', '', '2022-03-21 18:01:35', 1, 3030000),
(8, 1, 'Nguyễn Long', 'dev.nhatlong@gmail.com', '0365756687', 'asdf', '', '2022-03-27 10:37:30', 1, 630000);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(4, 6, 15, 230000, 2, 460000),
(5, 6, 9, 149000, 1, 149000),
(6, 6, 2, 400000, 4, 1600000),
(7, 7, 1, 600000, 4, 2400000),
(8, 7, 15, 230000, 1, 230000),
(9, 7, 13, 400000, 1, 400000),
(10, 8, 15, 230000, 1, 230000),
(11, 8, 13, 400000, 1, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'ÁO POLO NAM', 650000, 600000, 'assets/photos/p-7537-ao-polo-nam.jpg', 'Áo POLO Nam mang phong cách trẻ trung, phù hợp với nhiều lứa tuổi. Chất liệu mát mẻ.', '2022-03-12 16:44:59', '2022-03-12 16:44:59', 0),
(2, 2, 'VÁY NỮ', 450000, 400000, 'assets/photos/p-7544-vay-nu.jpg', 'Váy được làm từ chất cotton giúp người mặc cảm thấy thoải mái dễ chịu . Màu sắc giản dị phù hợp với mọi lứa tuổi.', '2022-03-12 16:45:07', '2022-03-12 16:45:07', 0),
(4, 3, 'CHÂN VÁY BÉ GÁI DENIM', 250000, 200000, 'assets/photos/p-7552-chan-vay-be-gai-denim.jpg', 'Chân váy cotton denim có co giãn .\r\nPhom A xòe, cạp chun, dây dệt trang trí.\r\nHiệu ứng acid wash.\r\nĐơn giản, nữ tính, phù hợp nhiều hoàn cảnh. Kết hợp áo phông, giày bệt.', '2022-03-12 16:45:43', '2022-03-12 16:45:43', 0),
(7, 1, 'ÁO PHÔNG NAM IN TO', 300000, 250000, 'assets/photos/p-7539-ao-phong-nam-in-to.jpg', 'Áo Phông cổ tròn dệt kim, hình in to.  Phom dáng regular, cổ tròn, tay ngắn. Phù hợp mặc quanh năm, tập luyện, co giãn, thoải mái, dễ dàng. kết hợp quần short, giày thể thao ', '2022-03-12 16:50:10', '2022-03-12 16:50:10', 0),
(8, 1, 'ÁO SƠ MI NAM DÀI TAY KẺ CARO', 500000, 480000, 'assets/photos/p-7536-ao-so-mi-nam-dai-tay-ke-caro.jpg', '<span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Áo sơ mi Cotton USA kẻ caro.</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Phom dáng regular, cổ đức, tay dài, có cúc cài trang trí ở lá cổ.</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Phù hợp mặc quanh năm. Mặc thoải mái, dễ chịu có thể kết hợp với quần jeans, khaki.</span>', '2022-03-19 16:10:40', '2022-03-19 16:10:40', 0),
(9, 2, 'ÁO MẶC NHÀ NỮ', 200000, 149000, 'assets/photos/p-7542-ao-mac-nha-nu.jpg', '<span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Áo mặc nhà nữ chất liệu 100%cotton.</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Phom regular, cổ tròn, sát nách.&nbsp;</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Thắt nơ sau.</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Cảm giác thoải mái, dễ chịu khi mặc ở nhà.</span>', '2022-03-19 16:11:36', '2022-03-19 16:11:36', 0),
(10, 3, 'BỘ LIỀN EM BÉ TRAI', 250000, 200000, 'assets/photos/p-7548-bo-lien-em-be-trai.jpg', '<div class=\"product-detail-tab-content active  \" detail-tab-id=\"product-detail-tab-content-1\" id=\"product-detail-tab-content-1\" style=\"max-width: 100%; line-height: 19px; margin-bottom: 30px; color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Bộ liền cotton .<br>Phom dáng regular, cổ tròn, nẹp khuy có túi hai bên sườn.<br>Mang cảm giác thoải mái, dễ chịu phù hợp mặc nhà</div><p style=\"font-family: &quot;HK Grotesk&quot;, sans-serif; font-size: 14.4px;\"><a href=\"https://canifa.com/so-sinh/so-sinh-boy/bodysuit-mac-nha-em-be-trai-co-ban-7lj19s002.html#product-detail-tab-content-2\" class=\"product-detail-tab-label\" style=\"color: rgb(51, 63, 72); background-color: rgb(255, 255, 255); line-height: 13px; display: block; margin-bottom: 12px; text-transform: uppercase; font-size: 12px; font-family: Montserrat, sans-serif;\">CHẤT LIỆU</a></p><div class=\"product-detail-tab-content \" detail-tab-id=\"product-detail-tab-content-2\" id=\"product-detail-tab-content-2\" style=\"max-width: 100%; line-height: 19px; margin-bottom: 30px; color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"font-weight: bolder;\">100% cotton</span></div><p style=\"font-family: &quot;HK Grotesk&quot;, sans-serif; font-size: 14.4px;\"><a href=\"https://canifa.com/so-sinh/so-sinh-boy/bodysuit-mac-nha-em-be-trai-co-ban-7lj19s002.html#product-detail-tab-content-3\" class=\"product-detail-tab-label\" style=\"color: rgb(51, 63, 72); background-color: rgb(255, 255, 255); line-height: 13px; display: block; margin-bottom: 12px; text-transform: uppercase; font-size: 12px; font-family: Montserrat, sans-serif;\">HƯỚNG DẪN SỬ DỤNG</a></p><div class=\"product-detail-tab-content \" detail-tab-id=\"product-detail-tab-content-3\" id=\"product-detail-tab-content-3\" style=\"max-width: 100%; line-height: 19px; margin-bottom: 30px; color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Giặt máy ở chế độ nhẹ nhàng, nhiệt độ thường.<br>Không sử dụng hóa chất tẩy có chứa clo.<br>Phơi trong bóng mát.<br>Sấy khô ở nhiệt độ thấp, nhẹ nhàng.<br>Là ở nhiệt độ trung bình 150 độ c.<br>Giặt với sản phẩm cùng màu.<br>Không là lên chi tiết trang trí.</div>', '2022-03-19 16:12:34', '2022-03-19 16:12:34', 0),
(11, 1, 'QUẦN KHAKI NAM', 300000, 250000, 'assets/photos/p-7535-quan-khaki-nam.jpg', '<span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Quần khaki co giãn.&nbsp;</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Phom jogger, cạp chun phía sau, gấu chun, túi chéo.</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Phong cách trẻ trung, mặc thoải mái phù hợp với áo phông</span>', '2022-03-19 16:13:25', '2022-03-19 16:13:25', 0),
(12, 1, 'QUẦN SHORTS NAM', 250000, 200000, 'assets/photos/p-7538-quan-shorts-nam.jpg', '<span style=\"font-family: &quot;HK Grotesk&quot;, sans-serif; font-size: 14.4px;\">Quần Shorts Nam phogn cách trẻ trung . <br>Tạo dáng body . <br>Đậm chất phát mạnh . <br>Chất liệu co giãn có thể hoạt động thoải mái .&nbsp;</span>', '2022-03-19 16:14:23', '2022-03-19 16:14:23', 0),
(13, 2, 'QUẦN DÀI NỮ', 450000, 400000, 'assets/photos/p-7543-quan-dai-nu.jpg', '<span style=\"font-family: &quot;HK Grotesk&quot;, sans-serif; font-size: 14.4px;\">Quần đậm phong cách châu âu . Được làm từ chất liệu tơ tăm nên mặc rất thoái mái .&nbsp;</span>', '2022-03-19 16:15:04', '2022-03-19 16:15:04', 0),
(14, 3, 'BỘ MẶC NHÀ BÉ TRAI', 250000, 200000, 'assets/photos/p-7549-bo-mac-nha-be-trai.jpg', '<div class=\"product-detail-tab-content active  \" detail-tab-id=\"product-detail-tab-content-1\" id=\"product-detail-tab-content-1\" style=\"max-width: 100%; line-height: 19px; margin-bottom: 30px; color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><li>Áo dài tay in hình dành cho bé sơ sinh</li><li>Chất liệu 100 % Cotton US mang lại cảm giác mềm mại, thấm hút mồ hôi tốt giúp bé luôn có được cảm giác thoải mái, dễ chịu</li><li>Sản phẩm đạt chứng chỉ - <a href=\"https://canifa.com/blog/dong-san-pham-oekotex-100/\" target=\"_blank\" style=\"color: rgb(51, 63, 72);\">OEKOTEX</a> Class 1 an toàn cho làn da nhạy cảm của bé</li></div><p style=\"font-family: \"HK Grotesk\", sans-serif; font-size: 14.4px;\"><a href=\"https://canifa.com/so-sinh/so-sinh-boy/ao-sat-nac-7lt18s003.html#product-detail-tab-content-2\" class=\"product-detail-tab-label\" style=\"color: rgb(51, 63, 72); background-color: rgb(255, 255, 255); line-height: 13px; display: block; margin-bottom: 12px; text-transform: uppercase; font-size: 12px; font-family: Montserrat, sans-serif;\">CHẤT LIỆU</a></p><div class=\"product-detail-tab-content \" detail-tab-id=\"product-detail-tab-content-2\" id=\"product-detail-tab-content-2\" style=\"max-width: 100%; line-height: 19px; margin-bottom: 30px; color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">100% Cotton USA - Oekotex Class 1<br><span style=\"font-size: 16px; font-weight: bold;\">HDSD</span><li>Giặt lạnh hoặc ấm từ 35 đến 40 độ C</li><li>Sử dụng nước giặt dành riêng cho trẻ sơ sinh</li><li>Không sử dụng chất xả vải, giấy sấy thơm khi giặt</li><li>Giặt với sản phẩm cùng màu</li></div>', '2022-03-19 16:19:49', '2022-03-19 16:19:49', 0),
(15, 1, 'COMBO QUẦN MẶC NHÀ NAM', 250000, 230000, 'assets/photos/p-7541-combo-quan-mac-nha-nam.jpg', '<span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Combo 2 quần cộc chất liệu cotton.</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Phom dáng regular, cạp chun.</span><br style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 63, 72); font-family: Montserrat, sans-serif; font-size: 12px;\">Cảm giác thoải mái, dễ chịu khi mặc ở nhà</span>', '2022-03-19 16:17:17', '2022-03-19 16:17:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`user_id`, `token`, `created_at`) VALUES
(1, '051ae3e00f77c50b8ef048d74fe229a3', '2022-03-04 14:48:58'),
(1, '84589dccf723467bad29fd0f4e7d10e6', '2022-03-11 17:42:53'),
(1, 'a8e94caf1354baa2abc319108031e089', '2022-03-23 14:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Nguyễn Nhật Long', 'leetieulong687@gmail.com', '+84943952618', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 1, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(2, 'Nguyễn Thái Dương', 'sunvip2k@gmail.com', '+84943552213', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 1, '2022-02-28 15:47:43', '2022-03-06 14:32:34', 0),
(3, 'Nguyễn Văn Chương', 'chuong2k.com@gmail.com', '+84945658243', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(4, 'Nguyễn Phước Thạnh', 'thanhvipno1@gmail.com', '+84943478284', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(5, 'Lê Tiến Anh', 'anhprovip123@gmail.com', '+84948746284', 'TP.HCM, Việt Nam', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-02-28 15:47:43', '2022-02-28 15:47:43', 0),
(14, 'Phạm Thị C', 'phanthic@gmail.com', '+84875548214', 'TP.HCM', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-03-05 13:09:33', '2022-03-06 14:57:43', 1),
(15, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '+84878924143', 'TP.HCM', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-03-05 15:15:45', '2022-03-05 17:07:08', 0),
(16, 'Trần Văn D', 'tranvand@gmail.com', '+8487892787', 'TP.HCM', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-03-10 15:46:39', '2022-03-10 15:46:39', 0),
(17, 'Phạm Thị E', 'phamthie@gmail.com', '0878924147', 'TP.HCM', '224dfc1a2d32dfa1415c0cfb9cac808d', 2, '2022-03-10 15:48:06', '2022-03-10 15:48:06', 0),
(18, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', NULL, NULL, '224dfc1a2d32dfa1415c0cfb9cac808d', NULL, '2022-03-11 17:38:50', '2022-03-11 17:38:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
