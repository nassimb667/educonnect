<?php
session_start();

require_once "../config.php";
require_once "../models/user.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    if (empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs du formulaire.";
    } else {
        try {
            $user = User::getInfos($email);
            if ($user) {
                if ($user['user_validate'] == 1) {
                    if (isset($user['motDePasse']) && password_verify($password, $user['motDePasse'])) {
                        // Vérifier le type_id
                        if ($user['type_id'] == 1) {
                            $_SESSION['user'] = $user;
                            // Rediriger vers une autre page (par exemple, la page d'accueil)
                            header("Location: ../controllers/controller_educ_home.php");
                            exit();
                        } else {
                            echo "Vous n'êtes pas autorisé à accéder à cette page.";
                        }
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

include("../views/view_login_educ.php");

