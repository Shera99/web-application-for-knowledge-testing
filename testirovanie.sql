-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2020 г., 20:28
-- Версия сервера: 5.5.61
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testirovanie`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` smallint(6) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `login`, `password`) VALUES
(1, 'Маматбеков Шерислам', 'admin', '00ba7ceab606427071d5d755ea99e976');

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(300) NOT NULL,
  `id_question` int(11) NOT NULL,
  `true_answer` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `answer`, `id_question`, `true_answer`) VALUES
(1, 'форматом данных', 1, '1'),
(2, 'наличием картографической проекции', 1, '0'),
(3, 'формой представления пространственной информации', 1, '0'),
(4, 'возможностями построения запросов', 1, '0'),
(5, 'использованием пространственных данных', 2, '1'),
(6, 'объемами данных', 2, '0'),
(7, 'ориентацией на описание Земли', 2, '0'),
(8, 'применением  специальных операционных систем', 2, '0'),
(9, 'Изучение Земли и объектов на ней без непосредственного контакта', 3, '1'),
(10, 'Изучение Земли с выездом на места исследования', 3, '0'),
(11, 'Изучение Земли с помощью измерительных приборов', 3, '0'),
(12, 'Полевые исследования объектов с выездом', 3, '0'),
(13, 'Цифровая форма  представления информациип', 4, '1'),
(14, 'аналоговая форма представления информации', 4, '0'),
(15, 'динамический характер процесса', 4, '0'),
(16, 'статический характер процесса', 4, '0'),
(17, 'Пространственные объекты', 5, '1'),
(18, 'пространственные распределения', 5, '0'),
(19, 'геоинформация', 5, '0'),
(20, 'геоинформационные модели', 5, '0'),
(21, 'Топологическая ', 6, '1'),
(22, 'Семантическая', 6, '0'),
(23, 'Геометрическая', 6, '0'),
(24, 'Изобразительная', 6, '0'),
(25, 'глобальные, региональные, местные', 7, '1'),
(26, 'территориальный охват, функциональные возможности, тематические характеристики', 7, '0'),
(27, 'двумерные, трехмерные, четырехмерные ГИС', 7, '0'),
(28, 'вьюеры, инструментальные, справочно-картографические ГИС', 7, '0'),
(29, 'учет пространственных отношений между объектами местности', 8, '1'),
(30, 'учет пространственных свойств  объектов местности', 8, '0'),
(31, 'учет типов пространственных объектов местности', 8, '0'),
(32, 'учет форм представления геоинформации', 8, '0'),
(33, 'Улучшение качества и подготовка к тематической обработке', 9, '1'),
(34, 'Получение информации из изображений', 9, '0'),
(35, 'Предварительное извлечение данных изображения', 9, '0'),
(36, 'Нанесение дополнительных данных в изображение', 9, '0'),
(37, 'формой  представления информации', 10, '1'),
(38, 'точностью координат', 10, '0'),
(39, 'объектами модели', 10, '0'),
(40, 'содержанием семантической информации', 10, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `check_users`
--

CREATE TABLE `check_users` (
  `id` smallint(6) NOT NULL,
  `full_name` varchar(125) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_end_time` varchar(20) NOT NULL,
  `test_date` datetime NOT NULL,
  `test_count_question` tinyint(4) NOT NULL,
  `test_true_question_count` tinyint(4) NOT NULL,
  `test_point` tinyint(4) NOT NULL,
  `test_true_point` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `check_users`
--

INSERT INTO `check_users` (`id`, `full_name`, `test_name`, `test_end_time`, `test_date`, `test_count_question`, `test_true_question_count`, `test_point`, `test_true_point`) VALUES
(20, 'Маматбеков Бекмамат', 'Иформатика', '0 мин : 41 сек', '2020-05-28 00:38:41', 10, 1, 25, 2.5),
(21, 'Авдалимбаев Бекжан', 'Иформатика', '0 мин : 57 сек', '2020-06-24 16:29:18', 10, 2, 25, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `test_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `question`, `test_id`) VALUES
(1, 'Что такое иформатика?', 1),
(2, 'Геоинформатика принципиально  отличается от общей информатики:', 1),
(3, 'Дистанционное исследование Земли – это', 1),
(4, 'Отметьте характеристики геоинформационного картографирования:', 1),
(5, 'Отметьте понятия,  относящиеся к базовым понятиям геоинформационного \r\nкартографирования:', 1),
(6, 'Какое содержание составных частей геоинформации?', 1),
(7, 'Назовите три основные варианта классификации ГИС?', 1),
(8, 'Что является главной отличительной особенностью  векторного \r\nтопологического формата?', 1),
(9, 'Предварительная обработка изображений – это', 1),
(10, 'Чем различаются цифровая модель местности и цифровая карта?', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` smallint(6) NOT NULL,
  `name` varchar(150) NOT NULL,
  `date_start_test` datetime NOT NULL,
  `date_end_test` datetime NOT NULL,
  `count_question` tinyint(4) NOT NULL,
  `count_time` tinyint(4) NOT NULL,
  `count_point` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `name`, `date_start_test`, `date_end_test`, `count_question`, `count_time`, `count_point`) VALUES
(1, 'Иформатика', '2020-06-24 11:00:00', '2020-06-29 23:59:00', 10, 10, 25),
(2, 'История', '2020-05-21 10:00:00', '2020-05-21 18:00:00', 5, 10, 5),
(3, 'Экономика', '2020-06-07 17:53:00', '2020-06-19 17:53:00', 25, 40, 50),
(4, 'Экономика', '2020-06-07 17:53:00', '2020-06-19 17:53:00', 25, 40, 50),
(5, 'Зоология', '2020-06-07 17:55:00', '2020-06-26 17:55:00', 10, 20, 20),
(6, 'фывфыв', '2020-06-07 18:02:00', '2020-06-18 18:02:00', 12, 12, 12),
(7, 'фывфыв', '2020-06-07 18:02:00', '2020-06-18 18:02:00', 12, 12, 12),
(8, '1212', '2020-06-07 18:25:00', '2020-06-19 18:25:00', 12, 12, 12),
(9, 'sdsdsd', '2020-06-07 18:26:00', '2020-06-27 18:26:00', 12, 12, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_question` (`id_question`);

--
-- Индексы таблицы `check_users`
--
ALTER TABLE `check_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `check_users`
--
ALTER TABLE `check_users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
