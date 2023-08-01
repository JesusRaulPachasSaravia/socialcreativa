/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - socialcreativa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`socialcreativa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `socialcreativa`;

/*Table structure for table `aulas` */

DROP TABLE IF EXISTS `aulas`;

CREATE TABLE `aulas` (
  `idaula` smallint(6) NOT NULL AUTO_INCREMENT,
  `numaula` varchar(10) NOT NULL,
  `aforo` int(11) NOT NULL,
  `ubicacion` varchar(30) NOT NULL DEFAULT 'Sede Principal',
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idaula`),
  CONSTRAINT `chk_estado_aulas` CHECK (`estado` in ('1','0')),
  CONSTRAINT `chk_ubicacion_aulas` CHECK (`ubicacion` in ('Sede Grocio Prado','Sede Pilpa','Sede Principal','Club Internacional'))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `aulas` */

insert  into `aulas`(`idaula`,`numaula`,`aforo`,`ubicacion`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,'001',20,'Club Internacional','2023-05-19 10:12:58',NULL,'1'),
(2,'002',10,'Club Internacional','2023-05-19 10:12:58',NULL,'1'),
(3,'003',17,'Club Internacional','2023-05-19 10:12:58',NULL,'1'),
(4,'004',10,'Club Internacional','2023-05-19 10:12:58',NULL,'1'),
(5,'005',15,'Club Internacional','2023-07-30 16:57:04',NULL,'1'),
(6,'006',10,'Sede Principal','2023-07-30 17:05:27','2023-07-30 17:35:22','0');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idcategoria` smallint(6) NOT NULL AUTO_INCREMENT,
  `idespecialidad` int(11) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcategoria`),
  KEY `fk_idespecialidad_especialidadcategorias` (`idespecialidad`),
  CONSTRAINT `fk_idespecialidad_especialidadcategorias` FOREIGN KEY (`idespecialidad`) REFERENCES `especialidades` (`idespecialidad`),
  CONSTRAINT `chk_estado_especialidadcategorias` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categorias` */

insert  into `categorias`(`idcategoria`,`idespecialidad`,`categoria`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,1,'Musica','2023-05-19 10:14:15',NULL,'1'),
(2,2,'Musica','2023-05-19 10:14:15',NULL,'1'),
(3,3,'Musica','2023-05-19 10:14:15',NULL,'1'),
(4,1,'Música','2023-05-19 10:14:15',NULL,'1'),
(5,2,'Música','2023-05-19 10:14:15',NULL,'1'),
(6,3,'Música','2023-05-19 10:14:15',NULL,'1');

/*Table structure for table `categorias_habilidades` */

DROP TABLE IF EXISTS `categorias_habilidades`;

CREATE TABLE `categorias_habilidades` (
  `idcategoria_habi` smallint(6) NOT NULL AUTO_INCREMENT,
  `categoria_habilida` varchar(40) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcategoria_habi`),
  UNIQUE KEY `categoria_habilida` (`categoria_habilida`),
  CONSTRAINT `chk_estado_categoriahabilidades` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categorias_habilidades` */

insert  into `categorias_habilidades`(`idcategoria_habi`,`categoria_habilida`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,'Música','2023-05-19 10:05:58',NULL,'1'),
(2,'Danza','2023-05-19 10:05:58',NULL,'1'),
(3,'Pintura y Dibujo','2023-05-19 10:05:58',NULL,'1'),
(4,'Oratoria','2023-05-19 10:05:58',NULL,'1'),
(5,'Teatro','2023-05-19 10:05:58',NULL,'1'),
(6,'Minichef','2023-05-19 10:05:58',NULL,'1');

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` smallint(6) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `idaula` smallint(6) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `edadminima` int(11) NOT NULL,
  `edadmaxima` int(11) NOT NULL,
  `vacantes` int(11) NOT NULL,
  `totalhoras` int(11) NOT NULL,
  `precio` float(6,2) NOT NULL,
  `fecha_fin` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT 'I',
  `imagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `fk_idcategoria_cursos` (`idcategoria`),
  KEY `fk_idprofesor_cursos` (`idprofesor`),
  KEY `fk_idaula_cursos` (`idaula`),
  CONSTRAINT `fk_idaula_cursos` FOREIGN KEY (`idaula`) REFERENCES `aulas` (`idaula`),
  CONSTRAINT `fk_idcategoria_cursos` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`),
  CONSTRAINT `fk_idprofesor_cursos` FOREIGN KEY (`idprofesor`) REFERENCES `profesores` (`idprofesor`),
  CONSTRAINT `chk_estado_cursos` CHECK (`estado` in ('A','E','I','C','F'))
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cursos` */

insert  into `cursos`(`idcurso`,`idcategoria`,`idprofesor`,`idaula`,`titulo`,`descripcion`,`nivel`,`edadminima`,`edadmaxima`,`vacantes`,`totalhoras`,`precio`,`fecha_fin`,`fecha_inicio`,`fecha_alta`,`fecha_baja`,`estado`,`imagen`) values 
(1,1,4,1,'Violìn','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',10,14,10,70,50.00,'2023-09-10','2023-07-10','2023-07-10 22:08:30',NULL,'I','violin.jpg'),
(2,1,4,2,'Corno Fránces','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',10,16,10,70,80.00,'2023-10-10','2023-07-10','2023-07-10 22:12:26',NULL,'F','corno.jpg'),
(3,1,2,3,'Piano','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',12,16,4,70,100.00,'2023-10-10','2023-07-10','2023-07-10 22:14:27',NULL,'A','piano.jpg'),
(4,1,2,3,'Trompeta','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',12,16,10,70,40.00,'2023-09-10','2023-07-10','2023-07-10 22:16:55',NULL,'E','trompeta.jpg'),
(5,1,3,3,'Trombón','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',10,14,10,70,50.00,'2023-09-10','2023-07-10','2023-07-10 22:18:46',NULL,'I','trombon.jpg'),
(6,1,3,4,'Arpa','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',10,15,6,70,90.00,'2023-09-10','2023-07-10','2023-07-10 22:21:07',NULL,'I','arpa.jpg'),
(7,1,4,1,'Violìn','Si buscas un reto significativo y deseas convertirte en un experto en el violin, este curso avanzado es para ti. Profundizarás en temas complejos,  y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','Avanzado',14,18,14,70,50.00,'2023-07-10','2023-07-10','2023-07-10 22:40:11',NULL,'E','violin.jpg'),
(8,1,4,2,'Corno Fránces','Si buscas un reto significativo y deseas convertirte en un experto en el corno, este curso avanzado es para ti. Profundizarás en temas complejos,  y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','Avanzado',16,20,5,70,75.00,'2023-07-10','2023-07-10','2023-07-10 22:44:24',NULL,'E','corno.jpg'),
(9,1,2,3,'Piano','Si buscas un reto significativo y deseas convertirte en un experto en el piano, este curso avanzado es para ti. Profundizarás en temas complejos,  y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','Avanzado',14,20,4,70,120.20,'2023-07-10','2023-07-10','2023-07-10 22:47:48',NULL,'I','piano.jpg'),
(10,1,2,3,'Trompeta','Si buscas un reto significativo y deseas convertirte en un experto en la trompeta, este curso avanzado es para ti. Profundizarás en temas complejos,  y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','Avanzado',15,22,1,80,80.00,'2023-05-10','2023-02-10','2023-01-25 22:50:35',NULL,'E','trompeta.jpg'),
(11,1,3,3,'Trombón','Si buscas un reto significativo y deseas convertirte en un experto en el trombòn, este curso avanzado es para ti. Profundizarás en temas complejos,  y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','Avanzado',15,22,1,70,75.00,'2023-04-15','2023-01-15','2023-01-17 22:51:36',NULL,'F','trombon.jpg'),
(12,1,3,4,'Arpa','Si buscas un reto significativo y deseas convertirte en un experto en el arpa, este curso avanzado es para ti. Profundizarás en temas complejos,  y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','Avanzado',12,18,1,70,100.00,'2023-04-10','2023-01-10','2023-07-10 22:53:10',NULL,'A','arpa.jpg'),
(17,1,2,1,'Acordeon','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',15,30,80,70,30.00,'2023-12-01','2023-07-21','2023-07-21 15:29:23',NULL,'A','acordeon.jpg'),
(18,1,1,1,'Bateria','Este curso introductorio es perfecto para quienes desean adentrarse en el fascinante mundo de la mùsica. Aprenderás los conceptos básicos y fundamentales de forma práctica y amena, sentando las bases para un sólido conocimiento en el instrumento.','introductorio',18,40,15,70,40.00,'2023-09-29','2023-07-30','2023-07-21 16:14:45',NULL,'I','bateria.jpg'),
(26,1,4,1,'Trompeta','Si buscas un reto significativo y deseas convertirte en un experto en la trompeta, este curso avanzado es para ti. Profundizarás en temas complejos,  y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','avanzado',15,30,5,70,100.00,'2023-11-08','2023-08-01','2023-08-01 15:12:49',NULL,'A','8e1ea86aadc938efa53b7913ba15581189a5a81e.jpg'),
(27,1,4,2,'Piano 2','Si buscas un reto significativo y deseas convertirte en un experto en el piano, este curso avanzado es para ti. Profundizarás en temas complejos, y desarrollarás habilidades nuevas. ¡Prepárate para alcanzar un nivel de dominio excepcional!','introductorio',17,20,20,80,40.00,'2023-10-28','2023-08-02','2023-08-01 16:13:03',NULL,'I','f22159abd32e04c65401e83c6823ab7198c1c211.jpg');

/*Table structure for table `desbloqueos` */

DROP TABLE IF EXISTS `desbloqueos`;

CREATE TABLE `desbloqueos` (
  `iddesbloqueo` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `codigodesbloqueo` char(4) NOT NULL,
  `fechaAlta` datetime NOT NULL DEFAULT current_timestamp(),
  `fechaActivacion` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `email` varchar(120) NOT NULL,
  PRIMARY KEY (`iddesbloqueo`),
  KEY `fk_idusuario_desbloqueeo` (`idusuario`),
  CONSTRAINT `fk_idusuario_desbloqueeo` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  CONSTRAINT `chk_estado_desbloqueos` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `desbloqueos` */

insert  into `desbloqueos`(`iddesbloqueo`,`idusuario`,`codigodesbloqueo`,`fechaAlta`,`fechaActivacion`,`estado`,`email`) values 
(1,8,'9246','2023-06-23 17:58:03',NULL,'0','jesusraulps@gmail.com'),
(2,1,'8273','2023-06-30 17:07:30',NULL,'0','joseandresmontesino@gmail.com'),
(3,1,'6803','2023-06-30 17:09:40',NULL,'0','joseandresmontesino@gmail.com'),
(4,1,'4453','2023-06-30 17:22:51',NULL,'0','joseandresmontesino@gmail.com'),
(5,1,'1864','2023-06-30 17:28:27',NULL,'0','joseandresmontesino@gmail.com');

/*Table structure for table `especialidades` */

DROP TABLE IF EXISTS `especialidades`;

CREATE TABLE `especialidades` (
  `idespecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `nomespecialidad` varchar(30) NOT NULL,
  `comentario` varchar(80) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idespecialidad`),
  UNIQUE KEY `nomespecialidad` (`nomespecialidad`),
  CONSTRAINT `chk_estado_especialidades` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `especialidades` */

insert  into `especialidades`(`idespecialidad`,`nomespecialidad`,`comentario`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,'Trompeta',NULL,'2023-05-19 10:14:02',NULL,'1'),
(2,'Guitarra',NULL,'2023-05-19 10:14:02',NULL,'1'),
(3,'Violin',NULL,'2023-05-19 10:14:02',NULL,'1'),
(4,'Viola',NULL,'2023-05-19 10:14:02',NULL,'1'),
(5,'Corno',NULL,'2023-05-19 10:14:02',NULL,'1');

/*Table structure for table `habilidades` */

DROP TABLE IF EXISTS `habilidades`;

CREATE TABLE `habilidades` (
  `idhabilidades` smallint(6) NOT NULL AUTO_INCREMENT,
  `idcategoria_habi` smallint(6) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `habilidad` varchar(40) NOT NULL,
  `comentario` varchar(80) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idhabilidades`),
  KEY `fk_idprofesor_habilidades` (`idprofesor`),
  KEY `fk_idcategoria_habilidades` (`idcategoria_habi`),
  CONSTRAINT `fk_idcategoria_habilidades` FOREIGN KEY (`idcategoria_habi`) REFERENCES `categorias_habilidades` (`idcategoria_habi`),
  CONSTRAINT `fk_idprofesor_habilidades` FOREIGN KEY (`idprofesor`) REFERENCES `profesores` (`idprofesor`),
  CONSTRAINT `chk_estado_habilidades` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `habilidades` */

