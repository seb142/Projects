-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 jan 2017 kl 00:32
-- Serverversion: 5.7.11
-- PHP-version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `twittum`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `followee_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `followee_id`) VALUES
(1784, 8, 7),
(1769, 7, 8),
(1770, 6, 8),
(1772, 7, 6);

-- --------------------------------------------------------

--
-- Tabellstruktur `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet` varchar(140) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `tweet`, `created_at`) VALUES
(34, 6, 'tjosan', '2016-08-09 20:32:10'),
(35, 8, 'jag e bÃ¤st', '2016-08-09 20:32:38'),
(48, 7, 'jag Ã¤r hungrig', '2016-08-22 11:44:16'),
(33, 6, 'hejsan', '2016-08-09 20:31:54'),
(53, 8, 'asd', '2016-11-03 01:04:36'),
(54, 6, 'asd', '2016-11-03 19:38:35'),
(57, 7, 'asdasd', '2016-11-30 23:01:58'),
(65, 7, 'adsf', '2017-01-01 21:15:16'),
(64, 7, 'vhjg', '2016-12-20 18:43:12'),
(66, 21, 'asd', '2017-01-01 21:24:40');

-- --------------------------------------------------------

--
-- Tabellstruktur `userauth`
--

CREATE TABLE `userauth` (
  `id` int(11) NOT NULL,
  `hash` varchar(52) NOT NULL,
  `username` varchar(18) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(18) NOT NULL,
  `name` varchar(36) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` text,
  `gravatar_hash` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `gravatar_hash`) VALUES
(7, 'seb', 'seb', 'qweasd123', 'sdf@sdfg.se', NULL),
(6, 'h', 'h', 'h', 'h@h.h', NULL),
(8, 'j', 'j', 'j', 'j@j.j', NULL),
(21, 'janne', 'sennne', 'qweasd123', 'jan@gf.se', NULL),
(20, '', '', '', '', NULL),
(19, '', '', '', '', NULL),
(18, 'ANDOO', 'asd asd', 'asd', 'asd@asd.se', NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`,`user_id`);

--
-- Index för tabell `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`,`user_id`);

--
-- Index för tabell `userauth`
--
ALTER TABLE `userauth`
  ADD PRIMARY KEY (`id`,`hash`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1785;
--
-- AUTO_INCREMENT för tabell `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT för tabell `userauth`
--
ALTER TABLE `userauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
