-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2024 a las 22:36:27
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

--
-- Volcado de datos para la tabla `bolsa`
--

INSERT INTO `bolsa` (`id`, `puesto_id`, `nombre`, `direccion`, `telefono`, `email`, `cp`) VALUES
(3, 1, 'Manolo', 'C/Menor 4', '686788784', 'manolo@gmail.com', '30110');

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
(1, 'Juan Vázquez'),
(2, 'Luis Ramírez'),
(3, 'María Pereñiguez'),
(4, 'Ana Cámara Marco'),
(5, 'Carlos Hita'),
(6, 'Laura Jiménez'),
(7, 'Pedro Campesinos'),
(8, 'Sofía Muñoz'),
(9, 'Javier Súarez'),
(10, 'Lucía Fernández');

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
(1, 1),
(2, 2),
(3, 3),
(4, 9),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 4),
(10, 10);

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
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `FK_CB86F22A16A490EC` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
