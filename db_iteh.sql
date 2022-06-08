-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 30 2022 г., 09:37
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_iteh`
--

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `ID_DEPARTMENT` int(10) NOT NULL,
  `chief` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`ID_DEPARTMENT`, `chief`) VALUES
(1, 'Daniel Smith\n'),
(2, 'Damon Collins\n'),
(3, 'Zayne Thompson\n');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `ID_projects` int(10) NOT NULL,
  `name` text NOT NULL,
  `manager` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`ID_projects`, `name`, `manager`) VALUES
(1, 'Lab1', 'Vlasta Lewis\n'),
(2, 'Lab2', 'Elias Sanders\n'),
(3, 'Lab3', 'Atlas Alexander\n'),
(4, 'Lab4', 'Nikhil Carter\n');

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

CREATE TABLE `work` (
  `FID_WORKER` int(10) NOT NULL,
  `FID_PROJECTS` int(10) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `work`
--

INSERT INTO `work` (`FID_WORKER`, `FID_PROJECTS`, `date`, `time_start`, `time_end`, `description`) VALUES
(1, 1, '2022-05-12', '10:00:00', '19:00:00', 'Download (1)'),
(2, 1, '2022-05-14', '07:00:00', '10:00:00', 'Start (2)'),
(3, 2, '2022-05-16', '20:00:00', '23:00:00', 'Process (1)'),
(5, 3, '2022-05-18', '10:00:00', '14:30:00', 'Process (1)'),
(6, 4, '2022-05-20', '09:20:00', '14:30:00', 'Start (1)'),
(6, 4, '2022-05-22', '09:20:00', '15:30:00', 'Process (2)'),
(7, 1, '2022-05-24', '14:00:00', '20:00:00', 'Process (3)'),
(8, 1, '2022-05-26', '15:00:00', '20:00:00', 'Finish(4)');

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `ID_WORKER` int(10) NOT NULL,
  `FID_DEPARTMENT` int(10) NOT NULL,
  `Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`ID_WORKER`, `FID_DEPARTMENT`, `Name`) VALUES
(1, 2, 'Phillip Alexander\nPh'),
(2, 2, 'Warren Wright\n'),
(3, 3, 'Fernando Nelson\n'),
(4, 3, 'Daxton Hayes\n'),
(5, 1, 'Ben Long\n'),
(6, 1, 'Adam Morgan\n');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID_DEPARTMENT`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID_projects`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`ID_WORKER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
