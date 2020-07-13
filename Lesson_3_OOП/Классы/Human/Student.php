<?php


namespace Human;


class Student extends Human
{
    private $designation;
    private $salary;
    public $work_experience = 'IT technology';


    public function speciality()
    {
        $message = parent::speciality();

        return $message.' | '.$this->work_experience;
    }
    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getDesignation()
    {
        return $this->designation;
    }

    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getNameAndAge()
    {
        return $this->callToProtectedNameAndAge();
    }
    public function __set($salary, $value)
    {
        if (property_exists($this, $salary)) {
            $this->$salary = $value;
            echo 'Свойству $salary присвоено значение $value с помощью __set'.'<br>';
        }
    }
    public function sayClassName(){
        echo 'From: '.__CLASS__.'<br>';
    }
}