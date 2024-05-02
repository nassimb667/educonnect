<?php
// Vérification de la session utilisateur
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

// Inclusion du fichier de configuration et du modèle Journal
require_once "../config.php";
require_once "../models/journal.php";

// Vérification si un ID de journal est passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: controller_modify_journal.php");
    exit();
}

$journalId = $_GET['id'];

// Vérification si le formulaire a été soumis pour la modification
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modify'])) {
    // Récupération des données du formulaire
    $journalId = $_POST['journal_id'];
    $contenu = $_POST['contenu'];

    // Traitement de l'image
    $imageFileName = '';
    if (!empty($_FILES['image']['name'])) {
        $imageFileName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError = $_FILES['image']['error'];
        $imageType = $_FILES['image']['type'];

        // Vérification et déplacement de l'image
        if ($imageError === 0) {
            $imageDestination = '../../assets/img/journal/' . $imageFileName;
            move_uploaded_file($imageTmpName, $imageDestination);
        }
    }

    // Appel de la méthode pour mettre à jour l'article de journal
    try {
        $success = Journal::modifyJournal($journalId, $contenu, $imageFileName,$newImageName);
        if ($success) {
            // Redirection vers une page de succès ou autre
            header("Location: controller_modify_journal.php");
            exit();
        } else {
            // Gestion de l'échec de la modification
            echo "Erreur lors de la modification de l'article du journal.";
        }
    } catch (Exception $e) {
        // Gestion des exceptions
        echo "Erreur : " . $e->getMessage();
        exit(); // Arrêter l'exécution du script en cas d'erreur
    }
}

// Récupération des données de l'article de journal à modifier
try {
    $journal = Journal::getJournalById($journalId);
    if (!$journal) {
        // Gestion de l'article de journal non trouvé
        echo "Article de journal non trouvé.";
        exit();
    }
} catch (Exception $e) {
    // Gestion des exceptions
    echo "Erreur : " . $e->getMessage();
    exit(); // Arrêter l'exécution du script en cas d'erreur
}

// Inclure la vue pour afficher le formulaire de modification
include "../views/view_modify_single_journal.php";