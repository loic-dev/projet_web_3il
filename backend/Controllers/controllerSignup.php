<?php


$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);
echo json_encode($_POST);

?>