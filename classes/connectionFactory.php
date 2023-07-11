<?php

define('HOST', 'next-database.mariadb.database.azure.com');
define('USER', 'nextmaster@next-database');
define('PASSWORD', '9#p&[Next}5bY*25_@^837%%b!#');
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
                echo '<h2>Conexão Falhou.</h2>';
            }
        }

        return self::$pdo;
    }
}
