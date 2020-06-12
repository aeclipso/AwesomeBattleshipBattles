<?php

class WeaponFactory extends ItemFactory
{
    static $CLASS_NAME = 'Weapon';
    public function absorb($item)
    {
        //$str_class = 'Weapon';
        parent::absorb($item, CLASS_NAME);
    }
}