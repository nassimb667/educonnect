<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

require_once "../config.php";
require_once "../models/emploidutemp.php";

// Afficher toutes les activités de l'emploi du temps
try {
    $activites = Timetable::getActivites();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}

// Ajouter une nouvelle activité
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $nom_activite = $_POST['matiere'];
    $groupe = $_POST['groupe'];

    try {
        Timetable::ajouterActivite($heure_debut, $heure_fin, $nom_activite);
        // Redirection après l'ajout de l'activité
        header("Location: controller_emploi_du_temps.php");
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Inclure la vue pour afficher l'emploi du temps
include "../views/view_educ_emploidutemp.php";
?>
