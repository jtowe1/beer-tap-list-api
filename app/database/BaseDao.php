<?php

namespace BTL\Database;

use BTL\Database\Config as DatabaseConfig;
use PDO;
use PDOException;

class BaseDao
{
    private PDO $pdo;
    const LIMIT = 25;

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

    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}