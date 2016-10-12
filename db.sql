-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 12 2016 г., 12:29
-- Версия сервера: 5.6.28-0ubuntu0.15.04.1
-- Версия PHP: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `TEST-HS17`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_date`, `ip`) VALUES
(1, 'Razvan Mihaiu', '', '$2y$10$20cdc0942c3439add37c9ucx0IRJEXt7LHryEPNVnF2R47Z6cnwoi', '2016-10-11 07:28:40', ''),
(6, 'admin test2', 'test@oxi.ro', 'test2', '2016-10-11 09:53:30', '91.196.38.29'),
(13, 'ara', 'ara.podosyan@zzzz.com', '$2y$10$56824650ec12177fff3e9uUGdTexv6WbMWzhB4Z1ePvJwwNG6QuXy', '2016-10-11 12:04:56', '91.196.38.29');

-- --------------------------------------------------------

--
-- Структура таблицы `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `guestbook`
--

INSERT INTO `guestbook` (`id`, `name`, `message`, `email`, `added`, `ip`) VALUES
(2, 'Ara2 Podosyan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis tellus non mattis ultricies. Morbi posuere molestie mauris, vitae dictum nisl vulputate ut. Donec facilisis metus vitae elit mollis gravida. Integer sed libero et lorem luctus interdum. Nulla non lorem ac leo egestas consequat nec eu tortor.', 'tttt@ttt.com', '2016-10-10 11:36:52', ''),
(5, 'Test2', 'Hello World! 2-3', 'test@test.com', '2016-10-10 11:54:41', ''),
(6, 'Razvan', 'test11-4', 'razvan@mihaiu.name', '2016-10-10 12:09:24', ''),
(7, 'Razvan', 'testing2 test 33', 'razvan@mihaiu.name', '2016-10-10 12:16:19', ''),
(10, 'test guestbook', 'test guestbook test guestbook test guestbook', 'test@oxi.ro', '2016-10-11 15:09:10', '91.196.38.29'),
(11, 'test1', 'hhe jjdjjjdjdj jdj djd', 'ssss@sddss.com', '2016-10-11 15:56:25', '91.196.38.29'),
(12, 'name2', 'Nulla semper feugiat dolor et feugiat. Maecenas pulvinar est id sagittis scelerisque. In sed velit a est bibendum fringilla. Integer sit amet diam ex. Curabitur hendrerit, eros a aliquet tempor, leo ante feugiat ex, sed consectetur risus est in nibh. Donec vel massa velit. Nunc vulputate nisi ac commodo bibendum. In vel porta lectus, a cursus nisl. Vestibulum id dolor nibh. Morbi id metus vestibulum, congue urna a, dignissim eros. Vivamu', 'gggg@asss.ccom', '2016-10-11 15:56:41', '91.196.38.29'),
(13, 'bgdfgdfg', 'eget quis nulla. Nunc risus nibh, faucibus ut tempor nec, suscipit eu ipsum. Fusce enim sem, laoreet non tempor vitae, ultricies ac lorem. Donec a turpis eu pur', 'fggfdgs@asdas.com', '2016-10-11 15:56:50', '91.196.38.29'),
(14, 'fffff', 'Maecenas pulvinar est id sagittis scelerisque. In sed velit a est bibendum fringilla. Integer sit amet diam ex. Curabitur hendrerit, eros a aliquet tempor, leo ante feugiat ex, sed consectetur risus est in nibh. Donec vel massa velit. Nunc vulputate nisi ac commodo bibendum. In vel porta lectus, a cursus nisl. Vestibulum id dolor nibh. Morbi id metus vestibulum, congue urna a, dignissim eros. Vivamus nec sem viverra, fringilla nunc id, ru', 'hghg@asdasc.com', '2016-10-11 15:56:58', '91.196.38.29'),
(15, 'fghfghf', 'porttitor justo vel diam tristique suscipit. Nulla facilisi. Ut fringilla orci nunc, vel semper orci ornare vitae. Nulla placerat lectus quis arcu lacinia, a placerat arcu rutrum. Sed sapien sem, elementum a pulvinar sit amet, malesuada nec quam. Pellentesque vulputate nisi sapien, in laoreet leo dignis', 'sfsdf@asd.adocm', '2016-10-11 15:57:05', '91.196.38.29'),
(16, 'gggg', 'dfgdfgfg', 'sss@sss.com', '2016-10-11 15:57:11', '91.196.38.29'),
(17, 'ffff', 'sss  aliquet tempor, leo ante feugiat ex, sed consectetur risus est in nibh. Donec vel massa velit. Nunc vulputate nisi ac commodo bibendum. In vel porta lectus, a', 'sss@sss.com', '2016-10-11 15:57:18', '91.196.38.29'),
(18, 'ghjhhhh', 'cu lacinia, a placerat arcu rutrum. Sed sapien sem, elementum a pulvinar sit amet, malesuada nec quam. Pellentesque vulputate nisi sapien, in laoreet leo dignissim nec. Nunc vitae tempus nulla. Proin a ligula eu erat sagittis efficitur. Donec non lacus purus. Nullam at ante sit amet mi posuere e2', 'sssss@asdsad.com', '2016-10-11 15:57:27', '91.196.38.29'),
(19, 'hhhhh', 'iquam, erat sodales egestas volutpat, tellus nulla pulvinar mauris, non condimentum massa enim non turpis. Donec tristique fermentum consequat. Aenean id mollis massa. Vestibulum scelerisque turpis a hendrerit ullamcorper. Vestibulum ultrices nibh sed dui eleifend, non luctus mass', 'ddddd@sssss.com', '2016-10-11 15:57:54', '91.196.38.29'),
(20, 'gggg', 'or justo vel diam tristique suscipit. Nulla facilisi. Ut fringilla orci nunc, vel semper orci ornare vitae. Nulla placerat lectus quis arcu lacinia, a placerat arcu rutrum. Sed sapien sem, elementum a pulvinar sit amet, malesuada nec quam. Pellentesque vulputate nisi sapien, in laoreet leo dignissi', 'ddd@asd.com', '2016-10-11 15:58:21', '91.196.38.29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guestbook`
--
ALTER TABLE `guestbook`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
