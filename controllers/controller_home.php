<?php
// ma logique de controller
$db = Utils::connectDB();

if($db) {
    $sql = $db->prepare("SELECT * FROM post ORDER BY id LIMIT 3");
    $sql->execute();

    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($posts);
}
// On charge la vue
include "./views/base.phtml";