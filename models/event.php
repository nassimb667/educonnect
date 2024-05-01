<?php
require_once "database.php";
require_once "../config.php";

class Event
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function getLatestEvents()
{
    self::initDatabase();

    try {
        $sql = "SELECT *, DATE_FORMAT(dateDebut, '%d/%m/%Y %H:%i:%s') AS dateDebut_fr, DATE_FORMAT(dateFin, '%d/%m/%Y %H:%i:%s') AS dateFin_fr FROM evenements ORDER BY dateDebut DESC LIMIT 6";
        $query = self::$db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des derniers événements : " . $e->getMessage());
    }
}

public static function getCurrentEvents()
{
    self::initDatabase();

    try {
        $sql = "SELECT *, DATE_FORMAT(dateDebut, '%d/%m/%Y %H:%i:%s') AS dateDebut_fr, DATE_FORMAT(dateFin, '%d/%m/%Y %H:%i:%s') AS dateFin_fr FROM evenements WHERE dateDebut <= NOW() AND dateFin >= NOW() ORDER BY dateDebut ASC";
        $query = self::$db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des événements actuels : " . $e->getMessage());
    }
}




public static function getUpcomingEvents()
{
    self::initDatabase();

    try {
        $sql = "SELECT *, DATE_FORMAT(dateDebut, '%d/%m/%Y %H:%i:%s') AS dateDebut_fr, DATE_FORMAT(dateFin, '%d/%m/%Y %H:%i:%s') AS dateFin_fr FROM evenements WHERE dateDebut > NOW() ORDER BY dateDebut ASC";
        $query = self::$db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des événements à venir : " . $e->getMessage());
    }
}
public static function getPastEvents()
{
    self::initDatabase();
    try {
        $pdo = self::$db;

        $sql = "SELECT * FROM evenements WHERE dateFin < NOW() ORDER BY dateFin DESC";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des événements passés : " . $e->getMessage());
    }
}

public static function getEventById($eventId) {

    try {
        self::initDatabase();

        $sql = "SELECT * FROM evenements WHERE idEvenement = :eventId";
        $query = self::$db->prepare($sql);
        $query->bindParam(':eventId', $eventId);
        $query->execute();

        // Récupérer les résultats de la requête
        $event = $query->fetch(PDO::FETCH_ASSOC);

        // Retourner les détails de l'événement
        return $event;
    } catch (PDOException $e) {
        // Gérer les erreurs de requête SQL
        throw new Exception("Erreur lors de la récupération des détails de l'événement : " . $e->getMessage());
    }
}


public static function createArticle($titre, $description, $dateDebut, $dateFin, $image)
{
    try {
        self::initDatabase();
    
        $sql = "INSERT INTO evenements (titre, description, dateDebut, dateFin, image) VALUES (:titre, :description, :dateDebut, :dateFin, :image)";
        $query = self::$db->prepare($sql);
        $query->bindParam(':titre', $titre);
        $query->bindParam(':description', $description);
        $query->bindParam(':dateDebut', $dateDebut);
        $query->bindParam(':dateFin', $dateFin);
        $query->bindParam(':image', $image);
        $query->execute();
        
        return true; // Retourne true si l'insertion s'est bien déroulée
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la création de l'article : " . $e->getMessage());
    }
}


}
