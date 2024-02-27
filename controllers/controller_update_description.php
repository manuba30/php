<?php

$user_id = (int)$_GET['id'];
if (!isset($_SESSION['user']) || !in_array("ROLE_ADMIN", json_decode($_SESSION['user']['roles'])) || ($_SESSION['user']['id'] !== $user_id && !in_array("ROLE_ADMIN", json_decode($_SESSION['user']['roles'])))) {
    header("Location:?page=home");
    exit();
}
// On effectue la requête SQL permettant de récupérer les données du post
$db = connectDB();
$sql = $db->prepare("SELECT contact.*,contact.message,contact.user_id FROM contact WHERE user_id=$user_id");
$sql->execute();
$the_post = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['message']) && !empty($_POST['message'])) {
    // On récup les champs du formulaire et on effectue une requête d'update
    $message = htmlentities(strip_tags($_POST['message']));

    $sql = $db->prepare("UPDATE `contact` SET `message` = :message  WHERE `contact`.`id` = $user_id");
    // Les champs ne sont pas insérés directement pour des raisons de sécu,
    // Mais on utilise une fonction pour "binder" (faire correspondre) les variables/valeurs
    $sql->bindParam(':message', $message);
    $sql->execute();
    header("Location:?page=profiles");
}
include "./views/base.phtml";
