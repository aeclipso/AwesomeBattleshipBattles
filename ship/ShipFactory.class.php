<?php

class ShipFactory extends ItemFactory
{
    static $CLASS_NAME = 'Ship';

    public function absorb($item)
    {
        parent::absorb($item, CLASS_NAME);
    }
}