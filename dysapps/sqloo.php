<?php

$hote   = "localhost";

$login  = "id3786257_root";

$mdp    = "SUBSeINgENTIcali";

$base   = "id3786257_nathbrohan";


$bdd = new PDO('mysql:host='.$hote.';dbname='.$base.';charset=utf8', $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
