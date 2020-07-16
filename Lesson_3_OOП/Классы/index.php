<?php

//ИСПОЛЬЗУЕМ ПРОСТРАНСТВА ИМЕН И АВТОЗАГРУЗКУ

//require_once __DIR__.'/Human/Human.php';
//require_once __DIR__.'/Figure/Figure.php';
//require_once __DIR__.'/Car/Car.php';

require_once __DIR__.'/autoload.php';

//=================================================================================================
//ИСПОЛЬЗУЕМ:
//НАСЛЕДОВАНИЕ, ИНКАПСУЛЯЦИЯ, ПЕРЕГРУЗКА МЕТОДОВ, МОДИФИКАТОРЫ ДОСТУПА
//РАБОТА С КЛАССОМ Human


$student = new \Human\Student();

$student->gender = 'male';
$student->setName('Dmitriy Korneenko');
$student->setAge(55);
$student->setDesignation('Software Engineer');
$student->setSalary('00000');
echo 'Данные по студенту:  '.'<br>';
echo 'Пол - '.$student->gender.'<br>';
echo 'Имя - '.$student->getName().'<br>';
echo 'Возраст - '.$student->getAge().'<br>';
echo 'Назначение - '.$student->getDesignation().'<br>';
echo 'Желаемая зарплата -'.$student->getSalary().'<br>';
echo 'Справка - '.$student->getNameAndAge().'<br>';
echo 'Специализация - '.$student->speciality().'<br>';
echo '<br>';
//echo $student->callToPrivateNameAndAge();
// ВЫЗВАТЬ НЕ МОГУ ДАННЫЙ МЕТОД, т.к. РАБОТАЕТ ТОЛЬКО ВНУТРИ КЛАССА

//ПРИМЕНЯЕМ МАГИЧЕСКИЙ МЕТОД __set ДЛЯ ПЕРЕИМЕНОВАНИЯ ИМЕНИ

$student->salary = '11111';
echo 'С помощью магического метода зарплата стала - '.$student->getSalary().'<br>';
echo '<br>';
echo '============================================================================================='.'<br>';


//=================================================================================================
//ИСПОЛЬЗУЕМ АБСТРАКТНЫЙ КЛАСС
//ВЫЧИСЛЯЕМ ПЛОЩАДЬ ФИГУР
//РАБОТА С КЛАССОМ Figure

$circle = new \Figure\Circle(30);
$square = new \Figure\Square(20);
$triangle = new \Figure\Triangle(15, 40);

//ПОСЧИТАЕМ ПЛОЩАДЬ КАЖДОЙ ФИГУРЫ
echo 'Площадь круга составила - '.$circle->calculate_Square().'<br>';
echo 'Площадь квадрата составила - '.$square->calculate_Square().'<br>';
echo 'Площадь треугольника составила - '.$triangle->calculate_Square().'<br>';

//ПОСЧИТАЕМ ОБЩУЮ ПЛОЩАДЬ
echo 'Общая площадь всех фигур составила - '.($circle->calculate_Square()+ $square->calculate_Square()+ $triangle->calculate_Square()).'<br>';
echo '<br>';
echo '============================================================================================='.'<br>';

//=================================================================================================
//ИСПОЛЬЗУЕМ ИНТЕРФЕЙСЫ И ТРЕЙТ
//РАБОТА С КЛАССОМ Car

$car = new Car\Car();
$car->count_Wheels();
$car->count_Doors();
$car->change_Oil();
echo $car->whereAmI().'<br>';
echo '============================================================================================='.'<br>';

