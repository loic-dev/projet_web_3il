-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 27, 2022 at 05:05 PM
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
  `Description` varchar(255) NOT NULL,
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
(12, 'test', 'test123', '', '../././/', '../././/', '../././/', 'francoisdks@gmail.com', 'Flute', 'Easy', 'Study', 'Millau-1');

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
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instrument`
--

INSERT INTO `Instrument` (`Name`) VALUES
('Flute');

-- --------------------------------------------------------

--
-- Table structure for table `Level`
--

CREATE TABLE `Level` (
  `Level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Level`
--

INSERT INTO `Level` (`Level`) VALUES
('Easy');

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
('Study');

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
('Francois', '06 06 06 06 06', 'francoisdks@gmail.com', 'ffff.fr', '15 aavvv', '123456', 'Millau-1', 0);

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
  MODIFY `IdAdvert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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


-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Rodez-1","Rodez");
-- -- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-1","Millau");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causse-Comtal","Agen-d'Aveyron");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-2","Aguessac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Les Albres");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Almont-les-Junies");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Alrance");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Ambeyrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Anglars-Saint-Félix");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Argences en Aubrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Arnac-sur-Dourdou");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Arques");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Arvieu");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Asprières");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Aubin");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Auriac-Lagast");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Auzits");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Ayssènes");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Balaguier-d'Olt");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Balaguier-sur-Rance");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Baraqueville");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Le Bas Ségala");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","La Bastide-Pradines");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Bastide-Solages");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Belcastel");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Belmont-sur-Rance");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Bertholène");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Bessuéjouls");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Boisse-Penchot");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Bor-et-Bar");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Bouillac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Bournazel");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Boussac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causse-Comtal","Bozouls");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Brandonnet");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Brasc");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Brommat");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Broquiès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Brousse-le-Château");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Brusque");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Cabanès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Calmels-et-le-Viala");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Calmont");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Camarès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Camboulazet");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Camjac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Campagnac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Campouriez");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Campuac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Canet-de-Salars");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Cantoin");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Capdenac-Gare");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","La Capelle-Balaguier");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","La Capelle-Bleys");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","La Capelle-Bonance");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Cassagnes-Bégonhès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Cassuéjouls");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Castanet");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Castelmary");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Castelnau-de-Mandailles");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Castelnau-Pégayrols");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Causse-et-Diège");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Cavalerie");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Le Cayrol");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Centrès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Clairvaux-d'Aveyron");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Le Clapier");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Colombiès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Combret");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-2","Compeyre");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Compolibat");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-1","Comprégnac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Comps-la-Grand-Ville");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Condom-d'Aubrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Connac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Conques-en-Rouergue");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Cornus");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Les Costes-Gozon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Coubisou");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Coupiac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Couvertoirade");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Cransac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-1","Creissels");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Crespin");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","La Cresse");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Curan");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Curières");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Decazeville");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Druelle Balsac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Drulhe");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Durenque");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Entraygues-sur-Truyère");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Escandolières");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Espalion");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Espeyrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Estaing");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Fayet");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Le Fel");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Firmi");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Flagnac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Nord-Lévezou","Flavin");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Florentin-la-Capelle");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Foissac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Fondamente");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","La Fouillade");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causse-Comtal","Gabriac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Gaillac-d'Aveyron");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Galgan");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Gissac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Golinhac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Goutrens");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Gramond");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","L'Hospitalet-du-Larzac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Huparlac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Lacroix-Barrez");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Laguiole");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Laissac-Sévérac l'Église");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Lanuéjouls");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Lapanouse-de-Cernon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Lassouts");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Laval-Roquecezière");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Lédergues");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Lescure-Jaoul");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Lestrade-et-Thouels");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Livinhac-le-Haut");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causse-Comtal","La Loubière");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Nord-Lévezou","Luc-la-Primaube");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Lugan");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Lunac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Maleville");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Manhac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Marcillac-Vallon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Marnhagues-et-Latour");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Martiel");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Martrin");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Mayran");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Mélagues");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Meljac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Rodez-2","Le Monastère");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montagnol");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Montbazens");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montclar");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Monteils");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Montézic");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montfranc");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Montjaux");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montlaur");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Montpeyroux");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causse-Comtal","Montrozier");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Montsalès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Morlhon-le-Haut");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Mostuéjouls");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Mounes-Prohencoux");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Mouret");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Moyrazès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Mur-de-Barrez");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Murasson");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Muret-le-Château");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Murols");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Najac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-2","Nant");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Naucelle");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Naussac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Nauviale");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Le Nayrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Nord-Lévezou","Olemps");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Ols-et-Rinhodes");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Rodez-Onet","Onet-le-Château");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Palmas d'Aveyron");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-2","Paulhe");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Peux-et-Couffouleux");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Peyreleau");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Peyrusse-le-Roc");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Pierrefiche");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Plaisance");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Pomayrols");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Pont-de-Salars");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Pousthomy");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Prades-d'Aubrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Prades-Salars");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Pradinas");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Prévinquières");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Privezac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Pruines");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Quins");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Rebourguil");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Réquista");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Rieupeyroux");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Enne et Alzou","Rignac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Rivière-sur-Tarn");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causse-Comtal","Rodelle");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","La Roque-Sainte-Marguerite");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Roquefort-sur-Soulzon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villefranche-de-Rouergue","La Rouquette");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Roussennac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Rullac-Saint-Cirq");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Affrique");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Saint-Amans-des-Cots");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Saint-André-de-Najac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-André-de-Vézines");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Beaulize");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Beauzély");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Saint-Chély-d'Aubrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Saint-Christophe-Vallon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Saint-Côme-d'Olt");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Saint-Félix-de-Lunel");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Félix-de-Sorgues");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Saint Geniez d'Olt et d'Aubrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-1","Saint-Georges-de-Luzençon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Saint-Hippolyte");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Saint-Igest");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Izaire");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Jean-d'Alcapiès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Saint-Jean-Delnous");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Millau-2","Saint-Jean-du-Bruel");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Jean-et-Saint-Paul");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Juéry");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Saint-Just-sur-Viaur");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Laurent-d'Olt");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Laurent-de-Lévézou");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Léons");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Martin-de-Lenne");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Saint-Parthem");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Saint-Rémy");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Rome-de-Cernon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Rome-de-Tarn");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Saint-Santin");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Saturnin-de-Lenne");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Sernin-sur-Rance");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Sever-du-Moustier");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Saint-Symphorien-de-Thénières");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Victor-et-Melvieu");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Sainte-Croix");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Sainte-Eulalie-d'Olt");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Sainte-Eulalie-de-Cernon");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Sainte-Juliette-sur-Viaur");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Nord-Lévezou","Sainte-Radegonde");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Salles-Courbatiès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Salles-Curan");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Salles-la-Source");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Salmiech");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Salvagnac-Cajarc");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","La Salvetat-Peyralès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Sanvensa");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Sauclières");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Saujac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Sauveterre-de-Rouergue");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Savignac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causse-Comtal","Sébazac-Concourès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Sébrazac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Ségur");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Monts du Réquistanais","La Selve");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Sénergues");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Serre");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Sévérac d'Aveyron");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Sonnac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Soulages-Bonneval");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Sylvanès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Tauriac-de-Camarès");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Ceor-Ségala","Tauriac-de-Naucelle");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Taussac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Tayrac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Thérondels");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Toulonjac");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Tournemire");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Trémouilles");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Le Truel");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Vabres-l'Abbaye");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villefranche-de-Rouergue","Vailhourles");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Vallon","Valady");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Valzergues");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Vaureilles");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Verrières");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Saint-Affrique","Versols-et-Lapeyre");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Veyreau");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Vézins-de-Lévézou");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Causses-Rougiers","Viala-du-Pas-de-Jaux");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Tarn et Causses","Viala-du-Tarn");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Le Vibal");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Truyère","Villecomtal");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Villefranche-de-Panat");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villefranche-de-Rouergue","Villefranche-de-Rouergue");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Villeneuve");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Palanges","Vimenet");
-- INSERT INTO `Canton` (`Canton`, `City`) VALUES ("Lot et Dourdou","Viviez");


