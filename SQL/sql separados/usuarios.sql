-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 01-06-2022 a las 00:32:08
-- Versión del servidor: 5.7.24
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `img` varchar(256) DEFAULT NULL,
  `biografia` varchar(256) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `unido` varchar(20) NOT NULL,
  `accion` int(11) NOT NULL DEFAULT '0' COMMENT 'para ver que hace primero el usuario\r\n1 = viaje\r\n2 = compra\r\n\r\n0 = ninguno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `email`, `telefono`, `nombre`, `apellido`, `img`, `biografia`, `password`, `unido`, `accion`) VALUES
(16, 'Fran', 'franco.valentino@est', 12345678, 'Franco', 'Cuesta', 'https://res.cloudinary.com/dmc55ugqh/image/upload/v1652801685/Declaration_of_War_zgazzn.jpg', 'holi soy franco', '123456', '17-05-2022', 0),
(31, 'johnny', 'johnny@gmail.com', 123456789, 'johnny', 'deep', 'https://res.cloudinary.com/dmc55ugqh/image/upload/v1652897862/lgvzr5tckatuyovjfqtt.webp', 'hola soy johnny', '123456', '17-05-2022', 0),
(32, 'nico', 'nico.escobar@utec.ed', 12345678, 'Xavier', 'Escobar', 'https://res.cloudinary.com/dmc55ugqh/image/upload/v1653006548/lw9run7i62bcztj1e36v.jpg', 'El Xavi', '123456', '20-05-2022', 0),
(33, 'rous', 'romilopez1@hotmail.e', 92956049, 'Romina', 'Lopez', 'https://res.cloudinary.com/dmc55ugqh/image/upload/v1653315237/spfgbppzewo6c6swjnyf.jpg', 'rous', '123456', '23-05-2022', 0),
(57, 'romina', 'romina.lopez@estudia', 92956049, 'Romina', 'Lopez', '', 'romina', '123456', '01-06-2022', 2);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `valor_cupon_pedido` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
IF NEW.accion = 1 THEN
BEGIN
DECLARE _id BIGINT;
SET _id = (SELECT u_from FROM cupones where u_recibe = NEW.id);
UPDATE cupones SET descuento = 420 WHERE u_recibe = _id;
END;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `valor_cupon_viaje` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
IF NEW.accion = 2 THEN
BEGIN
DECLARE _id BIGINT;
SET _id = (SELECT u_from FROM cupones where u_recibe = NEW.id);
UPDATE cupones SET descuento = 2100 WHERE u_recibe = _id;
END;
END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
