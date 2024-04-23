<?php
// Inclusion du fichier de configuration et du modèle Message
require_once "../config.php";
require_once "../models/message.php";

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}

$nom = $_SESSION['user']['nom'];
$prenom = $_SESSION['user']['prenom'];
$user_id = $_SESSION['user']['idUtilisateur'];
$messages = Message::getMessages($user_id);

// Inclure la vue pour afficher les messages
include "../views/view_message.php";
