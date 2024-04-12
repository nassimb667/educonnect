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

include("../views/view_home.php");
