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


// Valider les données de l'utilisateur
if (empty($nomUtilisateur) || empty($prenomUtilisateur) || empty($emailUtilisateur) || empty($motDePasseUtilisateur)) {
    $errors[] = "Tous les champs de l'utilisateur sont obligatoires.";
}


// Vérifier s'il n'y a pas d'erreurs avant d'effectuer l'inscription
if (empty($errors)) {
    try {
        // Inscrire l'utilisateur et son enfant
        User::createEduc($nomUtilisateur, $prenomUtilisateur, $emailUtilisateur, $hashedPassword, $user_validate, $phone, $type_id); 

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
include "../views/view_educ_signup.php";
