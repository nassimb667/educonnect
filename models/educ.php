<?php
require_once "database.php";
require_once "../config.php";

class educ
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function countUsers()
    {
        self::initDatabase();

        try {
            $sql = "SELECT COUNT(*) AS total FROM utilisateurs WHERE type_id = 2";
            $query = self::$db->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            throw new Exception("Erreur lors du comptage des utilisateurs : " . $e->getMessage());
        }
    }

    public static function countUsersActif()
    {
        self::initDatabase();

        try {
            $sql = "SELECT COUNT(*) AS total FROM utilisateurs WHERE user_validate = 1";
            $query = self::$db->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            throw new Exception("Erreur lors du comptage des utilisateurs : " . $e->getMessage());
        }
    }

    public static function EmploiDuTemps()
    {
        self::initDatabase(); 
    
        try {
            // Exécutez la requête SQL pour récupérer l'emploi du temps
            $query = "SELECT * FROM emploidutemp ORDER BY groupe";
            $result = self::$db->query($query);
    
            // Initialisez un tableau pour stocker l'emploi du temps groupé par groupe
            $groupedTimetable = array();
    
            // Parcourez les résultats et regroupez-les par groupe
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $group = $row['groupe'];
                if (!isset($groupedTimetable[$group])) {
                    $groupedTimetable[$group] = array();
                }
                $groupedTimetable[$group][] = $row;
            }
    
            return $groupedTimetable; // Retournez l'emploi du temps groupé par groupe
        } catch (PDOException $e) {
            // Gérer les erreurs de la base de données
            echo "Erreur de base de données : " . $e->getMessage();
            return null;
        }
    }
    
    
    

}
