<?php

namespace Figure;


class Circle extends Figure{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function calculate_Square(){
        $square = 3.14 * $this->radius * $this->radius;
        return $square;
    }
}