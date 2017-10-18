-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 18 2017 г., 00:51
-- Версия сервера: 5.5.25
-- Версия PHP: 5.6.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mebel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `rating+` int(4) NOT NULL,
  `rating-` int(4) NOT NULL,
  `id_statti` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `author`, `text`, `parent_id`, `avatar`, `date`, `img`, `video`, `rating+`, `rating-`, `id_statti`) VALUES
(1, 'maks', 'tex1', 0, '', '2017-10-04', '', '', 1, 0, 0),
(2, 'serg', 'text2', 0, '', '2017-10-06', '', '', 23, 3, 0),
(3, 'dima', 'tex3', 1, '', '0000-00-00', '', '', 32, 2, 0),
(4, 'ann', 'text4', 1, '', '0000-00-00', '', '', 234, 4, 0),
(5, 'serg', 'text5', 3, '', '0000-00-00', '', '', 2, 1, 0),
(6, 'serg', 'text6', 5, '', '0000-00-00', '', '', 0, 0, 0),
(7, 'serg', 'text7', 5, '', '0000-00-00', '', '', 0, 0, 0),
(8, 'serg', 'text 8', 3, '', '0000-00-00', '', '', 0, 0, 0),
(9, 'serg', 'text9', 3, '', '0000-00-00', '', '', 0, 0, 0),
(10, 'dima', 'text234', 0, '', '0000-00-00', '', '', 0, 0, 0),
(11, 'vera', 'text23', 0, '', '0000-00-00', '', '', 0, 0, 0),
(12, 'dgfd', 'gfd', 0, '', '0000-00-00', '', '', 0, 0, 0),
(13, '', '', 0, '', '0000-00-00', '', '', 0, 0, 0),
(14, '54354354', '654r655', 0, '', '0000-00-00', '', '', 0, 0, 0),
(15, 'rwerw', 'werer', 0, '', '0000-00-00', '', '', 0, 0, 0),
(16, 'w2e3r4', 'sscscsc', 0, '', '0000-00-00', '', '', 0, 0, 0),
(17, 'q1qw23e34r', 'cvxvxv', 0, '', '0000-00-00', '', '', 0, 0, 0),
(18, 'erwe', 'werw', 16, '', '0000-00-00', '', '', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
