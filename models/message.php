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

            $sql = "SELECT * FROM messages WHERE idExpediteur = :user_id ORDER BY dateEnvoi DESC";
            $query = $pdo->prepare($sql);
            $query->execute([':user_id' => $userId]); 
            return $query->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
        }
    }

    public static function SendMessage($userId, $messageContent)
    {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "INSERT INTO messages (idExpediteur, contenu, dateEnvoi) 
                VALUES (:Utilisateur, :contenu, NOW())";
            $query = $pdo->prepare($sql);
            $query->execute([
                ':Utilisateur' => $userId,
                ':contenu' => $messageContent,
            ]);

            return "Message envoyé.";
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'envoi du message : " . $e->getMessage());
        }
    }

    public static function deleteMessage($userId, $messageId)
    {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "DELETE FROM messages WHERE idExpediteur = :Utilisateur AND idMessage = :messageId";
            $query = $pdo->prepare($sql);
            $query->execute([
                ':Utilisateur' => $userId,
                ':messageId' => $messageId,
            ]);

            return "Message supprimé.";
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression du message : " . $e->getMessage());
        }
    }

    public static function getAllMessage()
    {
        self::initDatabase();
        try {
            $pdo = self::$db;
    
            $sql = "SELECT * FROM messages
                    INNER JOIN utilisateurs ON messages.idExpediteur = utilisateurs.idUtilisateur
                    ORDER BY messages.dateEnvoi DESC";
            $query = $pdo->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
        }
    }
    
    public static function ResponseMessage($messageId, $destinataireId, $messageContent)
    {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "INSERT INTO response (idMessage, idUtilisateur, date_reponse, reponse) 
                    VALUES (:message, :destinataire, NOW(), :contenu)";
            $query = $pdo->prepare($sql);
            $query->execute([
                ':message' => $messageId,
                ':destinataire' => $destinataireId,
                ':contenu' => $messageContent,
            ]);
    
            return "Réponse envoyée.";
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'envoi de la réponse : " . $e->getMessage());
        }
    }

    public static function getResponse($messageId)
{
    self::initDatabase();
    try {
        $pdo = self::$db;
        $sql = "SELECT * FROM response WHERE idMessage = :messageId";
        $query = $pdo->prepare($sql);
        $query->execute([':messageId' => $messageId]);
        $responses = $query->fetchAll(PDO::FETCH_ASSOC);
        return $responses;
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des réponses : " . $e->getMessage());
    }
}


    
    





}
