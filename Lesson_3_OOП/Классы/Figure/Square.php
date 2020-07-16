<?php


namespace Figure;


class Square extends Figure{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function calculate_Square(){
        $square = $this->side * $this->side;
        return $square;
    }
}