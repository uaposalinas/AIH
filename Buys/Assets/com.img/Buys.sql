-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-06-2024 a las 23:28:56
-- Versión del servidor: 10.6.17-MariaDB-cll-lve
-- Versión de PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `devlabsc_aihbuys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `GestID` varchar(21) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `FullDate` varchar(1000) NOT NULL,
  `SavedDay` varchar(1000) NOT NULL,
  `Month` varchar(150) NOT NULL,
  `Year` varchar(5) NOT NULL,
  `Provider` varchar(100) NOT NULL,
  `SpendedBy` varchar(150) NOT NULL,
  `PayType` varchar(150) NOT NULL,
  `CardUsed` varchar(4) NOT NULL,
  `CountableCount` varchar(150) NOT NULL,
  `BuyType` varchar(150) NOT NULL,
  `BillDescription` varchar(1500) NOT NULL,
  `BillNumber` varchar(150) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Exempt` longtext NOT NULL,
  `Subtotal` longtext NOT NULL,
  `OtherISV` varchar(150) NOT NULL,
  `ISV18` longtext NOT NULL,
  `ISV15` longtext NOT NULL,
  `Total` longtext NOT NULL,
  `Items` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`GestID`, `Date`, `FullDate`, `SavedDay`, `Month`, `Year`, `Provider`, `SpendedBy`, `PayType`, `CardUsed`, `CountableCount`, `BuyType`, `BillDescription`, `BillNumber`, `Amount`, `Exempt`, `Subtotal`, `OtherISV`, `ISV18`, `ISV15`, `Total`, `Items`) VALUES
