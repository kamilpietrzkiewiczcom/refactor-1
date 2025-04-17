<?php

namespace App\Helper;

use PDO;

class Db
{
    private static ?self $instance = null;
    private PDO $connection;

    private function __construct()
    {
        $dsn = 'mysql:dbname=app;host=db-service-refactor-1';
        $user = 'root';
        $password = 'app';

        $this->connection = new PDO($dsn, $user, $password);
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance->connection;
    }
}
