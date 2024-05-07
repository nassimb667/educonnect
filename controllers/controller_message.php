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
        header("Location: controller_message.php"); 
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $message = $_POST['message'];
    try {
        Message::sendMessage($user_id, $message);
        header("Location: controller_message.php");
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

$messages = Message::getMessages($user_id);

include "../views/view_message.php";