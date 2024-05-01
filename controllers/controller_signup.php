<?php

require_once "../models/user.php";
require_once "../config.php";
require_once "../models/role.php";
session_start();

$errors = [];

// Vérifie si la requête est une requête POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données de l'utilisateur
    $nomUtilisateur = isset($_POST["nom"]) ? trim($_POST["nom"]) : null;
    $prenomUtilisateur = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : null;
    $emailUtilisateur = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
    $motDePasseUtilisateur = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : null;
    $type_id = isset($_POST["role_utilisateur"]) ? trim($_POST["role_utilisateur"]) : null;
    $user_validate = 1;

    // Vérifier si le mot de passe est vide
    if (!empty($motDePasseUtilisateur)) {
        $hashedPassword = password_hash($motDePasseUtilisateur, PASSWORD_DEFAULT); // Hasher le mot de passe
    } else {
        $errors[] = "Le champ du mot de passe ne peut pas être vide.";
    }

    // Récupérer les données de l'enfant uniquement si le rôle est "famille"
    // Récupérer la photo de l'enfant uniquement si le rôle est "famille"
    if ($type_id == 2) {
        $nomEnfant = isset($_POST["nom_enfant"]) ? trim($_POST["nom_enfant"]) : null;
        $prenomEnfant = isset($_POST["prenom_enfant"]) ? trim($_POST["prenom_enfant"]) : null;
        $dateNaissanceEnfant = isset($_POST["date_naissance_enfant"]) ? trim($_POST["date_naissance_enfant"]) : null;
        $groupe = isset($_POST["groupe"]) ? trim($_POST["groupe"]) : null;
        // Vérifier et traiter le téléchargement de la photo de l'enfant
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
        } else {
            // Gérer l'absence de téléchargement de la photo de l'enfant
            $errors[] = "La photo de l'enfant est obligatoire.";
        }

        // Valider les données de l'enfant uniquement si le rôle est "famille"
        if (empty($nomEnfant) || empty($prenomEnfant) || empty($dateNaissanceEnfant) || empty($groupe) || empty($photoEnfant)) {
            $errors[] = "Tous les champs de l'enfant sont obligatoires.";
        }
    }

    // Valider les données de l'utilisateur
    if (empty($nomUtilisateur) || empty($prenomUtilisateur) || empty($emailUtilisateur) || empty($motDePasseUtilisateur)) {
        $errors[] = "Tous les champs de l'utilisateur sont obligatoires.";
    }

    // Vérification d'erreurs avant d'effectuer l'inscription
    if (empty($errors)) {
        try {
            // Inscrire l'utilisateur et son enfant si le rôle est "famille"
            if ($type_id == 2) {
                User::createWithChild($nomUtilisateur, $prenomUtilisateur, $emailUtilisateur, $hashedPassword, $user_validate, $phone, $type_id, $nomEnfant, $prenomEnfant, $photoEnfant, $dateNaissanceEnfant, $groupe);
            } else {
                User::createEduc($nomUtilisateur, $prenomUtilisateur, $emailUtilisateur, $hashedPassword, $user_validate, $phone, $type_id);
            }

            // Redirection vers la page de succès
            header("Location: ../views/success.php");
            exit();
        } catch (Exception $e) {
            // affiche message au user par rapport a lerreur
            $errors[] = "Une erreur s'est produite lors de l'enregistrement : " . $e->getMessage();
        }
    }
}

$roles = Role::getRoles();

include "../views/view_signup.php";
