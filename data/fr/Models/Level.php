<?php 
/**
 * @category   Model
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */
class Level
{
    private $name;

    public function __construct() {
        new Database();
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }

    static public function fetchAllLevels(){
        $levelsDatabase = Database::selectAllDb("*","Level");
        $listLevel=array();
        foreach ($levelsDatabase as $level) {
            $lev = new Level();
            $lev->setName($level['Level']);
            array_push($listLevel, $lev);
        }
        
        return $listLevel;
    }
    
}

?>