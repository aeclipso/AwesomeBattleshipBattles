<?php

class ShipFactory extends ItemFactory
{
    static $CLASS_NAME = 'Ship';

    public function absorb($item)
    {
        //$str_class = 'Ship';
        parent::absorb($item, CLASS_NAME);
    }
}