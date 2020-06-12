<?php

class WeaponFactory extends ItemFactory
{
    public function absorb($item)
    {
        //$str_class = 'Weapon';
        parent::absorb($item, get_class($item));
    }
}
