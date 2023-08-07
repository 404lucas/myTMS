<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'nexpress');

class connectionFactory
{
    private static $pdo;

    public static function connect()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo frontend::alert('times', 'danger', '<b>Falha catastrófica</b> na conexão com o banco de dados!');
            }
        }
        return self::$pdo;
    }
}
