<?php

abstract class Weapon
{
    public $id;
    public $currentPP = 0;
    private $_name;
    private $_rangeShort;
	private $_rangeMedium;
    private $_rangeLong;
    private $_charge;
    private $_zone = [];

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
    public function calculateZone(int $myShipX, int $myShipY){
        //calc zone by specification and return zone points x,y
        return [];
    }

    public function shoot(bool $isAnfailaide, int $myShipX, int $myShipY){
        if ($this->_charge > 0){
            if ($isAnfailaide)
            {
                //set some params;
            }
            $this->calculateZone($myShipX, $myShipY);
            $this->_charge--;
        }
    }

    public function upgradePP(int $PP)
    {
        $this->PP = $PP;
        $this->_charge += $PP;
    }

    public function resetPP(int $PP)
    {
        $this->_charge -=$PP;
        $this->PP = 0;
    }
}
