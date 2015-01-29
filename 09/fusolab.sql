-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Gen 21, 2015 alle 23:18
-- Versione del server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fusolab`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `CourseAttenders`
--

CREATE TABLE IF NOT EXISTS `CourseAttenders` (
  `id_course` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  KEY `course` (`id_course`),
  KEY `person` (`id_person`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CourseAttenders`
--

INSERT INTO `CourseAttenders` (`id_course`, `id_person`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `CourseAttendersView`
--
CREATE TABLE IF NOT EXISTS `CourseAttendersView` (
`CourseName` varchar(100)
,`hours` int(11)
,`year` year(4)
,`semester` int(11)
,`name` varchar(30)
,`surname` varchar(30)
,`email` varchar(50)
,`tel` varchar(20)
,`birthday` date
);
-- --------------------------------------------------------

--
-- Struttura della tabella `CourseHolders`
--

CREATE TABLE IF NOT EXISTS `CourseHolders` (
  `id_course` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  KEY `course` (`id_course`),
  KEY `teacher` (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CourseHolders`
--

INSERT INTO `CourseHolders` (`id_course`, `id_teacher`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `CourseHoldersView`
--
CREATE TABLE IF NOT EXISTS `CourseHoldersView` (
`CourseName` varchar(100)
,`hours` int(11)
,`year` year(4)
,`semester` int(11)
,`name` varchar(30)
,`surname` varchar(30)
,`email` varchar(50)
,`tel` varchar(20)
,`birthday` date
);
-- --------------------------------------------------------

--
-- Struttura della tabella `Courses`
--

CREATE TABLE IF NOT EXISTS `Courses` (
  `id_course` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `hours` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_course`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dump dei dati per la tabella `Courses`
--

INSERT INTO `Courses` (`id_course`, `name`, `hours`, `year`, `semester`) VALUES
(1, 'Javascript', 32, 2014, 1),
(2, 'PHP', 32, 2014, 1),
(3, 'Arduino', 32, 2014, 1),
(4, 'Stampa 3D', 16, 2014, 1),
(5, 'Taglio e Cucito', 16, 2014, 2),
(6, 'Montaggio video', 32, 2014, 1),
(7, 'Fotografia', 32, 2014, 1),
(8, 'Pasticceria', 16, 2014, 2),
(9, 'Tango', 16, 2014, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `People`
--

CREATE TABLE IF NOT EXISTS `People` (
  `id_person` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`id_person`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `tel` (`tel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dump dei dati per la tabella `People`
--

INSERT INTO `People` (`id_person`, `name`, `surname`, `email`, `tel`, `birthday`) VALUES
(1, 'Andrea', 'Moretti', 'axyzxp@gmail.com', '+393270245655', '1987-10-11'),
(2, 'Gianni', 'Bianchi', 'gianni.bianchi@gmail.com', '+393387986452', '1984-11-10'),
(3, 'Fausto', 'Rossi', 'fausto.rossi@gmail.com', '+393298574895', '1986-09-07'),
(4, 'Chiara', 'Fermi', 'chiara.fermi@gmail.com', '+393497814958', '1990-07-05'),
(5, 'Elisa', 'Rondi', 'elisa.rondi@gmail.com', '+393479685985', '1988-03-24'),
(6, 'Marco', 'Bassi', 'marco.bassi@gmail.com', '+393369812457', '1988-03-23'),
(7, 'Luigi', 'Terzi', 'luigi.terzi@gmail.com', '+393298747147', '1989-02-19'),
(8, 'Francesca', 'Reni', 'francesca.reni@gmail.com', '+393202548759', '1978-12-15'),
(9, 'Antonello', 'Reggiani', 'antonello.reggiani@gmail.com', '+393359874147', '1975-09-13'),
(10, 'Dario', 'Pansi', 'dario.pansi@gmail.com', '+393498714536', '1964-06-05'),
(11, 'Anna', 'La Manna', 'anna.lamanna@gmail.com', '+393921457478', '1992-07-30'),
(12, 'Mauro', 'Sarti', 'mauro.sarti@gmail.com', '+393932541478', '1987-05-01');

-- --------------------------------------------------------

--
-- Struttura della tabella `Teachers`
--

CREATE TABLE IF NOT EXISTS `Teachers` (
  `id_teacher` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_teacher`),
  KEY `person` (`id_person`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `Teachers`
--

INSERT INTO `Teachers` (`id_teacher`, `id_person`) VALUES
(1, 1),
(2, 11),
(3, 12);

-- --------------------------------------------------------

--
-- Struttura per la vista `CourseAttendersView`
--
DROP TABLE IF EXISTS `CourseAttendersView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `CourseAttendersView` AS select `Courses`.`name` AS `CourseName`,`Courses`.`hours` AS `hours`,`Courses`.`year` AS `year`,`Courses`.`semester` AS `semester`,`People`.`name` AS `name`,`People`.`surname` AS `surname`,`People`.`email` AS `email`,`People`.`tel` AS `tel`,`People`.`birthday` AS `birthday` from ((`CourseAttenders` join `Courses` on((`CourseAttenders`.`id_course` = `Courses`.`id_course`))) join `People` on((`CourseAttenders`.`id_person` = `People`.`id_person`))) order by `Courses`.`name`;

-- --------------------------------------------------------

--
-- Struttura per la vista `CourseHoldersView`
--
DROP TABLE IF EXISTS `CourseHoldersView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `CourseHoldersView` AS select `Courses`.`name` AS `CourseName`,`Courses`.`hours` AS `hours`,`Courses`.`year` AS `year`,`Courses`.`semester` AS `semester`,`People`.`name` AS `name`,`People`.`surname` AS `surname`,`People`.`email` AS `email`,`People`.`tel` AS `tel`,`People`.`birthday` AS `birthday` from (((`Courses` join `CourseHolders` on((`Courses`.`id_course` = `CourseHolders`.`id_course`))) join `Teachers` on((`CourseHolders`.`id_teacher` = `Teachers`.`id_teacher`))) join `People` on((`Teachers`.`id_person` = `People`.`id_person`)));

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `CourseAttenders`
--
ALTER TABLE `CourseAttenders`
  ADD CONSTRAINT `CourseAttenders_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `Courses` (`id_course`),
  ADD CONSTRAINT `CourseAttenders_ibfk_2` FOREIGN KEY (`id_person`) REFERENCES `People` (`id_person`);

--
-- Limiti per la tabella `CourseHolders`
--
ALTER TABLE `CourseHolders`
  ADD CONSTRAINT `CourseHolders_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `Courses` (`id_course`),
  ADD CONSTRAINT `CourseHolders_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `Teachers` (`id_teacher`);

--
-- Limiti per la tabella `Teachers`
--
ALTER TABLE `Teachers`
  ADD CONSTRAINT `Teachers_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `People` (`id_person`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
