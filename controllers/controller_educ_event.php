<?php
// Vérification de la session utilisateur
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

// Inclusion du fichier de configuration et du modèle Evenement
require_once "../config.php";
require_once "../models/event.php";

// Récupération des informations de l'utilisateur depuis la session
$user = $_SESSION['user'];
$nom = $user['nom'];
$prenom = $user['prenom'];
$email = $user['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $dateDebut = $_POST['dateDebut'];
        $dateFin = $_POST['dateFin'];
        $image = ""; 

        try {
            // Appel de la méthode createArticle du modèle Event
            $success = Event::createArticle($titre, $description, $dateDebut, $dateFin, $image);
            
            if ($success) {
                // Redirection vers une page de succès ou affichage d'un message de succès
                header("Location: ../views/event_success.php");
                exit();
            } else {
                // Gestion de l'échec de la création de l'article
                echo "Erreur lors de la création de l'article.";
            }
        } catch (Exception $e) {
            // Gestion des exceptions
            echo "Erreur : " . $e->getMessage();
        }
    }
}   

include "../views/view_educ_event.php";
