<?php 
/**
 * @category   Model
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */
class Rubric
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

    static public function fetchAllRubrics(){
        $rubricsDatabase = Database::selectAllDb("*","Rubric");

        $listRubric=array();
        foreach ($rubricsDatabase as $rubric) {
            $rub = new Rubric();
            $rub->setName($rubric['Name']);
            array_push($listRubric, $rub);
        }
        return $listRubric;
    }
    
}

?>