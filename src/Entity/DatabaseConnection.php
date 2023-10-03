<?php

namespace Entity;

use PDO;

class DatabaseConnection
{

    private $connection;
    private string $db_host = 'postgres-db';
    private string $db_port = '5432';
    private string $db_name = 'note_taking_app';
    private string $db_user = 'root';
    private string $db_pass = 'root';


    public function connect()
    {
        try {
            $pdo = new PDO("pgsql:host=$this->db_host;port=$this->db_port;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->connection = $pdo;
        } catch
        (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($query)
    {
        return $this->connection->query($query) or die('Query failed: ' . pg_last_error());
    }

    public function disconnect()
    {
        $this->connection = false;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection($connection): void
    {
        $this->connection = $connection;
    }

}