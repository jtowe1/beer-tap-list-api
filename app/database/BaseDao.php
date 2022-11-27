<?php

namespace BTL\Database;

use BTL\Config;
use Exception;
use PDO;
use PDOException;

class BaseDao
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $config = Config::create();
            $dbConfig = $config->getDatabaseConfig();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }

        try {
            $pdo = $dbConfig->createConnection();

        } catch (PDOException $e) {
            error_log($e->getMessage());
        }

        $this->pdo = $pdo;

        if ($pdo) {
            error_log('connected to db');
        }
    }
}