<?php 

class Instrument
{
    private $name;
    private $icon;

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

    public function setIcon($icon)
    {
        $this->icon = $icon;
    }
    
    public function getIcon()
    {
        return $this->icon;
    }

    static public function fetchAllInstruments(){
        $instsDatabase = Database::selectAllDb("*","Instrument");
        $listInstruments=array();
        foreach ($instsDatabase as $instrument) {
            $inst = new Instrument();
            $inst->setName($instrument['Name']);
            $inst->setIcon($instrument['Icon']);
            array_push($listInstruments, $inst);
        }
        return $listInstruments;
    }

    public function insertInstrumentDb() {

    }
    
}

?>