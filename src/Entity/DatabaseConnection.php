<?php

namespace Entity;

use PDO;

class DatabaseConnection extends PDO
{

    private static $connection;
    private const DB_HOST = 'postgres-db';
    private const DB_PORT = '5432';
    private const DB_NAME = 'note_taking_app';
    private const DB_USER = 'root';
    private const DB_PASS = 'root';


    public function __construct()
    {
        $dsn = "pgsql:host=" . self::DB_HOST . ";port=" . self::DB_PORT . ";dbname=" . self::DB_NAME;

        try {
            parent::__construct($dsn, self::DB_USER, self::DB_PASS);

            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch
        (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance():self
    {
        if(self::$connection === null){
            self::$connection = new self();
        }
        return self::$connection;
    }

}