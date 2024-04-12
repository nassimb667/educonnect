<?php
class User
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function create($nom, $prenom, $email, $motDePasse, $user_validate, $phone, $type_id) {
        try {
            self::initDatabase();
    
            $sql = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `motDePasse`, `user_validate`, `phone`, `type_id`) 
            VALUES (:nom, :prenom, :email, :motDePasse, :user_validate, :phone, :type_id)";

    
            $query = self::$db->prepare($sql);
    
            $query->bindValue(':nom', htmlspecialchars($nom), PDO::PARAM_STR);
            $query->bindValue(':prenom', htmlspecialchars($prenom), PDO::PARAM_STR);
            $query->bindValue(':email', htmlspecialchars($email), PDO::PARAM_STR);
            $query->bindValue(':motDePasse', password_hash($motDePasse, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':user_validate', $user_validate, PDO::PARAM_INT);
            $query->bindValue(':phone', $phone, PDO::PARAM_INT);
            $query->bindValue(':type_id', $type_id, PDO::PARAM_INT);
    
            $query->execute();
        } catch (PDOException $e) {
            // Gérer l'erreur de manière appropriée
            throw new Exception('Erreur lors de la création d\'utilisateur : ' . $e->getMessage());
        }
    }
    
    public static function createChild($nom, $prenom,$photo, $idParent ,$dateNaissance)
    {
        self::initDatabase();
    
        try {
            $sql = "INSERT INTO enfants (nom, prenom,  photo, idParent, dateNaissance,) VALUES (:nom, :prenom,  :photo, :idParent,:dateNaissance)";
            $query = self::$db->prepare($sql);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':photo', $photo);
            $query->bindParam(':idParent', $idParent);
            $query->bindParam(':dateNaissance', $dateNaissance);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la création de l'enfant : " . $e->getMessage());
        }
    }
    

    public static function hasChildren($idUtilisataeur)
{
    self::initDatabase();

    try {
        $sql = "SELECT COUNT(*) AS count FROM enfants WHERE idUtilisataeur = :idParent";
        $query = self::$db->prepare($sql);
        $query->bindParam(":idUtilisataeur", $idUtilisataeur);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifier s'il y a des enfants associés au parent
        if ($result && $result['count'] > 0) {
            return true; // Il y a des enfants inscrits
        } else {
            return false; // Aucun enfant inscrit
        }
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des enfants : " . $e->getMessage());
    }
}


    
    
    

    public static function isEmailExists(string $email): bool
    {
        try {
            self::initDatabase();

            $sql = "SELECT * FROM `utilisateurs` WHERE `prenom` = :mail";

            $query = self::$db->prepare($sql);
            $query->bindValue(':mail', $email, PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return !empty($result);
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            throw new Exception('Erreur lors de la vérification de l\'email : ' . $e->getMessage());
        }
    }

    public static function getInfos(string $email)
    {
        try {
            self::initDatabase();

            $sql = "SELECT * FROM `utilisateurs` WHERE `email` = :mail";

            $query = self::$db->prepare($sql);
            $query->bindValue(':mail', $email, PDO::PARAM_STR);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            throw new Exception('Erreur lors de la récupération des infos de l\'utilisateur : ' . $e->getMessage());
        }
    }

    public static function updateName($id_Utilisateur, $newName)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE utilisateurs SET nom = :newName WHERE id_Utilisateur = :id_Utilisateur";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newName', $newName, PDO::PARAM_STR);
            $query->bindValue(':user_id', $id_Utilisateur, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour du pseudo : ' . $e->getMessage());
        }
    }


    public static function updateFirstname($user_id, $newFirstname)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE utilisateurs SET prenom = :newFirstname WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newFirstname', $newFirstname, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour du prénom : ' . $e->getMessage());
        }
    }


    public static function updateDescription($user_id, $newDescription)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE utilisateurs SET user_describ = :newDescription WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newDescription', $newDescription, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour de la description : ' . $e->getMessage());
        }
    }

    public static function updateMail($user_id, $newMail)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE utilisateurs SET prenom = :newMail WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newMail', $newMail, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour du mail : ' . $e->getMessage());
        }
    }


    public static function updatephoto($user_id, $newphoto)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE utilisateurs SET user_photo = :new_photo WHERE user_id = :user_id";

            $query = self::$db->prepare($sql);

            $query->bindValue("new_photo", $newphoto, PDO::PARAM_STR);
            $query->bindValue("user_id", $user_id, PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    public static function deleteuser($user_id)
    {
        try {
            self::initDatabase();

            // Supprimer les trajets associés à l'utilisateur
            $sqlDeleteRides = "DELETE FROM ride WHERE user_id = :user_id";
            $queryDeleteRides = self::$db->prepare($sqlDeleteRides);
            $queryDeleteRides->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $queryDeleteRides->execute();

            // Supprimer l'utilisateur
            $sqlDeleteUser = "DELETE FROM utilisateurs WHERE user_id = :user_id";
            $queryDeleteUser = self::$db->prepare($sqlDeleteUser);
            $queryDeleteUser->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $queryDeleteUser->execute();

            // Vérifier les erreurs PDO après l'exécution de la requête
            if ($queryDeleteUser->errorCode() !== '00000') {
                throw new PDOException(implode(', ', $queryDeleteUser->errorInfo()));
            }
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            echo $e->getMessage();
        }
    }


    public static function isUserBlocked($user_id) {
        try {
            self::initDatabase();

            $sql = "SELECT user_blocked FROM utilisateur WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($result && $result['user_blocked'] == 1) {
                return true; 
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            
             $e->getMessage();
        }
    }



}
