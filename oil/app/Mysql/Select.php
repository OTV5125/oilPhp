<?php


namespace App\Mysql;


class Select extends Mysql
{
    public function getCars(){
        $res = $this->exec('SELECT * FROM car');
        return ($res)?$res->fetchAll():false;
    }

    public function getRoute(){
        $res = $this->exec('SELECT * FROM route');
        return ($res)?$res->fetchAll():false;
    }
}