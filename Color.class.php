<?php

/**
 * Class Color
 */
class Color
{
    /**
     * @var int[][]
     */
    protected static $palette = array(
        array('frColor'=>0x00bfff, 'scColor'=>0xff0040),
        array('frColor'=>0xffffff, 'scColor'=>0xffbf00),
        array('frColor'=>0xcccc33, 'scColor'=>0x33cccc),
        array('frColor'=>0xd6f5d6, 'scColor'=>0xffe699));
    /**
     * If we want some additional information
     * @var bool
     */
    public static $verbose = False;
    /**
     * Red color component
     * @var int
     */
    protected $red;
    /**
     * Green color component
     * @var int
     */
    protected $green;
    /**
     * Blue color component
     * @var int
     */
    protected $blue;

    /**
     * Color doc.
     * @return string
     */
    public static function doc()
    {
        return file_get_contents('Color.doc.txt');
    }

    /**
     * Random players color set
     *   'frColor' - first player color
     *   'scColor' - second player color
     * @return int[]
     */
    public static function getPlayersPaletteColorSet()
    {
        return array_rand(self::$palette);
    }

    /**
     * Color constructor.
     * @param array $kwargs
     */
    public function __construct(array $kwargs)
    {
        $this->red = 0;
        $this->green = 0;
        $this->blue = 0;
        if (array_key_exists('rgb', $kwargs)) {
            $this->red = ((int)$kwargs['rgb'] >> 16) & 0xFF;
            $this->green = ((int)$kwargs['rgb'] >> 8) & 0xFF;
            $this->blue = (int)$kwargs['rgb'] & 0xFF;
        } else {
            if (array_key_exists('red', $kwargs))
                $this->red = (int)$kwargs['red'];
            if (array_key_exists('green', $kwargs))
                $this->green = (int)$kwargs['green'];
            if (array_key_exists('blue', $kwargs))
                $this->blue = (int)$kwargs['blue'];
        }
        if (self::$verbose)
            print("$this constructed." . PHP_EOL);
    }

    /**
     * Color destructor.
     */
    public function __destruct()
    {
        if (self::$verbose)
            print("$this destructed." . PHP_EOL);
    }

    /**
     * Color toString.
     * @return string
     */
    public function __toString()
    {
        $red_spaces = ($this->red < 10) ? "  " : (($this->red < 100) ? " " : "");
        $green_spaces = ($this->green < 10) ? "  " : (($this->green < 100) ? " " : "");
        $blue_spaces = ($this->blue < 10) ? "  " : (($this->blue < 100) ? " " : "");
        return "Color( red: " . $red_spaces . $this->red .
            ", green: " . $green_spaces . $this->green .
            ", blue: " . $blue_spaces . $this->blue . " )";
    }

    /**
     * Color add.
     * @param Color $color
     * @return Color
     */
    public function add(Color $color)
    {
        if ($color == null)
        {
            $red = $this->red;
            $green = $this->green;
            $blue = $this->blue;
        } else {
            $red = $this->red + $color->red;
            $green = $this->green + $color->green;
            $blue = $this->blue + $color->blue;
        }
        return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
    }

    /**
     * Color sub.
     * @param Color $color
     * @return Color
     */
    public function sub(Color $color)
    {
        $red = $this->red - $color->red;
        $green = $this->green - $color->green;
        $blue = $this->blue - $color->blue;

        return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
    }

    /**
     * Color mult.
     * @param $scale
     * @return Color
     */
    public function mult($scale)
    {
        $red = (int)($this->red * (double)$scale);
        $green = (int)($this->green * (double)$scale);
        $blue = (int)($this->blue * (double)$scale);

        return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
    }
}