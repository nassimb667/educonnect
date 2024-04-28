<?php
// Vérification de la session utilisateur
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

// Inclusion du fichier de configuration et du modèle Utilisateur
require_once "../config.php";
require_once "../models/educ.php";

// Récupération des informations de l'utilisateur depuis la session
$user = $_SESSION['user'];
$nom = $user['nom'];
$prenom = $user['prenom'];
$email = $user['email'];

// Appel des fonctions du modèle pour récupérer les données
$totalUsers = Educ::countUsers();
$ActiveUser = Educ::countUsersActif();
$emploi_du_temps = Educ::EmploiDuTemps();
$eventCount = Educ::countEvent();
$eventCountP = Educ::countPreviousEvent();
$eventCountA = Educ::countActiveEvent();
$utilisateurs = Educ::afficherUtilisateursGroupe(); 

function deconnexionUtilisateur() {
    session_destroy();
    header("Location: controller_educ_signin.php");
    exit();
}

include "../views/view_educ_home.php";
