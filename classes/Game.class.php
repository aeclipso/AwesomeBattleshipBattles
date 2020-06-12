<?php

require_once('Shot.class.php');

class Game {
    private $_players;
	private $_state;
	private $_playersColorSet;
	public $field;
    //  game states
    const IDLE = 'IDLE';
    const P1TURN = 'P1';
	const P2TURN = 'P2';
	const N = 12;
	const E = 3;
	const S = 6;
	const W = 9;
	const X_MAX = 150;
	const Y_MAX = 100;
	const TYPE1 = 'line';
	const TYPE2 = 'cone';
    //  phases for ship
    // const ORDER = 'ORDER';
    // const MOVEMENT = 'MOVEMENT';
    // const SHOOT = 'SHOOT';

    public function __construct()
    {
        $this->_players = array();
		$this->_state = self::IDLE;
		$this->field = array_fill(0, Self::X_MAX, array_fill(0, Self::Y_MAX, 0));
	}

	public function _calculate_shot( Shot $shot ) { // make it private
		$x = $shot->x;
		$y = $shot->y;
		$len = $shot->len;
		if ( $shot->type == Self::TYPE1) {
			if ($shot->dir == Self::N) {
				$end = ($y + $len);
				while ($y < Self::Y_MAX && $y <= $end) {
					if ($this->_apply_damage($x, $y))
						return;
					$y += 1;
				}
			} else if ($shot->dir == Self::S) {
				$end = ($y - $len);
				while ($y > -1 && $y >= $end) {
					if ($this->_apply_damage($x, $y))
						return;
					$y -= 1;
				}
			} else if ($shot->dir == Self::W) {
				$end = ($x - $len);
				while ($x > -1 && $x >= $end) {
					if ($this->_apply_damage($x, $y))
						return;
					$x -= 1;
				}
			} else if ($shot->dir == Self::E) {
				$end = ($x + $len);
				while ($x < Self::X_MAX && $x <= $end) {
					if ($this->_apply_damage($x, $y))
						return;
					$x += 1;
				}
			}
			return;
		}
		if ( $shot->type == Self::TYPE2 ) {
			$i = 0;
			if ($shot->dir == Self::N) {
				$end = ($y + $len);
				while ($y < Self::Y_MAX && $y <= $end) {
					foreach (range( $x - $i, $x + $i ) as $temp_x) {
						if ($this->_apply_damage($temp_x, $y))
						return;
					}
					$i += 1;
					$y += 1;
				}
			} else if ($shot->dir == Self::S) {
				$end = ($y - $len);
				while ($y > -1 && $y >= $end) {
					foreach (range( $x - $i, $x + $i ) as $temp_x) {
						if ($this->_apply_damage($temp_x, $y))
						return;
					}
					$i += 1;
					$y -= 1;
				}
			} else if ($shot->dir == Self::W) {
				$end = ($x - $len);
				while ($x > -1 && $x >= $end) {
					foreach (range( $y - $i, $y + $i ) as $temp_y) {
						if ($this->_apply_damage($x, $temp_y))
						return;
					}
					$i += 1;
					$x -= 1;
				}
			} else if ($shot->dir == Self::E) {
				$end = ($x + $len);
				while ($x < Self::X_MAX && $x <= $end) {
					foreach (range( $y - $i, $y + $i ) as $temp_y) {
						if ($this->_apply_damage($x, $temp_y))
						return;
					}
					$i += 1;
					$x += 1;
				}
			}
			return;
		}
	}

	private function _apply_damage( $x, $y ) {
		if ($this->field[$x][$y]) {
			print "You just hit something!" . PHP_EOL;
			return 1;
		}
		return 0;
	}

	public function update( $x, $y, $update_type ) {

	}

	public function getPlayersColorSet() {
		return $this->_playersColorSet;
	}
}

/* SIMPLE TEST */
$game = new Game();
$x = 7;
$y = 5;
$len = 7;
// place a ship at x = 7, y = $y;
$game->field[$x][$y] = 1;
// test shoot type 1 in direction E
$game->_calculate_shot( new Shot(0, $y, $len, Game::E, 'line') );
// test shoot type 1 in direction W
$game->_calculate_shot( new Shot(14, $y, $len, Game::W, 'line') );
// test shoot type 1 in direction N
$game->_calculate_shot( new Shot($x, 0, $len, Game::N, 'line') );
// test shoot type 1 in direction S
$game->_calculate_shot( new Shot($x, 9, $len, Game::S, 'line') );

//field reset
$game->field[$x][$y] = 0;
// place a ship at x = 7, y = $y;
$game->field[$x][$y] = 1;
// test shoot type 2 in direction E
$game->_calculate_shot( new Shot($x - 2, $y + 1, $len, Game::E, 'cone') );
// test shoot type 2 in direction W
$game->_calculate_shot( new Shot($x + 2, $y + 1, $len, Game::W, 'cone') );
// test shoot type 2 in direction N
$game->_calculate_shot( new Shot($x - 1, $y - 2, $len, Game::N, 'cone') );
// test shoot type 2 in direction S
$game->_calculate_shot( new Shot($x - 1, $y + 2, $len, Game::S, 'cone') );

?>