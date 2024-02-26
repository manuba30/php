<?php
$post_id = (int)$_GET['id'];
// On effectue la requête SQL permettant de récupérer les données du post
$db = connectDB();
$sql = $db->prepare("SELECT * FROM post WHERE id=$post_id");
$sql->execute();
$post = $sql->fetch(PDO::FETCH_ASSOC);
// SI LE FORM EST VALIDE ET QUE LES CHAMPS NE SONT PAS VIDES
// if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['image'])) {
//             $sql->execute();
            // Après l'update on redirige l'utilisateur sur le dashboard admin
            // header("Location:?page=admin");
    
// echo "<pre>";
// var_dump($the_post);
// echo "</pre>";
// blah blah blah
// On charge la vue
include "./views/base.phtml";