<?php
class Player {
    private $_fleet;

    public function __construct()
    {
        $this->_fleet = array();
    }

    public function getShipsPosition()
    {
        $positions = array();
        foreach ($_fleet as $s) {
            $positions[] = $s->getPosition();
        }
        return $positions;
    }
}
?>
