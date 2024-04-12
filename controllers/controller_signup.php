<?php

$errors = array();
$showForm = true;
require_once "../config.php";
require_once "../models/user.php";
require_once "../models/role.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données de l'utilisateur
    $courriel = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
    $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : null;
    $prenom = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : null;
    $tel = isset($_POST["phone"]) ? trim($_POST["phone"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $type_id = isset($_POST["type_id"]) ? trim($_POST["type_id"]) : null;
    $user_validate = 1;

    // Validation de l'adresse e-mail
    if (empty($courriel) || !filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le champ 'Courriel' est obligatoire et doit être au format d'une adresse email valide.";
    }


    // Vérifier s'il n'y a pas d'erreurs avant d'effectuer l'inscription de l'utilisateur et de l'enfant
    if (empty($errors)) {
        try {
            // Inscrire l'utilisateur
            User::create($nom, $prenom, $courriel, $password, $user_validate, $tel, $type_id);

            // Rediriger vers une page de succès
            header("Location: ../controllers/controller_child.php");
            exit();
        } catch (Exception $e) {
            // Gérer l'erreur de manière appropriée (par exemple, afficher un message à l'utilisateur)
            $errors[] = "Une erreur s'est produite lors de l'enregistrement : " . $e->getMessage();
        }
    }
}

// Récupérer les types de rôle pour le formulaire
$types = Role::getRoles();

// Inclure la vue du formulaire d'inscription
include "../views/view_signup.php";
