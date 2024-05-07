<?php

require_once "../config.php";
require_once "../models/message.php";

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: controller_signin.php");
    exit();
}


$nom = $_SESSION['user']['nom'];
$prenom = $_SESSION['user']['prenom'];
$user_id = $_SESSION['user']['idUtilisateur'];


$messages = Message::getAllMessage();


include "../views/view_educ_message.php";
