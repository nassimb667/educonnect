<?php
// Inclusion du fichier de configuration et du modèle Journal
require_once "../config.php";
require_once "../models/journal.php";

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$user_id = $_SESSION['user']['idUtilisateur'];

// Vérifier si l'utilisateur a des journaux
$journals = Journal::getJournalEntries($user_id);

// Inclure la vue pour afficher les journaux
include "../views/view_journal.php";

