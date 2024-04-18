<?php

require_once "../models/emploidutemp.php";
require_once "../config.php";
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}

// Récupérer l'ID du groupe de l'utilisateur connecté
$id_groupe = $_SESSION['user']['groupe'];


// Récupérer l'emploi du temps pour le groupe spécifié
$emploi_du_temps = Timetable::EmploiDuTemps($id_groupe);

// Définir le groupe de l'utilisateur pour l'affichage dans la vue
$user_group = '';
if ($id_groupe === '1') {
    $user_group = '1';
} elseif ($id_groupe === '2') {
    $user_group = '2';
} elseif ($id_groupe === '3') {
    $user_group = '3';
}

// Inclure la vue pour afficher l'emploi du temps
include "../views/view_emploidutemp.php";
