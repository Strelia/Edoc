-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 09 2016 г., 00:12
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `edoc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `passwords`
--

CREATE TABLE `passwords` (
  `id` int(10) UNSIGNED NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rdas`
--

CREATE TABLE `rdas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_rda` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_admin_services` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `register_admin_services`
--

CREATE TABLE `register_admin_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_package_doc_RDA` datetime NOT NULL,
  `reg_num_doc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rda_id` int(11) NOT NULL,
  `correspondent` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `snap_id` int(11) NOT NULL,
  `date_transmission_doc_snap` datetime NOT NULL,
  `snap_name_receiv_doc` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `returning_res_admin_services_snap` datetime DEFAULT NULL,
  `date_representatives_rda_doc` datetime DEFAULT NULL,
  `recipient_name_doc` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `snaps`
--

CREATE TABLE `snaps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_entity_providing_admin_services` text COLLATE utf8_unicode_ci NOT NULL,
  `name_admin_services` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `is_admin`) VALUES
(1, 'admin', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rdas`
--
ALTER TABLE `rdas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `register_admin_services`
--
ALTER TABLE `register_admin_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_admin_services_rda_id_index` (`rda_id`),
  ADD KEY `register_admin_services_snap_id_index` (`snap_id`);

--
-- Индексы таблицы `snaps`
--
ALTER TABLE `snaps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `rdas`
--
ALTER TABLE `rdas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `register_admin_services`
--
ALTER TABLE `register_admin_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `snaps`
--
ALTER TABLE `snaps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
