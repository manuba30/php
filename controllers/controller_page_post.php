<?php
$post_id = (int)$_GET['id'];
// On effectue la requête SQL permettant de récupérer les données du post
$db = Utils::connectDB();
//DETAILS POST
$sql = $db->prepare("SELECT post.*,contact.firstname,contact.lastname FROM post,contact WHERE post.id='".$_GET['id']."' AND post.user_id=contact.user_id LIMIT 1");
$sql->execute();
$post = $sql->fetch(PDO::FETCH_ASSOC);


// COMMENTS
$sql = $db->prepare("SELECT * from comment INNER JOIN contact ON comment.user_id = contact.user_id where post_id= $post_id ORDER BY posted_at DESC");
$sql->execute(); 
$posts = $sql->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['comment']) && !empty($_POST['comment'])) {
    // On récup les champs du formulaire et on effectue une requête d'insertion
    $comment = htmlentities(strip_tags($_POST['comment']));
    $sql = $db->prepare("INSERT INTO comment (comments,user_id,post_id) VALUES (:comments,:user_id,:post_id)");
    $sql->bindParam(':comments', $comment);
    $sql->bindParam(':post_id', $post_id);
    $sql->bindParam(':user_id', $_SESSION['user']['id']);

        // On execute l'insertion
    $sql->execute();

}


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