<?php
require_once "../models/event.php";

// Vérifiez si l'ID de l'événement est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérez l'ID de l'événement depuis l'URL
    $eventId = $_GET['id'];

    // Utilisez cet ID pour récupérer les détails de l'événement depuis la base de données
    $eventDetails = Event::getEventById($eventId);

    // Vérifiez si l'événement a été trouvé
    if($eventDetails) {
        // Affichez les détails de l'événement ici
        // Par exemple :
        echo "<h1>Détails de l'événement : {$eventDetails['titre']}</h1>";
        echo "<p>Description : {$eventDetails['description']}</p>";
        // Affichez d'autres détails de l'événement selon vos besoins
    } else {
        // Si l'événement n'est pas trouvé, affichez un message d'erreur par exemple
        echo "Événement non trouvé.";
    }
} else {
    // Si aucun ID d'événement n'est présent dans l'URL, affichez un message d'erreur ou redirigez l'utilisateur
    echo "ID d'événement non fourni.";
}

include "../views/view_event2.php";