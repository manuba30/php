<?php
//começamos uma sessao
session_start();
// session_destroy();
//carregamos a config
require "./config.php";
//carregamos o router
require "./services/router.php";
//carregamos o controlador
require "./controllers/controller_{$page}.php";
