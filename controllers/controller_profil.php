<?php
session_start();

require_once "../config.php";
require_once "../models/user.php";

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont définis
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone'])) {
        // Récupérer l'ID de l'utilisateur à partir de la session
        $userId = $_SESSION['user']['idUtilisateur'];

        // Récupérer les nouvelles valeurs depuis le formulaire
        $newName = $_POST['nom'];
        $newEmail = $_POST['email'];
        $newPhone = $_POST['phone'];

        // Mettre à jour les informations dans la base de données
        try {
            User::updateName($userId, $newName);
            User::updateEmail($userId, $newEmail);
            User::updatePhone($userId, $newPhone);

            // Vérifier si un fichier a été téléchargé pour la photo de l'enfant
            if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] === 0) {
                $targetDir = "../assets/img/"; // Assurez-vous que le répertoire "img" existe et a les bonnes permissions
                $fileName = uniqid('photo_enfant_') . '_' . basename($_FILES["new_photo"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                
                // Vérifier si le fichier est une image
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    // Télécharger le fichier sur le serveur
                    if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $targetFilePath)) {
                        // Mettre à jour le chemin de la photo dans la base de données
                        User::updatePhoto($userId, $fileName);

                        // Mise à jour de la session avec le nouveau chemin de la photo
                        $_SESSION['user']['photoEnfant'] = $targetFilePath;
                    } else {
                        echo "Erreur lors du téléchargement du fichier.";
                    }
                } else {
                    echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
                }
            }

            // Rediriger vers la page de profil après la mise à jour
            header("Location: controller_profil.php");
            exit();
        } catch (Exception $e) {
            // Gérer l'erreur de mise à jour
            echo "Erreur lors de la mise à jour des informations: " . $e->getMessage();
        }
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
}

// Récupérer les informations de l'utilisateur depuis la session
$user = $_SESSION['user'];

$dateNaissanceEnfant = date('d F Y', strtotime($user['dateNaissanceEnfant']));

// Inclure la vue pour afficher le profil de l'utilisateur
include "../views/view_profil.php";
?>