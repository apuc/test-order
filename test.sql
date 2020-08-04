-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 04 2020 г., 14:31
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `price`) VALUES
(9, 10, 15),
(10, 11, 123),
(11, 11, 50),
(12, 11, 25),
(13, 11, 1125);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(55) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(55) NOT NULL,
  `fio` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `fio`) VALUES
(9, 'admin', '$2y$10$LMbjgGtfwFLAcONiaOum4.7ky05LrFp786R3Y.tw4ATvr8VCuOBk2', 'admin@gmail.com', 'Сергей Викторович Иванов'),
(10, 'admin1', '$2y$10$AqTaML4Lwlf11dv8jzALv.Uh6iXX0b6yM45VHWyVQeHbDa.KofhJO', 'admin1@gmail.com', 'Андрей Викторович Иванов'),
(11, 'user', '$2y$10$5bq5mdlqnkTQe72q6qAAYeVpdulXWltHt.HSaTvUBwfkhG7GTUZge', 'user@email.com', 'Андрей Андреевич Андреев'),
(12, 'user2', '$2y$10$Ei20MXGbvSvzprPBoIwNO.91yGOiZ5bs8jStQ1vLUx997YkKWT61S', 'user@email.com', 'Сергей Сергеевич Сергеев');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
