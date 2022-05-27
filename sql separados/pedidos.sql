-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 27-05-2022 a las 17:18:24
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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `numero` bigint(20) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `link` varchar(256) DEFAULT NULL,
  `fecha_min` date NOT NULL,
  `fecha_max` date NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `estado` enum('activo','recibido','transito','pendiente') NOT NULL DEFAULT 'activo',
  `usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`numero`, `titulo`, `descripcion`, `precio`, `imagen`, `link`, `fecha_min`, `fecha_max`, `origen`, `destino`, `estado`, `usuario`) VALUES
(16, 'cafe', 'cafe', 250, 'https://res.cloudinary.com/dmc55ugqh/image/upload/v1653662408/wewq8yeyznfsz5seb1pi.png', '', '2022-05-27', '2022-06-03', 173976, 606452, 'activo', 31),
(17, 'cafe', 'cafe', 250, 'https://res.cloudinary.com/dmc55ugqh/image/upload/v1653662501/el7qsmrebnbuf7wt4vka.png', '', '2022-05-27', '2022-06-03', 132518, 769129, 'activo', 31),
(18, 'cafe', 'cafecito', 250, 'https://res.cloudinary.com/dmc55ugqh/image/upload/v1653663523/a5wky89436nksfmfn7wo.png', '', '2022-05-27', '2022-06-03', 606538, 132960, 'activo', 33);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `fk_usuario` (`usuario`),
  ADD KEY `fkorigen` (`origen`),
  ADD KEY `fkdestino` (`destino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `numero` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkdestino` FOREIGN KEY (`destino`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkorigen` FOREIGN KEY (`origen`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
