<?php

require_once dirname(__DIR__, 1).'/vendor/autoload.php';

use App\Mysql\Select;

$config = @json_decode(file_get_contents(dirname(__DIR__, 1).'/config.json'));
if(!$config) die("config not found\n");

$select = new Select;
$cars = $select->getCars();
$routes = $select->getRoute();

//Блок выбора машины
echo "Выберите автомобиль:".PHP_EOL;
echo "П/П | Название | Расход".PHP_EOL;

foreach ($cars AS $i => $car){
    $number = $i+1;
    echo "{$number} | {$car['name']} | {$car['comsumption']}л.".PHP_EOL;
}

$numberCar = readline();
if(!isset($cars[$numberCar-1])) die('Такой машины не существует'.PHP_EOL);

echo "Вы выбрали автомобиль {$numberCar}".PHP_EOL;
echo "Модель - {$cars[$numberCar-1]['name']}".PHP_EOL;
echo "Расход - {$cars[$numberCar-1]['comsumption']} литров.".PHP_EOL;
sleep(3);


//Блок выбора маршрута
echo "Выберите маршрут:".PHP_EOL;
echo "П/П | Название | Расстояние".PHP_EOL;

foreach ($routes AS $i => $route){
    $number = $i+1;
    echo "{$number} | {$route['name']} | {$route['distantion']}л.".PHP_EOL;
}
$numberRoute = readline();
if(!isset($routes[$numberRoute-1])) die('Такого маршрута не существует'.PHP_EOL);

echo "Вы выбрали маршрут {$numberRoute}".PHP_EOL;
echo "Адрес - {$routes[$numberRoute-1]['name']}".PHP_EOL;
echo "Расстояние - {$routes[$numberRoute-1]['distantion']} км.".PHP_EOL;
sleep(3);

$resultOil = $cars[$numberCar-1]['comsumption']/100*$routes[$numberRoute-1]['distantion'];

echo "Расход по данному маршруту составляет {$resultOil} литров".PHP_EOL;