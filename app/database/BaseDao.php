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
            throw new DatabaseException('Failed to build the pdo because: ' . $e->getMessage());
        }

        $this->pdo = $pdo;

        if ($pdo) {
            error_log('[INFO] PDO built successfully');
        }
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}