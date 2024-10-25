-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.235.124
-- Время создания: Окт 25 2024 г., 11:11
-- Версия сервера: 5.7.37-40
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a1042698_romanki`
--

DELIMITER $$
--
-- Функции
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `realty`
--

CREATE TABLE `realty` (
  `id` int(10) UNSIGNED NOT NULL,
  `custom_id` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rooms` int(10) UNSIGNED NOT NULL,
  `floor` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `residential_complex` smallint(5) UNSIGNED NOT NULL,
  `del` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `realty`
--

INSERT INTO `realty` (`id`, `custom_id`, `rooms`, `floor`, `price`, `description`, `residential_complex`, `del`) VALUES
(1, 'new_10501', 0, 0, 3850000, '', 1, 0),
(32, 'new_10505', 0, 0, 2900000, '', 3, 0),
(70, 'New_10542', 4, 4, 5100001, 'Бюджетная студия в центре', 4, 0),
(74, 'new_10549', 0, 0, 3850002, '', 3, 0),
(76, 'new_10551', 5, 5, 5100002, 'Двухкомнатная квартира', 4, 0),
(77, 'new_10552', 4, 4, 7560002, 'Просторная однокомнатная квартира с предчистовой отделкой', 5, 0),
(78, 'new_10553', 3, 3, 2900002, 'Двухкомнатная квартира с гардеробной', 5, 0),
(79, 'new_10554', 4, 4, 2900002, 'Двухкомнатная квартира с гардеробной', 5, 0),
(80, 'new_10555', 2, 2, 3500002, 'Шикарная трёхкомнатная квартира в центре', 1, 0),
(81, 'new_10556', 3, 3, 3850002, 'Бюджетная студия в центре', 1, 0),
(82, 'new_10557', 3, 3, 10550002, 'Бюджетная студия в центре', 2, 0),
(83, 'new_10558', 4, 4, 3850003, 'Двухкомнатная квартира', 3, 0),
(84, 'new_10559', 0, 0, 4780003, '', 3, 0),
(85, 'new_10560', 0, 0, 5100003, '', 4, 0),
(86, 'new_10561', 3, 3, 7560003, 'Двухкомнатная квартира с гардеробной', 5, 0),
(87, 'new_10562', 2, 2, 2900003, 'Шикарная трёхкомнатная квартира в центре', 5, 0),
(88, 'new_10563', 5, 5, 2900003, 'Бюджетная студия в центре', 5, 0),
(89, 'new_10564', 3, 3, 3500003, 'Бюджетная студия в центре', 1, 0),
(90, 'new_10565', 4, 4, 3850003, 'Двухкомнатная квартира', 1, 0),
(91, 'new_10566', 4, 4, 10550003, 'Просторная однокомнатная квартира с предчистовой отделкой', 2, 0),
(92, 'new_10567', 5, 5, 3850004, 'Двухкомнатная квартира с гардеробной', 3, 0),
(93, 'new_10568', 0, 0, 4780004, '', 3, 0),
(94, 'new_10569', 0, 0, 5100004, '', 4, 0),
(95, 'new_10570', 4, 4, 7560004, 'Бюджетная студия в центре', 5, 0),
(96, 'new_10571', 3, 3, 2900004, 'Бюджетная студия в центре', 5, 0),
(97, 'new_10572', 4, 4, 10550003, 'Бюджетная студия в центре', 2, 0),
(98, 'new_10573', 5, 5, 3850004, 'Двухкомнатная квартира', 3, 0),
(99, 'new_10574', 0, 0, 4780004, '', 3, 0),
(100, 'new_10575', 0, 0, 5100004, '', 4, 0),
(101, 'new_10576', 4, 4, 7560004, 'Двухкомнатная квартира с гардеробной', 5, 0),
(102, 'new_10577', 3, 3, 2900004, 'Шикарная трёхкомнатная квартира в центре', 5, 0),
(103, 'new_10578', 6, 6, 2900004, 'Бюджетная студия в центре', 5, 0),
(104, 'new_10579', 4, 4, 3500004, 'Бюджетная студия в центре', 1, 0),
(105, 'new_10580', 5, 5, 3850004, 'Двухкомнатная квартира', 1, 0),
(106, 'new_10581', 5, 5, 10550004, 'Просторная однокомнатная квартира с предчистовой отделкой', 2, 0),
(107, 'new_10582', 6, 6, 3850005, 'Двухкомнатная квартира с гардеробной', 3, 0),
(108, 'new_10583', 0, 0, 4780005, '', 3, 0),
(109, 'new_10584', 0, 0, 5100005, '', 4, 0),
(110, 'new_10585', 5, 5, 7560005, 'Бюджетная студия в центре', 5, 0),
(111, 'new_10586', 4, 4, 2900005, 'Бюджетная студия в центре', 5, 0),
(112, 'new_10587', 5, 5, 10550004, 'Бюджетная студия в центре', 2, 0),
(113, 'new_10588', 6, 6, 3850005, 'Двухкомнатная квартира', 3, 0),
(159, 'new_10502', 0, 0, 4780000, '', 1, 0),
(160, 'new_10503', 0, 0, 5100000, '', 2, 0),
(161, 'new_10506', 0, 0, 2900000, '', 4, 0),
(162, 'new_10508', 0, 0, 3850000, '', 5, 0),
(163, 'new_10509', 0, 0, 10550000, '', 5, 0),
(166, 'new_10510', 2, 2, 3850001, 'Двухкомнатная квартира с гардеробной', 1, 0),
(167, 'new_10511', 3, 3, 4780001, 'Шикарная трёхкомнатная квартира в центре', 1, 0),
(168, 'new_10512', 3, 3, 5100001, 'Бюджетная студия в центре', 2, 0),
(169, 'new_10513', 4, 4, 7560001, 'Бюджетная студия в центре', 3, 0),
(170, 'new_10514', 0, 0, 2900001, '', 3, 0),
(171, 'new_10515', 0, 0, 2900001, '', 4, 0),
(172, 'new_10516', 0, 0, 3500001, '', 5, 0),
(173, 'new_10517', 2, 2, 3850001, 'Двухкомнатная квартира с гардеробной', 5, 0),
(174, 'new_10518', 5, 5, 10550001, 'Шикарная трёхкомнатная квартира в центре', 5, 0),
(175, 'new_10519', 3, 3, 3850002, 'Бюджетная студия в центре', 1, 0),
(176, 'new_10520', 0, 0, 4780002, '', 1, 0),
(177, 'new_10521', 4, 4, 5100002, 'Двухкомнатная квартира', 2, 0),
(178, 'new_10522', 5, 5, 7560002, 'Просторная однокомнатная квартира с предчистовой отделкой', 3, 0),
(179, 'new_10523', 0, 0, 2900002, '', 3, 0),
(180, 'new_10524', 0, 0, 2900002, '', 4, 0),
(181, 'new_10525', 4, 4, 3500002, 'Шикарная трёхкомнатная квартира в центре', 5, 0),
(182, 'new_10526', 3, 3, 3850002, 'Бюджетная студия в центре', 5, 0),
(183, 'new_10527', 2, 2, 10550002, 'Бюджетная студия в центре', 5, 0),
(184, 'new_10528', 3, 3, 3850003, 'Двухкомнатная квартира', 1, 0),
(185, 'new_10529', 3, 3, 4780003, 'Просторная однокомнатная квартира с предчистовой отделкой', 1, 0),
(186, 'new_10530', 4, 4, 5100003, 'Двухкомнатная квартира с гардеробной', 2, 0),
(187, 'new_10531', 0, 0, 7560003, '', 3, 0),
(188, 'new_10532', 0, 0, 2900003, '', 3, 0),
(203, 'new_10504', 0, 0, 7560000, '', 3, 0),
(204, 'new_10507', 0, 0, 3500000, '', 5, 0),
(205, 'new_10533', 3, 3, 2900003, 'Бюджетная студия в центре', 4, 0),
(206, 'new_10534', 2, 2, 3500003, 'Бюджетная студия в центре', 5, 0),
(207, 'new_10535', 5, 5, 3850003, 'Двухкомнатная квартира', 5, 0),
(208, 'new_10536', 3, 3, 10550003, 'Просторная однокомнатная квартира с предчистовой отделкой', 5, 0),
(209, 'new_10537', 4, 4, 3850004, 'Двухкомнатная квартира с гардеробной', 1, 0),
(210, 'new_10538', 4, 4, 4780004, 'Просторная однокомнатная квартира с предчистовой отделкой', 1, 0),
(211, 'new_10539', 5, 5, 5100004, 'Двухкомнатная квартира с гардеробной', 2, 0),
(212, 'new_10540', 0, 0, 3850001, '', 3, 0),
(213, 'new_10541', 0, 0, 4780001, '', 3, 0),
(214, 'new_10543', 3, 3, 7560001, 'Бюджетная студия в центре', 5, 0),
(215, 'new_10544', 6, 6, 2900001, 'Двухкомнатная квартира', 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `realty_prepare`
--

CREATE TABLE `realty_prepare` (
  `id` int(10) UNSIGNED NOT NULL,
  `custom_id` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rooms` int(10) UNSIGNED NOT NULL,
  `floor` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `residential_complex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del` int(1) NOT NULL DEFAULT '0',
  `id1` int(50) NOT NULL,
  `rooms1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `complex_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `floor1` int(5) NOT NULL,
  `description1` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `residential_complexes`
--

CREATE TABLE `residential_complexes` (
  `id` int(10) UNSIGNED NOT NULL,
  `residential_complex` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `residential_complexes`
--

INSERT INTO `residential_complexes` (`id`, `residential_complex`) VALUES
(3, 'Адмиралтейский'),
(5, 'Акватория'),
(1, 'Альпийский'),
(4, 'Белые ночи'),
(2, 'Пушкин');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `realty`
--
ALTER TABLE `realty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residential_complex` (`residential_complex`),
  ADD KEY `custom_id` (`custom_id`);

--
-- Индексы таблицы `realty_prepare`
--
ALTER TABLE `realty_prepare`
  ADD PRIMARY KEY (`id1`),
  ADD KEY `id1` (`id1`);

--
-- Индексы таблицы `residential_complexes`
--
ALTER TABLE `residential_complexes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `residential_complex` (`residential_complex`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `realty`
--
ALTER TABLE `realty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT для таблицы `realty_prepare`
--
ALTER TABLE `realty_prepare`
  MODIFY `id1` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `residential_complexes`
--
ALTER TABLE `residential_complexes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
