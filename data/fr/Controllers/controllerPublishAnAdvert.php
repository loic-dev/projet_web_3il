<?php 

new Database();
$instruments=Instrument::fetchAllInstruments();
$levels=Level::fetchAllLevels();
$rubrics=Rubric::fetchAllRubrics();
?>