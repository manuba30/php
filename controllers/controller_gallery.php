<?php
//ma logique de controller
$db = connectDB();

if($db) {
    $sql = $db->prepare("SELECT * FROM post ORDER BY id");
    $sql->execute();

    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($posts);
}
//On charge la vue
include "./views/base.phtml";