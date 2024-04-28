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

    public static function createWithChild($nomUtilisateur, $prenomUtilisateur, $emailUtilisateur, $motDePasseUtilisateur, $user_validate, $phone, $type_id, $nomEnfant, $prenomEnfant, $photoEnfant, $dateNaissanceEnfant, $groupe)
{
    self::initDatabase();
    
    try {
        // Commencer une transaction
        self::$db->beginTransaction();

        // Insérer l'utilisateur principal et l'enfant dans une seule requête
        $sql = "
            INSERT INTO utilisateurs (nom, prenom, email, motDePasse, user_validate, phone, type_id, nomEnfant, prenomEnfant, photoEnfant, dateNaissanceEnfant, groupe)
            VALUES (:nom, :prenom, :email, :motDePasse, :user_validate, :phone, :type_id, :nomEnfant, :prenomEnfant, :photoEnfant, :dateNaissanceEnfant, :groupe)
        ";
        $query = self::$db->prepare($sql);
        $query->bindParam(':nom', $nomUtilisateur);
        $query->bindParam(':prenom', $prenomUtilisateur);
        $query->bindParam(':email', $emailUtilisateur);
        $query->bindParam(':motDePasse', $motDePasseUtilisateur);
        $query->bindParam(':user_validate', $user_validate);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':type_id', $type_id);
        $query->bindParam(':nomEnfant', $nomEnfant);
        $query->bindParam(':prenomEnfant', $prenomEnfant);
        $query->bindParam(':photoEnfant', $photoEnfant);
        $query->bindParam(':dateNaissanceEnfant', $dateNaissanceEnfant);
        $query->bindParam(':groupe', $groupe); // Ajout de la liaison pour le champ "groupe"
        $query->execute();

        // Valider la transaction
        self::$db->commit();
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        self::$db->rollBack();
        throw new Exception("Erreur lors de la création de l'utilisateur avec l'enfant : " . $e->getMessage());
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

        $sql = "UPDATE utilisateurs SET nom = :newName WHERE idUtilisateur = :idUtilisateur";
        $query = self::$db->prepare($sql);

        $query->bindValue(':newName', $newName, PDO::PARAM_STR);
        $query->bindValue(':idUtilisateur', $id_Utilisateur, PDO::PARAM_INT);

        $query->execute();
    } catch (PDOException $e) {
        throw new Exception('Erreur lors de la mise à jour du nom : ' . $e->getMessage());
    }
}

public static function updateEmail($id_Utilisateur, $newEmail)
{
    try {
        self::initDatabase();

        $sql = "UPDATE utilisateurs SET email = :newEmail WHERE idUtilisateur = :idUtilisateur";
        $query = self::$db->prepare($sql);

        $query->bindValue(':newEmail', $newEmail, PDO::PARAM_STR);
        $query->bindValue(':idUtilisateur', $id_Utilisateur, PDO::PARAM_INT);

        $query->execute();
    } catch (PDOException $e) {
        throw new Exception('Erreur lors de la mise à jour de l\'email : ' . $e->getMessage());
    }
}

public static function updatePhone($id_Utilisateur, $newPhone)
{
    try {
        self::initDatabase();

        $sql = "UPDATE utilisateurs SET phone = :newPhone WHERE idUtilisateur = :idUtilisateur";
        $query = self::$db->prepare($sql);

        $query->bindValue(':newPhone', $newPhone, PDO::PARAM_INT);
        $query->bindValue(':idUtilisateur', $id_Utilisateur, PDO::PARAM_INT);

        $query->execute();
    } catch (PDOException $e) {
        throw new Exception('Erreur lors de la mise à jour du téléphone : ' . $e->getMessage());
    }
}



public static function updatephoto($user_id, $newphoto)
{
    try {
        self::initDatabase();

        $sql = "UPDATE utilisateurs SET photoEnfant = :new_photo WHERE idUtilisateurs = :idUtilisateurs";

        $query = self::$db->prepare($sql);

        $query->bindValue("new_photo", $newphoto, PDO::PARAM_STR);
        $query->bindValue("idUtilisateurs", $user_id, PDO::PARAM_INT);

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
            $sqlDeleteUser = "DELETE FROM utilisateurs WHERE idUtilisateur = :idUtilisateur";
            $queryDeleteUser = self::$db->prepare($sqlDeleteUser);
            $queryDeleteUser->bindValue(':idUtilisateur', $user_id, PDO::PARAM_INT);
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

            $sql = "SELECT user_blocked FROM utilisateur WHERE idUtilisateur= :idUtilisateur";
            $query = self::$db->prepare($sql);
            $query->bindValue(':idUtilisateur', $user_id, PDO::PARAM_INT);
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

    public static function createEduc($nomUtilisateur, $prenomUtilisateur, $emailUtilisateur, $motDePasseUtilisateur, $user_validate, $phone, $type_id)
{
    self::initDatabase();
    
    try {
        // Commencer une transaction
        self::$db->beginTransaction();

        // Insérer l'utilisateur principal et l'enfant dans une seule requête
        $sql = "
            INSERT INTO utilisateurs (nom, prenom, email, motDePasse, user_validate, phone, type_id)
            VALUES (:nom, :prenom, :email, :motDePasse, :user_validate, :phone, :type_id)
        ";
        $query = self::$db->prepare($sql);
        $query->bindParam(':nom', $nomUtilisateur);
        $query->bindParam(':prenom', $prenomUtilisateur);
        $query->bindParam(':email', $emailUtilisateur);
        $query->bindParam(':motDePasse', $motDePasseUtilisateur);
        $query->bindParam(':user_validate', $user_validate);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':type_id', $type_id);
        $query->execute();

        // Valider la transaction
        self::$db->commit();
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        self::$db->rollBack();
        throw new Exception("Erreur lors de la création de l'utilisateur avec l'enfant : " . $e->getMessage());
    }
}

public static function getuser() {
    try {
        self::initDatabase(); // Initialisez la connexion à la base de données si ce n'est pas déjà fait
        
        $pdo = self::$db; // Utilisez la connexion PDO
        $sql = "SELECT idUtilisateur AS id, prenom, nom FROM utilisateurs WHERE type_id = 2";
        $query = $pdo->query($sql); // Exécutez la requête SQL
        $users = $query->fetchAll(PDO::FETCH_ASSOC); // Récupérez les utilisateurs sous forme de tableau associatif
        
        return $users; // Renvoyez les utilisateurs
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
    }
}




}
