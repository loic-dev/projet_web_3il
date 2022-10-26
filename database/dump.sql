CREATE TABLE structure
(
    id VARCHAR(100) PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(320) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email_verify BOOLEAN NOT NULL,
    created_datetime INT NOT NULL,
    updated_datetime INT NOT NULL
);

INSERT INTO structure (id, name, email, password, email_verify, created_datetime, updated_datetime) VALUES ('6578465132','Francois','francoisdks@gmail.com','$2y$10$2bbMdTarDwSGN.CHrzrJw.qXXztWZJUzCOVU3h9keeu0sw9rDv0/y','1','1666690333','1666690333');

CREATE TABLE if not exists instrument
(
    -- idInstrument INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    instrument VARCHAR(50) PRIMARY KEY NOT NULL
);

INSERT INTO instrument VALUES ('Guitare'), ('Flute'), ('Trompette'), ('Piano'), ('Cornemuse');

CREATE TABLE if not exists category
(
    -- idCategory INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    category VARCHAR(50) PRIMARY KEY NOT NULL
);

INSERT INTO category VALUES ('Cat 1'), ('Cat 2'), ('Cat 3'), ('Cat 4'), ('Cat 5') ;

CREATE TABLE if not exists difficulty
(
    -- idDifficulty INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    difficulty VARCHAR(50) PRIMARY KEY NOT NULL
);

INSERT INTO difficulty VALUES ('A1'), ('A2'), ('A3'), ('A4'), ('A5') ;























CREATE TABLE if not exists MatchCantonCity ( Canton VARCHAR(50) NOT NULL, City VARCHAR(80) PRIMARY KEY NOT NULL );

INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Rodez-1","Rodez");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-1","Millau");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causse-Comtal","Agen-d'Aveyron");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-2","Aguessac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Les Albres");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Almont-les-Junies");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Alrance");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Ambeyrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Anglars-Saint-Félix");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Argences en Aubrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Arnac-sur-Dourdou");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Arques");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Arvieu");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Asprières");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Aubin");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Auriac-Lagast");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Auzits");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Ayssènes");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Balaguier-d'Olt");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Balaguier-sur-Rance");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Baraqueville");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Le Bas Ségala");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","La Bastide-Pradines");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Bastide-Solages");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Belcastel");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Belmont-sur-Rance");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Bertholène");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Bessuéjouls");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Boisse-Penchot");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Bor-et-Bar");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Bouillac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Bournazel");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Boussac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causse-Comtal","Bozouls");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Brandonnet");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Brasc");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Brommat");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Broquiès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Brousse-le-Château");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Brusque");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Cabanès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Calmels-et-le-Viala");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Calmont");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Camarès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Camboulazet");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Camjac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Campagnac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Campouriez");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Campuac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Canet-de-Salars");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Cantoin");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Capdenac-Gare");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","La Capelle-Balaguier");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","La Capelle-Bleys");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","La Capelle-Bonance");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Cassagnes-Bégonhès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Cassuéjouls");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Castanet");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Castelmary");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Castelnau-de-Mandailles");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Castelnau-Pégayrols");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Causse-et-Diège");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Cavalerie");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Le Cayrol");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Centrès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Clairvaux-d'Aveyron");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Le Clapier");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Colombiès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Combret");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-2","Compeyre");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Compolibat");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-1","Comprégnac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Comps-la-Grand-Ville");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Condom-d'Aubrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Connac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Conques-en-Rouergue");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Cornus");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Les Costes-Gozon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Coubisou");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Coupiac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Couvertoirade");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Cransac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-1","Creissels");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Crespin");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","La Cresse");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Curan");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Curières");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Decazeville");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Druelle Balsac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Drulhe");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Durenque");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Entraygues-sur-Truyère");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Escandolières");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Espalion");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Espeyrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Estaing");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Fayet");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Le Fel");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Firmi");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Flagnac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Nord-Lévezou","Flavin");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Florentin-la-Capelle");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Foissac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Fondamente");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","La Fouillade");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causse-Comtal","Gabriac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Gaillac-d'Aveyron");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Galgan");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Gissac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Golinhac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Goutrens");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Gramond");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","L'Hospitalet-du-Larzac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Huparlac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Lacroix-Barrez");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Laguiole");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Laissac-Sévérac l'Église");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Lanuéjouls");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Lapanouse-de-Cernon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Lassouts");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Laval-Roquecezière");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Lédergues");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Lescure-Jaoul");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Lestrade-et-Thouels");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Livinhac-le-Haut");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causse-Comtal","La Loubière");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Nord-Lévezou","Luc-la-Primaube");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Lugan");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Lunac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Maleville");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Manhac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Marcillac-Vallon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Marnhagues-et-Latour");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Martiel");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Martrin");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Mayran");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Mélagues");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Meljac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Rodez-2","Le Monastère");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montagnol");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Montbazens");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montclar");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Monteils");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Montézic");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montfranc");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Montjaux");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Montlaur");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Montpeyroux");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causse-Comtal","Montrozier");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Montsalès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Morlhon-le-Haut");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Mostuéjouls");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Mounes-Prohencoux");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Mouret");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Moyrazès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Mur-de-Barrez");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Murasson");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Muret-le-Château");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Murols");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Najac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-2","Nant");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Naucelle");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Naussac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Nauviale");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Le Nayrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Nord-Lévezou","Olemps");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Ols-et-Rinhodes");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Rodez-Onet","Onet-le-Château");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Palmas d'Aveyron");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-2","Paulhe");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Peux-et-Couffouleux");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Peyreleau");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Peyrusse-le-Roc");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Pierrefiche");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Plaisance");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Pomayrols");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Pont-de-Salars");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Pousthomy");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Prades-d'Aubrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Prades-Salars");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Pradinas");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Prévinquières");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Privezac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Pruines");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Quins");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Rebourguil");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Réquista");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Rieupeyroux");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Enne et Alzou","Rignac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Rivière-sur-Tarn");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causse-Comtal","Rodelle");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","La Roque-Sainte-Marguerite");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Roquefort-sur-Soulzon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villefranche-de-Rouergue","La Rouquette");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Roussennac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Rullac-Saint-Cirq");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Affrique");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Saint-Amans-des-Cots");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Saint-André-de-Najac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-André-de-Vézines");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Beaulize");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Beauzély");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Saint-Chély-d'Aubrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Saint-Christophe-Vallon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Saint-Côme-d'Olt");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Saint-Félix-de-Lunel");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Félix-de-Sorgues");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Saint Geniez d'Olt et d'Aubrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-1","Saint-Georges-de-Luzençon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Saint-Hippolyte");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Saint-Igest");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Izaire");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Jean-d'Alcapiès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Saint-Jean-Delnous");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Millau-2","Saint-Jean-du-Bruel");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Jean-et-Saint-Paul");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Juéry");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Saint-Just-sur-Viaur");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Laurent-d'Olt");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Laurent-de-Lévézou");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Léons");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Martin-de-Lenne");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Saint-Parthem");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Saint-Rémy");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Saint-Rome-de-Cernon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Rome-de-Tarn");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Saint-Santin");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Saint-Saturnin-de-Lenne");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Sernin-sur-Rance");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Saint-Sever-du-Moustier");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Saint-Symphorien-de-Thénières");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Saint-Victor-et-Melvieu");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Sainte-Croix");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Sainte-Eulalie-d'Olt");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Sainte-Eulalie-de-Cernon");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Sainte-Juliette-sur-Viaur");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Nord-Lévezou","Sainte-Radegonde");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Salles-Courbatiès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Salles-Curan");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Salles-la-Source");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","Salmiech");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Salvagnac-Cajarc");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","La Salvetat-Peyralès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Sanvensa");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Sauclières");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Saujac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Sauveterre-de-Rouergue");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Savignac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causse-Comtal","Sébazac-Concourès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Sébrazac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Ségur");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Monts du Réquistanais","La Selve");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Sénergues");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","La Serre");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Sévérac d'Aveyron");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Sonnac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Soulages-Bonneval");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Sylvanès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Tauriac-de-Camarès");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Ceor-Ségala","Tauriac-de-Naucelle");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Taussac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aveyron et Tarn","Tayrac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Aubrac et Carladez","Thérondels");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Toulonjac");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Tournemire");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Trémouilles");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Le Truel");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Vabres-l'Abbaye");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villefranche-de-Rouergue","Vailhourles");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Vallon","Valady");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Montbazinois","Valzergues");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Vaureilles");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Verrières");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Saint-Affrique","Versols-et-Lapeyre");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Veyreau");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Vézins-de-Lévézou");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Causses-Rougiers","Viala-du-Pas-de-Jaux");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Tarn et Causses","Viala-du-Tarn");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Le Vibal");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Truyère","Villecomtal");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Raspes et Lévezou","Villefranche-de-Panat");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villefranche-de-Rouergue","Villefranche-de-Rouergue");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Villeneuvois et Villefranchois","Villeneuve");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Palanges","Vimenet");
INSERT INTO `MatchCantonCity` (`Canton`, `City`) VALUES ("Lot et Dourdou","Viviez");














