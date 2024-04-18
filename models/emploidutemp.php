<?php
require_once "database.php"; // Assurez-vous que le fichier database.php est correctement inclus
require_once "../config.php";

class Timetable
{
    private static $db; // Déclarez la propriété $db à l'intérieur de la classe

    // Déplacez la méthode initDatabase à l'intérieur de la classe et renommez-la en tant que méthode statique
    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function EmploiDuTemps($group)
    {
        self::initDatabase(); 

        try {
            
            $stmt = self::$db->prepare("SELECT * FROM emploidutemp WHERE groupe = :groupe");
            $stmt->bindParam(":groupe", $group);
            $stmt->execute();

            // Récupérez toutes les lignes de résultats
            $timetable = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $timetable; // Retournez l'emploi du temps
        } catch (PDOException $e) {
            // Gérer les erreurs de la base de données
            echo "Erreur de base de données : " . $e->getMessage();
            return null;
        }
    }
}

