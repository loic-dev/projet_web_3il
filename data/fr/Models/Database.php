<?php

use Database as GlobalDatabase;

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
        
        public static function insertDb($table, $array = []) {
                try {
                        $columns=array_keys($array);
                        $values=array_values($array);
                        $str="INSERT INTO $table (".implode(',',$columns).") VALUES ('" . implode("', '", $values) . "' )";
                        Database::getPdo()->prepare($str)->execute();
                } catch (exception $e) {
                        throw $e;
                } 
        }
        
        public static function selectDb($what, $from, $conditions = [], $attr = []) {
                try {
                        $sql = "SELECT $what FROM $from WHERE ";
                        foreach ($conditions as $condition) {
                                $sql .= $condition . " ";
                        }
                        // var_dump($sql);
                        // var_dump(Database::getPdo());
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute($attr);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                } 
        }

        public static function selectOrderDb($what, $from, $conditions = [], $attr = [], $limit = 1) {
                try {
                        $sql = "SELECT $what FROM $from WHERE ";
                        foreach ($conditions as $condition) {
                                $sql .= $condition . " ";
                        }
                        $sql .= "ORDER BY IdAdvert LIMIT $limit";
                        // var_dump($sql);
                        // var_dump(Database::getPdo());
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute($attr);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                } 
        }


        public static function selectRandomDb($what, $from, $conditions = [], $attr = [], $limit = 1) {
                try {
                        $sql = "SELECT $what FROM $from WHERE ";
                        foreach ($conditions as $condition) {
                                $sql .= $condition . " ";
                        }
                        $sql .= "ORDER BY IdAdvert DESC LIMIT $limit";
                        // var_dump($sql);
                        // var_dump(Database::getPdo());
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute($attr);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                } 
        }

        public static function searchDb($what, $from, $match, $orderBy, $limit = 1) {
                try {
                        $sql = "SELECT * FROM Advert where Title LIKE '%$match' ORDER BY $orderBy LIMIT $limit;";
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute();
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                } 
        }
        
}
?>