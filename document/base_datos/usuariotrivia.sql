-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2025 a las 22:36:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuariotrivia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
create database UsuarioTrivia;
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta_correcta` varchar(255) NOT NULL,
  `respuesta1` varchar(255) NOT NULL,
  `respuesta2` varchar(255) NOT NULL,
  `respuesta3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `respuesta_correcta`, `respuesta1`, `respuesta2`, `respuesta3`) VALUES
(1, '¿Cuál es la capital de Francia?', 'París', 'Londres', 'Berlín', 'Madrid'),
(2, '¿Cuánto es 2 + 2?', '4', '3', '5', '6'),
(3, '¿Quién escribió \"Cien años de soledad\"?', 'Gabriel García Márquez', 'J.K. Rowling', 'Pablo Neruda', 'Mario Vargas Llosa'),
(4, '¿Cuál es el océano más grande?', 'Pacífico', 'Atlántico', 'Índico', 'Ártico'),
(5, '¿Qué planeta es conocido como el Planeta Rojo?', 'Marte', 'Tierra', 'Júpiter', 'Saturno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(24, 'mateo', '$2y$10$KGjQxwIGxYuBFkDOm0X.k.K5QNN4coCWGhivHrIISk82vtASxlzge'),
(26, 'text 22', '$2y$10$V57tztif2N3Fk0LQ4Eo8hue6CFeluSS9yILvPp9T9.eWHZjslbIhO'),
(34, 'rrr', '$2y$10$fqHChT3tucQVAWveZLrASuBRcqr9jgVdO2HiZ0EBwhHaRWv/EFG/.'),
(36, 'ererre', '$2y$10$7Oqz6EyMCK7u8tGj1HwSOes04vYt1rPrlPb.kngR4cFNwjVg5m5YC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
