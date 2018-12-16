-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 16 2018 г., 19:32
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tabl`
--

-- --------------------------------------------------------

--
-- Структура таблицы `per_films`
--

CREATE TABLE `per_films` (
  `perid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `rej` varchar(30) NOT NULL,
  `time` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `per_ser`
--

CREATE TABLE `per_ser` (
  `perid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `years` varchar(15) NOT NULL,
  `num_s` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `top_films`
--

CREATE TABLE `top_films` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `year` int(5) NOT NULL,
  `rej` varchar(50) NOT NULL,
  `time` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `top_films`
--

INSERT INTO `top_films` (`id`, `name`, `year`, `rej`, `time`) VALUES
(1, 'Побег из Шоушинка', 1994, 'Фрэнк Дарабонт', 142),
(2, 'Зелёная миля', 1999, 'Фрэнк Дарабонт', 189),
(3, 'Бойцовский клуб', 1999, 'Дэвид Финчер', 131);

-- --------------------------------------------------------

--
-- Структура таблицы `top_ser`
--

CREATE TABLE `top_ser` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `years` varchar(10) NOT NULL,
  `num_s` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `top_ser`
--

INSERT INTO `top_ser` (`id`, `name`, `years`, `num_s`) VALUES
(1, 'Игра престолов', '2011-...', 67),
(2, 'Шерлок', '2010-...', 19),
(3, 'Доктор Хаус', '2004-2012', 177);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `top_films`
--
ALTER TABLE `top_films`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `top_ser`
--
ALTER TABLE `top_ser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `top_films`
--
ALTER TABLE `top_films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `top_ser`
--
ALTER TABLE `top_ser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
