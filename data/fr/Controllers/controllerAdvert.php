<?php 



$advert = new Advert();
$structure = new Structure();
$id_advert = $_GET['q'];
$advert->getAdvert($id_advert);
$structure->setMail($advert->getMailStructure());
$structure->fetchUserData();

$instrument = new Instrument();
$instrument->setName($advert->getInstrument());
$instrument->fetchOneInstruments();


?>