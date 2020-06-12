<?php

class ItemFactory
{
    private $_party = [];

    public function absorb($item, $str_class)
    {
        if ($item instanceof $str_class)
        {
            if (in_array($item->getName(),$this->getParty() ))
            {
                // Уже есть
            }
            else
            {
                $this->addParty($item->getName());
            }
        }
        else
        {
            // Обработка когда нет
        }
    }

    public function fabricate($item_type)
    {
        $party = $this->getParty();
        if (in_array($item_type, $party))
            {
            $actual_item = $this->makeItem(str_replace(" ", "", ucfirst($item_type)));
        }
        else
        {
            $actual_item = null;
        }
        return $actual_item;
    }
    public function makeItem ($item_type)
    {
        return new $item_type;
    }

    public function addParty($name)
    {
        $this->_party[] = $name;
    }

    public function getParty()
    {
        return $this->_party;
    }
}