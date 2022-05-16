-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 16 2022 г., 11:12
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yeticave`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Доски и лыжи'),
(2, 'Крепления'),
(3, 'Ботинки'),
(4, 'Одежда'),
(5, 'Инструменты'),
(6, 'Разное');

-- --------------------------------------------------------

--
-- Структура таблицы `lot`
--

CREATE TABLE `lot` (
  `id_lot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_winner` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(250) NOT NULL,
  `start_price` int(11) NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `step_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lot`
--

INSERT INTO `lot` (`id_lot`, `id_user`, `id_category`, `id_winner`, `creation_date`, `name`, `description`, `image`, `start_price`, `date_end`, `step_price`) VALUES
(1, 1, 1, 1, '2022-05-16 09:24:08', '2014 Rossignol District Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'lot-1.jpg', 10999, '2022-05-17 09:24:08', 100),
(2, 2, 1, 2, '2022-05-16 09:27:27', 'DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'lot-2.jpg', 159999, '2022-05-17 09:27:27', 100),
(3, 1, 2, 1, '2022-05-16 09:30:30', 'Крепления Union Contact Pro 2015 года размер L/XL', 'f', 'lot-3.jpg', 8000, NULL, 100),
(4, 2, 3, 2, '2022-05-16 09:30:57', 'Ботинки для сноуборда DC Mutiny Charocal', 'a', 'lot-4.jpg', 10999, '2022-05-17 09:30:57', 100),
(5, 1, 4, 1, '2022-05-16 09:33:35', 'Куртка для сноуборда DC Mutiny Charocal', 'asdasd', 'lot-5.jpg', 7500, '2022-05-17 09:33:35', 100),
(6, 2, 6, 2, '2022-05-16 09:34:33', 'Маска Oakley Canopy', 'asfqweqwrzxczxczxczczxc', 'lot-6.jpg', 5400, '2022-05-17 09:34:33', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `steps`
--

CREATE TABLE `steps` (
  `id_steps` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lot` int(11) NOT NULL,
  `date_placement` datetime NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `steps`
--

INSERT INTO `steps` (`id_steps`, `id_user`, `id_lot`, `date_placement`, `sum`) VALUES
(1, 1, 1, '2022-05-16 09:36:17', 11099),
(2, 2, 1, '2022-05-16 09:41:51', 11199);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `date_register` datetime NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `contacts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `date_register`, `email`, `name`, `password`, `avatar`, `contacts`) VALUES
(1, '2022-05-16 09:20:05', 'prosyankin.vlad@yandex.ru', 'Владислав', 'asdafaraasdasd', 'asdasda', 'dasdasdasd'),
(2, '2022-05-16 09:30:05', 'koksmc2002@gmail.com', 'Дмитрий', 'zzzzzzzzzzz', 'ssssssss', 'qqqqqqqqqqqqq');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`id_lot`,`id_winner`) USING BTREE,
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_winner` (`id_winner`);

--
-- Индексы таблицы `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id_steps`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lot` (`id_lot`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `lot`
--
ALTER TABLE `lot`
  MODIFY `id_lot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `steps`
--
ALTER TABLE `steps`
  MODIFY `id_steps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `lot_ibfk_2` FOREIGN KEY (`id_winner`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_3` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `steps_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `steps_ibfk_2` FOREIGN KEY (`id_lot`) REFERENCES `lot` (`id_lot`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
