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
    
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone'])) {
        
        $userId = $_SESSION['user']['idUtilisateur'];

        $newName = $_POST['nom'];
        $newEmail = $_POST['email'];
        $newPhone = $_POST['phone'];

        
        try {
            User::updateName($userId, $newName);
            User::updateEmail($userId, $newEmail);
            User::updatePhone($userId, $newPhone);

 
            
if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] === 0) {
                $targetDir = "../assets/img/"; 
                $fileName = uniqid('photo_enfant_') . '_' . basename($_FILES["new_photo"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
               
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    
                    if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $targetFilePath)) {
                        
                        User::updatePhoto($userId, $fileName);

                        
                        $_SESSION['user']['photoEnfant'] = $targetFilePath;
                    } else {
                        echo "Erreur lors du téléchargement du fichier.";
                    }
                } else {
                    echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
                }
            }
            
            header("Location: controller_profil.php");
            exit();
        } catch (Exception $e) {
            
            echo "Erreur lors de la mise à jour des informations: " . $e->getMessage();
        }
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
}


$user = $_SESSION['user'];

$dateNaissanceEnfant = date('d F Y', strtotime($user['dateNaissanceEnfant']));


include "../views/view_profil.php";
