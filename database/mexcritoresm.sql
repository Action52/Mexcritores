-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2017 a las 09:09:31
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mexcritoresm`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsers` ()  BEGIN
select * from usuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `username`, `password`, `tipo`, `email`, `fecha_creacion`, `activo`, `name`, `lastname`) VALUES
(1, 'GTIXJQJGZGHTMOZD', 'LuisLeon', '202cb962ac59075b964b07152d234b70', 0, 'leonvillapun@gmail.com', '2017-04-25 23:31:37', 0, 'Luis Alfredo', 'LeÃ³n VillapÃºn'),
(2, 'MTZHPTQFMCKCMXOT', 'Prueba1', '202cb962ac59075b964b07152d234b70', 0, 'leonvillapun@gmail.com', '2017-04-26 10:24:00', 0, 'Pr1', 'Pr1'),
(3, 'GXTSFHKXYPFKOSRI', 'Prueba1', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'leonvillapun@gmail.com', '2017-04-26 10:24:51', 0, 'Pr1', 'Pr1'),
(4, 'ZNBWZDMYHRBZYTFJ', 'Prueba1', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'leonvillapun@gmail.com', '2017-04-26 10:25:26', 0, 'Pr1', 'Pr1'),
(5, 'TFJHAFMTNIGXBCHI', 'Prueba1', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'leonvillapun@gmail.com', '2017-04-26 10:29:18', 0, 'Pr1', 'Pr1'),
(6, 'WUEUOBUDTTGSXNFX', 'Prueba1', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'leonvillapun@gmail.com', '2017-04-26 10:42:36', 0, 'Pr1', 'Pr1'),
(7, 'ZABEHLCGAIROAIXU', 'Prueba1', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'leonvillapun@gmail.com', '2017-04-26 10:43:32', 0, 'Pr1', 'Pr1'),
(8, 'BHUAKGYSYZRWTXGP', 'Prueba1', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'leonvillapun@gmail.com', '2017-04-26 10:49:29', 0, 'Pr1', 'Pr1'),
(9, 'RKJGMEJFXQYUEDRF', 'Acanto', '202cb962ac59075b964b07152d234b70', 1, 'acanto95@gmail.com', '2017-04-27 13:23:00', 0, 'Armando', 'Canto'),
(10, 'QXQZNAGMHOFUDEYP', 'Luis', '3d17514e3da75d06bf5ccaed068ba7da', 0, 'A01322275@itesm.mx', '2017-04-28 13:53:25', 1, 'Prueba2', 'Prueba2Ap');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `tipo`, `email`, `fecha_creacion`, `name`, `lastname`) VALUES
(1, 'Luis', '3d17514e3da75d06bf5ccaed068ba7da', 0, 'A01322275@itesm.mx', '2017-04-28 13:56:03', 'Prueba2', 'Prueba2Ap'),
(2, 'Luis', '3d17514e3da75d06bf5ccaed068ba7da', 0, 'A01322275@itesm.mx', '2017-04-28 13:58:00', 'Prueba2', 'Prueba2Ap'),
(3, 'Luis', '3d17514e3da75d06bf5ccaed068ba7da', 0, 'A01322275@itesm.mx', '2017-04-28 13:58:26', 'Prueba2', 'Prueba2Ap'),
(4, 'canto', '33f8ed752b4d35743e25aefc72dd8f9c', 2, 'canto@gmail.com', '2017-05-31 00:00:00', 'armando', 'c'),
(5, 'parker12', 'a21e718a34eebd585e9a26a2086dad7b', 1, 'MAIL', '2017-05-10 19:47:58', 'charlie', 'parker'),
(6, 'pene', '20d59b95948b67ce4cadaac4f7934b1a', 1, 'pene', '2017-05-10 19:56:52', 'pene', 'pene'),
(7, 'queso', '77a61869bc93b509efe6db6b282b19f6', 1, 'f', '2017-05-10 20:10:26', 'chupala', 'ch');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
