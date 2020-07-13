<?php

namespace Car;


trait sayWhere{
    public function whereAmI(){
        return __CLASS__;
    }
}