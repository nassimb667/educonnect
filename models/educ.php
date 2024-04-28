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

    public static function getUsersByGroup()
{
    self::initDatabase(); 

    try {
        // Exécutez la requête SQL pour récupérer les utilisateurs groupés par groupe
        $query = "SELECT groupe, GROUP_CONCAT(nom, ' ', prenom) AS utilisateurs FROM utilisateurs GROUP BY groupe";
        $result = self::$db->query($query);

        // Initialisez un tableau pour stocker les utilisateurs groupés par groupe
        $usersByGroup = array();

        // Parcourez les résultats et stockez les utilisateurs groupés par groupe dans un tableau associatif
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $group = $row['groupe'];
            $users = explode(',', $row['utilisateurs']);
            $usersByGroup[$group] = $users;
        }

        return $usersByGroup; // Retournez les utilisateurs groupés par groupe
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        echo "Erreur de base de données : " . $e->getMessage();
        return null;
    }
}

public static function countEvent()
{
    self::initDatabase(); 

    try {
       
        $query = "SELECT COUNT(*) AS event_count FROM evenements";
        $result = self::$db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        $eventCount = $row['event_count'];

        return $eventCount; // Retournez le nombre d'événements
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return null;
    }
}

public static function countPreviousEvent()
{
    self::initDatabase();

    try {
        $query = "SELECT COUNT(*) AS eventCountP FROM evenements WHERE dateDebut < CURDATE()";
        $result = self::$db->query($query);

        // Récupérez le nombre d'événements précédents à partir du résultat
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $eventCountP = $row['eventCountP'];

        return $eventCountP; // Retournez le nombre d'événements précédents
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        echo "Erreur de base de données : " . $e->getMessage();
        return null;
    }
}

public static function countActiveEvent()
{
    self::initDatabase();

    try {
        $query = "SELECT COUNT(*) AS eventCountA FROM evenements WHERE dateDebut >= CURDATE()";
        $result = self::$db->query($query);

        // Récupérez le nombre d'événements précédents à partir du résultat
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $eventCountA = $row['eventCountA'];

        return $eventCountA; // Retournez le nombre d'événements précédents
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        echo "Erreur de base de données : " . $e->getMessage();
        return null;
    }
}

public static function afficherUtilisateursGroupe()
{
    self::initDatabase(); 
    
    try {
        $query = "SELECT * FROM utilisateurs WHERE type_id = 2";
        $result = self::$db->query($query);

        // Récupérer les données sous forme de tableau associatif
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        echo "Erreur de base de données : " . $e->getMessage();
        return null;
    }
}

    
    

}
