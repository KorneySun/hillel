<?php

namespace Lesson_5_composer\Классы\Human;


class Human
{
    protected $name;
    protected $age;
    public $gender;



    public function speciality()
    {
        return "Technical Education";
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    private function callToPrivateNameAndAge()
    {
        return "{$this->name} is {$this->age} years old.";
    }

    protected function callToProtectedNameAndAge()
    {
        return "{$this->name} is {$this->age} years old.";
    }
}
