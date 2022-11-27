<?php

namespace BTL;

use BTL\Database\Config as DatabaseConfig;
use Dotenv\Dotenv;

class Config
{
    public function __construct(
        private Dotenv $env
    )
    {
    }

    public static function create(): self
    {
        $env = Dotenv::createImmutable('../');
        $env->load();
        return new self($env);
    }

    public function getDatabaseConfig(): DatabaseConfig
    {
        return DatabaseConfig::createFromVariables($_SERVER);
    }
}
