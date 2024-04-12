<?php

class Database
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        // Connexion à la base de données
        $this->connection = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function execute($query, $params = array())
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
    }
}