CREATE TABLE if not exists advert
(
    idAdvert INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(500),
    adress VARCHAR(500),

    idStructure VARCHAR(100) NOT NULL,
    instrument VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    difficulty VARCHAR(50) NOT NULL,
    
    canton VARCHAR(500) NOT NULL,

    FOREIGN KEY (idStructure) REFERENCES structure(id),
    FOREIGN KEY (instrument) REFERENCES instrument(instrument),
    FOREIGN KEY (category) REFERENCES category(category),
    FOREIGN KEY (difficulty) REFERENCES difficulty(difficulty),

    FOREIGN KEY (canton) REFERENCES MatchCantonCity(Canton)
);

CREATE TABLE if not exists picture
(
    idPicture INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idAdvert INT NOT NULL,
    pathImg VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,

    FOREIGN KEY (idAdvert) REFERENCES advert(idAdvert)
);

INSERT INTO `advert` (`idAdvert`, `name`, `description`, `idStructure`, `instrument`, `category`, `difficulty`, `adress`, `canton`) 
VALUES ('123', 'Premiere annonce', 'SAS Status de la societe, un minoritaire peut avoir tt les droits. 
Tt est prévu dans les status, on peut prévoir l\'eviction d\'un actionnaire ', '6578465132', 'Flute', 'Cat 1', 'A1', 'Une adresse au pif', '');

INSERT INTO `advert` (`idAdvert`, `name`, `description`, `idStructure`, `instrument`, `category`, `difficulty`, `adress`, `canton`)
VALUES ('1242123', 'Deux annonce', 'SAS Status de la societe, un minoritaire peut avoir tt les droits. 
Tt est prévu dans les status, on peut prévoir l\'eviction d\'un actionnaire ', '6578465132', 'Flute', 'Cat 1', 'A1', 'Une adresse au pif', '');

INSERT INTO `advert` (`idAdvert`, `name`, `description`, `idStructure`, `instrument`, `category`, `difficulty`, `adress`, `canton`)
VALUES ('1209328793', 'Trois annonce', 'SAS Status de la societe, un minoritaire peut avoir tt les droits. 
Tt est prévu dans les status, on peut prévoir l\'eviction d\'un actionnaire ', '6578465132', 'Flute', 'Cat 1', 'A1', 'Une adresse au pif', '');

INSERT INTO `advert` (`idAdvert`, `name`, `description`, `idStructure`, `instrument`, `category`, `difficulty`, `adress`, `canton`)
VALUES ('1428397223', 'Quatre annonce', 'SAS Status de la societe, un minoritaire peut avoir tt les droits. 
Tt est prévu dans les status, on peut prévoir l\'eviction d\'un actionnaire ', '6578465132', 'Flute', 'Cat 1', 'A1', 'Une adresse au pif', '');