<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 13.07.2020
 * Time: 14:20
 */

namespace Figure;


class Triangle extends Figure{
    private $height;
    private $base;

    public function __construct($height, $base)
    {
        $this->height = $height;
        $this->base = $base;
    }
    public function calculate_Square(){
        $square = 0.5 * $this->height * $this->base;
        return $square;
    }
}