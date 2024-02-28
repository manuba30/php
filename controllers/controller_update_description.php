<?php

$user_id = (int)$_GET['id'];
if (!isset($_SESSION['user']) || !in_array("ROLE_ADMIN", json_decode($_SESSION['user']['roles'])) || ($_SESSION['user']['id'] !== $user_id && !in_array("ROLE_ADMIN", json_decode($_SESSION['user']['roles'])))) {
    header("Location:?page=home");
    exit();
}
// On effectue la requête SQL permettant de récupérer les données du post
$db = connectDB();
$sql = $db->prepare("SELECT contact.* FROM contact WHERE user_id=$user_id");
$sql->execute();
$the_post = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['message']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['city']) && isset($_POST['zip']) && !empty($_POST['message']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['address1']) && !empty($_POST['adress2']) && !empty($_POST['city']) && !empty($_POST['zip'])) {
    // On récup les champs du formulaire et on effectue une requête d'update
    $message = htmlentities(strip_tags($_POST['message']));
    $firstname = htmlentities(strip_tags($_POST['firstname']));
    $lastname = htmlentities(strip_tags($_POST['lastname']));
    $address1 = htmlentities(strip_tags($_POST['address1']));
    $address2 = htmlentities(strip_tags($_POST['address2']));
    $city = htmlentities(strip_tags($_POST['city']));
    $zip = htmlentities(strip_tags($_POST['zip']));

    $sql = $db->prepare("UPDATE `contact` SET `message`= :message,`firstname`=:firstname,`lastname`= :lastname,`address1`=:address1,`address2`=:address2,`city`=:city,`zip`=:zip   WHERE `contact`.`id` = $user_id");
    // Les champs ne sont pas insérés directement pour des raisons de sécu,
    // Mais on utilise une fonction pour "binder" (faire correspondre) les variables/valeurs
    $sql->bindParam(':message', $message);
    $sql->bindParam(':firstname', $firstname);
    $sql->bindParam(':lastname', $lastname);
    $sql->bindParam(':address1', $address1);
    $sql->bindParam(':address2', $address2);
    $sql->bindParam(':city', $city);
    $sql->bindParam(':zip', $zip);
    $sql->execute();
    header("Location:?page=profiles");
}
include "./views/base.phtml";

