-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 23 2021 г., 00:00
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hwphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_product` int NOT NULL,
  `id_session` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_product`, `id_session`, `quantity`, `id`) VALUES
(2, 'ped82u7mpg7mhahv045p3956fbka54ch', 13, 152),
(5, 'ped82u7mpg7mhahv045p3956fbka54ch', 1, 177),
(45, 'i1f61pvd5f869imeqoqvob71eq16967g', 18, 187);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `img_prod` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `veiws` int NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name_product`, `price`, `img_prod`, `veiws`, `description`) VALUES
(1, 'Pizza', 50, '1.jpg', 206, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.'),
(2, 'Apple', 1, '2.jpg', 45, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.'),
(5, 'Tea', 7, '5.jpg', 97, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, dolorum.'),
(7, 'Грибы', 30, 'boletus-badius31.jpg', 0, 'Лисички'),
(44, 'Киви', 123, 'kartinki-kivi-15.jpg', 0, 'Зеленый'),
(45, 'Катофель', 20, 'kartoshka-1.jpg', 0, 'красный'),
(51, 'Огурец', 40, 'c3e4a3c7d3b4dba1d7288d221d37f9bd.jpg', 0, 'Тепличный'),
(58, 'Памело', 124, 'tamozhennoe-oformlenie-pomelo-1.jpg', 0, 'врпилцу'),
(118, 'Миндаль', 250, 'dry_roasted__75819.1347439726.1280.1280-2.jpg', 0, 'Центральная'),
(122, 'Мандарины', 40, 'mandarin_02.jpg', 0, 'Астраханские'),
(125, 'Молоко', 435, 'moloko.jpg', 0, 'Коровье'),
(127, 'Арбуз', 250, '7d985897.jpg', 0, 'Астраханский');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `idfeed` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefeedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`idfeed`, `name`, `feedback`, `datefeedback`, `id`) VALUES
(4, 'Admin', 'Работает', ' 28 December 2020 02:04:07 AM', 0),
(5, 'Вася', 'Успехов в Новом Году!', ' 28 December 2020 02:04:46 AM', 0),
(10, 'Коля', 'CRUD работает!', ' 28 December 2020 03:08:11 PM', 0),
(25, 'NIKOLAI DAVYDOV', ' Вкусно', ' 16 January 2021 06:43:21 PM', 1),
(38, 'Малина', 'Свежая', ' 20 February 2021 12:22:57 AM', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `views` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `size`, `views`) VALUES
(40, '4.jpg', 310517, 33),
(42, '6.jpg', 141976, 91),
(43, '7.jpg', 1066328, 3),
(45, '5.jpg', 462708, NULL),
(46, '3.jpg', 493065, NULL),
(47, '2.jpg', 36767, NULL),
(48, '1.jpg', 274209, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `id_user` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` json NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `user_name`, `number`, `email`, `adress`, `products`, `status`, `sum_order`) VALUES
(6, '1', '123', '578940', 'range91111@gmail.com', 'Шубиных', '[{\"id\": \"139\", \"price\": \"30\", \"img_prod\": \"\", \"quantity\": \"1\", \"id_product\": \"7\", \"id_session\": \"ped82u7mpg7mhahv045p3956fbka54ch\", \"name_product\": \"Грибы\"}, {\"id\": \"140\", \"price\": \"50\", \"img_prod\": \"12.img\", \"quantity\": \"1\", \"id_product\": \"13\", \"id_session\": \"ped82u7mpg7mhahv045p3956fbka54ch\", \"name_product\": \"Молоко\"}, {\"id\": \"141\", \"price\": \"45\", \"img_prod\": null, \"quantity\": \"1\", \"id_product\": \"31\", \"id_session\": \"ped82u7mpg7mhahv045p3956fbka54ch\", \"name_product\": \"Торт\"}]', 'отменен', '125'),
(7, '0', NULL, NULL, NULL, NULL, '[{\"id\": \"179\", \"price\": \"7\", \"img_prod\": \"5.jpg\", \"quantity\": \"5\", \"id_product\": \"5\", \"id_session\": \"emfvjon6fi8f0dtlfnf29omcfn9d7a9v\", \"name_product\": \"Tea\"}, {\"id\": \"181\", \"price\": \"45\", \"img_prod\": null, \"quantity\": \"1\", \"id_product\": \"31\", \"id_session\": \"emfvjon6fi8f0dtlfnf29omcfn9d7a9v\", \"name_product\": \"Торт\"}]', 'подтвержден', '80'),
(9, '4', '123', '578940', 'range91111@gmail.com', 'Шубиных', '[{\"id\": \"182\", \"price\": \"7\", \"img_prod\": \"5.jpg\", \"quantity\": \"1\", \"id_product\": \"5\", \"id_session\": \"emfvjon6fi8f0dtlfnf29omcfn9d7a9v\", \"name_product\": \"Tea\"}, {\"id\": \"183\", \"price\": \"30\", \"img_prod\": \"\", \"quantity\": \"1\", \"id_product\": \"7\", \"id_session\": \"emfvjon6fi8f0dtlfnf29omcfn9d7a9v\", \"name_product\": \"Грибы\"}, {\"id\": \"184\", \"price\": \"50\", \"img_prod\": \"12.img\", \"quantity\": \"1\", \"id_product\": \"13\", \"id_session\": \"emfvjon6fi8f0dtlfnf29omcfn9d7a9v\", \"name_product\": \"Молоко\"}]', 'Удалить', '87');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$/lf/pL9Y77Q3fXDFIp7qNeg4/NAFz6M3D.JuIkFrjSrS8WpNkE6Vi', '13368561866022c1267870e5.02900549'),
(4, 'login', '$2y$10$8yrE5aymeCHOzaWQawc1qucyaqIbKWbgR7/gUkgMR5liwUWzNFbum', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idfeed`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_order` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idfeed` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
