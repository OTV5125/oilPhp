<?php


namespace App\Mysql;

use PDO;

abstract class Mysql
{

    protected $pdo;

    /**
     * Mysql constructor.
     */
    public function __construct()
    {
        global $config;

        $dsn = "mysql:host=" . $config->Mysql->host . ";dbname=" . $config->Mysql->db . ";charset=".$config->Mysql->charset;
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ];
        $this->pdo = new PDO($dsn, $config->Mysql->user, $config->Mysql->password, $opt);
    }

    /**
     * @param $sql
     * @param $param
     * @return bool|\PDOStatement
     */
    public function exec($sql, $param = [])
    {
        if (!is_array($param) || !is_string($sql)) {
            return false;
        }

        $array_keys = array_keys($param);
        $stmt = $this->pdo->prepare($sql);
        foreach ($array_keys AS $array_key) {
            $stmt->bindParam($array_key, $param[$array_key]);
        }

        $stmt->execute();
        return $stmt;
    }
}