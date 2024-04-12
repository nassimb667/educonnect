<?php
class Role
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function getRoles()
    {
        try {
            self::initDatabase();
    
            $sql = "SELECT * FROM type";
            $query = self::$db->prepare($sql);
            $query->execute();
    
            // Récupérer tous les rôles et les renvoyer
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer l'erreur de manière appropriée
            throw new Exception('Erreur lors de la récupération des rôles : ' . $e->getMessage());
        }
    }
    
}

