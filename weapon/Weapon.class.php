<?php

abstract class Weapon
{
    public $id;
    private $_name;
    private $_rangeShort;
	private $_rangeMedium;
    private $_rangeLong;
    private $_charge;

    function __construct(int $id, string $name, int $short, int $medium, int $long, int $charge)
    {
        $this->name = $name;
        $this->id = $id;
        $this->_rangeShort = $short;
        $this->_rangeMedium = $medium;
        $this->_rangeLong = $long;
        $this->_charge = $charge;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function calculateZone(){

    }

    public function shoot(bool $isAnfailaide){
        if ($isAnfailaide)
        {
            //set some params;
        }
        $this->calculateZone();
    }
}
