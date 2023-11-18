-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2023 a las 23:41:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcarritocompras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` bigint(20) NOT NULL,
  `cofecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idusuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcompra`, `cofecha`, `idusuario`) VALUES
(11, '2023-11-17 17:23:00', 27),
(12, '2023-11-17 17:27:01', 1),
(13, '2023-11-17 17:27:46', 1),
(14, '2023-11-17 17:42:44', 27),
(16, '2023-11-17 17:44:00', 27),
(17, '2023-11-17 19:24:30', 28),
(18, '2023-11-17 19:26:01', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestado`
--

CREATE TABLE `compraestado` (
  `idcompraestado` bigint(20) UNSIGNED NOT NULL,
  `idcompra` bigint(11) NOT NULL,
  `idcompraestadotipo` int(11) NOT NULL,
  `cefechaini` timestamp NOT NULL DEFAULT current_timestamp(),
  `cefechafin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compraestado`
--

INSERT INTO `compraestado` (`idcompraestado`, `idcompra`, `idcompraestadotipo`, `cefechaini`, `cefechafin`) VALUES
(12, 11, 5, '2023-11-17 17:23:00', '2023-11-17 17:26:34'),
(13, 11, 1, '2023-11-17 17:23:28', '2023-11-17 17:24:16'),
(14, 11, 2, '2023-11-17 17:24:16', '2023-11-17 17:26:34'),
(15, 11, 4, '2023-11-17 17:26:34', '0000-00-00 00:00:00'),
(16, 12, 5, '2023-11-17 17:27:01', '2023-11-17 17:28:08'),
(17, 12, 1, '2023-11-17 17:27:45', '0000-00-00 00:00:00'),
(18, 13, 5, '2023-11-17 17:27:46', '0000-00-00 00:00:00'),
(19, 12, 4, '2023-11-17 17:28:08', '0000-00-00 00:00:00'),
(20, 14, 5, '2023-11-17 17:42:44', '2023-11-17 17:47:23'),
(21, 14, 1, '2023-11-17 17:43:08', '2023-11-17 17:46:41'),
(24, 16, 5, '2023-11-17 17:44:00', '0000-00-00 00:00:00'),
(26, 14, 2, '2023-11-17 17:46:41', '0000-00-00 00:00:00'),
(27, 14, 4, '2023-11-17 17:47:23', '0000-00-00 00:00:00'),
(28, 17, 5, '2023-11-17 19:24:30', '2023-11-17 19:29:17'),
(29, 17, 1, '2023-11-17 19:24:52', '2023-11-17 19:27:06'),
(30, 18, 5, '2023-11-17 19:26:01', '0000-00-00 00:00:00'),
(31, 17, 2, '2023-11-17 19:27:06', '2023-11-17 19:29:17'),
(32, 17, 4, '2023-11-17 19:29:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestadotipo`
--

CREATE TABLE `compraestadotipo` (
  `idcompraestadotipo` int(11) NOT NULL,
  `cetdescripcion` varchar(50) NOT NULL,
  `cetdetalle` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compraestadotipo`
--

INSERT INTO `compraestadotipo` (`idcompraestadotipo`, `cetdescripcion`, `cetdetalle`) VALUES
(1, 'iniciada', 'cuando el usuario : cliente inicia la compra de uno o mas productos del carrito'),
(2, 'aceptada', 'cuando el usuario administrador da ingreso a uno de las compras en estado = 1 '),
(3, 'enviada', 'cuando el usuario administrador envia a uno de las compras en estado =2 '),
(4, 'cancelada', 'un usuario administrador podra cancelar una compra en cualquier estado y un usuario cliente solo en estado=1 '),
(5, 'carrito', 'Cuando el usuario cliente añade items al carrito(todavia no se compró)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraitem`
--

CREATE TABLE `compraitem` (
  `idcompraitem` bigint(20) UNSIGNED NOT NULL,
  `idproducto` bigint(20) NOT NULL,
  `idcompra` bigint(20) NOT NULL,
  `cicantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compraitem`
--

INSERT INTO `compraitem` (`idcompraitem`, `idproducto`, `idcompra`, `cicantidad`) VALUES
(7, 12, 11, 2),
(8, 12, 12, 1),
(9, 12, 14, 3),
(15, 13, 17, 1),
(16, 12, 18, 999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idmenu` bigint(20) NOT NULL,
  `menombre` varchar(50) NOT NULL COMMENT 'Nombre del item del menu',
  `medescripcion` varchar(124) NOT NULL COMMENT 'Descripcion mas detallada del item del menu',
  `idpadre` bigint(20) DEFAULT NULL COMMENT 'Referencia al id del menu que es subitem',
  `medeshabilitado` timestamp NULL DEFAULT current_timestamp() COMMENT 'Fecha en la que el menu fue deshabilitado por ultima vez'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `menombre`, `medescripcion`, `idpadre`, `medeshabilitado`) VALUES
(12, 'Cliente', 'Es el menú padre de la vista del cliente', NULL, NULL),
(13, 'Deposito', 'Este es el menú padre de los usuarios depósito', NULL, NULL),
(14, 'Administrador', 'Este es el menú padre de la vista de administradores', NULL, NULL),
(15, 'Administrar productos', 'Deposito/administrarProductos.php', 13, NULL),
(16, 'Agregar productos', 'Deposito/agregarProductos.php', 13, NULL),
(17, 'Cambiar stock', 'Deposito/cambiarStocks.php', 13, NULL),
(18, 'Listar usuarios', 'Administrador/listarUsuariosAdministrador.php', 14, NULL),
(19, 'Cambiar roles', 'Administrador/verRolesAdministrador.php', 14, NULL),
(20, 'Productos', 'Cliente/productos.php', 12, NULL),
(21, 'Carrito', 'Cliente/carrito.php', 12, NULL),
(24, 'Inicio', 'Cliente/index.php', 12, NULL),
(25, 'Inicio', 'Deposito/index.php', 13, NULL),
(26, 'Inicio', 'Administrador/index.php', 14, NULL),
(27, 'Configuracion', 'Cliente/configuracionUsuario.php', 12, NULL),
(28, 'Configuracion', 'Cliente/configuracionUsuario.php', 14, NULL),
(29, 'Configuracion', 'Cliente/configuracionUsuario.php', 13, NULL),
(30, 'Mis compras', 'Cliente/compras.php', 12, NULL),
(31, 'Administrar compras', 'Deposito/administrarCompras.php', 13, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menurol`
--

CREATE TABLE `menurol` (
  `idmenu` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menurol`
--

INSERT INTO `menurol` (`idmenu`, `idrol`) VALUES
(12, 3),
(13, 2),
(14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` bigint(20) NOT NULL,
  `pronombre` varchar(50) NOT NULL,
  `prodetalle` varchar(512) NOT NULL,
  `procantstock` int(11) NOT NULL,
  `proprecio` int(11) NOT NULL,
  `proimagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `pronombre`, `prodetalle`, `procantstock`, `proprecio`, `proimagen`) VALUES
(11, 'Party Animals (PC) Steam Key GLOBAL', '!Pelea contra tus amigos como perritos, gatitos y otras criaturas peludas en PARTY ANIMALS! Patea a tus amigos tanto online como offline. Interactúa con el mundo bajo nuestro motor de físicas realistas. ¿Ya mencioné PERRITOS?', 15, 25, 'party-animals.jpg'),
(12, 'Gang Beasts (PC) Steam Key GLOBAL', 'Gang Beasts es un desternillante juego multijugador de peleas absurdas entre personajes gelatinosos y gruñones que tienen lugar en los peligrosos entornos de las calles de la ciudad de Picadillo.', 68, 10, 'gang-beasts.jpeg'),
(13, 'Lies of P (PC) Steam Key GLOBAL', 'Lies of P es un soulslike trepidante que toma la conocida historia de Pinocho, le da la vuelta y la ubica en una belle époque elegante y oscura.', 43, 40, 'lies-of-p.jpg'),
(14, 'Resident Evil 6 Complete Steam Key GLOBAL', 'Con una mezcla de acción, terror y supervivencia, Resident Evil 6 promete ser la experiencia de terror dramático de 2013.', 98, 10, 're6.jpeg'),
(15, 'Resident Evil: Revelations Steam Key GLOBAL', 'La historia tiene lugar antes de los ataques bioterroristas en Kijuju y en Lanshiang, cuando la BSAA aún era una organización en desarrollo. Aborda con Jill Valentine un barco fantasma en el mar Mediterráneo en busca de su antiguo compañero, Chris Redfield. Descubre la verdad oculta tras la destrucción de una ciudad flotante. O juega al modo asalto y disfruta de una oleada de muertes en modo cooperativo en red con los amigos.', 40, 5, 'resident-evil-revelations.jpg'),
(16, 'Risk of Rain 2 Clave Steam GLOBAL', 'Lucha contra hordas de monstruos enloquecidos junto a tus amigos o en solitario para lograr escapar de un planeta alienígena sumido en el caos. Combina el botín de maneras asombrosas y domina cada personaje hasta encarnar la destrucción que tanto te aterraba tras tu primer aterrizaje forzoso.', 80, 9, 'risk-of-rain-2.jpeg'),
(17, 'Human Resource Machine Steam Key GLOBAL', 'Programa a oficinistas pequeñitos para que resuelvan puzles. ¡Conviértete en un empleado modelo! Vienen las máquinas... a quitarte el empleo.Del diseñador de World of Goo y el equipo responsable de Little Inferno.', 120, 6, 'human-resource-machine.jpeg'),
(18, 'The Binding of Isaac: Afterbirth (DLC) (PC) Steam ', 'The Binding of Isaac: Rebirth es un shooter RPG de acción generado aleatoriamente con fuertes elementos estilo Rogue. Siguiendo a Isaac en su viaje, los jugadores encontrarán extraños tesoros que cambiarán la forma de Isaac, dándole habilidades sobrehumanas y permitiéndole luchar contra hordas de criaturas misteriosas, descubrir secretos y luchar para llegar a un lugar seguro.', 0, 18, 'the-binding-of-isaac-afterbirth.jpeg'),
(19, 'Euro Truck Simulator 2 Titanium Edition (PC) Steam', '¡Viaja por Europa como el rey de la carretera, un camionero que entrega cargas importantes a distancias impresionantes! Con docenas de ciudades para explorar, tu resistencia, habilidad y velocidad serán llevadas al límite.', 10, 45, 'euro-truck-simulator-2.jpg'),
(20, 'Life is Strange (Complete Season) Steam Key GLOBAL', 'Life Is Strange es una aventura por episodios premiada y elogiada por la crítica que te permite retroceder en el tiempo y cambiar el pasado, el presente y el futuro.', 45, 20, 'life-is-strange.jpg'),
(21, 'Life is Strange: True Colors - Ultimate Steam Key', 'Alex Chen esconde su maldición: el poder de la empatía, la capacidad de absorber y manipular las emociones ajenas. Tras la muerte de su hermano, supuestamente accidental, Alex usa su poder para desentrañar la verdad que tanto tiempo lleva oculta.', 11, 35, 'life-is-strange-true-colors.jpg'),
(22, 'Beyond: Two Souls Steam Key GLOBAL', 'Beyond: Two Souls es una historia psicológica de acción y suspense que cuenta con las actuaciones de las estrellas de Hollywood Elliot Page y Willem Dafoe. Te embarcarás en un viaje trepidante alrededor del mundo, al jugar la extraordinaria vida de Jodie Holmes.', 25, 6, 'beyond-two-souls.jpeg'),
(23, 'Hollow Knight Código de Steam GLOBAL', '¡Forja tu propio camino en Hollow Knight! Una aventura épica a través de un vasto reino de insectos y héroes que se encuentra en ruinas. Explora cavernas tortuosas, combate contra criaturas corrompidas y entabla amistad con extraños insectos, todo en un estilo clásico en 2D dibujado a mano.	', 20, 10, 'hollow-knight.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `rodescripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rodescripcion`) VALUES
(1, 'Administrador'),
(2, 'Deposito'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` bigint(20) NOT NULL,
  `usnombre` varchar(50) NOT NULL,
  `uspass` varchar(32) NOT NULL,
  `usmail` varchar(50) NOT NULL,
  `usdeshabilitado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usnombre`, `uspass`, `usmail`, `usdeshabilitado`) VALUES
(1, 'Lautaro', '81dc9bdb52d04dc20036dbd8313ed055', 'alguien@ejemplo.com', NULL),
(27, 'Lautaro Gonzalez', '202cb962ac59075b964b07152d234b70', 'asd@a', NULL),
(28, 'estoEsUnaPrueba', '81dc9bdb52d04dc20036dbd8313ed055', 'prueba@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `idusuario` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuariorol`
--

INSERT INTO `usuariorol` (`idusuario`, `idrol`) VALUES
(1, 1),
(1, 2),
(1, 3),
(27, 3),
(28, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD UNIQUE KEY `idcompra` (`idcompra`),
  ADD KEY `fkcompra_1` (`idusuario`);

--
-- Indices de la tabla `compraestado`
--
ALTER TABLE `compraestado`
  ADD PRIMARY KEY (`idcompraestado`),
  ADD UNIQUE KEY `idcompraestado` (`idcompraestado`),
  ADD KEY `fkcompraestado_1` (`idcompra`),
  ADD KEY `fkcompraestado_2` (`idcompraestadotipo`);

--
-- Indices de la tabla `compraestadotipo`
--
ALTER TABLE `compraestadotipo`
  ADD PRIMARY KEY (`idcompraestadotipo`);

--
-- Indices de la tabla `compraitem`
--
ALTER TABLE `compraitem`
  ADD PRIMARY KEY (`idcompraitem`),
  ADD UNIQUE KEY `idcompraitem` (`idcompraitem`),
  ADD KEY `fkcompraitem_1` (`idcompra`),
  ADD KEY `fkcompraitem_2` (`idproducto`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`),
  ADD UNIQUE KEY `idmenu` (`idmenu`),
  ADD KEY `fkmenu_1` (`idpadre`);

--
-- Indices de la tabla `menurol`
--
ALTER TABLE `menurol`
  ADD PRIMARY KEY (`idmenu`,`idrol`),
  ADD KEY `fkmenurol_2` (`idrol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD UNIQUE KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `idrol` (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD PRIMARY KEY (`idusuario`,`idrol`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `compraestado`
--
ALTER TABLE `compraestado`
  MODIFY `idcompraestado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `compraitem`
--
ALTER TABLE `compraitem`
  MODIFY `idcompraitem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fkcompra_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraestado`
--
ALTER TABLE `compraestado`
  ADD CONSTRAINT `fk_compraestado_compra` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraestado_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraestado_2` FOREIGN KEY (`idcompraestadotipo`) REFERENCES `compraestadotipo` (`idcompraestadotipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraitem`
--
ALTER TABLE `compraitem`
  ADD CONSTRAINT `fk_compraitem_compra` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compraitem_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraitem_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraitem_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fkmenu_1` FOREIGN KEY (`idpadre`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menurol`
--
ALTER TABLE `menurol`
  ADD CONSTRAINT `fkmenurol_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmenurol_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `fkmovimiento_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
