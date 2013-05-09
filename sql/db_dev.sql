-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-05-2013 a las 14:21:42
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merchant`
--

CREATE TABLE IF NOT EXISTS `merchant` (
  `merchant_id` varchar(15) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`merchant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `merchant_usn` varchar(12) NOT NULL DEFAULT '',
  `amount` int(12) NOT NULL,
  `nit` varchar(64) DEFAULT NULL,
  `trans_status` varchar(3) NOT NULL,
  `message` varchar(500) NOT NULL,
  `payment_type` varchar(1) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  PRIMARY KEY (`merchant_usn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
