-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2020 г., 22:49
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ml`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(200) NOT NULL,
  `sex` int(1) NOT NULL,
  `age` int(2) NOT NULL,
  `avgcheck` int(50) NOT NULL,
  `visits` int(50) NOT NULL,
  `child` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `sex`, `age`, `avgcheck`, `visits`, `child`) VALUES
(1, 1, 18, 600, 4, 1),
(2, 1, 32, 656, 2, 0),
(3, 0, 34, 1543, 6, 1),
(4, 0, 45, 2345, 4, 1),
(5, 1, 21, 890, 2, 0),
(6, 1, 25, 872, 3, 0),
(7, 1, 53, 2320, 1, 0),
(8, 1, 35, 1454, 3, 0),
(9, 1, 55, 1216, 7, 0),
(10, 1, 33, 1310, 1, 0),
(11, 1, 48, 493, 4, 1),
(12, 1, 50, 2429, 3, 0),
(13, 1, 44, 678, 10, 0),
(14, 1, 52, 2163, 3, 0),
(15, 0, 25, 2485, 6, 1),
(16, 0, 64, 697, 13, 0),
(17, 0, 45, 1211, 15, 0),
(18, 0, 57, 2463, 2, 1),
(19, 0, 18, 703, 11, 0),
(20, 0, 47, 599, 11, 1),
(21, 0, 54, 886, 6, 0),
(22, 0, 67, 1096, 9, 0),
(23, 0, 34, 682, 14, 1),
(24, 0, 22, 1162, 7, 0),
(25, 0, 65, 866, 14, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'Лукина Кристина Геласьевна'),
(2, 'Копылова Фаиза Геннадьевна'),
(3, 'Тихонов Святослав Альбертович'),
(4, 'Кудряшов Август Митрофанович'),
(5, 'Мухина Эмма Антоновна'),
(6, 'Прохорова Августа Дмитриевна'),
(7, 'Красильникова Виолетта Эдуардовна'),
(8, 'Федосеева Адель Ильяовна'),
(9, 'Егорова Кира Валерьевна'),
(10, 'Орехова Лейла Лаврентьевна'),
(11, 'Кузьмина Зинаида Андреевна'),
(12, 'Дорофеева Доля Валентиновна'),
(13, 'Васильева Каролина Наумовна'),
(14, 'Комиссарова Сильва Вадимовна'),
(15, 'Ширяев Абрам Михаилович'),
(16, 'Копылов Святослав Протасьевич'),
(17, 'Харитонов Ираклий Павлович'),
(18, 'Хохлов Дмитрий Владимирович'),
(19, 'Кононов Нинель Иосифович'),
(20, 'Князев Егор Филиппович'),
(21, 'Шарапов Пантелеймон Германнович'),
(22, 'Антонов Власий Феликсович'),
(23, 'Власов Осип Антонинович'),
(24, 'Колесников Станислав Валерьянович'),
(25, 'Ильин Гордей Фролович');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
