-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2018 lúc 03:26 PM
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
(1, 'Nam', 0, '', 'nam', 0, '2018-12-04 03:15:25', NULL),
(2, 'Nữ', 0, '', 'nu', 0, '2018-12-04 03:15:32', NULL),
(3, 'Áo Sơ Mi Nam', 1, '1543936683c1.jpg', 'ao-so-mi-nam', 0, '2018-12-04 03:18:03', '2018-12-04 17:00:45'),
(4, 'Áo Khoác Nam', 1, '1543936719c2.jpg', 'ao-khoac-nam', 0, '2018-12-04 03:18:39', NULL),
(5, 'Áo Sơ Mi Nữ', 2, '1543936732c1.jpg', 'ao-so-mi-nu', 0, '2018-12-04 03:18:52', NULL),
(6, 'Áo Khoác Nữ', 2, '1543936755c1.jpg', 'ao-khoac-nu', 0, '2018-12-04 03:19:15', NULL),
(7, 'Đầm nữ', 2, '1543936900dam_nu_2__1__500x750.jpg', 'dam-nu', 0, '2018-12-04 03:21:40', NULL);

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
(1, 1, 9, '23123123', '2018-12-04 04:36:21', '2018-12-04 16:36:21');

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
(1, 'DV7HOGPUEJ4ED6N', 50, NULL, 200000, '2018-12-04', '2018-12-05'),
(2, 'PQFJSNBO0YMMDH', 40, NULL, NULL, '2018-12-04', '2018-12-06');

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
(1, 'Thanh', 'Nguyễn', 'Nữ', 'ad777min@gmail.com', 'Ha noi', 'Thanh xuân', '15 Thanh xuân', 145265562, '2018-12-05 05:03:13', '2018-12-04 17:03:13'),
(2, 'Nguỹen', 'Hoa', 'Nữ', 'Nguyenhoa@gmail.com', 'Ha noi', 'Long biên', '25 long biên', 145265564, '2018-12-05 05:21:28', '2018-12-04 17:21:28'),
(3, 'Trang', 'Nguyễn', 'Nữ', 'Trangin@gmail.com', 'Ha noi', 'Hoàng mai', 'Ngõ 55', 145265567, '2018-12-04 21:00:25', '2018-12-04 21:00:25');

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
(1, 9, 1, '2018-12-04 04:19:05', '2018-12-04 16:19:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_active` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `date_order`, `total`, `deal`, `payment`, `order_active`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-12-06', 4100000, 'Giao hàng trong ngày', NULL, 0, 'Gửi nhanh', '2018-12-05 05:03:13', '2018-12-04 17:03:13'),
(2, 2, 1, '2018-12-08', 1020000, 'Giao hàng trong ngày', NULL, 0, 'no', '2018-12-05 05:21:28', '2018-12-04 17:21:28'),
(3, 3, 1, '2018-12-07', 35585000, 'Giao hàng trong ngày', NULL, 0, 'Nhanh', '2018-12-04 21:00:25', '2018-12-04 21:00:25');

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
(1, 1, 3, 1, 230000, '2018-12-05 05:03:13', '2018-12-04 17:03:13'),
(2, 1, 2, 1, 220000, '2018-12-05 05:03:13', '2018-12-04 17:03:13'),
(3, 1, 7, 21, 300000, '2018-12-05 05:03:13', '2018-12-04 17:03:13'),
(4, 2, 11, 1, 200000, '2018-12-05 05:21:28', '2018-12-04 17:21:28'),
(5, 2, 12, 2, 250000, '2018-12-05 05:21:28', '2018-12-04 17:21:28'),
(6, 2, 13, 2, 220000, '2018-12-05 05:21:28', '2018-12-04 17:21:28'),
(7, 2, 18, 2, 400000, '2018-12-05 05:21:28', '2018-12-04 17:21:28'),
(8, 3, 13, 6, 220000, '2018-12-04 21:00:25', '2018-12-04 21:00:25'),
(9, 3, 12, 23, 250000, '2018-12-04 21:00:25', '2018-12-04 21:00:25'),
(10, 3, 11, 36, 200000, '2018-12-04 21:00:25', '2018-12-04 21:00:25'),
(11, 3, 18, 142, 400000, '2018-12-04 21:00:25', '2018-12-04 21:00:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `cate_id`, `category_name`, `product_remove`, `description`, `product_image`, `short_description`, `product_slug`, `product_active`, `created_at`, `updated_at`) VALUES
(1, 'Sơ mi nam UT 01', 3, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543937354somi_nam_23__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'so-mi-nam-ut-01', 0, '2018-12-04 03:29:14', NULL),
(2, 'Sơ mi nam UT 02', 3, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543937442somi_nam_25__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'so-mi-nam-ut-02', 0, '2018-12-04 03:30:42', NULL),
(3, 'Sơ mi nam UT 03', 3, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543937646somi_nam_24__1__500x750 (1).jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'so-mi-nam-ut-03', 0, '2018-12-04 03:34:06', NULL),
(4, 'Sơ mi nam UT 04', 3, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543937713somi_nam_26__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'so-mi-nam-ut-04', 0, '2018-12-04 03:35:13', NULL),
(5, 'Sơ mi nam UT 05', 3, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543937813somi_nam_23__1__thumb_400x600.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'so-mi-nam-ut-05', 0, '2018-12-04 03:36:53', NULL),
(6, 'HOODIE NAM 118003RD', 4, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543939773khoac_nam_7__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'hoodie-nam-118003rd', 0, '2018-12-04 03:38:49', '2018-12-04 04:09:34'),
(7, 'HOODIE NAM 128003RD', 4, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543939753khoac_nam_16__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'hoodie-nam-128003rd', 0, '2018-12-04 03:39:50', '2018-12-04 04:09:14'),
(8, 'HOODIE NAM 138003RD', 4, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543939739ao_khoac_nam_1__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'hoodie-nam-138003rd', 0, '2018-12-04 03:41:15', '2018-12-04 04:08:59'),
(9, 'HOODIE NAM 148003RD', 4, 2, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543939709ao_khoac_nam_20__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'hoodie-nam-148003rd', 0, '2018-12-04 03:42:33', '2018-12-04 04:08:29'),
(10, 'Sơ mi nữ UT 01', 5, 1, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938265somi_nu_3__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'so-mi-nu-ut-01', 0, '2018-12-04 03:44:26', '2018-12-04 03:47:22'),
(11, 'Sơ mi nữ UT 02', 5, 1, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938320somi_nu_1__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology.', 'so-mi-nu-ut-02', 0, '2018-12-04 03:45:21', NULL),
(12, 'Sơ mi nữ UT 03', 5, 1, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938501somi_nu_8__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology.', 'so-mi-nu-ut-03', 0, '2018-12-04 03:48:21', NULL),
(13, 'Sơ mi nữ UT 04', 5, 1, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938570somi_nu_9__1__thumb_400x600.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'so-mi-nu-ut-04', 0, '2018-12-04 03:49:30', NULL),
(14, 'Khoác nữ UT 01', 6, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938687khoac_nu_15__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology.', 'khoac-nu-ut-01', 0, '2018-12-04 03:51:27', NULL),
(15, 'Khoác nữ UT 02', 6, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938739ao_khoac_nu_3__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology.', 'khoac-nu-ut-02', 0, '2018-12-04 03:52:19', NULL),
(16, 'Khoác nữ UT 03', 6, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938779khoac_nu_16__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'khoac-nu-ut-03', 0, '2018-12-04 03:52:59', NULL),
(17, 'Khoác nữ UT 04', 6, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938815khoac_nu_15__1__thumb_400x600.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'khoac-nu-ut-04', 0, '2018-12-04 03:53:35', NULL),
(18, 'Đầm nữ UT 01', 7, 1, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938934dam_nu_20__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'dam-nu-ut-01', 0, '2018-12-04 03:55:34', NULL),
(19, 'Đầm nữ UT 02', 7, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543938994dam_nu_5__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technolog', 'dam-nu-ut-02', 0, '2018-12-04 03:56:34', NULL),
(20, 'Đầm nữ UT 03', 7, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543939054dam_nu_4__1__thumb_400x600.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'dam-nu-ut-03', 0, '2018-12-04 03:57:34', NULL),
(21, 'Đầm nữ UT 04', 7, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '1543939096dam_nu_2__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology', 'dam-nu-ut-04', 0, '2018-12-04 03:58:16', NULL),
(22, 'Áo khoác nữ N55', 6, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technologyMill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you', '1543985781khoac_nu_15__1__thumb_400x600.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.Mill Oil', 'ao-khoac-nu-n55', 0, '2018-12-05 04:56:21', NULL),
(23, 'Áo khoác nữ N60', 6, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.Mill Oil is an innovative oil filled radiator with the most modern technology.', '1543986430khoac_nu_16__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make', 'ao-khoac-nu-n60', 0, '2018-12-05 05:07:10', NULL),
(24, 'Áo khoác nũ N65', 6, 0, 0, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.\r\nMill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.\r\nMill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.\r\nMill Oil is an innovative oil filled radiator with the most modern technology', '1543986566khoac_nu_15__1__500x750.jpg', 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make', 'ao-khoac-nu-n65', 0, '2018-12-05 05:09:26', NULL);

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
(1, 22, '1543985781ao_khoac_nu_3__1__500x750.jpg', '2018-12-05 04:56:21', NULL),
(2, 22, '1543985781dam_nu_2__1__500x750 (1).jpg', '2018-12-05 04:56:21', NULL),
(3, 22, '1543985781dam_nu_4__1__thumb_400x600.jpg', '2018-12-05 04:56:21', NULL),
(4, 23, '1543986430dam_nu_4__1__thumb_400x600.jpg', '2018-12-05 05:07:10', NULL),
(5, 23, '1543986430khoac_nu_15__1__500x750.jpg', '2018-12-05 05:07:10', NULL),
(6, 23, '1543986430somi_nu_9__1__thumb_400x600.jpg', '2018-12-05 05:07:10', NULL),
(7, 24, '1543986566ao_khoac_nu_3__1__500x750.jpg', '2018-12-05 05:09:26', NULL),
(8, 24, '1543986566dam_nu_4__1__thumb_400x600.jpg', '2018-12-05 05:09:26', NULL),
(9, 24, '1543986566dam_nu_5__1__500x750.jpg', '2018-12-05 05:09:26', NULL);

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
(1, 1, 250000, NULL, 50, 0, 'chanel', 'Balan', 'Áo', 20, 0, 100, 'black', '2018-12-04 03:29:14', NULL),
(2, 2, 250000, 220000, 50, 0, 'chanel', 'Balan', 'Áo', 20, 0, 100, 'red', '2018-12-04 03:30:42', NULL),
(3, 3, 250000, 230000, 50, 0, 'dior', 'China', 'Áo', 20, 0, 100, 'random', '2018-12-04 03:34:06', NULL),
(4, 4, 250000, NULL, 50, 0, 'dior', 'China', 'Áo', 20, 0, 100, 'random', '2018-12-04 03:35:13', NULL),
(5, 5, 250000, NULL, 50, 0, 'louis vuitton', 'China', 'Áo', 20, 0, 100, 'black', '2018-12-04 03:36:53', NULL),
(6, 6, 300000, 250000, 50, 0, 'louis vuitton', 'China', 'Áo khoác', 50, 0, 100, 'gray', '2018-12-04 03:38:49', '2018-12-04 04:09:34'),
(7, 7, 300000, NULL, 50, 0, 'louis vuitton', 'China', 'Áo khoác', 50, 0, 100, 'red', '2018-12-04 03:39:50', '2018-12-04 04:09:14'),
(8, 8, 300000, NULL, 50, 0, 'chanel', 'China', 'Áo khoác', 50, 0, 100, 'green', '2018-12-04 03:41:15', '2018-12-04 04:08:59'),
(9, 9, 300000, 260000, 50, 0, 'balenciaga', 'China', 'Áo khoác', 50, 0, 100, 'black', '2018-12-04 03:42:33', '2018-12-04 04:08:29'),
(10, 10, 250000, NULL, 50, 0, 'chanel', 'China', 'Áo nữ', 20, 0, 100, 'random', '2018-12-04 03:44:26', '2018-12-04 03:47:22'),
(11, 11, 250000, 200000, 50, 0, 'chanel', 'China', 'Áo nữ', 20, 0, 100, 'random', '2018-12-04 03:45:21', NULL),
(12, 12, 250000, NULL, 50, 0, 'chanel', 'China', 'Áo', 20, 0, 100, 'random', '2018-12-04 03:48:21', NULL),
(13, 13, 250000, 220000, 50, 0, 'balenciaga', 'Thailan', 'Áo', 20, 0, 100, 'blue', '2018-12-04 03:49:30', NULL),
(14, 14, 400000, NULL, 50, 0, 'dior', 'China', 'Áo', 40, 0, 100, 'violet', '2018-12-04 03:51:27', NULL),
(15, 15, 400000, 350000, 0, 0, 'dior', 'China', 'Áo', 50, 0, 100, 'green', '2018-12-04 03:52:19', NULL),
(16, 16, 400000, 350000, 0, 0, 'dior', 'China', 'Áo', 50, 0, 100, 'blue', '2018-12-04 03:52:59', NULL),
(17, 17, 400000, NULL, 50, 0, 'dior', 'China', 'Áo', 50, 0, 100, 'random', '2018-12-04 03:53:35', NULL),
(18, 18, 400000, NULL, 50, 0, 'dior', 'China', 'Áo', 20, 0, 100, 'black', '2018-12-04 03:55:34', NULL),
(19, 19, 400000, 350000, 50, 0, 'chanel', 'China', 'Áo', 20, 0, 100, 'gray', '2018-12-04 03:56:34', NULL),
(20, 20, 400000, NULL, 0, 0, 'balenciaga', 'China', 'Áo', 20, 0, 100, 'random', '2018-12-04 03:57:34', NULL),
(21, 21, 400000, 350000, 50, 0, 'chanel', 'China', 'Áo', 20, 0, 100, 'black', '2018-12-04 03:58:16', NULL),
(22, 22, 500000, 400000, 50, 0, 'louis vuitton', 'China', 'Áo', 50, 0, 100, 'orange', '2018-12-05 04:56:21', NULL),
(23, 23, 500000, 400000, 50, 0, 'louis vuitton', 'China', 'Áo', 50, 0, 100, 'blue', '2018-12-05 05:07:10', NULL),
(24, 24, 500000, 400000, 50, 0, 'chanel', 'China', 'Áo', 50, 0, 100, 'gray', '2018-12-05 05:09:26', NULL);

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
(1, 'admin', NULL, 'admin', 'admin@gmail.com', '1543999737dam_nu_4__1__thumb_400x600.jpg', NULL, '$2y$10$6qKvp2dZoZFNTHdzD7q0futVERGJWCd.l7v8nDVVe7sM7ixPwGQa2', 2, 0, 'SGPXMQ9sPP0LCD7GnsgGy4E29vrMLIjy9pfmancBwxewCf9TW8KJtjsvelrM', NULL, '2018-12-05 08:48:57'),
(2, 'mod', 'ssss', 'mod', 'neunhuemlamay@gmail.com', '1544016260ao_khoac_nu_3__1__500x750.jpg', NULL, '$2y$10$eVS1.vhu3n.UPeZywhDstumm5duLUmSiekyDdfEnlN3WE1MT4lG0C', 1, 0, 'TZ14nGuPiUbNPiIu3cCsXAmTEfsIVRRYBGTux5D0yhU5atizbaUC6nUNuaTb', NULL, '2018-12-05 14:25:53'),
(3, 'mod1', NULL, 'mod1', 'clonebabi1@gmail.com', NULL, NULL, '$2y$10$mO/Khh0w9p..Eo7IVqRBEewXzU715hcGHsa/BtUmIDXYY9iWxYwtC', 1, 0, NULL, NULL, NULL);

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
(1, 1, 1656969355, 'Nam', 'Ha noi', 'Thanh xuân', '2018-12-05 07:23:34', '2018-12-05 07:23:34'),
(2, 2, 32123123, 'Nam', '3123123132', '1321321', '2018-12-05 09:12:05', '2018-12-05 09:33:10');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `baner_details`
--
ALTER TABLE `baner_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comments_reply`
--
ALTER TABLE `comments_reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `countpoin`
--
ALTER TABLE `countpoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `likeviews`
--
ALTER TABLE `likeviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_detailts`
--
ALTER TABLE `order_detailts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `products_image`
--
ALTER TABLE `products_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
