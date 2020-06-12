<?php

class Weapon
{
    private $_name;

    function __construct($name)
    {
        $this->setName($name);
    }
    public function setName($name)
    {
        $this->_name = $name;
    }
    public function getName()
    {
        return $this->_name;
    }
}