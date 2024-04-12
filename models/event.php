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

}
