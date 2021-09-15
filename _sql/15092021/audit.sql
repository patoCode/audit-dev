-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2021 a las 22:48:32
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `audit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_actividad`
--

CREATE TABLE `aud_actividad` (
  `ID_ACTIVIDAD` int(11) NOT NULL,
  `ID_CLI_ACT` int(11) DEFAULT NULL,
  `MES_CIERRE` int(11) NOT NULL,
  `ACTIVIDAD` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ACTIVIDAD_ECONOMICA` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO_SIN` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO_SISTEMA` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_actividad`
--

INSERT INTO `aud_actividad` (`ID_ACTIVIDAD`, `ID_CLI_ACT`, `MES_CIERRE`, `ACTIVIDAD`, `CODIGO`, `ACTIVIDAD_ECONOMICA`, `CODIGO_SIN`, `CODIGO_SISTEMA`, `USER_REG`, `FECHA_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(1, NULL, 6, 'Actividad demo', 'Actividad demo', 'Actividad demo', 'Actividad demo', 'dsa', 'dsa', '2021-09-10 18:08:20', 'user', '2021-09-16 01:51:20', 'activo', 'dsadsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_archivo`
--

CREATE TABLE `aud_archivo` (
  `ID_ARCHIVO` int(11) NOT NULL,
  `PATH` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NOMBRE` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_certificados`
--

CREATE TABLE `aud_certificados` (
  `ID_CERTIFICADO` int(11) NOT NULL,
  `CERTIFICADO` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ID_INSTITUCION` int(11) NOT NULL,
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_certificados`
--

INSERT INTO `aud_certificados` (`ID_CERTIFICADO`, `CERTIFICADO`, `CODIGO`, `ID_INSTITUCION`, `USER_REG`, `FECHA_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(1, 'NUmero de identificacion tributaria', '100', 1, '#DENIS', '2021-09-15 18:39:40', '#DENIS', '2021-09-16 00:39:38', 'activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_ciudad`
--

CREATE TABLE `aud_ciudad` (
  `ID_PAIS` int(11) NOT NULL,
  `ID_CIUDAD` int(11) NOT NULL,
  `CIUDAD` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `BANDERA` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO_CIUDAD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_ciudad`
--

INSERT INTO `aud_ciudad` (`ID_PAIS`, `ID_CIUDAD`, `CIUDAD`, `BANDERA`, `CODIGO_CIUDAD`, `FECHA_REG`, `USER_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(2, 1, 'Cochabamba', 'fas fa-cog', 'CBA', '2021-09-15 16:10:43', '#DEINS', '#DEINS', '2021-09-15 22:10:39', 'activo', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_cliente`
--

CREATE TABLE `aud_cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_SOCIEDAD` int(11) NOT NULL,
  `ID_PAIS` int(11) DEFAULT NULL,
  `ID_CIUDAD` int(11) NOT NULL,
  `NIT` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `RAZON_SOCIAL` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PROPIETARIO_REP_LEGAL` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CELULAR_REP_LEGAL` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `CONTACTO` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `EMAIL` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO_CLIENTE` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CI` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `EXPEDIDO_EN` int(11) NOT NULL,
  `TELEFONO_DOM` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `ZONA` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `DIRECCION_BASE` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `FOTO` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_cliente`
--

INSERT INTO `aud_cliente` (`ID_CLIENTE`, `ID_SOCIEDAD`, `ID_PAIS`, `ID_CIUDAD`, `NIT`, `RAZON_SOCIAL`, `PROPIETARIO_REP_LEGAL`, `CELULAR_REP_LEGAL`, `CONTACTO`, `EMAIL`, `CODIGO_CLIENTE`, `CI`, `EXPEDIDO_EN`, `TELEFONO_DOM`, `ZONA`, `DIRECCION_BASE`, `FOTO`, `FECHA_REG`, `USER_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(3, 1, 1, 1, '1231213', 'LOCALHOST', NULL, '', 'Juan', 'juan@juan.com', '001', '123123', 1, '', '', '', NULL, '2021-09-15 15:53:32', NULL, 'dsads', '2021-09-01 04:00:00', 'activo', NULL),
(4, 2, 1, 2, '1081635017', 'TATIANA BEATRIZ CASTILLO ENCINAS', 'Juan', '', NULL, NULL, 'PRV-08755', '1081635', 2, '', '', '', NULL, '2021-09-15 20:06:28', NULL, 'DENIS', '2021-09-16 02:06:25', 'activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_cliente_actividad`
--

CREATE TABLE `aud_cliente_actividad` (
  `ID_CLI_ACT` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_ACTIVIDAD` int(11) NOT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_cliente_archivo`
--

CREATE TABLE `aud_cliente_archivo` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_ARCHIVO` int(11) NOT NULL,
  `ID_CLI_ARCHIVO` int(11) NOT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_cliente_certificado`
--

CREATE TABLE `aud_cliente_certificado` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_CERTIFICADO` int(11) NOT NULL,
  `ID_CLI_CERT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_cliente_empresa`
--

CREATE TABLE `aud_cliente_empresa` (
  `ID_EMPRESA` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_CLI_EMP` int(11) NOT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_cliente_obligacion`
--

CREATE TABLE `aud_cliente_obligacion` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_PERIODO` int(11) NOT NULL,
  `ID_OBLIGACION` int(11) NOT NULL,
  `ID_CLI_OBL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_cliente_regimen`
--

CREATE TABLE `aud_cliente_regimen` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_REGIMEN` int(11) NOT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_cliente_regimen`
--

INSERT INTO `aud_cliente_regimen` (`ID_CLIENTE`, `ID_REGIMEN`, `ESTADO_REG`, `ESTADO`, `USER_REG`, `FECHA_REG`, `FECHA_MOD`, `USER_MOD`) VALUES
(3, 1, 'vigente', 'activo', NULL, '2021-09-15 15:01:06', '0000-00-00 00:00:00', NULL),
(3, 1, 'vigente', 'activo', NULL, '2021-09-15 15:01:09', '2021-09-15 14:33:01', NULL),
(4, 1, NULL, NULL, NULL, '2021-09-15 19:57:56', '2021-09-15 19:57:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_direccion`
--

CREATE TABLE `aud_direccion` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_DIRECCION` int(11) NOT NULL,
  `DIRECCION` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ZONA` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `BARRIO` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `_DEFAULT` char(1) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_empresa`
--

CREATE TABLE `aud_empresa` (
  `ID_EMPRESA` int(11) NOT NULL,
  `NOMBRE` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `SIGLA` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TELEFONO_FIJO` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TELEFONO_CEL` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PAGINA_WEB` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `EMAIL` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `RESPONSABLE` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CI` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NIT` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LOGO` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_institucion`
--

CREATE TABLE `aud_institucion` (
  `ID_INSTITUCION` int(11) NOT NULL,
  `INSTITUCION` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `SIGLA` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `CODIGO` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_REG` int(11) NOT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `USER_MOD` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `ESTADO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'activo',
  `ESTADO_REG` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_institucion`
--

INSERT INTO `aud_institucion` (`ID_INSTITUCION`, `INSTITUCION`, `SIGLA`, `CODIGO`, `USER_REG`, `FECHA_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(1, 'IMPUESTOS', 'SIN', 'SIN', 0, '2021-09-16 00:32:16', '', '2021-09-15 18:34:42', 'activo', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_obligacion_tributaria`
--

CREATE TABLE `aud_obligacion_tributaria` (
  `ID_PERIODO` int(11) NOT NULL,
  `ID_OBLIGACION` int(11) NOT NULL,
  `NOMBRE_SIN` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DESCRIPCION` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FORMULARIO` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_obligacion_tributaria`
--

INSERT INTO `aud_obligacion_tributaria` (`ID_PERIODO`, `ID_OBLIGACION`, `NOMBRE_SIN`, `DESCRIPCION`, `FORMULARIO`, `USER_REG`, `FECHA_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(1, 1, 'IVA', 'Descripcion IVA', '200', NULL, '2021-09-15 18:21:41', 'user', '2021-09-16 00:21:37', 'activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_pais`
--

CREATE TABLE `aud_pais` (
  `ID_PAIS` int(11) NOT NULL,
  `PAIS` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `BANDERA` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO_PAIS` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_pais`
--

INSERT INTO `aud_pais` (`ID_PAIS`, `PAIS`, `BANDERA`, `CODIGO_PAIS`, `FECHA_REG`, `USER_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(1, 'Argentina', 'fas fa-cog', 'ARG', '2021-09-15 16:07:43', '#DEINS', '#DEINS', '2021-09-15 22:07:36', 'activo', 'vigente'),
(2, 'Bolivia', 'fa fa-cog', 'BO', '2021-09-15 16:10:30', '#DEINS', '#DEINS', '2021-09-15 22:09:56', 'activo', 'vigente'),
(3, 'BRASIL', 'sdasa', 'BR', '2021-09-15 16:10:35', '#DEINS', '#DEINS', '2021-09-15 22:10:02', 'activo', 'vigente'),
(4, 'Paraguay', 'sss', 'PR', '2021-09-15 16:10:36', '#DEINS', '#DEINS', '2021-09-15 22:10:06', 'activo', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_periodo`
--

CREATE TABLE `aud_periodo` (
  `ID_PERIODO` int(11) NOT NULL,
  `PERIODO` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO_PERIODO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_periodo`
--

INSERT INTO `aud_periodo` (`ID_PERIODO`, `PERIODO`, `FECHA_REG`, `USER_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`, `CODIGO_PERIODO`) VALUES
(1, 'MENSUAL', '2021-09-15 18:19:46', '#DEINS', '#DEINS', '2021-09-15 22:07:26', 'activo', 'vigente', 'ENERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_regimen`
--

CREATE TABLE `aud_regimen` (
  `ID_REGIMEN` int(11) NOT NULL,
  `REGIMEN` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_regimen`
--

INSERT INTO `aud_regimen` (`ID_REGIMEN`, `REGIMEN`, `FECHA_REG`, `USER_REG`, `USER_MOD`, `FECHA_MOD`, `ESTADO`, `ESTADO_REG`) VALUES
(1, 'Regimen 1', '2021-09-15 15:58:58', 'user', 'user', '2021-09-15 21:54:33', 'activo', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_reg_actividad`
--

CREATE TABLE `aud_reg_actividad` (
  `ID` int(11) NOT NULL,
  `CODIGO_ACTIVIDAD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REGISTRO` date DEFAULT NULL,
  `PERIODO_VENCIMIENTO_DIAS` int(11) DEFAULT NULL,
  `NIT` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_sociedad`
--

CREATE TABLE `aud_sociedad` (
  `ID_SOCIEDAD` int(11) NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `SOCIEDAD` varchar(550) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `CODIGO_SOCIEDAD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aud_sociedad`
--

INSERT INTO `aud_sociedad` (`ID_SOCIEDAD`, `ID_CLIENTE`, `SOCIEDAD`, `ESTADO_REG`, `ESTADO`, `FECHA_REG`, `USER_REG`, `USER_MOD`, `FECHA_MOD`, `CODIGO_SOCIEDAD`) VALUES
(1, NULL, 'Privada', 'vigente', 'activo', '2021-09-15 16:01:57', 'user', 'user', '2021-09-15 22:01:55', 'Sp001'),
(2, NULL, 'Persona Natural', 'vigente', 'activo', '2021-09-15 19:57:13', 'user', 'user', '2021-09-16 01:56:49', 'PN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_telefono`
--

CREATE TABLE `aud_telefono` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_TELEFONO` int(11) NOT NULL,
  `TELEFONO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TIPO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `_DEFAULT` char(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_REG` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USER_MOD` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_REG` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_vencimientos`
--

CREATE TABLE `aud_vencimientos` (
  `ID_VENCIMIENTO` int(11) NOT NULL,
  `FECHA_VENCIMIENTO` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `NUMERO_TERMINACION` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA_REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `USER_REG` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA_MOD` timestamp NOT NULL DEFAULT current_timestamp(),
  `USER_MOD` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTADO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'activo',
  `ESTADO_REG` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aud_actividad`
--
ALTER TABLE `aud_actividad`
  ADD PRIMARY KEY (`ID_ACTIVIDAD`);

--
-- Indices de la tabla `aud_archivo`
--
ALTER TABLE `aud_archivo`
  ADD PRIMARY KEY (`ID_ARCHIVO`);

--
-- Indices de la tabla `aud_certificados`
--
ALTER TABLE `aud_certificados`
  ADD PRIMARY KEY (`ID_CERTIFICADO`);

--
-- Indices de la tabla `aud_ciudad`
--
ALTER TABLE `aud_ciudad`
  ADD PRIMARY KEY (`ID_PAIS`,`ID_CIUDAD`),
  ADD KEY `AK_KID_CIUDAD` (`ID_CIUDAD`);

--
-- Indices de la tabla `aud_cliente`
--
ALTER TABLE `aud_cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`),
  ADD KEY `FK_R4` (`ID_SOCIEDAD`);

--
-- Indices de la tabla `aud_cliente_actividad`
--
ALTER TABLE `aud_cliente_actividad`
  ADD PRIMARY KEY (`ID_CLI_ACT`),
  ADD KEY `FK_R2` (`ID_ACTIVIDAD`),
  ADD KEY `FK_R8` (`ID_CLIENTE`);

--
-- Indices de la tabla `aud_cliente_archivo`
--
ALTER TABLE `aud_cliente_archivo`
  ADD PRIMARY KEY (`ID_CLIENTE`,`ID_ARCHIVO`,`ID_CLI_ARCHIVO`),
  ADD KEY `AK_KID_CLI_ARCHIVO` (`ID_CLI_ARCHIVO`),
  ADD KEY `FK_R17` (`ID_ARCHIVO`);

--
-- Indices de la tabla `aud_cliente_certificado`
--
ALTER TABLE `aud_cliente_certificado`
  ADD PRIMARY KEY (`ID_CLIENTE`,`ID_CERTIFICADO`,`ID_CLI_CERT`),
  ADD KEY `AK_KID_CLI_CERT` (`ID_CLI_CERT`),
  ADD KEY `FK_R19` (`ID_CERTIFICADO`);

--
-- Indices de la tabla `aud_cliente_empresa`
--
ALTER TABLE `aud_cliente_empresa`
  ADD PRIMARY KEY (`ID_EMPRESA`,`ID_CLIENTE`,`ID_CLI_EMP`),
  ADD KEY `AK_KID_CLI_EMP` (`ID_CLI_EMP`),
  ADD KEY `FK_R11` (`ID_CLIENTE`);

--
-- Indices de la tabla `aud_cliente_obligacion`
--
ALTER TABLE `aud_cliente_obligacion`
  ADD PRIMARY KEY (`ID_PERIODO`,`ID_CLIENTE`,`ID_OBLIGACION`,`ID_CLI_OBL`),
  ADD KEY `AK_KID_CLI_OBL` (`ID_CLI_OBL`),
  ADD KEY `FK_R13` (`ID_CLIENTE`),
  ADD KEY `FK_R20` (`ID_PERIODO`,`ID_OBLIGACION`);

--
-- Indices de la tabla `aud_direccion`
--
ALTER TABLE `aud_direccion`
  ADD PRIMARY KEY (`ID_CLIENTE`,`ID_DIRECCION`),
  ADD KEY `AK_KID_DIRECCION` (`ID_DIRECCION`);

--
-- Indices de la tabla `aud_empresa`
--
ALTER TABLE `aud_empresa`
  ADD PRIMARY KEY (`ID_EMPRESA`);

--
-- Indices de la tabla `aud_institucion`
--
ALTER TABLE `aud_institucion`
  ADD PRIMARY KEY (`ID_INSTITUCION`);

--
-- Indices de la tabla `aud_obligacion_tributaria`
--
ALTER TABLE `aud_obligacion_tributaria`
  ADD PRIMARY KEY (`ID_PERIODO`,`ID_OBLIGACION`),
  ADD KEY `AK_KID_OBLIGACION` (`ID_OBLIGACION`);

--
-- Indices de la tabla `aud_pais`
--
ALTER TABLE `aud_pais`
  ADD PRIMARY KEY (`ID_PAIS`);

--
-- Indices de la tabla `aud_periodo`
--
ALTER TABLE `aud_periodo`
  ADD PRIMARY KEY (`ID_PERIODO`);

--
-- Indices de la tabla `aud_regimen`
--
ALTER TABLE `aud_regimen`
  ADD PRIMARY KEY (`ID_REGIMEN`);

--
-- Indices de la tabla `aud_reg_actividad`
--
ALTER TABLE `aud_reg_actividad`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `aud_sociedad`
--
ALTER TABLE `aud_sociedad`
  ADD PRIMARY KEY (`ID_SOCIEDAD`);

--
-- Indices de la tabla `aud_telefono`
--
ALTER TABLE `aud_telefono`
  ADD PRIMARY KEY (`ID_CLIENTE`,`ID_TELEFONO`),
  ADD KEY `AK_KID_TELEFONO` (`ID_TELEFONO`);

--
-- Indices de la tabla `aud_vencimientos`
--
ALTER TABLE `aud_vencimientos`
  ADD PRIMARY KEY (`ID_VENCIMIENTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aud_actividad`
--
ALTER TABLE `aud_actividad`
  MODIFY `ID_ACTIVIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aud_archivo`
--
ALTER TABLE `aud_archivo`
  MODIFY `ID_ARCHIVO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_certificados`
--
ALTER TABLE `aud_certificados`
  MODIFY `ID_CERTIFICADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aud_ciudad`
--
ALTER TABLE `aud_ciudad`
  MODIFY `ID_CIUDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aud_cliente`
--
ALTER TABLE `aud_cliente`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `aud_cliente_actividad`
--
ALTER TABLE `aud_cliente_actividad`
  MODIFY `ID_CLI_ACT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_cliente_archivo`
--
ALTER TABLE `aud_cliente_archivo`
  MODIFY `ID_CLI_ARCHIVO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_cliente_certificado`
--
ALTER TABLE `aud_cliente_certificado`
  MODIFY `ID_CLI_CERT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_cliente_empresa`
--
ALTER TABLE `aud_cliente_empresa`
  MODIFY `ID_CLI_EMP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_cliente_obligacion`
--
ALTER TABLE `aud_cliente_obligacion`
  MODIFY `ID_CLI_OBL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_direccion`
--
ALTER TABLE `aud_direccion`
  MODIFY `ID_DIRECCION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_empresa`
--
ALTER TABLE `aud_empresa`
  MODIFY `ID_EMPRESA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_institucion`
--
ALTER TABLE `aud_institucion`
  MODIFY `ID_INSTITUCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aud_obligacion_tributaria`
--
ALTER TABLE `aud_obligacion_tributaria`
  MODIFY `ID_OBLIGACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aud_pais`
--
ALTER TABLE `aud_pais`
  MODIFY `ID_PAIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aud_periodo`
--
ALTER TABLE `aud_periodo`
  MODIFY `ID_PERIODO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aud_regimen`
--
ALTER TABLE `aud_regimen`
  MODIFY `ID_REGIMEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aud_reg_actividad`
--
ALTER TABLE `aud_reg_actividad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_sociedad`
--
ALTER TABLE `aud_sociedad`
  MODIFY `ID_SOCIEDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aud_telefono`
--
ALTER TABLE `aud_telefono`
  MODIFY `ID_TELEFONO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aud_vencimientos`
--
ALTER TABLE `aud_vencimientos`
  MODIFY `ID_VENCIMIENTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aud_ciudad`
--
ALTER TABLE `aud_ciudad`
  ADD CONSTRAINT `FK_R10` FOREIGN KEY (`ID_PAIS`) REFERENCES `aud_pais` (`ID_PAIS`);

--
-- Filtros para la tabla `aud_cliente`
--
ALTER TABLE `aud_cliente`
  ADD CONSTRAINT `FK_R4` FOREIGN KEY (`ID_SOCIEDAD`) REFERENCES `aud_sociedad` (`ID_SOCIEDAD`);

--
-- Filtros para la tabla `aud_cliente_actividad`
--
ALTER TABLE `aud_cliente_actividad`
  ADD CONSTRAINT `FK_R2` FOREIGN KEY (`ID_ACTIVIDAD`) REFERENCES `aud_actividad` (`ID_ACTIVIDAD`),
  ADD CONSTRAINT `FK_R8` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`);

--
-- Filtros para la tabla `aud_cliente_archivo`
--
ALTER TABLE `aud_cliente_archivo`
  ADD CONSTRAINT `FK_R17` FOREIGN KEY (`ID_ARCHIVO`) REFERENCES `aud_archivo` (`ID_ARCHIVO`),
  ADD CONSTRAINT `FK_R18` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`);

--
-- Filtros para la tabla `aud_cliente_certificado`
--
ALTER TABLE `aud_cliente_certificado`
  ADD CONSTRAINT `FK_R14` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `FK_R19` FOREIGN KEY (`ID_CERTIFICADO`) REFERENCES `aud_certificados` (`ID_CERTIFICADO`);

--
-- Filtros para la tabla `aud_cliente_empresa`
--
ALTER TABLE `aud_cliente_empresa`
  ADD CONSTRAINT `FK_R11` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `FK_R12` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `aud_empresa` (`ID_EMPRESA`);

--
-- Filtros para la tabla `aud_cliente_obligacion`
--
ALTER TABLE `aud_cliente_obligacion`
  ADD CONSTRAINT `FK_R13` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `FK_R20` FOREIGN KEY (`ID_PERIODO`,`ID_OBLIGACION`) REFERENCES `aud_obligacion_tributaria` (`ID_PERIODO`, `ID_OBLIGACION`);

--
-- Filtros para la tabla `aud_direccion`
--
ALTER TABLE `aud_direccion`
  ADD CONSTRAINT `FK_R3` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`);

--
-- Filtros para la tabla `aud_obligacion_tributaria`
--
ALTER TABLE `aud_obligacion_tributaria`
  ADD CONSTRAINT `FK_R6` FOREIGN KEY (`ID_PERIODO`) REFERENCES `aud_periodo` (`ID_PERIODO`);

--
-- Filtros para la tabla `aud_sociedad`
--
ALTER TABLE `aud_sociedad`
  ADD CONSTRAINT `FK_R7` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`);

--
-- Filtros para la tabla `aud_telefono`
--
ALTER TABLE `aud_telefono`
  ADD CONSTRAINT `FK_R5` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `aud_cliente` (`ID_CLIENTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
