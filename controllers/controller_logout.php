<?php
//nos destruimos as informaçoes
session_destroy();
// e depois a reenviamos a home
header("location:?page=home");