-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 20 2013 г., 20:16
-- Версия сервера: 5.6.12-log
-- Версия PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Структура таблицы `security`
--

CREATE TABLE IF NOT EXISTS `security` (
  `data_in` varchar(13) NOT NULL,
  `date_out` varchar(13) NOT NULL,
  `ip_in` varchar(15) NOT NULL,
  `ip_out` varchar(15) NOT NULL,
  `id_user` int(10) NOT NULL,
  `browser` varchar(20) NOT NULL,
  `browser_version` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `url_avatar` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reg` tinyint(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_book` int(10) NOT NULL,
  `hashcode` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
