<?php 

new Database();

$advert = new Advert();
$structure = new Structure();
$id_advert = $_GET['q'];
$advert->getAdvert($id_advert);
$structure->setMail($advert->getMailStructure());
$structure->fetchUserData();

$instruments=Instrument::fetchAllInstruments();
$levels=Level::fetchAllLevels();
$rubrics=Rubric::fetchAllRubrics();
?>