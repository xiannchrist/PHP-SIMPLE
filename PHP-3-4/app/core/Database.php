<?php

class Database
{
    private PDO $connection;

    public function __construct(private array $env)
    {
        $host = $this->env['DB_HOST'] ?? '127.0.0.1';
        $port = $this->env['DB_PORT'] ?? '3306';
        $database = $this->env['DB_DATABASE'] ?? 'php_3_4';
        $username = $this->env['DB_USERNAME'] ?? 'root';
        $password = $this->env['DB_PASSWORD'] ?? '';

        $server = new PDO("mysql:host={$host};port={$port};charset=utf8mb4", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $server->exec("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        $this->connection = new PDO("mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $this->migrate();
    }

    public function connection(): PDO
    {
        return $this->connection;
    }

    private function migrate(): void
    {
        $this->connection->exec(
            'CREATE TABLE IF NOT EXISTS registered_people (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(100) NOT NULL,
                middle_name VARCHAR(100) NOT NULL,
                last_name VARCHAR(100) NOT NULL,
                age INT NOT NULL,
                gender VARCHAR(50) NOT NULL,
                email VARCHAR(150) NOT NULL,
                address TEXT NOT NULL,
                contact_number VARCHAR(30) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
    }
}
