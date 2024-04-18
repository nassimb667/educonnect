<?php

require_once "../models/user.php";
require_once "../config.php";
require_once "../models/role.php";
session_start();

$errors = [];

// Récupérer les données de l'utilisateur
$nomUtilisateur = isset($_POST["nom"]) ? trim($_POST["nom"]) : null;
$prenomUtilisateur = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : null;
$emailUtilisateur = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
$motDePasseUtilisateur = isset($_POST["password"]) ? trim($_POST["password"]) : null;

// Vérifier si le mot de passe est vide
if (!empty($motDePasseUtilisateur)) {
    $hashedPassword = password_hash($motDePasseUtilisateur, PASSWORD_DEFAULT); // Hasher le mot de passe
} else {
    $errors[] = "Le champ du mot de passe ne peut pas être vide.";
}

$phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : null;
$type_id = isset($_POST["role_utilisateur"]) ? trim($_POST["role_utilisateur"]) : null;
$user_validate = 1;

// Récupérer les données de l'enfant
$nomEnfant = isset($_POST["nom_enfant"]) ? trim($_POST["nom_enfant"]) : null;
$prenomEnfant = isset($_POST["prenom_enfant"]) ? trim($_POST["prenom_enfant"]) : null;
$dateNaissanceEnfant = isset($_POST["date_naissance_enfant"]) ? trim($_POST["date_naissance_enfant"]) : null;
$photoEnfant = null;
$groupe = isset($_POST["groupe"]) ? trim($_POST["groupe"]) : null; // Nouveau champ "groupe"

// Vérifier si un fichier a été téléchargé pour l'enfant
if (isset($_FILES['photo_enfant']) && $_FILES['photo_enfant']['error'] === UPLOAD_ERR_OK) {
    // Définir le dossier de destination pour stocker les photos des enfants
    $dossierDestinationEnfant = "../assets/img/enfant";

    // Générer un nom unique pour la photo de l'enfant
    $nomFichierEnfant = uniqid('photo_enfant_') . '_' . basename($_FILES['photo_enfant']['name']);

    // Chemin complet de destination pour la photo de l'enfant
    $cheminDestinationEnfant = $dossierDestinationEnfant . $nomFichierEnfant;

    // Déplacer le fichier téléchargé vers le dossier de destination pour l'enfant
    if (move_uploaded_file($_FILES['photo_enfant']['tmp_name'], $cheminDestinationEnfant)) {
        // Stocker le chemin de la photo de l'enfant dans la variable $photoEnfant
        $photoEnfant = $cheminDestinationEnfant;
    } else {
        // Gérer les erreurs de téléchargement de la photo de l'enfant
        $errors[] = "Une erreur s'est produite lors du téléchargement de la photo de l'enfant.";
    }
}

// Valider les données de l'utilisateur
if (empty($nomUtilisateur) || empty($prenomUtilisateur) || empty($emailUtilisateur) || empty($motDePasseUtilisateur)) {
    $errors[] = "Tous les champs de l'utilisateur sont obligatoires.";
}

// Valider les données de l'enfant
if (empty($nomEnfant) || empty($prenomEnfant) || empty($dateNaissanceEnfant) || empty($groupe)) {
    $errors[] = "Tous les champs de l'enfant sont obligatoires.";
}

// Vérifier s'il n'y a pas d'erreurs avant d'effectuer l'inscription
if (empty($errors)) {
    try {
        // Inscrire l'utilisateur et son enfant
        User::createWithChild($nomUtilisateur, $prenomUtilisateur, $emailUtilisateur, $hashedPassword, $user_validate, $phone, $type_id, $nomEnfant, $prenomEnfant, $photoEnfant, $dateNaissanceEnfant, $groupe); // Ajout de $groupe

        // Rediriger vers une page de succès
        header("Location: ../views/success.php");
        exit();
    } catch (Exception $e) {
        // Gérer l'erreur de manière appropriée (par exemple, afficher un message à l'utilisateur)
        $errors[] = "Une erreur s'est produite lors de l'enregistrement : " . $e->getMessage();
    }
}

$roles = Role::getRoles();

// Inclure la vue du formulaire avec les éventuelles erreurs
include "../views/view_signup.php";
