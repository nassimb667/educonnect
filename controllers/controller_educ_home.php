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

$totalUsers = Educ::countUsers();
$ActiveUser = Educ::countUsersActif();
$emploi_du_temps = Educ::EmploiDuTemps();


include "../views/view_educ_home.php";
