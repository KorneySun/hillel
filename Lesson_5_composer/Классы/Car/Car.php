<?php


namespace Lesson_5_composer\Классы\Car;

class Car implements Car_Oil, Car_Complect {
    use sayWhere;

    public $wheels = 4;
    public $doors = 4;
    public function count_Wheels(){
        echo "У машины ".$this->wheels." колеса".'<br>';
    }
    public function count_Doors(){
        echo "У машины ".$this->wheels." двери".'<br>';
    }
    public function change_Oil(){
        echo "Пора менять масло".'<br>';
    }
    public function sayClassName(){
        echo 'From: '.__CLASS__.PHP_EOL;
    }
}