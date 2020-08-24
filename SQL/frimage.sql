-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Aug 24. 01:42
-- Kiszolgáló verziója: 10.4.10-MariaDB
-- PHP verzió: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `frimage`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `path` text NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `images`
--

INSERT INTO `images` (`id`, `title`, `description`, `path`, `uploaded_date`) VALUES
(98, '1', '1', 'images/02 - August 2018 (myphotopack.com).jpg', '2020-08-08 22:40:23'),
(99, '2', '2', 'images/03 - December 2019 (myphotopack.com).jpg', '2020-08-08 22:41:46'),
(100, '3', '3', 'images/05 - December 2019 (myphotopack.com).jpg', '2020-08-08 23:51:26'),
(102, '12', '32', 'images/05 - April 2018 (myphotopack.com).jpg', '2020-08-11 20:19:34'),
(103, '33', '33', 'images/10 - January 2018 (myphotopack.com).jpg', '2020-08-11 20:19:45'),
(104, '33', '33', 'images/2 - November 2018 (myphotopack.com).jpg', '2020-08-11 20:22:27'),
(105, '44', '44', 'images/4 - November 2018 (myphotopack.com).jpg', '2020-08-11 20:22:36'),
(116, '23213', '12312312', 'images/03 - March 2020 (myphotopack.com).jpg', '2020-08-23 21:46:03');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(3, 'adee', 'adee024@gmail.com', 'admin', 'adee'),
(79, 'vts', 'adee024@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70'),
(80, 'admin', 'admin@admin.com', 'admin', 'admin'),
(81, 'adam', 'adam@vts.su.ac.rs', 'user', '202cb962ac59075b964b07152d234b70'),
(82, 'bencsik_adam13', 'adee024@gmail.com', 'user', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
