<?php

namespace BTL\Database;

use PDO;

abstract class Config
{
    private static function getDsn(): string
    {
        return "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']};charset=utf8mb4";
    }

    public static function getPDO(): PDO
    {
        return new PDO(static::getDsn(), $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    }
}
