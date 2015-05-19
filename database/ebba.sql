-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 11 mars 2015 kl 19:28
-- Serverversion: 5.6.21
-- PHP-version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `ebba`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_05_123002_create_product_storages_table', 1),
('2015_03_05_123029_create_products_table', 1),
('2015_03_05_123038_create_storages_table', 1),
('2015_03_05_123826_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artnr` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantitypackage` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `productName`, `artnr`, `price`, `type`, `quantitypackage`, `created_at`, `updated_at`) VALUES
(1, 'Sotarn', 555, 20, 'stycksaker', 15, '2015-03-10 21:44:25', '2015-03-10 21:44:25'),
(2, 'Dublin', 4845, 20, 'stycksaker', 15, '2015-03-10 21:44:25', '2015-03-10 21:44:25'),
(3, 'Vanlij', 5847, 454, '5liter', 1, '2015-03-10 21:45:17', '2015-03-10 21:45:17'),
(4, 'strössel', 786, 655, 'torr', 45, '2015-03-10 21:45:17', '2015-03-10 21:45:17');

-- --------------------------------------------------------

--
-- Tabellstruktur `product_storages`
--

CREATE TABLE IF NOT EXISTS `product_storages` (
`id` int(10) unsigned NOT NULL,
  `storages_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `product_storages`
--

INSERT INTO `product_storages` (`id`, `storages_id`, `products_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, 20, '2015-03-10 21:49:43', '2015-03-10 21:49:43'),
(4, 1, 4, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 1, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 4, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `storages`
--

CREATE TABLE IF NOT EXISTS `storages` (
`id` int(10) unsigned NOT NULL,
  `storageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `storages`
--

INSERT INTO `storages` (`id`, `storageName`, `created_at`, `updated_at`) VALUES
(1, 'Huvudlager', '2015-03-10 21:45:53', '2015-03-10 21:45:53'),
(2, 'Bil1', '2015-03-10 21:45:53', '2015-03-10 21:45:53');

-- --------------------------------------------------------

--
-- Tabellstruktur `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`id` int(10) unsigned NOT NULL,
  `storage_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', 'admin@mail.com', '$2y$10$MY2GN8QnzEdGnpQXZXOF/.GF9OZqDQR.ai0Opw34KqMNrqWeP1fYi', NULL, '2015-03-10 20:42:47', '2015-03-10 20:42:47');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `product_storages`
--
ALTER TABLE `product_storages`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `storages`
--
ALTER TABLE `storages`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `product_storages`
--
ALTER TABLE `product_storages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT för tabell `storages`
--
ALTER TABLE `storages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `transactions`
--
ALTER TABLE `transactions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
