<?php
session_start();

require_once"../config.php";
require_once"../models/database.php";
require_once"../models/event.php";


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}

// Récupérer tous les événements actuels et à venir
$currentEvents = Event::getCurrentEvents();
$upcomingEvents = Event::getUpcomingEvents();
$pastEvents = Event::getPastEvents();

// Inclure la vue pour afficher les événements
include "../views/view_event.php";

