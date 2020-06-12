<?php
class Game {
    private $_players;
    private $_state;
    //  game states
    const IDLE = 'IDLE';
    const P1TURN = 'P1';
    const P2TURN = 'P2';
    //  phases for ship
    // const ORDER = 'ORDER';
    // const MOVEMENT = 'MOVEMENT';
    // const SHOOT = 'SHOOT';

    public function __construct()
    {
        $this->_players = array();
        $this->_state = self::IDLE;
    }
}
?>