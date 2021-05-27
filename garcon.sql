-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 20:05:58
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `garcon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(20) NOT NULL,
  `numeroMesa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(20) NOT NULL,
  `id_producto` int(20) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `id_mesa` int(50) NOT NULL,
  `id_restaurante` int(50) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `foto` varchar(80) DEFAULT NULL COMMENT 'se va guardar la ruta del folder dond estan las imagenes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `usuario`, `nombre`, `apellidos`, `edad`, `descripcion`, `email`, `contrasena`, `foto`) VALUES
(1, 'yocristian21', 'Cristian Yamil', 'Ortega', 18, 'Dueño de del restorante \"la nueva esquina\"', 'yocristian21@gmail.com', 'd6b0ab7f1c8ab8f514db9a6d85de160a', 'img/yocristian21/foto1.jpg'),
(2, 'fabri21', 'fabricio', 'recchini', 25, 'Dueño del resto bar Antares.', 'fabri@gmail.com', 'contraseña', 'img/fabri21/perfil2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` int(20) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `stock` int(10) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `foto`, `stock`, `categoria`) VALUES
(3, 'hamburguesa doble', 'Descripcion: 2 medallones, queso, pan', 349, '../../public/img/carta/burger/burger_1.jpg', 0, 'hamburguesa'),
(4, 'hamburguesa triple', 'Descripcion: 3 medallones, queso, pan', 400, '../../public/img/carta/burger/burger_2.jpg', 11, 'hamburguesa'),
(5, 'hamburguesa premium', 'descripcion premium', 500, '../../public/img/carta/burger/burger_3.jpg', 5, 'hamburguesa'),
(6, 'hamburguesa garzon', 'descripcion de garzon', 400, '../../public/img/carta/burger/burger_4.jpg', 7, 'hamburguesa'),
(20, 'cerveza ipa', 'doble lopulo', 150, '../../public/img/carta/bebidas/coca_cola.jpg', 30, 'bebida'),
(30, 'muzzarela', 'queso muzzarela', 400, 'img/pizza/foto1.jpg', 32, 'pizza'),
(40, 'zingarella', 'flan con manzanas y bizcochuelo', 90, 'img/postres/foto1.jpg', 28, 'postre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `id_restaurante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varbinary(200) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_restaurante` (`id_restaurante`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id_restaurante`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id_restaurante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD CONSTRAINT `restaurante_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
