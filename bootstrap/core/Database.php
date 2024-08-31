<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static PDO|null $instance = null;

    public static function pdo()
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        try {
            $config = config('database');
            $dsn = $config['dsn'];
            $username = $config['username'];
            $password = $config['password'];
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance = $pdo;
            return self::$instance;

        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}