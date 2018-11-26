-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2018 lúc 10:23 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `app_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baner_active`
--

CREATE TABLE `baner_active` (
  `id` int(10) UNSIGNED NOT NULL,
  `baner_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baner_active`
--

INSERT INTO `baner_active` (`id`, `baner_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2018-11-18 04:12:55', NULL),
(2, 2, 0, '2018-11-18 04:13:21', NULL),
(3, 3, 0, '2018-11-18 04:13:46', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baner_details`
--

CREATE TABLE `baner_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `baner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baner_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baner_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baner_content_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baner_content_two` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baner_details`
--

INSERT INTO `baner_details` (`id`, `baner_image`, `baner_title`, `baner_content`, `baner_content_one`, `baner_content_two`, `created_at`, `updated_at`) VALUES
(1, '1542957355header-bg.png', 'Sell', '85%', 'Nội dung text 1', 'Nội dung text', '2018-11-18 04:12:55', '2018-11-22 19:15:55'),
(2, '1542557601i5.jpg', 'Sell', '50%', 'Nội dung text 2', 'Nội dung text 2', '2018-11-18 04:13:21', NULL),
(3, '1542557626i7.jpg', 'Sell-aaaaaaaaa', 'Nội dung text 3', 'Nội dung text 3', 'Nội dung text 3', '2018-11-18 04:13:46', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `cate_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `parent_id`, `cate_image`, `cate_slug`, `cate_active`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 0, '', 'nam', 0, '2018-11-17 19:23:49', NULL),
(2, 'Nữ', 0, '', 'nu', 0, '2018-11-17 19:24:08', NULL),
(3, 'Giảm giá', 0, '', 'giam-gia', 0, '2018-11-17 19:24:26', NULL),
(4, 'Test', 0, '', 'thuong-hieu', 0, '2018-11-17 19:24:42', NULL),
(22, 'Danh muc sub2', 1, '1542832977l8.jpg', 'danh-muc-sub2', 0, '2018-11-22 05:07:11', '2018-11-21 20:42:57'),
(23, 'Danh muc sub 3', 1, '1542832941l5.jpg', 'danh-muc-sub-3', 0, '2018-11-22 05:07:19', '2018-11-21 20:42:21'),
(24, 'sub danh muc so 3', 23, '1542833010l6.jpg', 'sub-danh-muc-so-3', 0, '2018-11-22 05:07:49', '2018-11-21 20:43:30'),
(25, 'sub danh muc so 4', 23, '', 'sub-danh-muc-so-4', 0, '2018-11-22 05:07:54', NULL),
(26, 'sub 4 danh muc so 5', 25, '1542833033l7.jpg', 'sub-4-danh-muc-so-5', 0, '2018-11-22 05:08:10', '2018-11-21 20:43:53'),
(27, 'sub 4 danh muc so 6', 25, '1542833049l8.jpg', 'sub-4-danh-muc-so-6', 0, '2018-11-22 05:08:17', '2018-11-21 20:44:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `text_comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `text_comment`, `created_at`, `updated_at`) VALUES
(1, 4, 6, 'hhhhhhhhhhhhhhhhh', '2018-11-18 02:37:40', '2018-11-18 14:37:40'),
(2, 4, 6, 'yyyyyyyyyyyyyyyyyy', '2018-11-18 02:38:12', '2018-11-18 14:38:12'),
(3, 5, 5, 'gggggggggggggggggg', '2018-11-18 02:47:26', '2018-11-18 14:47:26'),
(4, 1, 6, 'ưqeqweqw', '2018-11-18 04:23:01', '2018-11-18 16:23:01'),
(5, 1, 6, 'ưeqweqweqwe', '2018-11-18 04:36:37', '2018-11-18 16:36:37'),
(6, 2, 6, 'cc nhe', '2018-11-20 05:20:12', '2018-11-20 05:20:12'),
(7, 2, 7, 'Đắt vcc', '2018-11-20 05:24:02', '2018-11-20 05:24:02'),
(8, 2, 7, 'đéo mua ok', '2018-11-20 05:24:45', '2018-11-20 05:24:45'),
(9, 4, 24, 'wqwqweqweqwe', '2018-11-22 04:14:56', '2018-11-22 16:14:56'),
(10, 1, 28, 'sadsasdasda', '2018-11-23 22:36:38', '2018-11-24 10:36:38'),
(11, 1, 28, 'cccccc', '2018-11-23 22:36:47', '2018-11-24 10:36:47'),
(12, 1, 3, 'sdasdasdasd', '2018-11-23 22:56:45', '2018-11-24 10:56:45'),
(13, 1, 3, 'sadsasdasdasdasasasdadsa', '2018-11-23 22:57:09', '2018-11-24 10:57:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments_reply`
--

CREATE TABLE `comments_reply` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reply_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments_reply`
--

INSERT INTO `comments_reply` (`id`, `comment_id`, `user_id`, `product_id`, `reply_content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, '231321231321321321231231232', '2018-11-18 04:53:55', '2018-11-18 16:53:55'),
(2, 2, 1, 6, '2313213212313', '2018-11-18 04:54:03', '2018-11-18 16:54:03'),
(3, 2, 1, 6, '23132123132131', '2018-11-18 04:54:13', '2018-11-18 16:54:13'),
(4, 2, 1, 6, '23123123123123', '2018-11-19 05:32:29', '2018-11-18 17:32:29'),
(5, 1, 1, 6, 'qưeqweqweqwe', '2018-11-19 05:38:39', '2018-11-18 17:38:39'),
(6, 1, 1, 6, 'đăeqeqưeq', '2018-11-19 05:38:47', '2018-11-18 17:38:47'),
(7, 1, 1, 6, '2312312123', '2018-11-19 05:38:55', '2018-11-18 17:38:55'),
(8, 1, 1, 6, '23123132123', '2018-11-19 05:39:11', '2018-11-18 17:39:11'),
(9, 2, 1, 6, 'dddddddddd', '2018-11-19 05:42:27', '2018-11-18 17:42:27'),
(10, 7, 2, 7, 'cc đéo mua thôi', '2018-11-20 05:24:16', '2018-11-20 05:24:16'),
(11, 8, 2, 7, 'bố sợ mày quá', '2018-11-20 05:25:15', '2018-11-20 05:25:15'),
(12, 9, 4, 24, 'weweqqwe', '2018-11-22 04:15:03', '2018-11-22 16:15:03'),
(13, 10, 1, 28, 'fffffffffff', '2018-11-23 22:37:28', '2018-11-24 10:37:28'),
(14, 12, 1, 3, 'sádadsasdadssdas', '2018-11-23 22:56:59', '2018-11-24 10:56:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countpoin`
--

CREATE TABLE `countpoin` (
  `id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_price` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countpoin`
--

INSERT INTO `countpoin` (`id`, `code`, `count_price`, `type`, `total`, `created_at`, `time`) VALUES
(2, 'AQL8FDAE112OAR4G', 25, NULL, 1000000, '2018-11-23', '2018-11-24'),
(3, '7QNAB1I4OF8AKRJ', 90, NULL, 2000000, '2018-11-24', '2018-11-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `gender`, `email`, `province`, `ward`, `commune`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn', 'Trang', 'Nữ', 'trang112@gmail.com', 'Hà nội', 'Ba đình', 'Số 15 Ba đình', 166325654, '2018-11-18 00:23:43', '2018-11-18 12:23:43'),
(4, 'Nguyễn', 'Thu Huyền', 'Nữ', 'huyen122@gmail.com', 'Hà nội', 'Thanh xuân', 'Gần đại học hà nội', 165695658, '2018-11-18 00:38:42', '2018-11-18 12:38:42'),
(7, 'user name', 'Tien', 'Nam', 'clonebabi0@gmail.com', 'Ha noi', 'Hoàng mai', 'Nguyễn xiển', 356969378, '2018-11-18 00:42:21', '2018-11-18 12:42:21'),
(8, 'Nguyễn Thu', 'Thủy', 'Nữ', 'thuyactive@gmail.com', 'Ha noi', 'Quan hoa', 'Khu quan hoa', 16523256, '2018-11-19 02:26:25', '2018-11-19 02:26:25'),
(9, 'Thanh', 'Nguyên', 'Nữ', 'admin3333333333333333@gmail.com', 'ưeewqewqew', 'qewqweqwe', 'Ha noiqewqweqwe', 356969355, '2018-11-23 01:14:36', '2018-11-23 01:14:36'),
(10, 'dsffdsdf', 'sfdsdfsdf', 'Nữ', 'adm333333in@gmail.com', 'Ha noi', '23123123', 'Ha noi', 356969355, '2018-11-23 01:20:55', '2018-11-23 01:20:55'),
(11, '231321', '231231231', 'Nữ', '12312323@gmail.com', '1231231', '231231231', '23123', 2132123, '2018-11-23 01:23:50', '2018-11-23 01:23:50'),
(12, 'Nguyễn', 'Thanh', 'Nữ', 'adm33333in@gmail.com', 'Ha noi', '13123', 'Ha noi', 356969355, '2018-11-23 01:24:46', '2018-11-23 01:24:46'),
(13, 'werwrewerwewe', 'admin', 'Nữ', 'admin@gmail.com', 'Ha nội', 'Hoàng mai', '1231231231', 1653256355, '2018-11-23 22:35:21', '2018-11-24 10:35:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likeviews`
--

CREATE TABLE `likeviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodct_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likeviews`
--

INSERT INTO `likeviews` (`id`, `prodct_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 12, 4, '2018-11-18 00:54:12', '2018-11-18 12:54:12'),
(2, 2, 4, '2018-11-22 04:20:30', '2018-11-22 16:20:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_22_043515_create_categories_table', 1),
(4, '2018_10_24_163514_create_products_table', 1),
(5, '2018_11_10_163009_create_products_image_table', 1),
(6, '2018_11_10_164816_create_order_detailts_table', 1),
(7, '2018_11_10_165627_create_order_table', 1),
(8, '2018_11_10_173450_create_product_details_table', 1),
(9, '2018_11_12_194308_create_comments_table', 1),
(10, '2018_11_12_194319_create_likeviews_table', 1),
(11, '2018_11_14_213840_create_customer_table', 1),
(12, '2018_11_16_095041_create_baner_active_table', 1),
(13, '2018_11_17_223127_create_users_address_table', 1),
(14, '2018_11_17_223246_create_baner_details_table', 1),
(15, '2018_11_17_223805_create_comments_reply_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_order` date NOT NULL,
  `total` int(11) NOT NULL,
  `deal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_discount` int(11) DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_active` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `date_order`, `total`, `deal`, `post_discount`, `payment`, `order_active`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2018-12-25', 3350000, 'Giao hàng địa phương', NULL, NULL, 1, 'Giao hàng lúc 12h  đêm', '2018-11-18 00:27:15', '2018-11-18 16:04:43'),
(2, 4, NULL, '2018-12-16', 850000, 'Giao hàng trong ngày', NULL, NULL, 0, 'Giao hàng sớm hộ mình', '2018-11-18 00:40:23', '2018-11-18 12:40:23'),
(3, 7, 4, '2018-12-25', 4500000, 'Giao hàng trong ngày', NULL, NULL, 0, 'Gửi sáng hoặc chiều', '2018-11-18 00:42:21', '2018-11-18 12:42:21'),
(4, 8, NULL, '2018-11-02', 850000, 'Giao hàng trong ngày', NULL, NULL, 0, 'no', '2018-11-19 02:26:25', '2018-11-19 02:26:25'),
(5, 12, NULL, '2018-05-16', 5370000, 'Giao hàng trong ngày', 2685000, NULL, 0, '2312312123123', '2018-11-23 01:24:46', '2018-11-23 01:24:46'),
(6, 13, 1, '1996-11-20', 2780000, 'Giao hàng địa phương', 278000, NULL, 1, '231231231321321', '2018-11-23 22:35:21', '2018-11-24 10:35:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detailts`
--

CREATE TABLE `order_detailts` (
  `id` int(10) UNSIGNED NOT NULL,
  `oreder_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detailts`
--

INSERT INTO `order_detailts` (`id`, `oreder_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 4, 400000, '2018-11-18 00:27:15', '2018-11-18 12:27:15'),
(2, 1, 6, 1, 650000, '2018-11-18 00:27:15', '2018-11-18 12:27:15'),
(3, 1, 5, 1, 600000, '2018-11-18 00:27:15', '2018-11-18 12:27:15'),
(4, 1, 10, 1, 500000, '2018-11-18 00:27:15', '2018-11-18 12:27:15'),
(5, 2, 12, 1, 350000, '2018-11-18 00:40:23', '2018-11-18 12:40:23'),
(6, 2, 11, 1, 500000, '2018-11-18 00:40:23', '2018-11-18 12:40:23'),
(7, 3, 10, 1, 500000, '2018-11-18 00:42:21', '2018-11-18 12:42:21'),
(8, 3, 8, 1, 4000000, '2018-11-18 00:42:21', '2018-11-18 12:42:21'),
(9, 4, 10, 1, 500000, '2018-11-19 02:26:25', '2018-11-19 02:26:25'),
(10, 4, 12, 1, 350000, '2018-11-19 02:26:25', '2018-11-19 02:26:25'),
(11, 5, 26, 3, 650000, '2018-11-23 01:24:46', '2018-11-23 01:24:46'),
(12, 5, 25, 1, 600000, '2018-11-23 01:24:46', '2018-11-23 01:24:46'),
(13, 5, 24, 3, 450000, '2018-11-23 01:24:46', '2018-11-23 01:24:46'),
(14, 5, 23, 3, 490000, '2018-11-23 01:24:46', '2018-11-23 01:24:46'),
(15, 6, 1, 1, 200000, '2018-11-23 22:35:21', '2018-11-24 10:35:21'),
(16, 6, 2, 1, 200000, '2018-11-23 22:35:21', '2018-11-24 10:35:21'),
(17, 6, 11, 2, 500000, '2018-11-23 22:35:21', '2018-11-24 10:35:21'),
(18, 6, 21, 2, 200000, '2018-11-23 22:35:21', '2018-11-24 10:35:21'),
(19, 6, 3, 2, 490000, '2018-11-23 22:35:21', '2018-11-24 10:35:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('neunhuemlamay@gmail.com', 'ee6e595b3b1e074e3018638417d42ce9e3b66db3', '2018-11-20 13:35:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `category_name` int(11) NOT NULL,
  `product_remove` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `cate_id`, `category_name`, `product_remove`, `description`, `product_image`, `short_description`, `product_slug`, `product_active`, `created_at`, `updated_at`) VALUES
(1, 'Long Sleeve shirt', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook', '1542526653l5.jpg', 'Beryl Cook is oneIt is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet', 'long-sleeve-shirt', 0, '2018-11-17 19:37:33', '2018-11-17 19:39:29'),
(2, 'Long Sleeve shirt 1', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook', '1542526921l6.jpg', 'officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor', 'long-sleeve-shirt-1', 0, '2018-11-17 19:42:01', NULL),
(3, 'Long Sleeve shirt 2', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook.', '1542527065l7.jpg', 'John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a', 'long-sleeve-shirt-2', 0, '2018-11-17 19:44:25', NULL),
(4, 'Long Sleeve shirt 3', 2, 1, 0, 'John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a', '1542527199l8.jpg', 'dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and still hangs in their house today', 'long-sleeve-shirt-3', 0, '2018-11-17 19:45:59', '2018-11-17 19:46:39'),
(5, 'Faded SkyBlu Denim Jeans', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton,', '1542527316q1.jpg', 'she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956', 'faded-skyblu-denim-jeans', 0, '2018-11-17 19:48:36', NULL),
(6, 'Faded SkyBlu Denim Jeans 1', 2, 1, 0, 'she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956. she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956', '1542528129l5.jpg', 'she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956', 'faded-skyblu-denim-jeans-1', 0, '2018-11-17 19:49:52', '2018-11-17 20:02:09'),
(7, 'Faded SkyBlu Denim Jeans 2', 2, 1, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542528150l8.jpg', 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated', 'faded-skyblu-denim-jeans-2', 0, '2018-11-17 19:51:05', '2018-11-17 22:30:22'),
(8, 'Faded SkyBlu Denim Jeans 3', 2, 1, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542905556l5.jpg', 'It is often frustrating to attempt to pdicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', 'faded-skyblu-denim-jeans-3', 0, '2018-11-17 19:52:19', '2018-11-22 04:52:36'),
(9, 'Áo nam Long Sleeve shirt', 1, 2, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School', '1542527724l2.jpg', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars,', 'ao-nam-long-sleeve-shirt', 0, '2018-11-17 19:55:24', NULL),
(10, 'Áo nam Faded SkyBlu Denim Jeans', 1, 2, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School', '1542527791l1.jpg', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars,', 'ao-nam-faded-skyblu-denim-jeans', 0, '2018-11-17 19:56:31', NULL),
(11, 'Áo nam Faded SkyBlu Denim Jeans 4', 1, 2, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542527860l4.jpg', 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe Divorce and the death of spouses or grown children', 'ao-nam-faded-skyblu-denim-jeans-4', 0, '2018-11-17 19:57:40', NULL),
(12, 'Áo Faded SkyBlu Denim Jeans-5', 1, 2, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542527920l3.jpg', 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet', 'ao-faded-skyblu-denim-jeans-5', 0, '2018-11-17 19:58:40', NULL),
(15, 'Long Sleeve shirt11', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook', '1542526653l5.jpg', 'Beryl Cook is oneIt is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet', 'long-sleeve-shirt111', 0, '2018-11-17 19:37:33', '2018-11-17 19:39:29'),
(16, 'Long Sleeve shirt 11555', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook', '1542526921l6.jpg', 'officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor', 'long-sleeve-shirt-11666', 0, '2018-11-17 19:42:01', NULL),
(17, 'Long Sleeve shirt 2', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook.', '1542527065l7.jpg', 'John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a', 'long-sleeve-shirt-2fgđfg', 0, '2018-11-17 19:44:25', NULL),
(18, 'Long Sleeve shirt 315', 2, 1, 0, 'John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a', '1542527199l8.jpg', 'dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and still hangs in their house today', 'long-sleeve-shirt-3151', 0, '2018-11-17 19:45:59', '2018-11-17 19:46:39'),
(19, 'Faded SkyBlu Denim Jeans485', 2, 1, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton,', '1542527316q1.jpg', 'she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956', 'faded-skyblu-denim-jeans198', 0, '2018-11-17 19:48:36', NULL),
(20, 'Faded SkyBlu Denim Jeans 1', 2, 1, 0, 'she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956. she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956', '1542528129l5.jpg', 'she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956', 'faded-skyblu-denim-jeans-122', 0, '2018-11-17 19:49:52', '2018-11-17 20:02:09'),
(21, 'Faded SkyBlu Denim Jeans 211', 2, 1, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542528150l8.jpg', 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated', 'faded-skyblu-denim-jeans-2111', 0, '2018-11-17 19:51:05', '2018-11-17 22:30:22'),
(22, 'Faded SkyBlu Denim Jeans 3222ghghghghghg', 2, 1, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542829183l7.jpg', 'It is often frustrating to attempt to pdicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', 'faded-skyblu-denim-jeans-3222ghghghghghg', 0, '2018-11-17 19:52:19', '2018-11-21 19:39:43'),
(23, 'Áo nam Long Sleeve shirt222', 1, 2, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School', '1542527724l2.jpg', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars,', 'ao-nam-long-sleeve-shirt222', 0, '2018-11-17 19:55:24', NULL),
(24, 'Áo nam Faded SkyBlu Denim Jeans', 1, 2, 0, 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School', '1542527791l1.jpg', 'Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars,', 'ao-nam-faded-skyblu-denim-jeans555', 0, '2018-11-17 19:56:31', NULL),
(25, 'Áo nam Faded SkyBlu Denim Jeans 4555', 1, 2, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542527860l4.jpg', 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe Divorce and the death of spouses or grown children', 'ao-nam-faded-skyblu-denim-jeans-455', 0, '2018-11-17 19:57:40', NULL),
(26, 'Áo Faded SkyBlu Denim Jeans-5555', 1, 2, 0, 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that', '1542527920l3.jpg', 'It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet', 'ao-faded-skyblu-denim-jeans-5555', 0, '2018-11-17 19:58:40', NULL),
(27, 'aasdasda sda sd sdadsad sdada', 2, 1, 0, '11111111111111111111111111111', '1542827630l5.jpg', '1111111111111111111111111', 'aasdasda-sda-sd-sdadsad-sdada', 0, '2018-11-21 19:13:50', '2018-11-21 19:40:37'),
(28, 'dfsdfsfdsdfs fs dfsdfs', 2, 1, 0, '123123123321231', '1542829337l8.jpg', '23123132123123', 'dfsdfsfdsdfs-fs-dfsdfs', 0, '2018-11-21 19:42:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_image`
--

CREATE TABLE `products_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_image`
--

INSERT INTO `products_image` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1542526653l6.jpg', '2018-11-17 19:37:33', NULL),
(2, 1, '1542526653l7.jpg', '2018-11-17 19:37:33', NULL),
(3, 2, '1542526921l7.jpg', '2018-11-17 19:42:01', NULL),
(4, 2, '1542526921l8.jpg', '2018-11-17 19:42:01', NULL),
(5, 3, '1542527065l5.jpg', '2018-11-17 19:44:25', NULL),
(6, 3, '1542527065l6.jpg', '2018-11-17 19:44:25', NULL),
(7, 4, '1542527159l5.jpg', '2018-11-17 19:45:59', NULL),
(8, 4, '1542527159l7.jpg', '2018-11-17 19:45:59', NULL),
(9, 5, '1542527316ob2.jpg', '2018-11-17 19:48:36', NULL),
(10, 5, '1542527316ob3.jpg', '2018-11-17 19:48:36', NULL),
(11, 6, '1542527392ob2.jpg', '2018-11-17 19:49:52', NULL),
(12, 6, '1542527392q1.jpg', '2018-11-17 19:49:52', NULL),
(13, 7, '1542527465ob1.jpg', '2018-11-17 19:51:05', NULL),
(14, 7, '1542527465q1.jpg', '2018-11-17 19:51:05', NULL),
(15, 8, '1542527539ob1.jpg', '2018-11-17 19:52:19', NULL),
(16, 8, '1542527539ob2.jpg', '2018-11-17 19:52:19', NULL),
(17, 9, '1542527724l3.jpg', '2018-11-17 19:55:24', NULL),
(18, 9, '1542527724l4.jpg', '2018-11-17 19:55:24', NULL),
(19, 10, '1542527791l2.jpg', '2018-11-17 19:56:31', NULL),
(20, 10, '1542527791l4.jpg', '2018-11-17 19:56:31', NULL),
(21, 11, '1542527860l1.jpg', '2018-11-17 19:57:40', NULL),
(22, 11, '1542527860l3.jpg', '2018-11-17 19:57:40', NULL),
(23, 12, '1542527920l1.jpg', '2018-11-17 19:58:40', NULL),
(24, 12, '1542527920l2.jpg', '2018-11-17 19:58:40', NULL),
(26, 27, '1542827630l6.jpg', '2018-11-21 19:13:50', NULL),
(27, 27, '1542827630l8.jpg', '2018-11-21 19:13:50', NULL),
(28, 22, '1542829183l5.jpg', NULL, '2018-11-21 19:39:43'),
(29, 22, '1542829183l6.jpg', NULL, '2018-11-21 19:39:43'),
(30, 22, '1542829183l8.jpg', NULL, '2018-11-21 19:39:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `madein` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `qualitycheck` int(11) DEFAULT NULL,
  `new` int(11) DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `price`, `sell_price`, `amount`, `views`, `brand`, `madein`, `type`, `weight`, `qualitycheck`, `new`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 200000, NULL, 5, 0, 'DIOR', 'Jav', 'Áo', 50, 0, 99, 'blue', '2018-11-17 19:37:33', '2018-11-17 19:39:29'),
(2, 2, 300000, 200000, 20, 0, 'CHANEL', 'Jav', 'Áo', 50, 0, 98, 'gray', '2018-11-17 19:42:01', NULL),
(3, 3, 500000, 490000, 23, 0, 'Sêrcret', 'Jav', 'Quần Jeans', 50, 0, 100, 'green', '2018-11-17 19:44:25', NULL),
(4, 4, 500000, 450000, 23, 0, 'Cxress', 'Jav', 'Áo', 50, 0, 100, 'orange', '2018-11-17 19:45:59', '2018-11-17 19:46:39'),
(5, 5, 600000, NULL, NULL, 0, 'REx', 'Dubai', 'Quần', 100, 0, 100, 'blue', '2018-11-17 19:48:36', NULL),
(6, 6, 650000, NULL, NULL, 0, 'WEd', 'FUxin', 'Quần', 150, 0, 100, 'Blue', '2018-11-17 19:49:52', '2018-11-17 20:02:09'),
(7, 7, 9999999, 9989989, 15, 0, 'Ew', 'Edd', 'Quần', 100, 0, 100, 'blue', '2018-11-17 19:51:05', '2018-11-17 22:30:22'),
(8, 8, 6000000, 4000000, 50, 0, 'ERR', 'Mã lai', 'Quần', 50, 0, 100, 'Gray', '2018-11-17 19:52:19', '2018-11-22 04:52:36'),
(9, 9, 500000, NULL, 5, 0, 'FRR', 'Jav', 'Áo', 30, 0, 100, 'Gray', '2018-11-17 19:55:24', NULL),
(10, 10, 550000, 500000, NULL, 0, 'DFFF', 'fg', 'Áo', 24, 0, 100, 'Green', '2018-11-17 19:56:31', NULL),
(11, 11, 600000, 500000, 15, 0, 'RE', 'Madein', 'Áo', 20, 0, 100, 'Red', '2018-11-17 19:57:40', NULL),
(12, 12, 350000, NULL, 2, 0, 'DF', 'Jac', 'Áo', 20, 0, 100, 'Gray', '2018-11-17 19:58:40', NULL),
(15, 15, 200000, NULL, 5, 0, 'Off White', 'Jav', 'Áo', 50, 0, 99, 'blue', '2018-11-17 19:37:33', '2018-11-17 19:39:29'),
(16, 16, 300000, 200000, 20, 0, 'Off White', 'Jav', 'Áo', 50, 0, 98, 'gray', '2018-11-17 19:42:01', NULL),
(17, 17, 500000, 490000, 23, 0, 'Sêrcret', 'Jav', 'Quần Jeans', 50, 0, 100, 'green', '2018-11-17 19:44:25', NULL),
(18, 18, 500000, 450000, 23, 0, 'Cxress', 'Jav', 'Áo', 50, 0, 100, 'orange', '2018-11-17 19:45:59', '2018-11-17 19:46:39'),
(19, 19, 600000, NULL, NULL, 0, 'REx', 'Dubai', 'Quần', 100, 0, 100, 'blue', '2018-11-17 19:48:36', NULL),
(20, 20, 650000, NULL, NULL, 0, 'WEd', 'FUxin', 'Quần', 150, 0, 100, 'Blue', '2018-11-17 19:49:52', '2018-11-17 20:02:09'),
(21, 21, 200000, NULL, 5, 0, 'Off White', 'Jav', 'Áo', 50, 0, 99, 'blue', '2018-11-17 19:37:33', '2018-11-17 19:39:29'),
(22, 22, 300000, 200000, 20, 0, 'Off White', 'Jav', 'Áo', 50, 0, 98, 'gray', '2018-11-17 19:42:01', '2018-11-21 19:39:43'),
(23, 23, 500000, 490000, 23, 0, 'Sêrcret', 'Jav', 'Quần Jeans', 50, 0, 100, 'green', '2018-11-17 19:44:25', NULL),
(24, 24, 500000, 450000, 23, 0, 'Cxress', 'Jav', 'Áo', 50, 0, 100, 'orange', '2018-11-17 19:45:59', '2018-11-17 19:46:39'),
(25, 25, 600000, NULL, NULL, 0, 'REx', 'Dubai', 'Quần', 100, 0, 100, 'blue', '2018-11-17 19:48:36', NULL),
(26, 26, 650000, NULL, NULL, 0, 'WEd', 'FUxin', 'Quần', 150, 0, 100, 'Blue', '2018-11-17 19:49:52', '2018-11-17 20:02:09'),
(27, 27, 23123, 1231, 333, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2018-11-21 19:13:50', '2018-11-21 19:40:37'),
(28, 28, 32123, 1232, 23, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2018-11-21 19:42:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `name_login`, `email`, `avatar`, `email_verified_at`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin', 'admin@gmail.com', '1542689374l5.jpg', NULL, '$2y$10$CroHZEKfQYhlJR.yu6RF5.sv2AAXsnLCVy5ysJYFjK1lQYTOQGC0i', 2, 0, 'v74oaMQcgYOarnZDP4lysvTmSArYmEeEllvq3r9BecZoUEmv5xqT3vcKPc1c', NULL, '2018-11-20 04:49:34'),
(2, 'mod', NULL, 'mod', 'neunhuemlamay@gmail.com', '1542690136l6.jpg', NULL, '$2y$10$N/rCuYNk9nnBdrljxW4TRuNqTr.nywRwigbHl58CTP3IlLTPlmkam', 1, 0, NULL, NULL, '2018-11-20 05:02:16'),
(3, 'mod1', NULL, 'mod1', 'clonebabi1@gmail.com', '1542700782ci2.jpg', NULL, '$2y$10$jH0PeWLDsb8T16/LJlcNVucQzpr52BnvZbCQfrB1xevsiWBHddtnC', 1, 0, 'n8i0cwsEBwajvSpXEWOtOg6jNWcQiZnghzO0ZyWMZ1YQILyE0cigLPGr3YI4', NULL, '2018-11-20 07:59:42'),
(4, 'user1', NULL, 'user1', 'clonebabi0@gmail.com', NULL, NULL, '$2y$10$mKtQzSJ3o1RIbfDRjrCVienU5r79JbQGUU6UR09Ook3oVOmoPE9xW', 0, 0, '0Bymaej5MPN93Oqfp4ld8DkqEWZqr5GsQwxx8L8BepN7RnoRmcwIWdgds4Xn', NULL, NULL),
(5, 'user2', NULL, 'user2', 'clonebabi2@gmail.com', NULL, NULL, '$2y$10$FJM9TooyVHQsXqOZ8DtCQOiNJtfxdev9KOYeFtQrtTpbPDT.58S5m', 0, 0, 'Ixy0fNc0wbs1CGSZb56WilsoXVMf89lY9dcltoPgjw3Yt6L4ch5snzV75fdz', NULL, NULL),
(6, 'user3', NULL, 'user3', 'clonebabi3@gmail.com', NULL, NULL, '$2y$10$8jgzAV5lks7VRi83vVNnguDV5XlUCKt4SVk9OAAxFAuc4nqDl79Tm', 0, 0, NULL, NULL, NULL),
(7, 'user4', NULL, 'user4', 'clonebabi4@gmail.com', NULL, NULL, '$2y$10$izeWngjiASHTninHLk2NFOzeRu05kVjTtjJW0vZBScM2C9nFelU82', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_address`
--

CREATE TABLE `users_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_address`
--

INSERT INTO `users_address` (`id`, `user_id`, `phone`, `gender`, `province`, `ward`, `created_at`, `updated_at`) VALUES
(1, 1, 1653256355, 'Nam', 'Ha nội', 'Hoàng mai', NULL, NULL),
(2, 2, 213564845, 'Nữ', 'Thành phố', 'Thanh xuân', '2018-11-20 04:31:57', '2018-11-20 04:31:57'),
(3, 3, 356969355, 'Nam', 'Ha noisdadadasd', 'Thanh xuânadadasdad', '2018-11-20 08:00:33', '2018-11-20 08:00:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baner_active`
--
ALTER TABLE `baner_active`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baner_details`
--
ALTER TABLE `baner_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cate_name_unique` (`cate_name`),
  ADD UNIQUE KEY `categories_cate_slug_unique` (`cate_slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments_reply`
--
ALTER TABLE `comments_reply`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countpoin`
--
ALTER TABLE `countpoin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `likeviews`
--
ALTER TABLE `likeviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detailts`
--
ALTER TABLE `order_detailts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_slug_unique` (`product_slug`);

--
-- Chỉ mục cho bảng `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_login_unique` (`name_login`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baner_active`
--
ALTER TABLE `baner_active`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `baner_details`
--
ALTER TABLE `baner_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `comments_reply`
--
ALTER TABLE `comments_reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `countpoin`
--
ALTER TABLE `countpoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `likeviews`
--
ALTER TABLE `likeviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_detailts`
--
ALTER TABLE `order_detailts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `products_image`
--
ALTER TABLE `products_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
