-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 25 2017 р., 17:38
-- Версія сервера: 5.5.45
-- Версія PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `data_base`
--

-- --------------------------------------------------------

--
-- Структура таблиці `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id_msg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(32) NOT NULL DEFAULT 'Гість',
  `user_id` int(10) NOT NULL,
  `msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп даних таблиці `chat`
--

INSERT INTO `chat` (`id_msg`, `user_login`, `user_id`, `msg`, `date`) VALUES
(6, 'User1', 96, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi eaque iusto libero, nobis quidem reprehenderit soluta? At distinctio dolore ducimus enim fuga, magni odit officiis, quaerat quisquam reprehenderit tenetur ullam?', '2017-09-25 08:44:19'),
(7, 'User2', 96, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi eaque iusto libero, nobis quidem reprehenderit soluta? At distinctio dolore ducimus enim fuga, magni odit officiis, quaerat quisquam reprehenderit tenetur ullam?', '2017-09-25 08:48:31'),
(11, 'User1', 96, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi eaque iusto libero, nobis quidem reprehenderit soluta? At distinctio dolore ducimus enim fuga, magni odit officiis, quaerat quisquam reprehenderit tenetur ullam?', '2017-09-25 09:06:37'),
(18, 'User2', 91, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi eaque iusto libero, nobis quidem reprehenderit soluta? At distinctio dolore ducimus enim fuga, magni odit officiis, quaerat quisquam reprehenderit tenetur ullam?', '2017-09-25 10:15:38'),
(19, 'User1', 105, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi eaque iusto libero, nobis quidem reprehenderit soluta? At distinctio dolore ducimus enim fuga, magni odit officiis, quaerat quisquam reprehenderit tenetur ullam?', '2017-09-25 10:36:05');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`, `user_email`) VALUES
(88, 'Admin', 'ef940e9f39109b5f32c4989c09f0b65b', 'oleg.ivanenko98@yandex.ru'),
(96, 'User1', '897c8fde25c5cc5270cda61425eed3c8', 'email1@gmail.com'),
(107, 'elbit', '273ce13a7996ff93dfe18d5d9d81782f', 'dfl@ff.ru'),
(108, 'westham4', 'ef940e9f39109b5f32c4989c09f0b65b', 'ivanenkoo.oleg.m@gmail.com'),
(106, 'User2', 'ef940e9f39109b5f32c4989c09f0b65b', 'email2@gmail.com'),
(104, 'westham', 'ef940e9f39109b5f32c4989c09f0b65b', 'ivanenko.oleg.m@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
