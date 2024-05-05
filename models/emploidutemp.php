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


    public static function ajouterActivite($heure_debut, $heure_fin, $nom_activite) {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "INSERT INTO emploidutemp (heure_debut, heure_fin, matiere) VALUES (?, ?, ?)";
            $query = $pdo->prepare($sql);
            $query->execute([$heure_debut, $heure_fin, $nom_activite]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout d'une activité à l'emploi du temps : " . $e->getMessage());
        }
    }

    public static function getActivites() {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "SELECT * FROM emploidutemp ORDER BY heure_debut";
            $query = $pdo->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des activités de l'emploi du temps : " . $e->getMessage());
        }
    }
}

