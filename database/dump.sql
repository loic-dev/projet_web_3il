-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Nov 27, 2022 at 01:54 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `Name` varchar(50) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Advert`
--

CREATE TABLE `Advert` (
  `IdAdvert` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(800) NOT NULL,
  `Adress` varchar(255) NOT NULL,
  `Picture1` varchar(255) NOT NULL,
  `Picture2` varchar(255) DEFAULT NULL,
  `Picture3` varchar(255) DEFAULT NULL,
  `MailStructure` varchar(255) NOT NULL,
  `Instrument` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `Rubric` varchar(255) NOT NULL,
  `Canton` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Advert`
--

INSERT INTO `Advert` (`IdAdvert`, `Title`, `Description`, `Adress`, `Picture1`, `Picture2`, `Picture3`, `MailStructure`, `Instrument`, `Level`, `Rubric`, `Canton`) VALUES
(1, 'Initiation 1', 'Initiation1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt.\r\n  Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, \r\n  ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus.\r\n   Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', '5 Rue de Bruxelles 12000 Rodez', '/images/imgAnnonce1/1.jpg', '/images/imgAnnonce1/2.jpg', '/images/imgAnnonce1/3.jpg', 'francoisdks@gmail.com', 'Guitare', 'Facile', 'Etude', 'Rodez-1'),
(2, 'Initiation2', 'Initiation2Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt.\r\n  Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, \r\n  ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus.\r\n   Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'Rue de l Occitanie 12000 Rodez', '/images/imgAnnonce2/1.jpg', '/images/imgAnnonce2/2.jpg', '/images/imgAnnonce2/3.jpg', 'francoisdks@gmail.com', 'Guitare', 'Facile', 'Etude', 'Rodez-1'),
(3, 'Initiation 3', 'Initiation3Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt.\r\n  Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, \r\n  ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus.\r\n   Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'Rue dâ€™Athenes 12000 Rodez', '/images/imgAnnonce3/1.jpg', '/images/imgAnnonce3/2.jpg', '/images/imgAnnonce3/3.jpg', 'francoisdks@gmail.com', 'Guitare', 'Facile', 'Etude', 'Rodez-1'),
(4, 'Initiation 4', 'Initiation4Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt.\r\n  Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, \r\n  ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus.\r\n   Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', 'Rue de Lisbonne 12000 Rodez', '/images/imgAnnonce4/1.jpg', '/images/imgAnnonce4/2.jpg', '/images/imgAnnonce4/3.jpg', 'francoisdks@gmail.com', 'Piano', 'Moyen', 'Etude', 'Rodez-1'),
(5, 'Initiation 5', 'Initiation5Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada tempor tincidunt.\r\n  Praesent quis ipsum magna. Sed venenatis augue et dolor sodales finibus. Nulla facilisis, felis sit amet porttitor commodo, \r\n  ipsum lorem consectetur tellus, non commodo orci eros non ex. Donec a ligula euismod, congue sapien ut, venenatis risus.\r\n   Nam tristique dictum enim. Sed suscipit, ex eu scelerisque accumsan, sem.', '4 Rue de Bruxelles 12000 Rodez', '/images/imgAnnonce5/1.jpg', '/images/imgAnnonce5/2.jpg', '/images/imgAnnonce5/3.jpg', 'francoisdks@gmail.com', 'Violon', 'Facile', 'Etude', 'Rodez-1'),
(6, 'test', 'test', 'Rue des Lilas 12100 Millau', '/images/1669511968/1.jpg', '', '', 'francoisdks@gmail.com', 'Piano', 'Difficile', 'Etude', 'Millau-1');

-- --------------------------------------------------------

--
-- Table structure for table `Canton`
--

CREATE TABLE `Canton` (
  `Canton` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Canton`
--

INSERT INTO `Canton` (`Canton`, `City`) VALUES
('Millau-1', 'Millau');

-- --------------------------------------------------------

--
-- Table structure for table `Instrument`
--

CREATE TABLE `Instrument` (
  `Name` varchar(50) NOT NULL,
  `Icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instrument`
--

INSERT INTO `Instrument` (`Name`, `Icon`) VALUES
('Batterie', 'drum'),
('Guitare', 'guitar'),
('Piano', 'piano'),
('Saxophone', 'saxophone'),
('Violon', 'violin');

-- --------------------------------------------------------

--
-- Table structure for table `Level`
--

CREATE TABLE `Level` (
  `Level` varchar(255) NOT NULL,
  `difficulty` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Level`
--

INSERT INTO `Level` (`Level`, `difficulty`) VALUES
('Difficile', 3),
('Facile', 1),
('Moyen', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Rubric`
--

CREATE TABLE `Rubric` (
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rubric`
--

INSERT INTO `Rubric` (`Name`) VALUES
('Etude');

-- --------------------------------------------------------

--
-- Table structure for table `Structure`
--

CREATE TABLE `Structure` (
  `Name` varchar(50) DEFAULT NULL,
  `Tel` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) NOT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Canton` varchar(255) DEFAULT NULL,
  `MailValid` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Structure`
--

INSERT INTO `Structure` (`Name`, `Tel`, `Mail`, `Website`, `Adress`, `Password`, `Canton`, `MailValid`) VALUES
('Admin', '', 'admin@admin.fr', '', '', '$2y$10$lmlU3vm15bkvSTUXqpj/Su3esomYPmcnThyPeKdn2Sz.2WhUQ.hRC', '', 1),
('francoisdks', '', 'francoisdks@gmail.com', '', '', '$2y$10$mMNisqE8SnVS4q.isuOM9eLuWJgWJV1vjnpagI6KcyXi9qALmPLRG', 'Millau-1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Mail`);

--
-- Indexes for table `Advert`
--
ALTER TABLE `Advert`
  ADD PRIMARY KEY (`IdAdvert`),
  ADD KEY `FK_Advert_Instrument` (`Instrument`),
  ADD KEY `FK_Advert_Level` (`Level`),
  ADD KEY `FK_Advert_MailStructure` (`MailStructure`),
  ADD KEY `FK_Advert_Rubric` (`Rubric`);

--
-- Indexes for table `Canton`
--
ALTER TABLE `Canton`
  ADD PRIMARY KEY (`City`),
  ADD UNIQUE KEY `UK_Canton_Canton` (`Canton`);

--
-- Indexes for table `Instrument`
--
ALTER TABLE `Instrument`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `Level`
--
ALTER TABLE `Level`
  ADD PRIMARY KEY (`Level`);

--
-- Indexes for table `Rubric`
--
ALTER TABLE `Rubric`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `Structure`
--
ALTER TABLE `Structure`
  ADD PRIMARY KEY (`Mail`),
  ADD KEY `FK_StructureBis_Canton` (`Canton`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Advert`
--
ALTER TABLE `Advert`
  MODIFY `IdAdvert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Advert`
--
ALTER TABLE `Advert`
  ADD CONSTRAINT `FK_Advert_Instrument` FOREIGN KEY (`Instrument`) REFERENCES `Instrument` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Advert_Level` FOREIGN KEY (`Level`) REFERENCES `Level` (`Level`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Advert_MailStructure` FOREIGN KEY (`MailStructure`) REFERENCES `Structure` (`Mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Advert_Rubric` FOREIGN KEY (`Rubric`) REFERENCES `Rubric` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
