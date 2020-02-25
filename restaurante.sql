-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-02-2020 a las 03:22:02
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

DROP TABLE IF EXISTS `comida`;
CREATE TABLE IF NOT EXISTS `comida` (
  `idComida` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `precio` double NOT NULL,
  `tipoComida` int(11) NOT NULL,
  PRIMARY KEY (`idComida`),
  KEY `tipoComida_idx` (`tipoComida`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`idComida`, `nombre`, `precio`, `tipoComida`) VALUES
(1, 'Ensalada cesar', 55, 1),
(2, 'papas a la francesa', 35, 3),
(3, 'Rib Eye con papas', 190, 4),
(4, 'New York a las hierbas', 210, 4),
(5, 'Pay de queso', 40, 6),
(6, 'Volcan de chocolate', 65, 6),
(7, 'Langosta en Vino blanco', 650, 5),
(8, 'Salmon a la naranja', 110, 5),
(9, 'Trucha salmonada al limon', 110, 5),
(10, 'Alitas', 6, 3),
(11, 'Pulpo encebollado', 145, 5),
(12, 'Ensalada Waldorf', 75, 1),
(13, 'Ensalda de aguacate', 75, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocomida`
--

DROP TABLE IF EXISTS `tipocomida`;
CREATE TABLE IF NOT EXISTS `tipocomida` (
  `idtipoComida` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `fotografia` text NOT NULL,
  PRIMARY KEY (`idtipoComida`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocomida`
--

INSERT INTO `tipocomida` (`idtipoComida`, `nombre`, `fotografia`) VALUES
(1, 'Ensalada', 'https://www.superama.com.mx/views/micrositio/recetas/images/comidasaludable/ensaladacesar/Web_fotoreceta.jpg'),
(3, 'Aperitivo', 'https://i.pinimg.com/originals/1e/0e/b2/1e0eb2768f7bfc0b3e9a0922c28392f5.jpg'),
(4, 'Carne', 'https://i2.esmas.com/2012/11/28/451881/receta-carne-ajo-cebolla--613x342.jpg'),
(5, 'Mariscos', 'https://sevilla.abc.es/gurme/wp-content/uploads/sites/24/2014/06/receta-pescado-plancha-960x540.jpg'),
(6, 'Postre', 'https://gourmetdemexico.com.mx/wp-content/uploads/2019/12/postres.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
