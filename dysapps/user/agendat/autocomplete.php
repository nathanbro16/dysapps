<?php
session_start();
include '../../sql.php';
$iduser = $_SESSION['id'];
$searchTerm = $_GET['term'];
$reponse = $bdd->query("SELECT * FROM ".DB_prefix."matiere WHERE matiere LIKE '%".$searchTerm."%' ORDER BY matiere ASC");
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	$data[] = $donnees['matiere'];
}

echo json_encode($data);