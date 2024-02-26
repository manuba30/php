<?php
//novo metodo para declarar constantes
const CONFIG_SITE_TITLE = "mon superbe mvc";
//antigo metodo
define("CONFIG_SITE_SLOGAN","estrutura magnifica que permete separar as responsabilidades para melhor mante-lo");
//funçao para conectar ao banco de dados
const DB_HOST ='localhost';
const DB_NAME = "mvc_php";
const DB_USER ="root";
const DB_PASS = "";
function connectDB(){
    $db = false;
    try{
        $db = new PDO( 'mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER,DB_PASS );
    }
    catch (PDOException $e) {
        $error = $e;
        echo 'Erro ao se conectar com o BD: '. $e;
    }
    return $db;
}
?>