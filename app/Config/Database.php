<?php

class Database
{
    private static $instance = null;

    public static function connect()
    {
        if (self::$instance === null) {

            $host     = $_ENV['DB_HOST'];
            $dbname   = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];

            try {

                self::$instance = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $username,
                    $password
                );

                self::$instance->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

            } catch (PDOException $e) {

                die(
                    'Database Error : ' .
                    $e->getMessage()
                );

            }
        }

        return self::$instance;
    }
}