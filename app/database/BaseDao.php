<?php

namespace BTL\Database;

use BTL\Database\Config as DatabaseConfig;
use PDO;
use PDOException;

class BaseDao
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $pdo = DatabaseConfig::getPDO();

        } catch (PDOException $e) {
            error_log($e->getMessage());
        }

        $this->pdo = $pdo;

        if ($pdo) {
            error_log('connected to db');
        }
    }
}