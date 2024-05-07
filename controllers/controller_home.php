<?php

require_once "../models/event.php";
session_start();

// Vérifie que l'utilisateur est connecté avant d'accéder à cette page
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}

// Récupère le nom et le prénom de l'utilisateur depuis la session
$nom = $_SESSION['user']['nom'];
$prenom = $_SESSION['user']['prenom'];

function deconnexionUtilisateur() {
    // Détruit toutes les données de session
    session_destroy();

    // Redirige vers la page de connexion
    header("Location: controller_signin.php");
    exit();
}

// Si le formulaire de déconnexion est soumis
if (isset($_POST['logout'])) {
    deconnexionUtilisateur();
}

$latestEvents = Event::getLatestEvents();

$joursSemaine = ['Sun' => 'Dimanche', 'Mon' => 'Lundi', 'Tue' => 'Mardi', 'Wed' => 'Mercredi', 'Thu' => 'Jeudi', 'Fri' => 'Vendredi', 'Sat' => 'Samedi'];
$mois = ['Jan' => 'Janvier', 'Feb' => 'Février', 'Mar' => 'Mars', 'Apr' => 'Avril', 'May' => 'Mai', 'Jun' => 'Juin', 'Jul' => 'Juillet', 'Aug' => 'Août', 'Sep' => 'Septembre', 'Oct' => 'Octobre', 'Nov' => 'Novembre', 'Dec' => 'Décembre'];

// Formatage des dates pour chaque événement
foreach ($latestEvents as &$event) {
    $dateTimeDebut = new DateTime($event['dateDebut']);
    $jourSemaineDebut = $joursSemaine[date('D', $dateTimeDebut->getTimestamp())];
    $jourMoisDebut = date('d', $dateTimeDebut->getTimestamp());
    $moisAnneeDebut = $mois[date('M', $dateTimeDebut->getTimestamp())];
    $anneeDebut = date('Y', $dateTimeDebut->getTimestamp());
    $heureMinuteDebut = date('H:i', $dateTimeDebut->getTimestamp());

    $dateTimeFin = new DateTime($event['dateFin']);
    $jourSemaineFin = $joursSemaine[date('D', $dateTimeFin->getTimestamp())];
    $jourMoisFin = date('d', $dateTimeFin->getTimestamp());
    $moisAnneeFin = $mois[date('M', $dateTimeFin->getTimestamp())];
    $anneeFin = date('Y', $dateTimeFin->getTimestamp());
    $heureMinuteFin = date('H:i', $dateTimeFin->getTimestamp());

    $dateFormattedDebut = "$jourSemaineDebut $jourMoisDebut $moisAnneeDebut $anneeDebut $heureMinuteDebut"; 
    $dateFormattedFin = "$jourSemaineFin $jourMoisFin $moisAnneeFin $anneeFin $heureMinuteFin"; 

    // Assigner les dates formatées à chaque événement
    $event['dateFormattedDebut'] = $dateFormattedDebut;
    $event['dateFormattedFin'] = $dateFormattedFin;
}


include("../views/view_home.php");
