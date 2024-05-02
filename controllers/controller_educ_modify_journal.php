<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

require_once "../config.php";
require_once "../models/journal.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $journalId = $_POST['journal_id'];
    $newContenu = $_POST['contenu'];
    // Vérifiez si une nouvelle image a été soumise
    if (!empty($_FILES['image']['name'])) {
        $newImageName = $_FILES['image']['name'];
        $newImageTmpName = $_FILES['image']['tmp_name'];
        $newImageSize = $_FILES['image']['size'];
        $newImageError = $_FILES['image']['error'];
        $newImageType = $_FILES['image']['type'];
        // Gérez l'image comme requis
        // Assurez-vous de mettre à jour le chemin de l'image dans la base de données
    }
    // Mettez à jour l'article dans la base de données
    try {
        Journal::modifyJournal($journalId, $newContenu, $newDate, $newImageName); // Appelez la méthode pour mettre à jour l'article
        // Redirigez l'utilisateur vers la même page après la mise à jour
        header("Location: controller_educ_modify_journal.php");
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Récupérez à nouveau tous les articles du journal pour les afficher
try {
    $journals = Journal::getalljournal();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}

include "../views/view_modify_journal.php";