insert  into `habilidades`(`idhabilidades`,`idcategoria_habi`,`idprofesor`,`habilidad`,`comentario`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,1,1,'Trompeta',NULL,'2023-05-19 10:10:59',NULL,'1'),
(2,1,1,'Tuba',NULL,'2023-05-19 10:10:59',NULL,'1'),
(3,1,2,'Guitarra',NULL,'2023-05-19 10:10:59',NULL,'1'),
(4,1,2,'Bajo',NULL,'2023-05-19 10:10:59',NULL,'1'),
(5,1,3,'Violín',NULL,'2023-05-19 10:10:59',NULL,'1'),
(6,1,3,'Viola',NULL,'2023-05-19 10:10:59',NULL,'1'),
(7,1,4,'Violonchelo',NULL,'2023-05-19 10:10:59',NULL,'1'),
(8,1,4,'Flauta',NULL,'2023-05-19 10:10:59',NULL,'1');

/*Table structure for table `horarios` */

DROP TABLE IF EXISTS `horarios`;

CREATE TABLE `horarios` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `dia` char(1) NOT NULL,
  `horainicio` time NOT NULL,
  `horafin` time NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idhorario`),
  KEY `fk_idcurso_horarios` (`idcurso`),
  CONSTRAINT `fk_idcurso_horarios` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `chk_estado_horarios` CHECK (`estado` in ('1','0')),
  CONSTRAINT `chk_dia_horarios` CHECK (`dia` in ('L','M','X','J','V','S'))
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

/*Data for the table `horarios` */

insert  into `horarios`(`idhorario`,`idcurso`,`dia`,`horainicio`,`horafin`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,1,'L','09:00:00','11:00:00','2023-07-10 22:57:58',NULL,'1'),
(2,1,'X','09:00:00','11:00:00','2023-07-10 22:58:13',NULL,'1'),
(3,1,'V','09:00:00','11:00:00','2023-07-10 22:58:39',NULL,'1'),
(4,2,'L','10:00:00','12:00:00','2023-07-10 22:59:57',NULL,'1'),
(5,2,'M','10:00:00','12:00:00','2023-07-10 23:00:10',NULL,'1'),
(6,2,'J','10:00:00','12:00:00','2023-07-10 23:00:19',NULL,'1'),
(7,3,'L','14:00:00','16:00:00','2023-07-10 23:01:26',NULL,'1'),
(8,3,'X','10:00:00','12:00:00','2023-07-10 23:01:26',NULL,'1'),
(9,3,'V','14:00:00','16:00:00','2023-07-10 23:01:35',NULL,'1'),
(10,4,'M','14:00:00','16:00:00','2023-07-10 23:02:52',NULL,'1'),
(11,4,'J','10:00:00','12:00:00','2023-07-10 23:02:52',NULL,'1'),
(12,4,'S','09:00:00','12:00:00','2023-07-10 23:02:52',NULL,'1'),
(13,5,'X','14:00:00','17:00:00','2023-07-10 23:03:29',NULL,'1'),
(14,5,'J','10:00:00','11:00:00','2023-07-10 23:03:29',NULL,'1'),
(15,5,'V','09:00:00','12:00:00','2023-07-10 23:03:29',NULL,'1'),
(16,6,'M','14:00:00','17:00:00','2023-07-10 23:05:28',NULL,'1'),
(17,6,'X','10:00:00','11:00:00','2023-07-10 23:05:28',NULL,'1'),
(18,6,'J','09:00:00','12:00:00','2023-07-10 23:05:28',NULL,'1'),
(19,7,'M','14:00:00','17:00:00','2023-07-10 23:06:13',NULL,'1'),
(20,7,'X','10:00:00','11:00:00','2023-07-10 23:06:13',NULL,'1'),
(21,7,'J','09:00:00','12:00:00','2023-07-10 23:06:13',NULL,'1'),
(22,8,'L','14:00:00','17:00:00','2023-07-10 23:06:35',NULL,'1'),
(23,8,'X','10:00:00','11:00:00','2023-07-10 23:06:35',NULL,'1'),
(24,8,'S','09:00:00','12:00:00','2023-07-10 23:06:35',NULL,'1'),
(25,9,'L','15:00:00','18:00:00','2023-07-10 23:07:09',NULL,'1'),
(26,9,'J','15:00:00','16:00:00','2023-07-10 23:07:09',NULL,'1'),
(27,9,'S','09:00:00','12:00:00','2023-07-10 23:07:09',NULL,'1'),
(28,10,'L','15:00:00','18:00:00','2023-07-10 23:07:33',NULL,'1'),
(29,10,'J','15:00:00','17:00:00','2023-07-10 23:07:33',NULL,'1'),
(30,10,'S','10:00:00','12:00:00','2023-07-10 23:07:33',NULL,'1'),
(31,11,'L','15:00:00','17:00:00','2023-07-10 23:08:06',NULL,'1'),
(32,11,'J','15:00:00','17:00:00','2023-07-10 23:08:06',NULL,'1'),
(33,11,'S','09:00:00','12:00:00','2023-07-10 23:08:06',NULL,'1'),
(34,12,'L','14:00:00','16:00:00','2023-07-10 23:08:26',NULL,'1'),
(35,12,'J','15:00:00','17:00:00','2023-07-10 23:08:26',NULL,'1'),
(36,12,'S','09:00:00','12:00:00','2023-07-10 23:08:26',NULL,'1'),
(37,17,'L','10:30:00','15:30:00','2023-07-21 15:30:12',NULL,'1'),
(38,17,'J','07:30:00','13:30:00','2023-07-21 15:30:12',NULL,'1'),
(39,17,'V','10:30:00','12:30:00','2023-07-21 15:30:12',NULL,'1'),
(40,18,'L','10:00:00','12:00:00','2023-07-21 16:15:46',NULL,'1'),
(41,18,'X','14:00:00','16:00:00','2023-07-21 16:15:46',NULL,'1'),
(42,18,'J','16:00:00','18:00:00','2023-07-21 16:15:46',NULL,'1'),
(43,18,'S','09:00:00','12:00:00','2023-07-21 16:15:46',NULL,'1'),
(44,26,'L','09:30:00','12:00:00','2023-08-01 15:48:15',NULL,'1'),
(45,26,'J','14:00:00','16:00:00','2023-08-01 15:48:15',NULL,'1'),
(46,26,'S','09:00:00','12:00:00','2023-08-01 15:48:15',NULL,'1');

/*Table structure for table `matriculas` */

DROP TABLE IF EXISTS `matriculas`;

CREATE TABLE `matriculas` (
  `idmatricula` int(11) NOT NULL AUTO_INCREMENT,
  `idalumno` int(11) NOT NULL,
  `idapoderado` int(11) DEFAULT NULL,
  `parentesco` varchar(20) DEFAULT NULL,
  `idcurso` int(11) NOT NULL,
  `fechamatricula` date DEFAULT NULL,
  `observacion` varchar(80) DEFAULT NULL,
  `estaMatriculado` char(1) NOT NULL DEFAULT '0',
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idmatricula`),
  KEY `fk_idalumno_matriculas` (`idalumno`),
  KEY `fk_idapoderado_matriculas` (`idapoderado`),
  KEY `fk_idcurso_matriculas` (`idcurso`),
  CONSTRAINT `fk_idalumno_matriculas` FOREIGN KEY (`idalumno`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `fk_idapoderado_matriculas` FOREIGN KEY (`idapoderado`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `fk_idcurso_matriculas` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `chk_estado_matriculas` CHECK (`estado` in ('1','0')),
  CONSTRAINT `chk_estaMatriculado_matriculas` CHECK (`estaMatriculado` in ('1','0','2'))
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

/*Data for the table `matriculas` */

insert  into `matriculas`(`idmatricula`,`idalumno`,`idapoderado`,`parentesco`,`idcurso`,`fechamatricula`,`observacion`,`estaMatriculado`,`fecha_alta`,`fecha_baja`,`estado`) values 
(17,36,28,'Tío',12,'2023-07-10',NULL,'1','2023-07-10 23:19:12',NULL,'1'),
(18,26,NULL,NULL,12,'2023-07-10',NULL,'1','2023-07-10 23:21:38',NULL,'1'),
(19,35,28,'Padrino',12,'2023-07-10',NULL,'1','2023-07-10 23:28:42',NULL,'1'),
(20,34,25,'Padrastro',12,'2023-07-10',NULL,'1','2023-07-10 23:29:27',NULL,'1'),
(21,33,24,'Tío',12,'2023-07-10',NULL,'1','2023-07-10 23:30:11',NULL,'1'),
(22,32,22,'Primo',12,'2023-07-10',NULL,'1','2023-07-10 23:30:26',NULL,'1'),
(23,31,28,'Primo',11,'2023-04-15',NULL,'1','2023-04-15 00:19:55',NULL,'1'),
(24,30,7,'Tía',11,'2023-04-15',NULL,'1','2023-04-15 00:20:38',NULL,'1'),
(25,11,26,'Papá',11,'2023-04-15',NULL,'1','2023-04-15 00:21:16',NULL,'1'),
(26,29,6,'Primo',11,'2023-04-15',NULL,'1','2023-04-15 00:21:49',NULL,'1'),
(27,28,9,'Prima',11,'2023-04-15',NULL,'1','2023-04-15 00:22:24',NULL,'1'),
(31,27,28,'Papá',10,'2023-05-15',NULL,'1','2023-05-15 00:47:34',NULL,'1'),
(32,24,5,'Prima',10,'2023-07-31',NULL,'1','2023-05-15 00:47:59',NULL,'1'),
(33,11,10,'Primo',10,'2023-05-15',NULL,'1','2023-05-15 00:49:02',NULL,'1'),
(35,36,28,'Tío',10,'2023-05-15',NULL,'1','2023-05-15 00:49:26',NULL,'1'),
(36,12,NULL,NULL,18,'2023-08-01',NULL,'1','2023-07-31 20:10:15',NULL,'1'),
(37,24,NULL,NULL,6,'2023-08-01',NULL,'1','2023-07-31 20:50:59',NULL,'1'),
(38,24,NULL,NULL,9,'2023-08-01',NULL,'1','2023-07-31 21:08:20',NULL,'1'),
(39,11,24,'Padrino',2,'2023-07-31',NULL,'1','2023-07-31 21:28:55',NULL,'1'),
(40,11,12,'Padrino',18,'2023-08-01',NULL,'1','2023-07-31 22:51:33',NULL,'1'),
(41,6,NULL,NULL,9,'2023-08-01',NULL,'1','2023-08-01 01:51:03',NULL,'1'),
(43,24,NULL,NULL,18,'2023-08-01',NULL,'1','2023-08-01 11:23:45',NULL,'1'),
(44,26,NULL,NULL,18,'2023-08-01',NULL,'1','2023-08-01 14:35:40',NULL,'1'),
(45,2,NULL,NULL,7,'2023-08-01',NULL,'1','2023-08-01 14:39:51',NULL,'1'),
(46,2,NULL,NULL,1,NULL,NULL,'0','2023-08-01 14:51:50',NULL,'1'),
(47,2,NULL,NULL,9,'2023-08-01',NULL,'1','2023-08-01 14:53:18',NULL,'1'),
(48,13,NULL,NULL,18,'2023-08-01',NULL,'1','2023-08-01 14:54:20',NULL,'1'),
(49,29,12,'Padrino',18,'2023-08-01',NULL,'1','2023-08-01 14:57:28',NULL,'1'),
(50,24,NULL,NULL,17,'2023-08-01',NULL,'1','2023-08-01 15:05:12',NULL,'1'),
(51,24,NULL,NULL,4,NULL,NULL,'0','2023-08-01 15:06:36',NULL,'1'),
(52,24,NULL,NULL,8,NULL,NULL,'0','2023-08-01 15:09:36',NULL,'1'),
(53,10,NULL,NULL,26,'2023-08-01',NULL,'1','2023-08-01 15:13:20',NULL,'1'),
(54,7,NULL,NULL,26,'2023-08-01',NULL,'1','2023-08-01 15:15:35',NULL,'1'),
(55,22,NULL,NULL,6,'2023-08-01',NULL,'1','2023-08-01 15:26:14',NULL,'1'),
(56,24,NULL,NULL,1,'2023-08-01',NULL,'1','2023-08-01 15:29:51',NULL,'1');

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idtipopago` smallint(6) NOT NULL,
  `idmatricula` int(11) NOT NULL,
  `importe` float(6,2) DEFAULT NULL,
  `fechapago` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` char(1) NOT NULL DEFAULT '1',
  `porcentajedescuento` int(11) NOT NULL,
  `observacion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idpago`),
  KEY `fk_idusuario_pagos` (`idusuario`),
  KEY `fk_idtipopago_pagos` (`idtipopago`),
  KEY `fk_idmatricula_pagos` (`idmatricula`),
  CONSTRAINT `fk_idmatricula_pagos` FOREIGN KEY (`idmatricula`) REFERENCES `matriculas` (`idmatricula`),
  CONSTRAINT `fk_idtipopago_pagos` FOREIGN KEY (`idtipopago`) REFERENCES `tipospago` (`idtipopago`),
  CONSTRAINT `fk_idusuario_pagos` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  CONSTRAINT `chk_estado_pagos` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pagos` */

insert  into `pagos`(`idpago`,`idusuario`,`idtipopago`,`idmatricula`,`importe`,`fechapago`,`fecha_alta`,`estado`,`porcentajedescuento`,`observacion`) values 
(1,1,1,18,50.00,'2023-01-10 23:31:31','2023-07-10 23:31:31','1',0,''),
(2,1,3,22,50.00,'2023-01-10 23:32:35','2023-07-10 23:32:35','1',0,''),
(3,1,3,21,50.00,'2023-01-10 23:33:03','2023-07-10 23:33:03','1',0,''),
(4,1,2,20,50.00,'2023-01-10 23:33:20','2023-07-10 23:33:20','1',0,''),
(5,1,4,19,50.00,'2023-01-10 23:33:37','2023-07-10 23:33:37','1',0,''),
(6,1,2,17,50.00,'2023-01-10 23:33:49','2023-07-10 23:33:49','1',0,''),
(7,1,2,17,50.00,'2023-02-10 23:44:49','2023-07-10 23:44:49','1',0,''),
(8,1,2,17,50.00,'2023-03-10 23:44:57','2023-07-10 23:44:57','1',0,''),
(9,1,2,19,50.00,'2023-02-10 23:45:13','2023-07-10 23:45:13','1',0,''),
(10,1,3,19,50.00,'2023-03-10 23:45:22','2023-07-10 23:45:22','1',0,''),
(11,1,2,20,50.00,'2023-02-10 23:45:35','2023-07-10 23:45:35','1',0,''),
(12,1,4,20,50.00,'2023-03-10 23:45:43','2023-07-10 23:45:43','1',0,''),
(13,1,3,21,50.00,'2023-02-10 23:45:55','2023-07-10 23:45:55','1',0,''),
(14,1,1,21,50.00,'2023-03-10 23:46:18','2023-07-10 23:46:18','1',0,''),
(15,1,1,22,50.00,'2023-02-10 23:46:40','2023-07-10 23:46:40','1',0,''),
(16,1,2,22,50.00,'2023-03-10 23:46:49','2023-07-10 23:46:49','1',0,''),
(17,1,1,18,50.00,'2023-03-10 23:47:29','2023-07-10 23:47:29','1',0,''),
(18,1,1,25,50.00,'2023-01-10 00:27:58','2023-04-15 00:27:58','1',0,''),
(19,1,2,25,50.00,'2023-02-15 00:28:14','2023-04-15 00:28:14','1',0,''),
(20,1,1,25,50.00,'2023-03-15 00:28:24','2023-04-15 00:28:24','1',0,''),
(21,1,1,27,50.00,'2023-01-12 00:28:54','2023-04-15 00:28:54','1',0,''),
(22,1,2,27,50.00,'2023-02-13 00:29:07','2023-04-15 00:29:07','1',0,''),
(23,1,2,27,50.00,'2023-02-15 00:29:17','2023-04-15 00:29:17','1',0,''),
(24,1,2,26,50.00,'2023-01-14 00:29:38','2023-04-15 00:29:38','1',0,''),
(25,1,2,26,50.00,'2023-02-15 00:29:47','2023-04-15 00:29:47','1',0,''),
(26,1,1,26,50.00,'2023-03-15 00:29:56','2023-04-15 00:29:56','1',0,''),
(27,1,2,24,50.00,'2023-01-08 00:30:17','2023-04-15 00:30:17','1',0,''),
(28,1,2,24,50.00,'2023-02-15 00:30:25','2023-04-15 00:30:25','1',0,''),
(29,1,2,23,50.00,'2023-01-12 00:30:39','2023-04-15 00:30:39','1',0,''),
(30,1,3,23,50.00,'2023-01-15 00:30:49','2023-04-15 00:30:49','1',0,''),
(31,1,1,35,50.00,'2023-02-07 00:52:41','2023-05-15 00:52:41','1',0,''),
(32,1,1,35,50.00,'2023-03-15 00:53:47','2023-05-15 00:53:47','1',0,''),
(33,1,2,31,50.00,'2023-02-05 00:54:08','2023-05-15 00:54:08','1',0,''),
(34,1,2,31,50.00,'2023-03-15 00:54:15','2023-05-15 00:54:15','1',0,''),
(35,1,3,31,50.00,'2023-04-15 00:54:25','2023-05-15 00:54:25','1',0,''),
(36,1,3,32,50.00,'2023-02-05 00:55:10','2023-05-15 00:55:10','1',0,''),
(37,1,1,32,50.00,'2023-02-25 00:55:18','2023-05-15 00:55:18','1',0,''),
(38,1,2,32,50.00,'2023-03-15 00:55:27','2023-05-15 00:55:27','1',0,''),
(39,1,2,33,50.00,'2023-02-08 00:57:41','2023-05-15 00:57:41','1',0,''),
(40,1,2,33,50.00,'2023-03-06 00:57:54','2023-05-15 00:57:54','1',0,''),
(41,1,2,33,50.00,'2023-04-15 00:58:03','2023-05-15 00:58:03','1',0,''),
(43,8,3,37,67.50,'2023-07-31 20:51:12','2023-07-31 20:51:12','1',25,'Se aplicó un descuento del 25%'),
(44,8,2,38,60.00,'2023-07-31 21:08:39','2023-07-31 21:08:39','1',50,'Se aplicó un descuento del 50%'),
(45,8,4,39,40.00,'2023-07-31 21:29:39','2023-07-31 21:29:39','1',50,'Se aplicó un descuento del 50%'),
(46,8,1,38,60.00,'2023-07-31 22:30:45','2023-07-31 22:30:45','1',50,'Se aplicó un descuento del 50%'),
(47,8,1,41,60.00,'2023-08-01 01:51:20','2023-08-01 01:51:20','1',50,'Se aplicó un descuento del 50%'),
(48,8,1,43,20.00,'2023-08-01 11:24:04','2023-08-01 11:24:04','1',50,'Se aplicó un descuento del 50%'),
(49,1,2,44,40.00,'2023-08-01 14:36:56','2023-08-01 14:36:56','1',0,'null'),
(50,1,2,44,30.00,'2023-08-01 14:37:37','2023-08-01 14:37:37','1',25,'Se aplicó un descuento del 25%'),
(51,1,3,44,30.00,'2023-08-01 14:37:52','2023-08-01 14:37:52','1',25,'Se aplicó un descuento del 25%'),
(52,1,1,45,0.00,'2023-08-01 14:48:26','2023-08-01 14:48:26','1',0,'null'),
(53,1,2,47,120.20,'2023-08-01 14:53:33','2023-08-01 14:53:33','1',0,''),
(54,1,2,47,120.20,'2023-08-01 14:53:44','2023-08-01 14:53:44','1',0,''),
(55,1,2,48,40.00,'2023-08-01 14:54:36','2023-08-01 14:54:36','1',0,''),
(56,1,3,48,40.00,'2023-08-01 14:54:46','2023-08-01 14:54:46','1',0,''),
(57,1,1,36,40.00,'2023-08-01 14:57:40','2023-08-01 14:57:40','1',0,''),
(58,1,3,36,40.00,'2023-08-01 14:57:49','2023-08-01 14:57:49','1',0,''),
(59,1,2,49,30.00,'2023-08-01 15:02:33','2023-08-01 15:02:33','1',25,'Se aplicó un descuento del 25%'),
(60,1,1,49,40.00,'2023-08-01 15:02:44','2023-08-01 15:02:44','1',0,''),
(61,1,2,40,40.00,'2023-08-01 15:04:06','2023-08-01 15:04:06','1',0,''),
(62,1,1,37,90.00,'2023-08-01 15:11:13','2023-08-01 15:11:13','1',0,''),
(63,1,1,53,100.00,'2023-08-01 15:13:31','2023-08-01 15:13:31','1',0,''),
(64,1,1,53,100.00,'2023-08-01 15:13:42','2023-08-01 15:13:42','1',0,''),
(65,1,2,54,0.00,'2023-08-01 15:15:47','2023-08-01 15:15:47','1',0,''),
(66,1,1,54,100.00,'2023-08-01 15:22:50','2023-08-01 15:22:50','1',0,''),
(67,1,2,54,100.00,'2023-08-01 15:23:02','2023-08-01 15:23:02','1',0,''),
(68,1,3,50,30.00,'2023-08-01 15:24:53','2023-08-01 15:24:53','1',0,''),
(69,1,3,43,40.00,'2023-08-01 15:25:11','2023-08-01 15:25:11','1',0,''),
(70,1,3,38,120.20,'2023-08-01 15:25:31','2023-08-01 15:25:31','1',0,''),
(71,1,2,55,90.00,'2023-08-01 15:26:25','2023-08-01 15:26:25','1',0,''),
(72,1,2,55,90.00,'2023-08-01 15:26:40','2023-08-01 15:26:40','1',0,''),
(73,1,1,37,90.00,'2023-08-01 15:30:00','2023-08-01 15:30:00','1',0,''),
(74,1,1,56,50.00,'2023-08-01 15:30:12','2023-08-01 15:30:12','1',0,''),
(75,1,2,50,30.00,'2023-08-01 15:30:40','2023-08-01 15:30:40','1',0,''),
(76,1,1,56,50.00,'2023-08-01 15:30:51','2023-08-01 15:30:51','1',0,'');

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `tipodoc` char(3) NOT NULL DEFAULT 'DNI',
  `nrodocumento` varchar(9) NOT NULL,
  `apepaterno` varchar(50) NOT NULL,
  `apematerno` varchar(50) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpersona`),
  UNIQUE KEY `nrodocumento` (`nrodocumento`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `chk_tipoDoc_personas` CHECK (`tipodoc` in ('DNI','PTP','CE','CPP','CI')),
  CONSTRAINT `chk_estado_personas` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

/*Data for the table `personas` */

insert  into `personas`(`idpersona`,`tipodoc`,`nrodocumento`,`apepaterno`,`apematerno`,`nombres`,`fechaNac`,`telefono`,`direccion`,`email`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,'CE','004569243','Montesino','NN','Joseandres Gabriel','2000-04-26','912396245','Prolongacion callao #354','joseandresmontesino1@gmail.com','2023-05-19 10:04:01',NULL,'1'),
(2,'DNI','87654321','González','Hernández','Luis','1995-02-14','987654322','Avenida Siempreviva 456','luis.gonzalez@mail.com','2023-05-19 10:04:01',NULL,'1'),
(3,'DNI','13579246','Martínez','García','Ana','2002-05-21','987654323','Calle del Pez 789','ana.martinez@mail.com','2023-05-19 10:04:01',NULL,'1'),
(4,'CE','24681357','Gómez','Pérez','Jorge','1995-11-30','987654324','Calle Mayor 111','jorge.gomez@mail.com','2023-05-19 10:04:01',NULL,'1'),
(5,'DNI','15975346','Hernández','González','Laura','1998-07-07','987654325','Plaza de España 222','laura.hernandez@mail.com','2023-05-19 10:04:01',NULL,'1'),
(6,'DNI','98765432','García','Martínez','Carlos','2001-09-10','987654326','Avenida del Parque 333','carlos.garcia@mail.com','2023-05-19 10:04:01',NULL,'1'),
(7,'CE','35715928','Pérez','Sánchez','Rosa','2003-04-03','987654327','Calle Real 444','rosa.perez@mail.com','2023-05-19 10:04:01',NULL,'1'),
(8,'CE','36985214','Sánchez','Fernández','Pedro','1992-12-12','987654328','Calle de la Luna 555','pedro.sanchez@mail.com','2023-05-19 10:04:01','2023-08-01 10:53:18','0'),
(9,'CE','45612378','Fernández','Gómez','Elena','1996-08-22','987654329','Calle del Sol 666','elena.fernandez@mail.com','2023-05-19 10:04:01',NULL,'1'),
(10,'DNI','25836914','González','Martínez','David','2000-03-17','987654330','Calle de los Olivos 777','david.gonzalez@mail.com','2023-05-19 10:04:01',NULL,'1'),
(11,'CE','005488966','Peña','Loza','Juana Andrea','2010-04-26','978554556','Calle Pilpa #54','juanaPeña@gmail.com','2023-05-19 10:05:15',NULL,'1'),
(12,'DNI','71460106','Pachas ','Saravia','Jesus','2001-04-13','963334587','N/A','jesusraulps@gmail.com','2023-05-19 10:05:15',NULL,'1'),
(13,'DNI','444444440','Peñaranda','Pecho','Paul José','2000-10-10','985441444','chincha alta','prueba@gmail.com','2023-06-24 10:44:08',NULL,'1'),
(22,'DNI','23345671','Villa','Palma','Juan Juan','2000-01-01','123456789','Av. Las flores 444','correo28321@example.com','2023-06-24 11:00:02',NULL,'1'),
(23,'DNI','111444253','Villareal','Saravia','Jesus Raul','2000-04-13','998774225','Av. Santa Rita 444','elpro@gmail.com','2023-06-24 11:33:45',NULL,'1'),
(24,'DNI','71460105','Hipolito','Saravia','Carlos Adrian','2005-05-20','985908373','Av.Santa Rita 368','carlosadrianps05@gmail.com','2023-06-24 18:54:17',NULL,'1'),
(25,'DNI','123456789','Marcano','Saravia','Juan ','2000-02-22','985908374','Av. Santa Rita 440','JuanPchas05@gmail.com','2023-06-30 17:22:22',NULL,'1'),
(26,'DNI','123456780','Escate','Saravia','Juan Carlos','2000-02-02','985908375','Av. Santa Rita 348','joseandresmontesino11@gmail.com','2023-06-30 17:28:02',NULL,'1'),
(27,'DNI','785458960','Mayuri','Manzano','Julian José','2015-10-10',NULL,'Chincha alta',NULL,'2023-07-04 08:54:08',NULL,'1'),
(28,'DNI','789456321','Francia','Minaya','Jhon ','1985-05-20','956834951','Grocio Prado','joseandresmontesino@gmail.com','2023-07-04 08:57:59',NULL,'1'),
(29,'DNI','774123951','Rada','Rada','Jhon Alex','2010-10-10',NULL,'Chincha alta',NULL,'2023-07-10 22:30:04',NULL,'1'),
(30,'DNI','784236951','Padilla','NN','Alexis Brayan','2009-01-10',NULL,'Pueblo nuevo',NULL,'2023-07-10 22:31:58',NULL,'1'),
(31,'DNI','745210000','Ponce','Peña','Loan Zadiel','2011-10-05',NULL,'Grocio Prado',NULL,'2023-07-10 22:33:06',NULL,'1'),
(32,'DNI','712365720','Alaya','Martínez','Jhoan Alberto','2012-10-05',NULL,'Larán',NULL,'2023-07-10 22:34:25',NULL,'1'),
(33,'DNI','793001204','Mora','Mora','Luis Alex','2012-10-01',NULL,'Sunampe',NULL,'2023-07-10 22:34:59',NULL,'1'),
(34,'DNI','756987458','Valle','Roncero','Cristofer Raúl','2013-10-05',NULL,'Tambo de Mora',NULL,'2023-07-10 22:36:56',NULL,'1'),
(35,'DNI','741258960','Dieguez','Mata','Diego Enrique','2014-01-10',NULL,'Grocio Prado',NULL,'2023-07-10 22:37:35',NULL,'1'),
(36,'DNI','777888999','Matos','Minaya','Albert José','2014-11-11',NULL,'Chincha Alta',NULL,'2023-07-10 22:38:32',NULL,'1');

/*Table structure for table `profesores` */

DROP TABLE IF EXISTS `profesores`;

CREATE TABLE `profesores` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `nom_banco` varchar(10) NOT NULL,
  `num_cuenta` varchar(14) NOT NULL,
  `tipo_cuenta` varchar(7) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idprofesor`),
  KEY `fk_idpersona_profesores` (`idpersona`),
  CONSTRAINT `fk_idpersona_profesores` FOREIGN KEY (`idpersona`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `chk_estado_profesores` CHECK (`estado` in ('1','0')),
  CONSTRAINT `chk_tipocuenta_proesores` CHECK (`tipo_cuenta` in ('Ahorro','Corriente')),
  CONSTRAINT `chk_nivelacceso_profesores` CHECK (`nom_banco` in ('BCP','BBVA','Scotiabank','Interbank'))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `profesores` */

insert  into `profesores`(`idprofesor`,`idpersona`,`nom_banco`,`num_cuenta`,`tipo_cuenta`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,1,'BCP','31594668529072','Ahorro','2023-05-19 10:05:49',NULL,'1'),
(2,2,'BCP','98594668779073','Ahorro','2023-05-19 10:05:49',NULL,'1'),
(3,3,'BCP','51394668529653','Ahorro','2023-05-19 10:05:49',NULL,'1'),
(4,4,'BCP','35994668529270','Ahorro','2023-05-19 10:05:49',NULL,'1');

/*Table structure for table `tipospago` */

DROP TABLE IF EXISTS `tipospago`;

CREATE TABLE `tipospago` (
  `idtipopago` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipopago` varchar(30) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtipopago`),
  CONSTRAINT `chk_estado_tipospago` CHECK (`estado` in ('1','0'))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipospago` */

insert  into `tipospago`(`idtipopago`,`tipopago`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,'Efectivo','2023-05-19 10:18:11',NULL,'1'),
(2,'Transferencia','2023-05-19 10:18:11',NULL,'1'),
(3,'Yape','2023-05-19 10:18:11',NULL,'1'),
(4,'Plin','2023-05-19 10:18:11',NULL,'1');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `nombreusuario` varchar(70) NOT NULL,
  `claveacceso` varchar(200) NOT NULL,
  `nivelacceso` char(1) NOT NULL DEFAULT 'T',
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `nombreusuario` (`nombreusuario`),
  KEY `fk_idpersona_usuarios` (`idpersona`),
  CONSTRAINT `fk_idpersona_usuarios` FOREIGN KEY (`idpersona`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `chk_estado_usuarios` CHECK (`estado` in ('1','0')),
  CONSTRAINT `chk_nivelacceso_usuarios` CHECK (`nivelacceso` in ('R','A','C','P','T'))
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idusuario`,`idpersona`,`nombreusuario`,`claveacceso`,`nivelacceso`,`fecha_alta`,`fecha_baja`,`estado`) values 
(1,1,'jgm2000','$2y$10$vh8kBivbYPJt1TcXn191OuJcFirApSoGMrzGdihg1TOGQUTB8/laO','R','2023-05-19 10:12:38',NULL,'1'),
(2,2,'MJA2010','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','P','2023-05-19 10:12:38',NULL,'1'),
(3,3,'juagar','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','P','2023-05-19 10:12:38',NULL,'1'),
(4,4,'smlope','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','P','2023-05-19 10:12:38',NULL,'1'),
(5,5,'pacruz','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','C','2023-05-19 10:12:38',NULL,'1'),
(6,6,'jepere','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','C','2023-05-19 10:12:38',NULL,'1'),
(7,7,'larame','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','T','2023-05-19 10:12:38',NULL,'1'),
(8,12,'jesusps','$2y$10$l7OydX67/gXRVnuOXjmexOhxICF2WLlpxqC0yEjQMAUwVulpX25xq','R','2023-05-19 10:12:38',NULL,'1'),
(9,10,'DadaVid','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','A','2023-05-19 10:23:36',NULL,'1'),
(10,22,'nombreu28321suario','clave11','C','2023-06-24 11:00:02',NULL,'1'),
(11,23,'PachasMamalo','$2y$10$x2.xDr6kZeiFp/7UYaBoVurpTgz7mpgCDGaKzKtqnebtSAmsaLsNS','C','2023-06-24 11:33:45',NULL,'1'),
(12,24,'carlosadrianps','$2y$10$B/SSGUbSBkPxleVk.qKCCunMPeXMAZDwwwWDrY8Kc8tItu3HPofbq','T','2023-06-24 18:54:17',NULL,'1'),
(14,26,'JuanP2000','$2y$10$0MVUMYIjlo7yLopKmWetB.h7Uap/tyXTZakdzWk3RbwQaPQ.iF316','T','2023-06-30 17:28:02',NULL,'1');

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `curso_cambiar_estado_activacion_evento` */

/*!50106 DROP EVENT IF EXISTS `curso_cambiar_estado_activacion_evento`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `curso_cambiar_estado_activacion_evento` ON SCHEDULE EVERY 1 DAY STARTS '2023-07-05 05:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE cursos
    SET estado = 'A'
    WHERE DATE(fecha_inicio) = CURRENT_DATE */$$
DELIMITER ;

/* Event structure for event `curso_cambiar_estado_finalizacion_evento` */

/*!50106 DROP EVENT IF EXISTS `curso_cambiar_estado_finalizacion_evento`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `curso_cambiar_estado_finalizacion_evento` ON SCHEDULE EVERY 1 DAY STARTS '2023-07-05 05:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE cursos
    SET estado = 'F'
    WHERE DATE(fecha_fin) = CURDATE() */$$
DELIMITER ;

/* Event structure for event `deudores_pagos_de_cursos` */

/*!50106 DROP EVENT IF EXISTS `deudores_pagos_de_cursos`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `deudores_pagos_de_cursos` ON SCHEDULE EVERY 1 DAY STARTS '2023-07-05 10:00:00' ON COMPLETION PRESERVE ENABLE DO CALL spu_listar_deudores() */$$
DELIMITER ;

/* Function  structure for function  `calcular_edad` */

/*!50003 DROP FUNCTION IF EXISTS `calcular_edad` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `calcular_edad`(fechaNac DATE) RETURNS int(11)
BEGIN 
	DECLARE edad INT;
	SET edad = TIMESTAMPDIFF(YEAR, fechaNac, CURDATE());
	RETURN edad;

END */$$
DELIMITER ;

/* Procedure structure for procedure `ObtenerCursosSinHorarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `ObtenerCursosSinHorarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCursosSinHorarios`()
BEGIN
    SELECT c.titulo,c.idcurso
    FROM cursos c
    LEFT JOIN horarios h ON h.idcurso = c.idcurso
    WHERE h.idcurso IS NULL;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_alumnos_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_alumnos_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_alumnos_editar`(
IN _idmatricula INT,
in _idalumno int,
in _idapoderado int,
in _parentesco varchar(20),
in _observacion varchar(80)

)
BEGIN
	update matriculas m
	set 
	 m.idalumno = _idalumno,
	 m.idapoderado = _idapoderado,
	 m.parentesco = _parentesco,   
	 m.observacion = _observacion	
	WHERE m.idmatricula=_idmatricula AND m.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_alumnos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_alumnos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_alumnos_listar`(
	IN _idcurso INT
)
BEGIN
	SELECT per.idpersona, per.tipodoc,per.nrodocumento,CONCAT_WS(' ',per.apepaterno,per.apematerno,per.nombres) AS 'nombreAlumno',m.parentesco,CONCAT_WS(' ',apo.apepaterno,apo.nombres) AS 'nombreApoderado', m.idmatricula ,m.estaMatriculado,c.titulo,c.totalhoras,m.fechamatricula
	FROM matriculas m 
	JOIN personas per ON m.idalumno = per.idpersona
	LEFT JOIN personas apo ON m.idapoderado = apo.idpersona
	JOIN cursos c ON m.idcurso = c.idcurso
	WHERE m.estado='1' AND m.idcurso = _idcurso and m.estaMatriculado = 1
	ORDER BY m.fecha_alta ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_alumnos_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_alumnos_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_alumnos_obtener`(
   IN _nrodocumento VARCHAR(9),
   IN _tipodc VARCHAR(3)
)
BEGIN 
 SELECT alumno.idpersona, alumno.nombres, alumno.apepaterno, alumno.apematerno,calcular_edad(alumno.fechaNac) AS 'edad', alumno.telefono, alumno.email
 FROM personas alumno
 WHERE alumno.nrodocumento = _nrodocumento AND alumno.tipodoc=_tipodc LIMIT 1;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_aulas_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_aulas_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_aulas_crear`(
IN _numaula VARCHAR(10), 
IN _aforo INT, 
IN _ubicacion VARCHAR (30)
)
BEGIN
	INSERT INTO aulas(numaula, aforo, ubicacion) VALUES 
	(_numaula, _aforo, _ubicacion); 
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_aulas_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_aulas_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_aulas_editar`(
IN _idaula INT,
IN _numaula VARCHAR(10), 
IN _aforo INT, 
IN _ubicacion VARCHAR (30)
)
BEGIN
	UPDATE aulas a 
	SET 
		a.numaula = _numaula, 
		a.aforo = _aforo, 
		a.ubicacion = _ubicacion  
	WHERE a.idaula = _idaula AND a.estado ='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_aulas_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_aulas_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_aulas_eliminar`(IN _idaula INT)
BEGIN
	UPDATE aulas a 
	SET 
	a.estado = '0' , a.fecha_baja=NOW()
	WHERE a.idaula= _idaula;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_aulas_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_aulas_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_aulas_listar`()
BEGIN
	SELECT a.idaula, a.numaula, a.aforo, a.ubicacion 
	FROM aulas a
	WHERE a.estado='1'
	ORDER BY a.numaula ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_aulas_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_aulas_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_aulas_obtener`(IN _idaula INT)
BEGIN
	SELECT a.numaula , a.aforo, a.ubicacion
	FROM aulas a
	WHERE a.idaula = _idaula AND a.estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cantidad_alumnos_porTaller` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cantidad_alumnos_porTaller` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cantidad_alumnos_porTaller`(	
	in _mesDesde int ,
	
	IN _mesHasta INT ,
	
	in _anio int 
)
begin
		SELECT COUNT(*) AS inscritos , c.titulo ,  m.idcurso 
		FROM matriculas  m
		INNER JOIN cursos c ON m.idcurso = c.idcurso
		WHERE m.estaMatriculado = '1' and  (month (m.fechamatricula)  between _mesDesde and _mesHasta ) 
		and c.estado !='F' AND YEAR(m.fechamatricula) = _anio
		GROUP BY m.idcurso 
		ORDER BY inscritos DESC;

end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categoriasHabi_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categoriasHabi_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoriasHabi_crear`(
IN  _categoria_habilida VARCHAR(40)
)
BEGIN
	INSERT INTO categorias_habilidades(categoria_habilida) VALUES(_categoria_habilida);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categoriasHabi_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categoriasHabi_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoriasHabi_editar`(
IN _idcategoria_habi INT,
IN  _categoria_habilida VARCHAR(40)
)
BEGIN
	UPDATE categorias_habilidades 
	SET 
		categoria_habilida=_categoria_habilida
	WHERE idcategoria_habi = _idcategoria_habi;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categoriasHabi_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categoriasHabi_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoriasHabi_eliminar`(
IN _idcategoria_habi INT
)
BEGIN
	UPDATE categorias_habilidades 
	SET 
		estado = '0', fecha_baja=NOW()
	WHERE idcategoria_habi = _idcategoria_habi;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categoriasHabi_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categoriasHabi_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoriasHabi_listar`()
BEGIN
	SELECT categoria_habilida
	FROM categorias_habilidades ch
	WHERE ch.estado='1'
	ORDER BY categoria_habilida ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categoriasHabi_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categoriasHabi_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoriasHabi_obtener`(IN _idcategoria_habi INT)
BEGIN
	SELECT categoria_habilida
	FROM categorias_habilidades ch
	WHERE ch.idcategoria_habi=_idcategoria_habi AND ch.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_crear`(
IN  _idespecialidad INT, 
IN _categoria VARCHAR(40)
)
BEGIN
	INSERT INTO categorias(idespecialidad, categoria) VALUES
	(_idespecialidad, _categoria);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_editar`(
IN _idcategoria INT,
IN  _idespecialidad INT, 
IN _categoria VARCHAR(40)
)
BEGIN
	UPDATE categorias c 
	SET 
	c.idespecialidad = _idespecialidad, 
	c.categoria = _categoria
	WHERE c.idcategoria = _idcategoria AND c.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_eliminar`(IN _idcategoria INT)
BEGIN
	UPDATE categorias c
	SET 
	c.estado='0', c.fecha_baja=NOW()
	WHERE c.idcategoria = _idcategoria;

END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_listar`()
BEGIN
    SELECT c.idcategoria, e.nomespecialidad, c.categoria
    FROM categorias c
    INNER JOIN especialidades e ON c.idespecialidad = e.idespecialidad
    WHERE c.estado = '1' AND e.estado = '1'
    GROUP BY c.categoria
    ORDER BY c.categoria ASC, e.nomespecialidad ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorias_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorias_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorias_obtener`( IN _idcategoria INT)
BEGIN
	SELECT c.idespecialidad, c.categoria
	FROM categorias c
	WHERE c.idcategoria = _idcategoria AND c.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_colaboradores_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_colaboradores_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_colaboradores_listar`()
BEGIN
	SELECT usu.idusuario,CONCAT_WS(' ',per.apepaterno,per.apematerno,per.nombres) AS 'Nombre Pila',usu.nombreusuario,usu.nivelacceso
	FROM usuarios usu
	JOIN  personas per ON usu.idpersona=per.idpersona	
	WHERE	usu.estado='1' AND usu.nivelacceso='C'
	ORDER BY per.apepaterno ASC; 
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_contarAlumnosEntreFechas` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_contarAlumnosEntreFechas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_contarAlumnosEntreFechas`(

IN _fechaDesde DATE,
IN _fechaHasta DATE
)
BEGIN
    SELECT COUNT(alu.idpersona) AS 'total de alumnos por curso', cur.titulo, cur.descripcion, cur.edadminima, cur.edadmaxima
    FROM matriculas ma
    JOIN personas alu ON ma.idalumno = alu.idpersona
    JOIN cursos cur ON ma.idcurso = cur.idcurso
    WHERE ma.estado = 1  AND ma.estaMatriculado='1' AND ma.fechamatricula  BETWEEN _fechaDesde AND _fechaHasta GROUP BY cur.idcurso ORDER BY COUNT(alu.idpersona) DESC ;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_contarAlumnosPorCurso` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_contarAlumnosPorCurso` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_contarAlumnosPorCurso`()
BEGIN
	SELECT COUNT(alu.idpersona) AS 'total de alumnos por curso', cur.titulo, cur.descripcion,cur.edadminima, cur.edadmaxima
	FROM matriculas ma
	JOIN personas alu ON ma.idalumno = alu.idpersona
	JOIN cursos cur ON pre.idcurso = cur.idcurso
	WHERE ma.estado=1 GROUP BY cur.idcurso ORDER BY COUNT(alu.idpersona) DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_crear_PersonaUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_crear_PersonaUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_crear_PersonaUsuario`(
    IN _tipodoc VARCHAR(255),
    IN _nrodocumento VARCHAR(255),
    IN _apepaterno VARCHAR(255),
    IN _apematerno VARCHAR(255),
    IN _nombres VARCHAR(255),
    IN _fechaNac DATE,
    IN _telefono VARCHAR(255),
    IN _direccion VARCHAR(255),
    IN _email VARCHAR(255),
    IN _nombreusuario VARCHAR(255),
    IN _claveacceso VARCHAR(255),
    IN _nivelacceso char(1)
)
BEGIN
    -- Insertar datos en la tabla personas
    INSERT INTO personas (tipodoc, nrodocumento, apepaterno, apematerno, nombres, fechaNac, telefono, direccion, email)
    VALUES (_tipodoc, _nrodocumento, _apepaterno, _apematerno, _nombres, _fechaNac, _telefono, _direccion, _email);

    -- Capturar el último ID insertado
    SET @_idpersona = LAST_INSERT_ID();

    -- Insertar datos en la tabla usuarios
    INSERT INTO usuarios (idpersona, nombreusuario, claveacceso, nivelacceso)
    VALUES (@_idpersona, _nombreusuario, _claveacceso, _nivelacceso);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_crear`(
IN _idcategoria SMALLINT, 
IN _idprofesor INT , 
IN _idaula SMALLINT , 
IN _titulo VARCHAR(50), 
IN _descripcion TEXT, 
in _nivel varchar(20), 
IN _edadminima INT, 
IN _edadmaxima INT , 
IN _vacantes INT, 
IN _totalhoras INT, 
IN _precio FLOAT(6,2),
in _imagen varchar(100),
IN _fecha_inicio DATE , 
IN _fecha_fin DATE
)
BEGIN
	IF _imagen = '' THEN SET _imagen = ""; END IF;
	INSERT INTO cursos(idcategoria, idprofesor, idaula, titulo, descripcion, nivel, edadminima, edadmaxima, vacantes, totalhoras, precio, imagen,fecha_inicio, fecha_fin)
	VALUES
	(_idcategoria, _idprofesor, _idaula, _titulo, _descripcion, _nivel, _edadminima, _edadmaxima, _vacantes, _totalhoras, _precio,_imagen, _fecha_inicio, _fecha_fin);

END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_dineroRecaudado` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_dineroRecaudado` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_dineroRecaudado`(
	IN _mesDesde INT ,
	
	IN _mesHasta INT ,
	
	IN _anio INT 
)
begin
	SELECT SUM(importe) AS ingreso_mensual, MONTH(p.fechapago) 'mes_de_pago', COUNT(m.idalumno) 'cantidad_alumnos',
	p.importe , c.idcurso, c.titulo
	FROM pagos p
	INNER JOIN matriculas m ON p.idmatricula = m.idmatricula
	INNER JOIN cursos c ON m.idcurso = c.idcurso
	WHERE m.estaMatriculado ='1'  and c.estado in ('F', 'I', 'A') and MONTH(p.fechapago) between  _mesDesde  and _mesHasta and year(m.fechamatricula) = _anio
	GROUP BY idcurso 
	ORDER BY ingreso_mensual DESC;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_editar`(
IN _idcurso INT,
IN _idcategoria SMALLINT, 
IN _idprofesor INT , 
IN _idaula SMALLINT , 
IN _titulo VARCHAR(50), 
IN _descripcion TEXT,
in _nivel varchar(20), 
IN _numMeses INT , 
IN _edadminima INT, 
IN _edadmaxima INT , 
IN _vacantes INT, 
IN _totalhoras INT, 
IN _precio FLOAT(6,2),
IN _fecha_inicio DATE , 
IN _fecha_fin DATE
)
BEGIN
	UPDATE cursos c
		SET
	c.idcategoria=_idcategoria, 
	c.idprofesor = _idprofesor, 
	c.idaula = _idaula, 
	c.titulo = _titulo, 
	c.descripcion =  _descripcion, 
	c.nivel	      = _nivel, 
	c.edadminima = _edadminima, 
	c.edadmaxima = _edadmaxima, 
	c.vacantes = _vacantes, 
	c.totalhoras = _totalhoras, 
	c.precio = _precio, 
	c.fecha_inicio = _fecha_inicio, 
	c.fecha_fin = _fecha_fin

	WHERE c.idcurso= _idcurso AND c.estado ='I';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_eliminar`(IN _idcurso INT)
BEGIN
	UPDATE cursos c
	SET c.estado='E', c.fecha_baja=NOW()
	WHERE c.idcurso=_idcurso AND c.estado='A';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_listarPorEstado` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_listarPorEstado` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_listarPorEstado`(

in _estado char(1)
)
BEGIN 
	
	SELECT c.idcurso,c.titulo,c.descripcion,c.nivel,c.imagen,CONCAT_WS(' ',per.apepaterno,per.nombres) AS 'nombreProfesor',cate.categoria,a.ubicacion,a.numaula,
	 PERIOD_DIFF(
	    DATE_FORMAT(c.fecha_fin, '%Y%m'),
	    DATE_FORMAT(c.fecha_inicio, '%Y%m')
	) AS duracion_meses,
	c.edadminima,c.edadmaxima,c.vacantes,c.totalhoras,c.precio, c.estado
	FROM cursos c
	JOIN categorias cate ON c.idcategoria = cate.idcategoria
	JOIN profesores p ON c.idprofesor= p.idprofesor
	JOIN personas per ON p.idpersona = per.idpersona
	JOIN aulas a ON c.idaula = a. idaula
	WHERE c.estado=_estado
	ORDER BY c.fecha_alta DESC; 
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_obtener`(IN _idcurso INT)
BEGIN
	SELECT c.idcategoria, c.idprofesor, CONCAT_WS(' ', per.apepaterno, per.nombres) AS 'nombreProfesor' ,au.ubicacion ,
		 PERIOD_DIFF(
	    DATE_FORMAT(c.fecha_fin, '%Y%m'),
	    DATE_FORMAT(c.fecha_inicio, '%Y%m')
	) AS duracion_meses,
	au.numaula ,cat.categoria , c.idaula, c.titulo, c.descripcion, c.nivel, c.edadminima, c.edadmaxima, c.vacantes, c.totalhoras, c.fecha_inicio,c.fecha_fin,c.precio
	FROM cursos c
	inner join profesores pro on pro.idprofesor = c.idprofesor
	INNER JOIN personas per ON per.idpersona = pro.idprofesor
	inner join categorias cat on cat.idcategoria = c.idcategoria
	INNER JOIN aulas au ON au.idaula = c.idaula
	WHERE c.idcurso=_idcurso AND c.estado IN ('A', 'I', 'F');
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_pocaAfluencia` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_pocaAfluencia` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_pocaAfluencia`( IN _mesDesde INT , 
 IN _mesHasta INT , IN _anio INT 
)
BEGIN 
 SELECT COUNT(*) AS inscritos , c.titulo ,  m.idcurso , m.fechamatricula, c.estado FROM matriculas  m
 INNER JOIN cursos c ON m.idcurso = c.idcurso WHERE (m.estaMatriculado = '1' AND  c.estado IN ( 'F', 'A', 'I')) AND (MONTH(m.fechamatricula) BETWEEN _mesDesde  AND _mesHasta AND YEAR(m.fechamatricula) =_anio )
 GROUP BY m.idcurso  ORDER BY inscritos DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_curso_masInscritos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_curso_masInscritos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_curso_masInscritos`(
	IN _mesDesde INT ,
	
	IN _mesHasta INT ,
	
	IN _anio INT 
)
begin
	SELECT COUNT(*) AS inscritos , c.titulo ,  m.idcurso 
	FROM matriculas  m
	INNER JOIN cursos c ON m.idcurso = c.idcurso
	WHERE (m.estaMatriculado = '1' AND c.estado !='E') and (month(m.fechamatricula) between  _mesDesde and _mesHasta   AND YEAR(m.fechamatricula) = _anio)
	GROUP BY m.idcurso  
	ORDER BY inscritos DESC;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_datos_pagosObtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_datos_pagosObtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_datos_pagosObtener`(
	IN _tipodoc CHAR(3),
	IN _nrodocumento VARCHAR(9)
)
BEGIN 

	 SELECT m.idmatricula,m.idcurso, m.idalumno, c.titulo, c.precio , alumnos.nombres, alumnos.apepaterno, alumnos.apematerno
	 FROM matriculas m 
	 INNER JOIN personas alumnos ON  m.idalumno = alumnos.idpersona
	 INNER JOIN cursos c ON c.idcurso = m.idcurso 
	 WHERE   alumnos.tipodoc=_tipodoc AND c.estado != 'E' and alumnos.nrodocumento = _nrodocumento;
	 
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_desbloqueos_actualizarpassword` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_desbloqueos_actualizarpassword` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_desbloqueos_actualizarpassword`(
	IN _idusuario		INT,
	IN _claveacceso 	VARCHAR(200)
)
BEGIN
	UPDATE usuarios SET claveacceso = _claveacceso WHERE idusuario = _idusuario;
	UPDATE desbloqueos SET estado = '0' WHERE idusuario = _idusuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_desbloqueos_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_desbloqueos_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_desbloqueos_registrar`(
IN _idusuario INT ,
in _email		varchar(120),
IN _codigodesbloqueo CHAR(4)
)
BEGIN 
	UPDATE desbloqueos SET estado ='0' 
	WHERE idusuario= _idusuario;
		
	INSERT INTO desbloqueos (idusuario,email, codigodesbloqueo)VALUES
	(_idusuario, _email, _codigodesbloqueo);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_desbloqueos_validartiempo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_desbloqueos_validartiempo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_desbloqueos_validartiempo`(
	IN _idusuario		INT
)
BEGIN
	
	
	IF((SELECT COUNT(*) FROM desbloqueos WHERE idusuario = _idusuario) = 0) THEN
	SELECT 'GENERAR' AS 'status';
	ELSE
	-- Buscamos el ultimo estado del usuario NO IMPORTA SI es 0 o 1		
	IF ((SELECT estado FROM desbloqueos WHERE idusuario = _idusuario ORDER BY 1 DESC LIMIT 1) = 0) THEN
		SELECT 'GENERAR' AS 'status';
	ELSE
		-- En esta seccion, el ultimo registro es '1', No sabemos si esta dentro de los 15 min permitidos
	IF
	(
			(
			SELECT COUNT(*) FROM desbloqueos
			WHERE idusuario = _idusuario AND estado = '1' AND NOW() NOT BETWEEN fechaAlta AND DATE_ADD(fechaAlta, INTERVAL 15 MINUTE)
			ORDER BY fechaAlta DESC LIMIT 1
			) = 1
	) THEN
			-- El usuario tiene estado 1, pero esta fuera de los 15 minutos
			SELECT 'GENERAR' AS 'status';
		ELSE
			SELECT 'DENEGAR' AS 'status';
			END IF;
		END IF;
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_desbloqueo_validar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_desbloqueo_validar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_desbloqueo_validar`(
  IN _idusuario INT,
  IN _codigodesbloqueo CHAR(4)
 )
BEGIN
IF
	(	
		(
		SELECT codigodesbloqueo FROM desbloqueos
		WHERE idusuario = _idusuario AND estado = '1'
		LIMIT 1
		) = _codigodesbloqueo
	)
	THEN
			SELECT 'PERMITIDO' AS 'status';
		ELSE
			SELECT 'DENEGADO' AS 'status';
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_especialidades_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_especialidades_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_especialidades_crear`(
IN _nomespecialidad VARCHAR(30),
IN _comentario VARCHAR(80)
)
BEGIN
	INSERT INTO especialidades(nomespecialidad, comentario) VALUES
	(_nomespecialidad, _comentario);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_especialidades_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_especialidades_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_especialidades_editar`(
IN _idespecialidad INT,
IN _nomespecialidad VARCHAR(30),
IN _comentario VARCHAR(80)
)
BEGIN
	UPDATE  especialidades e
		SET
		e.nomespecialidad = _nomespecialidad, 
		e.comentario = _comentario
	WHERE e.idespecialidad= _idespecialidad AND estado ='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_especialidades_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_especialidades_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_especialidades_eliminar`(IN _idespecialidad INT)
BEGIN
	UPDATE  especialidades e
		SET
		e.estado = '0' , e.fecha_baja = NOW()
	WHERE e.idespecialidad= _idespecialidad;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_especialidades_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_especialidades_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_especialidades_listar`()
BEGIN
	SELECT e.nomespecialidad, e.comentario
	FROM especialidades e
	WHERE e.estado ='1'
	ORDER BY e.nomespecialidad ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_especialidades_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_especialidades_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_especialidades_obtener`(IN _idespecialidad INT)
BEGIN
	SELECT e.nomespecialidad, e.comentario
	FROM especialidades e
	WHERE e.idespecialidad= _idespecialidad AND e.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_habilidades_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_habilidades_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_habilidades_crear`(
IN _idcategoria_habi INT, 
IN _idprofesor INT, 
IN _habilidad VARCHAR(40),
IN _comentario VARCHAR(80)
)
BEGIN
	INSERT INTO habilidades (idcategoria_habi, idprofesor, habilidad, comentario) VALUES
	(_idcategoria_habi, _idprofesor, _habilidad, _comentario);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_habilidades_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_habilidades_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_habilidades_editar`(
IN _idhabilidades  INT,
IN _idcategoria_habi INT, 
IN _idprofesor INT, 
IN _habilidad VARCHAR(40),
IN _comentario VARCHAR(80)
)
BEGIN
	UPDATE habilidades 
	SET 
	idcategoria_habi = _idcategoria_habi, 
	idprofesor = _idprofesor, 
	habilidad = _habilidad, 
	comentario = _comentario
	WHERE idhabilidades= _idhabilidades;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_habilidades_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_habilidades_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_habilidades_eliminar`(IN _idhabilidades INT)
BEGIN

	UPDATE habilidades 
	SET
		estado ='0', fecha_baja=NOW()
	WHERE idhabilidades = _idhabilidades;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_habilidades_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_habilidades_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_habilidades_listar`()
BEGIN
	SELECT CONCAT_WS(' ',per.apepaterno,per.apematerno,per.nombres) AS 'Nombre Profesor', ch.categoria_habilida, h.habilidad, h.comentario
	FROM habilidades h
	JOIN categorias_habilidades ch ON h.idcategoria_habi= ch.idcategoria_habi
	JOIN profesores p ON h.idprofesor = p.idprofesor
	JOIN personas per ON p.idpersona = per.idpersona
	WHERE h.estado = '1'
	ORDER BY per.nombres ASC , h.habilidad ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_habilidades_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_habilidades_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_habilidades_obtener`(IN _idhabilidades INT)
BEGIN		
	SELECT idcategoria_habi, idprofesor, habilidad, comentario
	FROM habilidades
	WHERE estado=1 AND idhabilidades= _idhabilidades;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horarios_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horarios_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horarios_crear`(
IN _idcurso INT , 
IN _dia CHAR(1), 
IN _horainicio TIME, 
IN _horafin TIME
)
BEGIN
	INSERT INTO horarios(idcurso, dia, horainicio, horafin) VALUES
	(_idcurso, _dia, _horainicio, _horafin);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horarios_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horarios_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horarios_editar`(
IN _idhorario INT,
IN _idcurso INT , 
IN _dia CHAR(1), 
IN _horainicio TIME, 
IN _horafin TIME
)
BEGIN
	UPDATE horarios h 
	SET
	h.idcurso = _idcurso, 
	h.dia = _dia, 
	h.horainicio = _horainicio, 
	h.horafin = _horafin 
	WHERE h.idhorario=_idhorario AND h.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horarios_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horarios_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horarios_eliminar`(IN _idhorario INT)
BEGIN
	UPDATE horarios h
	SET
	h.estado='0' , h.fecha_baja = NOW()
	WHERE h.idhorario=_idhorario AND h.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horarios_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horarios_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horarios_listar`()
BEGIN
    SELECT
		  c.idcurso,
        c.titulo,
        GROUP_CONCAT(CONCAT(h.dia, ' - ', TIME_FORMAT(h.horainicio, '%H : %i'), ' a ', TIME_FORMAT(h.horafin, '%H:%i'))) AS dias_horarios,
        c.fecha_inicio,
        c.fecha_fin,
        CONCAT_WS(' ', per.apepaterno, per.nombres) AS 'nombreProfesor',
        au.numaula,
        au.ubicacion
    FROM
        horarios h
        JOIN cursos c ON h.idcurso = c.idcurso
        JOIN aulas au ON c.idaula = au.idaula
        JOIN profesores pro ON c.idprofesor = pro.idprofesor
        JOIN personas per ON pro.idpersona = per.idpersona
    WHERE
        c.estado IN ('A', 'I') AND h.estado = '1'
    GROUP BY
        c.titulo, c.fecha_inicio, c.fecha_fin, CONCAT_WS(' ', per.apepaterno, per.nombres), au.numaula, au.ubicacion;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horarios_listarHorariosProfesores` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horarios_listarHorariosProfesores` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horarios_listarHorariosProfesores`(IN _idprofesor INT)
BEGIN
select 
		  c.idcurso,
        c.titulo,
        GROUP_CONCAT(CONCAT(h.dia, ' - ', TIME_FORMAT(h.horainicio, '%H : %i'), ' a ', TIME_FORMAT(h.horafin, '%H:%i'))) AS dias_horarios,
        c.fecha_inicio,
        c.fecha_fin,
        CONCAT_WS(' ', pe.apepaterno, pe.nombres) AS 'nombreProfesor',
        au.numaula,
        au.ubicacion
from horarios h
inner join cursos c on c.idcurso = h.idcurso
JOIN aulas au ON c.idaula = au.idaula
inner join profesores pr on pr.idprofesor = c.idprofesor
INNER JOIN personas pe ON pe.idpersona = c.idprofesor
where pr.idprofesor = _idprofesor and c.estado IN ('A', 'I')
    GROUP BY
        c.titulo,c.idcurso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horarios_listarHorariosUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horarios_listarHorariosUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horarios_listarHorariosUsuario`(IN _idusuario INT)
BEGIN
    SELECT
		  c.idcurso,
        c.titulo,
        GROUP_CONCAT(CONCAT(h.dia, ' - ', TIME_FORMAT(h.horainicio, '%H : %i'), ' a ', TIME_FORMAT(h.horafin, '%H:%i'))) AS dias_horarios,
        c.fecha_inicio,
        c.fecha_fin,
        CONCAT_WS(' ', per.apepaterno, per.nombres) AS 'nombreProfesor',
        au.numaula,
        au.ubicacion,
        usu.nivelacceso
    FROM
        horarios h
        JOIN cursos c ON h.idcurso = c.idcurso
        JOIN aulas au ON c.idaula = au.idaula
        join matriculas m on m.idcurso = h.idcurso
        JOIN profesores pro ON c.idprofesor = pro.idprofesor
        JOIN personas per ON pro.idpersona = per.idpersona
        JOIN usuarios usu ON usu.idpersona = m.idalumno
    WHERE
        m.idalumno = _idusuario OR m.idapoderado = _idusuario and m.estaMatriculado = 1 and c.estado IN ('A', 'I')
    GROUP BY
        c.titulo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_horarios_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_horarios_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_horarios_obtener`(IN _idcurso INT)
BEGIN
    SELECT h.idcurso,h.idhorario, h.dia, h.horainicio, h.horafin
    FROM horarios h
    WHERE h.idcurso = _idcurso AND h.estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_deudores` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_deudores` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_deudores`()
BEGIN
			SELECT *
			FROM (
				 SELECT
					  COUNT(*) AS pagos_realizados, -- Número de pagos realizados
				alu.tipodoc, -- Tipo de documento del alumno
				alu.nrodocumento, -- Número de documento del alumno
				CONCAT_WS(' ', alu.apepaterno, alu.apematerno, alu.nombres) AS 'Nombre_Alumno', -- Nombre completo del alumno
				cur.titulo, -- Título del curso
				calcular_edad(alu.fechaNac) as 'edad_alumno',
				IF(calcular_edad(alu.fechaNac) >= 18, alu.telefono, apo.telefono) AS 'telefono', -- Teléfono del alumno si es mayor de edad, de lo contrario, teléfono del apoderado
				IF(calcular_edad(alu.fechaNac) >= 18, alu.email, apo.email) AS correo_destino, -- Correo electrónico del alumno si es mayor de edad, de lo contrario, correo electrónico del apoderado
				CONCAT_WS(' ', apo.apepaterno, apo.apematerno, apo.nombres) AS 'Nombre_Apoderado', -- Nombre completo del apoderado
					  TIMESTAMPDIFF(MONTH, cur.fecha_inicio, CURDATE()) AS diferencia_meses_actual_inicio, -- Diferencia en meses entre la fecha de inicio del curso y la fecha actual
					  TIMESTAMPDIFF(MONTH, cur.fecha_inicio, cur.fecha_fin) AS diferencia_meses_inicio_fin, -- Diferencia en meses entre la fecha de inicio y la fecha de fin del curso
					  CASE
							WHEN COUNT(*) = TIMESTAMPDIFF(MONTH, cur.fecha_inicio, CURDATE()) THEN 0 -- Si el número de pagos realizados es igual a la diferencia en meses entre la fecha de inicio y la fecha actual, asigna 0
							WHEN COUNT(*) < TIMESTAMPDIFF(MONTH, cur.fecha_inicio, CURDATE()) THEN TIMESTAMPDIFF(MONTH, cur.fecha_inicio, CURDATE()) - COUNT(*) -- Si el número de pagos realizados es menor a la diferencia en meses entre la fecha de inicio y la fecha actual, calcula los pagos pendientes
							ELSE 0 -- De lo contrario, asigna 0
							-- ELSE CONCAT('Faltan ', TIMESTAMPDIFF(MONTH, cur.fecha_inicio, cur.fecha_fin) - COUNT(*), ' pagos por realizar')
					  END AS pagos_meses_pendientes, -- Número de pagos pendientes en meses
						TIMESTAMPDIFF(MONTH, cur.fecha_inicio, cur.fecha_fin) - COUNT(*) AS pagos_totales_pendientes -- Total de pagos pendientes en meses

				 FROM
					  pagos p
					  INNER JOIN matriculas m ON p.idmatricula = m.idmatricula
					  LEFT JOIN personas alu ON m.idalumno = alu.idpersona
					  LEFT JOIN personas apo ON m.idapoderado = apo.idpersona
					  INNER JOIN cursos cur ON m.idcurso = cur.idcurso
				 WHERE
					  cur.estado != 'E'  AND cur.estado != 'I' AND  YEAR(m.fechamatricula) = YEAR(NOW())  -- Excluir cursos con estado 'E' (eliminado) y 'I' (inactivo)
				 GROUP BY
					  alu.idpersona, cur.idcurso
			) AS subconsulta
			HAVING diferencia_meses_actual_inicio != 0 AND pagos_totales_pendientes != 0 -- Filtrar por diferencia en meses actual a inicio distinta de 0 y pagos totales pendientes distinto de 0
			ORDER BY pagos_realizados; -- Ordenar por número de pagos realizados
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_crear`(
    IN _idalumno INT,
    IN _idapoderado INT,
    IN _parentesco VARCHAR(30),
    IN _idcurso INT,
    IN _observacion VARCHAR(80)
)
BEGIN
    -- Verificar si el estudiante ya está inscrito en el curso
    SELECT estado INTO @estado
    FROM matriculas
    WHERE idalumno = _idalumno AND idcurso = _idcurso;
    
    IF @estado IS NOT NULL THEN
        SELECT 'DENEGAR' AS mensaje;
    ELSE
        -- Insertar la inscripción con estado
        INSERT INTO matriculas (idalumno, idapoderado, parentesco, idcurso, observacion)
        VALUES (_idalumno, _idapoderado, _parentesco, _idcurso, _observacion);
        
        SELECT 'PERMITIR' AS mensaje;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_listar`(
	in _idcurso INT
)
BEGIN
	SELECT per.idpersona, per.tipodoc,per.nrodocumento,CONCAT_WS(' ',per.apepaterno,per.apematerno,per.nombres) AS 'nombreAlumno',m.parentesco,CONCAT_WS(' ',apo.apepaterno,apo.nombres) AS 'nombreApoderado', m.idmatricula ,m.estaMatriculado,c.titulo,c.totalhoras,m.fechamatricula
	FROM matriculas m 
	JOIN personas per ON m.idalumno = per.idpersona
	LEFT JOIN personas apo ON m.idapoderado = apo.idpersona
	JOIN cursos c ON m.idcurso = c.idcurso
	WHERE m.estado='1' and m.idcurso = _idcurso
	ORDER BY m.fecha_alta ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_matricular` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_matricular` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_matricular`(IN _idmatricula INT)
BEGIN

-- Verificar si existe un único pago asociado a la matrícula
IF ((SELECT COUNT(*) FROM pagos WHERE idmatricula = _idmatricula) = 1) THEN
    -- Permitir matriculación
    UPDATE matriculas m
    INNER JOIN cursos c ON m.idcurso = c.idcurso
    SET
        c.vacantes = c.vacantes - 1,
        m.estaMatriculado = '1',
        m.fechamatricula = NOW()
    WHERE
        m.idmatricula = _idmatricula AND
        m.estado = '1' AND
        m.estaMatriculado = '0';

    SELECT 'permitir' AS estado;
ELSE
    -- Denegar matriculación
    SELECT 'denegar' AS estado;
END IF;

END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_matriculas_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_matriculas_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_matriculas_obtener`(IN _idmatricula INT)
BEGIN
	SELECT m.idalumno,m.idapoderado,m.parentesco, m.curso, m.fechamatricula, m.observacion, m.estaMatriculado
	FROM matriculas m
	WHERE m.idmatricula=_idmatricula AND m.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_pagos_descuento` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_pagos_descuento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_pagos_descuento`(
IN _idpago INT,
IN _porcentajedescuento INT,
IN _descuento FLOAT
)
BEGIN 
	UPDATE pagos p
	SET p.importe = p.importe * _descuento, porcentajedescuento =  _porcentajedescuento , observacion = concat('Se aplicó un descuento del ', cast(_porcentajedescuento as char), ' %' )
	WHERE p.estado='1' AND p.idpago=_idpago and p.porcentajedescuento=0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_pagos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_pagos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_pagos_listar`()
BEGIN
	SELECT  CONCAT_WS(' ',per.apepaterno,per.nombres) AS 'Nombre',cur.titulo,cur.nivel,cur.edadminima,cur.edadmaxima,tp.tipopago,p.num_operacion,p.importe,p.fechapago,p.porcentajedescuento, p.observacion
	FROM pagos p
	JOIN usuarios u ON p.idusuario = u.idusuario
	JOIN personas per ON u.idpersona = per.idpersona
	JOIN tipospago tp ON p.idtipopago = tp.idtipopago
	JOIN matriculas m ON p.idmatricula = m.idmatricula
	JOIN cursos cur ON m.idcurso = cur.idcurso
	WHERE p.estado='1'
	ORDER BY p.fechapago ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_pagos_pagar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_pagos_pagar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_pagos_pagar`(
    IN _idusuario INT,
    IN _idtipopago INT,
    IN _idmatricula SMALLINT,  
    IN _importe FLOAT(6,2),
    IN _porcentajedescuento INT,
    IN _observacion VARCHAR(80)
)
BEGIN
    -- Verificar si el usuario ya ha realizado un pago para esta matrícula
    DECLARE paymentCount INT;

    SELECT COUNT(*) INTO paymentCount
    FROM pagos
    WHERE idusuario = _idusuario AND idmatricula = _idmatricula;

    IF paymentCount = 0 THEN
        -- Insertar el pago en la tabla pagos
        INSERT INTO pagos (idusuario, idtipopago, idmatricula, importe, porcentajedescuento, observacion)
        VALUES (_idusuario, _idtipopago, _idmatricula, _importe, _porcentajedescuento, _observacion);

        -- Actualizar matriculas para marcarla como matriculada y establecer la fecha de matriculación
        UPDATE matriculas
        SET estaMatriculado = '1', fechamatricula = NOW()
        WHERE idmatricula = _idmatricula;

        -- Disminuir en 1 la vacante en la tabla cursos
        UPDATE cursos
        SET vacantes = vacantes - 1
        WHERE idcurso = (SELECT idcurso FROM matriculas WHERE idmatricula = _idmatricula);
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_pagos_totalPagosproMes` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_pagos_totalPagosproMes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_pagos_totalPagosproMes`(
in _mesPago int
)
begin
	select c.titulo, c. nivel, c.edadminima as 'de', c.edadmaxima as 'a' , month(p.fechapago) as mes , sum(p.importe) as 'total'
	from pagos p
	join matriculas m on p.idmatricula = m.idmatricula 
	join cursos c on m.idcurso = c.idcurso
	where month(p.fechapago)= _mesPago
	group by c.titulo, month(p.fechapago) order by sum(p.importe) desc;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_personas_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_personas_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_personas_crear`(
IN _tipodoc CHAR(3),
IN _nrodocumento VARCHAR(9),
IN _apepaterno VARCHAR(50), 
IN _apematerno VARCHAR(50), 
IN _nombres VARCHAR(80), 
IN _fechaNac DATE, 
IN _telefono VARCHAR(9), 
IN _direccion VARCHAR(100), 
IN _email VARCHAR(100)
)
BEGIN
	INSERT INTO personas (tipodoc, nrodocumento,apepaterno, apematerno, nombres, fechaNac, telefono, direccion, email) 
	VALUES (_tipodoc, _nrodocumento, _apepaterno, _apematerno, _nombres, _fechaNac, _telefono, _direccion, _email); 
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_personas_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_personas_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_personas_editar`(
IN _idpersona INT,
IN _tipodoc CHAR(3),
IN _nrodocumento VARCHAR(9),
IN _apepaterno VARCHAR(50), 
IN _apematerno VARCHAR(50), 
IN _nombres VARCHAR(80), 
IN _fechaNac DATE, 
IN _telefono VARCHAR(9), 
IN _direccion VARCHAR(100), 
IN _email VARCHAR(100)
)
BEGIN
	UPDATE personas p
	    SET 
		p.tipodoc = _tipodoc, 
		p.nrodocumento = _nrodocumento,
		p.apepaterno = _apepaterno, 
		p.apematerno = _apematerno, 
		p.nombres = _nombres, 
		p.fechaNac = _fechaNac, 
		p.telefono = _telefono, 
		p.direccion = _direccion, 
		p.email = _email
	WHERE p.idpersona= _idpersona;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_personas_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_personas_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_personas_eliminar`(IN _idpersona INT)
BEGIN
	UPDATE personas p
		SET p.estado ='0' , p.fecha_baja= NOW()
	WHERE p.idpersona = _idpersona AND p.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_personas_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_personas_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_personas_listar`()
BEGIN
    SELECT p.idpersona, p.tipodoc, p.nrodocumento, CONCAT_WS(' ', p.apepaterno, p.apematerno, p.nombres) AS 'nombrePila', p.fechaNac, p.telefono, p.direccion, p.email, usuarios.nivelacceso,usuarios.idusuario
    FROM personas p
    left JOIN usuarios ON usuarios.idpersona = p.idpersona
    WHERE p.estado = '1'
    ORDER BY p.apepaterno;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_personas_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_personas_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_personas_obtener`(IN _idpersona INT)
BEGIN
	SELECT p.tipodoc, p.nrodocumento, p.apepaterno, p.apematerno, p.nombres, p.fechaNac, p.telefono, p.direccion, p.email
	 FROM personas p
	 WHERE p.idpersona= _idpersona AND p.estado=1;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_profesores_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_profesores_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_profesores_crear`(
IN _idpersona INT,
IN _nom_banco VARCHAR(10),
IN _num_cuenta VARCHAR(14),
IN _tipo_cuenta VARCHAR(7)
)
BEGIN
	INSERT INTO profesores(idpersona,nom_banco,num_cuenta,tipo_cuenta) VALUES
	(_idpersona,_nom_banco,_num_cuenta,_tipo_cuenta);

END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_profesores_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_profesores_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_profesores_editar`(
IN _idprofesor INT,
IN _idpersona INT,
IN _nom_banco VARCHAR(10),
IN _num_cuenta VARCHAR(14),
IN _tipo_cuenta VARCHAR(7)
)
BEGIN
	UPDATE profesores p
		SET 
		p.idpersona=_idpersona,
		p.nom_banco=_nom_banco,
		p.num_cuenta=_num_cuenta,
		p.tipo_cuenta=_tipo_cuenta
	WHERE p.idprofesor = _idprofesor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_profesores_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_profesores_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_profesores_eliminar`(IN _idprofesor INT)
BEGIN
	UPDATE profesores prof
	SET prof.estado = '0', prof.fecha_baja = NOW()
	WHERE prof.idprofesor = _idprofesor AND prof.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_profesores_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_profesores_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_profesores_listar`()
BEGIN
	SELECT prof.idprofesor,per.tipodoc, per.nrodocumento,CONCAT_WS(' ',per.apepaterno,per.apematerno,per.nombres) AS 'nombrePila',per.telefono, prof.nom_banco, prof.num_cuenta, prof.tipo_cuenta
		FROM profesores prof
		JOIN personas per ON prof.idpersona = per.idpersona
	WHERE prof.estado = '1' AND per.estado='1'
	ORDER BY per.apepaterno ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_profesores_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_profesores_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_profesores_obtener`(IN _idprofesor INT)
BEGIN
	SELECT p.nom_banco, p.num_cuenta, p.tipo_cuenta
	FROM profesores p
	WHERE p.idprofesor= _idprofesor AND p.estado='1';

END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_taller_mayorIngreso` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_taller_mayorIngreso` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_taller_mayorIngreso`(
	in _mes int,
	in _anio int 
)
begin 
	SELECT SUM(importe) AS ingreso_mensual, MONTH(p.fechapago) 'mes_de_pago', COUNT(m.idalumno) 'cantidad_alumnos',
	p.importe , c.idcurso, c.titulo
	FROM pagos p
	INNER JOIN matriculas m ON p.idmatricula = m.idmatricula
	INNER JOIN cursos c ON m.idcurso = c.idcurso
	WHERE MONTH(p.fechapago) = _mes AND c.estado= 'F' AND YEAR(m.fechamatricula) = _anio
	GROUP BY idcurso 
	ORDER BY ingreso_mensual DESC;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tipospago_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tipospago_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tipospago_crear`(IN _tipopago VARCHAR(30) )
BEGIN
	INSERT INTO tipospago (tipopago) VALUES (_tipopago);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tipospago_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tipospago_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tipospago_editar`(
	IN _idtipopago int,
	in _tipopago VARCHAR(30) 
)
BEGIN
	update tipospago 
	set tipopago =_tipopago
	where idtipopago= _idtipopago;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tipospago_eliminar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tipospago_eliminar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tipospago_eliminar`(IN _idtipopago INT )
BEGIN
	UPDATE tipospago tp 
	SET
	tp.estado ='0' , tp.fecha_baja=NOW()
	WHERE tp.idtipopago=_idtipopago AND tp.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_tipospago_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_tipospago_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_tipospago_listar`()
BEGIN
	SELECT tipopago
	FROM tipospago tp
	WHERE tp.estado='1'
	ORDER BY tipopago ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_contar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_contar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_contar`( IN _nivelacceso CHAR(1))
BEGIN
	SELECT COUNT(*) AS 'total'
	FROM usuarios 
	WHERE estado='1' AND nivelacceso = _nivelacceso group by nivelacceso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_crear`(
IN _idpersona INT,
IN  _nombreusuario VARCHAR(70),
IN _claveacceso VARCHAR(200), 
IN _nivelacceso CHAR(1)
)
BEGIN
	INSERT INTO usuarios (idpersona, nombreusuario, claveacceso, nivelacceso) VALUES
	(_idpersona, _nombreusuario, _claveacceso, _nivelacceso);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_degradarAdmin` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_degradarAdmin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_degradarAdmin`(IN _idusuario INT)
BEGIN
	UPDATE usuarios u
		SET
		u.nivelacceso='C'
	WHERE u.idusuario= _idusuario AND u.nivelacceso ='A';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_editar`(
IN _idusuario INT ,
IN  _nivelacceso VARCHAR(70)
)
BEGIN
	UPDATE usuarios u
	SET 	
	      u.nivelacceso = _nivelacceso
	WHERE u.idusuario = _idusuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_getEmail` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_getEmail` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_getEmail`(
IN _usuario VARCHAR(70)
)
BEGIN 
	SELECT u.idusuario, p.email, CONCAT_WS(' ',p.apepaterno,p.apematerno,p.nombres) AS 'nombre'
	FROM usuarios u	
	JOIN personas p ON u.idpersona = p.idpersona
	WHERE u.nombreusuario = _usuario AND u.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_habilitar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_habilitar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_habilitar`(IN _idusuario INT)
BEGIN
	UPDATE usuarios u
		SET
		u.estado = '1', u.fecha_baja = NULL
	WHERE u.idusuario= _idusuario AND u.estado='0';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_inhabilitar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_inhabilitar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_inhabilitar`(IN _idusuario INT)
BEGIN
	UPDATE usuarios u
		SET
		u.estado = '0', u.fecha_baja=NOW()
	WHERE u.idusuario= _idusuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_listar`()
BEGIN
	SELECT usu.idusuario,CONCAT_WS(' ',per.apepaterno,per.apematerno,per.nombres) AS 'Nombre Pila',usu.nombreusuario,usu.nivelacceso
	FROM usuarios usu
	JOIN  personas per ON usu.idpersona=per.idpersona	
	WHERE	usu.estado='1' AND usu.nivelacceso!='A' AND usu.nivelacceso !='R'
	ORDER BY per.apepaterno ASC; 
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_login`(IN _emailOrUserName VARCHAR(100))
BEGIN 
SELECT u.idusuario, u.idpersona, u.nombreusuario, p.nombres, p.apepaterno,p.apematerno,p.email,p.fechaNac,p.telefono,p.direccion,u.claveacceso , u.nivelacceso
FROM  personas p
JOIN usuarios u ON p.idpersona=u.idpersona
WHERE (p.email=_emailOrUserName OR u.nombreusuario= _emailOrUserName) AND u.estado='1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_obtener`(IN _nombreusuario VARCHAR(70))
BEGIN

	SELECT u.idusuario,CONCAT_WS(' ',p.apepaterno,p.apematerno) AS 'apellidos',p.nombres, p.email 
	FROM usuarios u
	INNER JOIN personas p ON u.idpersona = p.idpersona
	WHERE u.nombreusuario = _nombreusuario AND u.estado = '1';

END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_promoverInvitado` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_promoverInvitado` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_promoverInvitado`(IN _idusuario INT)
BEGIN
	UPDATE usuarios u
		SET
		u.nivelacceso='A'
	WHERE u.idusuario= _idusuario AND u.nivelacceso ='C';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_promovertutor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_promovertutor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_promovertutor`(IN _idusuario INT)
BEGIN
	UPDATE usuarios u
		SET
		u.nivelacceso='C'
	WHERE u.idusuario= _idusuario AND u.nivelacceso ='T';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuario_editarClaveAcceso` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuario_editarClaveAcceso` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuario_editarClaveAcceso`(IN _idusuario INT, _claveacceso VARCHAR(200) )
BEGIN 
     UPDATE usuarios u
	SET u.claveacceso = _claveacceso 
      WHERE u.idusuario= _idusuario AND u.estado='1';	
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_validar_vacantes` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_validar_vacantes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_validar_vacantes`(in _idcurso int)
begin
	SELECT IF((c.vacantes - COUNT(*)) > 0, 1, 0) AS mensaje
	FROM matriculas m
	INNER JOIN cursos c ON m.idcurso = c.idcurso
	WHERE m.idcurso = _idcurso AND estaMatriculado = 1 and c.estado in ('A', 'I')
	GROUP BY c.idcurso;
end */$$
DELIMITER ;

/* Procedure structure for procedure `verificarCorreo` */

/*!50003 DROP PROCEDURE IF EXISTS  `verificarCorreo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarCorreo`(
	IN _email VARCHAR(100)
)
BEGIN 
	IF ((SELECT COUNT(*) FROM personas WHERE email = _email) = 1) THEN
		SELECT 'denegar' AS 'status';
	ELSE
		SELECT 'permitir' AS 'status';
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `verificarDNI` */

/*!50003 DROP PROCEDURE IF EXISTS  `verificarDNI` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarDNI`(
	IN _dni VARCHAR(9)
)
BEGIN 
	IF ((SELECT COUNT(*) FROM personas WHERE nrodocumento = _dni) = 1) THEN
		SELECT 'denegar' AS 'status';
	ELSE
		SELECT 'permitir' AS 'status';
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `verificarTelefono` */

/*!50003 DROP PROCEDURE IF EXISTS  `verificarTelefono` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarTelefono`(
	IN _telefono VARCHAR(9)
)
BEGIN 
	IF ((SELECT COUNT(*) FROM personas WHERE telefono = _telefono) = 1) THEN
		SELECT 'denegar' AS 'status';
	ELSE
		SELECT 'permitir' AS 'status';
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `verificarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `verificarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarUsuario`(
	IN _usuario VARCHAR(70)
)
BEGIN 
	IF ((SELECT COUNT(*) FROM usuarios WHERE nombreusuario = _usuario) = 1) THEN
		SELECT 'denegar' AS 'status';
	ELSE
		SELECT 'permitir' AS 'status';
	END IF;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
