<?php

    $host = getenv('MYSQL_HOST');
    $dbname = getenv('MYSQL_DATABASE');
    $user = 'root';
    $pass = getenv('MYSQL_ROOT_PASSWORD');

   try{
        $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING) ;
   }
   catch(PDOException $e){
        echo $e->getMessage();
   }
?>