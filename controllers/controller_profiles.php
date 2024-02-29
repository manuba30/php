<?php
//ma logique de controller
$db = Utils::connectDB();
$members = [];
if($db) {
    $sql = $db->prepare("SELECT users.*,contact.firstname,contact.lastname,contact.message FROM users,contact WHERE users.id=contact.user_id ORDER BY users.registred_at ");
    $sql->execute();
    $members = $sql->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($posts);
}
//On charge la vue
include "./views/base.phtml";