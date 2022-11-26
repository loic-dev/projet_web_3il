<?php
/**
 * @category   Model
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

class Database
{
        private static $_pdo;

        public function __construct()
        {
                $host = getenv('MYSQL_HOST');
                $dbname = getenv('MYSQL_DATABASE');
                $user = 'root';
                $pass = getenv('MYSQL_ROOT_PASSWORD');
                try {
                        self::$_pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                        self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }

        public static function getPdo()
        {
                return self::$_pdo;
        }

        function insertDb($table, $array = [])
        {
                try {
                        $columns = array_keys($array);
                        $values = array_values($array);
        
                        $arrToExec = array();
        
                        $str = "INSERT INTO $table (";
                        foreach($columns as $column) {
                            $str .= $column;
                            $str .= ',';
                        }
                        $str = substr_replace($str ,"", -1);
                        $str .= ') VALUES (';
                        foreach($columns as $key => $column) {
                            $arrToExec[':' . $column] = $values[$key];
                            $str .= ':' . $column;
                            $str .= ',';
                        } 
                        $str = substr_replace($str ,"", -1);
                        $str .= ')';
                        Database::getPdo()->prepare($str)->execute($arrToExec);
                } catch (exception $e) {
                        throw $e;
                }
        }

        public static function selectAllDb($what, $from)
        {
                try {
                        $sql = "SELECT $what FROM :from";
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute([
                                ':form' => $from
                        ]);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                }
        }


        public static function selectDb($what, $from, $conditions = [], $attr = [])
        {
                try {
                        $sql = "SELECT $what FROM $from WHERE ";
                        foreach ($conditions as $condition) {
                                $sql .= $condition . " ";
                        }
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute($attr);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                }
        }

        public static function selectOrderDb($what, $from, $conditions = [], $attr = [], $limit = 1)
        {
                try {
                        $sql = "SELECT $what FROM $from WHERE ";
                        foreach ($conditions as $condition) {
                                $sql .= $condition . " ";
                        }
                        $sql .= "ORDER BY IdAdvert LIMIT $limit";
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute($attr);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                }
        }


        public static function selectRandomDb($what, $from, $conditions = [], $attr = [], $limit = 1)
        {
                try {
                        $sql = "SELECT $what FROM $from WHERE ";
                        foreach ($conditions as $condition) {
                                $sql .= $condition . " ";
                        }
                        $sql .= "ORDER BY IdAdvert DESC LIMIT $limit";
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute($attr);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                }
        }

        public static function searchDb($what, $from, $match, $orderBy, $limit = 1)
        {
                try {
                        $sql = "SELECT * FROM Advert where Title LIKE :match ORDER BY :orderBy LIMIT :limit;";
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute([
                                ':match' => '%' . $match,
                                ':orderBy' => $orderBy,
                                ':limit' => $limit
                        ]);
                        return $result->fetchAll();
                } catch (exception $e) {
                        throw $e;
                }
        }

        function updateDb($table, $toMatch, $match, $values = [])
        {
                try {
                        $sql = "UPDATE $table SET ";
                        foreach ($values as $key => $value) {
                                $sql .= "$key = :$key";
                                $sql .= ',';
                        }
                        $sql = substr_replace($sql ,"", -1);
                        $sql .= " WHERE $toMatch = :toMatch ;";
                        var_dump($sql);
        
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute(array_merge([':toMatch' => $match],$values));
                        
                } catch (exception $e) {
                        throw $e;
                }
        }
        public static function deleteDb($table, $conditions = [], $attr = [])
        {
                try {
                        $sql = "DELETE FROM $table WHERE ";
                        foreach ($conditions as $condition) {
                            $sql .= $condition . " ";
                        }
                        $result = Database::getPdo()->prepare($sql);
                        $result->execute($attr);
                        
                } catch (exception $e) {
                        throw $e;
                }
        }
}
