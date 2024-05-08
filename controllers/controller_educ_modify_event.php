<?php
require_once "../config.php";
require_once "../models/event.php";

session_start();

// Vérification de l'authentification de l'utilisateur
if (!isset($_SESSION['user'])) {
    header("Location: controller_login_educ.php");
    exit();
}

$user_id = $_SESSION['user']['idUtilisateur'];

// Récupération des événements actuels
$currentEvents = Event::getCurrentEvents();
$upcomingEvents = Event::getUpcomingEvents();
$pastEvents = Event::getPastEvents();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

    $eventId = $_POST['eventId'];
    $newEventData = [
        'titre' => htmlspecialchars($_POST['newTitle']),
        'description' => htmlspecialchars($_POST['newDescription']),
        'dateDebut' => htmlspecialchars($_POST['newStartDate']),
        'dateFin' => htmlspecialchars($_POST['newEndDate']),
        'image' => htmlspecialchars($_FILES['newImage']['name'])
    ];

    try {
        // Appel de la méthode pour modifier l'événement
        $success = Event::modifyEvent($eventId, $newEventData);
        if ($success) {
            header("Location: controller_educ_modify_event.php");
            exit();
        } else {
            echo "Une erreur s'est produite lors de la modification de l'événement.";
        }
    } catch (Exception $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }
}

// Inclusion de la vue
include "../views/view_educ_modify_event.php";
?>
