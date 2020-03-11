-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2020 at 11:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `comida`
--

DROP TABLE IF EXISTS `comida`;
CREATE TABLE IF NOT EXISTS `comida` (
  `idComida` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `precio` double NOT NULL,
  `tipoComida` int(11) NOT NULL,
  `fotografia` text NOT NULL,
  PRIMARY KEY (`idComida`),
  KEY `tipoComida_idx` (`tipoComida`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comida`
--

INSERT INTO `comida` (`idComida`, `nombre`, `precio`, `tipoComida`, `fotografia`) VALUES
(1, 'Filete', 200, 1, 'https://images-gmi-pmc.edge-generalmills.com/97a5957d-9400-42b3-a78b-5b808dc2964e.jpg'),
(2, 'bistec', 100, 1, 'https://dam.cocinafacil.com.mx/wp-content/uploads/2019/01/bistec-papas-aromaticas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

DROP TABLE IF EXISTS `tiket`;
CREATE TABLE IF NOT EXISTS `tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVenta` int(11) NOT NULL,
  `idcomida_2` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idVenta` (`idVenta`),
  KEY `idComida` (`idcomida_2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipocomida`
--

DROP TABLE IF EXISTS `tipocomida`;
CREATE TABLE IF NOT EXISTS `tipocomida` (
  `idtipoComida` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `fotografia` text NOT NULL,
  PRIMARY KEY (`idtipoComida`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipocomida`
--

INSERT INTO `tipocomida` (`idtipoComida`, `nombre`, `fotografia`) VALUES
(1, 'Carne', 'https://ichef.bbci.co.uk/news/410/cpsprodpb/3A14/production/_106486841_gettyimages-535786572.jpg'),
(2, 'Carne', 'https://ichef.bbci.co.uk/news/410/cpsprodpb/3A14/production/_106486841_gettyimages-535786572.jpg'),
(3, 'Carne', 'https://ichef.bbci.co.uk/news/410/cpsprodpb/3A14/production/_106486841_gettyimages-535786572.jpg'),
(4, 'Carne', 'https://ichef.bbci.co.uk/news/410/cpsprodpb/3A14/production/_106486841_gettyimages-535786572.jpg'),
(5, 'Carne', 'https://ichef.bbci.co.uk/news/410/cpsprodpb/3A14/production/_106486841_gettyimages-535786572.jpg'),
(6, 'Carne', 'https://ichef.bbci.co.uk/news/410/cpsprodpb/3A14/production/_106486841_gettyimages-535786572.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
