<?php

$hote   = "localhost";

$login  = "root";

$mdp    = "";

$base   = "espace_membre";


$bdd = new PDO('mysql:host='.$hote.';dbname='.$base.';charset=utf8', $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
