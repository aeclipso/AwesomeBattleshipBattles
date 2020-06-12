<?php

class WeaponFactory extends ItemFactory
{
    static $CLASS_NAME = 'Weapon';
    public function absorb($item)
    {
        parent::absorb($item, CLASS_NAME);
    }
}
