-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 27-05-2022 a las 17:18:54
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
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` bigint(20) NOT NULL,
  `viaje` bigint(20) NOT NULL,
  `pedido` bigint(11) NOT NULL,
  `comision` int(11) NOT NULL,
  `aceptada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `viaje`, `pedido`, `comision`, `aceptada`) VALUES
(8, 5, 18, 130, 0);

--
-- Disparadores `ofertas`
--
DELIMITER $$
CREATE TRIGGER `notificacion_nueva_oferta` AFTER INSERT ON `ofertas` FOR EACH ROW BEGIN
DECLARE _id BIGINT;
SET _id := (SELECT p.usuario FROM ofertas o JOIN pedidos p ON p.numero = o.pedido WHERE o.pedido=NEW.pedido);

INSERT INTO notificaciones (id_usuario,contenido) VALUES(_id,'Tiene una oferta sobre uno de sus pedidos');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `notificacion_oferta_aceptada` AFTER UPDATE ON `ofertas` FOR EACH ROW BEGIN
INSERT INTO notificaciones (id_usuario,contenido) VALUES(NEW.viajero,'Su oferta para el pedido '+NEW.pedido+' ha sido aceptada');
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_pedido` (`pedido`),
  ADD KEY `fk_viaje` (`viaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_viaje` FOREIGN KEY (`viaje`) REFERENCES `viaje` (`viaje_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
