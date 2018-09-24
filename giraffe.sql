-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 24 2018 г., 16:36
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `giraffe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adverts`
--

CREATE TABLE `adverts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `adverts`
--

INSERT INTO `adverts` (`id`, `title`, `description`, `author_id`, `datetime`) VALUES
(1, 'Объявление 1', 'Описание объявления 1', 1, '2018-09-19 21:28:14'),
(2, 'Объявление 2', 'Описание объявления 2', 1, '2018-09-19 21:28:14'),
(3, 'Объявление 3', 'описание объявления 3', 2, '2018-09-23 12:31:01'),
(4, 'Объявление 4', 'Описание объявления 4', 2, '2018-09-23 12:31:19'),
(5, 'объуявление 5', '5', 1, '2018-09-23 13:05:16'),
(6, 'объявление 6', '6', 1, '2018-09-23 13:05:30'),
(8, 'объявление 7', 'бла бла бла', 3, '2018-09-23 16:36:55'),
(9, 'объявление 7', 'бла бла бла', 1, '2018-09-23 16:37:55'),
(10, 'объявление 7', 'бла бла бла 88888ыурфукпкурпку88888ыурфукпкурпку88888ыу\r\nрфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88\r\n888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукп\r\nкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфук\r\nпкурпку88888ыурфукпкурпку88888ыурфукпкурпку88888ыурфу', 1, '2018-09-23 16:38:43'),
(11, 'объявление 7', 'бла бла бла', 2, '2018-09-23 18:57:37');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_active`) VALUES
(1, 'admin    ', '$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC', 'admin@example.com', 1),
(2, 'dima', '123', '123@example.com', 1),
(3, 'petya', '312', '312@example.com', 1),
(4, 'alloon', '$2y$13$Lxrnm9MfHZGE9a8ZhvvSUucLadhr1XdJEm68SXICEva8cGKV.XDJ2', 'stas.silin.01@gmail.com', 1),
(5, 'alina', '$2y$13$BnL6bkANwYRVzmYx54yPb.YaEdCV6b8h2rg9Ir4U878yVKZhnQqbC', 'alina@gmail.com', 1),
(6, 'aluna', '$2y$13$8.A1RVRen6RKNcSp8r2ibetReiq834mrlewKYbpsAotT.wnL9QQZi', 'alina12@gmail.com', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
