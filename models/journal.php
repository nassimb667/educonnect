<?php
require_once "database.php";
require_once "../config.php";

class Journal {
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function getJournalEntries($userId) {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "SELECT * FROM journaux WHERE idUtilisateur = :user_id ORDER BY date DESC";
            $query = $pdo->prepare($sql);
            $query->execute([':user_id' => $userId]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des entrées du journal : " . $e->getMessage());
        }
    }

    public static function addJournalEntry($userId, $date, $content, $image) {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "INSERT INTO journal (idUtilisateur, date, contenu, image) VALUES (?, ?, ?, ?)";
            $query = $pdo->prepare($sql);
            $success = $query->execute([$userId, $date, $content, $image]);
            if ($success) {
                return $pdo->lastInsertId();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout d'une entrée au journal : " . $e->getMessage());
        }
    }

    public static function addToJournal($date, $contenu, $image, $idUtilisateur) {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "INSERT INTO journaux (date, contenu, image, idUtilisateur) VALUES (:date, :contenu, :image, :idUtilisateur)";
            $query = $pdo->prepare($sql);
            $query->execute([
                ':date' => $date,
                ':contenu' => $contenu,
                ':image' => $image,
                ':idUtilisateur' => $idUtilisateur
            ]);
            return true; // Retourne true si l'insertion s'est bien déroulée
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout au journal : " . $e->getMessage());
        }
    }

    public static function deleteJournalEntry($entryId) {
        self::initDatabase();
        try {
            $pdo = self::$db;
            $sql = "DELETE FROM journal WHERE idJournal = ?";
            $query = $pdo->prepare($sql);
            $success = $query->execute([$entryId]);
            return $success;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression de l'entrée du journal : " . $e->getMessage());
        }
    }
}

