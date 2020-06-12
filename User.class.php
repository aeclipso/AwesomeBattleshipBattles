<?php

require_once ('Color.class.php');

/**
 * Class User
 */
class User
{
    /**
     * Color of the first player rgb constant
     */
    const FIRST_PLAYER_COLOR = 0x4527A0;
    /**
     * Color of the second player rgb constant
     */
    const SECOND_PLAYER_COLOR = 0xFB8C00;
    /**
     * Count of created users
     * @var int
     */
    protected static $usersCount = 0;
    /**
     * User name
     * @var string
     */
    protected $name;
    /**
     * User color
     * @var Color
     */
    protected $color;
    /**
     * 1 if you are the first user
     * 2 if you are the second user
     * @var int
     */
    protected $position;

    /**
     * User constructor.
     * @param array $kwargs
     */
    public function __construct(array $kwargs)
    {
        self::$usersCount++;
        if (array_key_exists('name', $kwargs) && userNotFound($kwargs['name']))
            $this->name = $kwargs['name'];
        else
            $this->name = null;
        switch (@$kwargs['position'])
        {
            case 1:
                $this->position = 1;
                $this->color = new Color(array('rgb' => self::FIRST_PLAYER_COLOR));
                break;
            case 2:
                $this->position = 2;
                $this->color = new Color(array('rgb' => self::SECOND_PLAYER_COLOR));
                break;
            default:
                $position = null;
                $this->color = null;
                break;
        }
    }

    /**
     * If user with the same name
     * @param $name
     * @return bool
     */
    public function userNotFound($name)
    {
        if ($name != null)
            return True;
    }

    /**
     * @return string
     */
    public function getUserName() {
        return $this->name;
    }

    /**
     * @return Color
     */
    public function getUserColor() {
        return $this->color;
    }

    /**
     * @return int
     */
    public function getUsersCount() {
        return self::$usersCount;
    }
}