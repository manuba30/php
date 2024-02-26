<?php
//ma logique de controller
$db = connectDB();
$members = [];
if($db) {
    $sql = $db->prepare("SELECT users.*,contact.firstname,contact.lastname,users.registred_at,users.id FROM users,contact WHERE users.id=contact.user_id ORDER BY users.registred_at ");
    $sql->execute();
    $members = $sql->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($posts);
}
//On charge la vue
include "./views/base.phtml";