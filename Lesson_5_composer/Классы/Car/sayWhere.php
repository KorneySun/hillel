<?php

namespace Lesson_5_composer\Классы\Car;


trait sayWhere{
    public function whereAmI(){
        return __CLASS__;
    }
}