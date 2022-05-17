-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2022 a las 18:05:26
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbs5310872`
--
CREATE DATABASE IF NOT EXISTS `dbs5310872` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbs5310872`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_foro`
--

CREATE TABLE `categorias_foro` (
  `id_categoria` int(8) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_foro`
--

INSERT INTO `categorias_foro` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`) VALUES
(1, 'General', 'Categoria General'),
(2, 'Deportes', 'Categoria de Deportes'),
(3, 'Adaptaciones', 'Categoria de Adaptaciones'),
(4, 'Movilidad', 'Categoria de Movilidad'),
(5, 'Libre', 'Categoria de Libertad'),
(6, 'Casa', 'Categoria de Casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `id_historia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenido` text NOT NULL,
  `idioma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`id_historia`, `id_usuario`, `titulo`, `descripcion`, `fecha_creacion`, `contenido`, `idioma`) VALUES
(22, 70, 'Historia de Jerry', 'Jerry tiene 53 años y cuatro hijos. Es independiente, tiene una casa, formó una familia y sus hijos adultos todavía acuden a él en busca de apoyo. Jerry se jubiló de programador informático en el 2009 y compite y entrena a otros en varios deportes. Esta persona que lleva una vida normal y saludable hasta ha participado en la maratón de Boston.\n\nJerry también ha tenido una discapacidad por más de 35 años. El 3 de diciembre de 1976 (el mismo día en que se conmemora el Día Internacional de las Personas con Discapacidades) a Jerry lo atropelló un conductor embriagado. El accidente lo dejó parcialmente parapléjico.\n\nA la vida de Jerry no la define su discapacidad. Él vive su vida al igual que las personas que no tienen una discapacidad. “Hay mucho que puedo hacer y hay ciertas cosas que no”, expresó Jerry. “Manejo, invierto dinero. No soy rico, pero tampoco pobre. Me gusta estar sano y ser independiente”, agregó.\n\nSin embargo, como persona con una discapacidad, Jerry ha enfrentado muchas barreras. Mientras se recuperaba de una operación reciente del manguito de los rotadores, los especialistas de rehabilitación “no podían ver más allá de su discapacidad”, y le administraban pruebas y le hacían visitas de rehabilitación adicionales que una persona sin una discapacidad no recibiría. Una vez lo estaban preparando para una operación cuando una enfermera dijo: “No necesita una epidural, es parapléjico”. Jerry le tuvo que informar a la enfermera que solo era parcialmente parapléjico y que definitivamente necesitaría una epidural.\nJerry estaba en la fila en un tribunal de Alabama para renovar su permiso de estacionamiento y también renovar el registro del auto de su hijo. Vio cómo un trabajador se acercaba a las personas en la fila y les preguntaba qué necesitaban. Cuando llegó a donde estaba Jerry y vio la silla de ruedas, le preguntó: “¿Usted con quién vino hasta aquí?”. Y a Jerry le cuesta ir a los conciertos o juegos de béisbol con un grupo grande de familiares o amigos, porque es muy difícil encontrar boletos con acceso para los discapacitados para más de dos personas.\n\nJerry ha visto mucho en más de 35 años viviendo con una discapacidad. Ha visto que muchos de los obstáculos y actitudes hacia las personas con discapacidades todavía existen. Aunque también ha notado muchos cambios positivos para lograr que las personas con discapacidades se mantengan físicamente activas mediante oportunidades recreativas como golf, pesca y hasta esquí en la nieve. Existen organizaciones en la actualidad como la Fundación Lakeshore, en donde Jerry trabaja a tiempo parcial como entrenador de baloncesto y atletismo, que proporcionan oportunidades para la recreación.\n\nJerry expresa lo siguiente: “No espero que el mundo gire alrededor nuestro. Me adaptaré, solo necesito que las cosas se hagan de manera en que yo pueda adaptarme”.', '2022-02-15 19:14:27', '<ul>\n<li>You will learn how to create your own website with Angular.</li>\n<li>Create components in Angular to structure our web.</li>\n<li>Learn how to use Angular Data-Binding.</li>\n<li>You will learn how to use Angular directives to manage the DOM.</li>\n<li>You will work with the navigation inside an Angular application.</li>\n<li>Learn how to make Http requests to REST API servers.</li>\n<li>Create and use template form in Angular.</li>\n</ul>', 'Spanish'),
(23, 69, 'Justin, mi experiencia', 'A los 5 años, a Justin se le diagnosticó por primera vez una discapacidad: TDA o trastorno por déficit de atención, que hoy en día se conoce como TDAH o trastorno por déficit de atención e hiperactividad. Como consecuencia del diagnóstico, lo retiraron del entorno de clases regulares y lo ubicaron en cursos de educación especial. Los educadores de Justin les informaron a sus padres que probablemente no se graduaría de la escuela secundaria superior, y mucho menos de la universidad.\n\nAños después, ya siendo un adulto joven, Justin contrajo la enfermedad de Ménière (un trastorno del oído interno), la cual afectó su audición y equilibrio. La aparición del trastorno dejó a Justin con la temible realidad de que podría perder su audición de forma permanente en cualquier momento. Justin recuerda cómo un antiguo supervisor se aprovechó de este conocimiento para hacerle una broma inadecuada: mientras hablaban en una reunión entre ellos, el sonido de la voz del supervisor paró de forma repentina, en cuanto que sus labios seguían moviéndose. Justin pensó que se había quedado sordo hasta que el supervisor comenzó a reírse, lo cual Justin pudo escuchar. Comportamientos como el señalado antes afectaron la confianza de Justin; aun así, él sabía que podía contribuir a la sociedad.\n\nImpulsado en parte por la adversidad, Justin volvió a los estudios, obtuvo un título universitario en negocios y, poco después, ingresó a la industria del mercadeo comercial. Sin embargo, a pesar de su educación y experiencia, Justin continuó siendo objeto, con regularidad, del mismo estigma. Muchas de las experiencias laborales de Justin a lo largo de su carrera lo hicieron sentir avergonzado, culpable, ofendido y, a veces, hasta intimidado. En lugar de infundirle confianza, lo dejaron desalentado, simplemente por ser una persona con capacidades diferentes.\n\nEn julio del 2013 todo cambió para Justin. Comenzó a trabajar en los Centros para el Control y la Prevención de Enfermedades como contratista de la División de Desarrollo Humano y Discapacidades en el Centro Nacional de Defectos Congénitos y Discapacidades del Desarrollo. Los colegas de Justin hacen hincapié en hacerlo sentir cómodo y respetado como miembro de una fuerza laboral diversa y productiva. Acogieron con agrado la diversidad de Justin, contribuyendo de modo positivo a su salud general.\n\nLa misión de la División de Desarrollo Humano y Discapacidades es conducir la salud pública para prevenir enfermedades y promover la equidad en la salud y el desarrollo de los niños y adultos con discapacidades o que tienen riesgo de presentarlas. Uno de cada dos adultos con discapacidades no realiza la suficiente actividad física aeróbica1, y para Justin, la actividad física regular es importante para ayudarlo a combatir coágulos de sangre potencialmente letales debido al trastorno genético de coagulación de la sangre que tiene. Todas las horas de trabajo, Justin camina por unos minutos, hace estiramiento o usa su bicicleta de escritorio. Justin también participa en reuniones que se hacen caminando, lo cual, en su opinión, conduce a que sean más creativas y productivas.\n\nHistorias como las de Justin nos recuerdan que el empleo y la salud están conectados. Los CDC se enorgullecen por apoyar cada año en octubre el Mes Nacional de Concientización sobre las Oportunidades de Empleo para Personas con Discapacidades. El mes de concientización tiene como objetivo educar sobre temas relacionados con el empleo y las discapacidades, y celebrar las muchas y variadas contribuciones de los trabajadores con discapacidades en los Estados Unidos.', '2022-02-15 19:18:38', '<p>Es molt important per a treballar dominar les millors llibreries de javascript</p>', 'Valencia'),
(24, 68, 'Susana, sin brazo desde pequeña', 'Suhana tiene una hermana, Shahrine, que es 18 meses mayor que ella. Cuando la madre de Shahrine estaba embarazada de Suhana, un tío llegó de visita. Durante la visita, el tío notó rápidamente que Shahrine no parecía hablar a un nivel apropiado a su edad, ni respondía cuando la llamaban. Shahrine también subía el volumen de la televisión y la radio cuando los otros podían escucharlas sin dificultad. Los padres de Shahrine pensaban que su desarrollo del habla y su conducta eran normales para una niña pequeña, pero gracias a que el tío expresó sus preocupaciones la familia pronto tomó medidas. Una prueba de audición encontró que Shahrine tenía dificultades auditivas.\n\nDebido al diagnóstico de Shahrine, a Suhana se le hizo una prueba de la audición al nacer y se encontró que también tenía dificultades auditivas. Si no hubiese sido por las preocupaciones expresadas por el tío de las niñas, no solo la pérdida auditiva de Shahrine podría haber seguido por más tiempo sin detectarse, sino que probablemente no se le habría hecho una prueba de audición a Suhana al nacer.\nComo consecuencia del diagnóstico temprano, los padres de Suhana y Shahrine pudieron adquirir los conocimientos necesarios para asegurarse de que sus hijas pudieran alcanzar su potencial máximo en la vida. Tuvieron acceso en una etapa temprana a servicios provistos por un equipo de médicos, terapeutas del habla, consejeros y maestros.\n\nSuhana da crédito a sus padres por sus propios éxitos, y dice que no hubiera podido llegar tan lejos sin su apoyo y paciencia. Hoy, Suhana está empleada en los Centros para el Control y la Prevención de Enfermedades (CDC) como epidemióloga en el Programa de Detección Auditiva e Intervención Tempranas (EHDI) de la agencia. Todos los niños que son sordos o tienen dificultades para oír reciben servicios fundamentales que necesitan gracias al Programa de EHDI, que financia el desarrollo de sistemas de datos y provee asistencia técnica para ayudar a mejorar las pruebas de detección, los diagnósticos y la intervención temprana en estos bebés. Cuando los niños que son sordos o tienen dificultades para oír reciben servicios en una etapa temprana, tienen más probabilidades de alcanzar todo su potencial y vivir una vida adulta saludable y productiva.\n\nLos CDC se enorgullecen por apoyar cada año en octubre el Mes Nacional de Concientización sobre las Oportunidades de Empleo para Personas con Discapacidades. Las metas del mes de concientización son educar al público sobre temas relacionados con el empleo y las discapacidades, y celebrar las muchas y variadas contribuciones de los trabajadores con discapacidades en los Estados Unidos.', '2022-02-15 19:18:41', '<h2 class=\"udlite-heading-xl requirements--title--2j7S2\"><span style=\"font-size: 14px;\">CONOCIMIENTOS Y HABILIDADES QUE PUEDO ENSE&Ntilde;ARTE</span></h2>\r\n\r\n\r\n\r\n<ul class=\"list-skills\">\r\n<li>&nbsp;Que es AJAX</li>\r\n<li>&nbsp;Enviar datos en distintas formas a un servidor mediante XMLHttpRequest</li>\r\n<li>&nbsp;Manejar respuestas de distintos tipos</li>\r\n<li>&nbsp;Controlar errores</li>\r\n<li>&nbsp;Abstracciones para simplificar el uso de XMLHttpRequest</li>\r\n</ul>\r\n\r\n\r\n', 'Castellano'),
(32, 68, 'Susana, sin brazo desde pequeña', 'Suhana tiene una hermana, Shahrine, que es 18 meses mayor que ella. Cuando la madre de Shahrine estaba embarazada de Suhana, un tío llegó de visita. Durante la visita, el tío notó rápidamente que Shahrine no parecía hablar a un nivel apropiado a su edad, ni respondía cuando la llamaban. Shahrine también subía el volumen de la televisión y la radio cuando los otros podían escucharlas sin dificultad. Los padres de Shahrine pensaban que su desarrollo del habla y su conducta eran normales para una niña pequeña, pero gracias a que el tío expresó sus preocupaciones la familia pronto tomó medidas. Una prueba de audición encontró que Shahrine tenía dificultades auditivas.\r\n\r\nDebido al diagnóstico de Shahrine, a Suhana se le hizo una prueba de la audición al nacer y se encontró que también tenía dificultades auditivas. Si no hubiese sido por las preocupaciones expresadas por el tío de las niñas, no solo la pérdida auditiva de Shahrine podría haber seguido por más tiempo sin detectarse, sino que probablemente no se le habría hecho una prueba de audición a Suhana al nacer.\r\nComo consecuencia del diagnóstico temprano, los padres de Suhana y Shahrine pudieron adquirir los conocimientos necesarios para asegurarse de que sus hijas pudieran alcanzar su potencial máximo en la vida. Tuvieron acceso en una etapa temprana a servicios provistos por un equipo de médicos, terapeutas del habla, consejeros y maestros.\r\n\r\nSuhana da crédito a sus padres por sus propios éxitos, y dice que no hubiera podido llegar tan lejos sin su apoyo y paciencia. Hoy, Suhana está empleada en los Centros para el Control y la Prevención de Enfermedades (CDC) como epidemióloga en el Programa de Detección Auditiva e Intervención Tempranas (EHDI) de la agencia. Todos los niños que son sordos o tienen dificultades para oír reciben servicios fundamentales que necesitan gracias al Programa de EHDI, que financia el desarrollo de sistemas de datos y provee asistencia técnica para ayudar a mejorar las pruebas de detección, los diagnósticos y la intervención temprana en estos bebés. Cuando los niños que son sordos o tienen dificultades para oír reciben servicios en una etapa temprana, tienen más probabilidades de alcanzar todo su potencial y vivir una vida adulta saludable y productiva.\r\n\r\nLos CDC se enorgullecen por apoyar cada año en octubre el Mes Nacional de Concientización sobre las Oportunidades de Empleo para Personas con Discapacidades. Las metas del mes de concientización son educar al público sobre temas relacionados con el empleo y las discapacidades, y celebrar las muchas y variadas contribuciones de los trabajadores con discapacidades en los Estados Unidos.', '2022-02-15 19:18:41', '<h2 class=\"udlite-heading-xl requirements--title--2j7S2\"><span style=\"font-size: 14px;\">CONOCIMIENTOS Y HABILIDADES QUE PUEDO ENSE&Ntilde;ARTE</span></h2>\r\n\r\n\r\n\r\n<ul class=\"list-skills\">\r\n<li>&nbsp;Que es AJAX</li>\r\n<li>&nbsp;Enviar datos en distintas formas a un servidor mediante XMLHttpRequest</li>\r\n<li>&nbsp;Manejar respuestas de distintos tipos</li>\r\n<li>&nbsp;Controlar errores</li>\r\n<li>&nbsp;Abstracciones para simplificar el uso de XMLHttpRequest</li>\r\n</ul>\r\n\r\n\r\n', 'Castellano'),
(33, 68, 'Susana, sin brazo desde pequeña', 'Suhana tiene una hermana, Shahrine, que es 18 meses mayor que ella. Cuando la madre de Shahrine estaba embarazada de Suhana, un tío llegó de visita. Durante la visita, el tío notó rápidamente que Shahrine no parecía hablar a un nivel apropiado a su edad, ni respondía cuando la llamaban. Shahrine también subía el volumen de la televisión y la radio cuando los otros podían escucharlas sin dificultad. Los padres de Shahrine pensaban que su desarrollo del habla y su conducta eran normales para una niña pequeña, pero gracias a que el tío expresó sus preocupaciones la familia pronto tomó medidas. Una prueba de audición encontró que Shahrine tenía dificultades auditivas.\r\n\r\nDebido al diagnóstico de Shahrine, a Suhana se le hizo una prueba de la audición al nacer y se encontró que también tenía dificultades auditivas. Si no hubiese sido por las preocupaciones expresadas por el tío de las niñas, no solo la pérdida auditiva de Shahrine podría haber seguido por más tiempo sin detectarse, sino que probablemente no se le habría hecho una prueba de audición a Suhana al nacer.\r\nComo consecuencia del diagnóstico temprano, los padres de Suhana y Shahrine pudieron adquirir los conocimientos necesarios para asegurarse de que sus hijas pudieran alcanzar su potencial máximo en la vida. Tuvieron acceso en una etapa temprana a servicios provistos por un equipo de médicos, terapeutas del habla, consejeros y maestros.\r\n\r\nSuhana da crédito a sus padres por sus propios éxitos, y dice que no hubiera podido llegar tan lejos sin su apoyo y paciencia. Hoy, Suhana está empleada en los Centros para el Control y la Prevención de Enfermedades (CDC) como epidemióloga en el Programa de Detección Auditiva e Intervención Tempranas (EHDI) de la agencia. Todos los niños que son sordos o tienen dificultades para oír reciben servicios fundamentales que necesitan gracias al Programa de EHDI, que financia el desarrollo de sistemas de datos y provee asistencia técnica para ayudar a mejorar las pruebas de detección, los diagnósticos y la intervención temprana en estos bebés. Cuando los niños que son sordos o tienen dificultades para oír reciben servicios en una etapa temprana, tienen más probabilidades de alcanzar todo su potencial y vivir una vida adulta saludable y productiva.\r\n\r\nLos CDC se enorgullecen por apoyar cada año en octubre el Mes Nacional de Concientización sobre las Oportunidades de Empleo para Personas con Discapacidades. Las metas del mes de concientización son educar al público sobre temas relacionados con el empleo y las discapacidades, y celebrar las muchas y variadas contribuciones de los trabajadores con discapacidades en los Estados Unidos.', '2022-02-15 19:18:41', '<h2 class=\"udlite-heading-xl requirements--title--2j7S2\"><span style=\"font-size: 14px;\">CONOCIMIENTOS Y HABILIDADES QUE PUEDO ENSE&Ntilde;ARTE</span></h2>\r\n\r\n\r\n\r\n<ul class=\"list-skills\">\r\n<li>&nbsp;Que es AJAX</li>\r\n<li>&nbsp;Enviar datos en distintas formas a un servidor mediante XMLHttpRequest</li>\r\n<li>&nbsp;Manejar respuestas de distintos tipos</li>\r\n<li>&nbsp;Controlar errores</li>\r\n<li>&nbsp;Abstracciones para simplificar el uso de XMLHttpRequest</li>\r\n</ul>\r\n\r\n\r\n', 'Castellano'),
(34, 68, 'Susana, sin brazo desde pequeña', 'Suhana tiene una hermana, Shahrine, que es 18 meses mayor que ella. Cuando la madre de Shahrine estaba embarazada de Suhana, un tío llegó de visita. Durante la visita, el tío notó rápidamente que Shahrine no parecía hablar a un nivel apropiado a su edad, ni respondía cuando la llamaban. Shahrine también subía el volumen de la televisión y la radio cuando los otros podían escucharlas sin dificultad. Los padres de Shahrine pensaban que su desarrollo del habla y su conducta eran normales para una niña pequeña, pero gracias a que el tío expresó sus preocupaciones la familia pronto tomó medidas. Una prueba de audición encontró que Shahrine tenía dificultades auditivas.\r\n\r\nDebido al diagnóstico de Shahrine, a Suhana se le hizo una prueba de la audición al nacer y se encontró que también tenía dificultades auditivas. Si no hubiese sido por las preocupaciones expresadas por el tío de las niñas, no solo la pérdida auditiva de Shahrine podría haber seguido por más tiempo sin detectarse, sino que probablemente no se le habría hecho una prueba de audición a Suhana al nacer.\r\nComo consecuencia del diagnóstico temprano, los padres de Suhana y Shahrine pudieron adquirir los conocimientos necesarios para asegurarse de que sus hijas pudieran alcanzar su potencial máximo en la vida. Tuvieron acceso en una etapa temprana a servicios provistos por un equipo de médicos, terapeutas del habla, consejeros y maestros.\r\n\r\nSuhana da crédito a sus padres por sus propios éxitos, y dice que no hubiera podido llegar tan lejos sin su apoyo y paciencia. Hoy, Suhana está empleada en los Centros para el Control y la Prevención de Enfermedades (CDC) como epidemióloga en el Programa de Detección Auditiva e Intervención Tempranas (EHDI) de la agencia. Todos los niños que son sordos o tienen dificultades para oír reciben servicios fundamentales que necesitan gracias al Programa de EHDI, que financia el desarrollo de sistemas de datos y provee asistencia técnica para ayudar a mejorar las pruebas de detección, los diagnósticos y la intervención temprana en estos bebés. Cuando los niños que son sordos o tienen dificultades para oír reciben servicios en una etapa temprana, tienen más probabilidades de alcanzar todo su potencial y vivir una vida adulta saludable y productiva.\r\n\r\nLos CDC se enorgullecen por apoyar cada año en octubre el Mes Nacional de Concientización sobre las Oportunidades de Empleo para Personas con Discapacidades. Las metas del mes de concientización son educar al público sobre temas relacionados con el empleo y las discapacidades, y celebrar las muchas y variadas contribuciones de los trabajadores con discapacidades en los Estados Unidos.', '2022-02-15 19:18:41', '<h2 class=\"udlite-heading-xl requirements--title--2j7S2\"><span style=\"font-size: 14px;\">CONOCIMIENTOS Y HABILIDADES QUE PUEDO ENSE&Ntilde;ARTE</span></h2>\r\n\r\n\r\n\r\n<ul class=\"list-skills\">\r\n<li>&nbsp;Que es AJAX</li>\r\n<li>&nbsp;Enviar datos en distintas formas a un servidor mediante XMLHttpRequest</li>\r\n<li>&nbsp;Manejar respuestas de distintos tipos</li>\r\n<li>&nbsp;Controlar errores</li>\r\n<li>&nbsp;Abstracciones para simplificar el uso de XMLHttpRequest</li>\r\n</ul>\r\n\r\n\r\n', 'Castellano'),
(35, 69, 'Justin, mi experiencia', 'A los 5 años, a Justin se le diagnosticó por primera vez una discapacidad: TDA o trastorno por déficit de atención, que hoy en día se conoce como TDAH o trastorno por déficit de atención e hiperactividad. Como consecuencia del diagnóstico, lo retiraron del entorno de clases regulares y lo ubicaron en cursos de educación especial. Los educadores de Justin les informaron a sus padres que probablemente no se graduaría de la escuela secundaria superior, y mucho menos de la universidad.\r\n\r\nAños después, ya siendo un adulto joven, Justin contrajo la enfermedad de Ménière (un trastorno del oído interno), la cual afectó su audición y equilibrio. La aparición del trastorno dejó a Justin con la temible realidad de que podría perder su audición de forma permanente en cualquier momento. Justin recuerda cómo un antiguo supervisor se aprovechó de este conocimiento para hacerle una broma inadecuada: mientras hablaban en una reunión entre ellos, el sonido de la voz del supervisor paró de forma repentina, en cuanto que sus labios seguían moviéndose. Justin pensó que se había quedado sordo hasta que el supervisor comenzó a reírse, lo cual Justin pudo escuchar. Comportamientos como el señalado antes afectaron la confianza de Justin; aun así, él sabía que podía contribuir a la sociedad.\r\n\r\nImpulsado en parte por la adversidad, Justin volvió a los estudios, obtuvo un título universitario en negocios y, poco después, ingresó a la industria del mercadeo comercial. Sin embargo, a pesar de su educación y experiencia, Justin continuó siendo objeto, con regularidad, del mismo estigma. Muchas de las experiencias laborales de Justin a lo largo de su carrera lo hicieron sentir avergonzado, culpable, ofendido y, a veces, hasta intimidado. En lugar de infundirle confianza, lo dejaron desalentado, simplemente por ser una persona con capacidades diferentes.\r\n\r\nEn julio del 2013 todo cambió para Justin. Comenzó a trabajar en los Centros para el Control y la Prevención de Enfermedades como contratista de la División de Desarrollo Humano y Discapacidades en el Centro Nacional de Defectos Congénitos y Discapacidades del Desarrollo. Los colegas de Justin hacen hincapié en hacerlo sentir cómodo y respetado como miembro de una fuerza laboral diversa y productiva. Acogieron con agrado la diversidad de Justin, contribuyendo de modo positivo a su salud general.\r\n\r\nLa misión de la División de Desarrollo Humano y Discapacidades es conducir la salud pública para prevenir enfermedades y promover la equidad en la salud y el desarrollo de los niños y adultos con discapacidades o que tienen riesgo de presentarlas. Uno de cada dos adultos con discapacidades no realiza la suficiente actividad física aeróbica1, y para Justin, la actividad física regular es importante para ayudarlo a combatir coágulos de sangre potencialmente letales debido al trastorno genético de coagulación de la sangre que tiene. Todas las horas de trabajo, Justin camina por unos minutos, hace estiramiento o usa su bicicleta de escritorio. Justin también participa en reuniones que se hacen caminando, lo cual, en su opinión, conduce a que sean más creativas y productivas.\r\n\r\nHistorias como las de Justin nos recuerdan que el empleo y la salud están conectados. Los CDC se enorgullecen por apoyar cada año en octubre el Mes Nacional de Concientización sobre las Oportunidades de Empleo para Personas con Discapacidades. El mes de concientización tiene como objetivo educar sobre temas relacionados con el empleo y las discapacidades, y celebrar las muchas y variadas contribuciones de los trabajadores con discapacidades en los Estados Unidos.', '2022-02-15 19:18:38', '<p>Es molt important per a treballar dominar les millors llibreries de javascript</p>', 'Valencia'),
(36, 67, 'Historia de Jerry', 'Jerry tiene 53 años y cuatro hijos. Es independiente, tiene una casa, formó una familia y sus hijos adultos todavía acuden a él en busca de apoyo. Jerry se jubiló de programador informático en el 2009 y compite y entrena a otros en varios deportes. Esta persona que lleva una vida normal y saludable hasta ha participado en la maratón de Boston.\r\n\r\nJerry también ha tenido una discapacidad por más de 35 años. El 3 de diciembre de 1976 (el mismo día en que se conmemora el Día Internacional de las Personas con Discapacidades) a Jerry lo atropelló un conductor embriagado. El accidente lo dejó parcialmente parapléjico.\r\n\r\nA la vida de Jerry no la define su discapacidad. Él vive su vida al igual que las personas que no tienen una discapacidad. “Hay mucho que puedo hacer y hay ciertas cosas que no”, expresó Jerry. “Manejo, invierto dinero. No soy rico, pero tampoco pobre. Me gusta estar sano y ser independiente”, agregó.\r\n\r\nSin embargo, como persona con una discapacidad, Jerry ha enfrentado muchas barreras. Mientras se recuperaba de una operación reciente del manguito de los rotadores, los especialistas de rehabilitación “no podían ver más allá de su discapacidad”, y le administraban pruebas y le hacían visitas de rehabilitación adicionales que una persona sin una discapacidad no recibiría. Una vez lo estaban preparando para una operación cuando una enfermera dijo: “No necesita una epidural, es parapléjico”. Jerry le tuvo que informar a la enfermera que solo era parcialmente parapléjico y que definitivamente necesitaría una epidural.\r\nJerry estaba en la fila en un tribunal de Alabama para renovar su permiso de estacionamiento y también renovar el registro del auto de su hijo. Vio cómo un trabajador se acercaba a las personas en la fila y les preguntaba qué necesitaban. Cuando llegó a donde estaba Jerry y vio la silla de ruedas, le preguntó: “¿Usted con quién vino hasta aquí?”. Y a Jerry le cuesta ir a los conciertos o juegos de béisbol con un grupo grande de familiares o amigos, porque es muy difícil encontrar boletos con acceso para los discapacitados para más de dos personas.\r\n\r\nJerry ha visto mucho en más de 35 años viviendo con una discapacidad. Ha visto que muchos de los obstáculos y actitudes hacia las personas con discapacidades todavía existen. Aunque también ha notado muchos cambios positivos para lograr que las personas con discapacidades se mantengan físicamente activas mediante oportunidades recreativas como golf, pesca y hasta esquí en la nieve. Existen organizaciones en la actualidad como la Fundación Lakeshore, en donde Jerry trabaja a tiempo parcial como entrenador de baloncesto y atletismo, que proporcionan oportunidades para la recreación.\r\n\r\nJerry expresa lo siguiente: “No espero que el mundo gire alrededor nuestro. Me adaptaré, solo necesito que las cosas se hagan de manera en que yo pueda adaptarme”.', '2022-02-15 19:14:27', '<ul>\r\n<li>You will learn how to create your own website with Angular.</li>\r\n<li>Create components in Angular to structure our web.</li>\r\n<li>Learn how to use Angular Data-Binding.</li>\r\n<li>You will learn how to use Angular directives to manage the DOM.</li>\r\n<li>You will work with the navigation inside an Angular application.</li>\r\n<li>Learn how to make Http requests to REST API servers.</li>\r\n<li>Create and use template form in Angular.</li>\r\n</ul>', 'Spanish'),
(44, 70, 'd', 'd', '2022-05-05 15:26:16', 'd', 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_deleted`
--

CREATE TABLE `historias_deleted` (
  `id_deleted` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenido` text NOT NULL,
  `idioma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `id_hilo` int(11) NOT NULL,
  `envia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `asunto` varchar(300) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `profesorV` tinyint(1) NOT NULL,
  `alumnoV` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_hilo`, `envia`, `id_profesor`, `id_alumno`, `asunto`, `mensaje`, `fecha_creacion`, `profesorV`, `alumnoV`) VALUES
(81, 9, 69, 70, 69, 'Hola', 'Cuando tienes libre', '2022-02-17 15:11:44', 0, 1),
(82, 8, 70, 70, 72, 'Clases de modelo vista controlador', 'Hola\n', '2022-04-21 14:21:22', 1, 1),
(83, 9, 70, 70, 69, 'Hola', 'Hoy', '2022-04-21 14:23:54', 0, 1),
(84, 6, 70, 70, 69, 'Info clases', 'hola', '2022-05-17 08:56:26', 1, 1),
(85, 6, 70, 70, 69, 'Info clases', 'holaaa', '2022-05-17 10:58:58', 1, 1),
(86, 6, 69, 70, 69, 'Info clases', 'que tal diego? Soy Edu', '2022-05-17 11:02:02', 1, 1),
(87, 10, 69, 70, 69, 'Prueba', 'Hola Jerry', '2022-05-17 12:29:34', 1, 1),
(88, 10, 70, 70, 69, 'Prueba', 'Hola Edu', '2022-05-17 13:15:10', 1, 1),
(89, 10, 69, 70, 69, 'Prueba', 'Hola diego', '2022-05-17 13:15:51', 1, 1),
(90, 10, 69, 70, 69, 'Prueba', 'Hola Edu', '2022-05-17 13:21:26', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_foro`
--

CREATE TABLE `respuestas_foro` (
  `id_respuesta` int(8) NOT NULL,
  `contenido_respuesta` text NOT NULL,
  `fecha_respuesta` timestamp NULL DEFAULT current_timestamp(),
  `tema_respuesta` int(8) NOT NULL,
  `by_respuesta` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas_foro`
--

INSERT INTO `respuestas_foro` (`id_respuesta`, `contenido_respuesta`, `fecha_respuesta`, `tema_respuesta`, `by_respuesta`) VALUES
(1, 'Hola esto es una pregunta de deportes?', '2022-05-10 22:00:00', 11, 70),
(4, 'Si y esto es una respuesta de deportes', '2022-05-10 22:00:00', 11, 70),
(56, '<p>hola pregunto en el tema 1</p>\r\n<p>&nbsp;</p>', '2022-05-12 14:52:38', 14, 70),
(57, '<p>Hola pregunto en el tema 2 de adaptaciones</p>', '2022-05-12 14:53:01', 15, 70),
(58, '<p>Hola pregunto en el tema 3 de adaptaciones</p>', '2022-05-12 14:53:12', 16, 70),
(59, '\r\nhola respondo en el tema 1\r\n', '2022-05-12 15:26:14', 14, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_foro`
--

CREATE TABLE `temas_foro` (
  `id_tema` int(8) NOT NULL,
  `asunto_tema` varchar(255) NOT NULL,
  `fecha_tema` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_tema` int(8) NOT NULL,
  `by_tema` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temas_foro`
--

INSERT INTO `temas_foro` (`id_tema`, `asunto_tema`, `fecha_tema`, `categoria_tema`, `by_tema`) VALUES
(13, 'Prueba tema deportes', '2022-05-12 15:26:14', 2, 70),
(14, 'tema 1 en adaptaciones', '2022-05-05 11:41:53', 3, 70),
(15, 'tema 2 en adaptaciones', '2022-05-05 11:41:53', 3, 70),
(16, 'tema 3 en adaptaciones', '2022-05-05 11:41:53', 3, 70),
(17, 'tema 2 en deportes', '2022-05-05 11:41:53', 2, 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `vr_apps` text DEFAULT NULL,
  `foto_perfil` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `rol` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `google` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `apellidos`, `email`, `telefono`, `fecha_nac`, `descripcion`, `vr_apps`, `foto_perfil`, `fecha_creacion`, `rol`, `activo`, `google`) VALUES
(67, 'irenenebot', '$2a$07$usesomesillystringforeWVToD0pxxo0Lsm2e352uMsZfajDx.2C', 'Irene', 'Nebot', 'i10485470@gmail.com', '', '2002-10-08', '<p>Esta es<em><span style=\"font-size: 14pt;\"><strong> mi descripci&oacute;n.</strong></span></em></p>', '<p>Mi nuevo <span style=\"text-decoration: underline; font-size: 18pt; background-color: #f1c40f;\">portfolio</span></p>', 'img/irenenebot.jpg', '2022-02-15 20:09:24', 1, 1, 0),
(68, 'marsur', '$2a$07$usesomesillystringforeZr7Xxveqb9KJlCHOb9Dye7s1ZwC/.Tq', 'María', 'Surname', 'mariasantanaruizweb@gmail.com', '612345678', '2000-04-15', '', '', 'img/marsur.png', '2022-02-15 20:09:48', 1, 1, 0),
(69, 'Eromeu', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Eduard', 'Romeu', 'eduromeu1@gmail.com', '123456789', '1998-11-16', '', '', 'https://lh3.googleusercontent.com/a-/AOh14GgGpu0YzX09HShLwXR0RN5fJKjp-aJjmw2Dw_Ci=s96-c', '2022-02-15 20:11:40', 1, 1, 1),
(70, 'diego', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Diego', 'Serano', 'diegoserrano1644@gmail.com', '600619959', '2001-11-16', 'Hola mi nombre es Diego Serrano Mañes', 'VR APPS Prueba', 'img/diego.jpeg', '2022-02-15 20:11:49', 1, 1, 0),
(71, 'enanito', '$2a$07$usesomesillystringforegBG44vzkvCfNjlZIF.O11TVclaznc.W', 'Elena', 'Nito', 'mighzpjgujcsisezir@nthrl.com', '616222344', '1984-12-03', NULL, NULL, 'img/default_user.png', '2022-02-16 13:16:43', 1, 1, 0),
(72, 'jorgesan', '$2a$07$usesomesillystringforeoWLQPJM.Xxom.c1imWp1e1BmwhDkOHy', 'jorge', 'sandoval', 'yjmvhqgitlwptpjhsg@nthrw.com', '613456789', '1998-10-30', '<p>Esta es mi descripci&oacute;n</p>', '', 'img/default_user.png', '2022-02-16 16:18:35', 1, 1, 0),
(73, 'Fernandoco', '$2a$07$usesomesillystringforeTRe.EyhHzlzd1EnijTdTg0IN.5.XLhy', 'Fernando', 'Tejero', 'upzfcmzkzlvvgylkwl@nthrl.com', '777777777', '1996-02-16', NULL, NULL, 'img/default_user.png', '2022-02-16 16:23:35', 1, 1, 0),
(74, 'Emilio', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Emilio', 'Garrigues Ruiz', 'marquistasred@gmail.com', '523914', '2001-11-16', NULL, NULL, 'img/default_user.png', '2022-03-29 15:03:16', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tokens`
--

CREATE TABLE `usuario_tokens` (
  `id_user` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_tokens`
--

INSERT INTO `usuario_tokens` (`id_user`, `token`, `fecha`) VALUES
(70, '25dfce9a9071da9a855823decbcd3776a8dd631f', '2022-04-29'),
(74, '07f7aba59da26a6103a4b21cc6c55189a75b29a1', '2022-04-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_foro`
--
ALTER TABLE `categorias_foro`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  ADD PRIMARY KEY (`id_deleted`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `envia` (`envia`);

--
-- Indices de la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `by_respuesta` (`by_respuesta`),
  ADD KEY `tema_respuesta` (`tema_respuesta`);

--
-- Indices de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `by_tema` (`by_tema`),
  ADD KEY `categoria_tema` (`categoria_tema`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuario_tokens`
--
ALTER TABLE `usuario_tokens`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_foro`
--
ALTER TABLE `categorias_foro`
  MODIFY `id_categoria` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  MODIFY `id_deleted` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  MODIFY `id_respuesta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  MODIFY `id_tema` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `historias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  ADD CONSTRAINT `historias_deleted_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  ADD CONSTRAINT `respuestas_foro_ibfk_1` FOREIGN KEY (`by_respuesta`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_foro_ibfk_2` FOREIGN KEY (`tema_respuesta`) REFERENCES `temas_foro` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  ADD CONSTRAINT `temas_foro_ibfk_1` FOREIGN KEY (`by_tema`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `temas_foro_ibfk_2` FOREIGN KEY (`categoria_tema`) REFERENCES `categorias_foro` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_tokens`
--
ALTER TABLE `usuario_tokens`
  ADD CONSTRAINT `usuario_tokens_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
