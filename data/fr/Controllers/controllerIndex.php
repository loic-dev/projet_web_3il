<?php 
require_once '../Models/RequireAll.php';
require_once '../utils/functions.php'; 

new Database();

$ad = new Advert();


echo object_json_response(200, $ad::getOrderAdvertFromCanton(6,"Millau-1"));

?>