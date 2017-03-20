-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2017 at 03:49 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muro`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `Id` int(11) NOT NULL,
  `Texto` varchar(255) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdMensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`Id`, `Texto`, `IdUsuario`, `IdMensaje`) VALUES
(1, 'Pues yo detesto el chocolate', 12, 3),
(2, 'Yo también amo el chocolate', 12, 1),
(3, 'Na el caramelo es mejor', 13, 1),
(4, 'Pss, no seas dramático', 12, 4),
(5, 'O.o estabas en el desierto?', 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Texto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mensaje`
--

INSERT INTO `mensaje` (`Id`, `IdUsuario`, `Texto`) VALUES
(1, 12, 'El chocolate'),
(2, 12, 'El chocolate'),
(3, 12, 'El chocolate'),
(4, 13, 'El calor del desierto es increible'),
(5, 14, 'La belleza está en el corazón');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `created`, `modified`, `status`) VALUES
(11, 'asdfasdf', 'asdadsf@dfjkj.csd', '202cb962ac59075b964b07152d234b70', 'Male', '23423', '2017-03-19 20:06:25', '2017-03-19 20:06:25', '1'),
(12, 'Zoilo', 'zoiloismaelreyes1@gmail.com', 'b5e0484637a08701780122dc31eb81be', 'Male', '8096991872', '2017-03-19 20:06:58', '2017-03-19 20:06:58', '1'),
(13, 'Michael Perez', 'michaelperez@gmail.com', '0acf4539a14b3aa27deeb4cbdf6e989f', 'Male', '823882882', '2017-03-20 08:01:50', '2017-03-20 08:01:50', '1'),
(14, 'Rosa', 'RosaRosa@gmail.com', '8d11c2507f6accf367d4f10424405e35', 'Female', '89239132', '2017-03-20 08:29:13', '2017-03-20 08:29:13', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Comentario_Mensaje` (`IdMensaje`),
  ADD KEY `fk_Comentario_Usuario` (`IdUsuario`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_mensaje_usuario` (`IdUsuario`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_Comentario_Mensaje` FOREIGN KEY (`IdMensaje`) REFERENCES `mensaje` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comentario_Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_mensaje_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
