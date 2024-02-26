<?php 
if ( !isset($_SESSION['user']) || !in_array("ROLE_ADMIN",json_decode($_SESSION['user']['roles'])) ){
    header("Location:?page=home");
    exit();
}
$post_id = (int)$_GET['id'];
echo "attention suppression de post".$post_id;
$db = connectDB();
$sql = $db->prepare("DELETE FROM post WHERE id=$post_id");
$sql->execute();
header("location:?page=admin");