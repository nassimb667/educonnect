<?php
require_once "database.php";
require_once "../config.php";

class Message
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function getMessages($userId)
{
    self::initDatabase();
    try {
        $pdo = self::$db;

        $sql = "SELECT * FROM messages WHERE idExpediteur = :user_id OR idDestinataire = :user_id ORDER BY dateEnvoi DESC";
        $query = $pdo->prepare($sql);
        $query->execute([':user_id' => $userId]); // Utilisation de execute avec un tableau associatif
        return $query->fetchAll(PDO::FETCH_ASSOC); // Assurez-vous de récupérer les résultats en tant qu'associatifs
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
    }
}
public static function getMessage($userId)
{
    self::initDatabase();
    try {
        $pdo = self::$db;

        $sql = "SELECT messages.*, utilisateurs.nom AS nomExpediteur FROM messages
                INNER JOIN utilisateurs ON messages.idExpediteur = idUtilisateur
                WHERE messages.idDestinataire = :user_id 
                ORDER BY messages.dateEnvoi DESC";
        $query = $pdo->prepare($sql);
        $query->execute([':user_id' => $userId]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
    }
}

    
    

}
