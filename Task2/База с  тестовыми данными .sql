-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.7:3306
-- Время создания: Авг 02 2022 г., 13:30
-- Версия сервера: 10.5.16-MariaDB-cll-lve-log
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `j99967854_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `path`) VALUES
(1, 'Продукты', 0, '0/'),
(2, 'Бытовая техника', 0, '0/'),
(3, 'Овощи', 1, '0/1/'),
(4, 'фрукты', 1, '0/1/'),
(5, 'Телевизоры', 2, '0/2/'),
(6, 'Пылесосы', 2, '0/2/'),
(7, 'Холодильники', 2, '0/2/'),
(8, 'Стиральные машины', 2, '0/2/'),
(9, 'переносной', 6, '0/2/6/'),
(10, 'стационарный', 6, '0/2/6/'),
(11, 'встраиваемый', 7, '0/2/7/'),
(12, 'отдельно стоящий', 7, '0/2/7/'),
(13, 'встраиваемая', 8, '0/2/8/');

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'белый'),
(2, 'черный'),
(3, 'зеленый'),
(4, 'серый'),
(5, 'желтый'),
(6, 'красный'),
(7, 'синий'),
(8, 'фиолетовый');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'LG'),
(2, 'samsung'),
(3, 'philips'),
(4, 'Еда каждый день'),
(5, 'Свежая редиска'),
(6, 'Фруктовый сад');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `company_id`) VALUES
(1, 'Беспроводной пылесос', 1),
(2, 'Проводной пылесос. Большая мощность', 1),
(3, 'Беспроводной пылесос', 2),
(4, 'Проводной пылесос. Большая мощность', 2),
(5, 'огурцы гладкие', 4),
(6, 'помидоры', 4),
(7, 'баклажаны', 5),
(8, 'редис', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `good_category`
--

CREATE TABLE `good_category` (
  `id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_category`
--

INSERT INTO `good_category` (`id`, `good_id`, `category_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `good_color`
--

CREATE TABLE `good_color` (
  `id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_color`
--

INSERT INTO `good_color` (`id`, `good_id`, `color_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 3, 3),
(8, 3, 5),
(9, 1, 3),
(10, 3, 7),
(11, 7, 8),
(12, 6, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `good_category`
--
ALTER TABLE `good_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `good_color`
--
ALTER TABLE `good_color`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `good_category`
--
ALTER TABLE `good_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `good_color`
--
ALTER TABLE `good_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
