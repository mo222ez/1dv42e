-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Värd: 193.17.218.177
-- Skapad: 13 maj 2013 kl 15:06
-- Serverversion: 5.5.29
-- PHP-version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `115456-1dv42e-ver1`
--

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `articlenr`, `category_id`, `tax_id`, `created_at`, `updated_at`) VALUES
(2, 'Dumle Klubba', 'Dumle Klubbor, klubban du inte kan vara utan!', '006.004.01', 6, 4, '2013-05-07 17:05:43', '2013-05-07 17:05:43'),
(3, 'Dunderklubba (Snusklubba)', 'Denna klubben är mkt bättre än snus!', '006.004.02', 6, 4, '2013-05-07 17:10:48', '2013-05-13 14:43:18'),
(4, 'Lakritspipor 8-pack', 'Bästa piporna på marknaden!', '004.006.01', 4, 4, '2013-05-07 17:16:48', '2013-05-07 17:16:48'),
(5, 'Banana Skids', 'Bananskalen som inte ska hamna på marken!', '007.003.01', 7, 4, '2013-05-07 17:23:02', '2013-05-07 17:23:02'),
(6, 'Atomic Fire Balls', 'Heta bollar som inte ska bitas på!', '001.009.01', 1, 4, '2013-05-07 17:25:12', '2013-05-07 17:25:12');

--
-- Dumpning av Data i tabell `productdetails`
--

INSERT INTO `productdetails` (`id`, `value`, `product_id`, `detailtype_id`, `created_at`, `updated_at`) VALUES
(2, '15', 2, 1, '2013-05-07 17:05:43', '2013-05-07 17:05:43'),
(3, '20', 3, 1, '2013-05-07 17:10:49', '2013-05-07 17:10:49'),
(4, '100', 4, 1, '2013-05-07 17:16:48', '2013-05-07 17:16:48'),
(5, '11', 5, 1, '2013-05-07 17:23:02', '2013-05-07 17:23:02'),
(6, '6', 6, 1, '2013-05-07 17:25:12', '2013-05-07 17:25:12');

--
-- Dumpning av Data i tabell `media`
--

INSERT INTO `media` (`id`, `name`, `product_id`, `mediatype_id`, `created_at`, `updated_at`) VALUES
(2, '5189184837ee4.jpg', 2, 1, '2013-05-07 17:05:44', '2013-05-07 17:05:44'),
(3, '51891979a3666.jpg', 3, 1, '2013-05-07 17:10:49', '2013-05-07 17:10:49'),
(4, '51891ae0eb7d5.jpg', 4, 1, '2013-05-07 17:16:49', '2013-05-07 17:16:49'),
(5, '51891c570d326.jpg', 5, 1, '2013-05-07 17:23:03', '2013-05-07 17:23:03'),
(6, '51891cda311c7.jpg', 6, 1, '2013-05-07 17:25:14', '2013-05-07 17:25:14');

--
-- Dumpning av Data i tabell `prices`
--

INSERT INTO `prices` (`id`, `value`, `product_id`, `pricetype_id`, `created_at`, `updated_at`) VALUES
(3, 2.00, 2, 1, '2013-05-07 17:05:43', '2013-05-07 17:05:43'),
(4, 4.00, 2, 2, '2013-05-07 17:05:43', '2013-05-07 17:05:43'),
(5, 1.00, 3, 1, '2013-05-07 17:10:49', '2013-05-07 17:10:49'),
(6, 4.00, 3, 2, '2013-05-07 17:10:49', '2013-05-07 17:10:49'),
(7, 10.00, 4, 1, '2013-05-07 17:16:48', '2013-05-07 17:16:48'),
(8, 20.00, 4, 2, '2013-05-07 17:16:48', '2013-05-07 17:16:48'),
(9, 0.00, 5, 1, '2013-05-07 17:23:02', '2013-05-07 17:23:02'),
(10, 2.00, 5, 2, '2013-05-07 17:23:02', '2013-05-07 17:23:02'),
(11, 0.00, 6, 1, '2013-05-07 17:25:12', '2013-05-07 17:25:12'),
(12, 1.00, 6, 2, '2013-05-07 17:25:12', '2013-05-07 17:25:12');

--
-- Dumpning av Data i tabell `stocks`
--

INSERT INTO `stocks` (`id`, `value`, `product_id`, `created_at`, `updated_at`) VALUES
(2, '100', 2, '2013-05-07 17:05:44', '2013-05-07 17:05:44'),
(3, '52', 3, '2013-05-07 17:10:49', '2013-05-13 14:43:18'),
(4, '25', 4, '2013-05-07 17:16:48', '2013-05-07 17:16:48'),
(5, '100', 5, '2013-05-07 17:23:02', '2013-05-07 17:23:02'),
(6, '25', 6, '2013-05-07 17:25:12', '2013-05-07 17:25:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
