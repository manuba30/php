<?php
//ma logique de controller
$db = Utils::connectDB();
$posts = [];
if($db) {
    $sql = $db->prepare("SELECT post.*,contact.firstname,contact.lastname FROM post,contact WHERE post.user_id=contact.user_id ORDER BY id DESC");
    $sql->execute();

    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($posts);
}
//On charge la vue
header("content-type: application/json");
echo json_encode($posts);