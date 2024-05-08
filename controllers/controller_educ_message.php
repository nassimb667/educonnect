<?php
require_once "../config.php";
require_once "../models/message.php";

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}

$user_id = $_SESSION['user']['idUtilisateur'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $messageId = $_POST['delete'];
    try {
        Message::deleteMessage($user_id, $messageId);
        header("Location: controller_educ_message.php");
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $messageId = $_POST['messageId']; 
    $messageContent = $_POST['message']; 
    try {
        Message::ResponseMessage($messageId, $user_id, $messageContent); // Appel de la méthode ResponseMessage avec les bonnes données
        header("Location: controller_educ_message.php");
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

$messages = Message::getAllMessage(); // Récupération des messages

// Obtenez les réponses associées à chaque message
foreach ($messages as $index => $message) {
    $responses = Message::getResponse($message['idMessage']);
    // Ajouter les réponses au tableau de messages
    $messages[$index]['responses'] = $responses;
}

include "../views/view_educ_message.php";
?>
