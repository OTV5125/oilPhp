PROJECT "OIL"
=============

***Проект является обучающим на языке "Php"***

TASK v1:
--------

### Создать программу для рассчета потраченного бензина в поздке по указанному маршруту



1. Создать базу данных с 2-мя таблицами
   
`car`

_id(int) | name(varchat 45) | comsumption(float)_


`route`

_id(int) | name(varchat 45) | distantion(float)_

2. Записать тестовые данные
   
3. Реализовать класс для для работы с базой данных со следующими методами

`connect` - для открытия сокета соединения

`getCars` - получить список всех машин

`getRoute` - получить список всех машртутов

`getCarById` - получить информацию о автомобиле по id

`getRouteById` - получить информацию о маршруте по id

4. Создать алгоритм взаимодействия с пользователем через консоль, где пользователь выбирает из списка

* автомобиль
* маршрут

5. После выбора указанных параметров, рассчитать расход бензина на поездку по указанному маршруту
6. Предусмотреть ошибочный ввод пользователем
7. Сделать по возможности динамический проект (упростить распаковку)


TASK v2:
--------

### Расширить версию 1. Добавить возможность пользователю добавлять собственные машины и маршруты, не меняя структуру базы данных. Предусмотреть нештатные ситуации (например пользователь ввел машртур длинной больше чем разрешено в базе данных)

TASK v3:
--------

### Расширить версию 2. Изменить добавление пользователем маршруты. Теперь пользователь должен ввести координаты адреса
1. Удалить все записи из таблицы route
2. Изменить столбец distantion на coordinates (подставить нужным тип самому)
3. Найти (если есть) бесплатное API по поиску маршрутов по координатам
4. После ввода координат, записать адрес в базу данных (name - адрес, coordinates - координаты)  
5. Изменить алгоритм поиска 

* Выбор машины
* Выбор пункт выезда (точка А)
* Выбор пункт назначения (точка Б)

6. После выбора высчитывать расстояние по координатам, после чего высчитывать расход автомобиля и отображать пользователю.

### Запуск тестового проекта из примера

`docker`
* mv config.example.json config.json
* docker-compose build
* docker-compose up -d
* docker-compose exec web_api /bin/bash
* python3 start.py

Копия базы данных лежит /docker/db/oil.sql
Модель базы данных (mysql workbench) /docker/db/modelOil.mwb