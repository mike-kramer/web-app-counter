<?php

namespace App\Lib;

use PDO;
use PDOException;

class Db
{
    static private \PDO $pdo;

    public static function getPdo(): PDO
    {
        [$dbHost, $dbPort, $dbName, $dbUser, $dbPassword] = [
            $_ENV['DB_HOST'],
            $_ENV['DB_PORT'],
            $_ENV['DB_NAME'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD']
        ];
        $dsn = "pgsql:host=$dbHost;port=$dbPort;dbname=$dbName;user=$dbUser;password=$dbPassword";
        self::$pdo ??= new PDO($dsn, options: [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        return self::$pdo;
    }

    public static function transaction(callable $callback): void
    {
        self::$pdo->beginTransaction();
        try {
            $callback();
            self::$pdo->commit();
        } catch (\Exception $e) {
            self::$pdo->rollBack();
            throw $e;
        }
    }
}