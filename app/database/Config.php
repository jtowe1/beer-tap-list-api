<?php

namespace BTL\Database;

use PDO;

class Config
{
    public function __construct(
        private string $host,
        private string $db,
        private string $user,
        private string $password
    )
    {
    }

    public static function createFromVariables(array $variables)
    {
        return new self(
            $variables['DB_HOST'],
            $variables['DB_DATABASE'],
            $variables['DB_USERNAME'],
            $variables['DB_PASSWORD']
        );
    }

    private function getDsn(): string
    {
        return "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
    }

    public function createConnection(): PDO
    {
        return new PDO($this->getDsn(), $this->user, $this->password);
    }
}
