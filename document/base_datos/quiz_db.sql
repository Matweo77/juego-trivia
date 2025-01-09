-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2025 a las 22:36:19
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
-- Base de datos: `quiz_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`

create database quiz_db;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(1, '¿Cuál es la capital de Francia?', 'A) Berlín', 'B) Madrid', 'C) París', 'D) Roma', 'C'),
(2, '¿Qué es el ADN?', 'A) Ácido desoxirribonucleico', 'B) Ácido ribonucleico', 'C) Proteína', 'D) Carbohidrato', 'A'),
(3, '¿Quién escribió \"Cien años de soledad\"?', 'A) Gabriel García Márquez', 'B) Julio Cortázar', 'C) Mario Vargas Llosa', 'D) Pablo Neruda', 'A'),
(4, '¿Cuál es el planeta más cercano al sol?', 'A) Venus', 'B) Tierra', 'C) Mercurio', 'D) Marte', 'C'),
(5, '¿Qué instrumento mide la temperatura?', 'A) Barómetro', 'B) Termómetro', 'C) Higrómetro', 'D) Anemómetro', 'B'),
(6, '¿Cuál es el océano más grande del mundo?', 'A) Atlántico', 'B) Índico', 'C) Pacífico', 'D) Ártico', 'C'),
(7, '¿Qué gas es esencial para la respiración humana?', 'A) Dióxido de carbono', 'B) Oxígeno', 'C) Nitrógeno', 'D) Helio', 'B'),
(8, '¿Quién pintó la Mona Lisa?', 'A) Vincent van Gogh', 'B) Pablo Picasso', 'C) Leonardo da Vinci', 'D) Claude Monet', 'C'),
(9, '¿Cuál es el continente más pequeño del mundo?', 'A) Europa', 'B) Oceanía', 'C) Asia', 'D) América del Sur', 'B'),
(10, '¿Qué año marcó el inicio de la Segunda Guerra Mundial?', 'A) 1939', 'B) 1941', 'C) 1945', 'D) 1936', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
