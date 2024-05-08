<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

require_once "../config.php";
require_once "../models/journal.php";

// Récupérez à nouveau tous les articles du journal pour les afficher
try {
    $journals = Journal::getalljournal();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $journalId = $_POST['journal_id'];
    $newContenu = $_POST['contenu'];
    $newImageName = null; // Initialiser à null

    // Vérifiez si une nouvelle image a été soumise
    if (!empty($_FILES['image']['name'])) {
        $newImageName = $_FILES['image']['name'];
        $newImageTmpName = $_FILES['image']['tmp_name'];
        $newImageSize = $_FILES['image']['size'];
        $newImageError = $_FILES['image']['error'];
        $newImageType = $_FILES['image']['type'];

        // Chemin de destination pour enregistrer l'image
        $destination = "../assets/img/journal/" . $newImageName;

        // Déplacez le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($newImageTmpName, $destination)) {
            echo "Le fichier a été téléchargé avec succès.";
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        // Utiliser l'image existante si aucune nouvelle image n'est soumise
        $newImageName = $_POST['current_image'];
    }

    // Définir la date actuelle
    $newDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL DATETIME

    // Mettez à jour l'article dans la base de données
    try {
        Journal::modifyJournalWithImage($journalId, $newDate, $newContenu, $newImageName);
        // Redirigez l'utilisateur vers la même page après la mise à jour
        header("Location: controller_educ_modify_journal.php");
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

include "../views/view_modify_journal.php";
?>
