<?php

$idParent = $_SESSION['idParent'] ?? null;

$errors = array();
$showForm = true;
require_once "../config.php";
require_once "../models/user.php";


// Récupérer les données de l'enfant
$nomEnfant = isset($_POST["nom_enfant"]) ? trim($_POST["nom_enfant"]) : null;
$prenomEnfant = isset($_POST["prenom_enfant"]) ? trim($_POST["prenom_enfant"]) : null;
$dateNaissanceEnfant = isset($_POST["date_naissance_enfant"]) ? trim($_POST["date_naissance_enfant"]) : null;
$photoEnfant = null;

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
// Récupérer l'identifiant du parent à partir de la variable de session
$idParent = $_SESSION['idUtilisateur'] ?? null;

// Juste après la récupération des données de l'enfant
var_dump($nomEnfant, $prenomEnfant, $dateNaissanceEnfant, $photoEnfant, $idParent);


// Vérifier s'il n'y a pas d'erreurs avant d'effectuer l'inscription de l'enfant
if (empty($errors)) {
    try {
        // Inscrire l'enfant avec l'identifiant du parent
        User::createChild($nomEnfant, $prenomEnfant, $dateNaissanceEnfant, $photoEnfant, $idParent);

        // Rediriger vers une page de succès
        header("Location: ../views/success.php");
        exit();
    } catch (Exception $e) {
        // Gérer l'erreur de manière appropriée (par exemple, afficher un message à l'utilisateur)
        $errors[] = "Une erreur s'est produite lors de l'enregistrement : " . $e->getMessage();
    }
}

include "../views/view_child.php";