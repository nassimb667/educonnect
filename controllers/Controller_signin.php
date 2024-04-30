<?php
session_start();

require_once "../config.php";
require_once "../models/user.php";
require_once "../models/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    // Vérification que les champs ne sont pas vides
    if (empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs du formulaire.";
    } else {
        try {
            // Récupération des informations de l'utilisateur associé à l'email
            $user = user::getInfos($email);
            if ($user) {
                // Vérification si le compte utilisateur est activé
                if ($user['user_validate'] == 1) {
                    // Vérification du mot de passe
                    if (isset($user['motDePasse']) && password_verify($password, $user['motDePasse'])) {
                        // Authentification réussie, enregistrement des informations de l'utilisateur dans la session
                        $_SESSION['user'] = $user;

                        // Redirection vers la page d'accueil
                        header("Location: ../controllers/controller_home.php");
                        exit();
                    } else {
                        echo "Mot de passe incorrect.";
                    }
                } else {
                    echo "Compte désactivé.";
                }
            } else {
                echo "Aucun compte trouvé avec cette adresse e-mail.";
            }
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des informations de compte : " . $e->getMessage();
        }
    }
}

// Inclusion de la vue du formulaire de connexion
include("../views/view_signin.php");

