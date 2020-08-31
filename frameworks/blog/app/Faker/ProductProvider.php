<?php

namespace App\Faker;

use Faker\Provider\Base;


class ProductProvider extends Base
{
    protected static $FurnitureNames = array(
        'Cтул', 'Cтол', 'Кровать', 'Шкаф', 'Табурет',
        'Сервант', 'Тумба', 'Раскладушка', 'Кресло',
        'Комод', 'Полка', 'Диван', 'Пенал'
    );
    protected static $FurnitureCategory = 1;

    protected static $InstrumentNames = array(
        'Дрель', 'Перфоратор', 'Рубанок', 'Болгарка', 'Шуруповерт',
        'Шлифмашинка', 'Сварочный аппарат', 'Плиткорез', 'Бензопила',
        'Газонокосилка', 'Циркулярка', 'Молоток', 'Плоскогубцы'
    );
    protected static $InstrumentCategory = 2;

    public function productName(){

        $furniture_temp = ['name'=>static::randomElement(static::$FurnitureNames), 'category'=>static::$FurnitureCategory];
        $instrument_temp = ['name'=>static::randomElement(static::$InstrumentNames), 'category'=>static::$InstrumentCategory];
        if (rand(static::$FurnitureCategory,static::$InstrumentCategory) === 1){
            return $furniture_temp;
        }
        else {
            return $instrument_temp;
        }
    }

}