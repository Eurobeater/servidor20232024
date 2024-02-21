-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2024 a las 23:45:34
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectohospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsa`
--

CREATE TABLE `bolsa` (
  `id` int(11) NOT NULL,
  `puesto_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `name`) VALUES
(1, 'Encuesta de Satisfacción'),
(2, 'Encuesta de Servicios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id`, `nombre`) VALUES
(1, 'Pediatría'),
(2, 'Cardiología'),
(3, 'Dermatología'),
(4, 'Oftalmología'),
(5, 'Ginecología'),
(6, 'Neurología'),
(7, 'Ortopedia'),
(8, 'Oncología'),
(9, 'Endocrinología'),
(10, 'Medicina interna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `nombre`) VALUES
(13, 'Juan Vázquez'),
(14, 'Luis Ramírez'),
(15, 'María Pereñiguez'),
(16, 'Ana Cámara Marco'),
(17, 'Carlos Hita'),
(18, 'Laura Jiménez'),
(19, 'Pedro Campesinos'),
(20, 'Sofía Muñoz'),
(21, 'Javier Súarez'),
(22, 'Lucía Fernández'),
(23, 'Diego González'),
(24, 'Martina López'),
(25, 'Manuel Sánchez'),
(26, 'Elena García'),
(27, 'Adrián Martínez'),
(28, 'Isabel Ruiz'),
(29, 'Alejandro Díaz'),
(30, 'Carmen Torres'),
(31, 'Jorge Pérez'),
(32, 'Raquel Gómez'),
(33, 'David Castro'),
(34, 'Sara Ortega'),
(35, 'Pablo Morales'),
(36, 'Rosa Navarro'),
(37, 'Daniel Romero'),
(38, 'Natalia Flores'),
(39, 'Marcos Santos'),
(40, 'Marina Rubio'),
(41, 'Francisco Herrera'),
(42, 'Paula Molina'),
(43, 'Miguel Fernández'),
(44, 'Ana Belén Martín'),
(45, 'José Antonio García'),
(46, 'María Dolores Pérez'),
(47, 'Antonio Ruiz'),
(48, 'Beatriz Jiménez'),
(49, 'Francisco Javier Gutiérrez'),
(50, 'Eva María Rodríguez'),
(51, 'Álvaro Serrano'),
(52, 'Cristina Medina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_especialidad`
--

CREATE TABLE `medico_especialidad` (
  `medico_id` int(11) NOT NULL,
  `especialidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medico_especialidad`
--

INSERT INTO `medico_especialidad` (`medico_id`, `especialidad_id`) VALUES
(13, 1),
(14, 2),
(15, 3),
(16, 9),
(17, 4),
(18, 5),
(19, 6),
(20, 7),
(21, 8),
(22, 9),
(23, 10),
(24, 1),
(25, 2),
(26, 3),
(27, 4),
(28, 5),
(29, 6),
(30, 7),
(31, 8),
(32, 9),
(33, 10),
(34, 1),
(35, 2),
(36, 3),
(37, 4),
(38, 5),
(39, 6),
(40, 7),
(41, 8),
(42, 9),
(43, 10),
(44, 1),
(45, 2),
(46, 3),
(47, 4),
(48, 5),
(49, 6),
(50, 7),
(51, 8),
(52, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `encuesta_id`, `pregunta`, `orden`) VALUES
(1, 1, 'Valore Limpieza', 1),
(2, 1, 'Valore Atención', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_caducidad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id`, `nombre`, `fecha_caducidad`) VALUES
(1, 'Endocrinología', '2024-02-24'),
(2, 'Logopeda', '2024-02-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `pregunta_id` int(11) DEFAULT NULL,
  `respuesta` varchar(255) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `id` int(11) NOT NULL,
  `respuesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`id`, `respuesta_id`) VALUES
(27, 1),
(28, 1),
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `especialidad_id`, `nombre`, `descripcion`) VALUES
(1, 5, 'Fecundación In Vitro (FIV)', 'Nuestro hospital es reconocido a nivel internacional por su excelencia en el campo de la Fecundación In Vitro (FIV). Con décadas de experiencia y un enfoque pionero en tecnología de reproducción asistida, hemos ayudado a miles de parejas a concebir y construir sus familias. Nuestro equipo multidisciplinario de especialistas en fertilidad está comprometido con la innovación y la investigación continua, lo que nos permite ofrecer tratamientos personalizados y efectivos para cada paciente.'),
(2, 3, 'Tratamientos estéticos dermatológicos', 'En nuestro hospital, ofrecemos una amplia gama de tratamientos estéticos dermatológicos dirigidos por dermatólogos especializados y con experiencia en el cuidado de la piel. Desde opciones no invasivas como peelings químicos y tratamientos con láser hasta procedimientos más avanzados como la microdermoabrasión y la terapia de luz pulsada intensa (IPL), nos comprometemos a proporcionar soluciones personalizadas para abordar una variedad de preocupaciones cutáneas, como el envejecimiento.'),
(3, 8, 'Radioterapia', 'Nuestro hospital ofrece radioterapia especializada para el tratamiento del cáncer, una opción crucial en la lucha contra esta enfermedad. La radioterapia consiste en el uso de radiación de alta energía para dirigirse y destruir las células cancerosas, frenando su crecimiento y disminuyendo los tumores malignos. Contamos con un equipo médico altamente cualificado, compuesto por oncólogos radioterapeutas y técnicos especializados, que utilizan las últimas tecnologías.'),
(4, 6, 'Neurocirugía', 'Nuestro equipo de neurocirujanos líderes en la industria está dedicado a ofrecer tratamientos de vanguardia y resultados excepcionales para una variedad de afecciones neurológicas y cerebrales. Desde tumores cerebrales hasta lesiones de la médula espinal.'),
(5, 2, 'Cardiología Intervencionista', 'Como líderes en el tratamiento de enfermedades cardíacas, nuestro departamento de cardiología intervencionista se dedica a proporcionar soluciones innovadoras y resultados sobresalientes para cada paciente.'),
(6, 4, 'Cirugía de cataratas', 'En nuestro hospital, contamos con un equipo de oftalmólogos especializados y equipamiento de vanguardia para realizar este procedimiento con la máxima precisión y seguridad. Durante la cirugía, se realiza una pequeña incisión en el ojo para extraer el cristalino opaco y se reemplaza con una lente intraocular artificial. Este proceso restaura la claridad visual y mejora significativamente la calidad de vida del paciente.'),
(7, 7, 'Tratamiento de lesiones deportivas', 'En nuestro hospital, ofrecemos un enfoque integral y personalizado para abordar una amplia gama de lesiones, desde esguinces y distensiones musculares hasta fracturas y desgarros de ligamentos. Nuestro equipo multidisciplinario de especialistas en medicina deportiva, fisioterapeutas y entrenadores trabaja en conjunto para evaluar, diagnosticar y tratar las lesiones de manera efectiva. Utilizamos las últimas técnicas y tecnologías, como terapia física avanzada y rehabilitación especializada.'),
(8, 9, 'Pruebas de función hormonal', 'En nuestro hospital, ofrecemos un completo conjunto de pruebas hormonales para evaluar la función de las glándulas endocrinas y detectar posibles desequilibrios hormonales. Estas pruebas pueden incluir análisis de sangre, orina o saliva para medir los niveles de diversas hormonas, como la hormona tiroidea, la insulina, el cortisol, el estrógeno y la testosterona, entre otras con nuestro equipo de endocrinólogos altamente capacitados.'),
(9, 1, 'Psiquiatría Infantil y Adolescente', 'En nuestro centro de psiquiatría infantil y adolescente, comprendemos las complejidades únicas del desarrollo emocional y mental en esta población. Nuestro equipo de psiquiatras especializados está dedicado a brindar una atención compasiva y efectiva que aborde las necesidades individuales de cada joven paciente. Desde la evaluación inicial hasta el desarrollo de planes de tratamiento personalizados, trabajamos en colaboración con familias y otros profesionales de la salud.'),
(10, 10, 'Seguimiento y tratamiento de enfermedades crónicas', 'Nuestro enfoque se centra en proporcionar un seguimiento continuo y coordinado, que incluye visitas regulares, monitoreo de síntomas y progreso, ajustes en la medicación cuando sea necesario y educación del paciente sobre el manejo de su enfermedad. Además, ofrecemos servicios de apoyo emocional y psicológico para ayudar a los pacientes a sobrellevar los desafíos emocionales y psicosociales asociados con las enfermedades crónicas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@admin.com', '[]', '$2y$13$bLtQ1Z0xvtyvOW2Lpp5MqOBaW18VigB/Arj1/0.hulXaF094zZ442');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bolsa`
--
ALTER TABLE `bolsa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_39FF7DDA5035E9DA` (`puesto_id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B88CF8E516A490EC` (`especialidad_id`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medico_especialidad`
--
ALTER TABLE `medico_especialidad`
  ADD PRIMARY KEY (`medico_id`,`especialidad_id`),
  ADD KEY `IDX_11DCCDD4A7FB1C0C` (`medico_id`),
  ADD KEY `IDX_11DCCDD416A490EC` (`especialidad_id`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AEE0E1F746844BA6` (`encuesta_id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6C6EC5EE31A5801E` (`pregunta_id`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B2ED91CD9BA57A2` (`respuesta_id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CB86F22A16A490EC` (`especialidad_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bolsa`
--
ALTER TABLE `bolsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bolsa`
--
ALTER TABLE `bolsa`
  ADD CONSTRAINT `FK_39FF7DDA5035E9DA` FOREIGN KEY (`puesto_id`) REFERENCES `puesto` (`id`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `FK_B88CF8E516A490EC` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad` (`id`);

--
-- Filtros para la tabla `medico_especialidad`
--
ALTER TABLE `medico_especialidad`
  ADD CONSTRAINT `FK_11DCCDD416A490EC` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_11DCCDD4A7FB1C0C` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `FK_AEE0E1F746844BA6` FOREIGN KEY (`encuesta_id`) REFERENCES `encuesta` (`id`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `FK_6C6EC5EE31A5801E` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`);

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `FK_B2ED91CD9BA57A2` FOREIGN KEY (`respuesta_id`) REFERENCES `respuesta` (`id`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `FK_CB86F22A16A490EC` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;