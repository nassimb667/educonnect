<?php
// Démarrage de la session
session_start();

// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['user'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: controller_login_educ.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}

// Inclusion du modèle utilisateur
require_once "../models/educ.php";

// Récupération des utilisateurs groupés par groupe
$usersByGroup = Educ::getUsersByGroup();

// Inclusion de la vue pour afficher les utilisateurs groupés par groupe
include "../views/view_user_list.php";

