-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 05:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roldiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `anecdotas`
--

CREATE TABLE `anecdotas` (
  `id_anecdotas` int(11) NOT NULL,
  `contenido` varchar(900) NOT NULL,
  `campania` varchar(90) NOT NULL,
  `fk_personaje_escritor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugadores` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `pass` varchar(555) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jugadores`
--

INSERT INTO `jugadores` (`id_jugadores`, `nombre`, `correo`, `pass`, `admin`, `fecha_registro`) VALUES
(3, 'admin', '', '123', 1, '2021-03-31 18:14:41'),
(9, 'ojete', '2@', '$2y$10$w36yInFq9/v2NaeCW8bqOuxn/Lh4XsDmjOfnfEjCcZif8k6GLFTjW', 0, '2021-04-25 15:25:57'),
(10, 'capullo', '2334@', '$2y$10$Hdk0yKl8Wn5ww/Myff0lSuz3Vqqak2S8SsSQ58Jti4M3rEQ37D/oq', 0, '2021-04-25 15:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(11) NOT NULL,
  `fk_jugador_asociado` int(11) NOT NULL,
  `biografia` varchar(900) NOT NULL,
  `aficiones` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personajes`
--

CREATE TABLE `personajes` (
  `id_personajes` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `fk_jugador_asociado` int(11) NOT NULL,
  `fecha_creacion_personaje` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personajes`
--

INSERT INTO `personajes` (`id_personajes`, `nombre`, `descripcion`, `fk_jugador_asociado`, `fecha_creacion_personaje`, `imagen`) VALUES
(9, 'mincs', 'Explorador guerrero', 9, '2021-04-25 15:27:21', '277c2ec6eb6d3d20856f07ab9f36c764.jpg'),
(10, 'Guerrera', 'Una guerrera ', 10, '2021-04-25 15:29:49', '96b8db827bd58350a335fd7786068ac2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anecdotas`
--
ALTER TABLE `anecdotas`
  ADD PRIMARY KEY (`id_anecdotas`),
  ADD KEY `fk_personaje_escritor_` (`fk_personaje_escritor`);

--
-- Indexes for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugadores`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD KEY `fk_jugador_perfil` (`fk_jugador_asociado`);

--
-- Indexes for table `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id_personajes`),
  ADD KEY `fk_jugador_asociado` (`fk_jugador_asociado`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anecdotas`
--
ALTER TABLE `anecdotas`
  MODIFY `id_anecdotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugadores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id_personajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anecdotas`
--
ALTER TABLE `anecdotas`
  ADD CONSTRAINT `fk_personaje_escritor_` FOREIGN KEY (`fk_personaje_escritor`) REFERENCES `personajes` (`id_personajes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `fk_jugador_perfil` FOREIGN KEY (`fk_jugador_asociado`) REFERENCES `jugadores` (`id_jugadores`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personajes`
--
ALTER TABLE `personajes`
  ADD CONSTRAINT `fk_personaje_escritor` FOREIGN KEY (`fk_jugador_asociado`) REFERENCES `jugadores` (`id_jugadores`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
