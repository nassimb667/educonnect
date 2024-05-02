<?php
// Vérification de la session utilisateur
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

// Inclusion du fichier de configuration et du modèle Utilisateur
require_once "../config.php";
require_once "../models/user.php"; 
require_once "../models/journal.php";

// Récupération des informations de l'utilisateur depuis la session
$user = $_SESSION['user'];
$idUtilisateurSession = $user['idUtilisateur']; // Récupération de l'ID utilisateur de la session
$nom = $user['nom'];
$prenom = $user['prenom'];
$email = $user['email'];

// Vérification du formulaire pour ajouter une entrée au journal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $userId = $_POST['user']; // Récupération de l'ID de l'utilisateur sélectionné dans le formulaire
    $date = $_POST['date'];
    $contenu = $_POST['contenu'];
    
    // Traitement de l'image
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    // Gestion de l'image
    if ($imageError === 0) {
        $imageDestination = '../assets/img/journal/' . $imageName; // Modifier le chemin de destination
        move_uploaded_file($imageTmpName, $imageDestination);
    }

    // Formatage de la date
    $formattedDate = date('Y-m-d', strtotime($date));

    try {
        // Ajout de l'entrée au journal en utilisant la méthode addtojournal du modèle Journal
        $success = Journal::addtojournal($formattedDate, $contenu, $imageName, $userId); // Utilisation de $userId
        
        if ($success) {
            // Redirection vers une page de succès ou affichage d'un message de succès
            header("Location: ../views/journal_success.php");
            exit();
        } else {
            // Gestion de l'échec de l'ajout de l'entrée au journal
            echo "Erreur lors de l'ajout de l'entrée au journal.";
        }
    } catch (Exception $e) {
        // Gestion des exceptions
        echo "Erreur : " . $e->getMessage();
        exit(); // Arrêter l'exécution du script en cas d'erreur
    }
}

// Récupération de la liste des utilisateurs depuis la base de données
try {
    $users = User::getuser(); 
} catch (Exception $e) {
    // Gestion des exceptions
    echo "Erreur : " . $e->getMessage();
    exit(); // Arrêter l'exécution du script en cas d'erreur
}

// Inclure la vue pour afficher le formulaire et les entrées du journal
include "../views/view_educ_journal.php";