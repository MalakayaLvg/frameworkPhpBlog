<?php

namespace Core\Database;

use Core\Environment\DotEnv;
use PDO;
use PDOException;

class PDOPostgresql {
    private static $pdo = null;

    public static function getPDO(): PDO {
        $dotenv = new DotEnv();
        $host = $dotenv->getVariable('DB_HOST');
        $port = $dotenv->getVariable('DB_PORT');
        $dbname = $dotenv->getVariable('DB_DATABASE');
        $user = $dotenv->getVariable('DB_USERNAME');
        $password = $dotenv->getVariable('DB_PASSWORD');

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO($dsn, $user, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                throw new \RuntimeException('Erreur lors de la connexion à PostgreSQL : ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
