<?php

   class Database
   {
       private static $_pdo;
    
       public function __construct() {
            $host = getenv('MYSQL_HOST');
            $dbname = getenv('MYSQL_DATABASE');
            $user = 'root';
            $pass = getenv('MYSQL_ROOT_PASSWORD');
            try {
                    self::$_pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
                    self::$_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING) ;
            }
            catch(PDOException $e) {
                    echo $e->getMessage();
            }
       }

       public static function getPdo() {
            return self::$_pdo;
       }

   }
?>