('ASC-2024-202406110039', '2024-06-10', '11 de Junio del 2024', 'Martes', '06', '2024', 'GRUPO ROEL', 'AIH S DE RL', 'Tarjeta de Crédito', '8707', 'Compra', 'Oficina', 'VPS FORZA SL-80IUL', '000-002-01-0000491', '3', ' 0.00', '5784', ' 0.00', ' PROYECTO MUNI. CHOLOMA', ' 867.60', ' 6652', ''),
('ASC-2024-202406110869', '2024-06-08', '11 de Junio del 2024', 'Martes', '06', '2024', 'HCT', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Compra', 'Oficina', 'UNIDAD DE ESTADO SOLIDO KINGSTON 500GB M.2  2280', '002-001-01-00055824', '1', ' 0.00', '1055', ' 0.00', 'PROYECTO MUNI. CHOLOMA', ' 158.25', ' 1213', ''),
('ASC-2024-202406110951', '2024-06-10', '11 de Junio del 2024', 'Martes', '06', '2024', 'GIGANET', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Compra', 'Oficina', 'SWITCH MS105 DE ESCRITORIO DE 5 PUERTOS A 10/100 MERCUSYS', '002-002-01-00073219', '1', ' 0.00', '153.91', ' 0.00', 'CAPACITACIÓN HIKVISION BRANDON Y ALEJANDRO', ' 23.09', ' 177', ''),
('ASC-2024-202406111220', '2024-06-05', '11 de Junio del 2024', 'Martes', '06', '2024', 'ACOSA', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Compra', 'Oficina', '002-002-01-00290627', '002-002-01-00290627', '1', ' 0.00', '1627.39', ' 0.00', 'PROYECTO MUNI. CHOLOMA', ' 244.11', ' 1872', ''),
('ASC-2024-202406111882', '2024-06-03', '11 de Junio del 2024', 'Martes', '06', '2024', 'COMERCIAL LARACH', 'AIH S DE RL', 'Tarjeta de Crédito', '8707', 'Compra', 'Oficina', 'EXTENSIONES ELECTRICA DE 100 PIES', '000-008-01-00260402', '2', ' 0.00', '884.44', ' 0.00', 'PROYECTO MUNI. PROGRESO', ' 132.67', ' 1017', ''),
('ASC-2024-202406112282', '2024-06-03', '11 de Junio del 2024', 'Martes', '06', '2024', 'MACDEL', 'AIH S DE RL', 'Tarjeta de Crédito', '8707', 'Compra', 'Oficina', 'PAÑO MICROFIBRA CH AZUL ', '008-001-01-00143431', '72', ' 0.00', '1872', ' 0.00', 'PROYECTO MUNI. PROGRESO', ' 280.80', ' 2153', ''),
('ASC-2024-202406112846', '2024-06-08', '11 de Junio del 2024', 'Martes', '06', '2024', 'HCT', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Compra', 'Oficina', 'PROYECTOR EPSON PORTATIL EPIGVISION FLEX CO-W01 3000 LUMEN', '002-001-01-00055823', '1', ' 0.00', '9885.00', ' 0.00', ' PROYECTO CHOROTEGA', ' 1482.75', ' 11368', ''),
('ASC-2024-202406114600', '2024-06-07', '11 de Junio del 2024', 'Martes', '06', '2024', 'HCT', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Compra', 'Oficina', 'CABLE DE SEGURIDAD TARGUS ASP96RGLX COMBINACION RESETEABLE', '002-001-01-00055818', '1', ' 0.00', '465', ' 0.00', ' 0.00', ' 69.75', ' 535', ''),
('ASC-2024-202406115250', '2024-06-11', '11 de Junio del 2024', 'Martes', '06', '2024', 'ACOSA', 'AIH S DE RL', 'Tarjeta de Crédito', '', 'Compra', 'Oficina', 'UPS APC 700VA 120V 4 SAL', '002-002-01-00291453', '4', ' 0.00', '5781.60', ' 0.00', ' PROYECTO COFISA', ' 867.24', ' 6649', ''),
('ASC-2024-202406117217', '2024-06-03', '11 de Junio del 2024', 'Martes', '06', '2024', 'GIGANET', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Compra', 'Oficina', 'TARJETA DE PROXIMIDAD ZKTECO', '002-002-01-00072878', '5', ' 0.00', '121.74', ' 0.00', 'PROYECTO MUNI. CHOLOMA', ' 18.26', ' 140', ''),
('ASC-2024-202406117982', '2024-06-04', '11 de Junio del 2024', 'Martes', '06', '2024', 'POS', 'AIH S DE RL', 'Tarjeta de Crédito', '8707', 'Compra', 'Oficina', 'IMPRESORA TERMICA USB RESOLUCION DE 203', '000-001-01-00036773', '1', ' 0.00', '2934.78', ' 0.00', 'PRESTAMO A CARLOS JIMENEZ', ' 440.22', ' 3375', ''),
('ASC-2024-202406118068', '2024-06-11', '11 de Junio del 2024', 'Martes', '06', '2024', 'ACOSA', 'AIH S DE RL', 'Tarjeta de Crédito', '8707', 'Compra', 'Oficina', 'TECLADO DELL USB KB216', '002-002-01-00291450', '30', ' 0.00', '7215', ' 0.00', 'PARA STOCK', ' 1082.25', ' 8297', ''),
('ASC-2024-202406119943', '2024-06-04', '11 de Junio del 2024', 'Martes', '06', '2024', 'TECNOCOMP', 'AIH S DE RL', 'Tarjeta de Crédito', '8707', 'Compra', 'Oficina', 'TECLADO NUMERICO ARGOM 1076 NEGRO CABLE USB', '000-001-01-00175776', '8', ' 0.00', '1057.39', ' 0.00', 'PROYECTO BAZ', ' 158.61', ' 1216', ''),
('ASC-2024-202406126382', '2024-06-12', '12 de Junio del 2024', 'Miércoles', '06', '2024', 'ACOSA', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Servicio', 'Oficina', 'UPS APC 700VA 4SAL ', '002-002-01-00291589', '1', ' 0.00', '1445.40', ' 0.00', 'PRESTAMO A AGROPECUARIA REYES PONCE', ' 216.81', ' 1662', ''),
('ASC-2024-20240661773', '2024-06-03', '6 de Junio del 2024', 'Jueves', '06', '2024', 'GIGANET', 'AIH S DE RL', 'Botón de Pago', 'N/A', 'Servicio', 'Oficina', 'TARJETA DE PROXIMIDAD ZKT TECO', '002-002-01-00072878', '5', ' 0.00', '121.74', ' 0.00', 'Sin Observaciones', ' 18.26', ' 140', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`GestID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
